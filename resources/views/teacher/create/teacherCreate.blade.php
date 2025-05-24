@extends('component.tailwindLayout')

@section('title', 'Create New Teacher')

@section('content')
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">

        {{-- Teacher Create: Start --}}
        <form method="POST" action="{{ route('teacher.store') }}"
            class="bg-white flex flex-col p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">
            @csrf

            <h1 class="text-2xl font-bold text-center text-gray-800">
                Add New Teacher
            </h1>

            <!-- Teacher Name -->
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-sm font-medium text-gray-700">
                    Full Name
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter teacher's name">
                @error('name')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Teacher Email -->
            <div class="flex flex-col">
                <label for="email" class="mb-2 text-sm font-medium text-gray-700">
                    Email
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter teacher's email">
                @error('email')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Course and Subject -->
            <div x-data="courseSelector({{ $courses->map(
                fn($c) => [
                    'id' => $c->id,
                    'name' => $c->name,
                    'subjects' => $c->subjects->map(fn($s) => ['id' => $s->id, 'name' => $s->name]),
                ],
            ) }})" class="space-y-4">

                <div>
                    <label for="courses_id" class="block text-sm font-medium text-gray-700">Select a Course</label>
                    <select id="courses_id" name="courses_id" x-model="selectedCourse"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                        <option value="">Select a Course</option>
                        <template x-for="course in courses" :key="course.id">
                            <option :value="course.id" x-text="course.name"></option>
                        </template>
                    </select>
                    @error('courses_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div x-show="selectedCourse" x-transition>
                    <label for="subject_id" class="block text-sm font-medium text-gray-700">Select a Subject</label>
                    <select id="subject_id" name="subject_id[]" x-model="selectedSubject" multiple
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                        <option value="">Select a Subject</option>
                        <template x-for="subject in filteredSubjects" :key="subject.id">
                            <option :value="subject.id" x-text="subject.name"></option>
                        </template>
                    </select>
                    @error('subject_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Date Of birth -->
            <div class="flex flex-col">
                <label for="date_of_birth" class="mb-2 text-sm font-medium text-gray-700">
                    Date of Birth
                </label>
                <input type="date" name="date_of_birth" id="date_of_birth" min="1900-01-01" max="2030-01-01" required
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('date_of_birth') }}" placeholder="Select teacher's date of birth">
                @error('date_of_birth')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                Submit
            </button>

            <!-- Back Button -->
            <a href="{{ route('teacher.index') }}"
                class="w-full text-center bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-300">
                Back to List
            </a>
        </form>
        {{-- Teacher Create: End --}}

    </div>

    <script>
        function courseSelector(data) {
            return {
                courses: data,
                selectedCourse: '',
                selectedSubject: '',
                get filteredSubjects() {
                    const selected = this.courses.find(c => c.id == this.selectedCourse);
                    return selected ? selected.subjects : [];
                }
            }
        }
    </script>

@endsection
