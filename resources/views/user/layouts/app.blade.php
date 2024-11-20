<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.components.styles')
</head>

<body>
    @yield('usercontent')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const trigger = document.getElementById('dropdown-trigger');
            const dropdown = document.getElementById('dropdown-content');
            const container = document.getElementById('dropdown-container');

            trigger.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                const isClickInside = container.contains(event.target);
                if (!isClickInside) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
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
                    if (!user) {
                        CometChat.login(UID, authKey).then(
                            (user) => {
                                console.log("Login Successful:", user);
                            },
                            (error) => {
                                console.log("Login failed with exception:", error);
                            }
                        );
                    } else {
                        console.log("User already logged in:", user);
                    }
                },
                (error) => {
                    console.log("Something went wrong with fetching logged-in user:", error);
                }
            );
        }

        // Call Listener
        function addCallListener() {
            let listenerID = "UNIQUE_LISTENER_ID";
            CometChat.addCallListener(
                listenerID,
                new CometChat.CallListener({
                    onIncomingCallReceived: (incomingCall) => {
                        console.log("Incoming call:", incomingCall);
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
                    },
                    onOutgoingCallRejected: (call) => {
                        console.log("Outgoing call rejected:", call);
                    },
                    onIncomingCallCancelled: (call) => {
                        console.log("Incoming call cancelled:", call);
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
                    // Start call screen
                    CometChat.startCall(
                        outgoingCall.sessionId,
                        document.getElementById('call-screen'),
                        new CometChat.OngoingCallListener({
                            onUserJoined: user => {
                                console.log("User joined call:", user);
                            },
                            onUserLeft: user => {
                                console.log("User left call:", user);
                            },
                            onCallEnded: call => {
                                console.log("Call ended:", call);
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

        // Call functions to initialize
        initializeCometChat();
        addCallListener();
    </script>
    <!-- Call screen element -->
    <div id="call-screen"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: '{{ session('warning') }}'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}'
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '{{ session('info') }}'
            });
        </script>
    @endif
    <script>
        function handleCometChatLogout() {
            // Call CometChat logout
            CometChat.logout().then(
                () => {
                    console.log("Logout completed successfully from CometChat");
                    // Proceed with Laravel logout once CometChat logout is done
                    document.getElementById('logout-form').submit();
                },
                (error) => {
                    console.log("CometChat logout failed:", error);
                    // Still proceed with Laravel logout even if CometChat logout fails
                    document.getElementById('logout-form').submit();
                }
            );
        }
    </script>
</body>

</html>
