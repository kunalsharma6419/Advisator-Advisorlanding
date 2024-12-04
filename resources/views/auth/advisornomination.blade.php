<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Advisor Nomination</title>

    <!-- <link href="../output.css" rel="stylesheet"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        Roboto: "Roboto",
                    },
                    colors: {
                        clifford: "#da373d",
                    },
                },
            },
        };
    </script>
    <script src="https://kit.fontawesome.com/5c118959dd.js" crossorigin="anonymous"></script>

    <!-- checkbox -->
    <style>
        #myCheckbox {
            accent-color: #6a9023;
        }
    </style>
    <!-- for active button -->

    <style>
        .checked {
            background-color: #db5001;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div
        class="flex font-Roboto lg:px-[60px] lg:py-[40px] text-[#2A2A2A] w-full flex-row justify-between items-center lg:gap-[56px]">
        <!-- 1 row -->
        <div class="hidden lg:flex flex-col items-center w-full">
            <div class="relative">
                <img class="w-[573px] h-full" src="../../../src/assets/Group 750.png" />
            </div>
        </div>
        <!-- 2nd row -->
        <div class="flex flex-col bg-[#F6F8F1] px-[20px] lg:px-[30px] rounded-[18px] py-[30px] w-full">
            <!-- welcome -->
            <div class="flex w- flex-col gap-[4px]">
                <a href="{{ route('home') }}"><img class="w-[154px] h-[72px]"
                        src="../../../src/assets/auth/Rectangle 546.png" alt="" /></a>
                <p class="font-[400] text-[16px]">
                    Advisor Nomination form. Please fill in the details below
                </p>
            </div>

            <form id="nominationForm" method="POST" class="flex flex-col mt-[35px] gap-[28px] px-30"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->unique_id }}">
                <div>
                    <label for="full_name">Full Name <span class="text-[#ff0909]">*</span> :</label>
                    <input class="w-full px-[18px] py-[14px] h-[60px] rounded-[8px] shadow-lg" type="text"
                        id="full_name" name="full_name" value="{{ $user->full_name }}" readonly />
                </div>
                <div>
                    <label for="email">Email <span class="text-[#ff0909]">*</span> :</label>
                    <input class="w-full mt-[12px] h-[60px] px-[18px] py-[14px] rounded-[8px] shadow-lg" type="email"
                        id="email" name="email" value="{{ $user->email }}" readonly />
                </div>

                <div>
                    <label for="mobile_number">Mobile Number <span class="text-[#ff0909]">*</span> :</label>
                    <div class="p-[18px] mt-[18px] w-full flex gap-[12px] rounded-[12px] bg-white">

                        <input type="text" class="w-full" id="mobile_number" name="mobile_number"
                            value="{{ $user->phone_number }}" readonly />
                    </div>
                </div>

                <div>
                    <label for="location">Location <span class="text-[#ff0909]">*</span> :</label>
                    <input placeholder="Location" class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg"
                        type="text" id="location" name="location" required />
                </div>

                <div>
                    <label for="linkedin_profile">LinkedIn Profile :</label>
                    <div class="p-[18px] mt-[18px] w-full flex gap-[12px] rounded-[12px] bg-white">
                        <input class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg"
                            placeholder="LinkedIn Profile link" type="url" id="linkedin_profile"
                            name="linkedin_profile" />
                        {{-- <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i> --}}
                    </div>
                </div>

                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>
                <h2 class="font-[500] text-[16px]">Select Business Function <span class="text-[#ff0909]">*</span>  ::</h2>
                <p class="font-[400] text-[16px]" style="color: #db5001">
                    Each nomination form allows an advisor to choose one primary business function and two
                    sub-functions. For instance, under business function, one could select "digital platforms," with
                    sub-functions such as "web & apps" and "softwares & packages."
                </p>

                <div class="flex flex-col gap-[28px]">
                    <div class="w-full mx-auto">
                        <select id="business_function_category_id" name="business_function_category_id"
                            class="w-full p-2 rounded-[12px]" required>
                            <option value="" disabled selected>Choose Business Function <span class="text-[#ff0909]">*</span></option>
                            @foreach ($businessFunctionCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    {{-- <div class="border border-gray-400 border-1 my-30"></div> --}}

                    <div class="w-full mx-auto" id="sub_function_1" style="display:none;">
                        <label for="sub_function_category_id_1">Select Sub Function 1 <span class="text-[#ff0909]">*</span> :</label>
                        <select id="sub_function_category_id_1" name="sub_function_category_id_1"
                            class="w-full p-2 rounded-[12px]" required>
                            <option value="">Select one Option</option>
                        </select>
                    </div>

                    {{-- <div class="border border-gray-400 border-1 my-30"></div> --}}

                    <div class="w-full mx-auto" id="sub_function_2" style="display:none;">
                        <label for="sub_function_category_id_2">Select Sub Function 2 :</label>
                        <select id="sub_function_category_id_2" name="sub_function_category_id_2"
                            class="w-full p-2 rounded-[12px]">
                            <option value="">Select one Option</option>
                        </select>
                    </div>
                    <div class="border border-gray-400 border-1 my-30"></div>

                    <div class="w-full mx-auto">
                        <label for="industry">Select Industry Verticals <span class="text-[#ff0909]">*</span> :</label>
                        <div class="relative inline-block border-b border-dotted border-black group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 cursor-pointer"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 16h-1v-4h-1m0-4h.01M12 17h0a1 1 0 010 2h0a1 1 0 010-2zm0-10h0a1 1 0 010 2h0a1 1 0 010-2z" />
                            </svg>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-50 bg-[#6AA300] text-white text-center rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                To select multiple Industry verticals, use Ctrl + Click
                                <span
                                    class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-5 border-solid border-transparent border-t-gray-700"></span>
                            </span>
                        </div>
                        <p class="mt-[18px]" style="color: #db5001">Each nomination form allows an advisor to select at
                            the most 3 Industry verticals.</p>
                        <select id="industry" name="industry[]" class="w-full p-2 rounded-[12px] mt-[18px]" multiple>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" id="other-industry" name="other_industry"
                            class="w-full p-2 rounded-[12px] mt-[18px] hidden"
                            placeholder="Please mention other industry">
                    </div>
                    <div class="border border-1 my-30 border-[#AFAFAF]"></div>

                    <div class="w-full mx-auto">
                        <label for="geography">Select Geographical Locations<span class="text-[#ff0909]">*</span> :</label>
                        <div class="relative inline-block border-b border-dotted border-black group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 cursor-pointer"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 16h-1v-4h-1m0-4h.01M12 17h0a1 1 0 010 2h0a1 1 0 010-2zm0-10h0a1 1 0 010 2h0a1 1 0 010-2z" />
                            </svg>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-50 bg-[#6AA300] text-white text-center rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                To select multiple Geographical locations, use Ctrl + Click
                                <span
                                    class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-5 border-solid border-transparent border-t-gray-700"></span>
                            </span>
                        </div>
                        <p class="mt-[18px] " style="color: #db5001">Each nomination form allows an advisor to select
                            3 geographical regions.</p>
                        <select id="geography" name="geography[]" class="w-full p-2 rounded-[12px] mt-[18px]"
                            multiple>
                            {{-- <option selected>Select Geographical Locations</option> --}}
                            @foreach ($geographies as $geography)
                                <option value="{{ $geography->id }}">{{ $geography->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div> --}}

                {{-- <div>
                    <label for="nominee_qualification">Nominee Qualification :</label>
                    <input type="text" class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg"
                        id="nominee_qualification" name="nominee_qualification" placeholder="Nominee Qualification"
                        required>
                </div>

                <div>
                    <label for="nominee_experience">Nominee Experience (Years)</label>
                    <input type="number" class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg"
                        id="nominee_experience" name="nominee_experience" placeholder="Nominee Experience (Years)"
                        required>
                </div> --}}

                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>
                <div class="flex flex-col gap-[12px]">
                    <h3 class="text-[18px] font-[500]">Availability<span class="text-[#ff0909]">*</span> </h3>
                    <div class="flex items-center justify-between">
                        <p class="text-[16px] font-[500] text-[#828282]">
                            Please choose your availability
                        </p>
                        <button type="button" id="myBtn"
                            class="text-[16px] font-[600] rounded-[18px] text-center w-[200px] py-[10px] text-white bg-[#6A9023]">
                            Choose Availability
                        </button>
                    </div>
                    <!-- Display selected availability -->
                    <div id="availabilityList"></div>
                    <!-- Hidden input to store availability data -->
                    <input type="hidden" id="availabilityInput" name="availability">
                </div>

                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>

                <div id="myModal" class="modal hidden fixed z-50 inset-0 overflow-y-auto">
                    <div
                        class="modal-content bg-white p-4 md:p-8 rounded shadow-lg relative z-10 mx-auto mt-10 md:mt-20 w-full md:w-3/4 lg:w-2/3 max-w-4xl">
                        <span class="close absolute top-2 right-2 text-gray-600 cursor-pointer">&times;</span>
                        <div class="bg-white p-4 md:p-8">
                            <h2 class="text-[16px] md:text-[20px] font-[500] text-[#526E1C]">
                                Choose your Availability
                            </h2>
                            <div class="overflow-x-auto">
                                <table class="w-full mt-[20px] md:mt-[30px]">
                                    <tbody>
                                        <!-- Time row -->
                                        <tr>
                                            <td></td>
                                            @php
                                                $slots = [
                                                    '9AM-10AM',
                                                    '10AM-11AM',
                                                    '11AM-12PM',
                                                    '12PM-1PM',
                                                    '1PM-2PM',
                                                    '2PM-3PM',
                                                    '3PM-4PM',
                                                    '4PM-5PM',
                                                    '5PM-6PM',
                                                    '6PM-7PM',
                                                    '7PM-8PM',
                                                    '8PM-9PM',
                                                    '9PM-10PM',
                                                ];
                                            @endphp
                                            @foreach ($slots as $slot)
                                                <td class="text-[10px] md:text-[14px] font-[600] text-[#C95555]">
                                                    <div class="flex flex-col items-center">
                                                        <p>{{ explode('-', $slot)[0] }}</p>
                                                        <p>-</p>
                                                        <p>{{ explode('-', $slot)[1] }}</p>
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <!-- Days rows -->
                                        @php
                                            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                        @endphp
                                        @foreach ($days as $day)
                                            <tr
                                                class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] text-[12px] md:text-[18px] font-[500]">
                                                <td>{{ $day }}</td>
                                                @foreach ($slots as $slot)
                                                    <td>
                                                        <input class="w-[20px] h-[20px] md:w-[34px] md:h-[34px]"
                                                            type="checkbox" id="{{ $day . '-' . $slot }}" />
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="mt-[10px] md:mt-[20px] bg-blue-500 text-white px-4 py-2 rounded"
                            id="closeBtn">Save Availability</button>
                    </div>
                </div>


                {{-- <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div> --}}
                {{-- <div class="p-[18px] mt-[18px] w-full justify-between flex gap-[12px] rounded-[12px] bg-white">
                    <p class="text-[18px] font-[500]">Attach Documents (optional)</p>
                    <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i>
                </div>
                <a href="https://forms.gle/JGCLAJ7RZXwtXGat6" target="_blank"></a> --}}
                {{-- <input type="file" name="document_path" accept=".pdf,.doc,.docx" id="documentPathInput"
                    onchange="previewDocument(event)">
                @error('document_path')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror

                <div id="documentPreview" class="mt-4"></div> --}}

                {{-- <div class="flex flex-col gap-[12px]">
                    <div class="flex justify-between">
                        <h4 class="text-[16px] font-[400]">Set Your Advisory Price (per minute) ::</h4>
                        <div
                            class="flex justify-between border border-[#828282] gap-[8px] w-[220px] rounded-[8px] px-3 bg-white py-2">
                            <button id="btnMinute"
                                class="tabButton bg-red-500 text-white px-4 py-2 text-[16px] rounded-[8px] font-[500]"
                                onclick="openContent('minute', event)">
                                Minute
                            </button>
                            <button id="btnHour"
                                class="tabButton bg-white text-black px-4 py-2 text-[16px] rounded-[8px] font-[500]"
                                onclick="openContent('hour', event)">
                                Hour
                            </button>
                        </div>
                    </div>

                    <div id="minute" class="city w-full" style="display: block">
                        <div class="flex flex-col md:flex-row items-start md:items-center w-full justify-between">
                            <!-- Discovery call section -->
                            <div class="flex flex-col gap-[12px] mb-4 md:mb-0 md:mr-4 w-full md:w-auto">
                                <h2 class="text-[16px] font-[500]">Discovery call :
                                    <div class="relative inline-block border-b border-dotted border-black group">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-blue-500 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 16h-1v-4h-1m0-4h.01M12 17h0a1 1 0 010 2h0a1 1 0 010-2zm0-10h0a1 1 0 010 2h0a1 1 0 010-2z" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-50 bg-[#6AA300] text-white text-center rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            Fixed Discovery Call rate at INR ₹100 for 15 minutes
                                            <span
                                                class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-5 border-solid border-transparent border-t-gray-700"></span>
                                        </span>
                                    </div>
                                </h2>

                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input
                                        class="text-[16px] w-[50px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        step="0.01" name="discovery_call_price_per_minute" value="100"
                                        readonly>
                                </div>
                            </div>

                            <!-- Divider for larger screens -->
                            <div
                                class="h-[1px] w-full md:h-[188px] md:w-[1px] border border-[#000000] hidden md:block">
                            </div>

                            <!-- Consultation call section -->
                            <div class="flex flex-col gap-[12px] mt-4 md:mt-0 w-full md:w-auto">
                                <h2 class="text-[16px] font-[500]">Consultation call :</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input
                                        class="text-[16px] w-[45px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        step="0.01" name="conference_call_price_per_minute" value="20">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="hour" class="city w-full" style="display: none">
                        <div class="flex flex-col md:flex-row items-start md:items-center w-full justify-between">
                            <!-- Discovery call section -->
                            <div class="flex flex-col gap-[12px] mb-4 md:mb-0 md:mr-4 w-full md:w-auto">
                                <h2 class="text-[16px] font-[500]">Discovery call :</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input
                                        class="text-[16px] w-[55px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        step="0.01" name="discovery_call_price_per_hour" value="1500">
                                </div>
                            </div>

                            <!-- Divider for larger screens -->
                            <div
                                class="h-[1px] w-full md:h-[188px] md:w-[1px] border border-[#000000] hidden md:block">
                            </div>

                            <!-- Consultation call section -->
                            <div class="flex flex-col gap-[12px] mt-4 md:mt-0 w-full md:w-auto">
                                <h2 class="text-[16px] font-[500]">Consultation call :</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input
                                        class="text-[16px] w-[55px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        step="0.01" name="conference_call_price_per_hour" value="2000">
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}
                <div class="flex flex-col gap-[12px]">
                    <div class="flex justify-between">
                        <h4 class="text-[16px] font-[400]">Set Your Advisory Price (per minute) ::</h4>
                        <div
                            class="flex justify-between border border-[#828282] gap-[8px] w-[220px] rounded-[8px] px-3 bg-white py-2">
                            <button id="btnMinute"
                                class="tabButton bg-red-500 text-white px-4 py-2 text-[16px] rounded-[8px] font-[500]"
                                onclick="openContent('minute', event)">
                                Minute
                            </button>
                            <button id="btnHour"
                                class="tabButton bg-white text-black px-4 py-2 text-[16px] rounded-[8px] font-[500]"
                                onclick="openContent('hour', event)">
                                Hour
                            </button>
                        </div>
                    </div>

                    <div id="minute" class="city w-full" style="display: block">
                        <div class="flex flex-col md:flex-row items-start md:items-center w-full justify-between">
                            <!-- Discovery call section -->
                            <div class="flex flex-col gap-[12px] mb-4 md:mb-0 md:mr-4 w-full md:w-auto">
                                <h2 class="text-[16px] font-[500]">Discovery call :</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input
                                        class="text-[16px] w-[50px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        step="0.01" name="discovery_call_price_per_minute" value="100"
                                        readonly>
                                </div>
                            </div>

                            <!-- Divider for larger screens -->
                            <div
                                class="h-[1px] w-full md:h-[188px] md:w-[1px] border border-[#000000] hidden md:block">
                            </div>

                            <!-- Consultation call section -->
                            <div class="flex flex-col gap-[12px] mt-4 md:mt-0 w-full md:w-auto">
                                <h2 class="text-[16px] font-[500]">Consultation call<span class="text-[#ff0909]">*</span>  :</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input id="minuteRate"
                                        class="text-[16px] w-[45px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        step="0.01" name="conference_call_price_per_minute" value=""
                                        onchange="calculateHourRate()">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="hour" class="city w-full" style="display: none">
                        <div class="flex flex-col md:flex-row items-start md:items-center w-full justify-between">

                            <!-- Consultation call section -->
                            <div class="flex flex-col gap-[12px] mt-4 md:mt-0 w-full md:w-auto">
                                <h2 class="text-[16px] font-[500]">Consultation call<span class="text-[#ff0909]">*</span>  :</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input id="hourRate"
                                        class="text-[16px] w-[55px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        step="0.01" name="conference_call_price_per_hour" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{-- 
                <div class="p-[18px] mt-[18px] w-full justify-between flex gap-[12px] rounded-[12px] bg-white">
                    <p class="text-[18px] font-[500]">Attach Documents (optional)</p>
                    <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i>
                </div> --}}
                <div class="p-[18px] mt-[18px] w-full justify-between flex gap-[12px] rounded-[12px] bg-white">
                    <p class="text-[18px] font-[500]">Attach Documents (optional)</p>
                    <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i>
                </div>
                <input type="file" name="document_path" accept=".pdf,.doc,.docx" id="documentPathInput"
                    onchange="previewDocument(event)">
                @error('document_path')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror

                <div id="documentPreview" class="mt-4"></div>
                {{-- <div class="p-4 mt-4 w-full flex flex-col gap-4 rounded-lg bg-white shadow-md">
                    <div class="flex justify-between items-center">
                        <p class="text-base text-gray-600">Attach the document, then return to this form and submit</p>
                        <a href="https://form.jotform.com/242140789991467" target="_blank"
                            class="text-gray-700 hover:text-gray-900">
                            <i class="fa-solid fa-paperclip text-xl"></i>
                        </a>
                    </div>
                    <p class="text-lg font-medium text-gray-800">Attach Documents (optional)</p>
                </div> --}}



                <div>
                    <label for="is_terms_accept">
                        <input type="checkbox" id="is_terms_accept" name="is_terms_accept" value="1"  required/>
                        I accept the 
                        <a href="/terms-of-service" style="color: #526E1C; text-decoration: underline;">Terms and Conditions</a>,
                        <a href="/privacy-policy" style="color: #526E1C; text-decoration: underline;">Privacy Policy</a>,
                        <a href="/shipping-and-delivery-policy" style="color: #526E1C; text-decoration: underline;">Shipping & Delivery Policy</a>,
                        <a href="/onboarding-policy" style="color: #526E1C; text-decoration: underline;">Onboarding Policy</a> and 
                        <a href="/cancellation-and-refund-policy" style="color: #526E1C; text-decoration: underline;">Cancellation and Refund Policy</a>
                    </label>
                </div>
                
                

                <button type="submit" id="submitFormBtn"
                    class="mt-[40px] text-[#2A2A2A] rounded-[18px] font-[600] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                    Submit
                </button>
            </form>
        </div>
    </div>
</body>
<!-- model -->
{{-- <script>
    // model
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementById("closeBtn");

    btn.addEventListener("click", function(event) {
        event.preventDefault();
        modal.classList.remove("hidden");
    });

    span.addEventListener("click", function() {
        modal.classList.add("hidden");
    });

    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.classList.add("hidden");
        }
    });
