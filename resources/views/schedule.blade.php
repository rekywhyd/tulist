<x-app-layout>
    <div class="min-h-full items-center mr-8 px-12 py-6 border-white shadow-md bg-white/50 rounded-[40px]">
        <h1 class="items-center ml-2 text-2xl font-bold text-center text-black font-poppins">Schedule</h1>

        <div class="mx-auto max-w-7xl">
            <!-- Header Section -->
            <div class="p-6 mt-8 mb-8 bg-white shadow-xl rounded-xl font-poppins">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-2xl font-bold text-[#1C427A]">{{ strtoupper(\Carbon\Carbon::create($year, $month)->format('F Y')) }}</h1>
                        <div class="flex space-x-2">
                            <button id="prev-month" class="p-2 transition-transform duration-200 bg-gray-100 rounded-xl hover:hover:scale-110 hover:bg-gray-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button id="next-month" class="p-2 transition-transform duration-200 bg-gray-100 rounded-xl hover:hover:scale-110 hover:bg-gray-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 text-sm">
                        <button id="toggle-view" class="px-4 py-2 text-white transition-transform duration-200 bg-blue-500 hover:hover:scale-110 rounded-3xl hover:bg-blue-600">
                            <span id="view-text">Calendar View</span>
                        </button>
                        <button id="quick-add-task" class="px-4 py-2 text-white transition-transform duration-200 bg-green-500 hover:hover:scale-110 rounded-3xl hover:bg-green-600">
                            + Add Task
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-6 mb-5">

                <!-- Calendar Grid View -->
                <div id="calendar-view" class="w-[60%] p-6 bg-white shadow-xl rounded-xl">
                    <div class="grid grid-cols-7 gap-2 mb-4">
                        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                            <div class="py-2 font-semibold text-center text-[#1C427A]">{{ $day }}</div>
                        @endforeach
                    </div>
                    <div class="grid grid-cols-7 gap-2">
                        @php
                            $startOfMonth = \Carbon\Carbon::create($year, $month, 1);
                            $endOfMonth = \Carbon\Carbon::create($year, $month, 1)->endOfMonth();
                            $startDate = $startOfMonth->copy()->startOfWeek();
                            $endDate = $endOfMonth->copy()->endOfWeek();
                        @endphp

                        @for ($date = $startDate; $date->lte($endDate); $date->addDay())
                            @php
                                $dateKey = $date->format('Y-m-d');
                                $isCurrentMonth = $date->month == $month;
                                $isToday = $date->isToday();
                                $tasksOnDate = $tasksByDate->get($dateKey, collect());
                                $incompleteTasksOnDate = $tasksOnDate->where('completed', false);
                                $urgentCount = $incompleteTasksOnDate->where('priority', 'Urgent')->count();
                                $highCount = $incompleteTasksOnDate->where('priority', 'High')->count();
                                $normalCount = $incompleteTasksOnDate->where('priority', 'Normal')->count();
                                $lowCount = $incompleteTasksOnDate->where('priority', 'Low')->count();
                                $totalTasks = $incompleteTasksOnDate->count();
                            @endphp
                            <div class="min-h-[100px] border rounded-lg p-2 {{ $isCurrentMonth ? 'bg-white' : 'bg-gray-50' }} {{ $isToday ? 'ring-2 ring-blue-500' : '' }} cursor-pointer hover:bg-gray-50 transition-colors date-cell"
                                 data-date="{{ $dateKey }}">
                                <div class="text-sm font-medium {{ $isCurrentMonth ? 'text-gray-900' : 'text-gray-400' }}">
                                    {{ $date->day }}
                                </div>
                                @if($totalTasks > 0)
                                    <div class="mt-1 space-y-1">
                                        @if($urgentCount > 0)
                                            <div class="inline-block w-2 h-2 bg-red-500 rounded-full"></div>
                                        @endif
                                        @if($highCount > 0)
                                            <div class="inline-block w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        @endif
                                        @if($normalCount > 0)
                                            <div class="inline-block w-2 h-2 bg-blue-500 rounded-full"></div>
                                        @endif
                                        @if($lowCount > 0)
                                            <div class="inline-block w-2 h-2 bg-green-500 rounded-full"></div>
                                        @endif
                                        <div class="mt-1 text-xs text-gray-500">{{ $totalTasks }}</div>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Task List Panel -->
                <div class="w-[37%] p-6 bg-white shadow-xl rounded-xl">
                    <div class="mb-4">
                        <h2 class="mb-4 text-2xl font-bold text-[#1C427A]">Tasks</h2>
                        <div class="flex mb-4 space-x-2">
                            <button class="px-3 py-1 text-sm font-medium text-blue-800 transition-transform duration-200 bg-blue-100 rounded-full hover:hover:scale-110 task-filter" data-filter="all">All Tasks</button>
                            <button class="px-3 py-1 text-sm font-medium text-gray-800 transition-transform duration-200 bg-gray-100 rounded-full hover:hover:scale-110 task-filter" data-filter="today">Today</button>
                            <button class="px-3 py-1 text-sm font-medium text-gray-800 transition-transform duration-200 bg-gray-100 rounded-full hover:hover:scale-110 task-filter" data-filter="upcoming">Upcoming</button>
                            <button class="px-3 py-1 text-sm font-medium text-gray-800 transition-transform duration-200 bg-gray-100 rounded-full hover:hover:scale-110 task-filter" data-filter="completed">Completed</button>
                        </div>
                    </div>

                    <div id="task-list" class="space-y-3 overflow-y-auto max-h-96 text-[#132C51]">
                        <!-- Tasks will be loaded here via JavaScript -->
                    </div>
                </div>
            </div>

            <!-- List View (Hidden by default) -->
            <div id="list-view" class="hidden p-6 mt-6 bg-white shadow-xl rounded-3xl">
                <h2 class="mb-4 text-xl font-bold text-gray-800">All Tasks</h2>
                <div class="space-y-3">
                    @foreach($allTasks as $task)
                        <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <input type="checkbox" class="w-5 h-5 mr-3 rounded-full task-checkbox accent-blue-500" data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full mr-2 {{ $task->priority == 'Urgent' ? 'bg-red-500' : ($task->priority == 'High' ? 'bg-yellow-500' : ($task->priority == 'Normal' ? 'bg-blue-500' : 'bg-green-500')) }}"></div>
                                    <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">{{ $task->title }}</span>
                                </div>
                                @if($task->due_date)
                                    <div class="text-sm text-gray-500">{{ $task->due_date->format('M d, Y') }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Include existing modals from view --}}
    <div id="add-task-modal" class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-80">
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
                            <option value="Urgent">Urgent</option>
                            <option value="High">High</option>
                            <option value="Normal">Normal</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700">Subtasks (Optional)</label>
                        <div id="subtasks-container">
                            <!-- No default subtask input -->
                        </div>
                        <button type="button" id="add-subtask-btn" class="text-[#1C427A]">+ Add Subtask</button>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="close-modal" class="px-4 py-2 mr-3 bg-gray-200 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 text-white bg-[#0E213D] rounded">Add Task</button>
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

    <script>
        let currentMonth = {{ $month }};
        let currentYear = {{ $year }};
        let selectedDate = null;
        let currentFilter = 'all';

        // Priority colors
        const priorityColors = {
            'Urgent': '#DC2626',
            'High': '#F59E0B',
            'Normal': '#3B82F6',
            'Low': '#10B981'
        };

        // Global task objects (keyed by task ID for better mapping)
        let allTasks = @json($allTasks->keyBy('id'));
        let todayTasks = @json($todayTasks->keyBy('id'));
        let upcomingTasks = @json($upcomingTasks->keyBy('id'));
        let completedTasks = @json($completedTasks->keyBy('id'));

        // Debugging logs
        console.log('All Tasks:', allTasks);
        console.log('Today Tasks:', todayTasks);
        console.log('Upcoming Tasks:', upcomingTasks);
        console.log('Completed Tasks:', completedTasks);

        // Load tasks for selected date or filter
        function loadTasks(date = null, filter = 'all') {
            console.log('loadTasks called with date:', date, 'filter:', filter);
            const taskList = document.getElementById('task-list');
            let tasks = [];
            let showSubtasks = false;

            if (date) {
                // Load tasks for specific date with error handling
                fetch(`/tasks?date=${date}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Fetched tasks for date', date, ':', data);
                        displayTasks(data, taskList, false);
                    })
                    .catch(error => {
                        console.error('Error loading tasks for date', date, ':', error);
                        taskList.innerHTML = '<div class="p-3 text-red-500">Error loading tasks. Please try again.</div>';
                    });
            } else {
                // Load tasks based on filter
                switch(filter) {
                    case 'today':
                        tasks = Object.values(todayTasks);
                        showSubtasks = true;
                        break;
                    case 'upcoming':
                        tasks = Object.values(upcomingTasks);
                        showSubtasks = true;
                        break;
                    case 'completed':
                        tasks = Object.values(completedTasks);
                        showSubtasks = false;
                        break;
                    default:
                        // All Tasks
                        tasks = Object.values(allTasks);
                        showSubtasks = false;
                }
                console.log('Displaying tasks for filter', filter, ':', tasks);
                displayTasks(tasks, taskList, showSubtasks);
            }
        }

        // Update task arrays when task status changes
        function updateTaskArrays(taskId, completed) {
            console.log('updateTaskArrays called with taskId:', taskId, 'completed:', completed);
            // Find the task in allTasks and update it
            if (allTasks[taskId]) {
                allTasks[taskId].completed = completed;

                // Update todayTasks
                if (todayTasks[taskId]) {
                    if (completed) {
                        delete todayTasks[taskId];
                    }
                } else if (!completed && allTasks[taskId].due_date && new Date(allTasks[taskId].due_date).toDateString() === new Date().toDateString()) {
                    todayTasks[taskId] = allTasks[taskId];
                }

                // Update upcomingTasks
                if (upcomingTasks[taskId]) {
                    if (completed) {
                        delete upcomingTasks[taskId];
                    }
                } else if (!completed && allTasks[taskId].due_date && new Date(allTasks[taskId].due_date) > new Date()) {
                    upcomingTasks[taskId] = allTasks[taskId];
                }

                // Update completedTasks
                if (completed) {
                    completedTasks[taskId] = allTasks[taskId];
                } else {
                    delete completedTasks[taskId];
                }
            }
            console.log('Updated task arrays:', { allTasks, todayTasks, upcomingTasks, completedTasks });
        }

        function displayTasks(tasks, container, showSubtasks = false) {
            console.log('displayTasks called with tasks:', tasks, 'showSubtasks:', showSubtasks);
            container.innerHTML = '';

            // Sort tasks: by date (today's tasks first, then ascending), then by priority (Urgent > High > Normal > Low)
            const today = new Date().toDateString();
            const priorityOrder = { 'Urgent': 1, 'High': 2, 'Normal': 3, 'Low': 4 };
            tasks.sort((a, b) => {
                const aDate = a.due_date ? new Date(a.due_date).toDateString() : null;
                const bDate = b.due_date ? new Date(b.due_date).toDateString() : null;
                const aIsToday = aDate === today;
                const bIsToday = bDate === today;

                // Today's tasks first
                if (aIsToday && !bIsToday) return -1;
                if (!aIsToday && bIsToday) return 1;

                // Then sort by date ascending
                if (aDate && bDate) {
                    const dateDiff = new Date(a.due_date) - new Date(b.due_date);
                    if (dateDiff !== 0) return dateDiff;
                } else if (aDate) return -1;
                else if (bDate) return 1;

                // Same date or no date, sort by priority
                return priorityOrder[a.priority] - priorityOrder[b.priority];
            });

            tasks.forEach(task => {
                const taskDiv = document.createElement('div');
                taskDiv.className = 'p-3 border rounded-lg hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow-md';
                taskDiv.setAttribute('data-task-id', task.id);

                let subtasksHtml = '';
                if (showSubtasks && task.subtasks && task.subtasks.length > 0) {
                    subtasksHtml = '<div class="mt-2 ml-5 subtasks-container"><ul class="space-y-1 text-sm text-gray-600">';
                    task.subtasks.forEach(subtask => {
                        subtasksHtml += `<li class="subtask-item flex items-center ${subtask.completed ? 'opacity-50' : ''}">
                            <input type="checkbox" class="w-5 h-5 mr-2 rounded-full subtask-checkbox accent-blue-500" data-id="${subtask.id}" ${subtask.completed ? 'checked' : ''}>
                            <span class="${subtask.completed ? 'line-through text-gray-400' : ''}">${subtask.title}</span>
                        </li>`;
                    });
                    subtasksHtml += '</ul></div>';
                }

                taskDiv.innerHTML = `
                    <div class="flex items-center justify-between">
                        <div class="flex items-center flex-1">
                            <input type="checkbox" class="w-5 h-5 mr-3 rounded-full accent-blue-500 task-checkbox" data-id="${task.id}" ${task.completed ? 'checked' : ''}>
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 mr-2 rounded-full" style="background-color: ${priorityColors[task.priority]}"></div>
                                    <span class="${task.completed ? 'line-through text-[#132C51]' : ''} text-lg translate-y-[-2px]">${task.title}</span>
                                </div>
                                ${task.due_date ? `<div class="text-sm text-gray-500">${new Date(task.due_date).toLocaleDateString()}</div>` : ''}
                            </div>
                        </div>
                        <div class="relative">
                            <button class="p-1 rounded task-menu-btn hover:bg-gray-200" data-task="${task.id}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                            <div class="absolute right-0 z-10 hidden w-48 mt-1 bg-white border rounded-md shadow-lg task-menu" data-task="${task.id}">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rename-btn" data-task="${task.id}">Rename</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 duplicate-btn" data-task="${task.id}">Duplicate</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 add-subtask-btn" data-task="${task.id}">Add Subtask</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 details-btn" data-task="${task.id}">Details</a>
                                <a href="#" class="block px-4 py-2 text-sm text-red-500 hover:bg-red-50 delete-btn" data-task="${task.id}">Delete</a>
                            </div>
                        </div>
                    </div>
                    ${subtasksHtml}
                `;
                container.appendChild(taskDiv);
            });
        }

        // Calendar navigation
        document.getElementById('prev-month').addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 1) {
                currentMonth = 12;
                currentYear--;
            }
            navigateToMonth(currentYear, currentMonth);
        });

        document.getElementById('next-month').addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
            navigateToMonth(currentYear, currentMonth);
        });

        function navigateToMonth(year, month) {
            window.location.href = `/schedule?year=${year}&month=${month}`;
        }

        // Date selection
        document.querySelectorAll('.date-cell').forEach(cell => {
            cell.addEventListener('click', () => {
                selectedDate = cell.dataset.date;
                document.querySelectorAll('.date-cell').forEach(c => c.classList.remove('bg-blue-100'));
                cell.classList.add('bg-blue-100');
                loadTasks(selectedDate);
            });
        });

        // Task filters
        document.querySelectorAll('.task-filter').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.task-filter').forEach(b => {
                    b.classList.remove('bg-blue-100', 'text-blue-800');
                    b.classList.add('bg-gray-100', 'text-gray-800');
                });
                button.classList.remove('bg-gray-100', 'text-gray-800');
                button.classList.add('bg-blue-100', 'text-blue-800');
                currentFilter = button.dataset.filter;
                loadTasks(null, currentFilter);
            });
        });

        // Toggle view
        document.getElementById('toggle-view').addEventListener('click', () => {
            const calendarView = document.getElementById('calendar-view');
            const listView = document.getElementById('list-view');
            const viewText = document.getElementById('view-text');

            if (calendarView.classList.contains('hidden')) {
                calendarView.classList.remove('hidden');
                listView.classList.add('hidden');
                viewText.textContent = 'Calendar View';
            } else {
                calendarView.classList.add('hidden');
                listView.classList.remove('hidden');
                viewText.textContent = 'List View';
            }
        });

        // Quick add task
        document.getElementById('quick-add-task').addEventListener('click', () => {
            document.getElementById('add-task-modal').classList.remove('hidden');
        });

        // Initialize
        console.log('Initializing schedule page');
        loadTasks(null, 'all');

        // Include existing JS from view for modals and task interactions
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
                // Update local arrays
                updateTaskArrays(taskId, true);
                // Reload tasks based on current filter
                loadTasks(null, currentFilter);
                confirmModal.classList.add('hidden');
            });
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
