@extends('user.layouts.app')

@section('usercontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- header -->
        <div class="w-full h-[80px]  shadow-md">
            <div class="h-full w-[90%] md:w-[95%] lg:w-[90%] mx-auto flex justify-between items-center">
                <!-- logo -->
                <div>
                    <a href="./Home.html">
                        <img class="w-[130px]" src=" /src/assets/img/advisatorLogo.png" alt="" />
                    </a>
                </div>
                <div class="hidden md:flex xl:w-[75%] xl:justify-between gap-8d md:gap-x-10 xl:gap-[60px]">
                    <ul
                        class="font-Roboto font-normal text-[#3A3A3A] grow xl:justify-center gap-4 text-sm lg:text-lg xl:gap-5 flex items-center">
                        <li class="cursor-pointer"><a href="../Home.html">Home</a></li>
                        <li class="font-bold text-[#2A2A2A] cursor-pointer">
                            <a href="./consultadvisor.html"> Consult Advisor</a>
                        </li>
                        <li class="cursor-pointer">
                            <a href="./aboutus.html">About us</a>
                        </li>
                        <li class="cursor-pointer"><a href="./blog.html">Blog</a></li>
                        <li class="cursor-pointer">
                            <a href="./contactus.html">Contact us</a>
                        </li>
                    </ul>

                    <div class="ml-3 relative" id="dropdown-container">
                        <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition cursor-pointer"
                            id="dropdown-trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            @endif
                        </div>

                        <!-- Dropdown content -->
                        <div id="dropdown-content"
                            class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Profile') }}
                            </a>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a href="{{ route('api-tokens.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ __('API Tokens') }}
                                </a>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="md:hidden w-[40%] gap-2 flex items-center justify-between">
                    <div class="border border-[#DB9206] bg-[#FFF3DB] rounded sm:rounded-lg px-2 py-1 sm:py-2 sm:px-4">
                        <a class="cursor-pointer flex items-center gap-2" href="/src/Advisor pages/wallet.html">
                            <img class="h-5 w-5" src=" /src/assets/img/iconWallet.png" alt="" />
                            <div class="flex items-center font-Roboto text-sm sm:text-base text-[#DB9206] font-semibold">
                                <p>₹ {{ number_format(Auth::user()->user_wallet_balance, 2) }}</p>
                            </div>
                        </a>
                    </div>
                    <div id="showSideMenu" class="w-[24px] h-[24px] sm:w-7 sm:h-7 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('user.components.dashmenu')
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-4">Complete Your Payment</h1>

                <form id="razorpay-form" action="{{ route('user.mywallet.recharge.payment.callback') }}" method="POST">
                    @csrf
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id"
                        value="{{ $razorpayOrder['id'] }}">
                    <input type="hidden" name="razorpay_signature" id="razorpay_signature">

                    <button type="button" id="pay-button"
                        class="mt-4 bg-[#6A9023] text-white px-[16px] py-[8px] rounded-[12px] hover:bg-[#548b18]">
                        Pay ₹{{ $totalAmount }}
                    </button>
                </form>
            </div>
        </div> --}}
        <div class="font-Roboto w-[90%] md:w-[85%] lg:w-[70%] mx-auto my-12">
            <!-- Page name -->
            @include('user.components.dashmenu')

            <div class="container mx-auto bg-white shadow-md rounded-[18px] p-8">
                <div class="flex flex-col items-center">
                    <!-- Payment SVG -->
                    <div class="w-32 h-32 mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-full h-full text-[#6A9023]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25V6a2.25 2.25 0 00-2.25-2.25h-6A2.25 2.25 0 006.75 6v2.25M21 8.25v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 17.25v-9h18zM9.75 12h4.5m-4.5 4.5h4.5m6-6.75H3" />
                        </svg>
                    </div>

                    <h1 class="text-3xl font-bold text-[#2A2A2A] mb-6">Complete Your Payment</h1>

                    <form id="razorpay-form" action="{{ route('user.mywallet.recharge.payment.callback') }}" method="POST"
                        class="w-full md:w-3/4 lg:w-1/2">
                        @csrf
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                        <input type="hidden" name="razorpay_order_id" id="razorpay_order_id"
                            value="{{ $razorpayOrder['id'] }}">
                        <input type="hidden" name="razorpay_signature" id="razorpay_signature">

                        <button type="button" id="pay-button"
                            class="w-full mt-6 bg-[#6A9023] text-white px-6 py-3 rounded-[12px] text-lg font-semibold hover:bg-[#548b18] transition-all">
                            Pay ₹ {{ $totalAmount }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- bottom menu bar -->
        <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Home.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/activeHome.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Home</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./consultadvisor.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                            src="/src/assets/bottomNavbar/constultadvisor.png" alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Consult Advisor</p>
                </div>
                <div></div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./advisorbooking.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/booking.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Booking</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./userProfile.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/profile.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">My Profile</p>
                </div>
            </div>

            <div
                class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                <a href="./featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/advisor.png"
                        alt="">
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">Featured Advisor</p>
                </a>
            </div>

        </div>


        @include('user.components.footer')

        <!-- side bar -->
        <div
            class="sidebar absolute md:hidden flex justify-end z-20 top-0 transition-all left-full w-full min-h-screen h-full bottom-0">
            <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
                <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
                    <div class="flex justify-between items-center">
                        <a href="#">
                            <div class="flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                                @if (Auth::user()->profile_photo_path)
                                    <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                        src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="">
                                @else
                                    <?php
                                    $fullName = Auth::user()->full_name;
                                    $initial = strtoupper(substr($fullName, 0, 1));
                                    ?>
                                    <img id="profilePhoto"
                                        src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                        alt="Profile Photo" width="100"
                                        class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]">
                                @endif

                                <div>
                                    <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">
                                        {{ Auth::user()->full_name }}
                                    </h2>
                                    <h3 class="text-xs sm:text-sm text-[#828282] font-medium">
                                        {{ Auth::user()->email }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div>
                            <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="/src/assets/img/cross.png"
                                alt="" />
                        </div>
                    </div>

                    <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                        <a href="../auth/advisornominationform.html">
                            <div class="ml-[2rem] flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/phone.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                    Become an Advisor
                                </h2>
                            </div>
                        </a>
                    </div>

                    <div class="px-[2rem] py-2 flex flex-col gap-6">
                        <a href="../Client pages/consultadvisor.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/Consult Advisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Consult Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/featuredadvisor.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/FeaturedAdvisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Featured Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/advisorbooking.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/MyBookings.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    My Bookings
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/mywallet.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/Wallet.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Wallet
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/blog.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/Blogs.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Blogs
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/aboutus.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/Aboutus.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    About us
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/Customersupport.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Customer support
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/sidebar/Logout.png" alt="" />
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        {{ __('Log Out') }}
                                    </button>

                                </form>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="px-[2rem] py-2">
                    <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">
                        Find us on:
                    </h3>
                    <div class="flex gap-5">
                        <a href="https://www.instagram.com/shift180world" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/instagram.png" alt="" /></a>
                        <a href="https://www.facebook.com/Shift180.world/" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/facebook.png" alt="" /></a>
                        <a href="https://www.linkedin.com/company/shift180/" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/linkedin.png" alt="" /></a>
                        <a href="http://www.youtube.com/@Shift180AdvisoryServices" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/youtube.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('pay-button').onclick = function(e) {
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
                "amount": "{{ $razorpayOrder['amount'] }}", // Amount is in paise
                "currency": "INR",
                "name": "Wallet Recharge",
                "description": "Recharge for Plan {{ $plan->plan_name }}",
                "order_id": "{{ $razorpayOrder['id'] }}",
                "handler": function(response) {
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    document.getElementById('razorpay_signature').value = response.razorpay_signature;
                    document.getElementById('razorpay-form').submit();
                },
                "theme": {
                    "color": "#6A9023"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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


    <script>
        // JavaScript to toggle the answers and rotate the arrows
        document
            .querySelectorAll('[id^="question"]')
            .forEach(function(button, index) {
                button.addEventListener("click", function() {
                    var answer = document.getElementById("answer" + (index + 1));
                    var arrow = document.getElementById("arrow" + (index + 1));

                    if (
                        answer.style.display === "none" ||
                        answer.style.display === ""
                    ) {
                        answer.style.display = "block";
                        arrow.style.transform = "rotate(0deg)";
                    } else {
                        answer.style.display = "none";
                        arrow.style.transform = "rotate(-180deg)";
                    }
                });
            });
    </script>
@endsection
