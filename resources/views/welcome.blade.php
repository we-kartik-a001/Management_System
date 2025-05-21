@extends('component.tailwindLayout')

@section('title', 'Teacher Editpage')

@section('content')

<body class="bg-gradient-to-br from-gray-200 via-gray-600 to-gray-800 min-h-screen flex flex-col items-center justify-start py-8 px-4">

    <!-- Header -->
    <div class="border-b border-gray-600 w-full max-w-6xl mb-10">
        <h1 class="text-4xl font-bold text-white text-center py-6">Admin Dashboard</h1>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl w-full">

        <!-- Card Component -->
        @php
            $cards = [
                [
                    'title' => 'Teachers Data',
                    'route' => route('teacher.index'),
                    'image' => 'https://images.unsplash.com/photo-1587691592099-24045742c181?q=80&w=2073&auto=format&fit=crop'
                ],
                [
                    'title' => 'Session Data',
                    'route' => route('session.create'),
                    'image' => 'https://images.unsplash.com/photo-1587691592099-24045742c181?q=80&w=2073&auto=format&fit=crop'
                ],
                [
                    'title' => 'Students Data',
                    'route' => route('student.index'),
                    'image' => 'https://images.unsplash.com/photo-1587691592099-24045742c181?q=80&w=2073&auto=format&fit=crop'
                ],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="bg-white bg-opacity-10 backdrop-blur-xl rounded-2xl p-3 shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2 border border-white/10">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}" class="rounded-lg mb-4 shadow-lg object-cover bg-white/20 ">
                    <h5 class="text-xl text-white font-bold">{{ $card['title'] }}</h5>
                    <a href="{{ $card['route'] }}" class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-xl transition">
                        View
                    </a>
                </div>
            </div>
        @endforeach


    </div>

</body>

@endsection
