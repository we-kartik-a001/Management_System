<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Form</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form method="POST" action="{{ route('student.checked') }}" class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">
        @csrf

        <h1 class="text-2xl font-bold text-center text-gray-800">Student Form</h1>

        <div class="flex flex-col">
            <label for="name" class="mb-2 text-gray-700">Student Name:</label>
            <input type="text" name="name" id="name" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

            @error('name')
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

        <div class="flex flex-col">
            <label for="teacher_name" class="mb-2 text-gray-700">Teacher Name:</label>
            <input type="text" name="teacher_name" id="teacher_name" required
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

            @error('teacher_name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
            Submit
        </button>
    </form>

</body>

</html>
