<div class="w-full h-[80px]">
    <div
        class="h-full min-[388px]:w-[99%] md:w-[95%] lg:w-[90%] mx-auto flex gap-4 min-[420px]:justify-between items-center">
        <!-- logo -->
        <div>
            <a href="{{ route('home') }}">
                <img class="w-[180px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
            </a>
        </div>
        <div class="hidden md:flex xl:w-[75%] xl:justify-between gap-8d md:gap-x-10 xl:gap-[60px]">
            <ul
                class="font-sans font-normal text-[#3A3A3A] grow xl:justify-center gap-4 text-sm lg:text-lg xl:gap-5 flex items-center">
                <li class="cursor-pointer"><a href="{{ route('home') }}">Home</a></li>
                <li class="cursor-pointer">
                    <a href="#about">About us</a>
                </li>
                <li class="cursor-pointer">
                    <a href="#steps">Onboarding Steps</a>
                </li>

                <li class="cursor-pointer">
                    <a href="#Feature">Features</a>
                </li>
                <li class="cursor-pointer">
                    <a href="#Contact">Contact us</a>
                </li>
            </ul>

            @if (Route::has('login'))
                <ul class="text-sm lg:text-lg font-sans flex items-center gap-2 lg:gap-6">
                    @auth
                        @php
                            $dashboardRoute = 'user.dashboard';
                            if (Auth::user()->usertype == 1) {
                                $dashboardRoute = 'advisatoradmin.dashboard';
                            } elseif (Auth::user()->usertype == 2) {
                                $dashboardRoute = 'advisor.dashboard';
                            }
                        @endphp
                        <li class="cursor-pointer text-sm lg:text-base text-[#6A9023] font-bold">
                            <a class="underline-none" href="{{ route($dashboardRoute) }}">Dashboard</a>
                        </li>
                    @else
                        @if (Route::has('register'))
                            <li class="cursor-pointer text-sm lg:text-base text-[#FF3131] font-bold">
                                <a class="underline-none" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        @endif
                        <li class="cursor-pointer text-sm lg:text-base text-[#6A9023] font-bold">
                            <a class="underline-none" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            @endif
        </div>

        <div class="md:hidden w-[40%] gap-2 flex items-center justify-between">
            <div class="border border-[#DB9206] bg-[#FFF3DB] rounded sm:rounded-lg px-2 py-1 sm:py-2 sm:px-4">
                <a class="underline-none flex items-center gap-2" href="{{ route('register') }}">
                    <!-- SVG Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#DB9206]" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9 8v-1c0-2.21 1.79-4 4-4h10c2.21 0 4 1.79 4 4v1H3zm18-11h-2v-2h-2v2h-2v2h2v2h2v-2h2z" />
                    </svg>

                    Signup
                </a>
                <!-- <a
                    class="cursor-pointer flex items-center gap-2"
                    href="../Advisor pages/wallet.html"
                  >
                    <img
                      class="h-5 w-5"
                      src="./src/assets/img/iconWallet.png"
                      alt=""
                    />

                    <div
                      class="flex items-center font-sans text-sm sm:text-base text-[#DB9206] font-semibold"
                    >
                      &#8377;
                      <p>1,229</p>
                    </div>
                  </a> -->
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