</script> --}}
<!-- script for calls -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function calculateHourRate() {
        // Get the minute rate from the input field
        var minuteRate = document.getElementById("minuteRate").value;

        // Calculate the hour rate by multiplying the minute rate by 60
        var hourRate = minuteRate * 60;

        // Set the calculated hour rate into the hour input field
        document.getElementById("hourRate").value = hourRate.toFixed(2); // Fixed to 2 decimal places
    }
</script>
<script>
    function openContent(cityName, event) {
        event.preventDefault(); // Prevent page reload
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";

        // Reset all button styles
        var buttons = document.getElementsByClassName("tabButton");
        for (i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove(
                "bg-red-500",
                "bg-white",
                "text-black",
                "text-white"
            );
            buttons[i].classList.add("bg-white", "text-black");
        }

        // Set styles for active button
        document
            .getElementById("btn" + cityName)
            .classList.add("bg-red-500", "text-white");
        document
            .getElementById("btn" + cityName)
            .classList.remove("bg-white", "text-black");
    }
    // Show the modal
    document.getElementById('myBtn').addEventListener('click', function() {
        document.getElementById('myModal').classList.remove('hidden');
    });

    // Hide the modal and save availability
    document.getElementById('closeBtn').addEventListener('click', function() {
        document.getElementById('myModal').classList.add('hidden');
        saveAvailability();
    });

    // Close the modal when clicking the close button
    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('myModal').classList.add('hidden');
    });

    function saveAvailability() {
        let availabilityData = {};
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            if (checkbox.checked) {
                const [day, startTime, endTime] = checkbox.id.split('-');
                if (!availabilityData[day]) {
                    availabilityData[day] = [];
                }
                availabilityData[day].push(`${startTime}-${endTime}`);
            }
        });

        // Clear the previous availability list
        const availabilityList = document.getElementById('availabilityList');
        availabilityList.innerHTML = '';

        // Display the availability data on the main form
        for (const [day, timeSlots] of Object.entries(availabilityData)) {
            const dayItem = document.createElement('div');
            dayItem.textContent = `${day}: ${timeSlots.map(slot => `(${slot})`).join(', ')}`;
            availabilityList.appendChild(dayItem);
        }

        // Store the availability data in a hidden input
        document.getElementById('availabilityInput').value = JSON.stringify(availabilityData);
    }



    
    document.getElementById('submitFormBtn').addEventListener('click', function () {
    var locationInput = document.getElementById('location').value.trim(); // Get location input
    var linkedinProfileInput = document.getElementById('linkedin_profile').value.trim();
    var availabilityInput = document.getElementById('availabilityInput').value.trim();
    var minuteRateInput = document.getElementById('minuteRate').value.trim();
    var conferenceCallPricePerMinuteInput = document.querySelector('[name="conference_call_price_per_minute"]').value.trim();
    var businessFunctionInput = document.getElementById('business_function_category_id').value.trim();
    var subFunction1Input = document.getElementById('sub_function_category_id_1').value.trim();
    var industryInput = document.getElementById('industry').selectedOptions;
    var geographyInput = document.getElementById('geography').selectedOptions;
    var linkedinRegex = /^(https?:\/\/)?(www\.)?linkedin\.com\/.+$/;

    // Validate location
    if (!locationInput || locationInput.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Location required',
            text: 'Please enter your location before submitting the form.',
        });
        return; // Stop further execution
    }

    // Validate LinkedIn profile URL
    if (linkedinProfileInput && !linkedinRegex.test(linkedinProfileInput)) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid LinkedIn Profile',
            text: 'Please enter a valid LinkedIn profile URL starting with "https://linkedin.com"',
        });
        return; // Stop further execution
    }

     // Validate Business Function
     if (!businessFunctionInput || businessFunctionInput === 'Choose Business Function') {
        Swal.fire({
            icon: 'warning',
            title: 'Business Function required',
            text: 'Please select a business function before submitting the form.',
        });
        return; // Stop further execution
    }

    // Validate availability
    if (!availabilityInput || availabilityInput.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Availability required',
            text: 'Please choose your availability before submitting the form.',
        });
        return; // Stop further execution
    }

    // Validate minute rate
    if (!minuteRateInput || minuteRateInput.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Minute Rate required',
            text: 'Please enter a valid minute rate before submitting the form.',
        });
        return; // Stop further execution
    }

    // Validate conference call price per minute
    if (!conferenceCallPricePerMinuteInput || conferenceCallPricePerMinuteInput.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Conference Call Price per Minute required',
            text: 'Please enter a valid price for conference calls per minute before submitting the form.',
        });
        return; // Stop further execution
    }

   

    // Validate Sub Function 1 if it's visible
    if (document.getElementById('sub_function_1').style.display !== 'none' && (!subFunction1Input || subFunction1Input === '')) {
        Swal.fire({
            icon: 'warning',
            title: 'Sub Function required',
            text: 'Please selectbefore submitting the form.',
        });
        return; // Stop further execution
    }

    // Validate Industry (at least one should be selected)
    if (industryInput.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Industry required',
            text: 'Please select Industry Vertical before submitting the form.',
        });
        return; // Stop further execution
    }

    // Validate Geography (at least one should be selected)
    if (geographyInput.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Geography required',
            text: 'Please select Geographical Location before submitting the form.',
        });
        return; // Stop further execution
    }

    // If all validations pass, trigger form submission via AJAX
    // $('#nominationForm').trigger('submit'); // Manually trigger the form submit event
});



