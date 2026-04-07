<x-app-layout>
    <x-slot name="header">
        <h2>My Todos</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('todos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">
            Add Todo
        </a>

        <table class="mt-4 border-collapse border border-gray-300 w-full">
            <thead>
                <tr>
                    <th class="border px-2 py-1">Title</th>
                    <th class="border px-2 py-1">Description</th>
                    <th class="border px-2 py-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td class="border px-2 py-1">{{ $todo->title }}</td>
                    <td class="border px-2 py-1">{{ $todo->description }}</td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('todos.edit', $todo->id) }}" class="bg-yellow-400 px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-2 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>