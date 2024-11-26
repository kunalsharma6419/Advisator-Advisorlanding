@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')

        <form action="{{ route('location.detail', ['locationName' => $location->name]) }}" method="GET">
            <div
                class="flex flex-col lg:flex-row gap-[15px] lg:gap-[25px] mt-[10px] lg:mt-[20px] w-[90%] md:w-[95%] lg:w-[90%] mx-auto">
                <div class="flex gap-[26px] w-full lg:w-[30%]">
                    <div class="w-full">
                        <span class="font-[500] hidden lg:flex text-[16px]">
                            Home / Geographies / <span class="font-[600]"> {{ $location->name }}</span></span>
                        <h2 class="font-[500] text-[16px] lg:flex lg:mt-[45px]">
                            Find advisors experience with:
                        </h2>
                        <div class="flex flex-row gap-[12px] lg:gap-0 lg:flex-col mt-[4px] lg:mt-[0px] items-center w-full">
                            <!-- Filter form -->
                            <div class="w-full lg:mt-[12px] mx-auto">
                                <div class="w-full bg-[#FFF6F6] drop-shadow-lg p-6 rounded-[12px]">
                                    <!-- Mobile: Horizontal Swiping with Flex | Web: 2 Columns with Improved Spacing -->
                                    <div class="flex space-x-4 overflow-x-auto md:grid md:grid-cols-2 md:gap-6 md:overflow-visible" style="justify-items: end;">
                                        @foreach ($otherLocations as $otherLocation)
                                            <a href="{{ route('location.detail', $otherLocation->name) }}"
                                               class="flex-none w-[120px] h-[120px] shadow-lg group flex flex-col items-center justify-center gap-2 rounded-lg transition-colors
                                                      {{ $location->name === $otherLocation->name ? 'bg-[#FF3131]' : 'bg-[#5D8D05] hover:bg-[#FF3131]' }} focus:outline-none focus:ring md:w-full">

                                                <!-- Optional Icon Placeholder -->
                                                <img class="w-full h-[72px] geography-image"
                                                     data-country-name="{{ $otherLocation->name }}" src="" alt="{{ $otherLocation->name }}" />

                                                <!-- Location Name -->
                                                <h2 class="font-medium text-[#FFFFFF] transition-colors group-hover:text-white group-active:text-indigo-500 text-center">
                                                    {{ $otherLocation->name }}
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
                                <!-- SVG icon placeholder (you can replace with any relevant SVG icon) -->
                                <svg height="200px" width="200px" class="w-24 h-24 mb-4 text-gray-500" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 504.8 504.8"
                                    xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path style="fill:#FFC52F;"
                                            d="M345.2,313.4c41.2,0,79.6-16,108.8-45.2c60-60,60-157.6,0-217.2C424.8,21.8,386.4,5.8,345.2,5.8 s-79.6,16-108.8,45.2c-58,58-60,151.2-5.6,211.6l11.2,11.2C270.4,299.4,306.8,313.4,345.2,313.4z M256,70.2 c24-24,55.6-36.8,89.2-36.8c33.6,0,65.2,13.2,89.2,36.8c35.6,35.6,45.6,87.2,29.6,132v0.4c-6,16.8-16,32.4-29.2,46 c-24,24-55.6,36.8-89.2,36.8c-33.6,0-65.2-13.2-89.2-36.8C206.8,199.8,206.8,119.4,256,70.2z">
                                        </path>
                                        <path style="fill:#54B265;"
                                            d="M380.8,179.4l12.4,12.4c0.8,0.8,0.8,2,0,2.8c-0.4,0.4-0.8,0.4-1.2,0.4s-1.2,0-1.2-0.4L377.2,181 l-43.6-43.6L306,165l12.8,12.8c0.8,0.8,0.8,2,0,2.8c-0.4,0.4-0.8,0.4-1.2,0.4s-1.2,0-1.2-0.4l-28.4-28L233.2,207 c6,14.4,14.8,27.6,26.4,39.2c23.2,23.2,53.6,35.6,86.4,35.6c32.8,0,63.2-12.8,86.4-35.6c12.8-12.8,22-27.6,28-43.6l-50.8-50.8 L380.8,179.4z">
                                        </path>
                                        <path style="fill:#CDEEF9;"
                                            d="M286.8,147.4c0.4,0,1.2,0,1.2,0.4l14,14l29.2-29.2c0.8-0.8,2-0.8,2.8,0l43.6,43.6l29.2-29.2 c0.8-0.8,2-0.8,2.8,0l50.8,50.8c14-42.4,4.4-91.2-29.6-124.8c-23.2-23.2-53.6-35.6-86.4-35.6S281.2,50.2,258,73 c-34.8,34.8-44.4,86-28,129.6l54.8-54.8C286,147.8,286.4,147.4,286.8,147.4z M379.6,100.6c10,0,18,8,18,18s-8,18-18,18s-18-8-18-18 S369.6,100.6,379.6,100.6z">
                                        </path>
                                        <path style="fill:#E9B526;"
                                            d="M217.2,251.8l-3.6,3.6c-8.8,8.8-8.8,23.6,0,32.4l3.2,3.2c8.8,8.8,23.6,8.8,32.4,0l3.6-3.6 c-6.8-4.8-13.2-10.4-19.2-16.4C227.6,265,222,258.6,217.2,251.8z">
                                        </path>
                                        <path style="fill:#CCCCCC;"
                                            d="M242,273.8l-11.2-11.2c1.6,2,3.6,4,5.6,5.6C238.4,270.2,240,271.8,242,273.8z">
                                        </path>
                                        <path style="fill:#E8E3E3;"
                                            d="M214,293.8l-3.2-3.2c-1.6-1.6-2.8-2.8-3.6-4.4L176,317.4l11.2,11.2l31.2-31.2 C216.8,296.2,215.2,295,214,293.8z">
                                        </path>
                                        <path style="fill:#EF934A;"
                                            d="M12.8,459c-9.2,9.2-9.2,23.6,0,32.8c4.4,4.4,10.4,6.8,16.4,6.8c6.4,0,12-2.4,16.4-6.8l144.8-154 l-4.8-4.8l0,0l-14-14l0,0l-4.8-4.8L12.8,459z">
                                        </path>
                                        <polygon style="fill:#CCCCCC;" points="185.6,333 185.6,333 171.6,319 171.6,319 ">
                                        </polygon>
                                        <path style="fill:#E07D46;"
                                            d="M379.6,132.2c7.6,0,14-6.4,14-14s-6.4-14-14-14s-14,6.4-14,14C365.6,126.2,372,132.2,379.6,132.2z">
                                        </path>
                                        <path
                                            d="M345.2,319.4c-88,0-159.6-71.6-159.6-159.6S257.2,0.2,345.2,0.2s159.6,71.6,159.6,159.6 C504.8,247.8,433.2,319.4,345.2,319.4z M345.2,7.8c-83.6,0-151.6,68-151.6,151.6S261.6,311,345.2,311s151.6-68,151.6-151.6 S428.8,7.8,345.2,7.8z">
                                        </path>
                                        <path
                                            d="M345.2,287.8c-70.8,0-128-57.6-128-128c0-70.8,57.6-128,128-128s128,57.6,128,128S415.6,287.8,345.2,287.8z M345.2,39.4 c-66.4,0-120,54-120,120c0,66.4,54,120,120,120s120-54,120-120S411.2,39.4,345.2,39.4z">
                                        </path>
                                        <path
                                            d="M232.8,303.4c-7.6,0-14.8-2.8-20.4-8.4l-3.2-3.2c-11.2-11.2-11.2-29.6,0-40.8l5.2-5.2c1.6-1.6,4-1.6,5.6,0s1.6,4,0,5.6 l-5.2,5.2c-8,8-8,21.2,0,29.6l3.2,3.2c4,4,9.2,6,14.8,6s10.8-2,14.8-6l5.2-5.2c1.6-1.6,4-1.6,5.6,0s1.6,4,0,5.6l-5.2,5.2 C248,300.6,240.8,303.4,232.8,303.4z">
                                        </path>
                                        <path
                                            d="M187.2,335.4c-1.2,0-2-0.4-2.8-1.2l-14-14c-0.8-0.8-1.2-1.6-1.2-2.8s0.4-2,1.2-2.8l34-34c1.6-1.6,4-1.6,5.6,0s1.6,4,0,5.6 l-31.2,31.2l8.4,8.4l31.2-31.2c1.6-1.6,4-1.6,5.6,0s1.6,4,0,5.6l-34,34C189.2,335,188,335.4,187.2,335.4z">
                                        </path>
                                        <path
                                            d="M29.2,504.6c-7.6,0-14.8-2.8-20.8-8.4c-11.2-11.2-11.2-30,0-41.2L164,308.6c1.6-1.6,4-1.6,5.6,0L196,335 c1.6,1.6,1.6,4,0,5.6L50,495.8C44.4,501.4,36.8,504.6,29.2,504.6z M166.8,317L14.4,460.6c-8,8-8,21.6,0,30c8.4,8.4,21.6,8.4,30,0 l143.2-152.4L166.8,317z">
                                        </path>
                                        <path
                                            d="M32,481.4c-1.2,0-2-0.4-2.8-1.2l-18.8-18.8c-1.6-1.6-1.6-4,0-5.6s4-1.6,5.6,0l18.8,18.8c1.6,1.6,1.6,4,0,5.6 C34,481,33.2,481.4,32,481.4z">
                                        </path>
                                        <path
                                            d="M431.2,114.6c-1.2,0-2.8-0.8-3.6-2c-17.6-30.8-50.8-49.2-86.4-48c-2.4,0-4-1.6-4-4s1.6-4,4-4c38.4-1.6,74.4,18.4,93.6,52 c1.2,2,0.4,4.4-1.6,5.6C432.4,114.2,431.6,114.6,431.2,114.6z">
                                        </path>
                                        <path
                                            d="M230.4,210.2c-1.2,0-2-0.4-2.8-1.2c-1.6-1.6-1.6-4,0-5.6l56.8-56.8c1.6-1.6,4-1.6,5.6,0s1.6,4,0,5.6L233.2,209 C232.4,209.8,231.2,210.2,230.4,210.2z">
                                        </path>
                                        <path
                                            d="M316.4,183c-1.2,0-2-0.4-2.8-1.2L284,152.2c-1.6-1.6-1.6-4,0-5.6s4-1.6,5.6,0l29.6,29.6c1.6,1.6,1.6,4,0,5.6 C318.4,182.6,317.6,183,316.4,183z">
                                        </path>
                                        <path
                                            d="M302.4,169c-1.2,0-2-0.4-2.8-1.2c-1.6-1.6-1.6-4,0-5.6l30.4-30.4c1.6-1.6,4-1.6,5.6,0s1.6,4,0,5.6l-30.4,30.4 C304.4,168.6,303.2,169,302.4,169z">
                                        </path>
                                        <path
                                            d="M378,183.4c-1.2,0-2-0.4-2.8-1.2c-1.6-1.6-1.6-4,0-5.6l30.8-30.8c1.6-1.6,4-1.6,5.6,0s1.6,4,0,5.6l-30.8,30.8 C380,183,378.8,183.4,378,183.4z">
                                        </path>
                                        <path
                                            d="M391.6,197c-1.2,0-2-0.4-2.8-1.2L330,137c-1.6-1.6-1.6-4,0-5.6s4-1.6,5.6,0l58.8,58.8c1.6,1.6,1.6,4,0,5.6 C393.6,196.6,392.8,197,391.6,197z">
                                        </path>
                                        <path
                                            d="M462,205.8c-1.2,0-2-0.4-2.8-1.2L406,151.4c-1.6-1.6-1.6-4,0-5.6s4-1.6,5.6,0l53.2,53.2c1.6,1.6,1.6,4,0,5.6 C464,205.4,462.8,205.8,462,205.8z">
                                        </path>
                                        <path
                                            d="M379.6,138.2c-10.8,0-20-8.8-20-20s8.8-20,20-20s20,8.8,20,20S390.8,138.2,379.6,138.2z M379.6,106.6c-6.4,0-12,5.2-12,12 s5.2,12,12,12c6.4,0,12-5.2,12-12S386,106.6,379.6,106.6z">
                                        </path>
                                    </g>
                                </svg>

                                <h1 class="text-2xl font-bold text-center text-gray-600">
                                    No advisors found matching in your
                                    @if (isset($location))
                                        location: <span class="text-red-500">{{ $location->name }}</span>
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
                                                        </div>
                                                 --}}

                                                 
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

