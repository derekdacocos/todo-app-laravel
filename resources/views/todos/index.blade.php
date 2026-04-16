<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-center">Your To Do</h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 flex justify-center pt-10">
        <div class="w-full max-w-xl bg-white p-6 rounded-xl shadow">

            <!-- Add Button -->
            <div class="flex justify-center mb-6">
                <a href="{{ route('todos.create') }}"
                   class="bg-black text-white px-4 py-2 rounded-full text-xl hover:bg-gray-800">
                    +
                </a>
            </div>

            <!-- Todo List -->
            <div class="space-y-3">
                @foreach($todos as $todo)
                <div class="flex items-center justify-between bg-gray-50 border rounded-lg px-4 py-3">

                    <!-- Left side: Checkbox + Text -->
                    <div class="flex items-center space-x-3">

                        <!-- Checkbox -->
                        <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox"
                                onchange="this.form.submit()"
                                class="w-5 h-5"
                                {{ $todo->is_completed ? 'checked' : '' }}>
                        </form>
                        
                        <!-- Text -->
                        <div>
                            <p class="font-semibold {{ $todo->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                                {{ $todo->title }}
                            </p>
                            <p class="text-sm {{ $todo->is_completed ? 'line-through text-gray-400' : 'text-gray-500' }}">
                                {{ $todo->description }}
                            </p>
                        </div>

                    </div>

                    <!-- 3 Dot Menu -->
                    <div class="relative">
                        <button onclick="toggleMenu({{ $todo->id }})"
                                class="text-gray-500 text-xl px-2">
                            ⋮
                        </button>

                        <div id="menu-{{ $todo->id }}"
                            class="hidden absolute right-0 mt-2 w-32 bg-white border rounded shadow">

                            <a href="{{ route('todos.edit', $todo->id) }}"
                            class="block px-4 py-2 hover:bg-gray-100">
                                Edit
                            </a>

                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Dropdown Script -->
    <script>
        function toggleMenu(id) {
            const menu = document.getElementById('menu-' + id);

            // Close all other menus first
            document.querySelectorAll('[id^="menu-"]').forEach(el => {
                if (el.id !== 'menu-' + id) {
                    el.classList.add('hidden');
                }
            });

            menu.classList.toggle('hidden');
        }

        // Close menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.relative')) {
                document.querySelectorAll('[id^="menu-"]').forEach(el => {
                    el.classList.add('hidden');
                });
            }
        });
    </script>

</x-app-layout> 