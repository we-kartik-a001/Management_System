@extends('component.tailwindLayout')
@section('title', 'Academic Programs | ' . config('app.name'))
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-slate-50 to-stone-50">
        <!-- Hero Section -->
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-800 via-gray-800 to-stone-800">
            <!-- Subtle Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute top-0 left-0 w-96 h-96 bg-slate-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
                <div class="absolute top-0 right-0 w-96 h-96 bg-gray-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-96 h-96 bg-stone-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-4000"></div>
            </div>
            
            <!-- Dashboard Button -->
            <div class="absolute top-6 right-6 z-20">
                <a href="{{ route('main.welcome') }}"
                    class="group bg-white/10 backdrop-blur-md hover:bg-white/15 text-white font-medium py-3 px-6 rounded-xl text-sm transition-all duration-300 flex items-center gap-3 border border-white/10 hover:border-white/20 hover:scale-105">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>
            </div>

            <div class="relative z-10 px-4 py-20 sm:py-32">
                <div class="max-w-4xl mx-auto text-center">
                    <div class="mb-8">
                        <span class="inline-block px-4 py-2 bg-slate-700/50 backdrop-blur-sm text-slate-200 text-sm font-medium rounded-full mb-6 border border-slate-600/30">
                            🎓 Excellence in Education
                        </span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-white via-slate-100 to-gray-200 bg-clip-text text-transparent leading-tight">
                        Academic Programs
                    </h1>
                    <p class="text-xl md:text-2xl text-slate-300 mb-12 max-w-2xl mx-auto leading-relaxed">
                        Discover thoughtfully designed programs that nurture academic excellence and personal growth
                    </p>
                    
                    <!-- Subtle Search Bar -->
                    <div class="relative max-w-2xl mx-auto group">
                        <div class="absolute inset-0 bg-slate-600/20 rounded-2xl blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative bg-white/10 backdrop-blur-md rounded-2xl p-2 border border-white/10">
                            <div class="flex items-center">
                                <input type="text" placeholder="Search courses, subjects, or programs..."
                                    class="flex-1 bg-transparent text-white placeholder-slate-300 px-6 py-4 rounded-xl border-0 focus:outline-none focus:ring-0 text-lg">
                                <button class="bg-slate-600 hover:bg-slate-500 text-white p-4 rounded-xl transition-all duration-300 hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-16">
            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-16">
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center border border-gray-200/50 hover:bg-white/90 transition-all duration-300 hover:scale-105 shadow-sm hover:shadow-md">
                    <div class="text-3xl font-bold text-slate-700 mb-2">{{ $courses->count() }}</div>
                    <div class="text-gray-600 font-medium">Programs Available</div>
                </div>
            </div>

            <!-- Programs Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($courses as $course)
                    <div class="group bg-white/90 backdrop-blur-sm rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-500 h-full flex flex-col border border-gray-200/50 hover:scale-105 hover:-translate-y-1">
                        <!-- Program Header -->
                        <div class="relative bg-gradient-to-br from-slate-600 via-gray-600 to-stone-600 px-8 py-8 overflow-hidden">
                            <!-- Subtle Decorative Elements -->
                            <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-full -translate-y-12 translate-x-12"></div>
                            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/5 rounded-full translate-y-8 -translate-x-8"></div>
                            
                            <div class="relative z-10">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="inline-block px-3 py-1 bg-white/15 backdrop-blur-sm text-white text-xs font-medium rounded-full border border-white/20">
                                        {{ $course->level ?? 'Undergraduate' }}
                                    </span>
                                    <div class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/20">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="text-xl font-bold text-white mb-2 leading-tight">{{ $course->name }}</h2>
                                @if ($course->code)
                                    <p class="text-white/70 text-sm font-medium">{{ $course->code }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Program Body -->
                        <div class="p-8 flex-grow">
                            @if ($course->description)
                                <p class="text-gray-700 mb-6 line-clamp-3 leading-relaxed">{{ $course->description }}</p>
                            @endif
                            
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-sm text-gray-600 bg-gray-50/80 rounded-lg p-3">
                                    <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-slate-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-700">Duration</div>
                                        <div class="text-xs text-gray-500">{{ $course->duration ?? '4 years' }}</div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center text-sm text-gray-600 bg-gray-50/80 rounded-lg p-3">
                                    <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-slate-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-700">Core Subjects</div>
                                        <div class="text-xs text-gray-500">{{ $course->subjects->count() }} subjects</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Program Footer -->
                        <div class="px-8 pb-8">
                            <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4 flex items-center">
                                <span class="w-2 h-2 bg-slate-400 rounded-full mr-2"></span>
                                Key Subjects
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($course->subjects->take(3) as $subject)
                                    <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full border border-slate-200 hover:bg-slate-200 hover:text-slate-800 transition-all duration-300">
                                        {{ $subject->name }}
                                    </span>
                                @endforeach
                                @if ($course->subjects->count() > 3)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full border border-gray-200">
                                        +{{ $course->subjects->count() - 3 }} more
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Action Button -->
                            <div class="mt-6">
                                <button class="w-full bg-slate-600 hover:bg-slate-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-md group">
                                    <span class="flex items-center justify-center">
                                        Learn More
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white/90 backdrop-blur-sm rounded-2xl shadow-sm p-16 text-center border border-gray-200/50">
                        <div class="w-20 h-20 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-8">
                            <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">No Programs Available</h3>
                        <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">We're currently updating our course catalog with new programs. Please check back soon.</p>
                        <div class="space-y-4">
                            <a href="#" class="inline-flex items-center px-6 py-3 bg-slate-600 hover:bg-slate-700 text-white font-semibold rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-md">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Contact Admissions
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($courses->hasPages())
                <div class="mt-16 flex justify-center">
                    <nav class="flex items-center space-x-2 bg-white/90 backdrop-blur-sm rounded-xl p-2 border border-gray-200/50 shadow-sm">
                        {{ $courses->links() }}
                    </nav>
                </div>
            @endif

            <!-- Call to Action Section -->
            <div class="mt-20">
                <div class="bg-gradient-to-br from-slate-50 to-gray-100 rounded-2xl p-12 text-center border border-gray-200/50 shadow-sm">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">Ready to Begin Your Journey?</h2>
                    <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                        Join our community of learners and discover programs designed to help you achieve your academic goals
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a  href="{{ route('student.create') }}" class="bg-slate-600 hover:bg-slate-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-md">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection