@extends('component.tailwindLayout')

@section('title', 'Create New Teacher')

@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    {{-- Teacher Create: Start --}}
    <form method="POST" action="{{ route('teacher.store') }}"
        class="bg-white flex flex-col p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">
        @csrf

        <h1 class="text-2xl font-bold text-center text-gray-800">
            Add New Teacher
        </h1>

        <!-- Teacher Name -->
        <div class="flex flex-col">
            <label for="name" class="mb-2 text-sm font-medium text-gray-700">
                Full Name
            </label>
            <input type="text" name="name" id="name" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter teacher's name">
            @error('name')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Course Selection -->
        <div class="flex flex-col">
            <label for="courses_id" class="mb-2 text-sm font-medium text-gray-700">
                Course
            </label>
            <select name="courses_id" id="courses_id" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Select a Course --</option>
                @foreach ($courses as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('courses_id')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Age -->
        <div class="flex flex-col">
            <label for="age" class="mb-2 text-sm font-medium text-gray-700">
                Age
            </label>
            <input type="number" name="age" id="age" min="18" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter teacher's age">
            @error('age')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
            Submit
        </button>

        <!-- Back Button -->
        <a href="{{ route('teacher.index') }}"
            class="w-full text-center bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-300">
            Back to List
        </a>
    </form>
    {{-- Teacher Create: End --}}

</div>
@endsection
