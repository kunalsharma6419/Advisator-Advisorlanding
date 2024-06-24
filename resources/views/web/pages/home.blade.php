@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- header -->
        @include('web.components.header')

        <!-- sign up -->
        {{-- <div
            class="mt-[1rem] shadow-md rounded-[1rem] p-4 px-6 hidden md:flex font-sans h-full w-[90%] md:w-[95%] lg:w-[90%] mx-auto gap-x-5 justify-between items-center">
            <div>
                <p class="font-normal text-sm lg:text-base text-[#3A3A3A]">
                    Unlock your business potential with personalized consultation.
                </p>
                <a href="./auth/signup.html">
                    <p class="text-sm lg:text-base text-[#6A9023] font-bold">
                        Sign Up Now!
                    </p>
                </a>
            </div>
            <div class="border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md">
                <input
                    class="font-medium text-sm lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                    type="email" placeholder="Email" />
            </div>
            <div
                class="border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex gap-x-2 font-sans font-normal text-sm lg:text-base text-[#2A2A2A]">
                <div class="flex items-center gap-2">
                    <!-- +91(IN) -->
                    <!-- <div class="flex gap-[12px]"> -->

                    <label for="underline_select" class="sr-only">+91</label>

                    <select id="underline_select" class="outline-none">
                        <option selected>+91</option>
                        <option value="+92">+92</option>
                        <option value="+92">+93</option>
                        <option value="+94">+94</option>
                    </select>
                    <!-- </div> -->
                    <!-- <svg class="w-5 h-5 text-[#3A3A3A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg> -->
                </div>
                <div class="text-[#D6D6D6]">|</div>
                <div>
                    <input
                        class="font-medium text-sm lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                        type="text" placeholder="Mobile number" />
                </div>
            </div>
            <div class="py-2 px-[3rem] lg:px-[6rem] rounded-[2rem] bg-gradient-to-r from-[#D1E8A7] to-[#6A9023] shadow-md">
                <a href="../auth/signup.html"
                    class="font-sans text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A] cursor-pointer">Sign
                    Up</a>
            </div>
        </div> --}}
        @include('web.components.signupcomp')

        <!-- content rest form  -->
        <div class="bg-[#FAFCF6] mt-4 lg:mt-0 h-full font-sans font-bold text-center">
            <div
                class="mt-[1rem] md:mt-[2rem] lg:mt-[3rem] w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto flex flex-col md:flex-row gap-2 lg:gap-[2rem]">
                <!-- here will our video part -->
                <div class="md:w-[50%] md:h-[280px] lg:h-[390px] h-[390px]s">
                    <img src="./src/assets/img/videoImage.png" class="rounded-xl md:h-full lg:w-full" alt="" />
                </div>

                <!-- rest -->
                <div class="mt-[1rem] md:mt-0 flex flex-col justify-around items-center md:w-[50%] gap-y-[1rem]">
                    <div class="w-[90%] md:w-[95%] lg:w-[90%] borders border-black mx-auto text-[20px] lg:text-[38px]">
                        <h2 class="content-change text-[#FF3131] items-center text-start leading-7 md:leading-10">
                            Engage with handpicked experts to <span class="text-[#6A9023] lowercase"></span>
                        </h2>
                    </div>
                    <div class="w-[90%] md:w-[95%] lg:w-[90%] mx-auto my-[1rem] md:my-0">
                        <div
                            class="max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-sans font-normal text-sm lg:text-base text-[#2A2A2A]">
                            <div class='w-full'>
                                <input
                                    class="font-medium text-sm w-[95%] lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                                    type="text" placeholder="Search an Advisor" />
                            </div>

                            <div
                                class="p-2 md:py-2 md:px-[2rem] cursor-pointer flex items-center gap-x-2 rounded-[2rem] bg-gradient-to-r from-[#D1E8A7] to-[#6A9023] shadow-md">
                                <svg class="w-4 h-4 text-[#000000]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>

                                <button
                                    class="hidden md:block font-sans text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A]">
                                    Find Advisor
                                </button>
                            </div>
                        </div>
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
                            class="border md:border-4 border-[#FF3131]  rounded-[18px] w-full px-2 py-1 sm:py-1 lg:px-3 lg:py-2 flex flex-col items-center gap-1 shadow-sm">
                            <h1 class="font-bold md:whitespace-nowrap text-base sm:text-lg lg:text-xl text-[#3A3A3A]">
                                Industries
                            </h1>
                            <h2 class="font-bold text-[#6A9023] text-lg sm:text-xl lg:text-2xl">
                                <span class="count" id="industeries">0</span>+
                            </h2>
                        </div>
                        <div
                            class="border md:border-4 border-[#FF3131] rounded-[18px] w-full px-2 py-1 sm:py-1 lg:px-3 lg:py-2 flex flex-col items-center gap-1 shadow-sm">
                            <h1 class="font-bold md:whitespace-nowrap text-base sm:text-lg lg:text-xl text-[#3A3A3A]">
                                Clients
                            </h1>
                            <h2 class="font-bold text-[#6A9023] text-lg sm:text-xl lg:text-2xl">
                                <span class="count" id="client">0</span>+
                            </h2>
                        </div>
                    </div>

                </div>
            </div>

            <div class="w-[90%] md:w-[95%] lg:w-[80%] mx-auto mt-[2rem] md:mt-[2rem] md:h-[17rem] lg:h-[13rem]">
                <!-- Swiper -->
                <div class="swiper mySwiper1">
                    <p class="font-medium text-xl  lg:text-2xl text-[#2A2A2A] text-start px-2 w-[60%] sm:w-full">
                        What's on your mind ?
                    </p>
                    <div class="swiper-wrapper mt-[2rem] md:mt-[2.2rem]">

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

                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
            </div>


            <!-- Discover experts from various Industry Verticals ! -->
            <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto mt-[4rem]">
                <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                    Our Advisors are featured and have won awards <span class="text-[#FF3131]">orga</span><span
                        class="text-[#6A9023]">nised</span> by
                </h1>

                <div class="mt-[1rem]">
                    <div class="swiper swiper-bussiness h-[7rem] sm:h-[7rem] lg:h-[10rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]" src="./src/assets/business/business-standard-logo.svg"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]" src="./src/assets/business/times-of-india_logo.png"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]" src="./src/assets/business/WITHOUT-YEAR-04.webp"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-[6rem] lg:h-[10rem]" src="./src/assets/business/3AI-logo-color.webp"
                                    alt="">
                            </div>
                            <div class="swiper-slide flex items-center justify-center h-full w-full">
                                <img class="h-[2rem] lg:h-[4rem]" src="./src/assets/business/Forbes.png" alt="">
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
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713]  px-6 py-2 lg:px-4 lg:py-4 w-full rounded-[2rem] lg:rounded-[12px] font-semibold text-xs sm:text-sm md:text-base lg:text-xl border-[#6A9023] shadow-lg text-[#FFFFFF]">
                        Explore Advisors
                    </a>
                    <a href="{{ route('contact-us') }}"
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] px-6 py-2 lg:px-4 lg:py-4 w-full rounded-[2rem] lg:rounded-[12px] font-semibold text-xs sm:text-sm md:text-base lg:text-xl text-[#FFFFFF] border border-[#6A9023] shadow-lg flex items-center justify-center">
                        Let's help you <span class='hidden md:block pl-2'> search</span>
                    </a>
                </div>
            </div>

            <div class="w-[90%] font-Roboto md:w-[95%] lg:w-[90%] mx-auto mt-[7rem] md:mt-[8rem] pb-[2rem]">
                <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                    Let us help you find the right
                    <span class="text-[#FF3131]">Adv</span><span class="text-[#6A9023]">isor !</span>
                </h1>

                <div class="grid grid-cols-2 lg:grid-cols-3 justify-items-center gap-y-6">
                    <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                        <img src="./src/assets/findAdvisor/Automation.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                            alt="" />
                        <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                            Want to automate business with technology ?
                        </h4>

                    </div>
                    <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                        <img src="./src/assets/findAdvisor/Product Launch.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                            alt="" />
                        <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                            Looking for a strategy in launching products ?
                        </h4>
                    </div>
                    <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                        <img src="./src/assets/findAdvisor/Feedback.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                            alt="" />
                        <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                            Need feedback in ideation stage ?
                        </h4>
                    </div>
                    <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                        <img src="./src/assets/findAdvisor/Digital Marketing.png"
                            class="h-[110px] sm:h-[170px] md:h-[260px]" alt="" />
                        <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                            Looking for digital marketing advice ?
                        </h4>
                    </div>
                    <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                        <img src="./src/assets/findAdvisor/Legal.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                            alt="" />
                        <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                            Are you stuck with legal complexities ?
                        </h4>
                    </div>
                    <div class="w-[120px] sm:w-[200px] md:w-[290px] h-fit">
                        <img src="./src/assets/findAdvisor/Fund Raise.png" class="h-[110px] sm:h-[170px] md:h-[260px]"
                            alt="" />
                        <h4 class="text-[#2A2A2A] sm:text-base lg:text-xl font-medium text-start py-2 px-2">
                            Looking help to raise funds ?
                        </h4>
                    </div>
                </div>

                <div class="w-full flex h-fit justify-center mt-[2rem]">
                    <a href="{{ route('contact-us') }}"
                        class="w-[20rem] bg-gradient-to-r from-[#6AA300] to-[#3F5713] px-6 py-2 lg:px-4 lg:py-4 rounded-[2rem] lg:rounded-[12px] font-semibold text-xs sm:text-sm md:text-base lg:text-xl text-[#FFFFFF] border border-[#6A9023] shadow-lg">
                        Let's help you search
                    </a>
                    <!-- <button
                                  class="w-[80%] mx-auto md:mx-0 md:w-fit font-medium text-xs sm:text-base md:text-xl text-[#3A3A3A] border border-[#6A9023] px-[4rem] py-2 bg-[#FAFCF6] rounded-3xl"
                                >
                                  Let us help you
                                </button> -->
                </div>
            </div>

            <div class="bg-[#FEF1F1] md:bg-[#FFFFFF] my-[1rem] py-[3rem] shadow-md">
                <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] pb-[3.5rem] mx-auto">
                    <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                        How does it <span class="text-[#FF3131]">Wo</span><span class="text-[#6A9023]">rk</span>
                    </h1>
                    <p
                        class="font-normal text-start md:text-center xt-sm sm:text-base md:text-lg text-[#3A3A3A] mb-[2rem]">
                        Discover and connect with experts who can help you overcome
                        challenges of operating a business in the digital era. Here’s how
                        you can do that
                    </p>

                    <div class="grid border bord- gap-4 md:grid-cols-2 border-spacing-6 bg-[#FEF1F1] rounded-3xl p-4">
                        <div class="w-full flex gap-3 items-center">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/Register.png" class="h-full w-full rounded-xl"
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
                        <div class="w-full flex gap-3 items-center">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/DigitalWallet.png" class="h-full w-full rounded-xl"
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
                        <div class="w-full flex gap-3 items-center">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/Choose.png" class="h-full w-full rounded-xl"
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
                        <div class="w-full flex gap-3 items-center">
                            <div
                                class="relative w-[110px] h-[90px] shrink-0 sm:w-[130px] sm:h-[110px] lg:w-[190px] lg:h-[170px] rounded-xl shadow-sm">
                                <img src="./src/assets/howworks/Speak with advisor.png" class="h-full w-full rounded-xl"
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

                <div
                    class="w-[90%] font-sans md:w-[95%] lg:w-[85%] mx-auto grid grid-cols-2 justify-items-center gap-y-6 md:grid-cols-3 flexs items-center justify-around md:justify-center md:gap-2 lg:gap-[4rem]">
                    <div
                        class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                        <img class="h-4 w-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                            src="./src/assets/img/Discoverycall.png" alt="" />
                        <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                            Discovery call
                        </p>
                    </div>
                    <div
                        class="w-[10rem] sm:w-[15rem] md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                        <img class="h-4 w-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                            src="./src/assets/img/Consultationcall.png" alt="" />
                        <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                            Consultation call
                        </p>
                    </div>
                    <div
                        class="w-[10rem] sm:w-[15rem] col-span-2 md:col-span-1 md:w-auto py-3 px-4 md:px-10 md:py-5 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer">
                        <img class="h-4 w-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                            src="./src/assets/img/BookAppointment.png" alt="" />
                        <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                            Book Appointment
                        </p>
                    </div>
                    <!-- <div
                                class="py-2 px-4 md:px-10 flex items-center justify-center gap-1 md:gap-2 rounded-3xl bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] cursor-pointer"
                              >
                                <img
                                  class="h-4 w-4 sm:w-6 sm:h-6 md:h-8 md:w-8 lg:w-10 lg:h-10"
                                  src="./src/assets/img/chat.png"
                                  alt=""
                                />
                                <p class="text-[10px] sm:text-sm md:text-base text-[#000000]">
                                  Chat
                                </p>
                              </div> -->
                </div>
            </div>


            <!-- meet the team  -->
            <div class="w-[90%] font-sans md:w-[95%] lg:w-[90%] mx-auto mt-[5rem] md:mt-[6rem] lg:mt-[8rem]">
                <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                    Meet our Top Notch <span class="text-[#FF3131]">Advi</span><span class="text-[#6A9023]">sors</span>
                </h1>
                <p class="font-normal text-start md:text-center text-sm sm:text-base md:text-lg text-[#3A3A3A] mb-[2rem]">
                    Connect with our carefully selected advisors who can assist you in
                    strategizing and digitalizing of your business.
                </p>

                <!-- Swiper -->
                <div class="swiper mySwiper1 bg-[#F9FFEF]">
                    <div class="swiper-wrapper font-medium text-[#828282] text-sm sm:text-base md:text-lg">
                        <div class="swiper-slide">
                            <p id="btnaiAnalytics" onclick="openCity('aiAnalytics')"
                                class="tabButton bg-[#FF3131] text-[#FFFFFF] font-bold p-2 rounded-lg cursor-pointer ">
                                AI & Analytics
                            </p>
                        </div>
                        <div class="swiper-slide">
                            <p id="btnbusinessLegal" onclick="openCity('businessLegal')"
                                class="tabButton font-bold p-2 rounded-lg cursor-pointer">
                                Business Legal
                            </p>
                        </div>
                        <div class="swiper-slide">
                            <p id="btnBusinessGrowth" onclick="openCity('BusinessGrowth')"
                                class="tabButton font-bold p-2 rounded-lg cursor-pointer">
                                Business Growth
                            </p>
                        </div>
                        <div class="swiper-slide">
                            <p id="btnfundRaise" onclick="openCity('fundRaise')"
                                class="tabButton font-bold p-2 rounded-lg cursor-pointer">
                                Fund Raise
                            </p>
                        </div>
                        <div class="swiper-slide">
                            <p id = "btnIT&Cloud" onclick="openCity('IT&Cloud')"
                                class="tabButton font-bold p-2 rounded-lg cursor-pointer">
                                IT & Cloud
                            </p>
                        </div>
                        <div class="swiper-slide">
                            <p id="btnMarketResearch" onclick="openCity('MarketResearch')"
                                class="tabButton font-bold p-2 rounded-lg cursor-pointer">
                                Market Research
                            </p>
                        </div>
                        <div class="swiper-slide">
                            <p id="btnMarketing" onclick="openCity('Marketing')"
                                class="tabButton font-bold p-2 rounded-lg cursor-pointer">
                                Marketing
                            </p>
                        </div>
                        <div class="swiper-slide">
                            <p id="btnOtherFunctions" onclick="openCity('OtherFunctions')"
                                class="tabButton font-bold p-2 rounded-lg cursor-pointer">
                                Other Functions
                            </p>
                        </div>
                    </div>
                </div>

                <div id="aiAnalytics" class="meet-team mt-[2rem]" style="display: block">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('./src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('./src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('./src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('./src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('./src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('./src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div id="businessLegal" class="meet-team mt-[2rem]" style="display: none">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div id="BusinessGrowth" class="meet-team mt-[2rem]" style="display: none">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div id="fundRaise" class="meet-team mt-[2rem]" style="display: none">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div id="IT&Cloud" class="meet-team mt-[2rem]" style="display: none">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div id="MarketResearch" class="meet-team mt-[2rem]" style="display: none">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div id="Marketing" class="meet-team mt-[2rem]" style="display: none">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div id="OtherFunctions" class="meet-team mt-[2rem]" style="display: none">
                    <div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem]">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam1.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div style="
                        background-image: url('../src/assets/meetTeam2.png');
                      "
                                        class="w-full flex items-center justify-center">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-1.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Riddima Singh
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam1.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-2.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Andrew Anders
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[220px] sm:h-[300px] lg:h-[500px] rounded-xl">
                                    <div class="w-full flex items-center justify-center"
                                        style="
                        background-image: url('../src/assets/meetTeam3.png');
                      ">
                                        <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                            src="./src/assets/img/team-3.png" alt="" />
                                    </div>
                                    <div class="flex flex-col justify-between p-1 sm:p-2 grow w-full">
                                        <div class="flex items-center justify-between text-xs">
                                            <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                                Rajiv sharma
                                            </h2>
                                            <div class="flex gap-2 items-center">
                                                <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="#FFE500" viewBox="0 0 24 24" class="w-6 h-6">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>

                                                <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                                    4.9
                                                </p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                            Ai & Analytics
                                        </p>
                                        <div
                                            class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                            <p>Experience B</p>
                                            <p>Menters : 100+</p>
                                        </div>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Discovery call
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
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

                    <div class="mt-[2rem]">
                        <div class="swiper swiper-verticals-geography h-[10rem] sm:h-[13rem] lg:h-[21rem]">
                            <div class="swiper-wrapper">
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

                <div class="mt-[2rem]">
                    <div class="swiper swiper-verticals-geography h-[10rem] sm:h-[13rem] lg:h-[21rem]">
                        <div class="swiper-wrapper">
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
                            </div>
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
                    <h1 class="text-[20px] lg:text-[38px] mb-[1rem] md:my-[2rem]">
                        <span class="text-[#FF3131]">FA</span><span class="text-[#6A9023]">Qs </span>
                    </h1>

                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex flex-col gap-4 w-full md:w-[50%]">
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question1" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <span
                                        class="flex text-sm sm:text-base lg:text-lg text-start font-semibold text-[#3A3A3A]">Q:
                                        How do I sign up to be an advisor or client?</span>
                                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer1" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                    <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                        To become an advisor or client, visit the platform's website
                                        and follow the sign-up process, providing necessary
                                        information such as contact details and preferences.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question2" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <span
                                        class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                        What kind of mentorship relationships does the platform
                                        support?</span>
                                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer2" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                    <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                        The platform supports various mentorship relationships,
                                        including career guidance, skill development,
                                        entrepreneurship, and personal growth coaching.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question3" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <span
                                        class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                        How does communication between mentors and mentees
                                        happen?</span>
                                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer3" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                    <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">
                                        Communication between mentors and mentees typically occurs
                                        through messaging within the platform, video calls, phone
                                        calls, or in-person meetings, depending on the preferences
                                        and availability of both parties.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center justify-center">
                            <img class="w-[200px] lg:w-[230px]" src="./src/assets/img/Faq.png" alt="" />
                        </div>

                        <div class="flex flex-col gap-4 w-full md:w-[50%]">
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question4" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <span
                                        class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                        What kind of mentorship relationships does the platform
                                        support?</span>
                                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer4" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                    <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                        The platform supports various mentorship relationships,
                                        including career guidance, skill development,
                                        entrepreneurship, and personal growth coaching.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question5" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <span
                                        class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                        How does communication between mentors and mentees
                                        happen?</span>
                                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer5" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                    <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                        Communication between mentors and mentees typically occurs
                                        through messaging within the platform, video calls, phone
                                        calls, or in-person meetings, depending on the preferences
                                        and availability of both parties.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-3xl shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question6" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <span
                                        class="flex text-start text-sm sm:text-base lg:text-lg font-semibold text-[#3A3A3A]">Q:
                                        How do I sign up to be an advisor or client?</span>
                                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer6" style="display: none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                    <p class="text-start text-sm sm:text-base lg:text-lg font-semibold text-[#828282]">
                                        To become an advisor or client, visit the platform's website
                                        and follow the sign-up process, providing necessary
                                        information such as contact details and preferences.
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
                                        <img class="h-full sh-[340px] w-full sw-full" src="./src/assets/img/reader1.png"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between p-1 sm:p-2 px-3 grow w-full">
                                        <h4
                                            class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            The Power of Mentorship: How Mentors Can Transform Your
                                            Career
                                        </h4>
                                        <p
                                            class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Learn about the benefits of mentorship and how having
                                            the right mentor can propel your career forward.
                                        </p>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                    <div>
                                        <img class="h-full sh-[340px] w-full sw-full" src="./src/assets/img/reader2.png"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between p-1 sm:p-2 px-3 grow w-full">
                                        <h4
                                            class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            Building a Successful Startup: Lessons from Seasoned
                                            Entrepreneurs
                                        </h4>
                                        <p
                                            class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Discover insights from successful entrepreneurs to help
                                            you challenge of building and scaling your startup.
                                        </p>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                    <div>
                                        <img class="h-full sh-[340px] w-full sw-full" src="./src/assets/img/reader3.png"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between p-1 sm:p-2 px-3 grow w-full">
                                        <h4
                                            class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            Navigating Career Transitions: Tips for Smooth Career
                                            Changes
                                        </h4>
                                        <p
                                            class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Get practical advice on making successful career
                                            transitions and navigating changes in your professional
                                            journey.
                                        </p>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                    <div>
                                        <img class="h-full sh-[340px] w-full sw-full" src="./src/assets/img/reader1.png"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between p-1 sm:p-2 px-3 grow w-full">
                                        <h4
                                            class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            The Power of Mentorship: How Mentors Can Transform Your
                                            Career
                                        </h4>
                                        <p
                                            class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Learn about the benefits of mentorship and how having
                                            the right mentor can propel your career forward.
                                        </p>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                    <div>
                                        <img class="h-full sh-[340px] w-full sw-full" src="./src/assets/img/reader2.png"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between p-1 sm:p-2 px-3 grow w-full">
                                        <h4
                                            class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            Building a Successful Startup: Lessons from Seasoned
                                            Entrepreneurs
                                        </h4>
                                        <p
                                            class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Discover insights from successful entrepreneurs to help
                                            you challenge of building and scaling your startup.
                                        </p>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] h-[350px] sm:h-[420px] md:h-[460px] lg:h-[550px] rounded-xl">
                                    <div>
                                        <img class="h-full sh-[340px] w-full sw-full" src="./src/assets/img/reader3.png"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between p-1 sm:p-2 px-3 grow w-full">
                                        <h4
                                            class="text-[#2A2A2A] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            Navigating Career Transitions: Tips for Smooth Career
                                            Changes
                                        </h4>
                                        <p
                                            class="font-normal text-[#828282] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Get practical advice on making successful career
                                            transitions and navigating changes in your professional
                                            journey.
                                        </p>
                                        <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div></div>
            </div>

            <footer class="hidden md:block bg-[#FFFFFF] shadow-2xl border border-transparent mt-[2rem]">
                <div class="md:w-[95%] lg:w-[90%] mx-auto my-[2rem]">
                    <div class="w-full flex items-start gap-[2rem] lg:gap-[4rem] font-sans">
                        <div class="font-semibold text-xl lg:text-2xl flex flex-col gap-2 items-start">
                            <a href="./Home.html">
                                <img class="w-[200px]" src="./src/assets/logo/AdvisatorLogo.png" alt="" />
                            </a>
                            <!-- <h1 class="text-[#FF3131]">
                                      ADVIS<span class="text-[#6A9023]">ATOR</span>
                                    </h1> -->
                            <p class="text-sm lg:text-base text-[#3A3A3A] font-normal text-start">
                                Business & Digital Expert Advice
                            </p>
                            <div class="flex items-center gap-2">
                                <img class="w-3 h-4" src="./src/assets/img/call.png" alt="" />
                                <p class="text-sm text-[#3A3A3A] font-normal">
                                    +91 1234567890
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img class="w-3 h-4" src="./src/assets/img/location.png" alt="" />
                                <p class="text-sm text-[#3A3A3A] font-normal">Delhi, India</p>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">
                                Subscribe to Newsletter
                            </h4>
                            <div
                                class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-sans font-normal text-sm lg:text-base text-[#2A2A2A]">
                                <div>
                                    <input
                                        class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                                        type="email" placeholder="Email address" />
                                </div>

                                <div
                                    class="py-2 px-[2rem] flex items-center gap-x-2 rounded-[2rem] bg-[#EDF6DB] shadow-md">
                                    <button
                                        class="font-sans text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A]">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>

                        <ul
                            class="flex items-start flex-col gap-2 font-sans font-normal text-sm lg:text-base text-[#828282]">
                            <li class="text-[#3A3A3A]">Quick Links</li>
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <a href="">Browse Mentors</a>
                            </li>
                            <li>
                                <a href="">Featured Mentors</a>
                            </li>
                            <li>
                                <a href="">Blogs</a>
                            </li>
                        </ul>
                        <ul
                            class="flex flex-col items-start gap-2 font-sans font-normal text-sm lg:text-base text-[#828282]">
                            <li class="text-[#3A3A3A]">About</li>
                            <li>
                                <a href="">About us</a>
                            </li>
                            <li>
                                <a href="">Contact us</a>
                            </li>
                            <li>
                                <a href="">Terms of services</a>
                            </li>
                        </ul>
                        <ul
                            class="flex flex-col items-start gap-2 font-sans font-normal text-sm lg:text-base text-[#828282]">
                            <li class="text-[#3A3A3A]">Social Media</li>
                            <li>
                                <a href="">Instagram</a>
                            </li>
                            <li>
                                <a href="">Facebook</a>
                            </li>
                            <li>
                                <a href="">Twitter</a>
                            </li>
                            <li>
                                <a href="">Linkedin</a>
                            </li>
                        </ul>
                    </div>

                    <div class="border border-[#EAEAEA] my-4 w-full"></div>

                    <div class="w-full flex items-center justify-between">
                        <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                            © 2024 Advisator. All rights reserved.
                        </h3>
                        <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                            info@advisator.in
                        </h3>
                    </div>
                </div>
            </footer>

            <!-- Go to Top Button -->
            <button id="goToTopBtn"
                class="fixed bottom-4 right-4 bg-[#FFFFFF] w-12 h-12 flex items-center justify-center rounded-full shadow-xl text-[#3A3A3A] px-4 py-2 hidden">
                <img src="./src/assets/icons/arrow.png" class="w-5" alt="" />
            </button>
        </div>

        <!-- side bar -->
        <div
            class="z-20 sidebar absolute md:hidden flex justify-end top-0 transition-all left-full w-full min-h-screen h-full bottom-0">
            <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
                <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                            <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                src="./src/assets/img/profileImage.png" alt="" />
                            <div>
                                <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">
                                    Radhika Sharma
                                </h2>
                                <h3 class="text-xs sm:text-sm text-[#828282] font-medium">
                                    radhikasharma@abc.com
                                </h3>
                            </div>
                        </div>
                        <div>
                            <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="./src/assets/img/cross.png"
                                alt="" />
                        </div>
                    </div>

                    <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                        <div class="ml-[2rem] flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="./src/assets/img/phone.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                Become an Advisor
                            </h2>
                        </div>
                    </div>

                    <div class="px-[2rem] py-2 flex flex-col gap-6">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="./src/assets/img/Consult Advisor.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Consult Advisor
                            </h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="./src/assets/img/FeaturedAdvisor.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Featured Advisor
                            </h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="./src/assets/img/MyBookings.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                My Bookings
                            </h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="./src/assets/img/Wallet.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Wallet
                            </h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="./src/assets/img/Blogs.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Blogs
                            </h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="./src/assets/img/Aboutus.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                About us
                            </h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="./src/assets/img/Customersupport.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Customer support
                            </h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="./src/assets/img/Logout.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Logout
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="px-[2rem] py-2">
                    <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">
                        Find us on:
                    </h3>
                    <div class="flex gap-5">
                        <img class="w-[30px] h-[30px]" src="./src/assets/img/instagram.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="./src/assets/img/facebook.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="./src/assets/img/linkedin.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="./src/assets/img/youtube.png" alt="" />
                    </div>
                </div>
            </div>
        </div>


        <!-- bottom menu bar -->
        <div class="bg-[#FFFFFF] z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Home.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="./src/assets/bottomNavbar/activeHome.png"
                            alt="" />
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">
                        Home
                    </p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./Advisor pages/consultadvisor.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                            src="./src/assets/bottomNavbar/constultadvisor.png" alt="" />
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">
                        Consult Advisor
                    </p>
                </div>
                <div></div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./Client pages/advisorbooking.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="./src/assets/bottomNavbar/booking.png"
                            alt="" />
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">
                        Booking
                    </p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./Client pages/userProfile.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="./src/assets/bottomNavbar/profile.png"
                            alt="" />
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">
                        My Profile
                    </p>
                </div>
            </div>

            <div
                class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                <a href="./Client pages/featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="./src/assets/bottomNavbar/advisor.png"
                        alt="" />
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">
                        Featured Advisor
                    </p>
            </div>
        </div>

    </div>
    @include('web.components.scripts')
@endsection
