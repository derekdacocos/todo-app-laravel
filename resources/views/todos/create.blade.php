<x-app-layout>
    <x-slot name="header">
        <h2>Create Todo</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label>Title</label>
                <input type="text" name="title" class="border px-2 py-1 w-full" required>
            </div>
            <div class="mb-4">
                <label>Description</label>
                <textarea name="description" class="border px-2 py-1 w-full"></textarea>
            </div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>