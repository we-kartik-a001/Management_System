@extends('component.tailwindLayout')

@section('title', 'Teacher Editpage')

@section('content')

    <body class="bg-white text-gray-800 min-h-screen py-10 px-3">

        {{-- Student Index:Start  --}}
        <div class="max-w-5xl mx-auto flex flex-col gap-4 ">
            <p class="text-center font-bold">@include('component.flash')</p>
            <h1 class="text-5xl font-bold text-center">Student List</h1>
            <div class="overflow-x-auto bg-white shadow rounded-lg border-2 border-blue-800">
                <table class="min-w-full text-sm text-left border border-gray-200">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 border-b">ID</th>
                            <th class="px-4 py-3 border-b">Name</th>
                            <th class="px-4 py-3 border-b">Course</th>
                            <th class="px-4 py-3 border-b">Teacher</th>
                            {{-- <th class="px-4 py-3 border-b">Detach course</th> --}}
                            <th class="px-4 py-3 border-b">Detach Teacher</th>
                            <th class="px-4 py-3 border-b text-center">Edit</th>
                            <th class="px-4 py-3 border-b text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 ">
                        @foreach ($students as $student)
                            <tr class="hover:bg-gray-200">
                                <td class="px-4 py-2">{{ $student->id }}</td>
                                <td class="px-4 py-2">{{ $student->name }}</td>
                                <td class="px-4 py-2">{{ $student->course->name }}</td>
                                <td class="px-4 py-2">
                                    {{ $student->teachers->pluck('name')->join(', ') ?: 'N/A' }}
                                </td>

                                <td class="px-4 py-2">
                                    @forelse ($student->teachers as $teacher)
                                        <form action="{{ route('student.detachTeacher', [$student->id, $teacher->id]) }}"
                                            method="POST" class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to detach {{ $teacher->name }}?')">
                                            @csrf
                                            <button type="submit" class="ml-2 text-red-500 hover:underline">Detach</button>
                                        </form><br>
                                    @empty
                                        N/A
                                    @endforelse
                                </td>


                                {{-- <td class="px-4 py-2 text-center ">
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
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $students->links('pagination::tailwind') }}
            </div>
        </div>
        {{-- Student Index:End  --}}

    </body>

@endsection
