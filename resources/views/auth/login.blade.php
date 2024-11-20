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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 CDN -->
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
                <div class="flex gap-[8px] w-full items-center justify-center rounded-[8px]  bg-white py-1">
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
                    <div class="w-full  mt-[44] rounded-t-lg lg:rounded-none bg-[#F6F8F1]">
                        <h2 class="text-[#3A3A3A] font-[500] text-[16px] lg:text-[20px] mt-[3px]">
                            User Login
                        </h2>
                        <!-- input fields -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="usertype" value="0"> <!-- User type for User -->
                            <input class="p-[12px] mt-[18px] w-full rounded-[12px]" id="email"
                                placeholder="Email Address" type="email" name="email" :value="old('email')"
                                required autofocus autocomplete="username" />


                            <div class="flex justify-between items-center mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <input id="remember_me" name="remember" type="checkbox"
                                        class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            </div>


                            <button
                                class="mt-[30px] font-[600] text-[16px] text-[#2A2A2A] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                                Get OTP
                            </button>
                            <div class="mt-[30px] font-[500] text-[#3A3A3A] text-center">
                                Don’t have an account?<span class="font-[800] text-[#6A9023]"><a
                                        href="{{ route('register') }}">Sign Up</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Advisor content -->
                <div id="Advisor" class="city w-full" style="display: none;">
                    <div class="w-full  mt-[44] rounded-t-lg lg:rounded-none bg-[#F6F8F1]">
                        <h2 class="text-[#3A3A3A] font-[500] text-[16px] lg:text-[20px] mt-[3px]">
                            Advisor Login
                        </h2>
                        <!-- input fields -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="usertype" value="2"> <!-- User type for Advisor -->
                            <input class="p-[12px] mt-[18px] w-full rounded-[12px]" id="email"
                                placeholder="Email Address" type="email" name="email" :value="old('email')"
                                required autofocus autocomplete="username" />

                            <div class="flex justify-between items-center mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <input id="remember_me" name="remember" type="checkbox"
                                        class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            </div>


                            <button
                                class="mt-[30px] font-[600] text-[16px] text-[#2A2A2A] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                                Get OTP
                            </button>
                            <div class="mt-[30px] font-[500] text-[#3A3A3A] text-center">
                                Don’t have an account?<span class="font-[800] text-[#6A9023]"><a
                                        href="{{ route('register') }}">Sign
                                        Up</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- toogle for User and Advisor -->
<script>
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
</script>

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session("error") }}',
        confirmButtonColor: '#dc3545'
    });
</script>
@endif

</html>

{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            {{-- <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div> -

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
