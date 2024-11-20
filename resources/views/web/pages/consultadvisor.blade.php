@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')



        <!-- main -->
        <form action="{{ route('consult-advisor') }}" method="GET">
            <div
                class="flex flex-col lg:flex-row gap-[15px] lg:gap-[25px] mt-[10px] lg:mt-[20px] w-[90%] md:w-[95%] lg:w-[90%] mx-auto">
                <!-- search box for moblie screen -->
                {{-- <div
                    class="flex p-3 mx-auto lg:hidden bg-white border border-[#EAEAEA] rounded-[40px] justify-between w-full md:w-[80%]">
                    <input class="bg-white rounded-[40px]" name="search" id="search-bar-mobile"
                            placeholder="Search Advisor" type="text" autocomplete="off"/>
                    <button type="submit"
                        class="flex items-center bg-[#EDF6DB] px-[12px] py-[10px] md:px-[32px] rounded-[40px] md:py-[12px] gap-1 md:gap-5">
                        <i class="fa-solid fa-magnifying-glass fa-xs" style="color: #000000"></i>
                        <p class="font-[500] text-[10px] lg:text-[16px]">Find Advisor</p>
                    </button>
                        <div id="suggestions-dropdown-mobile" class="absolute hidden w-full mt-2 bg-white rounded-lg shadow-lg">
                </div> --}}
                <!-- left -->
                <div class="flex gap-[26px] w-full lg:w-[15%]">
                    <div class="w-full">
                        <span class="font-[500] hidden lg:flex text-[16px]">
                            Home /<span class="font-[600]"> Consult Advisor</span></span>
                        <h3 class="font-[500] text-[16px] flex lg:hidden lg:mt-[5px]">
                            Filter
                        </h3>
                        <h2 class="font-[500] text-[16px] hidden lg:flex lg:mt-[45px]">
                            Filter by:
                        </h2>
                        <div class="flex flex-row gap-[12px] lg:gap-0 lg:flex-col mt-[4px] lg:mt-[0px] items-center w-full">
                            <!-- Filter form -->
                            <div class="w-full lg:mt-[12px] mx-auto">
                                <!-- Business Functions Dropdown -->
                                <select name="business_function"
                                    class="w-full bg-[#FFF6F6] drop-shadow-lg p-3 rounded-[12px]">
                                    <option value="">Business Functions</option>
                                    @foreach ($businessFunctions as $function)
                                        <option value="{{ $function->id }}"
                                            {{ request('business_function') == $function->id ? 'selected' : '' }}>
                                            {{ $function->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Sub-Functions Dropdown -->
                                <select id="sub-function-dropdown" name="sub_function"
                                    class="w-full mt-[12px] bg-[#FFF6F6] drop-shadow-lg p-3 rounded-[12px]">
                                    <option value="">Select Sub-Function</option>
                                    <!-- Sub-functions will be dynamically populated here -->
                                </select>

                                <!-- Industry Dropdown -->
                                <select name="industry"
                                    class="w-full mt-[12px] bg-[#FFF6F6] drop-shadow-lg p-3 rounded-[12px]">
                                    <option value="">Industry</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry->id }}"
                                            {{ request('industry') == $industry->id ? 'selected' : '' }}>
                                            {{ $industry->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Location Dropdown -->
                                <select name="location"
                                    class="w-full mt-[12px] bg-[#FFF6F6] drop-shadow-lg p-3 rounded-[12px]">
                                    <option value="">Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->name }}"
                                            {{ request('location') == $location->name ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Price Range -->
                                <!-- Price Range Filter -->
                                <div class="w-full mt-[12px] bg-[#FFF6F6] drop-shadow-lg p-3 rounded-[12px]">
                                    <label for="price-range" class="block text-gray-700">Price (per minute)</label>
                                    <input type="range" name="price" id="price-range" class="w-full accent-[#C95555]"
                                        min="0" max="1000" value="{{ request('price', 100) }}"
                                        oninput="this.nextElementSibling.textContent = `₹${this.value}/min`">
                                    <span>₹{{ request('price', 100) }}/min</span>
                                </div>

                                <!-- Availability Checkbox -->
                                <label
                                    class="w-full mt-[12px] bg-[#FFF6F6] drop-shadow-lg p-3 rounded-[12px] flex items-center">
                                    <input type="checkbox" name="available" {{ request('available') ? 'checked' : '' }} />
                                    <span class="ml-2">Available</span>
                                </label>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full bg-[#C95555] mt-[12px] text-white p-3 rounded-[12px]">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div class="lg:w-[90%] mx-auto w-full">
                    <!-- serach box  for lg screen-->
                    {{-- <div
                    class="lg:flex hidden p-3 mx-auto bg-white border border-[#EAEAEA] rounded-[50px] justify-between w-[80%]">
                    <input name="search" class="bg-white rounded-[50px] w-full px-4" placeholder="Search Advisor"
                        type="text" value="{{ request('search') }}" />
                    <button type="submit"
                        class="flex items-center w-[300px] bg-[#EDF6DB] px-[32px] rounded-[40px] py-[8px] gap-5">
                        <i class="fa-solid fa-magnifying-glass" style="color: #000000"></i>
                        <p>Find Advisor</p>
                    </button>
                </div> --}}
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


                    <!-- advisors row -->
                    <div class="flex flex-col mt-6 lg:mt-[5px] gap-5 ">
                        <!-- 1st row for Advisors -->
                        @if ($advisors->isEmpty())
                            <p>No advisors found matching your criteria.</p>
                        @else
                            @foreach ($advisors->chunk(2) as $chunk)
                                <div class="w-full flex flex-wrap lg:flex-nowrap gap-[35px]">
                                    <!-- 1st  -->
                                    @foreach ($chunk as $advisor)
                                        <div
                                            class="flex w-full xl:w-[50%] border hover:border-red-500 shadow-xl rounded-[20px] shadow-[#00000026] flex-col">
                                            <a href="{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}">
                                                <div class="bg-[#FFFACA] py-2 rounded-tl-[20px] rounded-tr-[20px] px-2 flex justify-between">
                                                    <p class="text-[12px] font-[500] text-[#B58300]">
                                                        {{ $advisor->is_super_advisor == 'true' ? 'Super Advisor' : 'Advisor' }}
                                                    </p>
                                                    <div class="flex items-center gap-1">
                                                        <i class="fa-solid fa-circle fa-xs" style="color: #6a9023"></i>
                                                        <p class="text-[12px] font-[600] text-[#6a9023]">
                                                            {{ $advisor->is_available ? 'Available' : 'Not Available' }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="px-4 pb-3 mt-4 sm:mt-0">
                                                    <!-- Profile Info -->
                                                    <div
                                                        class="flex items-start justify-center w-full gap-4 sm:items-center sm:gap-16 lg:gap-8">
                                                        <!-- Avatar -->
                                                        <div class="flex flex-col">
                                                            <!-- Placeholder image for avatar -->
                                                            <h2
                                                                class="text-xl sm:block hidden mb-[20px] font-semibold text-gray-800">
                                                                @if (Auth::check())
                                                                    {{ $advisor->full_name }}
                                                                @else
                                                                    {{ $advisor->user_id }}
                                                                @endif
                                                            </h2>
                                                            <img class="w-[180px] sm:w-[120px] h-[120px]"
                                                                src="{{ $advisor->profile_photo_path ? asset('storage/' . $advisor->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                                                alt="{{ $advisor->full_name }}" />
                                                            <div class="flex flex-col gap-[4px]">
                                                                <div class="flex items-center gap-1">
                                                                    <img class="w-[20px] h-[20px]"
                                                                        src="../src/assets/icons/hindi.png"
                                                                        alt="" />
                                                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                                                        {{ $advisor->language_known ?? 'N/A' }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <img class="w-[20px] h-[20px]"
                                                                        src="../src/assets/icons/33.png" alt="" />
                                                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                                                        {{ $advisor->conference_call_price_per_minute ?? 'N/A' }}/min
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center gap-1">
                                                                    <img class="w-[20px] h-[20px]"
                                                                        src="../src/assets/icons/location.png"
                                                                        alt="" />
                                                                    <p class="text-[12px] font-[500] text-[#3A3A3A]">
                                                                        {{ $advisor->location }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Name and Details -->
                                                        <div class="">
                                                            <div class="flex justify-between">
                                                                <h2
                                                                    class="text-xl font-semibold text-gray-800 opacity-100 sm:opacity-0">
                                                                    {{ $advisor->full_name }}
                                                                </h2>
                                                                <!-- Top Section: Availability and Rating -->
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center">
                                                                        <span class="text-sm text-yellow-500">★</span>
                                                                        <span
                                                                            class="ml-1 text-sm font-semibold text-gray-800">4.9</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="grid grid-cols-3 gap-2 ">
                                                                    <!-- Business Function -->
                                                                    <div class="col-span-3">
                                                                        <p class="font-semibold text-gray-700">
                                                                            Business Function :
                                                                        </p>
                                                                        <p
                                                                            class="text-sm mt-1 flex gap-[5px] flex-wrap items-center  w-full text-gray-600">
                                                                            @if ($advisor->businessFunctionCategory)
                                                                                <span
                                                                                    class="bg-[#F7EAEA] border border-[#FFD3D3] rounded-md p-1">
                                                                                    {{ $advisor->businessFunctionCategory->name }}
                                                                                </span>
                                                                            @endif
                                                                        </p>
                                                                    </div>

                                                                    <!-- Sub Business Function -->
                                                                    <div class="col-span-3">
                                                                        <p class="font-semibold text-gray-700">
                                                                            Sub Business Function :
                                                                        </p>
                                                                        <p
                                                                            class="text-sm mt-1 flex gap-[5px] flex-wrap items-center  w-full text-gray-600">
                                                                            @if ($advisor->subFunctionCategory1)
                                                                                <span
                                                                                    class="bg-[#F7EAEA]  border border-[#FFD3D3] rounded-md p-1">
                                                                                    {{ $advisor->subFunctionCategory1->name }}
                                                                                </span><span class="hidden md:block">
                                                                                    &nbsp;•&nbsp;
                                                                                </span>
                                                                            @endif
                                                                            @if ($advisor->subFunctionCategory2)
                                                                                <span
                                                                                    class="bg-[#F7EAEA] border  border-[#FFD3D3] rounded-md p-1">
                                                                                    {{ $advisor->subFunctionCategory2->name }}</span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <!-- Industry -->
                                                                    <div class="col-span-3">
                                                                        <p class="font-semibold text-gray-700">Industry :
                                                                        </p>
                                                                        <p
                                                                            class="text-sm mt-1 flex gap-[5px] flex-wrap items-center  w-full text-gray-600">
                                                                            @foreach ($advisor->getIndustries() as $industry)
                                                                                <span
                                                                                    class="bg-[#F7EAEA] border border-[#FFD3D3] rounded-md p-1">
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
                                                                        <p class="font-semibold text-gray-700">Geography :
                                                                        </p>
                                                                        <p
                                                                            class="text-sm mt-1 flex gap-[5px] flex-wrap items-center  w-full text-gray-600">
                                                                            @foreach ($advisor->getGeographies() as $geography)
                                                                                <span
                                                                                    class="bg-[#F7EAEA]  border border-[#FFD3D3] rounded-md p-1">
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


                                                        <div
                                                        class="flex flex-col items-start gap-2 mt-6 sm:flex-row md:items-center md:justify-center"
                                                       >

                                                        <button onclick="handleDiscoveryCall('{{ $advisor->user_id }}')"
                                                            class="bg-[#6a9023] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-green-600">
                                                            Discovery call
                                                        </button>

                                                        <button onclick="handleConsultationCall('{{ $advisor->user_id }}')"
                                                            class="bg-[#ff3131] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-orange-600">
                                                            Consultation call
                                                        </button>

                                                        <button onclick="showBookingAlert(event, '{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}')"
                                                            class="bg-[#C95555] w-full sm:w-auto text-white px-4 py-2 rounded-md hover:bg-red-600">
                                                            Book Appointment
                                                        </button>




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

                                                        <!-- Notify Me -->
                                                        <div
                                                            class="flex items-center justify-center flex-col bg-transparent w-full border border-black sm:w-auto text-white px-4 py-[10px] rounded-md gap-[4px] hover:bg-red-600 hover:text-white">
                                                            <div class="flex items-center gap-1">
                                                                <i class="fa-regular fa-bell fa-xs"
                                                                    style="color: #c95555"></i>
                                                                <p class="text-[12px] font-[500] text-[#C95555]">
                                                                    Notify me
                                                                </p>
                                                            </div>
                                                        </div>



                                                        <div id="appointmentModal"
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
                                                                            <button
                                                                                id="slot-{{ $availability->time_slot }}"
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
                                                                <button
                                                                    class="w-full p-2 mt-4 text-white bg-red-500 rounded"
                                                                    onclick="closeBookingModal()">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <hr class="mb-[100px]">
                    </hr>
                    {{-- <div id="advisors-container" class="flex flex-col mt-[0px] lg:mt-[5px] gap-5">
                    <!-- Advisors will be dynamically appended here -->
                </div>
                <div id="loading" class="py-4 text-center">
                    <p class="text-gray-500">Loading more advisors...</p>
                </div> --}}



                </div>
            </div>
        </form>

        <!-- bottom menu bar -->
        @include('web.components.bottommenu')

        <!-- side bar -->
        @include('web.components.sidebar')

        @include('web.components.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include SweetAlert2 and Tailwind Modal Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function updatePrice(value) {
            document.getElementById("minPrice").textContent = "₹" + value;
        }
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
        document.querySelector('select[name="business_function"]').addEventListener('change', function() {
            let businessFunctionId = this.value;
            let subFunctionDropdown = document.querySelector('#sub-function-dropdown');

            // Clear existing options
            subFunctionDropdown.innerHTML = '<option value="">Select Sub-Function</option>';

            if (businessFunctionId) {
                // Fetch sub-functions
                fetch(`/get-sub-functions?business_function_id=${businessFunctionId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate sub-function dropdown
                        data.forEach(function(subFunction) {
                            let option = document.createElement('option');
                            option.value = subFunction.id;
                            option.text = subFunction.name;
                            subFunctionDropdown.appendChild(option);
                        });
                    });
            }
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchBar = document.getElementById('search-bar');
            const suggestionsDropdown = document.getElementById('suggestions-dropdown');

            if (!searchBar || !suggestionsDropdown) {
                console.error('Search bar or suggestions dropdown element not found.');
                return;
            }

            searchBar.addEventListener('input', function() {
                let searchQuery = this.value;

                if (searchQuery.length > 2) {
                    fetchSuggestions(searchQuery);
                } else {
                    suggestionsDropdown.classList.add('hidden');
                }
            });

            function fetchSuggestions(query) {
                // Send an AJAX request to the server
                fetch(`/advisor-suggestions?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        if (!Array.isArray(data)) {
                            console.error('Unexpected data format:', data);
                            return;
                        }

                        suggestionsDropdown.innerHTML = '';

                        if (data.length > 0) {
                            data.forEach(advisor => {
                                let option = document.createElement('div');
                                option.className = 'p-2 cursor-pointer hover:bg-gray-100';
                                option.innerText = advisor.full_name;
                                option.addEventListener('click', function() {
                                    searchBar.value = advisor.full_name;
                                    suggestionsDropdown.classList.add('hidden');
                                });
                                suggestionsDropdown.appendChild(option);
                            });
                            suggestionsDropdown.classList.remove('hidden');
                        } else {
                            suggestionsDropdown.classList.add('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching suggestions:', error);
                    });
            }
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
@endsection
