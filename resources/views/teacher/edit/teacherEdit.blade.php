@extends('component.tailwindLayout')
@section('title', 'Teacher Editpage')
@section('content')

    <div class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
        <!-- Flash Messages -->
        <div class="max-w-7xl mx-auto">
            @include('component.flash')
        </div>

        {{-- Teacher Edit:Start --}}
        <form method="POST" action="{{ route('teacher.update', $teacher->id) }}"
            class="bg-white flex flex-col p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">
            @csrf
            @method('PATCH')
            <h1 class="text-2xl font-bold text-center text-gray-800">Teacher Form</h1>

            {{-- Name --}}
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-gray-700">Teacher Name:</label>
                <input type="text" name="name" id="name" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="{{ old('name', $teacher->name) }}">
                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="flex flex-col">
                <label for="email" class="mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" id="email" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter teacher's email" value="{{ old('email', $teacher->email) }}">
                @error('email')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Course --}}
            <div class="flex flex-col">
                <label for="courses_id" class="mb-2 text-gray-700">Select Course:</label>
                <select id="courses_id" name="courses_id" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Select a Course --</option>
                    @foreach ($courses as $id => $name)
                        <option value="{{ $id }}"
                            {{ old('courses_id', $teacher->courses_id) == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('courses_id')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Subject(s) --}}
            <div class="flex flex-col">
                <label for="subject_id" class="mb-2 text-gray-700">Select Subject(s):</label>
                <select id="subject_id" name="subject_id[]" multiple required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @php
                        $selectedSubjects = old('subject_id', $teacher->subjects()->pluck('subjects.id')->toArray());
                    @endphp
                    @foreach ($subjects as $id => $name)
                        <option value="{{ $id }}" {{ in_array($id, $selectedSubjects) ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Date Of Birth --}}
            <div class="flex flex-col">
                <label for="date_of_birth" class="mb-2 text-sm font-medium text-gray-700">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" min="1900-01-01" max="2030-01-01" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('date_of_birth', \Carbon\Carbon::parse($teacher->date_of_birth)->format('Y-m-d')) }}">
                @error('date_of_birth')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                Submit
            </button>

            {{-- Go back button --}}
            <a class="w-full bg-gray-800 border-2 rounded-lg p-3 text-center text-white font-semibold"
                href="{{ route('teacher.index') }}">
                Go Back
            </a>
        </form>
        {{-- Teacher Edit:End --}}
    </div>
@endsection