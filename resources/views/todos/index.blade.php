<x-app-layout>
    <div class="min-h-[calc(100vh-64px)] bg-gray-100 py-10 px-4 flex justify-center">
        
        <div class="w-full flex justify-center">
            
            <!-- Card -->
            <div class="w-full max-w-xs bg-white p-6 rounded-2xl shadow-lg border border-gray-200">

                <!-- Title -->
                <h2 class="text-lg font-semibold text-center mb-5">Your To Do</h2>

                <!-- Input Bar -->
                <form action="{{ route('todos.store') }}" method="POST" class="flex items-center gap-2 mb-5">
                    @csrf
                    <input type="text" name="title" placeholder="Add new task"
                           class="flex-1 border-b border-gray-400 focus:outline-none focus:border-black text-sm pb-1">

                    <button type="submit"
                            class="bg-gray-800 text-white w-8 h-8 flex items-center justify-center rounded-md hover:bg-black transition">
                        +
                    </button>
                </form>

                <!-- Todo List -->
                <div class="space-y-2">
                    @foreach($todos as $todo)
                    <div class="flex items-center justify-between bg-gray-100 px-3 py-2 rounded-lg">

                        <div class="flex items-center gap-2">
                            <!-- Checkbox -->
                            <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox"
                                       onchange="this.form.submit()"
                                       class="w-4 h-4 cursor-pointer"
                                       {{ $todo->is_completed ? 'checked' : '' }}>
                            </form>

                            <!-- Text -->
                            <span class="text-sm {{ $todo->is_completed ? 'line-through text-gray-400' : '' }}">
                                {{ $todo->title }}
                            </span>
                        </div>

                        <!-- Delete -->
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-gray-400 hover:text-red-500 text-sm transition">
                                ✕
                            </button>
                        </form>

                    </div>
                    @endforeach
                </div>

                <!-- Task Counter -->
                <div class="mt-5 text-sm text-gray-500 text-center">
                    Your remaining todos: 
                    {{ $todos->where('is_completed', false)->count() }}
                </div>

            </div>

        </div>

    </div>
</x-app-layout>