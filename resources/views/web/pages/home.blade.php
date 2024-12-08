@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- header -->
        @include('web.components.header')

        <!-- sign up -->
        @include('web.components.signupcomp')

        <!-- content rest form  -->
        <div class="bg-[#FAFCF6] mt-4 lg:mt-0 h-full font-sans font-bold text-center">
            <div
                class="mt-[1rem] md:mt-[2rem] lg:mt-[3rem] w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto flex flex-col md:flex-row gap-2 lg:gap-[2rem]">
                <!-- here will our video part -->
                <div class="md:w-[50%] md:h-[280px] lg:h-[390px] h-[390px]s">
                    {{-- <img src="./src/assets/img/videoImage.png" class="rounded-xl md:h-full lg:w-full" alt="" /> --}}
                    <video class="rounded-xl md:h-full lg:w-full" autoplay muted loop playsinline>
                        <source src="./src/assets/videos/Advisatorintrofinalv5.mp4" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>

                </div>

                <!-- rest -->
                <div class="mt-[1rem] md:mt-0 flex flex-col justify-around items-center md:w-[50%] gap-y-[1rem]">
                    <div class="w-[90%] md:w-[95%] lg:w-[90%] borders border-black mx-auto text-[20px] lg:text-[38px]">
                        <h2 class="content-change text-[#FF3131] items-center text-start leading-7 md:leading-10">
                            Engage with handpicked experts to <span class="text-[#6A9023] lowercase" id="typing"></span>
                        </h2>
                    </div>

                    <div class="w-[90%] md:w-[95%] lg:w-[90%] mx-auto my-[1rem] md:my-0">
                        <form id="searchForm" action="/consult-advisor" method="GET" onsubmit="return handleSearch()">
                            <div
                                class="max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-sans font-normal text-sm lg:text-base text-[#2A2A2A]">
                                <div class="w-full">
                                    <input id="search-bar"
                                        class="font-medium text-sm w-[95%] lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                                        type="text" autocomplete="off" placeholder="What are you looking for?" />
                                </div>

                                <div
                                class="p-2 md:py-2 md:px-[2rem] cursor-pointer flex items-center justify-center gap-x-2 rounded-[2rem] bg-gradient-to-r from-[#D1E8A7] to-[#6A9023] shadow-md">
                                <button type="submit" class="flex items-center justify-center gap-x-2 whitespace-nowrap">
                                    <svg class="w-5 h-5 text-[#000000]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        strokeWidth="1.5" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                    <span
                                        class="hidden md:block font-sans font-semibold text-sm lg:text-base text-[#2A2A2A]">
                                        Find Advisor
                                    </span>
                                </button>
                            </div>
                            
                            
                            
                            </div>

                            <!-- Hidden inputs for different search parameters -->
                            <input type="hidden" id="business_function_id" name="business_function" value="">
                            <input type="hidden" id="sub_function_id" name="sub_function" value="">
                            <input type="hidden" id="industry_id" name="industry" value="">
                            <input type="hidden" id="location_id" name="location" value="">
                        </form>
                    </div>


                    <div
                        class="flex justify-between items-center gap-2 md:gap-4 lg:gap-6 w-full md:mx-4 lg:w-[95%] mx-auto">
                        <div
                            class="border md:border-4 border-[#FF3131] rounded-[18px] w-full px-2 py-1 sm:py-1 lg:px-3 lg:py-2 flex flex-col items-center gap-1 shadow-sm">
                            <h1 class="font-bold md:whitespace-nowrap text-base sm:text-lg lg:text-xl text-[#3A3A3A]">
                                Experts
                            </h1>
                            <h2 class="font-bold text-[#6A9023] text-lg sm:text-xl lg:text-2xl">    
                                <span class="count" id="counter">0</span>+
                            </h2>
                        </div>
                        <div
                        class="border md:border-4 border-[#FF3131] rounded-[18px] w-full px-2 py-1 sm:py-1 lg:px-3 lg:py-2 flex flex-col items-center gap-1 shadow-sm">
                            <h1 class="font-bold md:whitespace-nowrap text-base sm:text-lg lg:text-xl text-[#3A3A3A]">
                                Industries
                            </h1>
                            <h2 class="font-bold text-[#6A9023] text-lg sm:text-xl lg:text-2xl flex items-center">
                                <span class="count" id="industeries">0</span><span class=" ml-[-5px]">+</span>
                            </h2>
                        </div>
                        <div
                            class="border md:border-4 border-[#FF3131] rounded-[18px] w-full px-2 py-1 sm:py-1 lg:px-3 lg:py-2 flex flex-col items-center gap-1 shadow-sm">
                            <h1 class="font-bold md:whitespace-nowrap text-base sm:text-lg lg:text-xl text-[#3A3A3A]">
                                Clients
                            </h1>
                            <h2 class="font-bold text-[#6A9023] text-lg sm:text-xl lg:text-2xl flex items-center">
                                <span class="count" id="client">0</span><span class=" ml-[-5px]">+</span>
                            </h2>
                        </div>
                    </div>

                </div>
            </div>

            <div class="w-[90%] md:w-[95%] lg:w-[80%] mx-auto mt-[2rem] md:mt-[2rem] md:h-[17rem] lg:h-[13rem]">
                <!-- Swiper -->
                <div class="swiper mySwiper1">
                    <p class="font-medium text-lg mt-[5px]  lg:text-2xl text-[#2A2A2A] text-start px-2 w-[60%] sm:w-full">
                        What's on your mind ?
                    </p>
                    {{-- <div class="swiper-wrapper mt-[2rem] md:mt-[2.2rem]">

                        <a class="swiper-slide shadow-lg group flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05] hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/AI&Analytics.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                AI & Analytics</h2>
                        </a>

                        <a class="swiper-slide shadow-lg group flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05] hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/Business-Growth.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Business Growth</h2>
                        </a>
                        <a class="swiper-slide group shadow-lg flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05] hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/BusinessLegal.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Business Legal</h2>
                        </a>
                        <a class="swiper-slide group shadow-lg flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05]  hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/Fund-Raise.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Fund raise</h2>
                        </a>
                        <a class="swiper-slide group shadow-lg flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05]  hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/cloudRaise.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                IT & Cloud</h2>
                        </a>
                        <a class="swiper-slide shadow-lg group flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05]  hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/Market-Research.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Market Research</h2>
                        </a>
                        <a class="swiper-slide group shadow-lg flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05]  hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/Digital-Marketing.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Marketing</h2>
                        </a>
                        <a class="swiper-slide group shadow-lg flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05] hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/Other.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Other Functions</h2>
                        </a>
                        <a class="swiper-slide shadow-lg group flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05] hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/Business-Growth.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Business Growth</h2>
                        </a>
                        <a class="swiper-slide group shadow-lg flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05] hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/BusinessLegal.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Business Legal</h2>
                        </a>
                        <a class="swiper-slide group shadow-lg flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg  transition-colors bg-[#5D8D05]  hover:bg-[#FF3131] focus:outline-bold focus:ring"
                            href="#">
                            <img class='w-[34px] h-[35px] text-blue-900' src="./src/assets/category/Fund-Raise.png"
                                alt="">
                            <h2
                                class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                Fund raise</h2>
                        </a>

                    </div> --}}
                    <div class="swiper-wrapper mt-[2rem] md:mt-[2.2rem]">
                        @foreach ($categories as $category)
                            <a class="swiper-slide shadow-lg group flex flex-col w-[120px] h-[110px] items-center justify-center gap-2 rounded-lg transition-colors bg-[#5D8D05] hover:bg-[#FF3131] focus:outline-bold focus:ring"
                                href="{{ route('category.detail', ['categoryName' => $category->name]) }}">
                                <div class="w-[34px] h-[35px]" data-category="{{ $category->name }}"></div>
                                <h2
                                    class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500">
                                    {{ $category->name }}
                                </h2>
                            </a>
                        @endforeach
                    </div>

                    <!-- Navigation buttons -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
            </div>


            <!-- Discover experts from various Industry Verticals ! -->
            <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto mt-[4rem]">
                <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                    Our advisors are featured and have won awards <span class="text-[#FF3131]">orga</span><span
                        class="text-[#6A9023]">nised</span> by
                </h1>

                <div class="mt-[1rem]">
                    <div class="swiper swiper-bussiness h-[7rem] sm:h-[7rem] lg:h-[10rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]"
                                    src="https://beamstart.com/image/aHR0cHM6Ly93d3cuYnVzaW5lc3Mtc3RhbmRhcmQuY29tL2Fzc2V0cy93ZWItYXNzZXRzL2ltYWdlcy9CU2xvZ28xMjAweDYyNy5wbmc="
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]" src="./src/assets/business/times-of-india_logo.png"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]" src="https://mepa.edu4u.today/images/press/1.png"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]" src="./src/assets/business/WITHOUT-YEAR-04.webp"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[9rem] bg-[#000]" src="./src/assets/business/3AI-logo-color.png"
                                    alt="">
                            </div>
                            <div class="flex items-center justify-center w-full h-full swiper-slide">
                                <img class="h-[2rem] lg:h-[4rem]"
                                    src="https://www.freepnglogos.com/uploads/forbes-logo-png/forbes-magazine-logo-transparent-blue-13.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div></div>
            </div>



            <div
                class="mt-[2rem] md:mt-[3rem] w-[90%] font-sans md:w-[80%] lg:w-[90%] max-w-[40rem] lg:max-w-[55rem] mx-auto">
                <div class="my-4 flex gap-4 md:gap-[4rem] justify-around w-full">
                    <a href="{{ route('consult-advisor') }}"
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713]  px-6 py-2 lg:px-4 lg:py-4 w-full rounded-[12px] lg:rounded-[12px] font-semibold text-xs sm:text-sm md:text-base lg:text-xl border-[#6A9023] shadow-lg text-[#FFFFFF]">
                        Explore Advisors
                    </a>
                    <a href="{{ route('contact-us') }}"
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] px-6 py-2 lg:px-4 lg:py-4 w-full rounded-[12px] lg:rounded-[12px] font-semibold text-xs sm:text-sm md:text-base lg:text-xl text-[#FFFFFF] border border-[#6A9023] shadow-lg flex items-center justify-center">
                        Let's help you <span class='hidden pl-2 md:block'> search</span>
                    </a>
                </div>
            </div>

            <div class="w-[90%] font-Roboto md:w-[95%] lg:w-[90%] mx-auto mt-[7rem] md:mt-[8rem] pb-[2rem]">
                <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                    Let us help you find the right
                    <span class="text-[#FF3131]">Adv</span><span class="text-[#6A9023]">isor !</span>
                </h1>

                <div class="grid grid-cols-2 lg:grid-cols-3 justify-items-center gap-y-6">
                    <a href="{{ route('category.detail', ['categoryName' => 'Digital Platforms']) }}">
                        <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                            <img src="./src/assets/findAdvisor/Automation.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                                alt="" />
                            <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                                Want to automate business with technology ?
                            </h4>

                        </div>
                    </a>
                    <a href="{{ route('category.detail', ['categoryName' => 'Digital Marketing']) }}">
                        <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                            <img src="./src/assets/findAdvisor/Product Launch.png"
                                class="h-[110px] sm:h-[170px] md:h-[260px]" alt="" />
                            <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                                Looking for a strategy in launching products ?
                            </h4>
                        </div>
                    </a>
                    <a href="{{ route('category.detail', ['categoryName' => 'Business Growth']) }}">
                        <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                            <img src="./src/assets/findAdvisor/Feedback.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                                alt="" />
                            <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                                Need feedback in ideation stage ?
                            </h4>
                        </div>
                    </a>
                    <a href="{{ route('category.detail', ['categoryName' => 'Digital Marketing']) }}">
                        <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                            <img src="./src/assets/findAdvisor/Digital Marketing.png"
                                class="h-[110px] sm:h-[170px] md:h-[260px]" alt="" />
                            <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                                Looking for digital marketing advice ?
                            </h4>
                        </div>
                    </a>
                    <a href="{{ route('category.detail', ['categoryName' => 'Business Legal']) }}">
                        <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                            <img src="./src/assets/findAdvisor/Legal.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                                alt="" />
                            <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                                Are you stuck with legal complexities ?
                            </h4>
                        </div>
                    </a>
                    <a href="{{ route('category.detail', ['categoryName' => 'Business Investments']) }}">
                        <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                            <img src="./src/assets/findAdvisor/Fund Raise.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                                alt="" />
                            <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                                Looking help to raise funds ?
                            </h4>
                        </div>
                    </a>
                </div>

                <div class="w-full flex h-fit justify-center mt-[2rem]">
                    <a href="{{ route('contact-us') }}"
                        class="w-[20rem] bg-gradient-to-r from-[#6AA300] to-[#3F5713] px-6 py-2 lg:px-4 lg:py-4 rounded-[12px] lg:rounded-[12px] font-semibold text-xs sm:text-sm md:text-base lg:text-xl text-[#FFFFFF] border border-[#6A9023] shadow-lg">
                        Let's help you search
                    </a>
                    <!-- <button
                                                                                                                                                                  class="w-[80%] mx-auto md:mx-0 md:w-fit font-medium text-xs sm:text-base md:text-xl text-[#3A3A3A] border border-[#6A9023] px-[4rem] py-2 bg-[#FAFCF6] rounded-3xl"
                                                                                                                                                                >
                                                                                                                                                                  Let us help you
                                                                                                                                                                </button> -->
                </div>
            </div>

            <div class="bg-[#] md:bg-[#FFFFFF] my-[1rem] py-[3rem] shadow-md">
                <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] pb-[3.5rem] mx-auto">
                    <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                        How does it <span class="text-[#FF3131]">Wo</span><span class="text-[#6A9023]">rk ?</span>
                    </h1>
                    <p
                        class="font-normal text-start md:text-center xt-sm sm:text-base md:text-lg text-[#6A9023] mb-[2rem]">
                        Discover and connect with experts who can help you overcome
                        challenges of operating a business in the digital era. Here’s how
                        you can do that
                    </p>

                    <div class="grid border bord- gap-4 md:grid-cols-2 border-spacing-6 bg-[#FEF1F1] rounded-3xl p-4">
                        <div class="flex items-center w-full gap-3">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/Register.png" class="w-full h-full rounded-xl"
                                    alt="" />
                                <h4
                                    class="absolute z-20 -top-2 -right-2 w-[30px] h-[30px] lg:w-[45px] lg:h-[45px] rounded-[2rem] bg-[#FFFFFF] border border-[#00000033] flex items-center justify-center shadow-sm">
                                    1
                                </h4>
                            </div>

                            <div class="px-2">
                                <h1
                                    class="text-start font-semibold text-[#2A2A2A] text-base sm:text-lg md:text-xl lg:text-2xl py-2">
                                    Register
                                </h1>
                                <p class="text-start font-normal text-[#3A3A3A] text-xs sm:text-sm md:text-base">
                                    Create an account & business profile for hassle free
                                    brwosing.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center w-full gap-3">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/DigitalWallet.png" class="w-full h-full rounded-xl"
                                    alt="" />
                                <h4
                                    class="absolute z-20 -top-2 -right-2 w-[30px] h-[30px] lg:w-[45px] lg:h-[45px] rounded-[2rem] bg-[#FFFFFF] border border-[#00000033] flex items-center justify-center shadow-sm">
                                    2
                                </h4>
                            </div>

                            <div class="">
                                <h1
                                    class="text-start font-semibold text-[#2A2A2A] text-base sm:text-lg md:text-xl lg:text-2xl py-2">
                                    Recharge Wallet
                                </h1>
                                <p class="text-start font-normal text-[#3A3A3A] text-xs sm:text-sm md:text-base">
                                    To connect with advisor, recharge your advisator wallet with
                                    minimum amount of INR 500.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center w-full gap-3">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/Choose.png" class="w-full h-full rounded-xl"
                                    alt="" />
                                <h4
                                    class="absolute z-20 -top-2 -right-2 w-[30px] h-[30px] lg:w-[45px] lg:h-[45px] rounded-[2rem] bg-[#FFFFFF] border border-[#00000033] flex items-center justify-center shadow-sm">
                                    3
                                </h4>
                            </div>

                            <div class="">
                                <h1
                                    class="text-start font-semibold text-[#2A2A2A] text-base sm:text-lg md:text-xl lg:text-2xl py-2">
                                    Choose Advisor
                                </h1>
                                <p class="text-start font-normal text-[#3A3A3A] text-xs sm:text-sm md:text-base">
                                    1) Use the filters on “Consult Advisor” page to narrow down
                                    your choice of advisor that best fits your circumstances. <br />
                                    2) You can also reach out to Advisator team to help you
                                    find the right advisor
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center w-full gap-3">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/Speak with advisor.png" class="w-full h-full rounded-xl"
                                    alt="" />
                                <h4
                                    class="absolute z-20 -top-2 -right-2 w-[30px] h-[30px] lg:w-[45px] lg:h-[45px] rounded-[2rem] bg-[#FFFFFF] border border-[#00000033] flex items-center justify-center shadow-sm">
                                    4
                                </h4>
                            </div>

                            <div class="">
                                <h1
                                    class="text-start font-semibold text-[#2A2A2A] text-base sm:text-lg md:text-xl lg:text-2xl py-2">
                                    Connect with experts
                                </h1>
                                <p class="text-start font-normal text-[#3A3A3A] text-xs sm:text-sm md:text-base">
                                    Connect with experts either by calling advisor or booking an
                                    appointment as per their availability.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div
                    class="w-[90%] font-sans md:w-[95%] lg:w-[85%] mx-auto grid grid-cols-2 gap-y-4 gap-x-2 md:grid-cols-2 lg:flex lg:flex-row justify-around items-center lg:gap-[4rem]">

                    <!-- Discovery Call Button -->
                    <a href="{{ route('consult-advisor') }}" class="flex justify-center">
                        <div
                            class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                            <img class="w-4 h-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                                src="./src/assets/img/Discoverycall.png" alt="" />
                            <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                                Discovery call
                            </p>
                        </div>
                    </a>

                    <!-- Consultation Call Button -->
                    <a href="{{ route('consult-advisor') }}" class="flex justify-center">
                        <div
                            class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                            <img class="w-4 h-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                                src="./src/assets/img/Consultationcall.png" alt="" />
                            <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                                Consultation call
                            </p>
                        </div>
                    </a>

                    <!-- Book Appointment Button (centered on the next row in mobile view) -->
                    <a href="{{ route('consult-advisor') }}" class="flex justify-center col-span-2">
                        <div
                            class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                            <img class="w-4 h-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                                src="./src/assets/img/BookAppointment.png" alt="" />
                            <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                                Book Appointment
                            </p>
                        </div>
                    </a>
                </div> --}}
                <div
                    class="w-[90%] font-sans md:w-[95%] lg:w-[85%] mx-auto grid grid-cols-2 gap-y-4 gap-x-2 md:grid-cols-2 lg:flex lg:flex-row justify-around items-center lg:gap-[4rem]">

                    <!-- Discovery Call Button (hidden on mobile) -->
                    <a href="{{ route('consult-advisor') }}" class="flex justify-center hidden md:flex">
                        <div
                            class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                            <img class="w-4 h-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                                src="./src/assets/img/Discoverycall.png" alt="" />
                            <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                                Discovery call
                            </p>
                        </div>
                    </a>

                    <!-- Consultation Call Button (hidden on mobile) -->
                    <a href="{{ route('consult-advisor') }}" class="flex justify-center hidden md:flex">
                        <div
                            class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                            <img class="w-4 h-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                                src="./src/assets/img/Consultationcall.png" alt="" />
                            <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                                Consultation call
                            </p>
                        </div>
                    </a>

                    <!-- Book Appointment Button (hidden on mobile) -->
                    <a href="{{ route('consult-advisor') }}" class="flex justify-center hidden md:flex">
                        <div
                            class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                            <img class="w-4 h-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                                src="./src/assets/img/BookAppointment.png" alt="" />
                            <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                                Book Appointment
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Single Button for Mobile View -->
                <div class="flex justify-center md:hidden">
                    <a href="{{ route('register') }}"
                        class="w-[20rem] bg-gradient-to-r from-[#6AA300] to-[#3F5713] px-6 py-2 lg:px-4 lg:py-4 rounded-[12px] lg:rounded-[12px] font-semibold text-xs sm:text-sm md:text-base lg:text-xl text-[#FFFFFF] border border-[#6A9023] shadow-lg">
                        Get Started
                    </a>
                </div>




                <!-- meet the team  -->
                <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto mt-[5rem] md:mt-[6rem] lg:mt-[8rem]">
                    <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                        Meet our Top Notch <span class="text-[#FF3131]">Advi</span><span
                            class="text-[#6A9023]">sors</span>
                    </h1>
                    <p
                        class="font-normal text-start md:text-center text-sm sm:text-base md:text-lg text-[#6A9023] mb-[2rem]">
                        Connect with our carefully selected advisors who can assist in
                        strategizing and digitalizing of your business.
                    </p>
                    <!-- Swiper for Categories -->
                    <div class="mb-5 swiper mySwiper1">
                        <div class="swiper-wrapper font-medium text-[#ffffff] text-sm sm:text-base md:text-lg">
                            @foreach ($categories as $category)
                                <div class="swiper-slide bg-[#6A9023] rounded-lg">
                                    <p onclick="filterByCategory('{{ $category->name }}')"
                                        class="tabButton font-bold p-2 rounded-lg cursor-pointer {{ request('category') == $category->name ? 'bg-[#FF3131] text-[#FFFFFF]' : '' }}">
                                        {{ $category->name }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Swiper for Advisors -->
                    <div id="advisors-container">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem] mt-5" >
                        <div class="swiper-wrapper ">
                            @foreach ($advisors as $advisor)
                                <div class="swiper-slide">
                                    <a href="{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}">
                                        <div
                                            class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[240px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                            <div style="background-image: url('./src/assets/meetTeam2.png');"
                                                class="flex items-center justify-center w-full">
                                                <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                                    src="{{ $advisor->profile_photo_path ? asset('storage/' . $advisor->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                                    alt="{{ $advisor->full_name }}" />
                                            </div>
                                            <div class="flex flex-col justify-between w-full p-1 sm:p-2 grow">
                                                <div class="flex items-center justify-between text-xs">
                                                    <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                        @if (Auth::check())
                                                            {{ $advisor->full_name }}
                                                        @else
                                                            {{ $advisor->user_id }}
                                                        @endif
                                                    </h2>
                                                    <div class="flex items-center gap-2">
                                                        <svg class="w-5 h-5 lg:w-6 lg:h-6"
                                                            xmlns="http://www.w3.org/2000/svg" fill="#FFE500"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                        </svg>
                                                        <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                            {{ $advisor->rating }}</p>
                                                    </div>
                                                </div>
                                                <p
                                                    class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                                    <span class="text-[#6A9023]">Industry:</span>
                                                    @foreach ($advisor->getIndustries() as $industry)
                                                        {{ $industry->name }}@if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <div
                                                    class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                                    <p>UID: {{ $advisor->user_id }}</p>
                                                    <p>{{ $advisor->is_super_advisor == 'true' ? 'Super Advisor' : 'Advisor' }}
                                                    </p>
                                                </div>
                                                <a href="{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}"
                                                    class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="swiper-pagination"></div> --}}
                    </div>
                </div>


                </div>
                <!-- Discover experts from various Industry Verticals ! -->
                <div class="bg-[#FEF1F1] md:bg-[#FFFFFF] mt-[2rem] py-[2rem]">
                    <div class=" w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto ">
                        <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                            Discover experts from various Industry
                            <span class="text-[#FF3131]">Verti</span><span class="text-[#6A9023]">cals !</span>
                        </h1>
                        <p
                            class="font-normal text-start md:text-center text-sm sm:text-base md:text-lg text-[#6A9023] mb-[2rem]">
                            Find experts who have experience working in below industry verticals
                        </p>
                        <div class="mt-[2rem]">
                            <div class="swiper swiper-verticals-geography h-[10rem] sm:h-[13rem] lg:h-[21rem]">
                                {{-- <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Agriculture.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Agriculture
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Automotive.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Automotive
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Banking.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Banking
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Telecommunications.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Telecommunications
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Agriculture.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Agriculture
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Automotive.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Automotive
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Banking.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Banking
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                        <img class="w-full h-full" src="./src/assets/img/Telecommunications.png"
                                            alt="" />
                                        <h3
                                            class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                            Telecommunications
                                        </h3>
                                    </div>
                                </div>
                            </div> --}}
                                <div class="swiper-wrapper">
                                    @foreach ($industries->take(23) as $industry)
                                        <a href="{{ route('industry.detail', ['industryName' => $industry->name]) }}"
                                            class="swiper-slide">
                                            <div
                                                class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                                <img class="w-full h-full industry-image"
                                                    data-industry-name="{{ $industry->name }}" alt="" />
                                                <h3
                                                    class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                                    {{ $industry->name }}
                                                </h3>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Looking to expand business in different Geography ? -->
                <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto mt-[3rem]">
                    <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                        Looking to expand business in different
                        <span class="text-[#FF3131]">Geog</span><span class="text-[#6A9023]">raphy </span>?
                    </h1>
                    <p
                        class="font-normal text-start md:text-center text-sm sm:text-base md:text-lg text-[#6A9023] mb-[2rem]">
                        Find experts who have experience working in below geographies
                    </p>
                    <div class="mt-[2rem]">
                        <div class="swiper swiper-verticals-geography h-[10rem] sm:h-[13rem] lg:h-[21rem]">
                            <div class="swiper-wrapper">
                                @foreach ($geographyLocations as $location)
                                    <a href="{{ route('location.detail', ['locationName' => $location->name]) }}"
                                        class="swiper-slide">
                                        <div
                                            class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                            <!-- Placeholder image, the real image will be set via JS -->
                                            <img class="w-full h-full geography-image"
                                                data-country-name="{{ $location->name }}" src=""
                                                alt="{{ $location->name }}" />
                                            <h3
                                                class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                                {{ $location->name }}
                                            </h3>
                                        </div>
                                    </a>
                                @endforeach
                                {{-- <div class="swiper-slide">
                                <div
                                    class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                    <img class="w-full h-full" src="./src/assets/img/Australia.png" alt="" />
                                    <h3
                                        class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                        Australia
                                    </h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                    <img class="w-full h-full" src="./src/assets/img/Singapore.png" alt="" />
                                    <h3
                                        class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                        Singapore
                                    </h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                    <img class="w-full h-full" src="./src/assets/img/China.png" alt="" />
                                    <h3
                                        class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                        China
                                    </h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                    <img class="w-full h-full" src="./src/assets/img/india.png" alt="" />
                                    <h3
                                        class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                        India
                                    </h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                    <img class="w-full h-full" src="./src/assets/img/Australia.png" alt="" />
                                    <h3
                                        class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                        Australia
                                    </h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                    <img class="w-full h-full" src="./src/assets/img/Singapore.png" alt="" />
                                    <h3
                                        class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                        Singapore
                                    </h3>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="h-[120px] w-[120px] sm:w-[150px] sm:h-[150px] lg:w-[250px] lg:h-[250px] rounded-xl overflow-hidden relative">
                                    <img class="w-full h-full" src="./src/assets/img/China.png" alt="" />
                                    <h3
                                        class="absolute bottom-0 w-full bg-[#00000099] text-xs sm:text-sm md:text-base lg:text-lg text-[#FFFFFF] font-medium py-2">
                                        China
                                    </h3>
                                </div>
                            </div> --}}
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div></div>
                </div>

                <!-- faq -->
                <!-- Looking to expand business in different Geography ? -->
                <div class="bg-[#FEF1F1] md:bg-[#FFFFFF] mt-[2rem] py-[2rem] pb-[4rem]">
                    <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto">
                        <h1 class="text-[22px] lg:text-[38px] mb-[1rem] md:my-[2rem]">
                            <span class="text-[#FF3131]">FA</span><span class="text-[#6A9023]">Qs </span>
                        </h1>

                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex flex-col gap-4 w-full md:w-[50%]">

                                <div class="flex flex-row items-center justify-center gap-2">
                                    <p class="text-center text-[18px] lg:text-2xl text-[#6A9023]">Are you a <span
                                            class="text-[#FF3131]">User</span><span class="text-[#6A9023]">?</span></p>
                                    <img src="{{ asset('src/assets/user.png') }}" alt="Advisor"
                                        class="object-contain w-12 h-12 sm:w-16 sm:h-16">
                                </div>

                                <hr>

                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question1" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-sm sm:text-base lg:text-lg text-start font-semibold text-[#3A3A3A]">Q:
                                            How can Advisator help users ?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer1" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            Following careful evaluation, a team of business and digital advisors, each an
                                            expert in their field, has been selected for listing on Advisator. These
                                            advisors
                                            offer reliable and affordable consulting sessions. Anyone seeking solutions to
                                            business or digital challenges can easily connect with advisors through the
                                            discovery call or consultation call features available on the
                                            Advisator platform.
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question2" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                            How do I Signup?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer2" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            To sign up follow steps below:
                                            <br> 1. Click on signup or this link : <a href="{{ route('register') }}"><span
                                                    class="text-[#6A9023]">Register</span></a>
                                            <br>
                                            2. Mention name, email and contact number
                                            <br>
                                            3. Finally enter otp
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question3" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                            How can user interact with an Advisor?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer3" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            To access advisors, users should first sign up on the platform. Next, they can
                                            find
                                            their preferred advisor by using the filters in the "Consult Advisor" section.
                                            In
                                            the third step, users need to recharge their wallet with the appropriate amount.
                                            They can then connect with advisors through the discovery call or consultation
                                            call
                                            feature. If the advisor is not available online, users can schedule a
                                            consultation
                                            for a future time when the advisor is available. Finally, leaving feedback after
                                            the
                                            session helps other users in selecting an advisor.
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question4" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                            Can I withdraw the amount once it’s added to the wallet ?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer4" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            Once an amount is added to the wallet, the amount can only be used in discovery
                                            calls or consulting calls. The amount cannot be withdrawn by the user.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="items-center justify-center hidden md:flex">
                                <img class="w-[200px] lg:w-[230px]" src="./src/assets/img/Faq.png" alt="" />
                            </div>

                            <div class="flex flex-col gap-4 w-full md:w-[50%]">
                                <div class="flex flex-row items-center justify-center gap-2">
                                    <p class="text-center text-[18px] lg:text-2xl text-[#6A9023]">Are you an <span
                                            class="text-[#FF3131]">Advisor</span><span class="text-[#6A9023]">?</span></p>
                                    <img src="{{ asset('src/assets/advisor.png') }}" alt="Advisor"
                                        class="object-contain w-12 h-12 sm:w-16 sm:h-16">
                                </div>

                                <hr>

                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question5" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                            How can I become an advisor on Advisator?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer5" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            To become an advisor, sign up for an account through this link and submit a
                                            nomination form. Our team will review your profile based on specific criteria
                                            and
                                            notify you via email regarding the outcome of your application.
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question6" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                            Can I be a user to access advisors while being an advisor myself or vice versa
                                            ?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer6" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            Yes, you can be an advisor and at the same time sign up as an user to access
                                            consulting sessions of other advisors.
                                            A toggle button is provided to switch between the advisor and
                                            the user dashboard.
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question7" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                            What if I am not happy with user feedback ?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer7" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            In case you find that the user has not provided the right feedback or there is
                                            any
                                            dispute with the user,  you can contact customer care for further action.
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                    <button type="button" id="question8" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                        <span
                                            class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                            How will I be paid as an advisor on the platform?</span>
                                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="answer8" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                            Post the session your wallet will be credited with the advisory fees post
                                            deducting
                                            platform fees. Once you click on the withdraw button from the dashboard, within
                                            a
                                            week's time you would get the amount to your bank account.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- reader zone -->
                <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto mt-[3rem] lg:mt-[5rem] mb-[5rem] md:mb-0">
                    <h1 class="text-[20px] lg:text-[38px] mb-[1rem] md:my-[2rem]">
                        <span class="text-[#FF3131]">Rea</span><span class="text-[#6A9023]">ders</span> Zone
                    </h1>

                    <div class="mt-[2rem]">
                        <div class="swiper swiper-meet-team h-[25rem] sm:h-[30rem] md:h-[32rem] lg:h-[38rem]">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div
                                        class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                        <div>
                                            <img class="h-full sh-[340px] w-full sw-full"
                                                src="{{ asset('blogs/ProductManagement.webp') }}" alt="" />
                                        </div>

                                        <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                            <h4
                                                class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                                5 Phases That Drive Continuous Innovation in a Product
                                            </h4>
                                            <p
                                                class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                                Learn about the five phases that help businesses to drive continuous product
                                                innovation and stay
                                                ahead in the market.
                                            </p>
                                            <a href="{{ url('blog/5-phases-that-drive-continuous-innovation-in-a-product') }}"
                                                class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                                Click to read
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div
                                        class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                        <div>
                                            <img class="h-full sh-[340px] w-full sw-full"
                                                src="{{ asset('blogs/SuccessfulAdoptionofAI.webp') }}" alt="" />
                                        </div>

                                        <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                            <h4
                                                class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                                Successful Adoption of AI
                                            </h4>
                                            <p
                                                class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                                Discover how businesses can leverage AI for increased productivity and
                                                competitive advantage in
                                                the modern world.
                                            </p>
                                            <a href="{{ url('blog/successful-adoption-of-ai') }}"
                                                class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                                Click to read
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div
                                        class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                        <div>
                                            <img class="h-full sh-[340px] w-full sw-full"
                                                src="{{ asset('blogs/aianalyticsassessment.webp') }}" alt="" />
                                        </div>

                                        <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                            <h4
                                                class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                                AI & Analytics Assessment
                                            </h4>
                                            <p
                                                class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                                Explore how understanding AI and analytics assessments can optimize business
                                                functions and
                                                customer behaviors.
                                            </p>
                                            <a href="{{ url('blog/ai-analytics-assessment') }}"
                                                class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                                Click to read
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div
                                        class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                        <div>
                                            <img class="h-full sh-[340px] w-full sw-full"
                                                src="{{ asset('blogs/AI&Analytics.webp') }}" alt="" />
                                        </div>

                                        <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                            <h4
                                                class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                                AI & Analytics Roadmap and Strategy
                                            </h4>
                                            <p
                                                class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                                The readiness assessment report for AI & Analytics aims to pinpoint any gaps
                                                in
                                                the adoption of
                                                AI across various business domains.
                                            </p>
                                            <a href="{{ url('blog/ai-analytics-roadmap-and-strategy') }}"
                                                class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                                Click to read
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div
                                        class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                        <div>
                                            <img class="h-full sh-[340px] w-full sw-full"
                                                src="{{ asset('blogs/roleofdigitalmarketing.webp') }}" alt="" />
                                        </div>

                                        <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                            <h4
                                                class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                                Role of Digital Marketing
                                            </h4>
                                            <p
                                                class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                                Learn why digital marketing is essential for the success of modern
                                                businesses
                                                and how it engages
                                                today's consumers.
                                            </p>
                                            <a href="{{ url('blog/role-of-digital-marketing') }}"
                                                class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                                Click to read
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div
                                        class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                        <div>
                                            <img class="h-full sh-[340px] w-full sw-full"
                                                src="{{ asset('blogs/MLmodels.webp') }}" alt="" />
                                        </div>

                                        <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                            <h4
                                                class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                                Key Challenges in Building and Deploying ML Models
                                            </h4>
                                            <p
                                                class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                                Uncover the challenges organizations face when building and deploying
                                                Machine
                                                Learning models to
                                                solve real-world problems.
                                            </p>
                                            <a href="{{ url('blog/key-challenges-in-building-and-deploying-ml-models') }}"
                                                class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                                Click to read
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div></div>
                </div>




            </div>
            @include('web.components.footer')
            <div class="fixed z-10 flex flex-col items-center hidden bottom-12 right-4 lg:block">
                <!-- WhatsApp floating button -->
                <a href="https://wa.me/+919810440780" target="_blank" rel="noopener noreferrer" class="mb-4">
                    <button
                        class="flex items-center justify-center p-3 text-white bg-green-500 rounded-full shadow-lg hover:bg-green-600">
                        <img src="./src/assets/whatsappicon.png" class="w-6 h-6">
                    </button>
                </a>

                <button
                    class="flex items-center justify-center bg-[#ff3033] hover:bg-blue-600 text-white rounded-full shadow-lg p-3"
                    id="scrollToTopBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </button>
            </div>
            <!-- side bar -->
            @include('web.components.sidebar')


            <!-- bottom menu bar -->
            @include('web.components.bottommenu')

        </div>
        @include('web.components.scripts')


        <script>
            function filterByCategory(category) {
                const url = "{{ url()->current() }}?category=" + category;
        
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        category: category
                    },
                    success: function(response) {
                        // Update the content dynamically
                        $("#advisors-container").html(response);
        
                        // Reinitialize Swiper after updating the content
                        initializeSwiper();
        
                        // Update active category button style
                        updateActiveCategory(category);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }
        
            // Function to update the active category button style
            function updateActiveCategory(category) {
                $(".tabButton").removeClass("bg-[#FF3131] text-[#FFFFFF]");
                $(`.tabButton:contains(${category})`).addClass("bg-[#FF3131] text-[#FFFFFF]");
            }
        
            // Function to initialize Swiper
            function initializeSwiper() {
                new Swiper(".swiper-meet-team", {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                    },
                });
            }
        
            // Initialize Swiper on page load
            $(document).ready(function() {
                initializeSwiper();
            });
        </script>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




        <script>
            // Load data from PHP
            const businessFunctions = @json($businessFunctions);
            const industries = @json($industries); // Assuming industries are passed to the view as well
            const geographyLocations = @json($geographyLocations); // Assuming locations are also passed

            function handleSearch() {
                const searchInput = document.getElementById('search-bar').value.trim().toLowerCase();

                // Define hidden inputs
                const hiddenBusinessFunctionInput = document.getElementById('business_function_id');
                const hiddenSubFunctionInput = document.getElementById('sub_function_id');
                const hiddenIndustryInput = document.getElementById('industry_id');
                const hiddenLocationInput = document.getElementById('location_id');

                // Check for matches
                const matchedBusinessFunction = businessFunctions.find(item => item.name.toLowerCase().includes(searchInput));
                const matchedIndustry = industries.find(item => item.name.toLowerCase().includes(searchInput));
                const matchedLocation = geographyLocations.find(item => item.name.toLowerCase().includes(searchInput));

                // Set values based on matches
                hiddenBusinessFunctionInput.value = matchedBusinessFunction ? matchedBusinessFunction.id : '';
                hiddenIndustryInput.value = matchedIndustry ? matchedIndustry.id : '';
                hiddenLocationInput.value = matchedLocation ? matchedLocation.id : '';

                // Optionally, handle sub-function similarly if you have relevant data

                return true; // Allow form submission to proceed
            }
        </script>
    @endsection
