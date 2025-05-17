@extends('component.tailwindLayout')

@section('title', 'Teacher Editpage')

@section('content')

    <body class="bg-gray-600 flex flex-col justify-center  gap-4 h-screen">

        <div class="border-b flex justify-center items-center text-center max-w-5xl mx-auto">
            <p class="text-3xl  font-semibold text-white p-3">Dashboard</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center p-4">
            <!-- Card 1 -->
            <div
                class="bg-white rounded-2xl shadow-lg p-3 flex flex-col items-center w-48 hover:scale-105 transition-transform">
                <img src="https://images.unsplash.com/photo-1587691592099-24045742c181?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Teacher" class="rounded-lg object-cover mb-4">
                <a class="bg-blue-800 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow text-center w-full"
                    href="{{ route('teacher.index') }}">
                    Teachers Data
                </a>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white rounded-2xl shadow-lg p-3 flex flex-col items-center w-48 hover:scale-105 transition-transform">
                <img src="https://images.unsplash.com/photo-1587691592099-24045742c181?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Session" class="rounded-lg object-contain mb-4">
                <a class="bg-blue-800 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow text-center w-full"
                    href="{{ route('session.create') }}">
                    Session Data
                </a>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white rounded-2xl shadow-lg p-3 flex flex-col items-center w-48 hover:scale-105 transition-transform">
                <img src="https://images.unsplash.com/photo-1587691592099-24045742c181?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Student" class="rounded-lg object-contain mb-4">
                <a class="bg-blue-800 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow text-center w-full"
                    href="{{ route('student.index') }}">
                    Students Data
                </a>
            </div>
        </div>


    </body>

@endsection
