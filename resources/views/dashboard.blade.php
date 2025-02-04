<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
                @foreach ($users as $user)
                    <a href="{{ route('chat', $user->id) }}">
                        <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md hover:scale-105 hover:shadow-xl">
                            <!-- Text Section -->
                            <div class="flex-1 text-left">
                                <h2 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h2>
                            </div>

                            <!-- Image Section -->
                            <div class="ml-4">
                                <!-- Assuming you have a user avatar or placeholder image -->
                                <img class="object-cover w-24 h-24 rounded-full" src="https://randomuser.me/api/portraits/men/{{ rand(0, 99) }}.jpg" alt="{{ $user->name }}'s avatar">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>
