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
                    <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="../src/assets/img/cross.png"
                        alt="" />
                </div>
            </div>

            <a href="">
                <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                    <a href="{{ route('advisor.myprofile') }}">
                        <div class="ml-[2rem] flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="../src/assets/sidebar/userImg.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                My Profile
                            </h2>
                        </div>
                    </a>
                </div>
            </a>

            <div class="px-[2rem] py-2 flex flex-col gap-6">
                <a href="{{ route('advisor.mybookings') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            src="../src/assets/sidebar/MyBookings.png" alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            My Bookings
                        </h2>
                    </div>
                </a>
                <a href="{{ route('advisor.myearnings') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/sidebar/money.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            My Earnings
                        </h2>
                    </div>
                </a>
                <a href="{{ route('terms-of-service') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            src="../src/assets/Landing_page/Terms.png" alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                             Terms of Services
                        </h2>
                    </div>
                </a>
                <a href="{{ route('privacy-policy') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/Landing_page/Privacy.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Privacy Policy
                        </h2>
                    </div>
                </a>
                <a href="{{ route('onboarding-policy') }}">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/Landing_page/Onboard.png"
                            alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Onboarding Policy
                        </h2>
                    </div>
                </a>
                {{-- <a href="">
                    <div class="flex items-center gap-4">
                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                            src="../src/assets/sidebar/Customersupport.png" alt="" />
                        <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                            Customer support
                        </h2>
                    </div>
                </a> --}}
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
