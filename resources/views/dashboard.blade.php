<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <!-- Left Side: All My Task -->
                        <div class="w-1/2 pr-4">
                            <h3 class="text-lg font-semibold mb-4">All My Task</h3>

                            <!-- Today -->
                            <div class="mb-6">
                                <button class="category-toggle font-medium text-gray-700 mb-2 flex items-center" data-category="today">
                                    <span class="arrow mr-2">▼</span> Today
                                </button>
                                <div class="category-content" id="today-content">
                                    @foreach($todayTasks as $task)
                                        <div class="mb-2">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $task->title }}</span>
                                                @if($task->subtasks->count() > 0)
                                                    <button class="subtask-toggle ml-2 text-gray-500" data-task="{{ $task->id }}">
                                                        <span class="subtask-arrow">▶</span>
                                                    </button>
                                                @endif
                                            </div>
                                            <div class="subtasks ml-6 hidden" id="subtasks-{{ $task->id }}">
                                                @foreach($task->subtasks as $subtask)
                                                    <div class="mb-1">
                                                        <input type="checkbox" class="subtask-checkbox" data-id="{{ $subtask->id }}" {{ $subtask->completed ? 'checked' : '' }}>
                                                        <span class="{{ $subtask->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $subtask->title }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tomorrow -->
                            <div class="mb-6">
                                <button class="category-toggle font-medium text-gray-700 mb-2 flex items-center" data-category="tomorrow">
                                    <span class="arrow mr-2">▼</span> Tomorrow
                                </button>
                                <div class="category-content" id="tomorrow-content">
                                    @foreach($tomorrowTasks as $task)
                                        <div class="mb-2">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $task->title }}</span>
                                                @if($task->subtasks->count() > 0)
                                                    <button class="subtask-toggle ml-2 text-gray-500" data-task="{{ $task->id }}">
                                                        <span class="subtask-arrow">▶</span>
                                                    </button>
                                                @endif
                                            </div>
                                            <div class="subtasks ml-6 hidden" id="subtasks-{{ $task->id }}">
                                                @foreach($task->subtasks as $subtask)
                                                    <div class="mb-1">
                                                        <input type="checkbox" class="subtask-checkbox" data-id="{{ $subtask->id }}" {{ $subtask->completed ? 'checked' : '' }}>
                                                        <span class="{{ $subtask->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $subtask->title }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Upcoming -->
                            <div class="mb-6">
                                <button class="category-toggle font-medium text-gray-700 mb-2 flex items-center" data-category="upcoming">
                                    <span class="arrow mr-2">▼</span> Upcoming
                                </button>
                                <div class="category-content" id="upcoming-content">
                                    @foreach($upcomingTasks as $task)
                                        <div class="mb-2">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $task->title }}</span>
                                                @if($task->subtasks->count() > 0)
                                                    <button class="subtask-toggle ml-2 text-gray-500" data-task="{{ $task->id }}">
                                                        <span class="subtask-arrow">▶</span>
                                                    </button>
                                                @endif
                                            </div>
                                            <div class="subtasks ml-6 hidden" id="subtasks-{{ $task->id }}">
                                                @foreach($task->subtasks as $subtask)
                                                    <div class="mb-1">
                                                        <input type="checkbox" class="subtask-checkbox" data-id="{{ $subtask->id }}" {{ $subtask->completed ? 'checked' : '' }}>
                                                        <span class="{{ $subtask->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $subtask->title }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <button id="add-task-btn" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Task</button>
                        </div>

                        <!-- Right Side: History -->
                        <div class="w-1/2 pl-4">
                            <h3 class="text-lg font-semibold mb-4">History</h3>
                            @foreach($historyTasks as $task)
                                <div class="mb-2">
                                    <span class="line-through text-gray-500">{{ $task->title }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Add Task Modal -->
                    <div id="add-task-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="mt-3">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Task</h3>
                                <form action="{{ route('tasks.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Title</label>
                                        <input type="text" name="title" class="w-full px-3 py-2 border rounded" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Description</label>
                                        <textarea name="description" class="w-full px-3 py-2 border rounded"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Due Date</label>
                                        <input type="date" name="due_date" class="w-full px-3 py-2 border rounded" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Priority</label>
                                        <select name="priority" class="w-full px-3 py-2 border rounded" required>
                                            <option value="Urgent">Urgent</option>
                                            <option value="High">High</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Subtasks</label>
                                        <div id="subtasks-container">
                                            <input type="text" name="subtasks[]" class="w-full px-3 py-2 border rounded mb-2" placeholder="Subtask 1">
                                        </div>
                                        <button type="button" id="add-subtask-btn" class="text-blue-500">+ Add Subtask</button>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="button" id="close-modal" class="mr-3 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Add Task</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmation Modal -->
                    <div id="confirm-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="mt-3 text-center">
                                <h3 class="text-lg font-medium text-gray-900">Yakin untuk menyelesaikan tugas ini?</h3>
                                <div class="flex justify-center mt-4">
                                    <button id="confirm-no" class="mr-3 px-4 py-2 bg-gray-300 rounded">No</button>
                                    <button id="confirm-yes" class="px-4 py-2 bg-blue-500 text-white rounded">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        const addTaskBtn = document.getElementById('add-task-btn');
        const addTaskModal = document.getElementById('add-task-modal');
        const closeModal = document.getElementById('close-modal');
        const confirmModal = document.getElementById('confirm-modal');
        const confirmYes = document.getElementById('confirm-yes');
        const confirmNo = document.getElementById('confirm-no');

        addTaskBtn.addEventListener('click', () => {
            addTaskModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            addTaskModal.classList.add('hidden');
        });

        // Add subtask functionality
        const addSubtaskBtn = document.getElementById('add-subtask-btn');
        const subtasksContainer = document.getElementById('subtasks-container');

        addSubtaskBtn.addEventListener('click', () => {
            const subtaskInput = document.createElement('input');
            subtaskInput.type = 'text';
            subtaskInput.name = 'subtasks[]';
            subtaskInput.className = 'w-full px-3 py-2 border rounded mb-2';
            subtaskInput.placeholder = 'Subtask ' + (subtasksContainer.children.length + 1);
            subtasksContainer.appendChild(subtaskInput);
        });

        // Category toggle functionality
        document.querySelectorAll('.category-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const category = this.dataset.category;
                const content = document.getElementById(`${category}-content`);
                const arrow = this.querySelector('.arrow');

                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    arrow.textContent = '▼';
                } else {
                    content.classList.add('hidden');
                    arrow.textContent = '▶';
                }
            });
        });

        // Subtask toggle functionality
        document.querySelectorAll('.subtask-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const taskId = this.dataset.task;
                const subtasks = document.getElementById(`subtasks-${taskId}`);
                const arrow = this.querySelector('.subtask-arrow');

                if (subtasks.classList.contains('hidden')) {
                    subtasks.classList.remove('hidden');
                    arrow.textContent = '▼';
                } else {
                    subtasks.classList.add('hidden');
                    arrow.textContent = '▶';
                }
            });
        });

        // Task checkbox functionality
        document.querySelectorAll('.task-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    confirmModal.classList.remove('hidden');
                    confirmModal.dataset.taskId = this.dataset.id;
                }
            });
        });

        confirmYes.addEventListener('click', () => {
            const taskId = confirmModal.dataset.taskId;
            fetch(`/tasks/${taskId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ completed: true })
            }).then(() => {
                location.reload();
            });
            confirmModal.classList.add('hidden');
        });

        confirmNo.addEventListener('click', () => {
            confirmModal.classList.add('hidden');
            document.querySelector(`.task-checkbox[data-id="${confirmModal.dataset.taskId}"]`).checked = false;
        });

        // Subtask checkbox functionality
        document.querySelectorAll('.subtask-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                fetch(`/subtasks/${this.dataset.id}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ completed: this.checked })
                }).then(() => {
                    if (this.checked) {
                        this.nextElementSibling.classList.add('line-through', 'text-gray-500');
                    } else {
                        this.nextElementSibling.classList.remove('line-through', 'text-gray-500');
                    }
                });
            });
        });
    </script>
</x-app-layout>