$(document).ready(function () {
    $('#nominationForm').submit(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Use FormData instead of serialize() to handle file inputs
        let formData = new FormData(this);

        // Show loading indicator
        Swal.fire({
            title: 'Processing...',
            text: 'Please wait a moment',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // AJAX form submission
        $.ajax({
            type: 'POST',
            url: '{{ route('advisor-nominations.store') }}', // Replace with your actual URL
            data: formData,
            processData: false, // Necessary for FormData
            contentType: false, // Necessary for FormData
            success: function (res) {
                Swal.close(); // Close the loading indicator

                if (res.success) {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Form Submitted!',
                        text: res.msg || 'Your form has been successfully submitted!',
                    }).then(() => {
                        // Optional redirect handling
                        if (res.redirect) {
                            window.location.href = res.redirect;
                        } else {
                            window.open("/", "_self");
                        }
                    });
                } else {
                    // Show error message if success is false
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred: ' + (res.msg || 'Unknown error'),
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.close(); // Close the loading indicator

                let errorMessage = 'An error occurred while submitting the form.';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).join(', ');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                console.log('Error details:', xhr.responseText);

                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage
                });
            }
        });
    });
});


</script>

<script>
    function previewDocument(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('documentPreview');
        previewContainer.innerHTML = '';

        if (file) {
            const fileName = document.createElement('p');
            fileName.textContent = `Selected File: ${file.name}`;
            previewContainer.appendChild(fileName);

            if (file.type === 'application/pdf') {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const embed = document.createElement('embed');
                    embed.src = e.target.result;
                    embed.type = 'application/pdf';
                    embed.width = '100%';
                    embed.height = '500px';
                    previewContainer.appendChild(embed);
                };
                reader.readAsDataURL(file);
            } else if (file.type === 'application/msword' || file.type ===
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                const fileLink = document.createElement('a');
                fileLink.href = URL.createObjectURL(file);
                fileLink.target = '_blank';
                fileLink.textContent = 'Preview Document';
                fileLink.classList.add('text-blue-500', 'underline');
                previewContainer.appendChild(fileLink);
            } else {
                const notSupported = document.createElement('p');
                notSupported.textContent = 'File preview not available for this file type.';
                previewContainer.appendChild(notSupported);
            }
        }
    }
