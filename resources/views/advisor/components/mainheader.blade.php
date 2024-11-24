<div class="w-full h-[80px] shadow-md">
    <div class="h-full w-[90%] md:w-[95%] lg:w-[90%] mx-auto flex justify-between items-center">
        <!-- logo -->
        <div>
            <a href="{{ route('home') }}">
                <img class="w-[180px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
            </a>
            
        </div>
        <div class="hidden md:flex xl:w-[75%] xl:justify-between gap-8d md:gap-x-10 xl:gap-[60px]">
            {{-- <ul
                class="font-Roboto font-normal text-[#3A3A3A] grow xl:justify-center gap-4 text-sm lg:text-lg xl:gap-5 flex items-center">
                <li class="font-bold text-[#2A2A2A] cursor-pointer"><a href="{{ route('home') }}">Home</a></li>
                <li class="cursor-pointer">
                    <a href="../src/Advisor pages/consultadvisor.html">Consult Advisor</a>
                </li>
                <li class="cursor-pointer">About us</li>
                <li class="cursor-pointer">Blog</li>
                <li class="cursor-pointer">Contact us</li>
            </ul> --}}
            <ul
                class="font-sans font-normal text-[#3A3A3A] grow xl:justify-center gap-4 text-sm lg:text-lg xl:gap-5 flex items-center">
                <li class="cursor-pointer"><a href="{{ route('home') }}">Home</a></li>
                <li class="cursor-pointer">
                    <a href="{{ route('home') }}#about">About us</a>
                </li>
                <li class="cursor-pointer">
                    <a href="{{ route('home') }}#steps">Onboarding Steps</a>
                </li>
                <li class="cursor-pointer">
                    <a href="{{ route('home') }}#Feature">Features</a>
                </li>
                <li class="cursor-pointer">
                    <a href="{{ route('home') }}#Contact">Contact us</a>
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
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
            <div class="ml-1 relative py-2 lg:px-4 flex items-center justify-center rounded-lg cursor-pointer">
                <form action="{{ route('toggle.usertype') }}" method="POST">
                    @csrf
                    <div
                        class="">
                        <button type="submit" class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-2 px-4 rounded-lg shadow-md">
                            @if (Auth::user()->usertype == 0)
                                Switch to Advisor
                            @else
                                Switch to Client
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="md:hidden w-[40%] gap-2 flex items-center justify-between">
            <div class="border border-[#DB9206] bg-[#FFF3DB] rounded sm:rounded-lg px-2 py-1 sm:py-2 sm:px-4">
                <a class="cursor-pointer flex items-center gap-2" href="{{ route('advisor.dashboard') }}">
                    {{-- <img class="h-5 w-5" src="../src/assets/img/iconWallet.png" alt="" /> --}}
                    {{-- <div class="text-[#D6D6D6]">|</div> --}}

                    <div class="flex items-center font-Roboto text-sm sm:text-base text-[#DB9206] font-semibold">

                        <p>Dashboard</p>
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
