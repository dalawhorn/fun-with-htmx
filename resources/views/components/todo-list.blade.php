<ul>
    @isset($todos)
        @foreach($todos as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    @else
        <div>Add a Todo</div>
    @endisset
</ul>