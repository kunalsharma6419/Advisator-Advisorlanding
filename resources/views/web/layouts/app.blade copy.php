<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.components.styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @laravelPWA
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    {{-- <script src=" https://unpkg.com/@cometchat/chat-uikit-react@latest/dist/index.js"></script> --}}
    <script type="module">
        import {
            CometChatOutgoingCall,
            CometChatUIKitConstants,
        } from 'https://unpkg.com/@cometchat/chat-uikit-react@latest/dist/index.js';
    </script>


</head>

<body class="fixed-bottom-bar">
    @yield('maincontent')

    <!-- CometChat Initialization -->
    <script>
        let appID = "{{ config('cometchat.appId') }}";
        let region = "{{ config('cometchat.region') }}";
        let authKey = "{{ config('cometchat.authKey') }}";
        @if (Auth::check())
            let UID = "{{ Auth::user()->unique_id }}";
            // Initialize CometChat only if the user is authenticated
            initializeCometChat();
            addCallListener();
        @else
            let UID = null;
            console.log("User is not authenticated. CometChat initialization skipped.");
        @endif

        // Initialize CometChat
        function initializeCometChat() {
            let appSetting = new CometChat.AppSettingsBuilder()
                .subscribePresenceForAllUsers()
                .setRegion(region)
                .autoEstablishSocketConnection(true)
                .build();

            let FCM_TOKEN = "";

            CometChat.init(appID, appSetting).then(
                () => {
                    console.log("CometChat initialization completed successfully");

                    // Call login function after initialization only if UID is set
                    if (UID) {
                        loginToCometChat(UID, authKey);
                    } else {
                        console.log("Cannot log in to CometChat. User ID is null.");
                    }
                },
                (error) => {
                    console.log("Initialization failed with error:", error);
                }
            );
        }

        // Login to CometChat
        function loginToCometChat(UID, authKey) {
            CometChat.getLoggedinUser().then(
                (user) => {
                    if (!user && UID) {
                        CometChat.login(UID, authKey).then(
                            (user) => {
                                console.log("Login Successful:", user);
                            },
                            (error) => {
                                console.log("Login failed with exception:", error);
                            }
                        );
                        CometChatNotifications.registerPushToken(
                                pushToken,
                                CometChatNotifications.PushPlatforms.FCM_WEB,
                                'fcm-advisatortest-1'
                            )
                            .then((payload) => {
                                console.log('Token registration successful');
                            })
                            .catch((err) => {
                                console.log('Token registration failed:', err);
                            });
                    } else {
                        console.log("User already logged in:", user);
                    }
                },
                (error) => {
                    console.log("Something went wrong with fetching logged-in user:", error);
                }
            );
        }

        // // Call Listener
        function addCallListener() {
            let listenerID = "UNIQUE_LISTENER_ID";
            CometChat.addCallListener(
                listenerID,
                new CometChat.CallListener({
                    onIncomingCallReceived: (incomingCall) => {
                        console.log("Incoming call:", incomingCall);
                        // handleCallEvent(incomingCall, 'incoming');
                        // Accept the call to show the call screen
                        CometChat.acceptCall(incomingCall.sessionId).then(
                            (acceptedCall) => {
                                console.log("Call accepted successfully:", acceptedCall);
                                CometChat.startCall(
                                    acceptedCall.sessionId,
                                    document.getElementById('call-screen'),
                                    new CometChat.OngoingCallListener({
                                        onUserJoined: user => {
                                            console.log("User joined the call:", user);
                                        },
                                        onUserLeft: user => {
                                            console.log("User left the call:", user);
                                        },
                                        onCallEnded: call => {
                                            console.log("Call ended:", call);
                                        }
                                    })
                                );
                            },
                            (error) => {
                                console.log("Call acceptance failed with error:", error);
                            }
                        );
                    },
                    onOutgoingCallAccepted: (call) => {
                        console.log("Outgoing call accepted:", call);
                        // handleCallEvent(call, 'accepted');
                    },
                    onOutgoingCallRejected: (call) => {
                        console.log("Outgoing call rejected:", call);
                        // handleCallEvent(call, 'rejected');
                    },
                    onIncomingCallCancelled: (call) => {
                        console.log("Incoming call cancelled:", call);
                        // handleCallEvent(call, 'cancelled');
                    }
                })
            );
        }


        // Start Audio Call
        function startAudioCall(receiverID) {
            const callType = CometChat.CALL_TYPE.AUDIO;
            const receiverType = CometChat.RECEIVER_TYPE.USER;

            const call = new CometChat.Call(receiverID, callType, receiverType);

            CometChat.initiateCall(call).then(
                outgoingCall => {
                    console.log("Audio call initiated successfully:", outgoingCall);

                    // Send call data to Laravel API
                    saveCallLog(outgoingCall);
                    // Start call screen
                    CometChat.startCall(
                        outgoingCall.sessionId,
                        document.getElementById('call-screen'),
                        new CometChat.OngoingCallListener({
                            onUserJoined: user => {
                                console.log("User joined call:", user);
                                saveCallData(outgoingCall, 'user_joined');
                            },
                            onUserLeft: user => {
                                console.log("User left call:", user);
                                saveCallData(outgoingCall, 'user_left');
                            },
                            onCallEnded: call => {
                                console.log("Call ended:", call);
                                saveCallData(outgoingCall, 'call_ended');
                                showCallEndedMessage();

                                function showCallEndedMessage() {
                                    console.log('Call Ended');
                                }
                            }
                        })
                    );
                },
                error => {
                    console.log("Audio call initiation failed:", error);
                }
            );
        }

        // Call Initialization
        function initializeCometChatCalls() {
            const callAppSetting = new CometChatCalls.CallAppSettingsBuilder()
                .setAppId(appID)
                .setRegion(region)
                .build();

            CometChatCalls.init(callAppSetting).then(
                () => {
                    console.log("CometChatCalls initialization completed successfully");
                },
                (error) => {
                    console.log("CometChatCalls initialization failed with error:", error);
                }
            );
        }

        function saveCallLog(callData) {
            const data = {
                session_id: callData.sessionId,
                sender_id: callData.sender.getUid(),
                receiver_id: callData.receiverId,
                call_type: callData.type,
                initiated_at: callData.initiatedAt,
                status: callData.status,
                raw_response: callData
            };

            fetch('/save-call-log', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Call log saved:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function saveCallData(callDatas, action) {
            const data = {
                session_id: callDatas.sessionId,
                sender_id: callDatas.sender.getUid(),
                receiver_id: callDatas.receiverId,
                call_type: callDatas.type,
                initiated_at: action === 'user_joined' ? callDatas.initiatedAt : null,
                joined_at: action === 'call_ended' ? callDatas.joinedAt : null,
                ended_at: callDatas.sentAt,
                status: callDatas.status,
                action: action, // save the action ('user_joined', 'user_left', 'call_ended')
                raw_response: callDatas
            };

            fetch('/save-call-data', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Call data saved:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }


        // Call functions to initialize
        initializeCometChat();
        addCallListener();
    </script>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
        import {
            getMessaging,
            getToken,
            onMessage
        } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-messaging.js";
        export const CometChatConstants = {
            appId: "{{ config('cometchat.appId') }}",
            region: "{{ config('cometchat.region') }}",
            authKey: "{{ config('cometchat.authKey') }}",
            fcmProviderId: "{{ config('firebase.fcmProviderId') }}",
        };



        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "{{ config('firebase.apiKey') }}",
            authDomain: "{{ config('firebase.authDomain') }}",
            projectId: "{{ config('firebase.projectId') }}",
            storageBucket: "{{ config('firebase.storageBucket') }}",
            messagingSenderId: "{{ config('firebase.messagingSenderId') }}",
            appId: "{{ config('firebase.appId') }}"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const messaging = getMessaging(app);

        // Request user permission for notifications
        function askPermission() {
            return Notification.requestPermission().then((permission) => {
                if (permission === 'granted') {
                    console.log('Notification permission granted.');
                } else {
                    console.warn('Notification permission denied.');
                }
            });
        }

        // Register FCM token with CometChat
        askPermission().then(() => {
            getToken(messaging, {
                vapidKey: "{{ config('firebase.vapidKey') }}"
            }).then((currentToken) => {
                if (currentToken) {
                    CometChatNotifications.registerPushToken(
                        currentToken,
                        CometChatNotifications.PushPlatforms.FCM_WEB,
                        CometChatConstants.fcmProviderId
                    ).then((response) => {
                        console.log("Token registered:", response);
                    }).catch((error) => {
                        console.error("Error registering token:", error);
                    });
                } else {
                    console.warn("No registration token available");
                }
            }).catch((error) => {
                console.error("Token retrieval error:", error);
            });
        });

        // Handle incoming messages
        onMessage(messaging, (payload) => {
            console.log('Message received:', payload);
        });

        // Register service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/firebase-messaging-sw.js').then((registration) => {
                console.log('Service Worker registered:', registration);
            }).catch((error) => {
                console.error('Service Worker registration failed:', error);
            });
        }
    </script>
    @if (Auth::check())
        @php
            $uniqueId = Auth::user()->unique_id;
            $userType = Auth::user()->usertype;

            // Fetch the corresponding UserProfile model using the unique_id
            $userProfile = \App\Models\UserProfiles::where('user_id', $uniqueId)->first();

            // Check if the profile completion percentage exists and is less than 100
            $profileCompletion = $userProfile ? $userProfile->profile_completion_percentage : 0;

            // Determine the dashboard route based on user type and profile completion status
            if ($profileCompletion < 100) {
                $dashboardRoute = 'user.myprofile'; // Redirect to profile if not complete
            } else {
                // Set dashboard route based on user type
                if ($userType == 1) {
                    $dashboardRoute = 'advisatoradmin.dashboard';
                } elseif ($userType == 2) {
                    $dashboardRoute = 'advisor.dashboard';
                } else {
                    $dashboardRoute = 'user.dashboard'; // Default for usertype 0
                }
            }
        @endphp
        @if ($userType == 0 && $profileCompletion < 100)
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'Complete Your Profile',
                    text: 'Your profile is incomplete. Please complete your profile before proceeding.',
                    showCancelButton: true,
                    confirmButtonText: 'Go to My Profile',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true, // Cancel button on the left
                    confirmButtonColor: '#6A9023', // Custom confirm button color
                    cancelButtonColor: '#FF5555' // Custom cancel button color
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('user.myprofile') }}"; // Redirect to profile route
                    }
                });
            </script>
        @endif
    @endif
</body>

</html>
