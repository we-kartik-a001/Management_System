<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800 min-h-screen py-10 px-3">
    <div class="max-w-5xl mx-auto flex flex-col gap-4 ">
        <h1 class="text-5xl font-bold text-center">Teacher List</h1>

            
        <a class="border-2 bg-green-600 font-semibold text-xl text-white border-blue-800 rounded-lg p-3 text-center w-1/5 hover:bg-green-800 " href="{{route('teacher.create')}}">Add Teacher</a>

        <div class="overflow-x-auto bg-white shadow rounded-lg border-2 border-blue-800">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border-b">ID</th>
                        <th class="px-4 py-3 border-b">Name</th>
                        <th class="px-4 py-3 border-b">Age</th>
                        <th class="px-4 py-3 border-b">Course</th>
                        <th class="px-4 py-3 border-b text-center">Edit</th>
                        <th class="px-4 py-3 border-b text-center">Delete</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
                    @foreach ($teachers as $teacher)
                    <tr class="hover:bg-gray-200">
                        <td class="px-4 py-2">{{ $teacher->id }}</td>
                        <td class="px-4 py-2">{{ $teacher->name }}</td>
                        <td class="px-4 py-2">{{ $teacher->age }}</td>
                        <td class="px-4 py-2">{{ $teacher->course->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 text-center ">
                            <a href="{{ route('teacher.edit', $teacher->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('teacher.delete', $teacher->id) }}" method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $teachers->links('pagination::tailwind') }}
        </div>
    </div>
</body>

</html>