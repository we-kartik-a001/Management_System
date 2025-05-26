@extends('component.tailwindLayout')

@section('title', 'Student Management')

@section('content')

    <body class="bg-gray-50 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            @include('component.flash')
        </div>

        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">Student Registry</h1>
                        <p class="text-sm text-gray-600 mt-1">Manage all student records and course assignments</p>
                    </div>
                    <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                        <div>
                            <button type="button" id="deleteAllBtn"
                                class="bg-red-600 font-semibold text-sm hover:bg-red-700 text-white p-2 rounded-md">
                                Delete Selected
                            </button>
                        </div>
                        <a href="{{ route('student.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition-colors duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Student
                        </a>
                        <a href="{{ route('main.welcome') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md text-sm transition-colors duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <form method="GET" action="{{ route('student.index') }}"
                    class="w-full flex justify-center md:flex-row items-center gap-2">
                    <input type="text" name="search" value="{{ old('search', $search ?? '') }}" placeholder="Search"
                        class="w-full border px-4 py-1 rounded-lg text-black focus:outline-none" />
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-1 rounded-lg">Search</button>
                    <a href="{{ route('student.index', ['reset' => true]) }}"
                        class="bg-gray-800 hover:bg-gray-600 text-white px-4 py-1 rounded-lg">Reset</a>
                </form>
            </div>

            <form id="bulkDeleteForm">
                @csrf
                @method('DELETE')
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Student Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Course</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Instructor(s)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created BY</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($students as $student)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 text-center">
                                        <input type="checkbox" class="student-checkbox" name="ids[]"
                                            value="{{ $student->id }}">
                                    </td>
                                    <td class="px-6 py-4">{{ $student->id }}</td>
                                    <td class="px-6 py-4">{{ $student->name }}</td>
                                    <td class="px-6 py-4">
                                        @if ($student->course)
                                            <span
                                                class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded">{{ $student->course->name }}</span>
                                            <form action="{{ route('student.deleteCourse', $student->id) }}" method="POST"
                                                class="inline ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 text-xs font-medium"
                                                    onclick="return confirm('Remove this course assignment?')">Remove</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">Not assigned</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($student->teachers->count())
                                            <div class="flex flex-wrap gap-1">
                                                @foreach ($student->teachers as $teacher)
                                                    <span
                                                        class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded">{{ $teacher->name }}</span>
                                                @endforeach
                                                <form action="{{ route('student.detachTeacher', $student->id) }}"
                                                    method="POST" class="inline ml-2">
                                                    @csrf
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700 text-xs font-medium"
                                                        onclick="return confirm('Detach all instructors?')">Detach</button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-gray-400">Not assigned</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $student->creator->name ?? 'System' }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('student.edit', $student->id) }}"
                                                class="text-blue-600 hover:text-blue-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('student.delete', $student->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Delete this student?')">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-5">
                                        <a href="{{ route('student.status', $student->id) }}"
                                            class="text-white font-semibold p-2 rounded-lg text-xs {{ $teacher->status ? 'bg-blue-400 hover:bg-blue-500' : 'bg-gray-400 hover:bg-gray-500' }}">
                                            {{ $student->status ? 'Active' : 'Inactive' }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </form>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $students->links('pagination::tailwind') }}
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#selectAll').on('change', function() {
                    $('.student-checkbox').prop('checked', $(this).prop('checked'));
                });

                $('#deleteAllBtn').click(function() {
                    let selectedIds = [];
                    $('.student-checkbox:checked').each(function() {
                        selectedIds.push($(this).val());
                    });

                    if (selectedIds.length === 0) {
                        alert('Please select at least one student.');
                        return;
                    }

                    if (!confirm('Are you sure you want to delete the selected students?')) {
                        return;
                    }

                    $.ajax({
                        url: '{{ route('student.multidelete') }}',
                        type: 'POST',
                        data: {
                            ids: selectedIds,
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function() {
                            alert('An error occurred while deleting the students.');
                        }
                    });
                });
            });
        </script>
    </body>

@endsection
