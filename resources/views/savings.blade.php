<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scanning Bottles') }}
        </h2>
    </x-slot>

    <!-- Center the content -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="text-center">
            <!-- Check for session status and display it if it exists -->
            @if(session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Loop through the messages stored in session and show one at a time -->
            @if(session('messages'))
                <div class="mb-4" id="message-container">
                    @foreach(session('messages') as $index => $message)
                        <p class="message" data-index="{{ $index }}" style="display: none;">{{ $message }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Button to add €0.15 to savings -->
            <form method="POST" action="{{ route('add-savings') }}">
                @csrf
                <button type="submit" class="inline-block py-6 px-8 bg-[#0277BD] text-white rounded-lg shadow-md hover:bg-[#01579B] focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Scan Bottles
                </button>
            </form>
           
        </div>
    </div>

    <!-- Add the JavaScript for showing one message at a time -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentMessageIndex = 0;
            const messages = document.querySelectorAll('.message');
            const finalMessageContainer = document.getElementById('final-message');

            // Show the first message
            if (messages.length > 0) {
                messages[currentMessageIndex].style.display = 'block';
            }

            // Automate the message display after a short delay (2 seconds)
            const messageInterval = setInterval(function() {
                if (currentMessageIndex < messages.length - 1) {
                    // Hide the current message
                    messages[currentMessageIndex].style.display = 'none';
                    // Show the next message
                    currentMessageIndex++;
                    messages[currentMessageIndex].style.display = 'block';
                }
            }, 2000); // 2000ms = 2 seconds
        });
    </script>
</x-app-layout>

