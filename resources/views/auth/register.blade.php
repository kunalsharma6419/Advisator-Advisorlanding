<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="../output.css" rel="stylesheet" /> -->
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
    <div class="flex flex-col lg:flex-row w-full lg:gap-[86px] font-Roboto lg:p-[40px]">
        <!-- 1st row  -->
        <div class="flex w-full flex-col items-center lg:gap-[30px]">
            <!-- 1st image -->
            <img class="h-[306px] hidden lg:flex w-[500px] rounded" src="../src/assets/signup1.png" alt="" />
            <!-- 2nd image -->
            <div class="relative">
                <img class="h-[323px] hidden lg:flex w-full lg:w-[500px] rounded" src="../src/assets/signup2.png"
                    alt="" />
                {{-- <h2 class="text-white font-[700] hidden lg:flex text-[24px] absolute top-[30px] left-[24px]">
                    Connecting You with Expert Advisors, Right at Your Fingertips.
                </h2> --}}
            </div>
            <!-- sm image -->
            <img class="flex lg:hidden" src="../src/assets/auth/Rectangle 435 (1).png" alt="" />
        </div>
        <!-- 2nd row -->
        <div class="w-full px-[20px] lg:px-[85px] mt-[44] rounded-t-lg lg:rounded-none bg-[#F6F8F1]">
            <!-- logo div -->
            <div class="flex flex-col pt-[60px] w-full justify-center items-center">
                <h2 class="w-full font-[600] text-center text-[16px] lg:text-[32px]">
                    Welcome to
                </h2>
                <a href="{{ url('/') }}"><img class="w-[180px] h-[90px] lg:w-[270px] lg:h-[120px]"
                        src="../src/assets/auth/Rectangle 547 (1).png" alt="" /></a>
            </div>
            <!-- add the toogle here -->
            <div class="flex flex-col gap-5 w-[80%] md:w-[400px] mx-auto  py-3 items-center mt-[50px] justify-center">
                {{-- <div class="flex gap-[8px] w-full items-center justify-center rounded-[8px]  bg-white py-1">
                    <div id="btnUser"
                        class="tabButton bg-red-500 text-white px-4 justify-center py-2 w-full items-center text-[16px] rounded-[8px] flex gap-3 font-[500]"
                        onclick="openContent('User')">
                        <h4>User</h4>
                        <i class="fa-solid fa-user" style="color: #ffffff"></i>
                    </div>
                    <div id="btnAdvisor"
                        class="tabButton bg-white text-black px-4 py-2 w-full justify-center text-[16px] rounded-[8px] items-center flex gap-3 font-[500]"
                        onclick="openContent('Advisor')">
                        <h4>Advisor</h4>
                        <i class="fa-solid fa-user-doctor" style="color: #000000"></i>
                    </div>
                </div>
                <!-- User content -->
                <div id="User" class="city w-full" style="display: block">
                    <div class="w-full mt-[44] rounded-t-lg lg:rounded-none bg-[#F6F8F1]">
                        <h2 class="text-[#3A3A3A] font-[500] text-[16px] lg:text-[20px] mt-[3px]">
                            Sign up User
                        </h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- input fields -->
                            <input id="full_name" class="p-[18px] mt-[18px] w-full rounded-[12px]"
                                placeholder="Full Name" type="text" name="full_name" :value="old('full_name')"
                                required autofocus autocomplete="full_name" />
                            <input id="email" class="p-[12px] mt-[18px] w-full rounded-[12px]"
                                placeholder="Email Address" type="email" name="email" :value="old('email')"
                                required autocomplete="username" />
                            <!-- phone number input fields -->
                            <input id="phone_number" class="p-[12px] mt-[18px] w-full rounded-[12px]"
                                placeholder="Moblie Number with Country Code" type="text" name="phone_number"
                                :value="old('phone_number')" required autocomplete="phone_number" />
                            <!-- hidden input for usertype -->
                            <input type="hidden" id="usertype" name="usertype" value="0">
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <label for="terms" class="flex items-center">
                                        <input type="checkbox" name="terms" id="terms"
                                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                            required />

                                        <span class="ml-2 text-sm text-gray-600">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </span>
                                    </label>
                                </div>
                            @endif
                            <button
                                class="mt-[30px] font-[600] text-[16px] text-[#2A2A2A] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                                Create Account
                            </button>
                            <div class="mt-[30px] font-[500] text-[#3A3A3A] text-center">
                                Already have an account?<span class="font-[800] text-[#6A9023]"><a
                                        href="{{ route('login') }}">
                                        Log
                                        In</a></span>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <!-- Advisor content -->
                <div id="Advisor" class="city w-full" style="display: block">
                    <div class="w-full mt-[44] rounded-t-lg lg:rounded-none bg-[#F6F8F1]">
                        <h2 class="text-[#3A3A3A] font-[500] text-[16px] lg:text-[20px] mt-[3px]">
                            Sign up Advisor
                        </h2>
                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                            @csrf
                            <!-- input fields -->
                            <input id="full_name" class="p-[18px] mt-[18px] w-full rounded-[12px]"
                                placeholder="Full Name" type="text" name="full_name" :value="old('full_name')"
                                required autofocus autocomplete="full_name" />
                            <input id="email" class="p-[12px] mt-[18px] w-full rounded-[12px]"
                                placeholder="Email Address" type="email" name="email" :value="old('email')"
                                required autocomplete="username" />
                            <!-- phone number input fields -->
                            <input id="phone_number" class="p-[12px] mt-[18px] w-full rounded-[12px]"
                                placeholder="Moblie Number with Country Code" type="text" name="phone_number"
                                :value="old('phone_number')" required autocomplete="phone_number" />
                            <!-- hidden input for usertype -->
                            <input type="hidden" id="usertype" name="usertype" value="2">

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <label for="terms" class="flex items-center">
                                        <input type="checkbox" name="terms" id="terms"
                                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                            required />

                                        <span class="ml-2 text-sm text-gray-600">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </span>
                                    </label>
                                </div>
                            @endif
                            <button
                                class="mt-[30px] font-[600] text-[16px] text-[#2A2A2A] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                                Create Account
                            </button>
                            <div class="mt-[30px] font-[500] text-[#3A3A3A] text-center">
                                Already have an account?<span class="font-[800] text-[#6A9023]"><a
                                        href="{{ route('login') }}">
                                        Log
                                        In</a></span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- toogle for User and Advisor -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script>
    function openContent(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";

        // Reset all button styles and icon colors
        var buttons = document.getElementsByClassName("tabButton");
        for (i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove(
                "bg-red-500",
                "bg-white",
                "text-black",
                "text-white"
            );
            buttons[i].classList.add("bg-white", "text-black");
            buttons[i].querySelector("i").style.color = "#000000";
        }

        // Set styles for active button and icon color to white
        var activeButton = document.getElementById("btn" + cityName);
        activeButton.classList.add("bg-red-500", "text-white");
        activeButton.classList.remove("bg-white", "text-black");
        activeButton.querySelector("i").style.color = "#FFFFFF";
    }
</script> --}}
{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Display validation errors or other session errors if present
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}'
        });
    @elseif ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: '<ul>' +
                @foreach ($errors->all() as $error)
                    '<li>{{ $error }}</li>' +
                @endforeach
            '</ul>'
        });
    @endif

    // Handle form submission with AJAX
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                if (response.status === 'exists') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Account Exists',
                        text: response.message
                    }).then(function() {
                        window.location.href = response.verification_url;
                    });
                } else if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    }).then(function() {
                        window.location.href = response.verification_url;
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
{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Display validation errors or other session errors if present
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}'
        });
    @elseif ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: '<ul>' +
                @foreach ($errors->all() as $error)
                    '<li>{{ $error }}</li>' +
                @endforeach
            '</ul>'
        });
    @endif

    // Handle form submission with AJAX
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                if (response.status === 'exists' || response.status === 'warning') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Account Exists',
                        text: response.message
                    }).then(function() {
                        window.location.href = response.verification_url;
                    });
                } else if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    }).then(function() {
                        window.location.href = response.verification_url;
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
{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Display validation errors or other session errors if present
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}'
        });
    @elseif ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: '<ul>' +
                @foreach ($errors->all() as $error)
                    '<li>{{ $error }}</li>' +
                @endforeach
            '</ul>'
        });
    @endif

    // Handle form submission with AJAX
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(response => {
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message
                }).then(function() {
                    window.location.href = response.verification_url;
                });
            } else if (response.status === 'exists' || response.status === 'warning') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Account Exists',
                    text: response.message
                }).then(function() {
                    window.location.href = response.verification_url;
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'An error occurred. Please try again.'
            });
        });
    });
});
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Display validation errors or other session errors if present
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}'
            });
        @elseif ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: '<ul>' +
                    @foreach ($errors->all() as $error)
                        '<li>{{ $error }}</li>' +
                    @endforeach
                '</ul>'
            });
        @endif

        // Handle form submission with AJAX
        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            // Show loading indicator
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait a moment',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const response = await fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const result = await response.json();

                if (result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message
                    }).then(function() {
                        window.location.href = result.verification_url;
                    });
                } else if (result.status === 'exists' || result.status === 'warning') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Account Exists',
                        text: result.message
                    }).then(function() {
                        window.location.href = result.verification_url;
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.message || 'An error occurred. Please try again.'
                });
            }
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="full_name" value="{{ __('Full Name') }}" />
                <x-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')" required autofocus autocomplete="full_name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="phone_number" value="{{ __('Phone') }}" />
                <x-input id="phone_number" class="block mt-1 w-full" type="number" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" />
            </div>

            {{-- <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div> -

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
