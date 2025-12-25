@extends('component.tailwindLayout')

@section('title', 'Teacher Management')

@section('content')

    <body class="bg-gray-50 min-h-screen">
        <!-- Flash Messages -->
        <div class="fixed top-4 left-0 right-0 max-w-7xl mx-auto px-4 z-50">
            @include('component.flash')
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Page Header -->
            <div class="mb-8 border-b border-gray-200 pb-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Teacher Management</h1>
                        <p class="mt-2 text-sm text-gray-600">Comprehensive list of all teaching staff with management
                            options</p>
                    </div>
                    <div class="mt-4 sm:mt-0 flex space-x-3">
                        <div>
                            <button type="button" id="deleteAllBtn"
                                class="bg-red-600 font-semibold text-sm hover:bg-red-700 text-white p-2 rounded-md">
                                Delete Selected
                            </button>
                        </div>
                        <a href="{{ route('teacher.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Teacher
                        </a>
                        <a href="{{ route('main.welcome') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md text-sm transition-colors duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Teacher Table Section -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Teaching Staff</h3>
                        <div class="mt-3 sm:mt-0">
                            <form method="GET" action="{{ route('teacher.index') }}" class="flex gap-2">
                                <input type="text" name="search" value="{{ old('search', $search ?? '') }}"
                                    placeholder="Search"
                                    class="w-full border px-4 py-1 rounded-lg text-black focus:outline-none" />
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-1 rounded-lg">Search</button>
                                <a href="{{ route('teacher.index', ['reset' => true]) }}"
                                    class="bg-gray-800 hover:bg-gray-600 text-white px-4 py-1 rounded-lg">Reset</a>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 text-center  py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dob
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Course
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created By
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($teachers as $teacher)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 text-center">
                                        <input type="checkbox" class="teacher-checkbox" name="ids[]"
                                            value="{{ $teacher->id }}">
                                    </td>
                                    <td class="px-6 py-4">{{ $teacher->id }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <span
                                                    class="text-indigo-600 font-medium">{{ substr($teacher->name, 0, 1) }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $teacher->name }}</div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $teacher->email ?? 'No email provided' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $teacher->date_of_birth }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $teacher->courses ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $teacher->courses->name ?? 'Not assigned' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $teacher->creator->name ?? 'System' }}
                                    </td>
                                    <td class="px-6 py-1 text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900"><svg class="w-5 h-5"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg></a>
                                            <form action="{{ route('teacher.delete', $teacher->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"> <svg
                                                        class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg></button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-6">
                                        <a href="{{ route('teacher.status', $teacher->id) }}"
                                            class="text-white font-semibold p-2 rounded-lg text-xs {{ $teacher->status ? 'bg-blue-400 hover:bg-blue-500' : 'bg-gray-400 hover:bg-gray-500' }}">
                                            {{ $teacher->status ? 'Disable' : 'Enable' }}
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    {{ $teachers->links('pagination::tailwind') }}
                </div>
            </div>
        </div>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#selectAll').on('change', function() {
                    $('.teacher-checkbox').prop('checked', $(this).prop('checked'));
                });

                $('#deleteAllBtn').click(function() {
                    let selectedIds = [];
                    $('.teacher-checkbox:checked').each(function() {
                        selectedIds.push($(this).val());
                    });

                    if (selectedIds.length === 0) {
                        alert('Please select at least one teacher to delete.');
                        return;
                    }

                    if (!confirm('Are you sure you want to delete the selected teachers?')) {
                        return;
                    }

                    $.ajax({
                        url: '{{ route('teacher.multidelete') }}',
                        type: 'DELETE',
                        data: {
                            ids: selectedIds,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('An error occurred while deleting the teachers.');
                        }
                    });
                });
            });
        </script>

    </body>

@endsection
