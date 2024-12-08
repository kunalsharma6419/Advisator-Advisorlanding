@extends('web.layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        /* font-size: 18px; */
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        /* border: 4px solid red; */
        height: fit-content;
        width: fit-content;
        /* width: 200px; */
        /* height: 100px; */
    }

    /* .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper-slide {
        width: 80%;
      }

      .swiper-slide:nth-child(2n) {
        width: 60%;
      }

      .swiper-slide:nth-child(3n) {
        width: 40%;
      } */
    .swiper-button-prev,
    .swiper-button-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        color: #333;
        font-size: 20px;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
        z-index: 10;
        padding: 20px;
        font-size: 5px;
    }

    .swiper-button-prev {
        left: 10px;
    }

    .swiper-button-next {
        right: 10px;
    }

    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }

    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background-color: #ccc;
        margin: 0 5px;
        border-radius: 50%;
        cursor: pointer;
    }

    .swiper-pagination-bullet-active {
        background-color: #333;
    }

    .owl-controls {
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        /* z-index: 10; */
    }

    .owl-controls .owl-nav {
        position: relative;
        display: flex;
        flex-direction: row;
        gap: 10px;
        margin: 0 5px;
        cursor: pointer;
    }

    .owl-controls .owl-nav div {
        width: 40px;
        height: 40px;
        background-color: #eeeeee;
        box-shadow: #0000001a;
        border-radius: 50%;
        line-height: 40px;
        text-align: center;
        color: #2a2a2a;
    }
