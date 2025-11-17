<x-app-layout>
    <div class="min-h-full items-center mr-8 py-6 border-white shadow-md bg-white/50 rounded-[40px]">
        <h1 class="items-center mr-6 text-2xl font-bold text-center text-black font-poppins">Dashboard</h1>

        <div class="flex flex-row items-center justify-between mx-16 my-6 border-b-2">
            
            <div class="flex">
            
                <div class="flex items-center gap-20 text-sm font-medium font-poppins">
                    <button class="flex items-center py-2 pl-2 pr-8 space-x-10 text-black border-b-2 border-black">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 4C23 2.34315 21.6569 1 20 1H4C2.34315 1 1 2.34315 1 4V8C1 9.65685 2.34315 11 4 11H20C21.6569 11 23 9.65685 23 8V4ZM21 4C21 3.44772 20.5523 3 20 3H4C3.44772 3 3 3.44772 3 4V8C3 8.55228 3.44772 9 4 9H20C20.5523 9 21 8.55228 21 8V4Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23 16C23 14.3431 21.6569 13 20 13H4C2.34315 13 1 14.3431 1 16V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V16ZM21 16C21 15.4477 20.5523 15 20 15H4C3.44772 15 3 15.4477 3 16V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V16Z" fill="currentColor"></path> </g></svg>
                        <span>Board view</span>
                    </button>

                    <button class="flex items-center py-2 pl-2 pr-8 space-x-10 text-gray-400 hover:text-black">
                        <svg class="w-4 h-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="currentColor" d="M10,0 C15.5228475,0 20,4.4771525 20,10 C20,15.5228475 15.5228475,20 10,20 C4.4771525,20 0,15.5228475 0,10 C0,4.4771525 4.4771525,0 10,0 Z M10,5.47455848 C9.62344222,5.47455848 9.31818182,5.77981887 9.31818182,6.15637666 L9.31818182,6.15637666 L9.318,9.279 L6.19496649,9.27959198 C5.85264123,9.27959198 5.56923944,9.5318733 5.52054097,9.86065607 L5.51314831,9.96141017 C5.51314831,10.3379679 5.81840871,10.6432283 6.19496649,10.6432283 L6.19496649,10.6432283 L9.318,10.643 L9.31818182,13.7664437 C9.31818182,14.1087689 9.57046314,14.3921707 9.89924591,14.4408692 L10,14.4482619 C10.3765578,14.4482619 10.6818182,14.1430015 10.6818182,13.7664437 L10.6818182,13.7664437 L10.681,10.643 L13.8050335,10.6432283 C14.1473588,10.6432283 14.4307606,10.390947 14.479459,10.0621643 L14.4868517,9.96141017 C14.4868517,9.58485238 14.1815913,9.27959198 13.8050335,9.27959198 L13.8050335,9.27959198 L10.681,9.279 L10.6818182,6.15637666 C10.6818182,5.8140514 10.4295369,5.5306496 10.1007541,5.48195113 Z"></path> </g></svg>
                        <span>Add view</span>
                    </button>

                </div>
            </div>
        
            <div class="flex items-center gap-6 text-xs font-medium font-poppins">
                
                <button id="add-task-btn" class="px-6 py-2  text-white bg-[#0E213D] shadow-md rounded-3xl focus:outline-none focus:ring-2 focus:ring-[#0E213D] focus:ring-offset-2 transition-transform duration-200 hover:hover:scale-110">
                    New List
                </button>

                <button class="p-2 py-1 text-black transition-transform duration-200 bg-white border rounded-3xl hover:hover:scale-110">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex flex-wrap justify-center gap-8 py-4 font-poppins">
            
            {{-- TODAY --}}
            <div class="w-[44%] p-6 bg-white shadow-xl rounded-2xl">
                <h2 class="mb-4 text-3xl font-bold text-[#1C427A]">Today</h2>
                <div class="space-y-3">
                    @foreach($todayTasks as $task)
                        <div class="mb-2" data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                            <div class="flex items-center">
                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2 flex-1">{{ $task->title }}</span>
                                @if($task->subtasks->count() > 0)
                                    <button class="ml-2 text-gray-500 subtask-toggle" data-task="{{ $task->id }}">
                                        <span class="subtask-arrow">▶</span>
                                    </button>
                                @endif
                                <div class="relative ml-2">
                                    <button class="text-gray-500 task-menu-btn hover:text-gray-700" data-task="{{ $task->id }}">
                                        <span class="text-lg">⋮</span>
                                    </button>
                                    <div class="absolute right-0 z-10 hidden w-48 mt-1 bg-white border border-gray-200 rounded-md shadow-lg task-menu" data-task="{{ $task->id }}">
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 details-btn" data-task="{{ $task->id }}">Details</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 rename-btn" data-task="{{ $task->id }}">Rename</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 duplicate-btn" data-task="{{ $task->id }}">Duplicate</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 add-subtask-btn" data-task="{{ $task->id }}">Add Subtask</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100 delete-btn" data-task="{{ $task->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden ml-6 subtasks" id="subtasks-{{ $task->id }}">
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

            {{-- TOMORROW --}}
            <div class="w-[44%] p-6 bg-white shadow-xl rounded-2xl">
                <h2 class="mb-4 text-3xl font-bold text-[#1C427A]">Tomorrow</h2>
                <div class="space-y-3">
                    @foreach($tomorrowTasks as $task)
                        <div class="mb-2" data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                            <div class="flex items-center">
                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2 flex-1">{{ $task->title }}</span>
                                @if($task->subtasks->count() > 0)
                                    <button class="ml-2 text-gray-500 subtask-toggle" data-task="{{ $task->id }}">
                                        <span class="subtask-arrow">▶</span>
                                    </button>
                                @endif
                                <div class="relative ml-2">
                                    <button class="text-gray-500 task-menu-btn hover:text-gray-700" data-task="{{ $task->id }}">
                                        <span class="text-lg">⋮</span>
                                    </button>
                                    <div class="absolute right-0 z-10 hidden w-48 mt-1 bg-white border border-gray-200 rounded-md shadow-lg task-menu" data-task="{{ $task->id }}">
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 details-btn" data-task="{{ $task->id }}">Details</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 rename-btn" data-task="{{ $task->id }}">Rename</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 duplicate-btn" data-task="{{ $task->id }}">Duplicate</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 add-subtask-btn" data-task="{{ $task->id }}">Add Subtask</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100 delete-btn" data-task="{{ $task->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden ml-6 subtasks" id="subtasks-{{ $task->id }}">
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

            {{-- UPCOMING --}}
            <div class="w-[44%] p-6 bg-white shadow-xl rounded-2xl">
                <h2 class="mb-4 text-3xl font-bold text-[#1C427A]">Upcoming</h2>
                <div class="space-y-3">
                    @foreach($upcomingTasks as $task)
                        <div class="mb-2" data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                            <div class="flex items-center">
                                <input type="checkbox" class="task-checkbox" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-2 flex-1">{{ $task->title }}</span>
                                @if($task->subtasks->count() > 0)
                                    <button class="ml-2 text-gray-500 subtask-toggle" data-task="{{ $task->id }}">
                                        <span class="subtask-arrow">▶</span>
                                    </button>
                                @endif
                                <div class="relative ml-2">
                                    <button class="text-gray-500 task-menu-btn hover:text-gray-700" data-task="{{ $task->id }}">
                                        <span class="text-lg">⋮</span>
                                    </button>
                                    <div class="absolute right-0 z-10 hidden w-48 mt-1 bg-white border border-gray-200 rounded-md shadow-lg task-menu" data-task="{{ $task->id }}">
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 details-btn" data-task="{{ $task->id }}">Details</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 rename-btn" data-task="{{ $task->id }}">Rename</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 duplicate-btn" data-task="{{ $task->id }}">Duplicate</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 add-subtask-btn" data-task="{{ $task->id }}">Add Subtask</button>
                                        <button class="block w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100 delete-btn" data-task="{{ $task->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden ml-6 subtasks" id="subtasks-{{ $task->id }}">
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
        </div>
    </div>


    {{-- ====================================================================== --}}

    <div id="add-task-modal" class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 font-poppins bg-opacity-80">
        <div class="relative p-5 mx-auto bg-white border shadow-xl top-2 rounded-xl w-80">
            <div class="mt-3">
                <h3 class="mb-4 text-xl font-medium text-black">Add New Task</h3>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="block text-gray-800">Title</label>
                        <input type="text" name="title" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-800">Description</label>
                        <textarea name="description" class="w-full px-3 py-2 border rounded-lg"></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-800">Due Date</label>
                        <input type="date" name="due_date" class="w-full px-3 py-2 border rounded-lg" required value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-800">Priority</label>
                        <select name="priority" class="w-full px-3 py-2 border rounded-lg" required>
                            <option value="Urgent" class="font-semibold text-red-600 transition-transform duration-200 hover:hover:scale-110">Urgent</option>
                            <option value="High" class="font-semibold text-yellow-500">High</option>
                            <option value="Normal" class="font-semibold text-blue-600">Normal</option>
                            <option value="Low" class="font-semibold text-green-600">Low</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700">Subtasks (Optional)</label>
                        <div id="subtasks-container">
                            <!-- No default subtask input -->
                        </div>
                        <button type="button" id="add-subtask-btn" class="hover:text-[#0E213D] text-[#1C427A]">+ Add Subtask</button>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="close-modal" class="px-4 py-2 mr-3 transition-transform duration-200 bg-gray-200 rounded-lg hover:hover:scale-90">Cancel</button>
                        <button type="submit" class="transition-transform duration-200 hover:hover:scale-110 px-4 py-2 text-white bg-[#0E213D] rounded-lg">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="confirm-modal" class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 font-poppins">
        <div class="relative p-5 mx-auto bg-[#132C51] rounded-lg shadow-lg top-20 w-[500px]">
            <div class="mt-3 text-center">
                <h3 class="text-lg font-medium text-white">Are you sure you want to complete this task?</h3>
                <div class="flex justify-center mt-4">
                    <button id="confirm-no" class="px-4 py-2 mr-3 bg-white rounded-lg">No</button>
                    <button id="confirm-yes" class="px-4 py-2 text-white bg-red-500 rounded-lg">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="rename-modal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-medium text-gray-900">Rename Task</h3>
                <form id="rename-form">
                    @csrf
                    <input type="hidden" id="rename-task-id">
                    <div class="mb-4">
                        <label class="block text-gray-700">New Title</label>
                        <input type="text" id="rename-title" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="close-rename-modal" class="px-4 py-2 mr-3 bg-gray-300 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Rename</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="add-subtask-modal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-medium text-gray-900">Add Subtask</h3>
                <form id="add-subtask-form">
                    @csrf
                    <input type="hidden" id="add-subtask-task-id">
                    <div class="mb-4">
                        <label class="block text-gray-700">Subtask Title</label>
                        <input type="text" id="subtask-title" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="close-add-subtask-modal" class="px-4 py-2 mr-3 bg-gray-300 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-confirm-modal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3 text-center">
                <h3 class="text-lg font-medium text-gray-900">Are you sure you want to delete this task?</h3>
                <div class="flex justify-center mt-4">
                    <button id="delete-no" class="px-4 py-2 mr-3 bg-gray-300 rounded">No</button>
                    <button id="delete-yes" class="px-4 py-2 text-white bg-red-500 rounded">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="task-details-modal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-medium text-gray-900">Task Details</h3>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700">Title</label>
                    <p id="details-title" class="text-gray-900"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700">Description</label>
                    <p id="details-description" class="text-gray-900"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700">Due Date</label>
                    <p id="details-due-date" class="text-gray-900"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700">Priority</label>
                    <p id="details-priority" class="text-gray-900"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700">Status</label>
                    <p id="details-completed" class="text-gray-900"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700">Subtasks</label>
                    <div id="details-subtasks" class="text-gray-900">
                        </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="close-details-modal" class="px-4 py-2 bg-gray-300 rounded">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{-- 
      PENGGABUNGAN: 
      JavaScript dari kode BARU Anda.
      Satu-satunya bagian yang dihapus adalah "Category toggle functionality"
      karena kita menggunakan kolom, bukan toggle.
    --}}
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

        // Add subtask functionality (in modal)
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

        // Ensure at least one subtask input if user starts adding
        // But since it's optional, no need to force it

        // Subtask toggle functionality (in list)
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
                // Hide the task menu
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
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
                // Hide the task menu
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
            }
        });

        // Add subtask button functionality (from menu)
        document.addEventListener('click', function(e) {
            const addSubtaskBtn = e.target.closest('.add-subtask-btn');
            if (addSubtaskBtn) {
                const taskId = addSubtaskBtn.dataset.task;
                document.getElementById('add-subtask-task-id').value = taskId;
                document.getElementById('add-subtask-modal').classList.remove('hidden');
                // Hide the task menu
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
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
                // Hide the task menu
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
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
                        // Hide the task menu
                        document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
                    });
            }
        });

        // Close details modal
        document.getElementById('close-details-modal').addEventListener('click', () => {
            document.getElementById('task-details-modal').classList.add('hidden');
        });
    </script>
</x-app-layout>