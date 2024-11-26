@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')

        <form action="{{ route('category.detail', ['categoryName' => $category->name]) }}" method="GET">
            <div
                class="flex flex-col lg:flex-row gap-[15px] lg:gap-[25px] mt-[10px] lg:mt-[20px] w-[90%] md:w-[95%] lg:w-[90%] mx-auto">
                <div class="flex gap-[26px] w-full lg:w-[30%]">
                    <div class="w-full">
                        <span class="font-[500] lg:flex text-[16px]">
                            Home / Categories / <span class="font-[600]"> {{ $category->name }}</span></span>
                        <h2 class="font-[500] text-[16px] lg:flex lg:mt-[45px]">
                            Find Advisors in:
                        </h2>
                        <div class="flex flex-row gap-[12px] lg:gap-0 lg:flex-col mt-[4px] lg:mt-[0px] items-center w-full">
                            <!-- Filter form -->
                            <div class="w-full lg:mt-[12px] mx-auto">
                                <div class="w-full bg-[#FFF6F6] drop-shadow-lg p-6 rounded-[12px]">
                                    <!-- Mobile: Horizontal Swiping with Flex | Web: 2 Columns with Improved Spacing -->
                                    <div class="flex space-x-4 overflow-x-auto md:grid md:grid-cols-2 md:gap-6 md:overflow-visible"
                                        style="justify-items: end;">
                                        @foreach ($otherCategories as $otherCategory)
                                            <a href="{{ route('category.detail', $otherCategory->name) }}"
                                                class="flex-none w-[120px] h-[120px] shadow-lg group flex flex-col items-center justify-center gap-2 rounded-lg transition-colors
                                                      {{ $category->name === $otherCategory->name ? 'bg-[#FF3131]' : 'bg-[#5D8D05] hover:bg-[#FF3131]' }} focus:outline-none focus:ring md:w-full">

                                                <!-- Optional Icon Placeholder -->
                                                <div class="w-[34px] h-[35px]" data-category="{{ $otherCategory->name }}">
                                                </div>

                                                <!-- Category Name -->
                                                <h2
                                                    class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500 text-center">
                                                    {{ $otherCategory->name }}
                                                </h2>
                                            </a>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div class="lg:w-[90%] mx-auto w-full">
                    <!-- serach box  for lg screen-->
                    <div
                        class="lg:flex hidden p-3 mx-auto bg-white border border-[#EAEAEA] rounded-[50px] justify-between w-[80%] relative">
                        <input name="search" id="search-bar" class="bg-white rounded-[50px] w-full px-4"
                            placeholder="Search Advisor" type="text" autocomplete="off" />
                        <button type="submit"
                            class="flex items-center w-[300px] bg-[#EDF6DB] px-[32px] rounded-[40px] py-[8px] gap-5">
                            <i class="fa-solid fa-magnifying-glass" style="color: #000000"></i>
                            <p>Find Advisor</p>
                        </button>

                        <!-- Suggestions Dropdown -->
                        <div id="suggestions-dropdown" class="absolute hidden w-full mt-2 bg-white rounded-lg shadow-lg">
                        </div>
                    </div>
                    <div class="flex flex-col mt-[0px] lg:mt-[5px] gap-5">
                        <!-- 1st row for Advisors -->
                        @if ($advisors->isEmpty())
                            <div class="flex flex-col items-center justify-center h-64">
                                <svg viewBox="0 0 24 24" height="200px" width="200px" version="1.1"
                                    class="w-24 h-24 mb-4 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M7.24 2H5.34C3.15 2 2 3.15 2 5.33V7.23C2 9.41 3.15 10.56 5.33 10.56H7.23C9.41 10.56 10.56 9.41 10.56 7.23V5.33C10.57 3.15 9.42 2 7.24 2Z"
                                            fill="#292D32"></path>
                                        <path opacity="0.4"
                                            d="M18.6695 2H16.7695C14.5895 2 13.4395 3.15 13.4395 5.33V7.23C13.4395 9.41 14.5895 10.56 16.7695 10.56H18.6695C20.8495 10.56 21.9995 9.41 21.9995 7.23V5.33C21.9995 3.15 20.8495 2 18.6695 2Z"
                                            fill="#292D32"></path>
                                        <path
                                            d="M18.6695 13.4302H16.7695C14.5895 13.4302 13.4395 14.5802 13.4395 16.7602V18.6602C13.4395 20.8402 14.5895 21.9902 16.7695 21.9902H18.6695C20.8495 21.9902 21.9995 20.8402 21.9995 18.6602V16.7602C21.9995 14.5802 20.8495 13.4302 18.6695 13.4302Z"
                                            fill="#292D32"></path>
                                        <path opacity="0.4"
                                            d="M7.24 13.4302H5.34C3.15 13.4302 2 14.5802 2 16.7602V18.6602C2 20.8502 3.15 22.0002 5.33 22.0002H7.23C9.41 22.0002 10.56 20.8502 10.56 18.6702V16.7702C10.57 14.5802 9.42 13.4302 7.24 13.4302Z"
                                            fill="#292D32"></path>
                                    </g>
                                </svg>

                                <h1 class="text-2xl font-bold text-center text-gray-600">
                                    No advisors found matching in your
                                    @if (isset($category))
                                        category : <span class="text-red-500">{{ $category->name }}</span>
                                    @endif
                                </h1>
                            </div>
                        @else
                            @foreach ($advisors->chunk(2) as $chunk)
                                <div class="w-full flex flex-wrap lg:flex-nowrap gap-[35px]">
                                    <!-- 1st  -->
                                    @foreach ($chunk as $advisor)
                                        <div
                                            class="flex w-full xl:w-[50%] justify-between border hover:border-red-500 shadow-xl rounded-[20px] shadow-[#00000026] flex-col">

                                            <a href="{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}">



                                                <div
                                                    class="bg-[#FFFACA] py-2 rounded-tl-[20px] rounded-tr-[20px] px-2 flex justify-between">
                                                    <p class="text-[12px] font-[500] text-[#B58300]">
                                                        {{ $advisor->is_super_advisor == 'true' ? 'Super Advisor' : 'Advisor' }}
                                                    </p>
                                                    <div class="flex items-center gap-1">
                                                        <i class="fa-solid fa-circle fa-sm"
                                                            style="color: {{ $advisor->isAvailableToday ? '#6a9023' : '#e3342f' }}"></i>
                                                        <p class="text-[12px] font-[600]"
                                                            style="color: {{ $advisor->isAvailableToday ? '#6a9023' : '#e3342f' }}">
                                                            {{ $advisor->isAvailableToday ? 'Available' : 'Not Available' }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="px-4 pb-3 mt-4 sm:mt-4">
                                                    <!-- Profile Info -->
                                                    <div
                                                        class="flex flex-col sm:flex-row items-center sm:items-start justify-center w-full gap-4 sm:gap-16 lg:gap-8">
                                                        <!-- Avatar -->
                                                        <div
                                                            class="flex w-full justify-around flex-row  sm:flex-col items-center sm:items-start gap-4 sm:justify-normal sm:w-auto">

                                                            <!-- Name (Visible at the top for desktop, inline for mobile) -->
                                                            <h2
                                                                class="text-xl hidden sm:block font-semibold text-gray-800 mb-4">
                                                                @if (Auth::check())
                                                                    {{ $advisor->full_name }}
                                                                @else
                                                                    {{ $advisor->user_id }}
                                                                @endif
                                                            </h2>


                                                            <!-- Image -->
                                                            <img class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover border-2 border-gray-200"
                                                                src="{{ $advisor->profile_photo_path ? asset('storage/' . $advisor->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                                                alt="{{ $advisor->full_name }}" />

                                                            <!-- Text Content -->
                                                            <div
                                                                class="flex flex-col items-center sm:items-start text-center sm:text-left">
                                                                <!-- Name (Visible at the top for desktop, inline for mobile) -->
                                                                <h2
                                                                    class="text-xl sm:hidden font-semibold text-gray-800 mb-4">
                                                                    @if (Auth::check())
                                                                        {{ $advisor->full_name }}
                                                                    @else
                                                                        {{ $advisor->user_id }}
                                                                    @endif
                                                                </h2>

                                                                <!-- Rating -->
                                                                {{-- <div class="flex items-center mb-2">
                                                            <span class="text-yellow-500 text-sm">★</span>
                                                            <span class="ml-1 text-sm font-semibold text-gray-800">4.9</span>
                                                        </div> --}}



                                                                @if ($advisor->average_review_score !== null)
                                                                    <div class="flex items-start mb-2 w-full">
                                                                        <span class="text-yellow-500 text-sm">★</span>
                                                                        <span
                                                                            class="ml-1 text-sm font-semibold text-gray-800">{{ number_format($advisor->average_review_score, 1) }}</span>
                                                                    </div>
                                                                @endif

                                                                <!-- Additional Info -->
                                                                <div class="flex flex-col gap-2">
                                                                    <!-- Language -->
                                                                    <div class="flex items-center gap-1">
                                                                        <img class="w-5 h-5"
                                                                            src="../src/assets/icons/hindi.png"
                                                                            alt="Language Icon" />
                                                                        {{-- <p class="text-sm font-medium text-gray-700">
                                                                            {{ $advisor->language_known ?? 'N/A' }}
                                                                        </p> --}}

                                                                        <p class="text-sm font-medium text-gray-700">
                                                                            English,hindi
                                                                        </p>
                                                                    </div>

                                                                    <!-- Price -->
                                                                    <div class="flex items-center gap-1">
                                                                        <img class="w-5 h-5"
                                                                            src="../src/assets/icons/33.png"
                                                                            alt="Price Icon" />
                                                                        <p class="text-sm font-medium text-gray-700">
                                                                            {{ $advisor->conference_call_price_per_minute ?? 'N/A' }}/min
                                                                        </p>
                                                                    </div>

                                                                    <!-- Location -->
                                                                    <div class="flex items-center gap-1">
                                                                        <img class="w-5 h-5"
                                                                            src="../src/assets/icons/location.png"
                                                                            alt="Location Icon" />
                                                                        <p class="text-sm font-medium text-gray-700">
                                                                            {{ $advisor->location }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Name and Details -->
                                                        <div
                                                            class="w-full sm:w-auto flex flex-col items-center sm:items-start sm:justify-between">
                                                            {{-- <h2
                                                        class="text-xl font-semibold text-gray-800 sm:opacity-0 mb-4 sm:mb-0">
                                                        {{ $advisor->full_name }}
                                                    </h2> --}}

                                                            <!-- Business Information -->
                                                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">
                                                                <!-- Business Function -->
                                                                <div class="col-span-3">
                                                                    <p class="font-semibold text-gray-700">Business
                                                                        Function:</p>
                                                                    <p
                                                                        class="text-sm mt-1 flex gap-2 flex-wrap text-gray-600">
                                                                        @if ($advisor->businessFunctionCategory)
                                                                            <span
                                                                                class="bg-red-100 border border-red-300 rounded-md px-2 py-1">
                                                                                {{ $advisor->businessFunctionCategory->name }}
                                                                            </span>
                                                                        @endif
                                                                    </p>
                                                                </div>

                                                                <!-- Sub Business Function -->
                                                                <div class="col-span-3">
                                                                    <p class="font-semibold text-gray-700">Sub Business
                                                                        Function:</p>
                                                                    <p
                                                                        class="text-sm mt-1 flex gap-2 flex-wrap text-gray-600">
                                                                        @if ($advisor->subFunctionCategory1)
                                                                            <span
                                                                                class="bg-red-100 border border-red-300 rounded-md px-2 py-1">
                                                                                {{ $advisor->subFunctionCategory1->name }}
                                                                            </span>
                                                                        @endif
                                                                        @if ($advisor->subFunctionCategory2)
                                                                            <span
                                                                                class="bg-red-100 border border-red-300 rounded-md px-2 py-1">
                                                                                {{ $advisor->subFunctionCategory2->name }}
                                                                            </span>
                                                                        @endif
                                                                    </p>
                                                                </div>

                                                                <!-- Industry -->
                                                                <div class="col-span-3">
                                                                    <p class="font-semibold text-gray-700">Industry:</p>
                                                                    <p
                                                                        class="text-sm mt-1 flex gap-2 flex-wrap text-gray-600">
                                                                        @foreach ($advisor->getIndustries() as $industry)
                                                                            <span
                                                                                class="bg-red-100 border border-red-300 rounded-md px-2 py-1">
                                                                                {{ $industry->name }}
                                                                            </span>
                                                                            @if (!$loop->last)
                                                                                <span
                                                                                    class="hidden md:inline-block">&nbsp;•&nbsp;</span>
                                                                            @endif
                                                                        @endforeach
                                                                    </p>
                                                                </div>

                                                                <!-- Geography -->
                                                                <div class="col-span-3">
                                                                    <p class="font-semibold text-gray-700">Geography:</p>
                                                                    <p
                                                                        class="text-sm mt-1 flex gap-2 flex-wrap text-gray-600">
                                                                        @foreach ($advisor->getGeographies() as $geography)
                                                                            <span
                                                                                class="bg-red-100 border border-red-300 rounded-md px-2 py-1">
                                                                                {{ $geography->name }}
                                                                            </span>
                                                                            @if (!$loop->last)
                                                                                <span
                                                                                    class="hidden md:inline-block">&nbsp;•&nbsp;</span>
                                                                            @endif
                                                                        @endforeach
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Industry and Business Function -->

                                                    <!-- Action Buttons -->
                                                    {{-- <div
                                                class="grid flex-col items-start grid-cols-2 gap-2 mt-6 sm:flex sm:flex-row md:items-center md:justify-center">
                                                <button onclick="handleDiscoveryCall('{{ $advisor->user_id }}')"
                                                    class="bg-[#6a9023] w-[155px] sm:w-auto text-white px-4 py-2 rounded-md hover:bg-green-600">
                                                    Discovery call
                                                </button>
                                                <button
                                                    onclick="handleConsultationCall('{{ $advisor->user_id }}')"
                                                    class="bg-[#ff3131] w-[155px] sm:w-auto text-white px-4 py-2 rounded-md hover:bg-orange-600">
                                                    Consultation call
                                                </button>
                                                {{-- <button onclick="openBookingModal(event, 'appointmentModal-{{ $advisor->user_id }}')"
                                                    class="bg-red-500 w-[155px] sm:w-auto text-white px-4 py-2 rounded-md hover:bg-red-600">
                                                    Book Appointment
                                                </button> --}}
                                                    {{-- <button
                                                    onclick="showBookingAlert(event, '{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}')"
                                                    class="bg-[#C95555] w-[155px] sm:w-auto text-white px-4 py-2 rounded-md hover:bg-red-600">
                                                    Book Appointment
                                                </button> --}}


                                                    {{-- <div
                                                class="flex flex-col items-start gap-2 mt-6 sm:flex-row md:items-center md:justify-center">

                                                <button onclick="handleDiscoveryCall('{{ $advisor->user_id }}')"
                                                    class="bg-[#6a9023] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-green-600">
                                                    Discovery call
                                                </button>

                                                <button
                                                    onclick="handleConsultationCall('{{ $advisor->user_id }}')"
                                                    class="bg-[#ff3131] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-orange-600">
                                                    Consultation call
                                                </button>

                                                <button
                                                    onclick="showBookingAlert(event, '{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}')"
                                                    class="bg-[#C95555] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-red-600">
                                                    Book Appointment
                                                </button> --}}




                                                    {{-- <div id="appointmentModal"
                                                class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-600 bg-opacity-50">
                                                <div class="relative p-6 bg-white rounded-lg shadow-lg w-96">
                                                    <h2 class="mb-4 text-lg font-bold">Book Appointment with
                                                        {{ $advisor->user_id }}
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
                                                    {{-- <div id="timeSlots" class="time-slots">
                                                        @foreach ($advisorAvailabilities as $availability)
                                                            <div data-day="{{ $availability->day }}"
                                                                class="hidden slot">
                                                                <button id="slot-{{ $availability->time_slot }}"
                                                                    class="w-full px-4 py-2 mb-2 text-center text-gray-700 bg-gray-200 rounded-lg slot-button"
                                                                    onclick="selectSlot('{{ $availability->advisor_nomination_id }}', '{{ $availability->day }}', '{{ $availability->time_slot }}')">
                                                                    {{ $availability->time_slot }}
                                                                </button>

                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- Time Slots for Selected Day -->
                                                    <div id="timeSlots" class="time-slots">
                                                        @foreach ($advisorAvailabilities as $availability)
                                                            @if (!empty($availability->day))
                                                                <!-- Check if day exists -->
                                                                <div data-day="{{ $availability->day }}"
                                                                    class="hidden slot">
                                                                    <button
                                                                        id="slot-{{ $availability->time_slot }}"
                                                                        class="w-full px-4 py-2 mb-2 text-center text-gray-700 bg-gray-200 rounded-lg slot-button"
                                                                        onclick="selectSlot('{{ $availability->advisor_nomination_id }}', '{{ $availability->day }}', '{{ $availability->time_slot }}')">
                                                                        {{ $availability->time_slot }}
                                                                    </button>
                                                                </div>
                                                            @endif
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
                                                    {{-- <!-- Modal for this advisor -->
                                                <div id="appointmentModal-{{ $advisor->user_id }}"
                                                    class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-600 bg-opacity-50">
                                                    <div class="relative p-6 bg-white rounded-lg shadow-lg w-96">
                                                        <h2 class="mb-4 text-lg font-bold">Book Appointment with
                                                            {{ $advisor->user_id }}</h2>

                                                        <!-- Tabs for each day with dates -->
                                                        <div class="flex mb-4 space-x-2 overflow-x-auto tabs">
                                                            @foreach ($upcomingDays as $day)
                                                                <button
                                                                    class="px-4 py-2 text-white bg-blue-500 rounded-lg tab-button"
                                                                    data-day-index="{{ $loop->index }}"
                                                                    data-day="{{ $day['day'] }}"
                                                                    data-date="{{ $day['date'] }}"
                                                                    onclick="selectDay(event, '{{ $advisor->user_id }}', '{{ $loop->index }}', '{{ $day['day'] }}', '{{ $day['date'] }}')">
                                                                    {{ $day['day'] }}<br>{{ $day['date'] }}
                                                                </button>
                                                            @endforeach
                                                        </div>

                                                        <!-- Time Slots for Selected Day -->
                                                        <div id="timeSlots" class="time-slots">
                                                            @foreach ($advisorAvailabilities as $availability)
                                                                <div data-day="{{ $availability->day }}"
                                                                    class="hidden slot">
                                                                    <button
                                                                        id="slot-{{ $advisor->user_id }}-{{ $availability->time_slot }}"
                                                                        class="w-full px-4 py-2 mb-2 text-center text-gray-700 bg-gray-200 rounded-lg slot-button"
                                                                        onclick="selectSlot(event, '{{ $advisor->user_id }}','{{ $availability->advisor_nomination_id }}', '{{ $availability->day }}', '{{ $availability->time_slot }}')">
                                                                        {{ $availability->time_slot }}
                                                                    </button>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <!-- Confirm Appointment Button -->
                                                        <button id="confirmAppointment"
                                                            class="hidden w-full p-2 mt-4 text-white bg-green-500 rounded"
                                                            onclick="confirmBooking('{{ $advisor->user_id }}')">
                                                            Confirm Appointment
                                                        </button>

                                                        <!-- Close Button -->
                                                        <button
                                                            class="w-full p-2 mt-4 text-white bg-red-500 rounded"
                                                            onclick="closeBookingModal(event)">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div> --}}





                                                </div>

                                            </a>


                                            <div
                                                class="flex flex-col items-start gap-2 mt-6 p-4 sm:flex-row md:items-center md:justify-center">

                                                <button onclick="handleDiscoveryCall('{{ $advisor->user_id }}')"
                                                    class="bg-[#6a9023] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-green-600">
                                                    Discovery call
                                                </button>

                                                <button onclick="handleConsultationCall('{{ $advisor->user_id }}')"
                                                    class="bg-[#ff3131] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-orange-600">
                                                    Consultation call
                                                </button>

                                                <button
                                                    onclick="showBookingAlert(event, '{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}')"
                                                    class="bg-[#C95555] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-red-600">
                                                    Book Appointment
                                                </button>

                                                
                                                <button id="notifyButton" type="button"
                                                data-route="{{ route('notify.advisor', $advisor->user_id) }}"
                                                data-advisor-id="{{ $advisor->user_id }}"
                                                class="w-full sm:w-auto text-[#c95555] px-4 py-2 rounded-md border border-black hover:border-gray hover:bg-red-600 hover:text-white">
                                                <i class="fa-regular fa-bell fa-xs"></i>
                                                Notify me
                                            </button>



                                                {{-- <!-- Notify Me -->
                                                <div
                                                    class="flex items-center justify-center flex-col bg-transparent w-full border border-black sm:w-auto text-white px-4 py-[10px] rounded-md gap-[4px] hover:bg-red-600 hover:text-white">
                                                    <div class="flex items-center gap-1">
                                                        <i class="fa-regular fa-bell fa-xs" style="color: #c95555"></i>
                                                        <p class="text-[12px] font-[500] text-[#C95555]">
                                                            Notify me
                                                        </p>
                                                    </div>
                                                </div> --}}
                                            </div>



                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <hr class="mb-[150px]">
                    </hr>
                </div>
            </div>
        </form>
        <!-- bottom menu bar -->
        @include('web.components.bottommenu')

        <!-- side bar -->
        @include('web.components.sidebar')

        @include('web.components.footer')
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all the notify buttons
            document.querySelectorAll('#notifyButton').forEach(button => {
                button.addEventListener('click', async function (event) {
                    event.preventDefault(); // Prevent any default action
    
                    // Check if the user is logged in
                    const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }}; // Authentication check
    
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
                                window.location.href = "{{ route('login') }}"; // Redirect to login
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
                            body: JSON.stringify({ advisorId: advisorId }) // Send the advisor ID
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconDivs = document.querySelectorAll('[data-category]');

            iconDivs.forEach(function(div) {
                const categoryName = div.getAttribute('data-category');
                div.innerHTML = getCategorySVGIcon(categoryName);
            });
        });

        function getCategorySVGIcon(categoryName) {
            switch (categoryName) {
                case 'AI & Analytics':
                    return `
            <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>ai</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="icon" fill="#fff" transform="translate(64.000000, 64.000000)"> <path d="M320,64 L320,320 L64,320 L64,64 L320,64 Z M171.749388,128 L146.817842,128 L99.4840387,256 L121.976629,256 L130.913039,230.977 L187.575039,230.977 L196.319607,256 L220.167172,256 L171.749388,128 Z M260.093778,128 L237.691519,128 L237.691519,256 L260.093778,256 L260.093778,128 Z M159.094727,149.47526 L181.409039,213.333 L137.135039,213.333 L159.094727,149.47526 Z M341.333333,256 L384,256 L384,298.666667 L341.333333,298.666667 L341.333333,256 Z M85.3333333,341.333333 L128,341.333333 L128,384 L85.3333333,384 L85.3333333,341.333333 Z M170.666667,341.333333 L213.333333,341.333333 L213.333333,384 L170.666667,384 L170.666667,341.333333 Z M85.3333333,0 L128,0 L128,42.6666667 L85.3333333,42.6666667 L85.3333333,0 Z M256,341.333333 L298.666667,341.333333 L298.666667,384 L256,384 L256,341.333333 Z M170.666667,0 L213.333333,0 L213.333333,42.6666667 L170.666667,42.6666667 L170.666667,0 Z M256,0 L298.666667,0 L298.666667,42.6666667 L256,42.6666667 L256,0 Z M341.333333,170.666667 L384,170.666667 L384,213.333333 L341.333333,213.333333 L341.333333,170.666667 Z M0,256 L42.6666667,256 L42.6666667,298.666667 L0,298.666667 L0,256 Z M341.333333,85.3333333 L384,85.3333333 L384,128 L341.333333,128 L341.333333,85.3333333 Z M0,170.666667 L42.6666667,170.666667 L42.6666667,213.333333 L0,213.333333 L0,170.666667 Z M0,85.3333333 L42.6666667,85.3333333 L42.6666667,128 L0,128 L0,85.3333333 Z" id="Combined-Shape"> </path> </g> </g> </g></svg>`;
                case 'Business Growth':
                    return `
            <svg fill="white" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" stroke="white"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g data-name="10. Growth" id="_10._Growth"> <path d="M17,12.05V11h3a5,5,0,0,0,5-5V4a1,1,0,0,0-1-1H20a4.92,4.92,0,0,0-3,1V1a1,1,0,0,0-2,0V2a4.92,4.92,0,0,0-3-1H8A1,1,0,0,0,7,2V4a5,5,0,0,0,5,5h3v3.05a10,10,0,1,0,2,0Zm3-7h3V6a3,3,0,0,1-3,3H17V8A3,3,0,0,1,20,5ZM9,4V3h3a3,3,0,0,1,3,3V7H12A3,3,0,0,1,9,4Zm7,26a8,8,0,1,1,8-8A8,8,0,0,1,16,30Z"></path> <path d="M16,19h2a1,1,0,0,0,0-2H17a1,1,0,0,0-2,0v.18A3,3,0,0,0,16,23a1,1,0,0,1,0,2H14a1,1,0,0,0,0,2h1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,16,21a1,1,0,0,1,0-2Z"></path> <path d="M5.71,7.29l-2-2a1,1,0,0,0-1.42,0l-2,2A1,1,0,0,0,1.71,8.71L2,8.41V11a1,1,0,0,0,2,0V8.41l.29.3a1,1,0,0,0,1.42,0A1,1,0,0,0,5.71,7.29Z"></path> <path d="M31.71,13.29l-2-2a1,1,0,0,0-1.42,0l-2,2a1,1,0,0,0,1.42,1.42l.29-.3V17a1,1,0,0,0,2,0V14.41l.29.3a1,1,0,0,0,1.42,0A1,1,0,0,0,31.71,13.29Z"></path> </g> </g></svg>`;
                case 'Business Legal':
                    return `
            <svg fill="white" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 240" enable-background="new 0 0 256 240" xml:space="preserve" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M84.635,20.256c18.383,0,33.286,14.903,33.286,33.286s-14.903,33.286-33.286,33.286S51.349,71.925,51.349,53.542 S66.251,20.256,84.635,20.256z M31.002,145.011c0-2.499,1.606-4.194,4.194-4.194s4.194,1.606,4.194,4.194v92.986h91.469v-92.986 c0-2.499,1.606-4.194,4.194-4.194c2.499,0,4.194,1.606,4.194,4.194v92.986h29.092V136.623c0-22.934-18.74-41.585-41.585-41.585 h-8.388l-24.451,38.015l-2.945-28.467l4.016-9.638H76.96l4.016,9.638l-3.123,28.645L53.401,95.038h-9.816 C20.651,95.038,2,113.778,2,136.623v101.375h29.092v-92.986H31.002z M252.133,57.498L238.15,10.946h-31.918V5.17 c0-1.563-1.563-3.17-3.17-3.17c-1.563,0-3.17,1.563-3.17,3.17v5.819h-31.918l-13.983,46.509h-0.304h-1.563 c0,10.552,8.555,19.151,19.151,19.151s19.151-8.555,19.151-19.151h-1.824h-0.304l-13.201-43.643h25.057v67.918h-24.796V91.5h3.17 h24.535h24.535h3.17v-9.727h-24.796V13.855h25.057l-13.201,43.643h-0.304h-1.824c0,10.552,8.555,19.151,19.151,19.151 S254,68.094,254,57.498h-1.563L252.133,57.498L252.133,57.498z M183.955,57.498h-25.361l12.55-42.34L183.955,57.498z M222.169,57.498l12.811-42.34l12.55,42.34H222.169z"></path> </g></svg>`;
                case 'IT Infrastructure':
                    return `
            <svg fill="white" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="it--infrastructure-software_1_" d="M22.5,4.5C22.5,4.776,22.276,5,22,5s-0.5-0.224-0.5-0.5S21.724,4,22,4 S22.5,4.224,22.5,4.5z M20,4c-0.276,0-0.5,0.224-0.5,0.5S19.724,5,20,5s0.5-0.224,0.5-0.5S20.276,4,20,4z M18,4 c-0.276,0-0.5,0.224-0.5,0.5S17.724,5,18,5s0.5-0.224,0.5-0.5S18.276,4,18,4z M30,29.36h-8c-0.199,0-0.36-0.161-0.36-0.36v-4 c0-0.199,0.161-0.36,0.36-0.36h3.64v-3.28h-9.28v3.279H20c0.199,0,0.36,0.161,0.36,0.36v4c0,0.199-0.161,0.36-0.36,0.36h-8 c-0.199,0-0.36-0.161-0.36-0.36v-4c0-0.199,0.161-0.36,0.36-0.36h3.64V21.36H6.36v3.279H10c0.199,0,0.36,0.161,0.36,0.36v4 c0,0.199-0.161,0.36-0.36,0.36H2c-0.199,0-0.36-0.161-0.36-0.36v-4c0-0.199,0.161-0.36,0.36-0.36h3.64V21 c0-0.199,0.161-0.36,0.36-0.36h9.64v-4.28H8c-0.199,0-0.36-0.161-0.36-0.36V3c0-0.199,0.161-0.36,0.36-0.36h16 c0.199,0,0.36,0.161,0.36,0.36v13c0,0.199-0.161,0.36-0.36,0.36h-7.64v4.28H26c0.199,0,0.36,0.161,0.36,0.36v3.64H30 c0.199,0,0.36,0.161,0.36,0.36v4C30.36,29.199,30.199,29.36,30,29.36z M22.36,28.64h7.279v-3.28H22.36V28.64z M12.36,28.64h7.28 v-3.28h-7.28C12.36,25.36,12.36,28.64,12.36,28.64z M2.36,28.64h7.28v-3.28H2.36V28.64z M8.36,15.64h15.28V6.36H8.36V15.64z M8.36,5.64h15.28V3.36H8.36V5.64z M25,27.36h-2v-0.72h2V27.36z M15,27.36h-2v-0.72h2V27.36z M5,27.36H3v-0.72h2V27.36z"></path> <rect id="_Transparent_Rectangle" style="fill:none;" width="32" height="32"></rect> </g></svg>`;
                case 'Digital Platforms':
                    return `
            <svg viewBox="0 0 1024 1024" fill="white" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M296.542 160.114c-4.414 0-8.076-3.576-8.076-7.998s3.498-7.998 7.918-7.998h0.156c4.42 0 7.998 3.576 7.998 7.998s-3.574 7.998-7.996 7.998zM328.532 160.114c-4.412 0-8.074-3.576-8.074-7.998s3.498-7.998 7.918-7.998h0.156c4.422 0 7.998 3.576 7.998 7.998s-3.576 7.998-7.998 7.998zM360.522 160.114c-4.412 0-8.076-3.576-8.076-7.998s3.5-7.998 7.918-7.998h0.156c4.422 0 7.998 3.576 7.998 7.998s-3.574 7.998-7.996 7.998z" fill=""></path><path d="M775.918 176.11H264.076a7.994 7.994 0 0 1-7.998-7.998v-15.996c0-13.23 10.762-23.994 23.992-23.994h479.854c13.23 0 23.992 10.764 23.992 23.994v15.996a7.992 7.992 0 0 1-7.998 7.998z m-503.844-15.996h495.848v-7.998a8.008 8.008 0 0 0-7.996-7.998H280.072a8.004 8.004 0 0 0-7.998 7.998v7.998z" fill=""></path><path d="M775.918 512.006H264.076a7.994 7.994 0 0 1-7.998-7.998V168.112a7.994 7.994 0 0 1 7.998-7.998h511.842c4.422 0 8 3.578 8 7.998v335.896a7.994 7.994 0 0 1-8 7.998z m-503.844-15.994h495.848V176.11H272.074v319.902z" fill=""></path><path d="M743.93 304.072H296.066a7.994 7.994 0 0 1-7.998-7.998v-95.97a7.994 7.994 0 0 1 7.998-7.998h447.864a7.992 7.992 0 0 1 7.996 7.998v95.97a7.992 7.992 0 0 1-7.996 7.998z m-439.866-15.996h431.87V208.1H304.064v79.976z" fill=""></path><path d="M695.946 256.084H344.052c-4.42 0-7.998-3.576-7.998-7.998s3.578-7.998 7.998-7.998h351.894c4.418 0 7.996 3.576 7.996 7.998s-3.578 7.998-7.996 7.998zM743.93 352.056H535.992c-4.418 0-7.996-3.576-7.996-7.998s3.578-7.998 7.996-7.998h207.938c4.422 0 7.996 3.576 7.996 7.998s-3.574 7.998-7.996 7.998zM743.93 384.046H535.992c-4.418 0-7.996-3.576-7.996-7.998s3.578-7.998 7.996-7.998h207.938c4.422 0 7.996 3.576 7.996 7.998s-3.574 7.998-7.996 7.998zM743.93 416.036H535.992c-4.418 0-7.996-3.576-7.996-7.998s3.578-7.998 7.996-7.998h207.938c4.422 0 7.996 3.576 7.996 7.998s-3.574 7.998-7.996 7.998zM639.96 448.026h-103.968a7.992 7.992 0 0 1-7.996-7.998 7.994 7.994 0 0 1 7.996-7.998h103.968a7.992 7.992 0 0 1 7.996 7.998 7.988 7.988 0 0 1-7.996 7.998zM504.002 480.016H296.066a7.994 7.994 0 0 1-7.998-7.998v-143.956a7.994 7.994 0 0 1 7.998-7.998h207.936a7.994 7.994 0 0 1 7.998 7.998v143.956a7.994 7.994 0 0 1-7.998 7.998z m-199.938-15.994h191.942v-127.96h-191.942v127.96z" fill=""></path><path d="M488.014 480.016a7.988 7.988 0 0 1-6.864-3.88l-41.128-68.55-41.128 68.55a7.992 7.992 0 0 1-10.972 2.74 7.996 7.996 0 0 1-2.742-10.972l47.986-79.976c2.89-4.812 10.824-4.812 13.714 0l47.984 79.976a7.996 7.996 0 0 1-6.85 12.112z" fill=""></path><path d="M344.044 480.016a7.988 7.988 0 0 1-4.428-1.344 7.988 7.988 0 0 1-2.218-11.09l31.99-47.986c2.968-4.452 10.34-4.452 13.308 0l24.25 36.364a7.992 7.992 0 0 1-2.218 11.09 8.008 8.008 0 0 1-11.09-2.218l-17.596-26.382-25.336 38.004a7.988 7.988 0 0 1-6.662 3.562z" fill=""></path><path d="M344.052 400.042c-13.23 0-23.992-10.764-23.992-23.994s10.762-23.994 23.992-23.994 23.992 10.762 23.992 23.994c0 13.23-10.762 23.994-23.992 23.994z m0-31.99c-4.412 0-7.998 3.584-7.998 7.998s3.586 7.998 7.998 7.998 7.998-3.584 7.998-7.998-3.586-7.998-7.998-7.998z" fill=""></path><path d="M48.618 751.942c-4.412 0-8.076-3.576-8.076-7.996 0-4.422 3.5-7.998 7.918-7.998h0.156a7.992 7.992 0 0 1 7.998 7.998 7.988 7.988 0 0 1-7.996 7.996zM80.608 751.942c-4.412 0-8.076-3.576-8.076-7.996 0-4.422 3.5-7.998 7.918-7.998h0.156a7.994 7.994 0 0 1 7.998 7.998 7.988 7.988 0 0 1-7.996 7.996zM112.598 751.942c-4.412 0-8.076-3.576-8.076-7.996 0-4.422 3.5-7.998 7.918-7.998h0.156a7.994 7.994 0 0 1 7.998 7.998 7.988 7.988 0 0 1-7.996 7.996z" fill=""></path><path d="M280.072 767.938H8.156a7.994 7.994 0 0 1-7.998-7.998v-15.994c0-13.23 10.762-23.992 23.992-23.992h239.926c13.23 0 23.994 10.762 23.994 23.992v15.994a7.994 7.994 0 0 1-7.998 7.998z m-263.92-15.996h255.92v-7.996a7.996 7.996 0 0 0-7.998-7.998H24.15a8 8 0 0 0-7.998 7.998v7.996z" fill=""></path><path d="M280.072 959.878H8.156a7.994 7.994 0 0 1-7.998-7.998v-191.94a7.994 7.994 0 0 1 7.998-7.998h271.916a7.994 7.994 0 0 1 7.998 7.998v191.942a7.994 7.994 0 0 1-7.998 7.996z m-263.92-15.996h255.92v-175.946H16.152v175.946z" fill=""></path><path d="M248.082 847.912H40.146a7.992 7.992 0 0 1-7.998-7.998v-47.984a7.994 7.994 0 0 1 7.998-7.998h207.936a7.994 7.994 0 0 1 7.998 7.998v47.984a7.994 7.994 0 0 1-7.998 7.998z m-199.94-15.994h191.94v-31.99h-191.94v31.99zM128.118 927.888H40.146a7.994 7.994 0 0 1-7.998-7.998v-47.984a7.992 7.992 0 0 1 7.998-7.998h87.972a7.994 7.994 0 0 1 7.998 7.998v47.984a7.994 7.994 0 0 1-7.998 7.998z m-79.976-15.996H120.12v-31.99H48.142v31.99zM248.082 879.902H160.108a7.992 7.992 0 0 1-7.998-7.996 7.994 7.994 0 0 1 7.998-7.998h87.972a7.994 7.994 0 0 1 7.998 7.998 7.99 7.99 0 0 1-7.996 7.996z" fill=""></path><path d="M248.082 911.892H160.108a7.994 7.994 0 0 1-7.998-7.998 7.992 7.992 0 0 1 7.998-7.996h87.972a7.992 7.992 0 0 1 7.998 7.996 7.992 7.992 0 0 1-7.996 7.998z" fill=""></path><path d="M784.386 751.942c-4.406 0-8.062-3.576-8.062-7.996 0-4.422 3.5-7.998 7.906-7.998h0.156a7.982 7.982 0 0 1 7.996 7.998 7.982 7.982 0 0 1-7.996 7.996zM816.376 751.942c-4.402 0-8.058-3.576-8.058-7.996 0-4.422 3.5-7.998 7.902-7.998h0.156c4.438 0 8 3.576 8 7.998a7.984 7.984 0 0 1-8 7.996zM848.368 751.942c-4.406 0-8.062-3.576-8.062-7.996 0-4.422 3.5-7.998 7.906-7.998h0.156a7.982 7.982 0 0 1 7.996 7.998 7.984 7.984 0 0 1-7.996 7.996z" fill=""></path><path d="M1015.848 767.938H743.93a7.992 7.992 0 0 1-7.996-7.998v-15.994c0-13.23 10.762-23.992 23.992-23.992h239.926c13.23 0 23.992 10.762 23.992 23.992v15.994a7.994 7.994 0 0 1-7.996 7.998z m-263.922-15.996h255.922v-7.996a8.002 8.002 0 0 0-7.996-7.998H759.926c-4.406 0-8 3.576-8 7.998v7.996z" fill=""></path><path d="M1015.848 959.878H743.93a7.992 7.992 0 0 1-7.996-7.998v-191.94a7.992 7.992 0 0 1 7.996-7.998h271.918a7.994 7.994 0 0 1 7.996 7.998v191.942a7.994 7.994 0 0 1-7.996 7.996z m-263.922-15.996h255.922v-175.946H751.926v175.946z" fill=""></path><path d="M983.856 847.912H775.918a7.992 7.992 0 0 1-7.996-7.998v-47.984a7.994 7.994 0 0 1 7.996-7.998h207.938a7.992 7.992 0 0 1 7.996 7.998v47.984a7.99 7.99 0 0 1-7.996 7.998z m-199.938-15.994h191.942v-31.99h-191.942v31.99zM863.89 927.888h-87.972a7.994 7.994 0 0 1-7.996-7.998v-47.984a7.992 7.992 0 0 1 7.996-7.998h87.972c4.422 0 8 3.576 8 7.998v47.984a7.994 7.994 0 0 1-8 7.998z m-79.972-15.996h71.976v-31.99h-71.976v31.99zM983.856 879.902h-87.972a7.99 7.99 0 0 1-7.996-7.996 7.99 7.99 0 0 1 7.996-7.998h87.972a7.99 7.99 0 0 1 7.996 7.998 7.99 7.99 0 0 1-7.996 7.996z" fill=""></path><path d="M983.856 911.892h-87.972a7.99 7.99 0 0 1-7.996-7.998 7.99 7.99 0 0 1 7.996-7.996h87.972a7.99 7.99 0 0 1 7.996 7.996 7.99 7.99 0 0 1-7.996 7.998z" fill=""></path><path d="M416.506 799.928c-4.414 0-8.076-3.576-8.076-7.998 0-4.42 3.498-7.998 7.918-7.998h0.156a7.994 7.994 0 0 1 7.998 7.998 7.992 7.992 0 0 1-7.996 7.998zM448.496 799.928c-4.414 0-8.076-3.576-8.076-7.998 0-4.42 3.498-7.998 7.918-7.998h0.156a7.994 7.994 0 0 1 7.998 7.998 7.99 7.99 0 0 1-7.996 7.998zM480.486 799.928c-4.414 0-8.076-3.576-8.076-7.998 0-4.42 3.498-7.998 7.918-7.998h0.156a7.994 7.994 0 0 1 7.998 7.998 7.988 7.988 0 0 1-7.996 7.998z" fill=""></path><path d="M647.958 815.922H376.042a7.992 7.992 0 0 1-7.998-7.996v-15.996c0-13.23 10.762-23.992 23.994-23.992h239.928c13.23 0 23.992 10.762 23.992 23.992v15.996c0 4.42-3.58 7.996-8 7.996z m-263.918-15.994h255.92v-7.998a8.004 8.004 0 0 0-7.996-7.998H392.038a8 8 0 0 0-7.998 7.998v7.998z" fill=""></path><path d="M647.958 1007.864H376.042a7.992 7.992 0 0 1-7.998-7.996v-191.942a7.994 7.994 0 0 1 7.998-7.998h271.916c4.422 0 8 3.576 8 7.998v191.942c0 4.42-3.58 7.996-8 7.996z m-263.918-15.994h255.92v-175.948H384.04v175.948z" fill=""></path><path d="M615.968 895.898H408.032a7.994 7.994 0 0 1-7.998-7.998v-47.986a7.992 7.992 0 0 1 7.998-7.996h207.936a7.99 7.99 0 0 1 7.996 7.996v47.986a7.992 7.992 0 0 1-7.996 7.998z m-199.938-15.996h191.942v-31.99h-191.942v31.99zM496.004 975.874h-87.972a7.994 7.994 0 0 1-7.998-7.998v-47.984a7.994 7.994 0 0 1 7.998-7.998h87.972a7.994 7.994 0 0 1 7.998 7.998v47.984a7.994 7.994 0 0 1-7.998 7.998z m-79.974-15.996h71.976v-31.99h-71.976v31.99zM615.968 927.888h-87.972c-4.422 0-8-3.578-8-7.998s3.578-7.998 8-7.998h87.972c4.422 0 7.996 3.578 7.996 7.998s-3.574 7.998-7.996 7.998z" fill=""></path><path d="M615.968 959.878h-87.972c-4.422 0-8-3.578-8-7.998s3.578-7.998 8-7.998h87.972c4.422 0 7.996 3.578 7.996 7.998s-3.574 7.998-7.996 7.998z" fill=""></path><path d="M575.98 112.13h-111.966a7.994 7.994 0 0 1-7.998-7.998V56.148c0-2.774 1.438-5.35 3.796-6.802a8.018 8.018 0 0 1 7.778-0.352l24.774 12.386 19.946-40.738a8.004 8.004 0 0 1 7.124-4.482c2.644-0.25 5.808 1.664 7.184 4.358l20.882 40.926 24.898-12.45a7.964 7.964 0 0 1 7.782 0.352 7.994 7.994 0 0 1 3.792 6.802v47.984a7.986 7.986 0 0 1-7.992 7.998z m-103.968-15.996h95.972V69.088l-20.418 10.208a8.008 8.008 0 0 1-10.7-3.514l-17.222-33.74-16.462 33.614a8 8 0 0 1-4.624 4.062 7.91 7.91 0 0 1-6.138-0.422l-20.408-10.208v27.046z" fill=""></path><path d="M519.996 703.958A7.994 7.994 0 0 1 512 695.96v-111.964a7.994 7.994 0 0 1 7.996-7.998c4.422 0 8 3.578 8 7.998v111.964a7.996 7.996 0 0 1-8 7.998z" fill=""></path><path d="M519.996 703.958a7.994 7.994 0 0 1-5.652-13.652l15.996-15.996a7.996 7.996 0 1 1 11.308 11.31l-15.996 15.994a7.976 7.976 0 0 1-5.656 2.344z" fill=""></path><path d="M519.996 703.958a7.974 7.974 0 0 1-5.652-2.344l-15.996-15.994a7.996 7.996 0 1 1 11.308-11.31l15.996 15.996a7.994 7.994 0 0 1-5.656 13.652z" fill=""></path><path d="M168.106 655.972a7.994 7.994 0 0 1-5.654-13.652l79.976-79.976a7.994 7.994 0 0 1 11.308 0 7.994 7.994 0 0 1 0 11.308L173.76 653.628a7.964 7.964 0 0 1-5.654 2.344z" fill=""></path><path d="M190.724 655.972H168.106c-4.42 0-7.998-3.578-7.998-7.998s3.576-7.998 7.998-7.998h22.618c4.42 0 7.998 3.578 7.998 7.998s-3.578 7.998-7.998 7.998z" fill=""></path><path d="M168.106 655.972a7.994 7.994 0 0 1-7.998-7.998v-22.62c0-4.42 3.576-7.996 7.998-7.996s7.998 3.576 7.998 7.996v22.62a7.996 7.996 0 0 1-7.998 7.998z" fill=""></path><path d="M871.89 655.972a7.976 7.976 0 0 1-5.656-2.344l-79.972-79.976a7.994 7.994 0 0 1 0-11.308 7.994 7.994 0 0 1 11.308 0l79.972 79.976a7.994 7.994 0 0 1 0 11.308 7.948 7.948 0 0 1-5.652 2.344z" fill=""></path><path d="M871.89 655.972h-22.618c-4.422 0-8-3.578-8-7.998s3.578-7.998 8-7.998h22.618c4.418 0 7.996 3.578 7.996 7.998s-3.578 7.998-7.996 7.998z" fill=""></path><path d="M871.89 655.972c-4.422 0-8-3.578-8-7.998v-22.62a7.994 7.994 0 0 1 8-7.996 7.992 7.992 0 0 1 7.996 7.996v22.62a7.994 7.994 0 0 1-7.996 7.998z" fill=""></path></g></svg>`;
                case 'Digital Marketing':
                    return `
            <svg fill="white" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon points="486.153,183.921 465.758,100.419 390.705,290.811 382.822,276.991 369.207,284.757 393.294,326.981 462.242,152.079 473.847,199.595 512,199.595 512,183.921 "></polygon> </g> </g> <g> <g> <polygon points="320.837,174.351 289.084,214.045 270.78,182.012 257.171,189.788 286.916,241.842 319.163,201.535 337.937,232.041 351.284,223.827 "></polygon> </g> </g> <g> <g> <polygon points="225.223,101.417 202.442,132.016 159.475,12.221 78.513,272.266 36.975,183.921 0,183.921 0,199.595 27.025,199.595 81.487,315.434 160.525,61.574 197.558,164.824 222.777,130.947 226.166,137.539 240.106,130.374 "></polygon> </g> </g> <g> <g> <path d="M356.82,155.123c-28.01-28.008-73.583-28.008-101.592,0c-28.008,28.011-28.008,73.584,0,101.594 c13.568,13.568,31.608,21.041,50.797,21.041s37.228-7.474,50.796-21.042c13.568-13.568,21.041-31.608,21.041-50.797 C377.861,186.731,370.389,168.691,356.82,155.123z M345.738,245.632c-10.608,10.608-24.712,16.451-39.713,16.451 s-29.106-5.843-39.713-16.451c-21.898-21.898-21.898-57.528,0-79.427c10.951-10.949,25.329-16.424,39.713-16.424 c14.381,0,28.766,5.475,39.713,16.424C367.636,188.103,367.636,223.734,345.738,245.632z"></path> </g> </g> <g> <g> <path d="M373.791,138.152c-18.101-18.101-42.168-28.069-67.767-28.069c-25.599,0-49.666,9.968-67.767,28.069 c-18.102,18.102-28.07,42.168-28.07,67.767c0,22.967,8.047,44.686,22.769,61.984l-11.669,11.669l11.082,11.083l11.669-11.669 c17.298,14.722,39.018,22.768,61.984,22.768c25.6,0.001,49.667-9.967,67.768-28.068 C411.158,236.319,411.158,175.519,373.791,138.152z M362.71,262.602c-15.141,15.142-35.272,23.48-56.685,23.48 c-21.413,0-41.543-8.337-56.685-23.48c-15.142-15.141-23.48-35.271-23.48-56.684c0-21.412,8.338-41.543,23.48-56.684 c15.141-15.142,35.272-23.48,56.685-23.48c21.413,0,41.543,8.337,56.685,23.48C393.965,180.49,393.965,231.347,362.71,262.602z"></path> </g> </g> <g> <g> <rect x="207.665" y="272.425" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -146.4853 239.203)" width="15.672" height="48"></rect> </g> </g> <g> <g> <path d="M181.458,285.229l-11.082,11.084l5.772,5.771L57.354,420.879l33.709,33.71l118.793-118.793l5.773,5.772l11.082-11.083 L181.458,285.229z M91.064,432.424L79.52,420.879l17.201-17.201l11.544,11.545L91.064,432.424z M119.348,404.14l-11.544-11.544 l79.427-79.427l11.543,11.544L119.348,404.14z"></path> </g> </g> <g> <g> <path d="M338.082,372.106l-65.918-37.668v165.34h239.673V372.106H338.082z M496.164,484.107H287.837v-122.66l46.083,26.332 h162.243V484.107z"></path> </g> </g> <g> <g> <rect x="312.424" y="408.577" width="87.771" height="15.673"></rect> </g> </g> <g> <g> <rect x="312.424" y="432.609" width="31.347" height="15.673"></rect> </g> </g> <g> <g> <rect x="360.49" y="432.609" width="71.053" height="15.673"></rect> </g> </g> <g> <g> <rect x="312.424" y="455.597" width="15.673" height="15.673"></rect> </g> </g> <g> <g> <rect x="343.771" y="455.597" width="16.718" height="15.673"></rect> </g> </g> <g> <g> <rect x="376.163" y="455.597" width="15.673" height="15.673"></rect> </g> </g> <g> <g> <rect x="407.51" y="455.597" width="16.718" height="15.673"></rect> </g> </g> <g> <g> <rect x="439.902" y="455.597" width="15.673" height="15.673"></rect> </g> </g> </g></svg>`;
                case 'Fund raise':
                    return `
            <svg viewBox="-0.5 0 25 25" fill="white" xmlns="http://www.w3.org/2000/svg" stroke="#000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.8702 16.97V18.0701C12.8702 18.2478 12.7995 18.4181 12.6739 18.5437C12.5482 18.6694 12.3778 18.74 12.2001 18.74C12.0224 18.74 11.852 18.6694 11.7264 18.5437C11.6007 18.4181 11.5302 18.2478 11.5302 18.0701V16.9399C11.0867 16.8668 10.6625 16.7051 10.2828 16.4646C9.90316 16.2241 9.57575 15.9097 9.32013 15.54C9.21763 15.428 9.16061 15.2817 9.16016 15.1299C9.16006 15.0433 9.17753 14.9576 9.21155 14.8779C9.24557 14.7983 9.29545 14.7263 9.35809 14.6665C9.42074 14.6067 9.49484 14.5601 9.57599 14.5298C9.65713 14.4994 9.7436 14.4859 9.83014 14.49C9.91602 14.4895 10.0009 14.5081 10.0787 14.5444C10.1566 14.5807 10.2254 14.6338 10.2802 14.7C10.6 15.1178 11.0342 15.4338 11.5302 15.6099V13.0701C10.2002 12.5401 9.53015 11.77 9.53015 10.76C9.55019 10.2193 9.7627 9.70353 10.1294 9.30566C10.4961 8.9078 10.9929 8.65407 11.5302 8.59009V7.47998C11.5302 7.30229 11.6007 7.13175 11.7264 7.0061C11.852 6.88045 12.0224 6.81006 12.2001 6.81006C12.3778 6.81006 12.5482 6.88045 12.6739 7.0061C12.7995 7.13175 12.8702 7.30229 12.8702 7.47998V8.58008C13.2439 8.63767 13.6021 8.76992 13.9234 8.96924C14.2447 9.16856 14.5226 9.43077 14.7402 9.73999C14.8284 9.85568 14.8805 9.99471 14.8901 10.1399C14.8928 10.2256 14.8783 10.3111 14.8473 10.3911C14.8163 10.4711 14.7696 10.5439 14.7099 10.6055C14.6502 10.667 14.5787 10.7161 14.4998 10.7495C14.4208 10.7829 14.3359 10.8001 14.2501 10.8C14.1607 10.7989 14.0725 10.7787 13.9915 10.7407C13.9104 10.7028 13.8384 10.648 13.7802 10.5801C13.5417 10.2822 13.2274 10.054 12.8702 9.91992V12.1699L13.1202 12.27C14.3902 12.76 15.1802 13.4799 15.1802 14.6299C15.163 15.2399 14.9149 15.8208 14.4862 16.2551C14.0575 16.6894 13.4799 16.9449 12.8702 16.97ZM11.5302 11.5901V9.96997C11.3688 10.0285 11.2298 10.1363 11.1329 10.2781C11.0361 10.4198 10.9862 10.5884 10.9902 10.76C10.9984 10.93 11.053 11.0945 11.1483 11.2356C11.2435 11.3767 11.3756 11.4889 11.5302 11.5601V11.5901ZM13.7302 14.6599C13.7302 14.1699 13.3902 13.8799 12.8702 13.6599V15.6599C13.1157 15.6254 13.3396 15.5009 13.4985 15.3105C13.6574 15.1202 13.74 14.8776 13.7302 14.6299V14.6599Z" fill="#fff"></path> <path d="M12.58 3.96997H6C4.93913 3.96997 3.92178 4.39146 3.17163 5.1416C2.42149 5.89175 2 6.9091 2 7.96997V17.97C2 19.0308 2.42149 20.0482 3.17163 20.7983C3.92178 21.5485 4.93913 21.97 6 21.97H18C19.0609 21.97 20.0783 21.5485 20.8284 20.7983C21.5786 20.0482 22 19.0308 22 17.97V11.8999" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16.3398 8.57992L21.9998 2.91992" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.4805 2.91992H22.0005V7.44992" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>`;
                case 'Industry Operations':
                    return `
            <svg fill="white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.046 32.045" xml:space="preserve" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M18.812,12.025l-0.55,1.798c0.491,0.157,0.85,0.639,0.85,1.21c0,0.286-0.091,0.549-0.242,0.761l1.433,1.17 c0.396-0.533,0.63-1.203,0.63-1.932C20.932,13.606,20.033,12.41,18.812,12.025z"></path> <path d="M17.622,16.374c-0.652-0.006-1.179-0.572-1.179-1.262c0-0.689,0.526-1.255,1.179-1.26c0.123-0.001,0.24,0.018,0.353,0.054 l0.547-1.795c-0.285-0.09-0.587-0.136-0.898-0.129c-1.61,0.033-2.895,1.436-2.895,3.129c0,1.694,1.284,3.099,2.895,3.132 c0.963,0.021,1.828-0.451,2.383-1.202l-1.427-1.169C18.358,16.179,18.013,16.377,17.622,16.374z"></path> <path d="M30.155,12.956c1.891-0.733,1.891-0.804,1.891-0.994v-1.482c0-0.19,0-0.27-1.892-0.944l-0.066-0.024l-0.267-0.633 l0.028-0.064c0.805-1.823,0.749-1.877,0.615-2.009l-1.07-1.047c-0.044-0.043-0.121-0.074-0.188-0.074 c-0.062,0-0.242,0-1.826,0.717L27.317,6.43l-0.651-0.263L26.64,6.102c-0.745-1.844-0.823-1.844-1.007-1.844h-1.514 c-0.187,0-0.27,0-0.959,1.847l-0.026,0.067l-0.649,0.265l-0.062-0.026c-1.071-0.452-1.696-0.681-1.859-0.681 c-0.065,0-0.144,0.03-0.188,0.073l-1.073,1.049c-0.136,0.134-0.192,0.19,0.653,1.975l0.03,0.066L19.72,9.525L19.654,9.55 c-0.215,0.083-0.401,0.157-0.57,0.224c-0.063,0.025-0.438,0.269-0.673,0.417l-4.931-0.27l-1.696,8.13h-0.001l-0.033,0.005 c-0.41-0.696-1.174-1.092-2.239-1.092H9.045c-0.625,0.61-1.718,1.019-2.97,1.019s-2.345-0.408-2.97-1.019H2.639 c-1.643,0-2.584,0.928-2.584,2.476c0,1.549-0.05,5.781-0.05,6.625s-0.101,1.723,0.627,1.723c0.269,0,1.125,0,2.235,0 c1.059,0,2.076,0,3.009,0c0.129,0,0.272,0,0.397,0c1.196,0,2.19,0,2.762,0c0.102,0,0.173,0,0.247,0c0.032,0,0.08,0,0.106,0 c0.93,0,1.644,0,1.882,0c0.099,0,0.192,0,0.247,0c0.729,0,0.627-0.879,0.627-1.723c0-0.13-0.002-0.349-0.003-0.617h19.881v-1.345 H12.13c-0.004-0.379-0.008-0.784-0.012-1.196l1.895,0.725l9.375-1.491l0.939-3.896h1.367c0.19,0,0.27,0,0.959-1.848l0.026-0.066 l0.65-0.263l0.062,0.025c1.07,0.453,1.695,0.682,1.857,0.682c0.064,0,0.145-0.029,0.188-0.072l1.073-1.051 c0.136-0.135,0.191-0.19-0.655-1.973l-0.03-0.067l0.265-0.63L30.155,12.956z M13.951,10.681l9.806,0.655l-2.146,9.061l-9.188-2.6 L13.951,10.681z M12.095,19.44c0-0.277-0.04-0.527-0.1-0.764l0.035-0.006l7.777,2.221l-3.552,0.503l-4.159-1.354 C12.096,19.815,12.095,19.61,12.095,19.44z M12.1,20.589l1.073,0.358l-1.069,0.16C12.102,20.929,12.101,20.755,12.1,20.589z M25.451,13.591l0.565-2.347l-0.568-0.396L22.91,21.676l-8.834,1.292v-0.004l-1.963-0.718c-0.002-0.188-0.004-0.371-0.005-0.555 l1.999,0.717l8.259-1.108l2.547-10.756l-2.273-0.123c0.027-0.101,0.056-0.201,0.063-0.216c0.396-0.802,1.234-1.357,2.204-1.357 c1.353,0,2.451,1.078,2.451,2.404C27.358,12.393,26.542,13.348,25.451,13.591z"></path> <path d="M1.618,11.909c-0.009,0.058-0.021,0.116-0.028,0.175c-0.273,2.544,1.526,4.833,4.012,5.102 c2.487,0.27,4.734-1.583,5.01-4.127c0.041-0.393,0.029-0.778-0.023-1.152c0.292-0.002,0.473-0.006,0.513-0.012 c0.317-0.04,0.57-0.063,0.596-0.413c0.005-0.467-0.008-0.392-0.001-0.461c0.008-0.404-0.229-0.357-0.491-0.385 c-0.262-0.028-0.583,0.012-0.583,0.012S9.868,5.572,5.172,6.401C3.768,6.649,2.843,7.242,2.235,7.95 c1.199-0.596,2.613-0.882,3.843-0.713c1.173,0.162,2.093,0.706,2.686,1.571C8.369,8.515,7.926,8.285,7.442,8.135 C6.959,7.85,6.446,7.712,6.019,7.653C4.601,7.451,2.93,7.899,1.693,8.749C0.9,10.26,1.13,11.907,1.13,11.907 S1.313,11.907,1.618,11.909z M2.425,12.174c0.009-0.089,0.025-0.176,0.042-0.263c1.897,0.003,5.361,0.009,7.275,0.001 c0.059,0.341,0.074,0.695,0.034,1.056c-0.226,2.084-2.059,3.603-4.084,3.383C3.664,16.132,2.2,14.258,2.425,12.174z"></path> </g> </g> </g></svg>`;
                case 'Data Management & Security':
                    return `
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 14.091 14.091" xml:space="preserve" fill="white"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path style="fill:#fff;" d="M0.742,10.601V9.093c0.915,0.837,2.795,1.371,4.972,1.371c0.22,0,0.435-0.009,0.647-0.02 l1.001-1.001C6.854,9.516,6.303,9.559,5.714,9.559c-2.93,0-4.972-1.025-4.972-1.945V6.106c0.915,0.837,2.795,1.372,4.972,1.372 c0.977,0,1.887-0.112,2.683-0.307c0.099-0.389,0.255-0.763,0.47-1.106C8.033,6.347,6.955,6.531,5.715,6.531 c-2.93,0-4.972-1.025-4.972-1.945V3.25C1.637,4.008,3.708,4.4,5.715,4.4c2.009,0,4.079-0.392,4.974-1.15v1.294 c0.192-0.078,0.393-0.138,0.597-0.183v-1.38c0-0.217-0.134-0.879-0.134-0.985C11.152,0.7,8.35,0,5.715,0 C3.081,0,0.28,0.7,0.28,1.996c0,0.105-0.134,0.768-0.134,0.985v1.604c0,0.247,0.078,0.483,0.216,0.708L0.344,5.324 C0.213,5.552,0.146,5.783,0.146,6.011v1.604c0,0.239,0.074,0.469,0.204,0.687l-0.006,0.01C0.213,8.541,0.146,8.771,0.146,8.999 v1.604c0,1.232,1.828,2.231,4.339,2.48c0.039-0.244,0.077-0.434,0.118-0.587C2.281,12.276,0.742,11.4,0.742,10.601z"></path> <path style="fill:#fff;" d="M13.231,5.899c-0.953-0.953-2.499-0.953-3.453,0C9.083,6.594,8.897,7.605,9.216,8.471l-3.855,3.854 c-0.063,0.063-0.265,1.671-0.265,1.671l0.095,0.095c0,0,1.549-0.261,1.613-0.323l0.369-0.369h0.78 c0.089,0,0.161-0.071,0.161-0.161v-0.73h0.39c0.089,0,0.16-0.072,0.16-0.161v-0.441l0.052-0.051h0.628 c0.09,0,0.162-0.072,0.162-0.161v-0.628l1.152-1.152c0.866,0.319,1.877,0.134,2.572-0.563C14.184,8.398,14.184,6.852,13.231,5.899 z M6.16,12.591c-0.095,0.094-0.247,0.094-0.342,0c-0.094-0.094-0.094-0.247,0-0.342l3.513-3.513C9.405,8.882,9.494,9.02,9.6,9.151 L6.16,12.591z M13.026,7.33c-0.339,0.339-0.889,0.339-1.228,0s-0.339-0.889,0-1.228c0.339-0.338,0.889-0.339,1.228,0 S13.365,6.991,13.026,7.33z"></path> </g> </g> </g></svg>`;
                case 'Business Financial':
                    return `
            <svg fill="white" viewBox="0 0 512 512" enable-background="new 0 0 512 512" id="Income_x5F_graph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M141.919,422.5H81.912c-1.244,0-2.412,0.201-2.412,1.443V485.5h66v-61.557C145.5,422.701,143.162,422.5,141.919,422.5z"></path> <path d="M145.5,345.967c0-1.242-1.334-2.467-2.579-2.467h-60.75c-1.244,0-2.671,1.225-2.671,2.467v60.75 c0,1.242,1.427,1.783,2.671,1.783h60.75c1.244,0,2.579-0.541,2.579-1.783V345.967z"></path> <path d="M270.932,422.5h-60.004c-1.244,0-2.427,0.201-2.427,1.443V485.5h65v-61.557C273.5,422.701,272.176,422.5,270.932,422.5z"></path> <path d="M273.5,345.967c0-1.242-1.084-2.467-2.328-2.467h-60.75c-1.244,0-1.921,1.225-1.921,2.467v60.75 c0,1.242,0.677,1.783,1.921,1.783h60.75c1.244,0,2.328-0.541,2.328-1.783V345.967z"></path> <path d="M273.5,269.467c0-1.242-1.084-2.967-2.328-2.967h-60.75c-1.244,0-1.921,1.725-1.921,2.967v60.75 c0,1.242,0.677,2.283,1.921,2.283h60.75c1.244,0,2.328-1.041,2.328-2.283V269.467z"></path> <path d="M399.938,422.5h-60.006c-1.244,0-1.432,0.201-1.432,1.443V485.5h63v-61.557C401.5,422.701,401.18,422.5,399.938,422.5z"></path> <path d="M403.5,345.967c0-1.242-0.584-2.467-1.828-2.467h-60.75c-1.244,0-2.422,1.225-2.422,2.467v60.75 c0,1.242,1.178,1.783,2.422,1.783h60.75c1.244,0,1.828-0.541,1.828-1.783V345.967z"></path> <path d="M403.5,269.467c0-1.242-0.584-2.967-1.828-2.967h-60.75c-1.244,0-2.422,1.725-2.422,2.967v60.75 c0,1.242,1.178,2.283,2.422,2.283h60.75c1.244,0,1.828-1.041,1.828-2.283V269.467z"></path> <path d="M403.5,192.967c0-1.242-0.584-2.467-1.828-2.467h-60.75c-1.244,0-2.422,1.225-2.422,2.467v60.75 c0,1.242,1.178,1.783,2.422,1.783h60.75c1.244,0,1.828-0.541,1.828-1.783V192.967z"></path> <path d="M338.5,162.984v13.514c0,1.242,0.188,3.002,1.432,3.002h60.006c1.242,0,1.563-1.76,1.563-3.002v-60.006 c0-1.242-0.32-2.992-1.563-2.992h-9.512C386.309,140.5,363.5,160.908,338.5,162.984z"></path> <path d="M79.5,316.697v13.482c0,1.238,1.16,2.32,2.421,2.32h60.008c1.236,0,3.571-1.082,3.571-2.32v-59.984 c0-1.236-2.334-3.695-3.571-3.695h-9.518C128.296,293.5,106.5,314.617,79.5,316.697z"></path> <path d="M75.158,303.391c24.555,0,44.459-19.904,44.459-44.461c0-24.555-19.904-44.461-44.459-44.461 c-24.557,0-44.461,19.906-44.461,44.461C30.697,283.486,50.601,303.391,75.158,303.391z M52.83,256.564 c2.607-2.207,6.512-1.879,8.721,0.729l5.813,6.871l21.752-21.752c2.416-2.414,6.332-2.414,8.75,0.002 c2.416,2.416,2.416,6.334,0,8.75l-26.508,26.508c-1.162,1.162-2.738,1.811-4.375,1.811c-0.086,0-0.172-0.002-0.258-0.004 c-1.729-0.074-3.348-0.865-4.467-2.188l-10.156-12.006C49.896,262.676,50.22,258.771,52.83,256.564z"></path> <path d="M208.5,239.922v13.457c0,1.244,1.183,2.121,2.427,2.121h60.004c1.244,0,2.568-0.877,2.568-2.121v-60.006 c0-1.242-1.324-2.873-2.568-2.873h-9.482C257.352,217.5,235.5,237.85,208.5,239.922z"></path> <path d="M204.183,226.613c24.555,0,44.461-19.906,44.461-44.461s-19.906-44.459-44.461-44.459s-44.459,19.904-44.459,44.459 S179.628,226.613,204.183,226.613z M181.855,179.787c2.607-2.205,6.512-1.883,8.721,0.729l5.814,6.873l21.75-21.752 c2.418-2.416,6.332-2.416,8.75,0c2.416,2.416,2.416,6.334,0,8.75l-26.506,26.506c-1.162,1.164-2.738,1.814-4.375,1.814 c-0.086,0-0.172-0.004-0.256-0.006c-1.73-0.072-3.35-0.865-4.469-2.188l-10.156-12.008 C178.921,185.898,179.246,181.994,181.855,179.787z"></path> <path d="M496.545,33.598l-19.479-18.609c-2.047-1.951-5.244-1.949-7.275,0.002l-19.479,18.607c-1.564,1.496-2.057,3.175-1.25,5.183 c0.805,2.008,2.723,2.72,4.887,2.72H466.5v47.949c0,3.416,3.584,6.188,7,6.188s7-2.771,7-6.188V41.5h12.406 c2.164,0,4.082-0.712,4.889-2.722C498.6,36.771,498.109,35.092,496.545,33.598z"></path> <path d="M473.5,110.4c-3.416,0-7,2.771-7,6.188v51.436c0,3.416,3.584,6.188,7,6.188s7-2.771,7-6.188v-51.436 C480.5,113.172,476.916,110.4,473.5,110.4z"></path> <path d="M473.5,191.652c-3.416,0-7,2.77-7,6.188v274.596c0,7.594-5.436,13.064-13.029,13.064H20.011 c-3.418,0-6.188,3.084-6.188,6.5s2.77,6.5,6.188,6.5h433.459c14.416,0,27.029-11.648,27.029-26.064V197.84 C480.5,194.422,476.916,191.652,473.5,191.652z"></path> <path d="M333.172,149.678c24.555,0,44.461-19.906,44.461-44.461s-19.906-44.461-44.461-44.461s-44.459,19.906-44.459,44.461 S308.617,149.678,333.172,149.678z M311.359,93.5h10.414c1.863,0,3.516-0.647,4.09-2.419l3.219-9.627 c1.287-3.963,6.895-3.826,8.18,0.137l3.219,9.42c0.576,1.773,2.229,2.489,4.092,2.489h10.412c4.166,0,5.9,5.886,2.529,8.333 l-8.428,6.398c-1.506,1.094-2.135,3.174-1.559,4.945l3.217,9.974c1.287,3.963-3.248,7.292-6.619,4.843l-8.424-6.104 c-1.508-1.096-3.549-1.086-5.059,0.008l-8.424,6.126c-3.371,2.449-7.906-0.843-6.617-4.806l3.219-9.904 c0.574-1.773-0.055-3.712-1.563-4.808l-8.428-6.673C305.461,99.384,307.193,93.5,311.359,93.5z"></path> </g> </g></svg>`;
                case 'Business Investments':
                    return `
            <svg viewBox="0 0 64 64" id="fill" xmlns="http://www.w3.org/2000/svg" fill="white" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon points="26 53 30 49 44 49 55 34 51 31 43 39 24 39 18 45 26 53" style="fill:#fff00e5e6eb"></polygon><rect height="15.556" style="fill:#fff00cceaff" transform="translate(-31.205 28.665) rotate(-45)" width="9.899" x="14.05" y="44.222"></rect><rect height="3.536" style="fill:#fff0085b4e0" transform="translate(-32.965 32.915) rotate(-45)" width="9.899" x="18.3" y="54.482"></rect><polygon points="36 43 36 39 38 39 38 45 30 45 30 43 36 43" style="fill:#fff00"></polygon><polygon points="16 53 19 50 22 53 16 53" style="fill:#fff00fff"></polygon><circle cx="32" cy="27" r="8" style="fill:#fff00027de5"></circle><circle cx="50" cy="17" r="6" style="fill:#fff00027de5"></circle><circle cx="15" cy="13" r="4" style="fill:#fff00027de5"></circle><path d="M34.14,32.114a3.028,3.028,0,0,0-.2-4.464l-2.593-2.16a1.025,1.025,0,0,1-.069-1.512,1.051,1.051,0,0,1,1.45,0l1.568,1.568,1.414-1.414-1.568-1.569a2.99,2.99,0,0,0-1.139-.7v-2.79a7.281,7.281,0,0,0-2,0v2.789a3,3,0,0,0-1.14.7,3.027,3.027,0,0,0,.2,4.464l2.593,2.161a1.025,1.025,0,0,1,.07,1.511,1.027,1.027,0,0,1-1.451,0l-1.568-1.568-1.414,1.414,1.568,1.569a2.983,2.983,0,0,0,1.139.7v2.113a7.281,7.281,0,0,0,2,0V32.818A3,3,0,0,0,34.14,32.114Z" style="fill:#fff00fff"></path><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="32" x2="32" y1="9" y2="16"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="28" x2="28" y1="7" y2="14"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="36" x2="36" y1="7" y2="14"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="15" x2="15" y1="2" y2="6"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="19" x2="19" y1="2" y2="8"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="11" x2="11" y1="2" y2="4"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="46" x2="46" y1="4" y2="9"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="50" x2="50" y1="3" y2="8"></line><line style="fill:none;stroke:#fff0007d2ed;stroke-linejoin:round" x1="54" x2="54" y1="2" y2="5"></line><path d="M55.6,33.2l-4-3a1,1,0,0,0-1.307.093L42.586,38H24a1,1,0,0,0-.707.293L18.5,43.086l-.793-.793a1,1,0,0,0-1.414,0l-7,7a1,1,0,0,0,0,1.414l11,11a1,1,0,0,0,1.414,0l7-7a1,1,0,0,0,0-1.414l-.793-.793,2.5-2.5H44a1,1,0,0,0,.807-.408l11-15A1,1,0,0,0,55.6,33.2ZM21,59.586,11.414,50,17,44.414,26.586,54ZM43.493,48H30a1,1,0,0,0-.707.293L26.5,51.086,19.914,44.5l4.5-4.5H37v4H30v2h8a1,1,0,0,0,1-1V40h4a1,1,0,0,0,.707-.293l7.387-7.387,2.514,1.886Z"></path></g></svg>`;
                default:
                    return `
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24">
                <path d="M12 2L3 7l9 5 9-5zm-9 8v7l9 5 9-5v-7l-9 5z"/>
            </svg>`;
            }
        }
    </script>
    <script>
        function handleDiscoveryCall(advisorId) {
            event.preventDefault();
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
            event.preventDefault();
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
    </script>
    {{--
    <script>
        function handleDiscoveryCall(event, redirectUrl) {
            event.preventDefault(); // Prevent page reload
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
                    // Redirect to the discovery call route if balance is sufficient
                    //window.location.href = '{{ route('discovery.call', $advisor->user_id) }}';
                    Swal.fire({
                        title: 'Discovery Call',
                        text: "Please Call from the advisor's profile.",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#6a9023',
                        cancelButtonColor: '#ff3131',
                        confirmButtonText: 'Go to Detail',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the advisor detail route
                            window.location.href = redirectUrl;
                        }
                    });
                }
            @else
                // User is not authenticated, show SweetAlert
                Swal.fire({
                    title: 'Login Required',
                    text: 'Please log in to continue with the discovery call.',
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
    </script> --}}
    {{-- <script>
        function handleConsultationCall() {
            event.preventDefault(); // Prevent page reload
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
                    // Redirect to the consultation call route if balance is sufficient
                    // window.location.href = '{{ route('consultation.call', $advisor->user_id) }}';
                    Swal.fire({
                        title: 'Consultation Call',
                        text: "Please Call from the advisor's profile.",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#6a9023',
                        cancelButtonColor: '#ff3131',
                        confirmButtonText: 'Go to Detail',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the advisor detail route
                            window.location.href = redirectUrl;
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
    </script> --}}

    {{-- <script>
        let selectedDayIndex = 0; // Default to current day
        let selectedDay = '{{ $upcomingDays[0]['day'] }}'; // Default to current day
        let selectedDate = '{{ $upcomingDays[0]['date'] }}'; // Default to current date
        let selectedTimeSlot = '';
        let selectedAdvisorId = '';

        // Open the modal
        function openBookingModal() {
            event.preventDefault(); // Prevent page reload
            document.getElementById('appointmentModal').classList.remove('hidden');
            document.getElementById('appointmentModal').classList.add('flex');
        }

        // Close the modal
        function closeBookingModal() {
            document.getElementById('appointmentModal').classList.remove('flex');
            document.getElementById('appointmentModal').classList.add('hidden');
        }

        // Highlight selected day and show corresponding slots
        function selectDay(dayIndex, day, date) {
            selectedDayIndex = dayIndex;
            selectedDay = day;
            selectedDate = date; // Update the selectedDate to the correct date

            // Highlight selected day button
            document.querySelectorAll('.tab-button').forEach((button, index) => {
                if (index == dayIndex) {
                    button.classList.remove('bg-blue-500');
                    button.classList.add('bg-green-500');
                } else {
                    button.classList.remove('bg-green-500');
                    button.classList.add('bg-blue-500');
                }
            });

            // Show the corresponding time slots for the selected day
            showSlots(day);
        }

        // Show the slots for the selected day
        function showSlots(day) {
            document.querySelectorAll('.slot').forEach(slot => {
                slot.classList.add('hidden');
                if (slot.dataset.day === day) {
                    slot.classList.remove('hidden');
                }
            });

            // Reset confirm button and slot highlighting
            document.getElementById('confirmAppointment').classList.add('hidden');
            document.querySelectorAll('.slot-button').forEach(button => {
                button.classList.remove('bg-green-500', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });
        }

        function selectSlot(advisorId, day, timeSlot) {
            selectedAdvisorId = advisorId;
            selectedTimeSlot = timeSlot;

            // Remove the selected styles from all slot buttons
            document.querySelectorAll('.slot-button').forEach(button => {
                button.classList.remove('bg-green-500', 'text-white'); // Remove selected styles
                button.classList.add('bg-gray-200', 'text-gray-700'); // Reset to default styles
            });

            // Add selected styles to the clicked slot
            const selectedSlotButton = document.getElementById(`slot-${timeSlot}`);
            if (selectedSlotButton) {
                selectedSlotButton.classList.add('bg-green-500', 'text-white');
                selectedSlotButton.classList.remove('bg-gray-200', 'text-gray-700');
            }

            // Show the confirm button
            document.getElementById('confirmAppointment').classList.remove('hidden');
        }

        function getCSRFToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        // Confirm booking
        function confirmBooking() {
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
                        date: selectedDate // Ensure you pass the correct date here
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
                            closeBookingModal(); // Close the modal after confirmation
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
                    console.error('Fetch error:', error); // Log the error for debugging
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

        console.log('CSRF Token:', getCSRFToken());
        console.log('Request Payload:', {
            advisor_nomination_id: selectedAdvisorId,
            day: selectedDay,
            time_slot: selectedTimeSlot,
            date: selectedDate
        });

        // Preload today's availability by default
        window.onload = function() {
            showSlots(selectedDay);
        };
    </script> --}}
    {{-- <script>
        let selectedDayIndex = 0; // Default to current day
        let selectedDay = '{{ $upcomingDays[0]['day'] }}'; // Default to current day
        let selectedDate = '{{ $upcomingDays[0]['date'] }}'; // Default to current date
        let selectedTimeSlot = '';
        let selectedAdvisorId = '';

        // Open the modal
        function openBookingModal(event, modalId) {
            event.preventDefault();
            const modalElement = document.getElementById(modalId);

            if (modalElement) {
                // Extract advisorId from the modal ID
                selectedAdvisorId = modalId.split('-')[1]; // Assuming the format is appointmentModal-{advisorId}
                modalElement.classList.remove('hidden');
                modalElement.classList.add('flex');
            } else {
                console.error(`Modal with id ${modalId} not found`);
            }
        }

        // Close the modal
        function closeBookingModal(event) {
            event.preventDefault();
            const modalElement = document.getElementById(`appointmentModal-${selectedAdvisorId}`);
            if (modalElement) {
                modalElement.classList.remove('flex');
                modalElement.classList.add('hidden');
            }
        }

        // Highlight selected day and show corresponding slots
        function selectDay(event, dayIndex, day, date) {
            event.preventDefault();
            selectedDayIndex = dayIndex;
            selectedDay = day;
            selectedDate = date; // Update the selectedDate to the correct date

            // Highlight selected day button
            document.querySelectorAll('.tab-button').forEach((button, index) => {
                if (index == dayIndex) {
                    button.classList.remove('bg-blue-500');
                    button.classList.add('bg-green-500');
                } else {
                    button.classList.remove('bg-green-500');
                    button.classList.add('bg-blue-500');
                }
            });

            // Show the corresponding time slots for the selected day
            showSlots(day);
        }

        // Show the slots for the selected day
        // Show the slots for the selected day
        function showSlots(day) {
            let slotsVisible = false; // Flag to check if any slots are visible

            document.querySelectorAll('.slot').forEach(slot => {
                slot.classList.add('hidden');
                if (slot.dataset.day === day) {
                    slot.classList.remove('hidden');
                    slotsVisible = true; // Found at least one visible slot
                }
            });

            // Reset confirm button and slot highlighting
            document.getElementById('confirmAppointment').classList.add('hidden');
            document.querySelectorAll('.slot-button').forEach(button => {
                button.classList.remove('bg-green-500', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });

            // Log if no slots were found for the selected day
            if (!slotsVisible) {
                console.log('No slots available for the selected day:', day);
            }
        }

        function selectSlot(event, advisorId, day, timeSlot) {
            event.preventDefault();
            selectedAdvisorId = advisorId;
            selectedTimeSlot = timeSlot;

            // Remove the selected styles from all slot buttons
            document.querySelectorAll('.slot-button').forEach(button => {
                button.classList.remove('bg-green-500', 'text-white'); // Remove selected styles
                button.classList.add('bg-gray-200', 'text-gray-700'); // Reset to default styles
            });

            // Add selected styles to the clicked slot
            const selectedSlotButton = document.getElementById(`slot-${advisorId}-${timeSlot}`);
            if (selectedSlotButton) {
                selectedSlotButton.classList.add('bg-green-500', 'text-white');
                selectedSlotButton.classList.remove('bg-gray-200', 'text-gray-700');
            }

            // Show the confirm button
            document.getElementById('confirmAppointment').classList.remove('hidden');
        }

        function getCSRFToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        // Confirm booking
        function confirmBooking() {
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
                        date: selectedDate // Ensure you pass the correct date here
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
                            closeBookingModal(); // Close the modal after confirmation
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
                    console.error('Fetch error:', error); // Log the error for debugging
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

        console.log('CSRF Token:', getCSRFToken());
        console.log('Request Payload:', {
            advisor_nomination_id: selectedAdvisorId,
            day: selectedDay,
            time_slot: selectedTimeSlot,
            date: selectedDate
        });

        // Preload today's availability by default
        window.onload = function() {
            showSlots(selectedDay);
        };
    </script> --}}

    <script>
        function showBookingAlert(event, redirectUrl) {
            event.preventDefault();
            // Check if the user is logged in (you can customize this condition)
            const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

            if (!isLoggedIn) {
                Swal.fire({
                    title: 'Login Required',
                    text: "You need to log in to book an appointment. Please log in to continue.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#4CAF50', // Green color for confirm button
                    cancelButtonColor: '#f44336', // Red color for cancel button
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the login route
                        window.location.href = "{{ route('login') }}"; // Update with your login route
                    }
                });
                return;
            }

            Swal.fire({
                title: 'Booking Appointment',
                text: "Please book from the advisor's profile.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#6a9023',
                cancelButtonColor: '#ff3131',
                confirmButtonText: 'Go to Detail',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the advisor detail route
                    window.location.href = redirectUrl;
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Include SweetAlert2 and Tailwind Modal Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- <script>
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
    </script> --}}
@endsection
