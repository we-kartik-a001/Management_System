@extends('component.tailwindLayout')

@section('title', 'Register New Student')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Register a New Student
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Please complete the form below to add a new student.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            @include('component.flash')

            <form method="POST" action="{{ route('student.store') }}" class="space-y-6">
                @csrf

                <!-- Student Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Full Name
                    </label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter student name">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Course Selection -->
                <div>
                    <label for="courses_id" class="block text-sm font-medium text-gray-700">
                        Course
                    </label>
                    <select name="courses_id" id="courses_id" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="">-- Select a Course --</option>
                        @foreach ($courses as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('courses_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Teachers Selection -->
                <div>
                    <label for="teachers_id" class="block text-sm font-medium text-gray-700">
                        Assigned Teachers
                    </label>
                    <select name="teachers_id[]" id="teachers_id" multiple required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($teachers as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('teachers_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                        class="w-full flex justify-center items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Register Student
                    </button>
                    <a href="{{ route('student.index') }}"
                        class="w-full flex justify-center items-center px-4 py-2 bg-white text-gray-700 border border-gray-300 text-sm font-medium rounded-md shadow hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
