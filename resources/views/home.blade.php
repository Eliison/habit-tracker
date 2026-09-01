<h1>
    Welcome to the Home Page
</h1>

<p>Hello, {{ $name }}!</p>

<ul>
    @foreach ($habits as $habit)
        <li>{{ $habit }}</li>
    @endforeach
</ul>
