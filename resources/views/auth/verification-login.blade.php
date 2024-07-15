<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        Roboto: "Roboto",
                    },
                    colors: {
                        clifford: "#da373d",
                    },
                },
            },
        };
    </script>
    <script src="https://kit.fontawesome.com/5c118959dd.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="flex font-Roboto lg:p-[40px] w-full flex-col xl:flex-row items-center gap-0 lg:gap-[86px]">
        <!-- 1st row -->
        <div class="flex flex-col items-center w-full">
            <img class="w-[400px] h-[400px] lg:w-[580px] lg:h-[700px]" src="../src/assets/auth/Rectangle 28 (1).png" />
        </div>
        <!-- 2nd row -->
        <div
            class="flex flex-col bg-[#F6F8F1] gap-5 px-[20px] lg:px-[85px] w-full rounded-[18px] py-[40px] lg:py-[100px] xl:py-[250px]">
            <h2 class="font-[600] text-[32px] text-center">Verification</h2>
            <p class="font-[400] text-[16px] text-center">
                Please enter the One time password sent to your Email address
            </p>
            <p id="message_error" class="text-red-500"></p>
            <p id="message_success" class="text-green-500"></p>
            <form id="otp-form" method="post">
                @csrf
                <input type="hidden" name="email" value="{{ $user->email }}">
                <div class="flex items-center justify-center gap-1 md:gap-3 lg:gap-3">
                    <input type="text"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-white border-transparent appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" name="otp[]" />
                    <input type="text"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-white border-transparent appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" name="otp[]" />
                    <input type="text"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-white border-transparent appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" name="otp[]" />
                    <input type="text"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-white border-transparent appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" name="otp[]" />
                    <input type="text"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-white border-transparent appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" name="otp[]" />
                    <input type="text"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-white border-transparent appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" name="otp[]" />
                </div>
                <div class="max-w-[260px] mx-auto mt-4"></div>
                <!-- button -->
                <button type="submit"
                    class="mt-[30px] text-[#2A2A2A] font-[600] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                    Verify OTP
                </button>
            </form>

            <p class="time"></p>
            <button id="resendOtpVerification">Resend Verification OTP</button>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // $('#otp-form').submit(function(e) {
        //     e.preventDefault();

        //     var formData = $(this).serialize();

        //     $.ajax({
        //         url: "{{ route('verifyloginotp') }}",
        //         type: "POST",
        //         data: formData,
        //         success: function(res) {
        //             if (res.success) {
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Success',
        //                     text: res.msg
        //                 }).then(() => {
        //                     window.open("/", "_self");
        //                 });
        //             } else {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Error',
        //                     text: res.msg
        //                 });
        //             }
        //         }
        //     });
        // });
        $('#otp-form').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('verifyloginotp') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        if (response.redirect) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Evaluation Pending',
                                text: response.msg
                            }).then(function() {
                                window.location.href = response.redirect;
                            });
                        } else {
                            Swal.fire({
                                icon: response.msg.includes('Evaluation') ? 'info' :
                                    'success',
                                title: response.msg.includes('Evaluation') ?
                                    'Evaluation Stage' : 'Success',
                                text: response.msg
                            }).then(function() {
                                if (!response.msg.includes('Evaluation')) {
                                    // window.location.href = response.redirect; // Redirect to dashboard or desired page
                                    if (response.msg.includes(
                                            'Login Success, Mail has been verified'
                                            )) {
                                        let dashboardRoute =
                                        '{{ route('home') }}'; // Default fallback route
                                        if (response.usertype == 1) {
                                            dashboardRoute =
                                                '{{ route('advisatoradmin.dashboard') }}'; // Adjust the route as needed
                                        } else if (response.usertype == 0) {
                                            dashboardRoute =
                                                '{{ route('user.dashboard') }}'; // Adjust the route as needed
                                        } else if (response.usertype == 2) {
                                            dashboardRoute =
                                                '{{ route('advisor.dashboard') }}'; // Adjust the route as needed
                                        }
                                        window.location.href = dashboardRoute;
                                    }
                                }
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.message ||
                            'An error occurred. Please try again.'
                    });
                }
            });
        });

        $('#resendOtpVerification').click(function() {
            $(this).text('Wait...');
            var userMail = @json($user->email);

            $.ajax({
                url: "{{ route('resendOtp') }}",
                type: "GET",
                data: {
                    email: userMail
                },
                success: function(res) {
                    $('#resendOtpVerification').text('Resend Verification OTP');
                    if (res.success) {
                        timer(); // Assuming you have a timer function defined elsewhere
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.msg
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.msg
                        });
                    }
                }
            });
        });
    });

    function timer() {
        var seconds = 30;
        var minutes = 1;

        var timer = setInterval(() => {
            if (minutes < 0) {
                $('.time').text('');
                clearInterval(timer);
            } else {
                let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                $('.time').text(tempMinutes + ':' + tempSeconds);
            }

            if (seconds <= 0) {
                minutes--;
                seconds = 59;
            }

            seconds--;
        }, 1000);
    }

    timer();
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#otp-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        if (response.redirect) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Action Required',
                                text: response.msg
                            }).then(function() {
                                window.location.href = response.redirect;
                            });
                        } else {
                            Swal.fire({
                                icon: response.msg.includes('Evaluation') ? 'info' : 'success',
                                title: response.msg.includes('Evaluation') ? 'Evaluation Stage' : 'Success',
                                text: response.msg
                            }).then(function() {
                                if (!response.msg.includes('Evaluation')) {
                                    window.location.href = '/dashboard'; // Redirect to dashboard or desired page
                                }
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.message || 'An error occurred. Please try again.'
                    });
                }
            });
        });
    });
