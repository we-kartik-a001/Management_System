<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teacher Form</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form method="POST" action="{{ route('teacher.update', $teacher->id ) }}" class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">
        @csrf
        @method('PATCH')

        <h1 class="text-2xl font-bold text-center text-gray-800">Teacher Form</h1>

        {{-- Name --}}
        <div class="flex flex-col">
            <label for="name" class="mb-2 text-gray-700">Teacher Name:</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   required
                   class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                   value="{{ old('name', $teacher->name) }}">

            @error('name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- Course --}}
        <div class="flex flex-col">
            <label for="courses_id" class="mb-2 text-gray-700">Select Course:</label>
            <select id="courses_id"
                    name="courses_id" 
                    required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

                <option value="">
                    -- Select a Course --
                </option>

                @foreach ($courses as $id => $name)
                    <option value="{{ $id }}"
                            {{ old('course_id', $teacher->courses_id)== $id ? 'selected':"" }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>

            @error('courses_id')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- Age --}}
        <div class="flex flex-col">
            <label for="age" class="mb-2 text-gray-700">Enter Age:</label>
            <input type="number" 
                   name="age" 
                   id="age" 
                   required
                   class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   value="{{ old('age', $teacher->age) }}">

            @error('age')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- submission button --}}
        <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
            Submit
        </button>
    </form>
</body>

</html>
