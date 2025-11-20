{{-- layout untuk home, view, schedule, notifications, setting, dan help --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="antialiased bg-[#E8EEF9]">

        <div class="flex flex-col min-h-screen">
            <header class="flex font-poppins items-center fixed justify-between w-full bg-[#E8EEF9] pb-3 z-50">

                <div class="flex items-center gap-8 pt-2">
                    <a href="{{ url('/home') }}">
                        <img class="w-[110px]" src="{{ Vite::asset('resources/images/logo-favicon.png') }}" alt="Logo">
                    </a>
                    
                    <div class="flex flex-col pt-2"> 
                        <div class="text-3xl font-bold text-gray-900">Hi, {{ Auth::user()->name }}!</div>
                        <p class="text-xs text-gray-500">Let's take a look at your activity today</p>
                    </div>
                </div>

                <div class="pt-4 text-xl font-bold text-gray-500 pr-7">{{ \Carbon\Carbon::now()->format('d M Y') }}</div>
                    
                <div class="flex items-center gap-10 pt-4 mr-8">
                    <div class="relative transition-transform duration-200 hover:hover:scale-105">
                        <input type="text" id="search-input" placeholder="Search" class="w-[180px] py-2 pl-16 pr-4 border-white bg-white rounded-3xl focus:outline-none focus:ring-2 focus:ring-[#0E213D]">
                        <svg class="absolute w-6 h-6 text-gray-400 -translate-y-1/2 left-3 top-1/2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" fill="#000000"></path> </g></svg>
                    </div>

                    <a href="{{ route('profile.edit') }}">                       
                        <svg class="w-12 h-12 transition-all text-black hover:text-[#0E213D] duration-200 hover:hover:scale-110" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </a>
                </div>
            </header>

            {{-- AREA KONTEN UTAMA --}}
            <div class="flex flex-1">

                {{-- SIDEBAR --}}
                @include('layouts.sidebar')
                
                {{-- AREA KONTEN KANAN (YANG BISA SCROLL) --}}
                <div class="flex flex-col flex-1">
                    
                    @isset($header)
                        <header class="bg-black shadow"> {{-- Ini header hitam opsional Anda --}}
                            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <main class="flex-1 p-6 mb-16">
                        {{ $slot }}
                    </main>

                </div>           
            </div>
        </div>
    </body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();

            // For view.blade.php - filter tasks in columns
            const taskContainers = document.querySelectorAll('.space-y-4.text-lg.text-\\[\\#132C51\\] > div.mb-2');
            taskContainers.forEach(container => {
                const taskTitle = container.querySelector('span.ml-4.flex-1')?.textContent.toLowerCase() || '';
                const subtaskTitles = Array.from(container.querySelectorAll('.subtask-item span.ml-2')).map(span => span.textContent.toLowerCase());
                const matches = taskTitle.includes(query) || subtaskTitles.some(title => title.includes(query));
                container.style.display = matches || query === '' ? '' : 'none';
            });

            // For schedule.blade.php - filter tasks in task list
            const scheduleTasks = document.querySelectorAll('#task-list > div[data-task-id]');
            scheduleTasks.forEach(taskDiv => {
                const taskTitle = taskDiv.querySelector('span.translate-y-\\[\\-2px\\]')?.textContent.toLowerCase() || '';
                const subtaskTitles = Array.from(taskDiv.querySelectorAll('.subtask-item span')).map(span => span.textContent.toLowerCase());
                const matches = taskTitle.includes(query) || subtaskTitles.some(title => title.includes(query));
                taskDiv.style.display = matches || query === '' ? '' : 'none';
            });
        });
    }
});
</script>
