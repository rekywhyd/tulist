<x-app-layout>
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
                                    <span class="arrow mr-2">▼</span> Today ({{ $todayCount }})
                                </button>
                                <div class="category-content" id="today-content">
                                    @foreach($todayTasks as $task)
                                        <div class="mb-2" data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2 flex-1">{{ $task->title }}</span>
                                                @if($task->subtasks->count() > 0)
                                                    <button class="subtask-toggle ml-2 text-gray-500" data-task="{{ $task->id }}">
                                                        <span class="subtask-arrow">▶</span>
                                                    </button>
                                                @endif
                                                <div class="relative ml-2">
                                                    <button class="task-menu-btn text-gray-500 hover:text-gray-700" data-task="{{ $task->id }}">
                                                        <span class="text-lg">⋮</span>
                                                    </button>
                        <div class="task-menu hidden absolute right-0 mt-1 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10" data-task="{{ $task->id }}">
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 details-btn" data-task="{{ $task->id }}">Details</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rename-btn" data-task="{{ $task->id }}">Rename</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 duplicate-btn" data-task="{{ $task->id }}">Duplicate</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 add-subtask-btn" data-task="{{ $task->id }}">Add Subtask</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 delete-btn" data-task="{{ $task->id }}">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="subtasks ml-6 hidden" id="subtasks-{{ $task->id }}">
                    @foreach($task->subtasks as $subtask)
                        <div class="mb-1 subtask-item {{ $subtask->completed ? 'opacity-50' : '' }}">
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
                                    <span class="arrow mr-2">▼</span> Tomorrow ({{ $tomorrowCount }})
                                </button>
                                <div class="category-content" id="tomorrow-content">
                                    @foreach($tomorrowTasks as $task)
                                        <div class="mb-2" data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2 flex-1">{{ $task->title }}</span>
                                                @if($task->subtasks->count() > 0)
                                                    <button class="subtask-toggle ml-2 text-gray-500" data-task="{{ $task->id }}">
                                                        <span class="subtask-arrow">▶</span>
                                                    </button>
                                                @endif
                                                <div class="relative ml-2">
                                                    <button class="task-menu-btn text-gray-500 hover:text-gray-700" data-task="{{ $task->id }}">
                                                        <span class="text-lg">⋮</span>
                                                    </button>
                        <div class="task-menu hidden absolute right-0 mt-1 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10" data-task="{{ $task->id }}">
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 details-btn" data-task="{{ $task->id }}">Details</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rename-btn" data-task="{{ $task->id }}">Rename</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 duplicate-btn" data-task="{{ $task->id }}">Duplicate</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 add-subtask-btn" data-task="{{ $task->id }}">Add Subtask</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 delete-btn" data-task="{{ $task->id }}">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="subtasks ml-6 hidden" id="subtasks-{{ $task->id }}">
                    @foreach($task->subtasks as $subtask)
                        <div class="mb-1 subtask-item {{ $subtask->completed ? 'opacity-50' : '' }}">
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
                                    <span class="arrow mr-2">▼</span> Upcoming ({{ $upcomingCount }})
                                </button>
                                <div class="category-content" id="upcoming-content">
                                    @foreach($upcomingTasks as $task)
                                        <div class="mb-2" data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2 flex-1">{{ $task->title }}</span>
                                                @if($task->subtasks->count() > 0)
                                                    <button class="subtask-toggle ml-2 text-gray-500" data-task="{{ $task->id }}">
                                                        <span class="subtask-arrow">▶</span>
                                                    </button>
                                                @endif
                                                <div class="relative ml-2">
                                                    <button class="task-menu-btn text-gray-500 hover:text-gray-700" data-task="{{ $task->id }}">
                                                        <span class="text-lg">⋮</span>
                                                    </button>
                        <div class="task-menu hidden absolute right-0 mt-1 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10" data-task="{{ $task->id }}">
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 details-btn" data-task="{{ $task->id }}">Details</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rename-btn" data-task="{{ $task->id }}">Rename</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 duplicate-btn" data-task="{{ $task->id }}">Duplicate</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 add-subtask-btn" data-task="{{ $task->id }}">Add Subtask</button>
                            <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 delete-btn" data-task="{{ $task->id }}">Delete</button>
                        </div>
                    </div>
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
                            <button id="add-task-btn" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Task or Reminder</button>
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

                    <!-- Rename Modal -->
                    <div id="rename-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="mt-3">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Rename Task</h3>
                                <form id="rename-form">
                                    @csrf
                                    <input type="hidden" id="rename-task-id">
                                    <div class="mb-4">
                                        <label class="block text-gray-700">New Title</label>
                                        <input type="text" id="rename-title" class="w-full px-3 py-2 border rounded" required>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="button" id="close-rename-modal" class="mr-3 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Rename</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Add Subtask Modal -->
                    <div id="add-subtask-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="mt-3">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Add Subtask</h3>
                                <form id="add-subtask-form">
                                    @csrf
                                    <input type="hidden" id="add-subtask-task-id">
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Subtask Title</label>
                                        <input type="text" id="subtask-title" class="w-full px-3 py-2 border rounded" required>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="button" id="close-add-subtask-modal" class="mr-3 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div id="delete-confirm-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="mt-3 text-center">
                                <h3 class="text-lg font-medium text-gray-900">Are you sure you want to delete this task?</h3>
                                <div class="flex justify-center mt-4">
                                    <button id="delete-no" class="mr-3 px-4 py-2 bg-gray-300 rounded">No</button>
                                    <button id="delete-yes" class="px-4 py-2 bg-red-500 text-white rounded">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Task Details Modal (Read-Only) -->
                    <div id="task-details-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="mt-3">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Task Details</h3>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold">Title</label>
                                    <p id="details-title" class="text-gray-900"></p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold">Description</label>
                                    <p id="details-description" class="text-gray-900"></p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold">Due Date</label>
                                    <p id="details-due-date" class="text-gray-900"></p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold">Priority</label>
                                    <p id="details-priority" class="text-gray-900"></p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold">Status</label>
                                    <p id="details-completed" class="text-gray-900"></p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold">Subtasks</label>
                                    <div id="details-subtasks" class="text-gray-900">
                                        <!-- Subtasks will be populated here -->
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" id="close-details-modal" class="px-4 py-2 bg-gray-300 rounded">Close</button>
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

        // Category toggle functionality with localStorage persistence
        document.querySelectorAll('.category-toggle').forEach(button => {
            const category = button.dataset.category;
            const content = document.getElementById(`${category}-content`);
            const arrow = button.querySelector('.arrow');

            // Load state from localStorage
            const isOpen = localStorage.getItem(`category-${category}-open`) === 'true';
            if (!isOpen) {
                content.classList.add('hidden');
                arrow.textContent = '▶';
            } else {
                content.classList.remove('hidden');
                arrow.textContent = '▼';
            }

            button.addEventListener('click', function() {
                const isHidden = content.classList.contains('hidden');
                if (isHidden) {
                    content.classList.remove('hidden');
                    arrow.textContent = '▼';
                    localStorage.setItem(`category-${category}-open`, 'true');
                } else {
                    content.classList.add('hidden');
                    arrow.textContent = '▶';
                    localStorage.setItem(`category-${category}-open`, 'false');
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
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('subtask-checkbox')) {
                const subtaskId = e.target.dataset.id;
                const isChecked = e.target.checked;

                fetch(`/subtasks/${subtaskId}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ completed: isChecked })
                }).then(() => {
                    // Update UI: fade subtask if checked
                    const subtaskDiv = e.target.closest('.subtask-item');
                    if (isChecked) {
                        subtaskDiv.classList.add('opacity-50');
                        e.target.nextElementSibling.classList.add('line-through', 'text-gray-500');
                    } else {
                        subtaskDiv.classList.remove('opacity-50');
                        e.target.nextElementSibling.classList.remove('line-through', 'text-gray-500');
                    }
                });
            }
        });

        // Task menu functionality
        document.addEventListener('click', function(e) {
            const taskMenuBtn = e.target.closest('.task-menu-btn');
            if (taskMenuBtn) {
                const taskId = taskMenuBtn.dataset.task;
                const menu = document.querySelector(`.task-menu[data-task="${taskId}"]`);
                // Hide all other menus
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
                menu.classList.toggle('hidden');
            } else if (!e.target.closest('.task-menu') && !e.target.closest('.task-menu-btn')) {
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
            }
        });

        // Rename button functionality
        document.addEventListener('click', function(e) {
            const renameBtn = e.target.closest('.rename-btn');
            if (renameBtn) {
                const taskId = renameBtn.dataset.task;
                document.getElementById('rename-task-id').value = taskId;
                document.getElementById('rename-title').value = document.querySelector(`.task-checkbox[data-id="${taskId}"]`).nextElementSibling.textContent;
                document.getElementById('rename-modal').classList.remove('hidden');
            }
        });

        // Close rename modal
        document.getElementById('close-rename-modal').addEventListener('click', () => {
            document.getElementById('rename-modal').classList.add('hidden');
        });

        // Save rename
        document.getElementById('rename-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const taskId = document.getElementById('rename-task-id').value;
            const newTitle = document.getElementById('rename-title').value;
            fetch(`/tasks/${taskId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ title: newTitle })
            }).then(() => {
                location.reload();
            });
        });

        // Duplicate button functionality
        document.addEventListener('click', function(e) {
            const duplicateBtn = e.target.closest('.duplicate-btn');
            if (duplicateBtn) {
                const taskId = duplicateBtn.dataset.task;
                fetch(`/tasks/${taskId}/duplicate`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(() => {
                    location.reload();
                });
            }
        });

        // Add subtask button functionality
        document.addEventListener('click', function(e) {
            const addSubtaskBtn = e.target.closest('.add-subtask-btn');
            if (addSubtaskBtn) {
                const taskId = addSubtaskBtn.dataset.task;
                document.getElementById('add-subtask-task-id').value = taskId;
                document.getElementById('add-subtask-modal').classList.remove('hidden');
            }
        });

        // Close add subtask modal
        document.getElementById('close-add-subtask-modal').addEventListener('click', () => {
            document.getElementById('add-subtask-modal').classList.add('hidden');
        });

        // Save add subtask
        document.getElementById('add-subtask-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const taskId = document.getElementById('add-subtask-task-id').value;
            const title = document.getElementById('subtask-title').value;
            fetch('/subtasks', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ task_id: taskId, title: title })
            }).then(() => {
                location.reload();
            });
        });

        // Delete button functionality
        document.addEventListener('click', function(e) {
            const deleteBtn = e.target.closest('.delete-btn');
            if (deleteBtn) {
                const taskId = deleteBtn.dataset.task;
                document.getElementById('delete-confirm-modal').classList.remove('hidden');
                document.getElementById('delete-confirm-modal').dataset.taskId = taskId;
            }
        });

        // Delete confirmation
        document.getElementById('delete-yes').addEventListener('click', () => {
            const taskId = document.getElementById('delete-confirm-modal').dataset.taskId;
            fetch(`/tasks/${taskId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => {
                location.reload();
            });
        });

        document.getElementById('delete-no').addEventListener('click', () => {
            document.getElementById('delete-confirm-modal').classList.add('hidden');
        });

        // Details button functionality (Read-Only)
        document.addEventListener('click', function(e) {
            const detailsBtn = e.target.closest('.details-btn');
            if (detailsBtn) {
                const taskId = detailsBtn.dataset.task;
                fetch(`/tasks/${taskId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('details-title').textContent = data.title || 'N/A';
                        document.getElementById('details-description').textContent = data.description || 'N/A';
                        document.getElementById('details-due-date').textContent = data.due_date || 'N/A';
                        document.getElementById('details-priority').textContent = data.priority || 'N/A';
                        document.getElementById('details-completed').textContent = data.completed ? 'Completed' : 'Not Completed';

                        // Populate subtasks
                        const subtasksContainer = document.getElementById('details-subtasks');
                        subtasksContainer.innerHTML = '';
                        if (data.subtasks && data.subtasks.length > 0) {
                            data.subtasks.forEach(subtask => {
                                const subtaskDiv = document.createElement('div');
                                subtaskDiv.className = 'mb-1';
                                subtaskDiv.innerHTML = `<span class="${subtask.completed ? 'line-through text-gray-500' : ''}">${subtask.title}</span>`;
                                subtasksContainer.appendChild(subtaskDiv);
                            });
                        } else {
                            subtasksContainer.innerHTML = '<p>No subtasks</p>';
                        }

                        document.getElementById('task-details-modal').classList.remove('hidden');
                    });
            }
        });

        // Close details modal
        document.getElementById('close-details-modal').addEventListener('click', () => {
            document.getElementById('task-details-modal').classList.add('hidden');
        });
    </script>
</x-app-layout>