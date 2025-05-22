@extends('component.tailwindLayout')

@section('title', 'Student Editpage')

@section('content')

    <body class="bg-gray-100 flex items-center justify-center min-h-screen">

        {{-- action="{{ route('student.update', $student->id) }}" --}}
        {{-- Student Edit:Start --}}
        <form method="POST" 
            class="bg-white flex flex-col p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">
            @csrf
            @method('PATCH')

            <h1 class="text-2xl font-bold text-center text-gray-800">Student Form</h1>

            {{-- Name --}}
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-gray-700">Student Name:</label>
                <input type="text" name="name" id="name" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="{{ old('name', $student->name) }}">

                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Course --}}
            <div class="flex flex-col">
                <label for="courses_id" class="mb-2 text-gray-700">Select Course:</label>
                <select id="courses_id" name="courses_id" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="">
                        -- Select a Course --
                    </option>

                    @foreach ($courses as $id => $name)
                        <option value="{{ $id }}"
                            {{ old('course_id', $student->courses_id) == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>

                @error('courses_id')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
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
                        <option value="{{ $id }}"
                                {{ old('course_id', $student->teachers_id)== $id ? 'selected' : '' }}>
                            {{ $name }}</option>
                    @endforeach
                </select>
                @error('teachers_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- submission button --}}
            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                Submit
            </button>

            <!-- Go back button -->
            <a class="w-full bg-gray-800 border-2 rounded-lg p-3 text-center text-white font-semibold"
                href="{{ route('student.index') }}"> Goback</a>
        </form>
        {{-- Student Edit:End --}}

    </body>
@endsection