</style>
@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">


        <!-- Header -->
        <div class="w-full h-[80px]">
            <div class="h-full w-[90%] md:w-[95%] lg:w-[90%] mx-auto flex justify-between items-center">
                <!-- logo -->
                <div>
                    <a href="{{ route('home') }}">
                        <img class="w-[180px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
                    </a>
                </div>
                <div class="hidden md:flex xl:w-[75%] xl:justify-between gap-8d md:gap-x-10 xl:gap-[60px]">
                    <ul
                        class="font-sans font-normal text-[#3A3A3A] grow xl:justify-center gap-4 text-sm lg:text-lg xl:gap-5 flex items-center">
                        <li
                            class="{{ Route::currentRouteName() == 'home' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'consult-advisor' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('consult-advisor') }}">Consult Advisor</a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'about-us' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('about-us') }}">About us</a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'blog' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'contact-us' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('contact-us') }}">Contact us</a>
                        </li>
                    </ul>

                    @if (Route::has('login'))
                        <ul class="flex items-center gap-2 font-sans text-sm lg:text-lg lg:gap-6">
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
                                        <a class="underline-none" href="{{ route('landing') }}">Become an Advisor</a>
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
                                <a class="flex items-center gap-2 underline-none" href="{{ route($dashboardRoute) }}">
                                    <!-- SVG Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#DB9206]" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9 8v-1c0-2.21 1.79-4 4-4h10c2.21 0 4 1.79 4 4v1H3zm18-11h-2v-2h-2v2h-2v2h2v2h2v-2h2z" />
                                    </svg>

                                    Dashboard
                                </a>
                            @else
                                @if (Route::has('register'))
                                    <a class="flex items-center gap-2 underline-none" href="{{ route('register') }}">
                                        <!-- SVG Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#DB9206]"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9 8v-1c0-2.21 1.79-4 4-4h10c2.21 0 4 1.79 4 4v1H3zm18-11h-2v-2h-2v2h-2v2h2v2h2v-2h2z" />
                                        </svg>

                                        Signup
                                    </a>
                                @endif
                                {{-- <a class="flex items-center gap-2 underline-none" href="{{ route('login') }}">
                            <!-- SVG Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#DB9206]" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9 8v-1c0-2.21 1.79-4 4-4h10c2.21 0 4 1.79 4 4v1H3zm18-11h-2v-2h-2v2h-2v2h2v2h2v-2h2z" />
                            </svg>

                            Login
                        </a> --}}
                            @endauth
                        @endif
                        <!-- <a
                                                                                                                                                                                                                                    class="flex items-center gap-2 cursor-pointer"
                                                                                                                                                                                                                                    href="../Advisor pages/wallet.html"
                                                                                                                                                                                                                                  >
                                                                                                                                                                                                                                    <img
                                                                                                                                                                                                                                      class="w-5 h-5"
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
                    {{-- <div class="border border-[#DB9206] bg-[#FFF3DB] rounded sm:rounded-lg px-2 py-1 sm:py-2 sm:px-4">
                <a class="flex items-center gap-2 cursor-pointer" href="../Advisor pages/wallet.html">
                    <img class="w-5 h-5" src="./src/assets/img/iconWallet.png" alt="" />
                    <div class="flex items-center font-sans text-sm sm:text-base text-[#DB9206] font-semibold">
                        &#8377;
                        <p>1,229</p>
                    </div>
                </a>
            </div> --}}
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

        <!-- Search box for both mobile and desktop -->
        <form id="customSearchForm">
            <div class="flex flex-row lg:flex-row p-2 mt-4 mx-auto items-center bg-white border border-[#EAEAEA] rounded-[50px] justify-between w-full max-w-[80%]">
                <input id="custom-search-bar" name="search" class="bg-white rounded-[50px] w-full px-4 lg:py-3 lg:mb-0 text-sm lg:text-base" placeholder="Search Advisor" type="text" autocomplete="off" />
                <button type="button" id="search-submit" class="flex items-center lg:w-auto bg-[#EDF6DB] p-2 lg:px-3 lg:py-3 rounded-full gap-4 justify-center text-center whitespace-nowrap">
                    <!-- Icon always visible -->
                    <svg class="w-5 h-5 text-[#000000]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <!-- Text only visible on large screens and above -->
                    <p class="text-black hidden lg:block">Find Advisor</p>
                </button>
            </div>
        </form>
        









        <div class="hidden lg:flex flex-col w-[90%] md:w-[95%] lg:w-[90%] mx-auto mt-[24px]">

            <!-- image swipper -->
            <div class="w-full mt-[30px]">
                @if (!empty($advisor->highlighted_images) && count($advisor->highlighted_images) > 0)
                    <div class="swiper mySwiper1">
                        <div class="swiper-wrapper">
                            @foreach ($advisor->highlighted_images as $image)
                                <div class="swiper-slide">
                                    <div>
                                        <!-- Lightbox gallery integration -->
                                        <a href="{{ Storage::url($image) }}" data-lightbox="highlighted-gallery">
                                            <img class="w-[239px] h-[180px] shadow shadow-[#00000026] object-cover"
                                                src="{{ Storage::url($image) }}" alt="Highlighted Image" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>





            <!-- content section -->
            <div class="w-full flex gap-[20px]">
                <!-- left -->
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-[40%] xl:w-[32%] flex flex-col">

                    <!-- Content here -->



                    <!-- profle -->
                    <div class="flex w-full shadow-xl rounded-[24px] shadow-[#00000026]  mt-[12px] flex-col">
                        <div class="bg-[#FFFACA] py-2 rounded-tl-[20px] rounded-tr-[20px] px-2 flex justify-between">
                            <p class="text-[12px] font-[500] text-[#B58300]">
                                {{ $advisor->is_super_advisor == 'true' ? 'Super Advisor' : 'Advisor' }}
                            </p>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-circle fa-xs"
                                    style="color: {{ $isAvailableToday ? '#6a9023' : '#e3342f' }}"></i>
                                <p class="text-[12px] font-[600]"
                                    style="color: {{ $isAvailableToday ? '#6a9023' : '#e3342f' }}">
                                    {{ $isAvailableToday ? 'Available' : 'Not Available' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col px-4 pb-4 w-full gap-[12px] items-center mt-2">
                            <img class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover border-2 border-gray-200"
                                src="{{ $advisor->profile_photo_path ? asset('storage/' . $advisor->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                alt="{{ $advisor->full_name }}" />
                            <div class="flex flex-col gap-[4px]">
                                <div class="flex items-center gap-1">


                                    {{-- <img class="w-[20px] h-[20px]" src="../src/assets/icons/Notify me.png"
                                        alt="" />

                                    <p class="lg:text-[16px] text-[10px] font-[500] text-[#C95555]">
                                        Notify me
                                    </p> --}}

                                    <button id="notifyButton" type="button"
                                        data-route="{{ route('notify.advisor', $advisor->user_id) }}"
                                        data-advisor-id="{{ $advisor->user_id }}"
                                        class="lg:text-[16px] text-[10px] font-[500] text-[#C95555] flex items-center gap-1">
                                        <img class="w-[20px] h-[20px]" src="../src/assets/icons/Notify me.png"
                                            alt="" />
                                        Notify me
                                    </button>



                                </div>
                            </div>
                        </div>
                        <div class="flex w-full justify-between mt-[12px] px-4 pb-4 gap-[4px]">

                            <div class="flex flex-col gap-[4px]">
                                <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/Discovery call.png"
                                        alt="" />

                                    <p class="text-[9px] lg:text-[12px] font-[500] text-[#3A3A3A]">
                                        {{-- Discovery call --}}
                                        <button onclick="handleDiscoveryCall('{{ $advisor->user_id }}')"
                                            class="bg-[#6a9023]  text-white p-2 rounded w-[120px]">
                                            Discovery call
                                        </button>
                                    </p>
                                </div>

                                <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/Consultation call.png"
                                        alt="" />

                                    <p class="text-[9px] lg:text-[12px] font-[500] text-[#3A3A3A]">
                                        <button onclick="handleConsultationCall('{{ $advisor->user_id }}')"
                                            class="bg-[#ff3131] text-white p-2 rounded w-[120px]">
                                            Consultation call
                                        </button>
                                    </p>
                                </div>
                                {{-- <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/Chat.png" alt="" />

                                    <p class="text-[9px] lg:text-[12px] font-[500] text-[#3A3A3A]">
                                        Chat
                                    </p>
                                </div> --}}
                                <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/Book Appointment.png"
                                        alt="" />

                                    <p class="text-[9px] lg:text-[12px] font-[500] text-[#3A3A3A]">
                                        {{-- Book Appointment --}}
                                        <button class="bg-[#C95555] text-white p-2 rounded w-[120px]"
                                            onclick="openBookingModal()">Book Appointment</button>
                                    </p>
                                </div>
                                <!-- Modal -->
                                {{-- <div id="appointmentModal"
                                    class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-600 bg-opacity-50">
                                    <div class="relative p-6 bg-white rounded-lg shadow-lg w-96">
                                        <h2 class="mb-4 text-lg font-bold">Book Appointment with {{ $advisor->user_id }}
                                        </h2>

                                        <!-- Tabs for each day with dates -->
                                        <div class="flex mb-4 space-x-2 overflow-x-auto tabs">
                                            @foreach ($upcomingDays as $day)
                                                <button id="day-{{ $loop->index }}"
                                                    class="tab-button bg-{{ $loop->first ? 'green' : 'blue' }}-500 text-white px-4 py-2 rounded-lg"
                                                    onclick="selectDay('{{ $loop->index }}', '{{ $day['day'] }}')">
                                                    {{ $day['day'] }}<br>{{ $day['date'] }}
                                                </button>
                                            @endforeach
                                        </div>

                                        <!-- Time Slots for Selected Day -->
                                        <div id="timeSlots" class="time-slots">
                                            @foreach ($advisorAvailabilities as $availability)
                                                <div data-day="{{ $availability->day }}" class="hidden slot">
                                                    <button id="slot-{{ $availability->time_slot }}"
                                                        class="w-full px-4 py-2 mb-2 text-center text-gray-700 bg-gray-200 rounded-lg slot-button"
                                                        onclick="selectSlot('{{ $availability->advisor_nomination_id }}', '{{ $availability->day }}', '{{ $availability->time_slot }}')">
                                                        {{ $availability->time_slot }}
                                                    </button>

                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Confirm Appointment Button -->
                                        <button id="confirmAppointment"
                                            class="hidden w-full p-2 mt-4 text-white bg-green-500 rounded"
                                            onclick="confirmBooking()">Confirm Appointment</button>

                                        <!-- Close Button -->
                                        <button class="w-full p-2 mt-4 text-white bg-red-500 rounded"
                                            onclick="closeBookingModal()">Close</button>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- border -->
                            <div class="border border-[#E5E5E5] h-full w-[1px]"></div>
                            <div class="flex flex-col gap-[4px]">
                                <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/hindi.png" alt="" />

                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                        {{-- {{ $advisor->language_known ?? 'N/A' }} --}}
                                        English,Hindi
                                    </p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/33.png" alt="" />

                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                        {{ $advisor->conference_call_price_per_minute ?? 'N/A' }}/min</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/location.png"
                                        alt="" />

                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                        {{ $advisor->location }}, India
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- dropdown -->
                    <div class="relative inline-block w-full text-left">
                        <div class="flex justify-between items-center rounded-[18px] my-[12px] bg-[#FFF6F6] w-full p-2">
                            <button id="dropdown-button" onclick="toggleDropdown()"
                                class="dropbtn text-[#3A3A3A] px-4 py-2 rounded-md text-[16px] font-[500] focus:outline-none flex items-center w-full justify-between">
                                Availability
                                <i id="dropdown-icon" class="fas fa-chevron-down transition-transform"></i>
                            </button>
                        </div>

                        <div id="dropdown-menu"
                            class="absolute z-10 hidden w-full bg-white rounded-md shadow-md dropdown-content">
                            @php
                                $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                $availabilityData = $availabilities->groupBy('day');
                            @endphp

                            @foreach ($days as $day)
                                @if ($availabilityData->has($day))
                                    <div class="flex flex-col w-full px-4 py-2">
                                        <p class="text-[#864444] text-[15px] font-[400]">{{ $day }}</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($availabilityData[$day] as $availability)
                                                <span class="bg-[#e0e0e0] text-[#333] px-3 py-1 rounded-md text-[13px]">
                                                    {{ $availability->time_slot }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="flex text-[#FF0000] text-[15px] font-[400] justify-between items-center w-full px-4 py-2">
                                        <p class="mx-2">{{ $day }}</p>
                                        <p class="mx-2">Day off</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- testimonial slider -->
                    {{-- <p class="font-[400] text-[14px] lg:text-[18px] text-[#2A2A2A]">
                        Reviews:
                    </p>
                    <div class="bg-[#F6F8FD] rounded-[24px]">
                        <div class="container mx-auto">
                            <div class="relative w-full max-w-xl mx-auto">
                                <div class="relative testimonial-bg">
                                    <div id="testimonial-slider" class="owl-carousel">
                                        <div class="testimonial">
                                            <div class="flex flex-col w-full p-2 gsp-2">
                                                <div class="flex gap-3">
                                                    <img style="height: 60px; width: 60px"
                                                        src="../src/assets/Ellipse 4.png" alt="" />
                                                    <div class="flex flex-col">
                                                        <h2>Lisa Miles</h2>
                                                        <div class="flex gap-1">
                                                            <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                                                            <h5>4.9/5</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-[18px] font-[400]">
                                                    "Catherine's positivity and enthusiasm are
                                                    infectious! As an advisor, she goes above and beyond
                                                    to support her clients in achieving their goals.
                                                    Incredible Insight and Guidance. Their expertise and
                                                    insights have helped me navigate complex challenges
                                                    and identify new opportunities for growth. Highly
                                                    recommend."
                                                </p>
                                            </div>
                                        </div>
                                        <div class="testimonial">
                                            <div class="flex flex-col w-full p-2 gsp-2">
                                                <div class="flex gap-3">
                                                    <img style="height: 60px; width: 60px"
                                                        src="../src/assets/Ellipse 5.png" alt="" />
                                                    <div class="flex flex-col">
                                                        <h2>Lisa Miles</h2>
                                                        <div class="flex gap-1">
                                                            <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                                                            <h5>4.9/5</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-[18px] font-[400]">
                                                    "Catherine's positivity and enthusiasm are
                                                    infectious! As an advisor, she goes above and beyond
                                                    to support her clients in achieving their goals.
                                                    Incredible Insight and Guidance. Their expertise and
                                                    insights have helped me navigate complex challenges
                                                    and identify new opportunities for growth. Highly
                                                    recommend."
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-controls">
                                    <div class="owl-nav">
                                        <div class="owl-prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </div>
                                        <div class="owl-next">
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> --}}
                </div>
                <!-- right -->

                <div class="w-[78%] flex flex-col gap-2">
                    <!-- 1st row  -->
                    <div class="flex flex-wrap mt-[30px] justify-between gap-4">
                        <!-- Business Functions Section -->
                        <div class="flex flex-col gap-2 w-full sm:w-1/2 lg:w-1/5">
                            <h3 class="font-[500] text-[12px] lg:text-[16px]">Business Functions:</h3>
                            <div class="flex flex-wrap gap-2">
                                <h4
                                    class="text-[10px] p-2 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                    {{ $advisor->businessFunctionCategory->name ?? 'N/A' }}
                                </h4>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="hidden lg:block border-[2px] border-[#E5E5E5] h-full"></div>

                        <!-- Sub-Business Functions Section -->
                        <div class="flex flex-col gap-2 w-full sm:w-1/2 lg:w-1/5">
                            <h3 class="font-[500] text-[12px] lg:text-[16px]">Sub-Business Functions:</h3>
                            <div class="flex flex-wrap gap-2">
                                <h4
                                    class="text-[10px] p-2 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                    {{ $advisor->subFunctionCategory1->name ?? '' }}
                                </h4>
                                <h4
                                    class="text-[10px] p-2 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                    {{ $advisor->subFunctionCategory2->name ?? '' }}
                                </h4>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="hidden lg:block border-[2px] border-[#E5E5E5] h-full"></div>

                        <!-- Industry Section -->
                        <div class="flex flex-col gap-2 w-full sm:w-1/2 lg:w-1/5">
                            <h3 class="font-[500] text-[12px] lg:text-[16px]">Industry:</h3>
                            <div class="flex flex-wrap gap-2">
                                @forelse($industries as $industry)
                                    <h4
                                        class="text-[10px] p-2 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                        {{ $industry->name }}
                                    </h4>
                                @empty
                                    <h4>No industries available</h4>
                                @endforelse
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="hidden lg:block border-[2px] border-[#E5E5E5] h-full"></div>

                        <!-- Geography Section -->
                        <div class="flex flex-col gap-2 w-full sm:w-1/2 lg:w-1/5">
                            <h3 class="font-[500] text-[12px] lg:text-[16px]">Geography:</h3>
                            <div class="flex flex-wrap gap-2">
                                @forelse($geographies as $geography)
                                    <h4
                                        class="text-[10px] p-2 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                        {{ $geography->name }}
                                    </h4>
                                @empty
                                    <h4
                                        class="text-[10px] p-2 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                        No geographies available
                                    </h4>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- 2nd row  -->
                    <div class="flex flex-col bg-[#F5F5F5] relative gap-3 p-3">
                        {{-- <img class="w-[100px] h-[100px] md:w-[120px] md:h-[120px] absolute top-[0px] right-[20px]"
                            src="../src/assets/Stamp.png" alt="" /> --}}

                        <!-- title name  -->
                        <div class="flex items-center gap-3">
                            <h2 class="text-[14px] lg:text-[18px] font-[600]">
                                @if (Auth::check())
                                    {{ $advisor->full_name }}
                                @else
                                    {{ $advisor->user_id }}
                                @endif
                            </h2>
                            <!-- rating -->
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                                <p class="lg:text-[16px] lg:font-[500] text-[10px] font-[700]">
                                    {{ $advisor->average_review_score ? number_format($advisor->average_review_score, 1) : 'No reviews' }}
                                </p>
                            </div>
                        </div>
                        @if ($advisor->is_founder)
                            <h3 class="text-[12px] lg:text-[16px] font-[400]">
                                Founder, <span class="font-bold text-[#6A9023]">{{ $advisor->company_name }}</span>
                                <br class="lg:hidden">
                                Website :
                                <a href="{{ $advisor->company_website }}"
                                    class="font-bold text-[#6A9023]">{{ $advisor->company_website }}</a>
                            </h3>
                        @endif

                        <h4 class="text-[12px] lg:text-[16px]  font-bold">About</h4>
                        <p class="text-[12px] lg:text-[16px] font-[400] break-words">
                            {{ $advisor->about }}
                        </p>
                    </div>
                    <!-- 3rd row  -->
                    <div class="flex flex-col bg-[#F5F5F5] gap-3 p-3">
                        <h4 class="text-[12px] font-bold lg:text-[16px]">
                            Awards & Recognition
                        </h4>

                        <div class=" break-words">
                            {{-- <li class="lg:text-[16px] text-[12px] font-[400]">
                                Industry Excellence Award-2021
                            </li>
                            <li class="lg:text-[16px] text-[12px] font-[400]">
                                Entrepreneurial Spirit Award- 2020
                            </li>
                            <li class="lg:text-[16px] text-[12px] font-[400]">
                                Best Consulting Firm- 2020
                            </li>
                            <li class="lg:text-[16px] text-[12px] font-[400]">
                                Community Impact Award- 2019
                            </li> --}}
                            {!! $advisor->awards_recognition !!}
                        </div>
                    </div>
                    <!-- 4th row  -->

                    <div class="flex flex-col bg-[#F5F5F5] gap-3 p-3">
                        <h4 class="text-[12px] lg:text-[16px]  font-bold">Services</h4>

                        <div class=" break-words">
                            {{-- <li class="lg:text-[16px] text-[12px] font-[400]">
                                Industry Excellence Award-2021
                            </li>
                            <li class="lg:text-[16px] text-[12px] font-[400]">
                                Entrepreneurial Spirit Award- 2020
                            </li> --}}
                            {!! $advisor->services !!}
                        </div>
                    </div>


                    <!-- 5th videos -->
                    @if ($advisor->video_upload)
                        @php
                            $videos = is_string($advisor->video_upload)
                                ? json_decode($advisor->video_upload, true)
                                : $advisor->video_upload;
                        @endphp

                        @foreach ($videos as $video)
                            <div class="flex gap-5">
                                <video class="w-[360px] h-[230px] rounded-lg" controls autoplay muted>
                                    <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endforeach
                    @endif
                    <div class="flex gap-5">
                        <p class="font-bold text-[14px] lg:text-[18px] text-[#2A2A2A]">
                            Reviews:
                        </p>
                        <div class="bg-[#F6F8FD] rounded-[24px]">
                            <div class="container mx-auto">
                                <div class="relative w-full max-w-xl mx-auto p-4">
                                    <div class="relative testimonial-bg">
                                        <!-- Check if there are reviews -->
                                        @if ($reviews->isEmpty())
                                            <p
                                                class="text-center text-[16px] lg:text-[18px] font-[400] text-[#2A2A2A] py-6">
                                                No reviews available yet.
                                            </p>
                                        @else
                                            <div id="testimonial-slider" class="owl-carousel">
                                                @foreach ($reviews as $review)
                                                    <div class="testimonial">
                                                        <div class="flex flex-col w-full p-4 gap-4">
                                                            <div class="flex gap-4">
                                                                <img class="rounded-full"
                                                                    style="height: 60px; width: 60px"
                                                                    src="{{ $review->userProfile && $review->userProfile->profile_photo_path ? asset('storage/' . $review->userProfile->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                                                    alt="Profile Image" />
                                                                <div class="flex flex-col">
                                                                    <h2
                                                                        class="font-bold text-[16px] lg:text-[18px] text-[#2A2A2A]">
                                                                        {{ $review->userProfile->full_name ?? 'Anonymous' }}
                                                                    </h2>
                                                                    <div class="flex gap-1 items-center">
                                                                        <i class="fa-solid fa-star"
                                                                            style="color: #ffd43b"></i>
                                                                        <h5
                                                                            class="text-[14px] lg:text-[16px] text-[#2A2A2A]">
                                                                            {{ $review->overall_experience ?? 'N/A' }}/5
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p
                                                                class="text-[16px] lg:text-[18px] font-[400] text-[#2A2A2A]">
                                                                "{{ $review->review ?? 'No review available.' }}"
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Slider Controls: Will only be displayed if reviews exist -->
                                    @if ($reviews->isNotEmpty())
                                        <div class="owl-controls">
                                            <div class="owl-nav flex justify-between items-center py-4">
                                                <!-- Previous Button -->
                                                <div
                                                    class="owl-prev text-[#2A2A2A] cursor-pointer p-2 hover:bg-gray-200 rounded-full transition">
                                                    <i class="fas fa-chevron-left"></i>
                                                </div>

                                                <!-- Next Button -->
                                                <div
                                                    class="owl-next text-[#2A2A2A] cursor-pointer p-2 hover:bg-gray-200 rounded-full transition">
                                                    <i class="fas fa-chevron-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <hr class="mb-[100px]"> --}}
        </hr>

        <!-- small screen design -->
        <div class="flex lg:hidden flex-col p-[20px] mb-[5rem]">
            <!-- slider  -->
            <div class="swiper mySwiper1 bg-[#F4F9EF] p-[18px] mb-4">
                @if (!empty($advisor->highlighted_images) && count($advisor->highlighted_images) > 0)
                    <div class="swiper-wrapper">
                        @foreach ($advisor->highlighted_images as $image)
                            <div class="swiper-slide">
                                <div>

                                    <a href="{{ Storage::url($image) }}" data-lightbox="highlighted-gallery">
                                        <img class="w-[100px] h-[80px] shadow shadow-[#00000026] object-cover"
                                            src="{{ Storage::url($image) }}" alt="Highlighted Image" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif



            </div>
            <div class="bg-[#FFFACA] py-2 rounded-tl-[20px] rounded-tr-[20px] px-2 flex justify-between">
                <p class="text-[12px] font-[500] text-[#B58300]">
                    {{ $advisor->is_super_advisor == 'true' ? 'Super Advisor' : 'Advisor' }}
                </p>
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-circle fa-xs"
                        style="color: {{ $isAvailableToday ? '#6a9023' : '#e3342f' }}"></i>
                    <p class="text-[12px] font-[600]" style="color: {{ $isAvailableToday ? '#6a9023' : '#e3342f' }}">
                        {{ $isAvailableToday ? 'Available' : 'Not Available' }}
                    </p>
                </div>
            </div>
            <!-- proflie  -->
            <div class="flex w-full shadow-xl rounded-[24px] shadow-[#00000026] p-4 flex-col">



                <div class="flex flex-col mt-[8px] gap-5 md:gap-4 w-full">
                    <!-- 1st col  -->
                    <div class="flex flex-col shrink-0 w-full gap-[12px]">
                        <div class="flex flex-row justify-around gap-2">
                            <img class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover border-2 border-gray-200"
                                src="{{ $advisor->profile_photo_path ? asset('storage/' . $advisor->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                alt="{{ $advisor->full_name }}" />


                            <div class="flex flex-col gap-[4px]">


                                <div class="flex flex-col w-full gap-[4px] relative">
                                    <div class="flex items-center justify-between">
                                        <h2 class="text-[14px] lg:text-[18px] font-[600]">
                                            @if (Auth::check())
                                                {{ $advisor->full_name }}
                                            @else
                                                {{ $advisor->user_id }}
                                            @endif
                                        </h2>
                                    </div>

                                    @if ($advisor->is_founder)
                                        <h3 class="text-[12px] lg:text-[16px] font-[400] break-words w-28 sm:w-48 md:">
                                            Founder,
                                            <span class="font-bold text-[#6A9023]">{{ $advisor->company_name }}</span>
                                            <br>
                                            Website :
                                            <a href="{{ $advisor->company_website }}"
                                                class="font-bold text-[#6A9023] break-words w-full">
                                                {{ $advisor->company_website }}
                                            </a>
                                        </h3>
                                    @endif
                                </div>

                                <!-- rating -->
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                                    <p class="lg:text-[16px] lg:font-[500] text-[10px] font-[700]">
                                        {{ $advisor->average_review_score ? number_format($advisor->average_review_score, 1) : 'No reviews' }}
                                    </p>
                                </div>


                                <div class="flex items-center gap-1">
                                    <img class="sm:w-[20px] sm:h-[20px] w-[15px] h-[15px]"
                                        src="../src/assets/icons/hindi.png" alt="" />

                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                        {{-- {{ $advisor->language_known ?? 'N/A' }} --}}
                                        English,Hindi
                                    </p>

                                </div>
                                <div class="flex items-center gap-1">
                                    <img class="sm:w-[20px] sm:h-[20px] w-[15px] h-[15px]"
                                        src="../src/assets/icons/33.png" alt="" />

                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                        {{ $advisor->conference_call_price_per_minute ?? 'N/A' }}/min
                                    </p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <img class="sm:w-[20px] sm:h-[20px] w-[15px] h-[15px]"
                                        src="../src/assets/icons/location.png" alt="" />

                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                        {{ $advisor->location }}, India
                                    </p>
                                </div>
                            </div>


                        </div>
                        <div class="flex items-center gap-1 w-ful">
                            {{-- <img class="w-[20px] h-[20px]" src="../src/assets/icons/Notify me.png" alt="" />

                            <p class="text-[12px] font-[500] text-[#C95555]">Notify me</p> --}}
                            <button id="notifyButton" type="button"
                                data-route="{{ route('notify.advisor', $advisor->user_id) }}"
                                data-advisor-id="{{ $advisor->user_id }}"
                                class="lg:text-[16px] text-[12px] font-[500] text-[#C95555] flex items-center gap-1 p-3">
                                <img class="w-[20px] h-[20px]" src="../src/assets/icons/Notify me.png" alt="" />
                                Notify me
                            </button>
                        </div>

                        <div class="flex flex-col gap-[4px]">

                            <div class="flex flex-col gap-[4px] w-full justify-around sm:flex-row">
                                <button onclick="handleDiscoveryCall('{{ $advisor->user_id }}')"
                                    class="bg-[#6a9023] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-green-600">
                                    Discovery call
                                </button>

                                <button onclick="handleConsultationCall('{{ $advisor->user_id }}')"
                                    class="bg-[#ff3131] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-orange-600">
                                    Consultation call
                                </button>

                                <button onclick="openBookingModal()"
                                    class="bg-[#C95555] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-red-600">Book
                                    Appointment

                                </button>
                                {{-- <div class="flex items-center gap-1">
                                    <img class="w-[20px] h-[20px]" src="../src/assets/icons/Chat.png" alt="" />

                                    <p class="text-[9px] lg:text-[12px] font-[500] text-[#3A3A3A]">
                                        Chat
                                    </p>
                                </div> --}}
                                <div class="flex items-center gap-1">
                                    {{-- <img class="w-[20px] h-[20px]" src="../src/assets/icons/Book Appointment.png"
                                        alt="" /> --}}

                                    {{-- <p class="text-[9px] lg:text-[12px] font-[500] text-[#3A3A3A]"> --}}
                                    {{-- Book Appointment --}}
                                    {{-- <button class="bg-[#FF3131] text-white p-2 rounded w-[85px]"
                                            onclick="openBookingModal()">Book Appointment</button>
                                    </p> --}}
                                </div>
                                <div id="appointmentMobileModal"
                                    class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-600 bg-opacity-50">
                                    <div class="relative p-6 bg-white rounded-lg shadow-lg w-96">
                                        <h2 class="mb-4 text-lg font-bold">Book Appointment with {{ $advisor->user_id }}
                                        </h2>

                                        <!-- Tabs for each day -->
                                        <div class="flex mb-4 space-x-2 overflow-x-auto tabs">
                                            @foreach ($upcomingDays as $day)
                                                <button id="day-{{ $loop->index }}"
                                                    class="tab-button bg-{{ $loop->first ? 'green' : 'blue' }}-500 text-white px-4 py-2 rounded-lg"
                                                    onclick="selectMobileDay('{{ $loop->index }}', '{{ $day['day'] }}')">
                                                    {{ $day['day'] }}<br>{{ $day['date'] }}
                                                </button>
                                            @endforeach
                                        </div>

                                        <!-- Time Slots for Selected Day -->
                                        <div id="timeMobileSlots" class="time-slots">
                                            @foreach ($advisorAvailabilities as $availability)
                                                <div data-day="{{ $availability->day }}" class="hidden slot">
                                                    <button id="slot-mobile-{{ $availability->time_slot }}"
                                                        class="w-full px-4 py-2 mb-2 text-center text-gray-700 bg-gray-200 rounded-lg slot-button"
                                                        onclick="selectMobileSlot('{{ $availability->advisor_nomination_id }}', '{{ $availability->day }}', '{{ $availability->time_slot }}')">
                                                        {{ $availability->time_slot }}
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Confirm Appointment Button -->
                                        <button id="confirmMobileAppointment"
                                            class="hidden w-full p-2 mt-4 text-white bg-green-500 rounded"
                                            onclick="confirmMobileBooking()">Confirm Appointment</button>

                                        <!-- Close Button -->
                                        <button class="w-full p-2 mt-4 text-white bg-red-500 rounded"
                                            onclick="closeBookingMobileModal()">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 2nd col  -->
                    <!-- options choosen -->
                    <div class="relative flex justify-between w-full">
                        {{-- <img class="w-[100px] h-[100px] md:w-[120px] md:h-[120px] absolute bottom-[0px] right-0 sm:right-[10px]"
                            src="../src/assets/Stamp.png" alt="" /> --}}

                        <div class="flex flex-col w-full gap-[12px]">
                            <!-- title name  -->

                            <!-- dropdown options selected  -->
                            <div class="flex flex-col justify-between">

                                <div class="flex flex-col gap-1">
                                    <h3 class="font-[500] text-[12px] lg:text-[16px]">
                                        Business Functions:
                                    </h3>
                                    <div class="flex gap-1">
                                        <h4
                                            class="text-[10px] p-1 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                            {{ $advisor->businessFunctionCategory->name ?? 'N/A' }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <h3 class="font-[500] text-[12px] lg:text-[16px]">
                                        Sub-Business Functions:
                                    </h3>
                                    <div class="flex gap-1">
                                        <h4
                                            class="text-[10px] p-1 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                            {{ $advisor->subFunctionCategory1->name ?? '' }}
                                        </h4>
                                        <h4
                                            class="text-[10px] p-1 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                            {{ $advisor->subFunctionCategory2->name ? '' . $advisor->subFunctionCategory2->name : '' }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <h3 class="font-[500] text-[12px] lg:text-[16px]">
                                        Industry:
                                    </h3>
                                    <div class="flex gap-1">
                                        @forelse($industries as $industry)
                                            <h4
                                                class="text-[10px] p-1 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                                {{ $industry->name }}
                                            </h4>
                                        @empty
                                            <h4
                                                class="text-[10px] p-1 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                                No industries available</h4>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h3 class="font-[500] text-[12px] lg:text-[16px]">
                                        Geography:
                                    </h3>
                                    <div class="flex gap-1">
                                        @forelse($geographies as $geography)
                                            <h4
                                                class="text-[10px] p-1 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                                {{ $geography->name }}</h4>
                                        @empty
                                            <h4
                                                class="text-[10px] p-1 rounded-[40px] bg-[#F7EAEA] border border-[#FFD3D3] lg:text-[14px] font-[400]">
                                                No geographies available</h4>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dropdown -->
            <div class="relative inline-block w-full text-left">
                <div class="flex items-center justify-between bg-[#FFF6F6] mt-[12px] rounded-[18px] w-full p-2">
                    <button id="new-dropdown-button" onclick="toggleNewDropdown()"
                        class="new-dropbtn text-[#3A3A3A] px-4 py-2 rounded-md text-[16px] font-[500] focus:outline-none flex items-center w-full justify-between">
                        Availability
                        <i id="new-dropdown-icon" class="fas fa-chevron-down transition-transform"></i>
                    </button>
                </div>

                <div id="new-dropdown-menu"
                    class="absolute z-10 hidden w-full bg-white rounded-md shadow-md new-dropdown-content">
                    @php
                        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                        $availabilityData = $availabilities->groupBy('day');
                    @endphp

                    @foreach ($days as $day)
                        @if ($availabilityData->has($day))
                            <div class="flex flex-col w-full px-4 py-2">
                                <p class="text-[#864444] text-[15px] font-[400]">{{ $day }}</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($availabilityData[$day] as $availability)
                                        <span class="bg-[#e0e0e0] text-[#333] px-3 py-1 rounded-md text-[13px]">
                                            {{ $availability->time_slot }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div
                                class="flex text-[#FF0000] text-[15px] font-[400] justify-between items-center w-full px-4 py-2">
                                <p class="mx-2">{{ $day }}</p>
                                <p class="mx-2">Day off</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- about  -->
            <div class="flex flex-col gap-[5px] bg-[#F5F5F5] p-3 mt-[12px] rounded-[12px]">
                <h4 class="text-[12px] lg:text-[16px] font-bold">About</h4>
                <p class="text-[12px] lg:text-[16px] font-[400] break-words">
                    {{ $advisor->about }}
                </p>
            </div>
            <!-- 3rd row  -->
            <div class="flex flex-col mt-[12px] rounded-[12px] bg-[#F5F5F5] gap-3 p-3">
                <h4 class="text-[12px] lg:text-[16px] font-bold">
                    Awards & Recognition
                </h4>

                <div class="break-words">
                    {{-- <li class="lg:text-[16px] text-[12px] font-[400]">
                        Industry Excellence Award-2021
                    </li>
                    <li class="lg:text-[16px] text-[12px] font-[400]">
                        Entrepreneurial Spirit Award- 2020
                    </li>
                    <li class="lg:text-[16px] text-[12px] font-[400]">
                        Best Consulting Firm- 2020
                    </li>
                    <li class="lg:text-[16px] text-[12px] font-[400]">
                        Community Impact Award- 2019
                    </li> --}}
                    {!! $advisor->awards_recognition !!}
                </div>
            </div>
            <!-- 4th row  -->

            <div class="flex flex-col mt-[12px] rounded-[12px] bg-[#F5F5F5] gap-3 p-3">
                <h4 class="text-[12px] lg:text-[16px]  font-bold">Services</h4>

                <div class="break-words">
                    {{-- <li class="lg:text-[16px] text-[12px] font-[400]">
                        Industry Excellence Award-2021
                    </li>
                    <li class="lg:text-[16px] text-[12px] font-[400]">
                        Entrepreneurial Spirit Award- 2020
                    </li> --}}
                    {!! $advisor->services !!}
                </div>
            </div>
            <!-- 5th videos -->
            @if ($advisor->video_upload)
                @php
                    $videos = is_string($advisor->video_upload)
                        ? json_decode($advisor->video_upload, true)
                        : $advisor->video_upload;
                @endphp

                @foreach ($videos as $video)
                    <div class="flex flex-wrap items-center justify-center gap-5 sm:flex-row">
                        <video class="sm:w-[200px] sm:h-[200px] lg:w-[160px] w-full lg:h-[130px]" controls autoplay muted>
                            <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endforeach
            @endif
            {{-- <div class="flex flex-wrap items-center justify-center gap-5 sm:flex-row">
                <img class="sm:w-[200px] sm:h-[200px] lg:w-[160px] w-full lg:h-[130px]" src="../src/assets/vad1.png"
                    alt="" />
                <img class="sm:w-[200px] sm:h-[200px] lg:w-[160px] w-full lg:h-[130px]" src="../src/assets/vad2.png"
                    alt="" />
            </div> --}}
            <!-- testimonial slider -->
            <p class="font-bold mt-[12px] text-[14px] lg:text-[18px] text-[#2A2A2A]">
                Reviews:
            </p>

            <!-- swipper js  -->
            <div class="swiper mySwiper1 bg-[#F4F9EF] flex items-center justify-center p-[18px]">
                <div class="swiper-wrapper">

                    @if ($reviews->isEmpty())
                        <div class="swiper-slide">
                            <p class="text-[16px] lg:text-[18px] font-[400] text-[#2A2A2A]">
                                No reviews available.
                            </p>
                        </div>
                    @else
                        @foreach ($reviews as $review)
                            <div class="swiper-slide">
                                <div class="flex flex-col w-full p-2 gsp-2">
                                    <div class="flex gap-3">
                                        <img style="height: 60px; width: 60px"
                                            src="{{ $review->userProfile && $review->userProfile->profile_photo_path ? asset('storage/' . $review->userProfile->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                            alt="" />
                                        <div class="flex flex-col">
                                            <h2> {{ $review->userProfile->full_name ?? 'Anonymous' }}</h2>
                                            <div class="flex gap-1">
                                                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                                                <h5> {{ $review->overall_experience ?? 'N/A' }}/5</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-[18px] font-[400]">
                                        "{{ $review->review ?? 'No review available.' }}"
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>


        <div id="appointmentModal"
            class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-600 bg-opacity-50">
            <div class="relative p-6 bg-white rounded-lg shadow-lg w-96">
                <h2 class="mb-4 text-lg font-bold">Book Appointment with {{ $advisor->user_id }}
                </h2>

                <!-- Tabs for each day with dates -->
                <div class="flex mb-4 space-x-2 overflow-x-auto tabs">
                    @foreach ($upcomingDays as $day)
                        <button id="day-{{ $loop->index }}"
                            class="tab-button bg-{{ $loop->first ? 'green' : 'blue' }}-500 text-white px-4 py-2 rounded-lg"
                            onclick="selectDay('{{ $loop->index }}', '{{ $day['day'] }}', '{{ $day['date'] }}')">
                            {{ $day['day'] }}<br>{{ $day['date'] }}
                        </button>
                    @endforeach
                </div>


                <!-- Time Slots for Selected Day -->
                <div id="timeSlots" class="time-slots">
                    @foreach ($advisorAvailabilities as $availability)
                        <div data-day="{{ $availability->day }}" class="hidden slot">
                            <button id="slot-{{ $availability->time_slot }}"
                                class="w-full px-4 py-2 mb-2 text-center text-gray-700 bg-gray-200 rounded-lg slot-button"
                                onclick="selectSlot('{{ $availability->advisor_nomination_id }}', '{{ $availability->day }}', '{{ $availability->time_slot }}')">
                                {{ $availability->time_slot }}
                            </button>

                        </div>
                    @endforeach
                </div>

                <!-- Confirm Appointment Button -->
                <button id="confirmAppointment" class="hidden w-full p-2 mt-4 text-white bg-green-500 rounded"
                    onclick="confirmBooking()">Confirm Appointment</button>

                <!-- Close Button -->
                <button class="w-full p-2 mt-4 text-white bg-red-500 rounded" onclick="closeBookingModal()">Close</button>
            </div>
        </div>
        {{-- <div id="outgoing-call"></div> --}}
        <footer class="hidden md:block bg-[#FFFFFF] shadow-2xl border border-transparent mt-[2rem]">
            <div class="md:w-[95%] lg:w-[90%] mx-auto my-[2rem]">
                <div class="w-full flex items-start gap-[2rem] lg:gap-[4rem] font-Roboto">
                    {{-- <div class="flex flex-col items-start gap-2 text-xl font-semibold lg:text-2xl justify-starts">
                <a href="../Home.html">
                    <img class="w-[400px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
                </a>
                <h2 class="text-sm lg:text-base text-[#3A3A3A] font-normal text-start" style="text-align: center;">
                    Business & Digital Expert Advice
                </h2>
            </div> --}}
                    <div class="flex flex-col items-center gap-2 text-xl font-semibold lg:text-2xl">
                        <a href="{{ route('home') }}">
                            <img class="w-[400px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
                        </a>
                        {{-- <h2 class="text-lg lg:text-xl text-[#3A3A3A] font-normal text-center">
                    Business & Digital Expert Advice
                </h2> --}}
                    </div>


                    <div>
                        <h4 class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">
                            Reach Out to Us
                        </h4>
                        <div
                            class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A] mt-[15px]">
                            <div class="flex items-center gap-2">
                                <img class="w-3 h-4" src="../src/assets/img/location.png" alt="" />
                                <h2 class="text-sm text-[#3A3A3A] font-normal">Mail Us: <a
                                        href="mailto:advisory@shift180.in" style="color: #6AA300">advisory@shift180.in</a>
                                </h2>
                            </div>
                        </div>
                        <div
                            class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A] mt-[15px]">
                            <div class="flex items-center gap-2">
                                <img class="w-3 h-4" src="../src/assets/img/call.png" alt="" />
                                <h2 class="text-sm text-[#3A3A3A] font-normal">Contact: <a href="telto:+91-9667707712"
                                        style="color: #6AA300">+91-9667707712</a></h2>
                            </div>
                        </div>
                        <div
                            class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A] mt-[15px]">
                            <div class="flex items-center gap-2">
                                <img class="w-3 h-4" src="../src/assets/img/location.png" alt="" />
                                <h2 class="text-sm text-[#3A3A3A] font-normal">Location: <a
                                        href="https://maps.app.goo.gl/wtgGR7j391WHecPL6" style="color: #6AA300">Pune,
                                        India</a>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <ul
                        class="flex items-start flex-col gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                        <li class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">Quick Links</li>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}">About us</a>
                        </li>
                        <li>
                            <a href="{{ route('consult-advisor') }}"> Find Advisors</a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}">Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('contact-us') }}">Contact us</a>
                        </li>
                    </ul>
                    <ul
                        class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                        <li class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">Our Policies</li>
                        <li>
                            <a href="{{ route('terms-of-service') }}">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/Landing_page/Terms.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Terms of Services
                                    </h2>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('privacy-policy') }}">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/Landing_page/Privacy.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Privacy Policy
                                    </h2>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('onboarding-policy') }}">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/Landing_page/Onboard.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Onboarding Policy
                                    </h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul
                        class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                        <li class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">Social Media</li>
                        <li>
                            <a href="https://www.instagram.com/shift180world">
                                <div class="flex items-center gap-4">
                                    <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                        <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                            <path
                                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                        </svg>
                                    </span>
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Instagram
                                    </h2>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Shift180.world/">
                                <div class="flex items-center gap-4">
                                    <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                        <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                            <path
                                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                        </svg>
                                    </span>
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Facebook
                                    </h2>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.youtube.com/@Shift180AdvisoryServices">
                                <div class="flex items-center gap-4">
                                    <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#ff0000]">
                                        <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                            <path
                                                d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                                        </svg>
                                    </span>
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Youtube
                                    </h2>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/shift180/">
                                <div class="flex items-center gap-4">
                                    <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#0077b5]">
                                        <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                            <path
                                                d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                        </svg>
                                    </span>
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Linkedin
                                    </h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="border border-[#EAEAEA] my-4 w-full"></div>

                <div class="flex items-center justify-between w-full">
                    <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                        © 2024 Advisator. All rights reserved.
                    </h3>
                    <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                        <a href="mailto:advisory@shift180.in">advisory@shift180.in</a>
                    </h3>
                </div>
            </div>
        </footer>




        <!-- bottom menu bar -->
        @include('web.components.bottommenu')

        <!-- side bar -->
        @include('web.components.sidebar')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <!-- Include SweetAlert2 and Tailwind Modal Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all the notify buttons
            document.querySelectorAll('#notifyButton').forEach(button => {
                button.addEventListener('click', async function(event) {
                    event.preventDefault(); // Prevent any default action

                    // Check if the user is logged in
                    const isLoggedIn =
                        {{ auth()->check() ? 'true' : 'false' }}; // Authentication check

                    if (!isLoggedIn) {
                        Swal.fire({
                            title: 'Login Required',
                            text: 'You need to log in to notify the advisor. Please log in to continue.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Login',
                            cancelButtonText: 'Cancel',
                            confirmButtonColor: '#4CAF50',
                            cancelButtonColor: '#f44336',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =
                                    "{{ route('login') }}"; // Redirect to login
                            }
                        });
                        return; // Stop further execution if not logged in
                    }

                    const url = button.getAttribute('data-route');
                    const csrfToken = '{{ csrf_token() }}'; // Directly using csrf_token()

                    // Debugging line for checking Advisor ID
                    const advisorId = button.getAttribute('data-advisor-id');
                    console.log("Advisor ID passed:", advisorId);

                    try {
                        // Show a loading SweetAlert while the request is being processed
                        Swal.fire({
                            title: 'Please wait...',
                            text: 'Notifying the advisor...',
                            icon: 'info',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Making an AJAX POST request using fetch
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                advisorId: advisorId
                            }) // Send the advisor ID
                        });

                        const data = await response.json();

                        // Close the loading SweetAlert
                        Swal.close();

                        // Show a success or error SweetAlert based on the response
                        if (data.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Advisor has been notified successfully.',
                                icon: 'success',
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message || 'An error occurred.',
                                icon: 'error',
                            });
                        }
                    } catch (error) {
                        // Close the loading SweetAlert in case of an error
                        Swal.close();

                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'An unexpected error occurred. Please try again.',
                            icon: 'error',
                        });
                    }
                });
            });
        });
    </script>

    <script>
        let selectedDayIndex = 0;
        let selectedDay = '{{ $upcomingDays[0]['day'] }}';
        let selectedDate = '{{ $upcomingDays[0]['date'] }}';
        let selectedTimeSlot = '';
        let selectedAdvisorId = '';
        let isLoggedIn = {{ auth()->check() ? 'true' : 'false' }}; // Set once on load

        function openBookingModal() {
            if (!isLoggedIn) {
                Swal.fire({
                    title: 'Login Required',
                    text: "You need to log in to book an appointment. Please log in to continue.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4CAF50',
                    cancelButtonColor: '#f44336',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    }
                });
                return;
            }

            document.getElementById('appointmentModal').classList.remove('hidden');
            document.getElementById('appointmentModal').classList.add('flex');
            showSlots(selectedDay); // Load slots for the default selected day
        }

        function closeBookingModal() {
            document.getElementById('appointmentModal').classList.remove('flex');
            document.getElementById('appointmentModal').classList.add('hidden');
            resetSelections(); // Clear selections when closing modal
        }

        function resetSelections() {
            selectedTimeSlot = '';
            selectedAdvisorId = '';
            document.getElementById('confirmAppointment').classList.add('hidden'); // Hide confirm button

            document.querySelectorAll('.slot-button').forEach(button => {
                button.classList.remove('bg-green-500', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });
        }

        // Ensure `selectDay` properly sets `selectedDate`
        function selectDay(dayIndex, day, date) {
            selectedDayIndex = dayIndex;
            selectedDay = day;
            selectedDate = date; // Properly assign date here
            selectedTimeSlot = ''; // Clear selected slot on day change
            selectedAdvisorId = ''; // Clear advisor selection on day change

            document.querySelectorAll('.tab-button').forEach((button, index) => {
                button.classList.toggle('bg-green-500', index === dayIndex);
                button.classList.toggle('bg-blue-500', index !== dayIndex);
            });

            showSlots(day);
            console.log("Day Selected:", {
                day,
                date,
                selectedDay,
                selectedDate
            }); // Log for verification
        }

        function showSlots(day) {
            document.querySelectorAll('.slot').forEach(slot => {
                slot.classList.toggle('hidden', slot.dataset.day !== day);
            });

            resetSelections(); // Clear previous selections on showing new day slots
        }

        function selectSlot(advisorId, day, timeSlot) {
            selectedAdvisorId = advisorId;
            selectedTimeSlot = timeSlot;

            document.querySelectorAll('.slot-button').forEach(button => {
                button.classList.remove('bg-green-500', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });

            const selectedSlotButton = document.getElementById(`slot-${timeSlot}`);
            if (selectedSlotButton) {
                selectedSlotButton.classList.add('bg-green-500', 'text-white');
                selectedSlotButton.classList.remove('bg-gray-200', 'text-gray-700');
            }

            document.getElementById('confirmAppointment').classList.remove('hidden'); // Show confirm button
            console.log("Slot Selected:", {
                advisorId,
                day,
                timeSlot,
                selectedAdvisorId,
                selectedTimeSlot
            });
        }

        function confirmBooking() {
            // Check and log variables before submission
            console.log("Confirming Booking with:", {
                selectedAdvisorId,
                selectedTimeSlot,
                selectedDate,
                selectedDay,
            });

            if (!selectedAdvisorId || !selectedTimeSlot || !selectedDate) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Selection',
                    text: 'Please select a time slot before confirming.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            fetch('/book-appointment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCSRFToken()
                    },
                    body: JSON.stringify({
                        advisor_nomination_id: selectedAdvisorId,
                        day: selectedDay,
                        time_slot: selectedTimeSlot,
                        date: selectedDate
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Appointment Booked!',
                            text: data.success,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            closeBookingModal(); // Close modal after booking
                        });
                    } else if (data.error === 'This slot is already booked.') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Slot Already Booked',
                            text: data.error,
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.error || 'Something went wrong!',
                            confirmButtonText: 'Try Again'
                        });
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    Swal.fire({
                        icon: 'warning',
                        title: 'Login to Book Appointment',
                        text: 'Kindly Login First to Book Appointment.',
                        confirmButtonText: 'Login'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login') }}";
                        }
                    });
                });
        }

        function getCSRFToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        window.onload = function() {
            showSlots(selectedDay); // Preload slots for today's availability
        };
    </script>


    <script>
        $(document).ready(function() {
            $("#testimonial-slider").owlCarousel({
                items: 1,
                itemsDesktop: [3000, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                pagination: false,
                navigation: true,
                navigationText: ["", ""],
                autoplay: true,
                loop: true, // Enable looping
            });

            $(".owl-prev").click(function() {
                $("#testimonial-slider").trigger("prev.owl.carousel");
            });

            $(".owl-next").click(function() {
                $("#testimonial-slider").trigger("next.owl.carousel");
            });
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwiper1", {
            slidesPerView: "auto",
            spaceBetween: 40,
        });
    </script>
    <script>
        // JavaScript to toggle sidebar
        // const toggleBtn = document.querySelector('.toggleBtn');
        const hideSideMenu = document.getElementById("hideSideMenu");
        const showSideMenu = document.getElementById("showSideMenu");

        // console.log(toggleBtn)
        console.log(hideSideMenu, showSideMenu);
        const sidebar = document.querySelector(".sidebar");

        hideSideMenu.addEventListener("click", () => {
            sidebar.classList.add("left-full");
        });
        showSideMenu.addEventListener("click", () => {
            sidebar.classList.remove("left-full");
        });
    </script>
    <!-- testimonial script  -->
    <script>
        $(document).ready(function() {
            $("#testimonial-slider").owlCarousel({
                items: 1,
                itemsDesktop: [3000, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                pagination: false,
                navigation: true,
                navigationText: ["", ""],
                autoplay: true,
                loop: true, // Enable looping
            });

            $(".owl-prev").click(function() {
                $("#testimonial-slider").trigger("prev.owl.carousel");
            });

            $(".owl-next").click(function() {
                $("#testimonial-slider").trigger("next.owl.carousel");
            });
        });
    </script>
    <!-- downdrop button for lg screen  -->
    <script>
        function toggleDropdown() {
            const dropdownMenu = document.getElementById("dropdown-menu");
            const dropdownIcon = document.getElementById("dropdown-icon");

            if (dropdownMenu.classList.contains("hidden")) {
                // Show dropdown
                dropdownMenu.classList.remove("hidden");
                dropdownIcon.classList.add("rotate-180"); // Rotate the chevron
            } else {
                // Hide dropdown
                dropdownMenu.classList.add("hidden");
                dropdownIcon.classList.remove("rotate-180"); // Reset rotation
            }
        }

        window.onclick = function(event) {
            const dropdownButton = document.getElementById("dropdown-button");
            const dropdownMenu = document.getElementById("dropdown-menu");
            const dropdownIcon = document.getElementById("dropdown-icon");

            if (!dropdownButton.contains(event.target)) {
                // Hide dropdown if clicked outside
                dropdownMenu.classList.add("hidden");
                dropdownIcon.classList.remove("rotate-180");
            }
        };
    </script>

    <!-- Dropdown Script -->
    <script>
        function toggleNewDropdown() {
            const dropdownMenu = document.getElementById("new-dropdown-menu");
            const dropdownIcon = document.getElementById("new-dropdown-icon");

            if (dropdownMenu.classList.contains("hidden")) {
                // Show dropdown
                dropdownMenu.classList.remove("hidden");
                dropdownIcon.classList.add("rotate-180"); // Rotate the chevron
            } else {
                // Hide dropdown
                dropdownMenu.classList.add("hidden");
                dropdownIcon.classList.remove("rotate-180"); // Reset rotation
            }
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            const dropdownButton = document.getElementById("new-dropdown-button");
            const dropdownMenu = document.getElementById("new-dropdown-menu");
            const dropdownIcon = document.getElementById("new-dropdown-icon");

            if (!dropdownButton.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
                dropdownIcon.classList.remove("rotate-180");
            }
        };
    </script>
    <script>
        function handleDiscoveryCall(advisorId) {
            console.log("Advisor ID passed:", advisorId); // Debugging line
            @if (Auth::check())
                let walletBalance = {{ Auth::user()->user_wallet_balance }};
                if (walletBalance < 100) {
                    Swal.fire({
                        title: 'Insufficient Wallet Balance',
                        text: 'Your wallet balance is too low for this call. Please recharge your wallet.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Recharge',
                        cancelButtonText: 'Cancel',
                        confirmButtonColor: '#4CAF50',
                        cancelButtonColor: '#f44336',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('user.mywallet.recharge') }}';
                        }
                    });
                } else {
                    $.ajax({
                        url: '{{ route('discovery.call.initiate') }}', // Ensure this matches the route definition
                        method: 'POST',
                        data: {
                            advisorId: advisorId, // Pass the advisorId from the function argument
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        success: function(response) {
                            window.location.href = '/discovery-call'; // Redirect on success
                        },
                        error: function(xhr, status, error) {
                            console.log('Error storing advisor ID:', error);
                            console.log('Response:', xhr.responseText);
                        }
                    });
                }
            @else
                Swal.fire({
                    title: 'Login Required',
                    text: 'Please log in to continue with the discovery call.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4CAF50',
                    cancelButtonColor: '#f44336',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('login') }}';
                    }
                });
            @endif
        }
    </script>


    <script>
        function handleConsultationCall(advisorId) {
            @if (Auth::check())
                // User is authenticated, check wallet balance
                let walletBalance = {{ Auth::user()->user_wallet_balance }};
                if (walletBalance < 100) {
                    // Show SweetAlert for insufficient wallet balance
                    Swal.fire({
                        title: 'Insufficient Wallet Balance',
                        text: 'Your wallet balance is too low for this call. Please recharge your wallet.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Recharge',
                        cancelButtonText: 'Cancel',
                        confirmButtonColor: '#4CAF50', // Green color for confirm button
                        cancelButtonColor: '#f44336', // Red color for cancel button
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the recharge wallet page if they choose to recharge
                            window.location.href = '{{ route('user.mywallet.recharge') }}';
                        }
                    });
                } else {
                    // Send AJAX request to save the advisorId and then forward to the consultation call route
                    $.ajax({
                        url: '{{ route('discovery.call.initiate') }}', // Ensure this route is correctly defined
                        method: 'POST',
                        data: {
                            advisorId: advisorId, // Pass the advisorId from the function argument
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        success: function(response) {
                            // After successful saving, redirect to the consultation call page
                            window.location.href = '/consultation-call';

                        },
                        error: function(xhr, status, error) {
                            console.log('Error saving advisor ID:', error);
                            console.log('Response:', xhr.responseText);
                        }
                    });
                }
            @else
                // User is not authenticated, show SweetAlert
                Swal.fire({
                    title: 'Login Required',
                    text: 'Please log in to continue with the consultation call.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4CAF50', // Green color for confirm button
                    cancelButtonColor: '#f44336', // Red color for cancel button
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the login page if they choose to log in
                        window.location.href = '{{ route('login') }}';
                    }
                });
            @endif
        }
    </script><script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.getElementById('customSearchForm');
        const searchBar = document.getElementById('custom-search-bar');
        const searchSubmitButton = document.getElementById('search-submit');

        if (!searchForm || !searchBar || !searchSubmitButton) {
            console.error('Search form or elements not found.');
            return;
        }

        searchSubmitButton.addEventListener('click', function () {
            // Prevent the default form submission
            event.preventDefault();

            // Check if the user is authenticated
            @if (Auth::check())
                const searchQuery = searchBar.value.trim();
                if (searchQuery.length > 2) {
                    // Redirect if search query is valid
                    window.location.href = '{{ route('consult-advisor') }}?search=' + searchQuery;
                } else {
                    // Show SweetAlert for invalid query
                    Swal.fire({
                        title: 'Invalid Search Query',
                        text: 'Please enter at least 3 characters to search.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                    });
                }
            @else
                // User is not authenticated, show login prompt
                Swal.fire({
                    title: 'Login Required',
                    text: 'Please log in to search for advisors.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4CAF50', // Green color for confirm button
                    cancelButtonColor: '#f44336', // Red color for cancel button
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to login page
                        window.location.href = '{{ route('login') }}';
                    }
                });
            @endif
        });
    });
</script>

@endsection
