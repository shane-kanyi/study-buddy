<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Display success/error messages from redirects --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
             @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- This is the main content area that has been updated --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Welcome, {{ Auth::user()->name }}!
                    </h2>

                    @if(auth()->user()->role == 'admin')
                        <p>You are logged in as an Administrator.</p>
                        <div class="mt-4 space-x-4">
                            <a href="{{ route('admin.subjects.index') }}" class="font-semibold text-blue-600 hover:text-blue-800">Manage Subjects</a>
                            <a href="{{ route('admin.tutors.index') }}" class="font-semibold text-blue-600 hover:text-blue-800">Manage Tutors</a>
                        </div>

                    @elseif(auth()->user()->role == 'tutor')
                        <p>Welcome to your Tutor Dashboard. You can now be booked for sessions.</p>
                        <div class="mt-4">
                            <a href="{{ route('tutor.profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Manage My Profile & Subjects
                            </a>

                             <a href="{{ route('tutor.sessions.index') }}" class="font-semibold text-blue-600 hover:text-blue-800">Manage Sessions</a>
                        </div>

                    @else
                        {{-- This section is for users with the default 'student' role --}}
                        @if(auth()->user()->tutorProfile)
                            @if(auth()->user()->tutorProfile->verified_at)
                                {{-- This case should not happen if role is 'student', but is a safe fallback --}}
                                <p>Your tutor profile is active.</p>
                            @else
                                <p class="text-yellow-500 font-bold">Your tutor application is pending review. We will notify you once it has been processed.</p>
                            @endif
                        @else
                            <p>Ready to help others learn? Apply to become a tutor today!</p>
                            <div class="mt-4">
                                <a href="{{ route('tutor.apply') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Apply to be a Tutor
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
                {{-- End of updated content area --}}
            </div>
        </div>
    </div>
</x-app-layout>