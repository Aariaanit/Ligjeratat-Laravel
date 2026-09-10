<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo $name; ?>
    <p>Hello, {{ $name }}!</p>

    {{-- Kjo eshte menyra me blade, te siguron qe scriptat i lexon si string --}}
    <p>Hello, {{ $script }}!</p>

    <p>Hello, <?php echo htmlspecialchars($script); ?>!</p>

    {{-- Kjo eshte menyra me blade, te siguron qe html i lexon si string --}}
    <p>Hello, {{ $html }}!</p>
    <p>Hello, <?php echo $html; ?>!</p>

    {{-- Kjo eshte menyra me blade, te siguron qe array i lexon si string --}}

     <p>Hello, {{ $array[0] }}!</p>

    <p>Hello, <?php echo $array[0]; ?>!</p>
    
    {{-- Kjo eshte menyra me blade, te siguron qe object i lexon si string --}}
    <p>Hello, {{ $object->name }}!</p>
    <p>Hello, <?php echo $object->name; ?>!</p>

    {{--Direktivat ne Blade --}}
    <hr>
    <hr>
    {{--Kushtet, if edhe elseif, Switch--}}
  
    @if(isset($name))
        <h1>Welcome {{$name }}</h1>
    @else
        <h1>Welcome Guest</h1>
    @endif

    @if(isset($name) && strstr($name, '4'))
        <h1>Welcome {{$name }}</h1>
    @elseif(strlen($name)>10)
        <h1>Welcome to long user</h1>
    @else
        <h1>Welcome Guest</h1>
    @endif

    {{-- Switch --}}
    @switch($name)
        @case('Dita')
            <h1>Welcome Dita</h1>
            @break
        @case('Dita5')
            <h1>Welcome Dita5</h1>
            @break
        @default
            <h1>Welcome Guest</h1>
    @endswitch

    {{-- Loops, For, Foreach, While --}}

    @for($i=0; $i<5; $i++)
        <p>Number: {{$i}}</p>
    @endfor

    @foreach($array as $item)
        <p>Item: {{$item}}</p>
    @endforeach

     @php
        $count = 0;
    @endphp
    @while($count < 5)
        <p>Count: {{$count}}</p>
        <?php $count++; ?>
    @endwhile


    {{-- elseif ne loops --}}

    @foreach($array as $item)
        @if($item == 'Item 3')
            <p>Found: {{$item}}</p>
        @else
            <p>Not Found: {{$item}}</p>
        @endif
    @endforeach

    @foreach($subject as $x)
    {{ $x }},
    @endforeach
    <br>
    @forelse($subject as $sub)
        {{ $sub }},
    @empty
        <p>Eshte e zbazet</p>
    @endforelse

    @auth
        <p>I am authenticated</p>
    @endauth

    @guest
        <p>I am not authenticated</p>
    @endguest

    {{-- Krijimi i nje direktive --}}
    @sayHello
        {{$username}}
     <br>  
    @sayHello
        {{$username}}

        <br>

    @toUpperCase(Arianit);

</body>
</html>