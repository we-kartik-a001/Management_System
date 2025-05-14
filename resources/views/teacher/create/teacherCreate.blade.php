<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teacher Form</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form method="POST" action="{{ route('teacher.store') }}"
        class="bg-white p-8 rounded-2xl shadow-lg flex flex-col w-full max-w-md space-y-6">
        @csrf

        <h1 class="text-2xl font-bold text-center text-gray-800">Teacher Form</h1>

        <div class="flex flex-col">
            <label for="name" class="mb-2 text-gray-700">Teacher Name:</label>
            <input type="text" name="name" id="name" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

            @error('name')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="courses_id" class="mb-2 text-gray-700">Select Course:</label>
            <select id="courses_id" name="courses_id" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Select a Course --</option>
                @foreach ($courses as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>

            @error('courses_id')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="age" class="mb-2 text-gray-700">Enter Age:</label>
            <input type="number" name="age" id="age" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

            @error('age')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
            Submit
        </button>

        <!-- Go back Button -->
        <a class="w-full bg-gray-800 border-2 rounded-lg p-3 text-center text-white font-semibold" href="{{ route('teacher.index') }}"> Goback</a>
    </form>
</body>

</html>