<x-app-layout>
    {{-- 
      Konten di bawah ini akan masuk ke slot <main> di app.blade.php.
      Kita TIDAK menggunakan <x-slot name="header"> karena layout kustom Anda tidak menentukannya.
    --}}

    <div class="w-full min-h-full p-6 shadow-lg bg-white/50 rounded-[40px]">

        <div class="flex flex-col items-start justify-between gap-4 mb-6 md:flex-row md:items-center">
            
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
                
                <div class="flex items-center mt-2 -mb-px space-x-4 border-b">
                    <button class="flex items-center px-1 py-2 space-x-2 text-blue-700 border-b-2 border-blue-700">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25H12" />
                        </svg>
                        <span class="font-semibold">Board view</span>
                    </button>
                    <button class="flex items-center px-1 py-2 space-x-2 text-gray-500 hover:text-gray-700">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Add view</span>
                    </button>
                </div>
            </div>
            
            <div class="flex items-center space-x-2">
                {{-- 
                  PENGGABUNGAN: 
                  Tombol "New List" dari desain LAMA Anda sekarang diberi 'id="add-task-btn"' 
                  dari kode BARU Anda agar bisa membuka modal Add Task. Teksnya juga diubah.
                --}}
                <button id="add-task-btn" class="px-4 py-2 font-semibold text-white bg-blue-700 rounded-lg shadow-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    + Add Task
                </button>
                <button class="p-2 text-gray-500 border rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            
            <div class="p-5 shadow-sm bg-gray-50 rounded-2xl">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Today</h2>
                <div class="space-y-3">
                    {{-- 
                      PENGGABUNGAN: 
                      Konten statis "value" diganti dengan loop fungsional dari kode BARU Anda.
                    --}}
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

            <div class="p-5 shadow-sm bg-gray-50 rounded-2xl">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Tomorrow</h2>
                <div class="space-y-3">
                    {{-- PENGGABUNGAN: Loop untuk Tomorrow Tasks --}}
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

            <div class="p-5 shadow-sm bg-gray-50 rounded-2xl">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Upcoming</h2>
                <div class="space-y-3">
                    {{-- PENGGABUNGAN: Loop untuk Upcoming Tasks --}}
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

            {{-- 
              CATATAN: 
              Bagian "History" dari kode BARU Anda tidak memiliki tempat di desain LAMA.
              Logika centang Anda (me-reload halaman) akan memindahkan task yang selesai
              ke History, yang akan ditangani oleh Controller Anda (tidak ditampilkan di sini).
            --}}

        </div>
    </div>


    {{-- 
      ======================================================================
      PENGGABUNGAN: MODAL DAN SCRIPT DARI KODE BARU ANDA
      Semua kode modal dan <script> dari file baru Anda disalin ke sini.
      ======================================================================
    --}}

    <div id="add-task-modal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-medium text-gray-900">Add New Task</h3>
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
                            <input type="text" name="subtasks[]" class="w-full px-3 py-2 mb-2 border rounded" placeholder="Subtask 1">
                        </div>
                        <button type="button" id="add-subtask-btn" class="text-blue-500">+ Add Subtask</button>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="close-modal" class="px-4 py-2 mr-3 bg-gray-300 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="confirm-modal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3 text-center">
                <h3 class="text-lg font-medium text-gray-900">Yakin untuk menyelesaikan tugas ini?</h3>
                <div class="flex justify-center mt-4">
                    <button id="confirm-no" class="px-4 py-2 mr-3 bg-gray-300 rounded">No</button>
                    <button id="confirm-yes" class="px-4 py-2 text-white bg-blue-500 rounded">Yes</button>
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

        // Add subtask button functionality (from menu)
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