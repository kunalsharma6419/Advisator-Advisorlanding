{{-- @extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')

        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl mb-4">Consultation Call with {{ $advisor->user_id }}</h2>

                <!-- Call Screen Content -->
                <div id="consultationcall-screen" class="w-full h-[600px] bg-gray-100 flex items-center justify-center">
                    <p id="callUser" class="text-xl text-gray-700">Call Screen for {{ $advisor->user_id }}</p>
                </div>

                <!-- Button to end the call -->
                <button id="end-call-btn" class="mt-4 bg-red-500 text-white p-2 rounded hidden" onclick="endCall()">
                    End Call
                </button>
            </div>
        </div>

        <!-- bottom menu bar -->
        @include('web.components.bottommenu')

        <!-- side bar -->
        @include('web.components.sidebar')

        @include('web.components.footer')
    </div>

    <script type="text/javascript" src="https://unpkg.com/@cometchat/calls-sdk-javascript/CometChat.js"></script>
    <script>
        // Load CometChat script
        let cometappID = "{{ config('cometchat.appId') }}";
        let cometregion = "{{ config('cometchat.region') }}";

        const callAppSetting = new CometChatCalls.CallAppSettingsBuilder()
            .setAppId(cometappID)
            .setRegion(cometregion)
            .build();

        CometChatCalls.init(callAppSetting).then(
            () => {
                console.log("CometChatCalls initialization completed successfully");
                // Automatically initiate the call after CometChat initialization
                initiateCall(); // Start the call automatically on page load
            },
            (error) => {
                console.log("CometChatCalls initialization failed with error:", error);
            }
        );

        // Variables to store session and token details
        let callToken;
        let callSessionId;

        // Function to initiate the call
        function initiateCall(userId) {
            // Fetch the logged-in user
            CometChat.getLoggedinUser().then(loggedInUser => {
                if (loggedInUser) {
                    const authToken = loggedInUser.getAuthToken();
                    const sessionID = "SESSION_ID_HERE"; // Replace with actual session ID

                    // Generate the call token
                    CometChatCalls.generateToken(sessionID, authToken).then(
                        (res) => {
                            callToken = res.token; // Store the call token
                            console.log("Call token fetched: ", res.token);

                            // Call settings
                            const defaultLayout = true;
                            const audioOnly = false;
                            const callSettings = new CometChatCalls.CallSettingsBuilder()
                                .enableDefaultLayout(defaultLayout)
                                .setIsAudioOnlyCall(audioOnly)
                                .setCallListener(
                                    new CometChatCalls.OngoingCallListener({
                                        onUserListUpdated: (userList) => console.log("User list:",
                                            userList),
                                        onCallEnded: () => handleCallEnd(),
                                        onError: (error) => console.log("Error :", error),
                                        onUserJoined: (user) => console.log("User joined:", user),
                                        onUserLeft: (user) => console.log("User left:", user),
                                    })
                                )
                                .build();

                            // Start the call session
                            const htmlElement = document.getElementById("consultationcall-screen");
                            CometChatCalls.startSession(callToken, callSettings, htmlElement);

                            // Show the end call button
                            document.getElementById('end-call-btn').classList.remove('hidden');
                        },
                        (err) => {
                            console.log("Generating call token failed with error: ", err);
                        }
                    );
                }
            });
        }

        // Function to end the call
        function endCall() {
            if (callSessionId) {
                CometChat.endCall(callSessionId).then(
                    call => {
                        console.log("Call ended successfully:", call);
                        handleCallEnd();
                    },
                    error => {
                        console.log("Error ending call:", error);
                    }
                );
            }
        }

        // Function to handle call end
        function handleCallEnd() {
            console.log("Call ended.");
            document.getElementById('callUser').innerText = "The call has ended.";
            document.getElementById('end-call-btn').classList.add('hidden');
        }
    </script>
    <script>
        // JavaScript to toggle sidebar
        const hideSideMenu = document.getElementById("hideSideMenu");
        const showSideMenu = document.getElementById("showSideMenu");
        const sidebar = document.querySelector(".sidebar");

        hideSideMenu.addEventListener("click", () => {
            sidebar.classList.add("left-full");
        });
        showSideMenu.addEventListener("click", () => {
            sidebar.classList.remove("left-full");
        });
    </script>
@endsection --}}




@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')

        <!-- Calling UI -->
        <div id="calling-ui" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70"
            style="display: none;">
            <div class="cc-card bg-white p-8 rounded-lg shadow-lg flex flex-col items-center w-full max-w-md">
                <cometchat-label class="cc-card__title text-2xl font-semibold mb-4 text-center">Calling...</cometchat-label>
                <div class="cc-card__subtitle-view mb-4">
                    <span id="receiver-name" class="text-lg font-medium text-gray-700"></span>
                </div>
                <img src="{{ $advisor->profile_photo_path ? asset('storage/' . $advisor->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                    alt="Receiver's Profile Photo"
                    class="w-24 h-24 rounded-full mb-4 object-cover border-2 border-gray-300" />
                <div class="cc-card__bottom-view w-full mt-6">
                    <button id="end-call" onclick="endCallByCaller()"
                        class="bg-red-500 text-white py-3 px-6 rounded-lg hover:bg-red-600 transition duration-200 w-full focus:outline-none focus:ring-2 focus:ring-red-600">End
                        Call</button>
                </div>
            </div>
            <audio id="ringtone" loop>
                <source src="https://www.computerhope.com/jargon/m/example.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        `



        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl mb-4">Discovery Call with {{ $advisor->user_id }}</h2>
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
        // // Function to start the audio call
        // function startAudioCall(userId) {
        //     document.getElementById('callUser').innerText = `Started audio call with advisor: ${userId}`;
        //     console.log(`Audio call started with user: ${userId}`);
        //     // Add your actual logic for starting the call here, like connecting to a WebRTC service or API.
        // }

        // Start the call automatically when the page loads
        document.addEventListener("DOMContentLoaded", function() {
    const userId = "{{ $advisor->user_id }}"; // Advisor's user ID from server
    const currentUserId = "{{ auth()->user()->unique_id }}"; // Current logged-in user ID

    // Check if the current user is the advisor (listener)
    if (currentUserId === userId) {
        // If the user is an advisor and should only join the session
        //const sessionId = sessionStorage.getItem('session_id'); 
        const sessionId = sessionStorage.getItem('session_id'); 
        // Retrieve the session ID from sessionStorage
        if (sessionId) {
            // Only proceed if sessionId exists in sessionStorage
            console.log("Joining call with session ID:", sessionId);
           // startCallSession(sessionId); // Start the call session using the retrieved session ID
        } else {
            console.log("No session ID found in storage."); // Handle the case where sessionId is not found
        }
    } else {
        // Otherwise, initiate a new call
        console.log("Starting new audio call with user ID:", userId);
        startAudioCall(userId); // Start a new audio call with the advisor's user ID
    }
});

    </script>
@endsection

