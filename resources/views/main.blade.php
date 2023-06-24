<x-layout>
    <x-slot:title>
        Home
    </x-slot>

    <h1>Home</h1>

    <button hx-post="/clicked" hx-swap="outerHTML">
    Click Me
  </button>
</x-layout>