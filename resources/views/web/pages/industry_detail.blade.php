@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')

        <form action="{{ route('industry.detail', ['industryName' => $industry->name]) }}" method="GET">
            <div
                class="flex flex-col lg:flex-row gap-[15px] lg:gap-[25px] mt-[10px] lg:mt-[20px] w-[90%] md:w-[95%] lg:w-[90%] mx-auto">
                <div class="flex gap-[26px] w-full lg:w-[30%]">
                    <div class="w-full">
                        <span class="font-[500] hidden lg:flex text-[16px]">
                            Home / Industries / <span class="font-[600]"> {{ $industry->name }}</span></span>
                        <h2 class="font-[500] text-[16px] lg:flex lg:mt-[45px]">
                            Find Advisors in:
                        </h2>
                        <div class="flex flex-row gap-[12px] lg:gap-0 lg:flex-col mt-[4px] lg:mt-[0px] items-center w-full">
                            <!-- Filter form -->
                            <div class="w-full lg:mt-[12px] mx-auto">
                                <div class="w-full bg-[#FFF6F6] drop-shadow-lg p-6 rounded-[12px]">
                                     <!-- Mobile: Horizontal Swiping with Flex | Web: 2 Columns with Improved Spacing -->
                                     <div class="flex space-x-4 overflow-x-auto md:grid md:grid-cols-2 md:gap-6 md:overflow-visible" style="justify-items: end;">
                                        @foreach ($otherIndustries as $otherIndustry)
                                            <a href="{{ route('industry.detail', $otherIndustry->name) }}"
                                               class="flex-none w-[120px] h-[120px] shadow-lg group flex flex-col items-center justify-center gap-2 rounded-lg transition-colors
                                                      {{ $industry->name === $otherIndustry->name ? 'bg-[#FF3131]' : 'bg-[#5D8D05] hover:bg-[#FF3131]' }} focus:outline-none focus:ring md:w-full">

                                                <!-- Optional Icon Placeholder -->
                                                <img class="w-full h-[72px] industry-image" data-industry-name="{{ $otherIndustry->name }}" alt="" />

                                                <!-- Industry Name -->
                                                <h2 class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500 text-center">
                                                    {{ $otherIndustry->name }}
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
                                <svg viewBox="0 0 64 64" height="200px" width="200px" class="w-24 h-24 mb-4 text-gray-500"
                                    data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #f4ecce;
                                                }

                                                .cls-2 {
                                                    fill: #ba9bc9;
                                                }

                                                .cls-3 {
                                                    fill: #838bc5;
                                                }

                                                .cls-4 {
                                                    fill: #8f6c56;
                                                }
                                            </style>
                                        </defs>
                                        <rect class="cls-1" height="4" width="6" x="24" y="24"></rect>
                                        <rect class="cls-2" height="14" width="17" x="6" y="44"></rect>
                                        <polygon class="cls-3"
                                            points="31 42 31 43 30 28 24 28 22 58 31 58 32 58 59 58 59 42 31 42"></polygon>
                                        <polyline class="cls-4" points="42 38 43 28 47 28 48 38"></polyline>
                                        <polyline class="cls-4" points="51 38 52 28 56 28 57 38"></polyline>
                                        <polyline class="cls-4" points="33 38 34 28 38 28 39 38"></polyline>
                                        <path class="cls-2"
                                            d="M29,22V16.22a3,3,0,0,0,1-1.8A3.94,3.94,0,0,0,32,15a4,4,0,0,0,3.58-2.24,3,3,0,0,0,4.78.07,5,5,0,0,0,8.52,1.29,6,6,0,1,0,0-6.24,5,5,0,0,0-8.52,1.29,3,3,0,0,0-4.78.07A4,4,0,0,0,28,11c0,.06,0,.13,0,.19A2.89,2.89,0,0,0,27,11a3,3,0,0,0-2,5.22V22Z">
                                        </path>
                                        <rect class="cls-2" height="6" rx="3" width="30" x="30" y="38">
                                        </rect>
                                        <rect class="cls-4" height="2" width="60" x="2" y="57"></rect>
                                        <polyline class="cls-4" points="8 44 9 34 13 34 14 44"></polyline>
                                        <rect class="cls-1" height="6" width="4" x="35" y="48"></rect>
                                        <rect class="cls-1" height="6" width="4" x="51" y="48"></rect>
                                        <rect class="cls-1" height="6" width="4" x="43" y="48"></rect>
                                        <rect class="cls-1" height="2" width="2" x="9" y="47"></rect>
                                        <rect class="cls-1" height="2" width="2" x="13" y="47"></rect>
                                        <rect class="cls-1" height="2" width="2" x="17" y="47"></rect>
                                        <rect class="cls-1" height="2" width="2" x="9" y="51"></rect>
                                        <rect class="cls-1" height="2" width="2" x="13" y="51"></rect>
                                        <rect class="cls-1" height="2" width="2" x="17" y="51"></rect>
                                    </g>
                                </svg>

                                <h1 class="text-2xl font-bold text-center text-gray-600">
                                    No advisors found matching in your
                                    @if (isset($industry))
                                        industry: <span class="text-red-500">{{ $industry->name }}</span>
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
                                                <div class="flex w-full justify-around flex-row  sm:flex-col items-center sm:items-start gap-4 sm:justify-normal sm:w-auto">

                                                    <!-- Name (Visible at the top for desktop, inline for mobile) -->
                                                    <h2 class="text-xl hidden sm:block font-semibold text-gray-800 mb-4">
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
                                                    <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
                                                        <!-- Name (Visible at the top for desktop, inline for mobile) -->
                                                        <h2 class="text-xl sm:hidden font-semibold text-gray-800 mb-4">
                                                            @if (Auth::check())
                                                                {{ $advisor->full_name }}
                                                            @else
                                                                {{ $advisor->user_id }}
                                                            @endif
                                                        </h2>
                                                
                                                        {{-- <!-- Rating -->
                                                        <div class="flex items-center mb-2">
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
                                                                <img class="w-5 h-5" src="../src/assets/icons/hindi.png" alt="Language Icon" />
                                                                {{-- <p class="text-sm font-medium text-gray-700">
                                                                    {{ $advisor->language_known ?? 'N/A' }}
                                                                </p> --}}

                                                                <p class="text-sm font-medium text-gray-700">
                                                                    English,hindi
                                                                </p>
                                                            </div>
                                                            
                                                            <!-- Price -->
                                                            <div class="flex items-center gap-1">
                                                                <img class="w-5 h-5" src="../src/assets/icons/33.png" alt="Price Icon" />
                                                                <p class="text-sm font-medium text-gray-700">
                                                                    {{ $advisor->conference_call_price_per_minute ?? 'N/A' }}/min
                                                                </p>
                                                            </div>
                                                            
                                                            <!-- Location -->
                                                            <div class="flex items-center gap-1">
                                                                <img class="w-5 h-5" src="../src/assets/icons/location.png" alt="Location Icon" />
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
                                                                onclick="selectDay('{{ $loop->index }}', '{{ $day['day'] }}', '{{ $day['date'] }}')">
                                                                {{ $day['day'] }}<br>{{ $day['date'] }}
                                                            </button>
                                                        @endforeach
                                                    </div>


                                                    <!-- Time Slots for Selected Day -->
                                                    <div id="timeSlots" class="time-slots">
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
                    <hr class="mb-[150px]"></hr>
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
        document.addEventListener('DOMContentLoaded', () => {
            const industryImages = {
                'Agriculture': 'https://th.bing.com/th?id=OSK.HEROSA8c9P6rptIth1zEcY_ucxUA7VnZ_0qem8rxPqDdXp8&w=472&h=280&c=1&rs=2&o=6&dpr=1.3&pid=SANGAM',
                'Automotive': 'https://th.bing.com/th/id/OIP.OFnyccxBpIgggiHAZxWh0QHaHa?w=1022&h=1024&rs=1&pid=ImgDetMain',
                'Banking': 'https://th.bing.com/th/id/OIP.x-AsVjCvFUsJKpN1tlH7jgHaHa?w=1536&h=1536&rs=1&pid=ImgDetMain',
                'Telecommunications': 'https://th.bing.com/th/id/OIP.epjspJg4z48XQnFjPRjQmwAAAA?w=400&h=400&rs=1&pid=ImgDetMain',
                'Ecommerce / D2C': 'https://th.bing.com/th/id/OIP.yzfFrPpZ9h1P3cH1wAn8fgHaHa?w=1080&h=1080&rs=1&pid=ImgDetMain',
                'Financial Services': 'https://res.cloudinary.com/crm-consulting/image/upload/c_scale,w_600/cc/uploads/financial-services.jpg',
                'FMCG': 'https://thumbs.dreamstime.com/b/fmcg-fast-moving-consumer-goods-acronym-business-concept-background-214302409.jpg',
                'Policy & Government': 'https://th.bing.com/th/id/OIP.K9rb2mcMUuOw-ulGbjLhFAHaHa?w=500&h=500&rs=1&pid=ImgDetMain',
                'Healthcare': 'https://th.bing.com/th/id/OIP.bQyN44IONBBlnDkSrN7WugHaHu?rs=1&pid=ImgDetMain',
                'Hospitality': 'https://static.wixstatic.com/media/47d4e0_feaf19f279a747a0859ba2d1e3969df3~mv2.png/v1/fill/w_980,h_642,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/47d4e0_feaf19f279a747a0859ba2d1e3969df3~mv2.png',
                'Higher Education': 'https://thumbs.dreamstime.com/b/illustration-higher-education-higher-studies-image-higher-education-career-aspiration-theme-276587736.jpg',
                'Insurance': 'https://th.bing.com/th/id/OIP.Ye1RAaZ5kMMZGoD6900-4QHaGq?w=1000&h=900&rs=1&pid=ImgDetMain',
                'Logistics': 'https://th.bing.com/th/id/OIP.GM3Pclyv4E6BUsLvVxcvBwAAAA?w=275&h=313&rs=1&pid=ImgDetMain',
                'Manufacturing': 'https://nextworldwebsite.sfo3.cdn.digitaloceanspaces.com/cloudInventory/images/_1000xAUTO_crop_center-center_none/Maximize_Revenue_Cloud.jpg',
                'Media & Entertainment': 'https://grape-to-glass.com/wp-content/uploads/2020/10/VIDEO-Banner-02-1024x533.jpg',
                'Natural Resources': 'https://1.bp.blogspot.com/-koav_pvQ6Kg/XovHnJw8q3I/AAAAAAAAAks/U7a7DBceyh42fgbFbdgXVYO3bjy2X37mgCNcBGAsYHQ/w1200-h630-p-k-no-nu/importance%2Bof%2Bnatural%2Bresources.jpg',
                'Teenage Kids': 'https://thumbs.dreamstime.com/b/teenage-children-standing-one-one-holding-each-other-teenage-children-standing-one-113795959.jpg',
                'Real Estate': 'https://th.bing.com/th/id/OIP.sMDqvvZEUe8ItTmG7IEBtwHaHa?w=600&h=600&rs=1&pid=ImgDetMain',
                'Restaurants': 'https://th.bing.com/th/id/OIP.PJxzeJyZ1wsMCEdKy8Mp0AHaE8?rs=1&pid=ImgDetMain',
                'Retail - Offline': 'https://uploads.unify.uno/resize/eyJidWNrZXQiOiJjb250ZW50Iiwia2V5IjoiMjAyMi83LzMvY291cnNlcy1ldHVkaWFudC0zOTE0NDE0YjQwNzAzYjJjLmpwZWciLCJlZGl0cyI6eyJyZXNpemUiOnsiaGVpZ2h0IjoyMzYsIndpZHRoIjozMTJ9fSwiaGVhZGVycyI6eyJDb250ZW50LVR5cGUiOiJpbWFnZS93ZWJwIn0sIm91dHB1dEZvcm1hdCI6IndlYnAifQ==',
                'Technology': 'https://th.bing.com/th/id/OIP.r_xyCQoLzp_774r9PV1eiAHaHa?w=626&h=626&rs=1&pid=ImgDetMain',
                'Transportation': 'https://cdn.vectorstock.com/i/preview-1x/27/79/transport-infographics-isometric-layout-vector-8892779.jpg',
                'Security & Intelligence': 'https://www.atatus.com/glossary/content/images/2022/04/Security-Intelligence.jpeg',
                'Other': 'https://ohworks.com/wp-content/uploads/2018/07/17352177_s.jpg'
                // Add more mappings as needed
            };

            document.querySelectorAll('.industry-image').forEach(img => {
                const industryName = img.getAttribute('data-industry-name');
                img.src = industryImages[industryName] ||
                    'https://ohworks.com/wp-content/uploads/2018/07/17352177_s.jpg'; // Fallback image
            });
        });
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
