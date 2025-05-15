@extends('component.tailwindLayout')

@section('title', 'Teacher Editpage')

@section('content')
    <body class="bg-white text-gray-800 min-h-screen py-10 px-3">

        {{-- Student Index:Start  --}}
        <div class="max-w-5xl mx-auto flex flex-col gap-4 ">
            <h1 class="text-5xl font-bold text-center">Student List</h1>

            <!-- Pagination -->
            {{-- <div class="mt-6 flex justify-center">
                {{ $teachers->links('pagination::tailwind') }}
            </div> --}}
        </div>
        {{-- Student Index:End  --}}

    </body>

@endsection
