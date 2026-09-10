<?php

namespace Tests\Feature;

use App\Models\Todo;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_pages_and_counts(): void
    {
        $todo = Todo::create(['title' => 'First task', 'description' => 'Details']);
        Todo::create(['title' => 'Done task', 'completed' => true]);

        $this->get('/todos')->assertOk()->assertSee('First task')
            ->assertViewHas('open_todos', 1)->assertViewHas('completed_todos', 1);
        $this->get('/todos/create')->assertOk();
        $this->get('/create')->assertOk();
        $this->get('/todos/'.$todo->id)->assertOk()->assertSee('Details');
        $this->get('/todos/'.$todo->id.'/edit')->assertOk()->assertSee('First task');
    }

    public function test_create_update_and_delete(): void
    {
        $this->post('/todos', ['title' => 'New task', 'description' => 'Details', 'completed' => '1'])
            ->assertRedirect(route('todos.index'))->assertSessionHas('status');
        $todo = Todo::firstOrFail();
        $this->assertTrue($todo->completed);
        $this->assertSame('Details', $todo->description);

        $this->put('/todos/'.$todo->id, ['title' => 'Updated task', 'description' => null])
            ->assertRedirect(route('todos.index'));
        $this->assertDatabaseHas('todos', ['id' => $todo->id, 'title' => 'Updated task', 'description' => null, 'completed' => false]);

        $this->delete('/todos/'.$todo->id)->assertRedirect(route('todos.index'));
        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }

    public function test_invalid_input_is_rejected_and_old_values_are_rendered(): void
    {
        foreach (['', str_repeat('a', 151), ['invalid']] as $title) {
            $this->post('/todos', ['title' => $title])->assertSessionHasErrors('title');
        }
        $this->post('/todos', ['title' => 'Valid', 'completed' => 'invalid', 'description' => ['invalid']])
            ->assertSessionHasErrors(['completed', 'description']);
        $this->assertDatabaseCount('todos', 0);

        $todo = Todo::create(['title' => 'Original', 'completed' => true]);
        $url = '/todos/'.$todo->id.'/edit';
        $this->from($url)->put('/todos/'.$todo->id, ['title' => '', 'description' => 'Retained description', 'completed' => '0'])
            ->assertRedirect($url)->assertSessionHasErrors('title');
        $this->get($url)->assertOk()->assertSee('Retained description')->assertDontSee('checked', false);
        $this->assertSame('Original', $todo->fresh()->title);
    }

    public function test_missing_records_return_404(): void
    {
        $this->get('/todos/999')->assertNotFound();
        $this->get('/todos/999/edit')->assertNotFound();
        $this->put('/todos/999', ['title' => 'Missing'])->assertNotFound();
        $this->delete('/todos/999')->assertNotFound();
    }

    public function test_titles_and_descriptions_are_escaped(): void
    {
        $todo = Todo::create(['title' => '<script>alert(1)</script>', 'description' => '<b>Details</b>']);
        $this->get('/todos')->assertOk()->assertDontSee('<script>', false)->assertSee('&lt;script&gt;', false);
        $this->get('/todos/'.$todo->id)->assertOk()->assertSee('&lt;b&gt;Details&lt;/b&gt;', false);
    }

    public function test_database_seeder_creates_todos_and_can_run_again(): void
    {
        $this->seed(DatabaseSeeder::class);
        $this->assertDatabaseCount('todos', 10);
        $this->seed(DatabaseSeeder::class);
        $this->assertDatabaseCount('todos', 20);
        $this->assertDatabaseCount('users', 1);
    }
}
