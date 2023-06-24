<x-layout>
    <x-slot:title>
        Todos
    </x-slot>

    <h1>Todos</h1>

    <form id="todo-form" hx-post="/todos" hx-target="#todo-list-container">
        <label for="todo-input">New Todo</label>
        <input id="todo-input" type="text" name="todo_val" />
        <button type="submit">Add</button>
    </form>

    <div id="todo-list-container">
        <x-todo-list :todos="$todos" />
    </div>

    <script type="text/javascript">
        document.body.addEventListener('htmx:afterSwap', function(e) {
            const form = document.querySelector("#todo-form");
            form.reset();
        });
    </script>
</x-layout>