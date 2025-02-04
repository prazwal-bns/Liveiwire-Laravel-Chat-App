<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="fixed top-0 left-0 right-0 z-10 flex items-center justify-between w-full h-16 px-4 shadow-lg bg-gradient-to-r from-blue-500 to-blue-600">
        <!-- Back Button -->
        <a href="/dashboard" class="p-2 transition-colors rounded-full hover:bg-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 text-white">
                <path fill="currentColor" d="M9.41 11H17a1 1 0 0 1 0 2H9.41l2.3 2.3a1 1 0 1 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 0 1 1.42 1.4L9.4 11z" />
            </svg>
        </a>
        <!-- Title -->
        <div class="text-xl font-semibold text-white">Send Message to: <span class="text-2xl text-yellow-400">{{ $userData->name }}</span></div>
        <!-- Menu Button -->
        <button class="p-2 transition-colors rounded-full hover:bg-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 text-white">
                <path fill="currentColor" fill-rule="evenodd" d="M12 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
            </svg>
        </button>
    </div>

    <!-- Chat Messages -->
    <div class="pt-16 pb-12 px-4 space-y-3 overflow-y-auto max-h-[calc(100vh-128px)]">
        @foreach ($messages as $message)
            <div class="flex justify-{{ $message['sender'] != auth()->user()->name ? 'start' : 'end' }}">
                <div class="max-w-[75%] p-3 rounded-xl shadow-md {{ $message['sender'] != auth()->user()->name ? 'bg-white' : 'bg-blue-500 text-white' }}">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold">
                            <b>{{ $message['sender'] }}</b>
                        </p>
                        <p class="text-xs {{ $message['sender'] != auth()->user()->name ? 'text-gray-400' : 'text-blue-200' }}">
                           -  {{ \Carbon\Carbon::parse($message['created_at'])->format('h:i A') }}
                        </p>
                    </div>
                    <p class="mt-1 text-sm">{{ $message['message'] }}</p>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Message Input Area -->
    <form wire:submit='sendMessage()'>
        <div class="fixed bottom-0 left-0 right-0 z-10 flex items-center w-full p-2 bg-white border-t border-gray-200">
            <input
                wire:model='message'
                class="flex-grow px-4 py-2 mr-3 text-sm bg-gray-100 rounded-full resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                rows="1"
                placeholder="Type a message..."
            ></input>
            <button type="submit" class="p-3 text-white transition-colors bg-blue-500 rounded-full hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                    <path fill="currentColor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
            </button>
        </div>
    </form>
</div>