</script>
<script>
    document.getElementById('business_function_category_id').addEventListener('change', function() {
        let categoryId = this.value;
        fetch(`/api/sub-function-categories/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                let subFunctionSelect1 = document.getElementById('sub_function_category_id_1');
                let subFunctionSelect2 = document.getElementById('sub_function_category_id_2');
                subFunctionSelect1.innerHTML = '<option value="">Select one Option</option>';
                subFunctionSelect2.innerHTML = '<option value="">Select one Option</option>';
                data.forEach(function(subFunction) {
                    subFunctionSelect1.innerHTML +=
                        `<option value="${subFunction.id}">${subFunction.name}</option>`;
                    subFunctionSelect2.innerHTML +=
                        `<option value="${subFunction.id}">${subFunction.name}</option>`;
                });
                document.getElementById('sub_function_1').style.display = 'block';
                document.getElementById('sub_function_2').style.display = 'block';
            });
    });
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        function limitSelection(selectElement) {
            selectElement.addEventListener('change', function() {
                const selectedOptions = Array.from(selectElement.selectedOptions);
                if (selectedOptions.length > 3) {
                    selectedOptions.slice(3).forEach(option => option.selected = false);
                    Swal.fire({
                        icon: 'warning',
                        title: 'Selection Limit',
                        text: 'You can only select up to 3 options.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }

        limitSelection(document.getElementById('industry'));
        limitSelection(document.getElementById('geography'));
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function handleOtherIndustryField() {
            const selectElement = document.getElementById('industry');
            const selectedOptions = Array.from(selectElement.selectedOptions);
            const otherIndustryInput = document.getElementById('other-industry');

            if (selectedOptions.some(option => option.text.toLowerCase() === 'other - mention')) {
                otherIndustryInput.classList.remove('hidden');
            } else {
                otherIndustryInput.classList.add('hidden');
            }
        }

        function limitSelection(selectElement) {
            selectElement.addEventListener('change', function() {
                const selectedOptions = Array.from(selectElement.selectedOptions);
                if (selectedOptions.length > 3) {
                    selectedOptions.slice(3).forEach(option => option.selected = false);
                    Swal.fire({
                        icon: 'warning',
                        title: 'Selection Limit',
                        text: 'You can only select up to 3 options.',
                        confirmButtonText: 'OK'
                    });
                }
                handleOtherIndustryField();
            });
        }

        const industrySelect = document.getElementById('industry');
        limitSelection(industrySelect);
        const geographySelect = document.getElementById('geography');
        limitSelection(geographySelect);

        // Initialize visibility on page load
        handleOtherIndustryField();
    });
</script>

</html>