</script> --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("otp-form");
        const inputs = [...form.querySelectorAll(".otp-input")];
        const submit = form.querySelector("button[type=submit]");

        const handleKeyDown = (e) => {
            if (!/^[0-9]{1}$/.test(e.key) && e.key !== "Backspace" && e.key !== "Delete" && e.key !==
                "Tab" && !e.metaKey) {
                e.preventDefault();
            }

            if (e.key === "Delete" || e.key === "Backspace") {
                const index = inputs.indexOf(e.target);
                if (index > 0) {
                    inputs[index - 1].value = "";
                    inputs[index - 1].focus();
                }
            }
        };

        const handleInput = (e) => {
            const {
                target
            } = e;
            const index = inputs.indexOf(target);
            if (target.value) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                } else {
                    submit.focus();
                }
            }
        };

        const handleFocus = (e) => {
            e.target.select();
        };

        const handlePaste = (e) => {
            e.preventDefault();
            const text = e.clipboardData.getData("text");
            if (!new RegExp(`^[0-9]{${inputs.length}}$`).test(text)) {
                return;
            }
            const digits = text.split("");
            inputs.forEach((input, index) => (input.value = digits[index]));
            submit.focus();
        };

        inputs.forEach((input) => {
            input.addEventListener("input", handleInput);
            input.addEventListener("keydown", handleKeyDown);
            input.addEventListener("focus", handleFocus);
            input.addEventListener("paste", handlePaste);
        });
    });
</script>

</html>


{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <p id="message_error" style="color:red;"></p>
        <p id="message_success" style="color:green;"></p>
        <form method="post" id="verificationForm">
            @csrf
            <input type="hidden" name="email" value="{{ $user->email }}">
            <input type="number" name="otp" placeholder="Enter OTP" required>
            <br><br>
            <button type="submit">Verify</button>

        </form>

        <p class="time"></p>

        <button id="resendOtpVerification">Resend Verification OTP</button>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#verificationForm').submit(function(e) {
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url: "{{ route('verifyloginotp') }}",
                        type: "POST",
                        data: formData,
                        success: function(res) {
                            if (res.success) {
                                alert(res.msg);
                                window.open("/", "_self");
                            } else {
                                $('#message_error').text(res.msg);
                                setTimeout(() => {
                                    $('#message_error').text('');
                                }, 3000);
                            }
                        }
                    });

                });

                $('#resendOtpVerification').click(function() {
                    $(this).text('Wait...');
                    var userMail = @json($user->email);

                    $.ajax({
                        url: "{{ route('resendOtp') }}",
                        type: "GET",
                        data: {
                            email: userMail
                        },
                        success: function(res) {
                            $('#resendOtpVerification').text('Resend Verification OTP');
                            if (res.success) {
                                timer();
                                $('#message_success').text(res.msg);
                                setTimeout(() => {
                                    $('#message_success').text('');
                                }, 3000);
                            } else {
                                $('#message_error').text(res.msg);
                                setTimeout(() => {
                                    $('#message_error').text('');
                                }, 3000);
                            }
                        }
                    });

                });
            });

            function timer() {
                var seconds = 30;
                var minutes = 1;

                var timer = setInterval(() => {

                    if (minutes < 0) {
                        $('.time').text('');
                        clearInterval(timer);
                    } else {
                        let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                        let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                        $('.time').text(tempMinutes + ':' + tempSeconds);
                    }

                    if (seconds <= 0) {
                        minutes--;
                        seconds = 59;
                    }

                    seconds--;

                }, 1000);
            }

            timer();
        </script>
    </x-authentication-card>
</x-guest-layout> --}}
