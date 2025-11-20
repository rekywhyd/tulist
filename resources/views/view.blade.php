<x-app-layout>
    <div class="min-h-full items-center mr-8 ml-20 py-6 border-white shadow-md bg-white/50 rounded-[40px] pt-6 mt-20">
        <h1 class="items-center mr-4 text-4xl font-bold text-center text-black font-poppins">View</h1>

        <div class="flex flex-row items-center justify-between mx-16 my-6 border-b-2">

            <div class="flex">

                <div class="flex items-center gap-20 text-base font-medium font-poppins">
                    <button class="flex items-center py-2 pl-2 pr-8 space-x-10 text-black border-b-2 border-black">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23 4C23 2.34315 21.6569 1 20 1H4C2.34315 1 1 2.34315 1 4V8C1 9.65685 2.34315 11 4 11H20C21.6569 11 23 9.65685 23 8V4ZM21 4C21 3.44772 20.5523 3 20 3H4C3.44772 3 3 3.44772 3 4V8C3 8.55228 3.44772 9 4 9H20C20.5523 9 21 8.55228 21 8V4Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23 16C23 14.3431 21.6569 13 20 13H4C2.34315 13 1 14.3431 1 16V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V16ZM21 16C21 15.4477 20.5523 15 20 15H4C3.44772 15 3 15.4477 3 16V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V16Z"
                                    fill="currentColor"></path>
                            </g>
                        </svg>
                        <span>Board view</span>
                    </button>

                    <button class="flex items-center py-2 pl-2 pr-8 space-x-10 text-gray-400 hover:text-black">
                        <svg class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill="currentColor"
                                    d="M10,0 C15.5228475,0 20,4.4771525 20,10 C20,15.5228475 15.5228475,20 10,20 C4.4771525,20 0,15.5228475 0,10 C0,4.4771525 4.4771525,0 10,0 Z M10,5.47455848 C9.62344222,5.47455848 9.31818182,5.77981887 9.31818182,6.15637666 L9.31818182,6.15637666 L9.318,9.279 L6.19496649,9.27959198 C5.85264123,9.27959198 5.56923944,9.5318733 5.52054097,9.86065607 L5.51314831,9.96141017 C5.51314831,10.3379679 5.81840871,10.6432283 6.19496649,10.6432283 L6.19496649,10.6432283 L9.318,10.643 L9.31818182,13.7664437 C9.31818182,14.1087689 9.57046314,14.3921707 9.89924591,14.4408692 L10,14.4482619 C10.3765578,14.4482619 10.6818182,14.1430015 10.6818182,13.7664437 L10.6818182,13.7664437 L10.681,10.643 L13.8050335,10.6432283 C14.1473588,10.6432283 14.4307606,10.390947 14.479459,10.0621643 L14.4868517,9.96141017 C14.4868517,9.58485238 14.1815913,9.27959198 13.8050335,9.27959198 L13.8050335,9.27959198 L10.681,9.279 L10.6818182,6.15637666 C10.6818182,5.8140514 10.4295369,5.5306496 10.1007541,5.48195113 Z">
                                </path>
                            </g>
                        </svg>
                        <span>Add view</span>
                    </button>

                </div>
            </div>

            <div class="flex items-center gap-4">
                <button id="add-task-btn"
                    class="px-6 py-2 text-sm font-medium font-poppins text-white bg-[#0E213D] shadow-md rounded-3xl focus:outline-none focus:ring-2 focus:ring-[#0E213D] focus:ring-offset-2 transition-transform duration-200 hover:hover:scale-110">
                    + New Task
                </button>
            </div>

        </div>

        <div class="flex flex-wrap justify-center gap-8 py-4 font-poppins">

            {{-- TODAY --}}
            <div class="w-[44%] p-6 bg-white shadow-xl rounded-2xl">
                <h2 class="mb-4 text-3xl font-bold text-[#1C427A]">Today</h2>
                <div class="space-y-4 text-lg text-[#132C51]">
                    @foreach ($todayTasks as $task)
                        <div class="mb-2"
                            data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                            <div class="flex items-center ml-4">
                                <input type="checkbox" class="w-5 h-5 rounded-full task-checkbox accent-blue-500"
                                    data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                <span
                                    class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-4 flex-1">{{ $task->title }}</span>
                                @if ($task->subtasks->count() > 0)
                                    <button class="ml-2 text-gray-500 subtask-toggle" data-task="{{ $task->id }}">
                                        <svg class="w-6 h-6 transition-transform duration-200 subtask-arrow hover:hover:scale-110"
                                            fill="#6b7280" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M15 10l-9 5V5l9 5z"></path>
                                            </g>
                                        </svg>
                                    </button>
                                @endif
                                <div class="relative ml-2">
                                    <button class="text-gray-500 task-menu-btn hover:text-gray-700"
                                        data-task="{{ $task->id }}">
                                        <svg class="w-3 h-3 transition-transform duration-200 hover:hover:scale-110"
                                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M19 16a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3zm0 13a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3zm0-26a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3z"
                                                    fill="#6b7280"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="absolute right-0 z-10 hidden w-48 mt-1 shadow-xl rounded-xl bg-[#0C1F3B] task-menu"
                                        data-task="{{ $task->id }}">
                                        <button
                                            class="flex items-center w-full gap-2 px-4 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 details-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M3 9C2.44772 9 2 9.44772 2 10C2 10.5523 2.44772 11 3 11H21C21.5523 11 22 10.5523 22 10C22 9.44772 21.5523 9 21 9H3Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M3 13C2.44772 13 2 13.4477 2 14C2 14.5523 2.44772 15 3 15H15C15.5523 15 16 14.5523 16 14C16 13.4477 15.5523 13 15 13H3Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Details</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 rename-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.75 2C11.3358 2 11 2.33579 11 2.75C11 3.16421 11.3358 3.5 11.75 3.5H13.25V24.5H11.75C11.3358 24.5 11 24.8358 11 25.25C11 25.6642 11.3358 26 11.75 26H16.25C16.6642 26 17 25.6642 17 25.25C17 24.8358 16.6642 24.5 16.25 24.5H14.75V3.5H16.25C16.6642 3.5 17 3.16421 17 2.75C17 2.33579 16.6642 2 16.25 2H11.75Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M6.25 6.01958H12.25V7.51958H6.25C5.2835 7.51958 4.5 8.30308 4.5 9.26958V18.7696C4.5 19.7361 5.2835 20.5196 6.25 20.5196H12.25V22.0196H6.25C4.45507 22.0196 3 20.5645 3 18.7696V9.26958C3 7.47465 4.45507 6.01958 6.25 6.01958Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M21.75 20.5196H15.75V22.0196H21.75C23.5449 22.0196 25 20.5645 25 18.7696V9.26958C25 7.47465 23.5449 6.01958 21.75 6.01958H15.75V7.51958H21.75C22.7165 7.51958 23.5 8.30308 23.5 9.26958V18.7696C23.5 19.7361 22.7165 20.5196 21.75 20.5196Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Rename</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 duplicate-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                transform="matrix(-1, 0, 0, 1, 0, 0)">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M18 3H4C3.44772 3 3 3.44772 3 4V18C3 18.5523 2.55228 19 2 19C1.44772 19 1 18.5523 1 18V4C1 2.34315 2.34315 1 4 1H18C18.5523 1 19 1.44772 19 2C19 2.55228 18.5523 3 18 3Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M13 11C13 10.4477 13.4477 10 14 10C14.5523 10 15 10.4477 15 11V13H17C17.5523 13 18 13.4477 18 14C18 14.5523 17.5523 15 17 15H15V17C15 17.5523 14.5523 18 14 18C13.4477 18 13 17.5523 13 17V15H11C10.4477 15 10 14.5523 10 14C10 13.4477 10.4477 13 11 13H13V11Z"
                                                        fill="#FFFFFF"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M20 5C21.6569 5 23 6.34315 23 8V20C23 21.6569 21.6569 23 20 23H8C6.34315 23 5 21.6569 5 20V8C5 6.34315 6.34315 5 8 5H20ZM20 7C20.5523 7 21 7.44772 21 8V20C21 20.5523 20.5523 21 20 21H8C7.44772 21 7 20.5523 7 20V8C7 7.44772 7.44772 7 8 7H20Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Duplicate</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 add-subtask-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                        stroke="#FFFFFF" stroke-width="1.5"></path>
                                                    <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15"
                                                        stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round">
                                                    </path>
                                                </g>
                                            </svg>
                                            Add Subtask</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-2 py-2 text-sm font-medium text-left text-red-500 shadow-xl rounded-xl hover:bg-gray-600 delete-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M6 5H18M9 5V5C10.5769 3.16026 13.4231 3.16026 15 5V5M9 20H15C16.1046 20 17 19.1046 17 18V9C17 8.44772 16.5523 8 16 8H8C7.44772 8 7 8.44772 7 9V18C7 19.1046 7.89543 20 9 20Z"
                                                        stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                            Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden ml-14 subtasks" id="subtasks-{{ $task->id }}">
                                @foreach ($task->subtasks as $subtask)
                                    <div class="mb-1 subtask-item {{ $subtask->completed ? 'opacity-50' : '' }}">
                                        <input type="checkbox"
                                            class="w-4 h-4 rounded-full subtask-checkbox accent-blue-500"
                                            data-id="{{ $subtask->id }}" {{ $subtask->completed ? 'checked' : '' }}>
                                        <span
                                            class="{{ $subtask->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $subtask->title }}</span>
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
                <div class="space-y-4 text-lg text-[#132C51]">
                    @foreach ($tomorrowTasks as $task)
                        <div class="mb-2"
                            data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                            <div class="flex items-center ml-4">
                                <input type="checkbox" class="w-5 h-5 rounded-full task-checkbox accent-blue-500"
                                    data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                <span
                                    class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-4 flex-1">{{ $task->title }}</span>
                                @if ($task->subtasks->count() > 0)
                                    <button class="ml-2 text-gray-500 subtask-toggle"
                                        data-task="{{ $task->id }}">
                                        <svg class="w-6 h-6 transition-transform duration-200 subtask-arrow hover:hover:scale-110"
                                            fill="#6b7280" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M15 10l-9 5V5l9 5z"></path>
                                            </g>
                                        </svg>
                                    </button>
                                @endif
                                <div class="relative ml-2">
                                    <button class="text-gray-500 task-menu-btn hover:text-gray-700"
                                        data-task="{{ $task->id }}">
                                        <svg class="w-3 h-3 transition-transform duration-200 hover:hover:scale-110"
                                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M19 16a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3zm0 13a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3zm0-26a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3z"
                                                    fill="#6b7280"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="absolute right-0 z-10 hidden w-48 mt-1 shadow-xl rounded-xl bg-[#0C1F3B] task-menu"
                                        data-task="{{ $task->id }}">
                                        <button
                                            class="flex items-center w-full gap-2 px-4 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 details-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M3 9C2.44772 9 2 9.44772 2 10C2 10.5523 2.44772 11 3 11H21C21.5523 11 22 10.5523 22 10C22 9.44772 21.5523 9 21 9H3Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M3 13C2.44772 13 2 13.4477 2 14C2 14.5523 2.44772 15 3 15H15C15.5523 15 16 14.5523 16 14C16 13.4477 15.5523 13 15 13H3Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Details</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 rename-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.75 2C11.3358 2 11 2.33579 11 2.75C11 3.16421 11.3358 3.5 11.75 3.5H13.25V24.5H11.75C11.3358 24.5 11 24.8358 11 25.25C11 25.6642 11.3358 26 11.75 26H16.25C16.6642 26 17 25.6642 17 25.25C17 24.8358 16.6642 24.5 16.25 24.5H14.75V3.5H16.25C16.6642 3.5 17 3.16421 17 2.75C17 2.33579 16.6642 2 16.25 2H11.75Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M6.25 6.01958H12.25V7.51958H6.25C5.2835 7.51958 4.5 8.30308 4.5 9.26958V18.7696C4.5 19.7361 5.2835 20.5196 6.25 20.5196H12.25V22.0196H6.25C4.45507 22.0196 3 20.5645 3 18.7696V9.26958C3 7.47465 4.45507 6.01958 6.25 6.01958Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M21.75 20.5196H15.75V22.0196H21.75C23.5449 22.0196 25 20.5645 25 18.7696V9.26958C25 7.47465 23.5449 6.01958 21.75 6.01958H15.75V7.51958H21.75C22.7165 7.51958 23.5 8.30308 23.5 9.26958V18.7696C23.5 19.7361 22.7165 20.5196 21.75 20.5196Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Rename</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 duplicate-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                transform="matrix(-1, 0, 0, 1, 0, 0)">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M18 3H4C3.44772 3 3 3.44772 3 4V18C3 18.5523 2.55228 19 2 19C1.44772 19 1 18.5523 1 18V4C1 2.34315 2.34315 1 4 1H18C18.5523 1 19 1.44772 19 2C19 2.55228 18.5523 3 18 3Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M13 11C13 10.4477 13.4477 10 14 10C14.5523 10 15 10.4477 15 11V13H17C17.5523 13 18 13.4477 18 14C18 14.5523 17.5523 15 17 15H15V17C15 17.5523 14.5523 18 14 18C13.4477 18 13 17.5523 13 17V15H11C10.4477 15 10 14.5523 10 14C10 13.4477 10.4477 13 11 13H13V11Z"
                                                        fill="#FFFFFF"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M20 5C21.6569 5 23 6.34315 23 8V20C23 21.6569 21.6569 23 20 23H8C6.34315 23 5 21.6569 5 20V8C5 6.34315 6.34315 5 8 5H20ZM20 7C20.5523 7 21 7.44772 21 8V20C21 20.5523 20.5523 21 20 21H8C7.44772 21 7 20.5523 7 20V8C7 7.44772 7.44772 7 8 7H20Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Duplicate</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 add-subtask-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                        stroke="#FFFFFF" stroke-width="1.5"></path>
                                                    <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15"
                                                        stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round">
                                                    </path>
                                                </g>
                                            </svg>
                                            Add Subtask</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-2 py-2 text-sm font-medium text-left text-red-500 shadow-xl rounded-xl hover:bg-gray-600 delete-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M6 5H18M9 5V5C10.5769 3.16026 13.4231 3.16026 15 5V5M9 20H15C16.1046 20 17 19.1046 17 18V9C17 8.44772 16.5523 8 16 8H8C7.44772 8 7 8.44772 7 9V18C7 19.1046 7.89543 20 9 20Z"
                                                        stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                            Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden ml-14 subtasks" id="subtasks-{{ $task->id }}">
                                @foreach ($task->subtasks as $subtask)
                                    <div class="mb-1 subtask-item {{ $subtask->completed ? 'opacity-50' : '' }}">
                                        <input type="checkbox"
                                            class="w-4 h-4 rounded-full subtask-checkbox accent-blue-500"
                                            data-id="{{ $subtask->id }}" {{ $subtask->completed ? 'checked' : '' }}>
                                        <span
                                            class="{{ $subtask->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $subtask->title }}</span>
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
                <div class="space-y-4 text-lg text-[#132C51]">
                    @foreach ($upcomingTasks as $task)
                        <div class="mb-2"
                            data-original-due-date="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                            <div class="flex items-center ml-4">
                                <input type="checkbox" class="w-5 h-5 rounded-full task-checkbox accent-blue-500"
                                    data-id="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                <span
                                    class="{{ $task->completed ? 'line-through text-gray-500' : '' }} ml-4 flex-1">{{ $task->title }}</span>
                                @if ($task->subtasks->count() > 0)
                                    <button class="ml-2 text-gray-500 subtask-toggle"
                                        data-task="{{ $task->id }}">
                                        <svg class="w-6 h-6 transition-transform duration-200 subtask-arrow hover:hover:scale-110"
                                            fill="#6b7280" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M15 10l-9 5V5l9 5z"></path>
                                            </g>
                                        </svg>
                                    </button>
                                @endif
                                <div class="relative ml-2">
                                    <button class="text-gray-500 task-menu-btn hover:text-gray-700"
                                        data-task="{{ $task->id }}">
                                        <svg class="w-3 h-3 transition-transform duration-200 hover:hover:scale-110"
                                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M19 16a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3zm0 13a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3zm0-26a3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3 3 3 0 0 1 3 3z"
                                                    fill="#6b7280"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="absolute right-0 z-10 hidden w-48 mt-1 shadow-xl rounded-xl bg-[#0C1F3B] task-menu"
                                        data-task="{{ $task->id }}">
                                        <button
                                            class="flex items-center w-full gap-2 px-4 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 details-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M3 9C2.44772 9 2 9.44772 2 10C2 10.5523 2.44772 11 3 11H21C21.5523 11 22 10.5523 22 10C22 9.44772 21.5523 9 21 9H3Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M3 13C2.44772 13 2 13.4477 2 14C2 14.5523 2.44772 15 3 15H15C15.5523 15 16 14.5523 16 14C16 13.4477 15.5523 13 15 13H3Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Details</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 rename-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M11.75 2C11.3358 2 11 2.33579 11 2.75C11 3.16421 11.3358 3.5 11.75 3.5H13.25V24.5H11.75C11.3358 24.5 11 24.8358 11 25.25C11 25.6642 11.3358 26 11.75 26H16.25C16.6642 26 17 25.6642 17 25.25C17 24.8358 16.6642 24.5 16.25 24.5H14.75V3.5H16.25C16.6642 3.5 17 3.16421 17 2.75C17 2.33579 16.6642 2 16.25 2H11.75Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M6.25 6.01958H12.25V7.51958H6.25C5.2835 7.51958 4.5 8.30308 4.5 9.26958V18.7696C4.5 19.7361 5.2835 20.5196 6.25 20.5196H12.25V22.0196H6.25C4.45507 22.0196 3 20.5645 3 18.7696V9.26958C3 7.47465 4.45507 6.01958 6.25 6.01958Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M21.75 20.5196H15.75V22.0196H21.75C23.5449 22.0196 25 20.5645 25 18.7696V9.26958C25 7.47465 23.5449 6.01958 21.75 6.01958H15.75V7.51958H21.75C22.7165 7.51958 23.5 8.30308 23.5 9.26958V18.7696C23.5 19.7361 22.7165 20.5196 21.75 20.5196Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Rename</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 duplicate-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                transform="matrix(-1, 0, 0, 1, 0, 0)">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M18 3H4C3.44772 3 3 3.44772 3 4V18C3 18.5523 2.55228 19 2 19C1.44772 19 1 18.5523 1 18V4C1 2.34315 2.34315 1 4 1H18C18.5523 1 19 1.44772 19 2C19 2.55228 18.5523 3 18 3Z"
                                                        fill="#FFFFFF"></path>
                                                    <path
                                                        d="M13 11C13 10.4477 13.4477 10 14 10C14.5523 10 15 10.4477 15 11V13H17C17.5523 13 18 13.4477 18 14C18 14.5523 17.5523 15 17 15H15V17C15 17.5523 14.5523 18 14 18C13.4477 18 13 17.5523 13 17V15H11C10.4477 15 10 14.5523 10 14C10 13.4477 10.4477 13 11 13H13V11Z"
                                                        fill="#FFFFFF"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M20 5C21.6569 5 23 6.34315 23 8V20C23 21.6569 21.6569 23 20 23H8C6.34315 23 5 21.6569 5 20V8C5 6.34315 6.34315 5 8 5H20ZM20 7C20.5523 7 21 7.44772 21 8V20C21 20.5523 20.5523 21 20 21H8C7.44772 21 7 20.5523 7 20V8C7 7.44772 7.44772 7 8 7H20Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </svg>
                                            Duplicate</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-3 py-2 text-sm font-medium text-left text-white shadow-xl rounded-xl hover:bg-gray-600 add-subtask-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                        stroke="#FFFFFF" stroke-width="1.5"></path>
                                                    <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15"
                                                        stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round">
                                                    </path>
                                                </g>
                                            </svg>
                                            Add Subtask</button>
                                        <button
                                            class="flex items-center w-full gap-3 px-2 py-2 text-sm font-medium text-left text-red-500 shadow-xl rounded-xl hover:bg-gray-600 delete-btn"
                                            data-task="{{ $task->id }}">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M6 5H18M9 5V5C10.5769 3.16026 13.4231 3.16026 15 5V5M9 20H15C16.1046 20 17 19.1046 17 18V9C17 8.44772 16.5523 8 16 8H8C7.44772 8 7 8.44772 7 9V18C7 19.1046 7.89543 20 9 20Z"
                                                        stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                            Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden ml-14 subtasks" id="subtasks-{{ $task->id }}">
                                @foreach ($task->subtasks as $subtask)
                                    <div class="mb-1 subtask-item {{ $subtask->completed ? 'opacity-50' : '' }}">
                                        <input type="checkbox"
                                            class="w-4 h-4 rounded-full subtask-checkbox accent-blue-500"
                                            data-id="{{ $subtask->id }}" {{ $subtask->completed ? 'checked' : '' }}>
                                        <span
                                            class="{{ $subtask->completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $subtask->title }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="add-task-modal"
        class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 font-poppins bg-opacity-80">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-5 bg-[#132C51] shadow-xl rounded-xl w-[600px]">
            <div class="mt-3">
                <h3 class="mb-8 text-2xl font-semibold text-white">New Task</h3>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <input placeholder="Title Name" type="text" name="title"
                            class="w-full px-3 py-2 border text-white border-gray-600 bg-[#0C1F3B] rounded-lg"
                            required>
                    </div>
                    <div class="mb-4">
                        <textarea placeholder="Add Description" name="description"
                            class="w-full bg-[#0C1F3B] px-3 text-white py-2 border-gray-600 border rounded-lg"></textarea>
                    </div>

                    {{-- 2 in 1 --}}
                    <div class="flex flex-wrap justify-center gap-2 mb-5">

                        {{-- DATE --}}
                        <input type="date" name="due_date"
                            class="w-[49%] text-white bg-[#0C1F3B] border-gray-600 px-3 py-2 border rounded-lg [color-scheme:dark]"
                            required value="{{ date('Y-m-d') }}">

                        {{-- PRIORITY --}}
                        <div x-data="{ open: false, selected: null }" class="relative w-[49%]">

                            <button @click="open = !open" type="button"
                                class="flex items-center w-full gap-2 px-3 py-2 text-left bg-[#0C1F3B] border border-gray-300 rounded-lg"
                                :class="{
                                    'bg-red-50 border-red-300 text-red-700': selected === 'Urgent',
                                    'bg-yellow-50 border-yellow-300 text-yellow-700': selected === 'High',
                                    'bg-blue-50 border-blue-300 text-blue-700': selected === 'Normal',
                                    'bg-green-50 border-green-300 text-green-700': selected === 'Low',
                                    'text-white border-gray-600': selected === null
                                }">

                                <svg class="w-5 h-5"
                                    :class="{
                                        'text-red-500': selected === 'Urgent',
                                        'text-yellow-500': selected === 'High',
                                        'text-blue-500': selected === 'Normal',
                                        'text-green-500': selected === 'Low',
                                        'text-gray-400': selected === null
                                    }"
                                    fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M19.42 4.44994C19.3203 4.38116 19.2053 4.3379 19.085 4.32395C18.9647 4.31 18.8428 4.32579 18.73 4.36994C17.5425 4.8846 16.2857 5.22155 15 5.36994C14.1879 5.15273 13.4127 4.81569 12.7 4.36994C11.7802 3.80143 10.763 3.40813 9.7 3.20994C8.41 3.08994 5.34 4.09994 4.7 4.30994C4.55144 4.36012 4.42234 4.4556 4.33086 4.58295C4.23938 4.71031 4.19012 4.86314 4.19 5.01994V19.9999C4.19 20.1989 4.26902 20.3896 4.40967 20.5303C4.55032 20.6709 4.74109 20.7499 4.94 20.7499C5.13891 20.7499 5.32968 20.6709 5.47033 20.5303C5.61098 20.3896 5.69 20.1989 5.69 19.9999V14.1399C6.93659 13.6982 8.23315 13.4127 9.55 13.2899C10.3967 13.4978 11.2062 13.8351 11.95 14.2899C12.8201 14.8218 13.7734 15.2038 14.77 15.4199H15C16.4474 15.2326 17.8633 14.8526 19.21 14.2899C19.3506 14.2342 19.4713 14.1379 19.5568 14.0132C19.6423 13.8885 19.6887 13.7411 19.69 13.5899V5.06994C19.6975 4.95258 19.6769 4.83512 19.63 4.7273C19.583 4.61947 19.511 4.5244 19.42 4.44994Z"
                                            fill="currentColor"></path>
                                    </g>
                                </svg>

                                <span x-text="selected || 'Priority'" class="flex-1"></span>


                            </button>

                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute z-10 w-full p-1 mt-1 bg-[#EAF0FA] rounded-xl shadow-xl">

                                <div @click="selected = 'Urgent'; open = false"
                                    class="flex items-center gap-2 p-2 rounded-md cursor-pointer hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M19.42 4.44994C19.3203 4.38116 19.2053 4.3379 19.085 4.32395C18.9647 4.31 18.8428 4.32579 18.73 4.36994C17.5425 4.8846 16.2857 5.22155 15 5.36994C14.1879 5.15273 13.4127 4.81569 12.7 4.36994C11.7802 3.80143 10.763 3.40813 9.7 3.20994C8.41 3.08994 5.34 4.09994 4.7 4.30994C4.55144 4.36012 4.42234 4.4556 4.33086 4.58295C4.23938 4.71031 4.19012 4.86314 4.19 5.01994V19.9999C4.19 20.1989 4.26902 20.3896 4.40967 20.5303C4.55032 20.6709 4.74109 20.7499 4.94 20.7499C5.13891 20.7499 5.32968 20.6709 5.47033 20.5303C5.61098 20.3896 5.69 20.1989 5.69 19.9999V14.1399C6.93659 13.6982 8.23315 13.4127 9.55 13.2899C10.3967 13.4978 11.2062 13.8351 11.95 14.2899C12.8201 14.8218 13.7734 15.2038 14.77 15.4199H15C16.4474 15.2326 17.8633 14.8526 19.21 14.2899C19.3506 14.2342 19.4713 14.1379 19.5568 14.0132C19.6423 13.8885 19.6887 13.7411 19.69 13.5899V5.06994C19.6975 4.95258 19.6769 4.83512 19.63 4.7273C19.583 4.61947 19.511 4.5244 19.42 4.44994Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <span class="font-semibold text-black">Urgent</span>
                                </div>

                                <div @click="selected = 'High'; open = false"
                                    class="flex items-center gap-2 p-2 rounded-md cursor-pointer hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M19.42 4.44994C19.3203 4.38116 19.2053 4.3379 19.085 4.32395C18.9647 4.31 18.8428 4.32579 18.73 4.36994C17.5425 4.8846 16.2857 5.22155 15 5.36994C14.1879 5.15273 13.4127 4.81569 12.7 4.36994C11.7802 3.80143 10.763 3.40813 9.7 3.20994C8.41 3.08994 5.34 4.09994 4.7 4.30994C4.55144 4.36012 4.42234 4.4556 4.33086 4.58295C4.23938 4.71031 4.19012 4.86314 4.19 5.01994V19.9999C4.19 20.1989 4.26902 20.3896 4.40967 20.5303C4.55032 20.6709 4.74109 20.7499 4.94 20.7499C5.13891 20.7499 5.32968 20.6709 5.47033 20.5303C5.61098 20.3896 5.69 20.1989 5.69 19.9999V14.1399C6.93659 13.6982 8.23315 13.4127 9.55 13.2899C10.3967 13.4978 11.2062 13.8351 11.95 14.2899C12.8201 14.8218 13.7734 15.2038 14.77 15.4199H15C16.4474 15.2326 17.8633 14.8526 19.21 14.2899C19.3506 14.2342 19.4713 14.1379 19.5568 14.0132C19.6423 13.8885 19.6887 13.7411 19.69 13.5899V5.06994C19.6975 4.95258 19.6769 4.83512 19.63 4.7273C19.583 4.61947 19.511 4.5244 19.42 4.44994Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <span class="font-semibold text-black">High</span>
                                </div>

                                <div @click="selected = 'Normal'; open = false"
                                    class="flex items-center gap-2 p-2 rounded-md cursor-pointer hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M19.42 4.44994C19.3203 4.38116 19.2053 4.3379 19.085 4.32395C18.9647 4.31 18.8428 4.32579 18.73 4.36994C17.5425 4.8846 16.2857 5.22155 15 5.36994C14.1879 5.15273 13.4127 4.81569 12.7 4.36994C11.7802 3.80143 10.763 3.40813 9.7 3.20994C8.41 3.08994 5.34 4.09994 4.7 4.30994C4.55144 4.36012 4.42234 4.4556 4.33086 4.58295C4.23938 4.71031 4.19012 4.86314 4.19 5.01994V19.9999C4.19 20.1989 4.26902 20.3896 4.40967 20.5303C4.55032 20.6709 4.74109 20.7499 4.94 20.7499C5.13891 20.7499 5.32968 20.6709 5.47033 20.5303C5.61098 20.3896 5.69 20.1989 5.69 19.9999V14.1399C6.93659 13.6982 8.23315 13.4127 9.55 13.2899C10.3967 13.4978 11.2062 13.8351 11.95 14.2899C12.8201 14.8218 13.7734 15.2038 14.77 15.4199H15C16.4474 15.2326 17.8633 14.8526 19.21 14.2899C19.3506 14.2342 19.4713 14.1379 19.5568 14.0132C19.6423 13.8885 19.6887 13.7411 19.69 13.5899V5.06994C19.6975 4.95258 19.6769 4.83512 19.63 4.7273C19.583 4.61947 19.511 4.5244 19.42 4.44994Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <span class="font-semibold text-black">Normal</span>
                                </div>

                                <div @click="selected = 'Low'; open = false"
                                    class="flex items-center gap-2 p-2 rounded-md cursor-pointer hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M19.42 4.44994C19.3203 4.38116 19.2053 4.3379 19.085 4.32395C18.9647 4.31 18.8428 4.32579 18.73 4.36994C17.5425 4.8846 16.2857 5.22155 15 5.36994C14.1879 5.15273 13.4127 4.81569 12.7 4.36994C11.7802 3.80143 10.763 3.40813 9.7 3.20994C8.41 3.08994 5.34 4.09994 4.7 4.30994C4.55144 4.36012 4.42234 4.4556 4.33086 4.58295C4.23938 4.71031 4.19012 4.86314 4.19 5.01994V19.9999C4.19 20.1989 4.26902 20.3896 4.40967 20.5303C4.55032 20.6709 4.74109 20.7499 4.94 20.7499C5.13891 20.7499 5.32968 20.6709 5.47033 20.5303C5.61098 20.3896 5.69 20.1989 5.69 19.9999V14.1399C6.93659 13.6982 8.23315 13.4127 9.55 13.2899C10.3967 13.4978 11.2062 13.8351 11.95 14.2899C12.8201 14.8218 13.7734 15.2038 14.77 15.4199H15C16.4474 15.2326 17.8633 14.8526 19.21 14.2899C19.3506 14.2342 19.4713 14.1379 19.5568 14.0132C19.6423 13.8885 19.6887 13.7411 19.69 13.5899V5.06994C19.6975 4.95258 19.6769 4.83512 19.63 4.7273C19.583 4.61947 19.511 4.5244 19.42 4.44994Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <span class="font-semibold text-gray-800">Low</span>
                                </div>

                                <div @click="selected = null; open = false"
                                    class="flex items-center gap-2 p-2 rounded-md cursor-pointer hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M19.42 4.44994C19.3203 4.38116 19.2053 4.3379 19.085 4.32395C18.9647 4.31 18.8428 4.32579 18.73 4.36994C17.5425 4.8846 16.2857 5.22155 15 5.36994C14.1879 5.15273 13.4127 4.81569 12.7 4.36994C11.7802 3.80143 10.763 3.40813 9.7 3.20994C8.41 3.08994 5.34 4.09994 4.7 4.30994C4.55144 4.36012 4.42234 4.4556 4.33086 4.58295C4.23938 4.71031 4.19012 4.86314 4.19 5.01994V19.9999C4.19 20.1989 4.26902 20.3896 4.40967 20.5303C4.55032 20.6709 4.74109 20.7499 4.94 20.7499C5.13891 20.7499 5.32968 20.6709 5.47033 20.5303C5.61098 20.3896 5.69 20.1989 5.69 19.9999V14.1399C6.93659 13.6982 8.23315 13.4127 9.55 13.2899C10.3967 13.4978 11.2062 13.8351 11.95 14.2899C12.8201 14.8218 13.7734 15.2038 14.77 15.4199H15C16.4474 15.2326 17.8633 14.8526 19.21 14.2899C19.3506 14.2342 19.4713 14.1379 19.5568 14.0132C19.6423 13.8885 19.6887 13.7411 19.69 13.5899V5.06994C19.6975 4.95258 19.6769 4.83512 19.63 4.7273C19.583 4.61947 19.511 4.5244 19.42 4.44994Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <span class="font-semibold text-black">Clear</span>
                                </div>
                            </div>

                            <select name="priority" x-model="selected" class="hidden">
                                <option value="">Priority</option>
                                <option value="Urgent">Urgent</option>
                                <option value="High">High</option>
                                <option value="Normal">Normal</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                    </div>


                    {{-- Add Task --}}
                    <div class="mb-5">
                        <div id="subtasks-container"></div>
                        <button type="button" id="add-subtask-btn"
                            class="text-white transition-transform duration-200 border border-gray-600 rounded-lg bg-[#0C1F3B] w-full hover:hover:scale-105 py-1 px-3">+
                            Add Subtask</button>
                    </div>
                    <div class="flex justify-center gap-6 mt-8 font-medium">
                        <button type="button" id="close-modal"
                            class="px-5 py-1 text-white transition-transform duration-200 bg-gray-500 rounded-3xl hover:hover:scale-95">Cancel</button>
                        <button type="submit"
                            class="transition-transform duration-200 hover:hover:scale-110 px-5 py-1 text-white bg-[#1C427A] rounded-3xl">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="confirm-modal"
        class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 font-poppins">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-5 mx-auto bg-[#132C51] rounded-xl shadow-xl w-[500px]">
            <div class="mt-3 text-center">
                <h3 class="text-lg font-semibold text-white">Are you sure you want to complete this task?</h3>
                <div class="flex justify-center gap-6 mt-6 font-medium">
                    <button id="confirm-no"
                        class="px-5 py-1 text-white transition-transform duration-200 bg-gray-500 hover:hover:scale-95 rounded-3xl">No</button>
                    <button id="confirm-yes"
                        class="transition-transform duration-200 hover:hover:scale-110 px-5 py-1 text-white bg-[#1C427A] rounded-3xl">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="rename-modal"
        class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 font-poppins">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-5 mx-auto rounded-xl shadow-xl w-96 bg-[#132C51]">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-semibold text-white">Rename Task</h3>
                <form id="rename-form">
                    @csrf
                    <input type="hidden" id="rename-task-id">
                    <div class="mb-4">
                        <input type="text" id="rename-title"
                            class="w-full px-3 py-2 text-white border border-gray-600 rounded-xl mb-2 bg-[#0C1F3B]"
                            required>
                    </div>
                    <div class="flex justify-center gap-6 mt-6 font-medium">
                        <button type="button" id="close-rename-modal"
                            class="px-5 py-1 text-white transition-transform duration-200 bg-gray-500 hover:hover:scale-95 rounded-3xl">Cancel</button>
                        <button type="submit"
                            class="transition-transform duration-200 hover:hover:scale-110 px-5 py-1 text-white bg-[#1C427A] rounded-3xl">Rename</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="add-subtask-modal"
        class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 font-poppins">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-5 mx-auto bg-[#132C51] rounded-xl shadow-xl w-[400px]">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-semibold text-white">Add Subtask</h3>
                <form id="add-subtask-form">
                    @csrf
                    <input type="hidden" id="add-subtask-task-id">
                    <div class="mb-4">
                        <input type="text" id="subtask-title"
                            class="w-full px-3 py-2 text-white border border-gray-600 rounded-xl mb-2 bg-[#0C1F3B]"
                            required>
                    </div>
                    <div class="flex justify-center gap-6 mt-4 font-medium">
                        <button type="button" id="close-add-subtask-modal"
                            class="px-5 py-1 text-white transition-transform duration-200 bg-gray-500 hover:hover:scale-95 rounded-3xl">Cancel</button>
                        <button type="submit"
                            class="transition-transform duration-200 hover:hover:scale-110 px-5 py-1 text-white bg-[#1C427A] rounded-3xl">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-confirm-modal"
        class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div
            class="absolute p-5 mx-auto -translate-x-1/2 -translate-y-1/2 bg-[#132C51] shadow-xl top-1/2 left-1/2 rounded-xl w-[500px]">
            <div class="mt-3 text-center">
                <h3 class="mb-4 text-lg font-semibold text-white">Are you sure you want to delete this task?</h3>
                <div class="flex justify-center gap-6 mt-6 font-medium">
                    <button id="delete-no"
                        class="px-5 py-1 text-white transition-transform duration-200 bg-gray-500 hover:hover:scale-95 rounded-3xl">No</button>
                    <button id="delete-yes"
                        class="transition-transform duration-200 hover:hover:scale-110 px-5 py-1 text-white bg-[#1C427A] rounded-3xl">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="task-details-modal"
        class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div
            class="absolute p-5 mx-auto -translate-x-1/2 -translate-y-1/2 bg-[#132C51] shadow-xl top-1/2 left-1/2 rounded-xl w-96">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-semibold text-white">Task Details</h3>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-100">Title</label>
                    <p id="details-title" class="text-gray-200"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-100">Description</label>
                    <p id="details-description" class="text-gray-200"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-100">Due Date</label>
                    <p id="details-due-date" class="text-gray-200"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-100">Priority</label>
                    <p id="details-priority" class="font-semibold"
                        :class="{
                            'text-red-500': data.priority === 'Urgent',
                            'text-yellow-500': data.priority === 'High',
                            'text-blue-500': data.priority === 'Normal',
                            'text-green-500': data.priority === 'Low',
                            'text-gray-200': !['Urgent', 'High', 'Normal', 'Low'].includes(data.priority)
                        }">
                    </p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-100">Status</label>
                    <p id="details-completed" class="text-gray-200"></p>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-100">Subtasks</label>
                    <div id="details-subtasks" class="text-gray-200">
                    </div>
                </div>
                <div class="flex justify-center mt-6 font-medium">
                    <button type="button" id="close-details-modal"
                        class="px-5 py-1 text-white transition-transform duration-200 bg-gray-500 hover:hover:scale-110 rounded-3xl">Close</button>
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

        // Add subtask functionality (in modal)
        const addSubtaskBtn = document.getElementById('add-subtask-btn');
        const subtasksContainer = document.getElementById('subtasks-container');

        addSubtaskBtn.addEventListener('click', () => {
            const subtaskInput = document.createElement('input');
            subtaskInput.type = 'text';
            subtaskInput.name = 'subtasks[]';
            subtaskInput.className =
                'w-full px-3 py-2 text-white border border-gray-600 rounded-xl mb-2 bg-[#0C1F3B]';
            subtaskInput.placeholder = 'Subtask ' + (subtasksContainer.children.length + 1);
            subtasksContainer.appendChild(subtaskInput);
        });

        // Subtask toggle functionality (in list)
        document.querySelectorAll('.subtask-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const taskId = this.dataset.task;
                const subtasks = document.getElementById(`subtasks-${taskId}`);

                const arrow = this.querySelector('.subtask-arrow');

                // Toggle class 'hidden' pada daftar subtask
                subtasks.classList.toggle('hidden');

                // Ini akan memutar SVG 90 derajat saat 'hidden' dihapus,
                // dan mengembalikannya saat 'hidden' ditambahkan.
                arrow.classList.toggle('rotate-90');
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
                body: JSON.stringify({
                    completed: true
                })
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
                    body: JSON.stringify({
                        completed: isChecked
                    })
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

            // 1. Jika tombol titik tiga diklik
            if (taskMenuBtn) {
                const taskId = taskMenuBtn.dataset.task;
                const menu = document.querySelector(`.task-menu[data-task="${taskId}"]`);

                // Cek apakah menu ini sedang tertutup atau terbuka SEBELUM kita mereset semuanya
                const isHidden = menu.classList.contains('hidden');

                // Langkah A: Tutup SEMUA menu yang ada di layar terlebih dahulu (Reset)
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));

                // Langkah B: Logika Toggle
                // Jika tadi statusnya tersembunyi (hidden), maka TAMPILKAN.
                // Jika tadi statusnya tampil, biarkan tetap tertutup (karena Langkah A sudah menutupnya).
                if (isHidden) {
                    menu.classList.remove('hidden');
                }
            }
            // 2. Jika klik di sembarang tempat (bukan di tombol menu, bukan di dalam menu)
            else if (!e.target.closest('.task-menu')) {
                // Tutup semua menu
                document.querySelectorAll('.task-menu').forEach(m => m.classList.add('hidden'));
            }
        });

        // Rename button functionality
        document.addEventListener('click', function(e) {
            const renameBtn = e.target.closest('.rename-btn');
            if (renameBtn) {
                const taskId = renameBtn.dataset.task;
                document.getElementById('rename-task-id').value = taskId;
                document.getElementById('rename-title').value = document.querySelector(
                    `.task-checkbox[data-id="${taskId}"]`).nextElementSibling.textContent;
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
                body: JSON.stringify({
                    title: newTitle
                })
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
                body: JSON.stringify({
                    task_id: taskId,
                    title: title
                })
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

                        const priorityEl = document.getElementById('details-priority');
                        const priority = data.priority || 'N/A';
                        // 1. Atur teksnya
                        priorityEl.textContent = priority;
                        // 2. Buat fungsi untuk menentukan kelas warna
                        function getPriorityClass(priority) {
                            if (priority === 'Urgent') return 'text-red-500';
                            if (priority === 'High') return 'text-yellow-500';
                            if (priority === 'Normal') return 'text-blue-500';
                            if (priority === 'Low') return 'text-green-500';
                            return 'text-gray-200'; // Warna default
                        }
                        // 3. Terapkan kelas warna (pastikan untuk menyertakan 'font-semibold' lagi)
                        priorityEl.className = 'font-semibold ' + getPriorityClass(priority);

                        document.getElementById('details-completed').textContent = data.completed ?
                            'Completed' : 'Not Completed';

                        // Populate subtasks
                        const subtasksContainer = document.getElementById('details-subtasks');
                        subtasksContainer.innerHTML = '';
                        if (data.subtasks && data.subtasks.length > 0) {
                            data.subtasks.forEach(subtask => {
                                const subtaskDiv = document.createElement('div');
                                subtaskDiv.className = 'mb-1';
                                subtaskDiv.innerHTML =
                                    `<span class="${subtask.completed ? 'line-through text-gray-500' : ''}">${subtask.title}</span>`;
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

        // Search functionality
        document.getElementById('search-input').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const taskDivs = document.querySelectorAll('.mb-2');

            taskDivs.forEach(taskDiv => {
                const taskTitle = taskDiv.querySelector('span.flex-1')?.textContent.toLowerCase() || '';
                const subtaskTitles = Array.from(taskDiv.querySelectorAll('.subtask-item span')).map(span =>
                    span.textContent.toLowerCase());

                const matchesTitle = taskTitle.includes(searchTerm);
                const matchesSubtasks = subtaskTitles.some(title => title.includes(searchTerm));

                if (matchesTitle || matchesSubtasks || searchTerm === '') {
                    taskDiv.style.display = '';
                } else {
                    taskDiv.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
