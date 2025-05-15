@extends('component.tailwindLayout')

@section('title', 'Session IndexPage')

@section('content')

 <body class="bg-white text-gray-800 min-h-screen py-10 px-3">

    {{-- Session Index: Start --}}
    <div class="max-w-5xl mx-auto flex flex-col gap-4 ">
        <p class="text-center font-bold">@include('component.flash')</p>
        <div class="overflow-x-auto bg-white shadow rounded-lg border-2 border-blue-800">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border-b">Name</th>
                        <th class="px-4 py-3 border-b">Age</th>
                        <th class="px-4 py-3 border-b">Teacher</th>
                        <th class="px-4 py-3 border-b text-center">Delete</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
                    <tr class="hover:bg-gray-200">
                        <td class="px-4 py-2">{{ $data['name'] }}</td>
                        <td class="px-4 py-2">{{ $data['age'] }}</td>
                        <td class="px-4 py-2">{{ $data['student_teacher_name'] }}</td>
                        <td class="px-4 py-2 text-center">
                            <form method="POST" action="{{ route('session.delete') }}" class="inline-block">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"> Clear
                                    Session Data
                                    Data</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- Session Index: End --}}
</body>
@endsection
