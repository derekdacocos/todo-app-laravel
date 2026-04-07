<x-app-layout>
    <x-slot name="header">
        <h2>Edit Todo</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label>Title</label>
                <input type="text" name="title" value="{{ $todo->title }}" class="border px-2 py-1 w-full" required>
            </div>
            <div class="mb-4">
                <label>Description</label>
                <textarea name="description" class="border px-2 py-1 w-full">{{ $todo->description }}</textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>