{{-- 


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
        document.addEventListener('DOMContentLoaded', () => {
            // Mapping of country names to their online image URLs
            const countryImages = {
                'India': 'https://assets.gqindia.com/photos/62f9c75e0d4e31701fb885d6/1:1/w_1080,h_1080,c_limit/Lesser-known-facts-about-India.jpeg',
                'Australia': 'https://s3-ap-southeast-2.amazonaws.com/media.meritonsuites.com.au/wp-content/uploads/2020/11/09173136/Carosel_websitetile-01.png',
                'Singapore': 'https://thumbs.dreamstime.com/b/merlion-statue-merlion-park-marina-bay-sands-hotel-singapore-singapore-march-spraying-water-its-mouth-singapore-74803116.jpg',
                'China': 'https://i.pinimg.com/originals/70/27/41/70274100e2492c16377ce3393b4f4e3d.jpg',
                'APAC - Other': 'https://www.journalistsfreedom.com/wp-content/uploads/2021/11/apac-2.png',
                'Canada': 'https://www.gostudycanada.com/wp-content/uploads/2021/06/iStock-1186094638-2800x1869.jpg',
                'Europe': 'https://www.leger.co.uk/blog/wp-content/uploads/2015/01/iStock_000015137777_Large.jpg',
                'Middle East': 'https://th.bing.com/th/id/R.10b449f65f4dc6294abc90c5e53ea424?rik=uhBWT5n0Ibpg0w&riu=http%3a%2f%2fwww.zonu.com%2fimages%2f0X0%2f2009-11-17-11127%2fMiddle-East-Political-Map.jpg&ehk=VuI2C9fDJa8X7iya3HdXCQoMYPg6B1GWvxLggoPCURM%3d&risl=&pid=ImgRaw&r=0',
                'Africa': 'https://th.bing.com/th/id/R.e7c49975162968438bbfa13e36d30bf3?rik=KK3%2fJ0JihLHfJg&riu=http%3a%2f%2fupload.wikimedia.org%2fwikipedia%2fcommons%2fe%2fec%2fAerial_View_of_Sea_Point%2c_Cape_Town_South_Africa.jpg&ehk=LJYkXPWDg%2bB6tLhGpdbYGL9kSMiO77gGOowrNJECXdc%3d&risl=&pid=ImgRaw&r=0',
                'United States': 'https://www.mapsland.com/maps/north-america/usa/large-physical-map-of-the-united%20states-with-major-cities.jpg',
                // Add more countries and their respective image URLs here...
            };

            // Select all images with class 'geography-image'
            document.querySelectorAll('.geography-image').forEach(img => {
                const countryName = img.getAttribute('data-country-name');

                // If a mapping exists for this country, update the image source
                if (countryImages[countryName]) {
                    img.src = countryImages[countryName];
                } else {
                    img.src = 'https://example.com/images/default.png'; // Fallback image
                }
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
