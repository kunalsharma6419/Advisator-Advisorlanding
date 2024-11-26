<div
    class="sidebar absolute md:hidden flex justify-end z-20 top-0 transition-all left-full w-full min-h-screen h-full bottom-0">
    <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
        <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
            <div class="flex justify-between items-center">
                {{-- <a href="../Client pages/userProfile.html">
                    <div class="flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                        <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                            src="../src/assets/img/profileImage.png" alt="" />
                        <div>
                            <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">
                                Radhika Sharma
                            </h2>
                            <h3 class="text-xs sm:text-sm text-[#828282] font-medium">
                                radhikasharma@abc.com
                            </h3>
                        </div>
                    </div>
                </a> --}}
                <a href="#" class="block w-full mb-4">
                    <div class="flex items-center gap-4 bg-[#FFF4ED] px-6 py-3 rounded-[30px] shadow-md">
                        <div class="relative">
                            @auth
                                {{-- <img class="w-[60px] h-[60px] sm:w-[80px] sm:h-[80px] rounded-full"
                                    src="..{{ Auth::user()->profile_photo_path ?? '../src/assets/defaultuser.png' }}"
                                    alt="Profile Image" /> --}}
                                @if (Auth::user()->profile_photo_path)
                                    <img class="w-[60px] h-[60px] sm:w-[80px] sm:h-[80px] rounded-full"
                                        src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="">
                                @else
                                    <?php
                                    $fullName = Auth::user()->full_name;
                                    $initial = strtoupper(substr($fullName, 0, 1));
                                    ?>
                                    <img id="profilePhoto"
                                        src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                        alt="Profile Photo" width="100"
                                        class="w-[60px] h-[60px] sm:w-[80px] sm:h-[80px] rounded-full">
                                @endif
                            @endauth

                            @guest
                                <img class="w-[60px] h-[60px] sm:w-[80px] sm:h-[80px] rounded-full"
                                    src="../src/assets/defaultuser.png" alt="Profile Image" />
                            @endguest
                            <!-- SVG icon for verified badge -->
                            <svg class="absolute bottom-0 right-0 w-6 h-6 text-green-500 bg-white rounded-full p-1"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zm-1.32-12.557l5.837 5.836-1.414 1.414-4.423-4.423-2.16 2.16-1.415-1.414 3.535-3.533z" />
                            </svg>
                        </div>
                        {{-- <div style="float: right;">
                            <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="../src/assets/img/cross.png"
                                alt="" />
                        </div> --}}
                    </div>
                </a>
                <div>
                    <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="../src/assets/img/cross.png"
                        alt="" />
                </div>
            </div>

            {{-- <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                <a href="../auth/advisornominationform.html">
                    <div class="ml-[2rem] flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/phone.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                            Become an Advisor
                        </h2>
                    </div>
                </a>
            </div> --}}
            @if (Route::has('login'))
                @auth
                    @php
                        $dashboardRoute = 'user.dashboard';
                        if (Auth::user()->usertype == 1) {
                            $dashboardRoute = 'advisatoradmin.dashboard';
                        } elseif (Auth::user()->usertype == 2) {
                            $dashboardRoute = 'advisor.dashboard';
                        }
                    @endphp
                    <a href="">
                        <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                            <a href="{{ route($dashboardRoute) }}">
                                <div class="ml-[2rem] flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/userImg.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                        Dashboard
                                    </h2>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                            <a href="{{ route('landing') }}">
                                <div class="ml-[2rem] flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/userImg.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                        Become an Advisor
                                    </h2>
                                </div>
                            </a>
                        </div>
                        <div class=" border-t border-b border-[#E5E5E5] py-2 my-2">
                            <a href="{{ route('login') }}">
                                <div class="ml-[2rem] flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/userImg.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                        Login
                                    </h2>
                                </div>
                            </a>
                        </div>
                    </a>
                @endauth
            @endif

            <div class="px-[2rem] py-2 flex flex-col gap-6">
                <a href="{{ route('consult-advisor') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            src="../src/assets/img/Consult Advisor.png" alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Consult Advisor
                        </h2>
                    </div>
                </a>
                {{-- <a href="../Client pages/featuredadvisor.html">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            src="../src/assets/img/FeaturedAdvisor.png" alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Featured Advisor
                        </h2>
                    </div>
                </a>
                <a href="../Client pages/advisorbooking.html">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/MyBookings.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            My Bookings
                        </h2>
                    </div>
                </a>
                <a href="../Client pages/mywallet.html">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Wallet.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Wallet
                        </h2>
                    </div>
                </a> --}}
                <a href="{{ route('blog') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Blogs.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Blogs
                        </h2>
                    </div>
                </a>
                <a href="{{ route('about-us') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Aboutus.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            About us
                        </h2>
                    </div>
                </a>

                <a href="{{ route('terms-of-service') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="./src/assets/Landing_page/Terms.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Terms of Services
                        </h2>
                    </div>
                </a>
                <a href="{{ route('privacy-policy') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            src="./src/assets/Landing_page/Privacy.png" alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Privacy Policy
                        </h2>
                    </div>
                </a>
                <a href="{{ route('onboarding-policy') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            src="./src/assets/Landing_page/Onboard.png" alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Onboarding Policy
                        </h2>
                    </div>
                </a>
                <a href="{{ route('shipping-delivery-policy') }}">
                    <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            fill="#6aa300" viewBox="0 0 24 24">
                            <path
                                d="M19 8h-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v15a1 1 0 0 0 1 1h1a3 3 0 0 0 6 0h2a3 3 0 0 0 6 0h1a1 1 0 0 0 1-1v-4a1 1 0 0 0-.276-.688l-4-4A1 1 0 0 0 19 8zM6 18a1 1 0 1 1 1-1 1 1 0 0 1-1 1zm9-1H9a3 3 0 0 0-6 0H4V4h12v4h-4a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5zm1-4h1.586L20 14.414V16h-2zM18 18a1 1 0 1 1 1-1 1 1 0 0 1-1 1z" />
                        </svg>
                        <h2 class="font-medium text-sm text-start sm:text-base text-[#2A2A2A]">
                            Shipping & Delivery Policy
                        </h2>
                    </div>
                </a>
                <a href="{{ route('cancellation-refund-policy') }}">
                    <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            fill="#6aa300" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10c5.514 0 10-4.486 10-10S17.514 2 12 2zm5 13a1 1 0 0 1-1.707.707L12 13.414l-3.293 3.293A1 1 0 1 1 7.293 15.293L10.586 12l-3.293-3.293A1 1 0 1 1 8.707 7.293L12 10.586l3.293-3.293A1 1 0 1 1 16.707 8.707L13.414 12l3.293 3.293A1 1 0 0 1 17 15z" />
                        </svg>
                        <h2 class="font-medium text-sm sm:text-base text-start text-[#2A2A2A]">
                            Cancellation & Refund Policy
                        </h2>
                    </div>
                </a>
                @auth
                    <a href="">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/sidebar/Logout.png"
                                alt="" />
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </a>
                @endauth
            </div>
        </div>

        <div class="px-[2rem] py-2">
            <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">
                Find us on:
            </h3>
            <div class="flex gap-5">
                <a href="https://www.instagram.com/shift180world" target="_blank" rel="noopener"><img
                        class="w-[30px] h-[30px]" src="../src/assets/sidebar/instagram.png" alt="" /></a>
                <a href="https://www.facebook.com/Shift180.world/" target="_blank" rel="noopener"><img
                        class="w-[30px] h-[30px]" src="../src/assets/sidebar/facebook.png" alt="" /></a>
                <a href="https://www.linkedin.com/company/shift180/" target="_blank" rel="noopener"><img
                        class="w-[30px] h-[30px]" src="../src/assets/sidebar/linkedin.png" alt="" /></a>
                <a href="http://www.youtube.com/@Shift180AdvisoryServices" target="_blank" rel="noopener"><img
                        class="w-[30px] h-[30px]" src="../src/assets/sidebar/youtube.png" alt="" /></a>
            </div>
        </div>
    </div>
</div>
