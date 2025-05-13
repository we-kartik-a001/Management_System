<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teacher Form</title>
</head>

<body
    class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex flex-col items-center p-5">
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-700 text-center">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-600 px-4 py-2">ID</th>
                    <th class="border border-gray-600 px-4 py-2">Name</th>
                    <th class="border border-gray-600 px-4 py-2">Age</th>
                    <th class="border border-gray-600 px-4 py-2">Course ID</th>
                    <th class="border border-gray-600 px-4 py-2">Action</th>
                </tr>
            </thead>

            <tbody class="bg-gray-900">
                @foreach ($teachers as $teacher)
                    <tr>
                        <td class="border border-gray-600 px-4 py-2">{{ $teacher->id }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $teacher->name }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $teacher->age }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $teacher->courses_id }}</td>
                        <!-- Edit Button -->
                        <td class="border border-gray-600 px-4 py-2 flex justify-center gap-2">

                            <a href="{{ route('teacher.edit', $teacher->id) }}"
                                class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition">
                                Edit
                            </a>

                            <form action="{{ route('teacher.delete', $teacher->id) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
        </table>

    </div>
    <!-- Pagination -->
    <div class="mt-4 flex justify-center">
        {{ $teachers->links('pagination::tailwind') }}
    </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this student?");
        }
    </script>

</body>

</html>
