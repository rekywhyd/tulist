@extends('layouts.dashboard')

@section('content')
    <div class="px-20 mx-auto text-black max-w-7xl font-poppins">

        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-6xl font-bold">
                    Say Hi <br> To TuList
                </h3>

                <p class="mt-5 text-3xl">
                    Tulist hadir sebagai ruang kecil yang membantu kamu mencatat hal-hal penting dalam hidup. Dari rencana
                    harian sampai ide mendadak, semuanya bisa kamu simpan dan kelola dengan mudah.
                </p>
            </div>

            <img class="w-[600px]" src="{{ Vite::asset('resources/images/notesBook.png') }}" alt="Notes Book">
        </div>

        <img class="w-[300px]" src="{{ Vite::asset('resources/images/pencil.png') }}" alt="Pencil">


        <h3 class="text-6xl font-bold">
            Satu Tim, Satu Visi
        </h3>
        <p class="mt-8 text-3xl text-justify">
            Tulist dikembangkan sebagai bagian dari proyek magang yang mempertemukan kami dalam satu tujuan: menciptakan
            solusi sederhana namun bermakna untuk membantu mengelola aktivitas sehari-hari. Meskipun berasal dari disiplin
            dan latar belakang yang berbeda, kami dipersatukan oleh komitmen yang sama—menghasilkan karya yang tidak hanya
            berfungsi, tetapi juga memberikan pengalaman terbaik bagi penggunanya.
        </p>
        <p class="mt-10 text-3xl text-justify">
            Sebagai proyek magang, Tulist adalah cerminan kerja kolaboratif dan dedikasi. Kami berusaha menghadirkan
            aplikasi yang ringkas, mudah dipahami, serta mampu mendampingi pengguna dalam menjaga keteraturan dan
            produktivitas harian. Setiap keputusan yang kami ambil berlandaskan pada pengalaman pengguna dan prinsip desain
            yang baik.
        </p>
        <p class="mt-10 mb-32 text-3xl text-justify">
            Kami percaya bahwa sebuah karya, sekecil apa pun, dapat memberi dampak positif ketika dibuat dengan kesungguhan.
            Tulist adalah langkah pertama kami dalam perjalanan profesional ini—sebuah bukti bahwa kolaborasi, visi, dan
            kualitas dapat melahirkan produk yang bernilai.
        </p>

        <img class="w-[600px] mx-auto" src="{{ Vite::asset('resources/images/map.png') }}" alt="Map">
    </div>
@endsection
