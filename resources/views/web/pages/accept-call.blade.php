@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')

        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl mb-4">Discovery Call for {{ $advisor->user_id }}</h2>
                <p>Call Session ID: {{ $callLog->session_id }}</p>
                <p>Initiator: {{ $callLog->sender_id }}</p>
                <p>Receiver: {{ $callLog->receiver_id }}</p>
                <!-- Call Screen Content -->
                <div id="call-screen"
                    class="flex flex-col md:flex-row w-full h-[600px] bg-gray-100 items-center justify-center">
                    <p id="callUser" class="text-xl text-gray-700">Call Screen for {{ $advisor->user_id }}</p>
                </div>

                <hr class="mb-[100px]">
                </hr>
            </div>
        </div>


        <!-- bottom menu bar -->
        @include('web.components.bottommenu')

        <!-- side bar -->
        @include('web.components.sidebar')

        @include('web.components.footer')
    </div>
    <script>
        // JavaScript to toggle sidebar
        // const toggleBtn = document.querySelector('.toggleBtn');
        const hideSideMenu = document.getElementById("hideSideMenu");
        const showSideMenu = document.getElementById("showSideMenu");

        // console.log(toggleBtn)
        console.log(hideSideMenu, showSideMenu);
        const sidebar = document.querySelector(".sidebar");

        hideSideMenu.addEventListener("click", () => {
            sidebar.classList.add("left-full");
        });
        showSideMenu.addEventListener("click", () => {
            sidebar.classList.remove("left-full");
        });
    </script>
    <script>
        // Function to start the audio call
        function startAudioCall(userId) {
            document.getElementById('callUser').innerText = `Started audio call with advisor: ${userId}`;
            console.log(`Audio call started with user: ${userId}`);
            // Add your actual logic for starting the call here, like connecting to a WebRTC service or API.
        }

        // Start the call automatically when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            const userId = "{{ $advisor->user_id }}"; // Pass the user ID from the server
            startAudioCall(userId);
        });
    </script>
@endsection
