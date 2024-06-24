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
                    Advisor Nomination form. Please fill in the details below for
                    Advisor signup
                </p>
            </div>
            {{-- <form class="flex flex-col mt-[35px] gap-[28px] px-30">
                <input placeholder="Full Name" class="w-full px-[18px] py-[14px] h-[60px] rounded-[8px] shadow-lg"
                    type="text" name="" id="" />
                <input placeholder="Email Address"
                    class="w-full mt-[12px] h-[60px] px-[18px] py-[14px] rounded-[8px] shadow-lg" type="text"
                    name="" id="" />
                <!-- phone number -->
                <div class="p-[18px] mt-[18px] w-full flex gap-[12px] rounded-[12px] bg-white">
                    <!-- dropdown number -->
                    <div class="flex gap-[12px]">
                        <label for="underline_select" class="sr-only">+91</label>
                        <select id="underline_select">
                            <option selected>+91</option>
                            <option value="US">+92</option>
                            <option value="CA">+93</option>
                            <option value="FR">+94</option>
                        </select>
                    </div>
                    <!-- border div  -->
                    <!-- <div class="w-[1.5px] border border-[#D6D6D6]"></div> -->

                    <div class="">
                        <input class="" placeholder="Moblie Number" type="tel" />
                    </div>
                </div>
                <input placeholder="Location" class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg" type="text"
                    name="" id="" />
                <!-- Linkedin Proflie Link -->
                <div class="p-[18px] mt-[18px] w-full flex gap-[12px] rounded-[12px] bg-white">
                    <input class="w-full" placeholder="LinkedIn Profile link" type="link" />
                    <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i>
                </div>

                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>
                <h2 class="font-[500] text-[16px]">Areas of interests</h2>
                <!-- dropdown -->
                <div class="flex flex-col gap-[28px]">
                    <!-- dropdown1 -->
                    <div class="w-full mx-auto">
                        <label for="underline_select" class="sr-only">Areas of interests</label>
                        <select id="underline_select" class="w-full p-2 rounded-[12px]">
                            <option selected>Choose Areas of interests</option>
                            <option value="US">Business coaching</option>
                            <option value="CA">Leadership coaching</option>
                            <option value="FR">Executive coaching</option>
                        </select>
                    </div>
                    <div class="border border-gray-400 border-1 my-30"></div>
                    <!-- dropdown2 -->
                    <div class="w-full mx-auto">
                        <label for="underline_select" class="sr-only">Industry</label>
                        <select id="underline_select" class="w-full p-2 rounded-[12px]">
                            <option selected class="">Industry</option>
                            <option value="US">Ecommerce</option>
                            <option value="CA">Finances</option>
                            <option value="FR">Digital Market</option>
                        </select>
                    </div>
                    <div class="border border-1 my-30 border-[#AFAFAF]"></div>
                    <!-- dropdown3 -->
                    <div class="w-full mx-auto">
                        <label for="underline_select" class="sr-only">Geography</label>
                        <select id="underline_select" class="w-full p-2 rounded-[12px]">
                            <option selected>Geography</option>
                            <option value="US">India</option>
                            <option value="CA">Singapore</option>
                            <option value="FR">Australia</option>
                        </select>
                    </div>
                </div>
                <!-- Availability button  -->
                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>
                <div class="flex flex-col gap-[12px]">
                    <h3 class="text-[18px] font-[500]">Availability</h3>
                    <div class="flex items-center justify-between">
                        <p class="text-[16px] font-[500] text-[#828282]">
                            Please choose your availability
                        </p>
                        <button id="myBtn"
                            class="text-[16px] font-[600] rounded-[18px] text-center w-[200px] py-[10px] text-white bg-[#6A9023]">
                            Choose Availability
                        </button>
                    </div>
                </div>
                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>
                <!-- choose plan  -->
                <div class="flex flex-col gap-[12px]">
                    <div class="flex justify-between">
                        <h4 class="text-[16px] font-[400]">
                            Set Your Advisory Price (per minute)
                        </h4>
                        <div
                            class="flex justify-between border border-[#828282] gap-[8px] w-[220px] rounded-[8px] px-3 bg-white py-2">
                            <button id="btnLondon"
                                class="tabButton bg-red-500 text-white px-4 py-2 text-[16px] rounded-[8px] font-[500]"
                                onclick="openContent('London', event)">
                                Minute
                            </button>
                            <button id="btnParis"
                                class="tabButton bg-white text-black px-4 py-2 text-[16px] rounded-[8px]  font-[500]"
                                onclick="openContent('Paris', event)">
                                Hour
                            </button>
                        </div>
                    </div>
                    <!--  calls -->
                    <!-- calls for minutes  -->
                    <div id="London" class="city w-full" style="display: block">
                        <!-- London content -->
                        <div class="flex items-center w-full justify-between">
                            <!-- 1st call  -->
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Discovery call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">
                                        Currency
                                    </p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        INR (₹)
                                    </h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>

                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        20
                                    </h2>
                                </div>
                            </div>

                            <div class="h-[188px] w-[1px] border border-[#000000]"></div>
                            <!-- 2nd call  -->
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Conference call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">
                                        Currency
                                    </p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        INR (₹)
                                    </h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>

                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        30
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full justify-between">
                            <!-- 3rd call  -->
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Chat</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">
                                        Currency
                                    </p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        INR (₹)
                                    </h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>

                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        50
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- calls for hour  -->
                    <div id="Paris" class="city w-full" style="display: none">
                        <!-- Paris content -->
                        <div class="flex items-center w-full justify-between">
                            <!-- 1st call  -->
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Discovery call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">
                                        Currency
                                    </p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        INR (₹)
                                    </h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>

                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        20
                                    </h2>
                                </div>
                            </div>

                            <div class="h-[188px] w-[1px] border border-[#000000]"></div>
                            <!-- 2nd call  -->
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Conference call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">
                                        Currency
                                    </p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        INR (₹)
                                    </h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>

                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        30
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full justify-between">
                            <!-- 3rd call  -->
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Chat</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">
                                        Currency
                                    </p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        INR (₹)
                                    </h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>

                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">
                                        10
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-[18px] mt-[18px] w-full justify-between flex gap-[12px] rounded-[12px] bg-white">
                        <p class="text-[18px] font-[500]">Attach Documents (optional)</p>
                        <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i>
                    </div>
                </div>
                <button
                    class="mt-[40px] text-[#2A2A2A] rounded-[18px] font-[600] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                    Proceed
                </button>
            </form> --}}
            <form id="nominationForm" method="POST" class="flex flex-col mt-[35px] gap-[28px] px-30">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->unique_id }}">
                <div>
                    <label for="full_name">Full Name :</label>
                    <input class="w-full px-[18px] py-[14px] h-[60px] rounded-[8px] shadow-lg" type="text"
                        id="full_name" name="full_name" value="{{ $user->full_name }}" readonly />
                </div>
                <div>
                    <label for="email">Email :</label>
                    <input class="w-full mt-[12px] h-[60px] px-[18px] py-[14px] rounded-[8px] shadow-lg" type="email"
                        id="email" name="email" value="{{ $user->email }}" readonly />
                </div>

                <div>
                    <label for="mobile_number">Mobile Number :</label>
                    <div class="p-[18px] mt-[18px] w-full flex gap-[12px] rounded-[12px] bg-white">
                        {{-- <div class="flex gap-[12px]">
                        <label for="country_code" class="sr-only">+91</label>
                        <select id="country_code" name="country_code" class="w-20 p-2 rounded-[12px]">
                            <option value="+91">+91</option>
                            <option value="+92">+92</option>
                            <option value="+93">+93</option>
                            <option value="+94">+94</option>
                        </select>
                    </div> --}}

                        <input type="text" class="w-full" id="mobile_number" name="mobile_number"
                            value="{{ $user->phone_number }}" readonly />
                    </div>
                </div>

                <div>
                    <label for="location">Location :</label>
                    <input placeholder="Location" class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg"
                        type="text" id="location" name="location" required />
                </div>

                <div>
                    <label for="linkedin_profile">LinkedIn Profile :</label>
                    <div class="p-[18px] mt-[18px] w-full flex gap-[12px] rounded-[12px] bg-white">
                        <input class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg"
                            placeholder="LinkedIn Profile link" type="url" id="linkedin_profile"
                            name="linkedin_profile" />
                        <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i>
                    </div>
                </div>

                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>
                <h2 class="font-[500] text-[16px]">Select Business Function ::</h2>
                <p class="font-[400] text-[16px]" style="color: #db5001">
                    Each nomination form allows an Advisor to choose one primary Business Function and two
                    sub-functions. For instance, under Business Function, one could select "Digital Platforms," with
                    sub-functions such as "Web & Apps" and "Softwares & Packages."
                </p>

                <div class="flex flex-col gap-[28px]">
                    <div class="w-full mx-auto">
                        {{-- <label for="business_function_category_id">Select Business Function :</label> --}}
                        <select id="business_function_category_id" name="business_function_category_id"
                            class="w-full p-2 rounded-[12px]" required>
                            <option selected>Choose Business Function</option>
                            @foreach ($businessFunctionCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="border border-gray-400 border-1 my-30"></div> --}}

                    <div class="w-full mx-auto" id="sub_function_1" style="display:none;">
                        <label for="sub_function_category_id_1">Select Sub Function 1 :</label>
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
                        <label for="industry">Select Industry Verticals:</label>
                        <div class="relative inline-block border-b border-dotted border-black group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 cursor-pointer"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 16h-1v-4h-1m0-4h.01M12 17h0a1 1 0 010 2h0a1 1 0 010-2zm0-10h0a1 1 0 010 2h0a1 1 0 010-2z" />
                            </svg>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-50 bg-[#6AA300] text-white text-center rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                For Multi Selection For Industry Press Shift or Ctrl key for MultiSelection(Web)
                                <span
                                    class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-5 border-solid border-transparent border-t-gray-700"></span>
                            </span>
                        </div>
                        <p class="mt-[18px] " style="color: #db5001">Each nomination form allows an Advisor to choose at
                            the most 3 industry Verticals</p>
                        <select id="industry" name="industry[]" class="w-full p-2 rounded-[12px] mt-[18px]" multiple>
                            <option selected>Select Industry Verticals</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="border border-1 my-30 border-[#AFAFAF]"></div>

                    <div class="w-full mx-auto">
                        <label for="geography">Select Geography Locations:</label>
                        <div class="relative inline-block border-b border-dotted border-black group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 cursor-pointer"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 16h-1v-4h-1m0-4h.01M12 17h0a1 1 0 010 2h0a1 1 0 010-2zm0-10h0a1 1 0 010 2h0a1 1 0 010-2z" />
                            </svg>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-50 bg-[#6AA300] text-white text-center rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                For Multi Selection For Geography Press Shift or Ctrl key for MultiSelection(Web)
                                <span
                                    class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-5 border-solid border-transparent border-t-gray-700"></span>
                            </span>
                        </div>
                        <p class="mt-[18px] " style="color: #db5001">Each nomination form permits an advisor to
                            indicate
                            3 geographical regions where they possess
                            expertise</p>
                        <select id="geography" name="geography[]" class="w-full p-2 rounded-[12px] mt-[18px]"
                            multiple>
                            <option selected>Select Geography Locations</option>
                            @foreach ($geographies as $geography)
                                <option value="{{ $geography->id }}">{{ $geography->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="border w-full border-1 mt-[18px] border-[#AFAFAF]"></div>

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
                    <h3 class="text-[18px] font-[500]">Availability</h3>
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

                {{-- <div id="myModal" class="modal hidden fixed z-50 inset-0 overflow-y-auto">
                    <div class="modal-content bg-white p-8 rounded shadow-lg relative z-10 mx-auto mt-20 w-3/4">
                        <span class="close absolute top-2 right-2 text-gray-600 cursor-pointer">&times;</span>
                        <div class="bg-white hidden lg:block p-1 lg:p-8">
                            <h2 class="text-[20px] font-[500] text-[#526E1C]">
                                Choose your Availability
                            </h2>
                            <table class="w-full mt-[30px]">
                                <tbody class="">
                                    <!-- Time row -->
                                    <tr>
                                        {{-- <td></td> -
                                        <td>
                                            <div
                                                class="flex lg:text-[18px] font-[500] text-[#864444] text-[12px] flex-col">
                                                <p style="display: none">Time ></p>
                                                <p style="display: none">Days ></p>
                                            </div>
                                        </td>
                                        <!-- Slot cells -->
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
                                            <td>
                                                <div
                                                    class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
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
                                            class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                                            <td>{{ $day }}</td>
                                            <!-- Checkboxes for each time slot -->
                                            @foreach ($slots as $slot)
                                                <td>
                                                    <input class="w-[34px] h-[34px]" type="checkbox"
                                                        id="{{ $day . '-' . $slot }}" />
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <button type="button" class="mt-[20px]" id="closeBtn">Save Availability</button>
                    </div>
                </div> --}}
                {{-- <div id="myModal" class="modal hidden fixed z-50 inset-0 overflow-y-auto">
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
                </div> --}}
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
                        <div class="flex items-center w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
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
                                        step="0.01" name="discovery_call_price_per_minute" value="20">
                                </div>
                            </div>

                            <div class="h-[188px] w-[1px] border border-[#000000]"></div>

                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Conference call :</h2>
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

                        <div class="flex w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Chat :</h2>
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
                                        step="0.01" step="0.01" name="chat_price_per_minute" value="20">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="hour" class="city w-full" style="display: none">
                        <div class="flex items-center w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
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

                            <div class="h-[188px] w-[1px] border border-[#000000]"></div>

                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Conference call :</h2>
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

                        <div class="flex w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Chat</h2>
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
                                        step="0.01" name="chat_price_per_hour" value="2000">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="flex flex-col gap-[12px]">
                    <div class="flex justify-between">
                        <h4 class="text-[16px] font-[400]">Set Your Advisory Price (per minute)</h4>
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

                    <div id="minute" class="priceType w-full" style="display: block">
                        <div class="flex items-center w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Discovery call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input type="number" step="0.01" name="discovery_call_price_per_minute"
                                        class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        value="20">
                                </div>
                            </div>

                            <div class="h-[188px] w-[1px] border border-[#000000]"></div>

                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Conference call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input type="number" step="0.01" name="conference_call_price_per_minute"
                                        class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        value="30">
                                </div>
                            </div>
                        </div>

                        <div class="flex w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Chat</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input type="number" step="0.01" name="chat_price_per_minute"
                                        class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        value="50">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="hour" class="priceType w-full" style="display: none">
                        <div class="flex items-center w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Discovery call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input type="number" step="0.01" name="discovery_call_price_per_hour"
                                        class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        value="1200">
                                </div>
                            </div>

                            <div class="h-[188px] w-[1px] border border-[#000000]"></div>

                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Conference call</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input type="number" step="0.01" name="conference_call_price_per_hour"
                                        class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        value="1800">
                                </div>
                            </div>
                        </div>

                        <div class="flex w-full justify-between">
                            <div class="flex flex-col gap-[12px]">
                                <h2 class="text-[16px] font-[500]">Chat</h2>
                                <div class="flex justify-between">
                                    <p class="text-[16px] font-[400] text-[#828282]">Currency</p>
                                    <p class="text-[16px] font-[400] text-[#828282]">Price</p>
                                </div>
                                <div class="flex items-center gap-[12px] justify-between">
                                    <h2 class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]">INR
                                        (₹)</h2>
                                    <div class="h-[1px] w-[24px] border border-[#000000]"></div>
                                    <input type="number" step="0.01" name="chat_price_per_hour"
                                        class="text-[16px] bg-white rounded-[8px] p-2 font-[400] text-[#3A3A3A]"
                                        value="3000">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="p-[18px] mt-[18px] w-full justify-between flex gap-[12px] rounded-[12px] bg-white">
                    <p class="text-[18px] font-[500]">Attach Documents (optional)</p>
                    <i class="fa-solid fa-paperclip" style="color: #3a3a3a"></i>
                </div>

                <button type="submit"
                    class="mt-[40px] text-[#2A2A2A] rounded-[18px] font-[600] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                    Proceed
                </button>
            </form>
        </div>
    </div>
    <!-- model for avability -->
    {{-- <div id="myModal" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
        <!-- Background Overlay -->
        <div class="modal-overlay absolute w-full h-full bg-black opacity-50"></div>

        <div class="modal-content w-[90%] lg:w-[80%] bg-white p-8 rounded shadow-lg relative z-10">
            <span id="closeBtn" class="close absolute top-0 right-0 p-4">&times;</span>
            <!-- Calender for lg screen  -->
            <div class="bg-white hidden lg:block p-1 lg:p-8">
                <h2 class="text-[20px] font-[500] text-[#526E1C]">
                    Choose your Availability
                </h2>
                <table class="w-full mt-[30px]">
                    <tbody class=" ">
                        <!-- time row  -->
                        <tr>
                            <td>
                                <div class="flex lg:text-[18px] font-[500] text-[#864444] text-[12px] flex-col">
                                    <p style="display: none">Time ></p>
                                    <p style="display: none">Days ></p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>10AM</p>
                                    <p>-</p>
                                    <p>11AM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>11AM</p>
                                    <p>-</p>
                                    <p>12AM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>12AM</p>
                                    <p>-</p>
                                    <p>1PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>1PM</p>
                                    <p>-</p>
                                    <p>2PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>2PM</p>
                                    <p>-</p>
                                    <p>3PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>3PM</p>
                                    <p>-</p>
                                    <p>4PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>4PM</p>
                                    <p>-</p>
                                    <p>5PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>5PM</p>
                                    <p>-</p>
                                    <p>6PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>6PM</p>
                                    <p>-</p>
                                    <p>7PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>7PM</p>
                                    <p>-</p>
                                    <p>8PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>8PM</p>
                                    <p>-</p>
                                    <p>9PM</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9PM</p>
                                    <p>-</p>
                                    <p>10PM</p>
                                </div>
                            </td>
                        </tr>
                        <!-- monday  -->
                        <tr class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>Mon</td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- tue  -->
                        <tr class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>Tue</td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- wed  -->
                        <tr class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>Wed</td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- thu  -->
                        <tr class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>Thu</td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- fri  -->
                        <tr class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>Fri</td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- sat -->
                        <tr class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>Sat</td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- sun -->
                        <tr class="text-[#2A2A2A] bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>Sun</td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>

                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- for small screen calender  -->
            <div class="bg-white p-2 block h-[90vh] lg:h-full lg:hidden">
                <h2 class="text-[20px] font-[500] text-[#526E1C]">
                    Choose your Availability
                </h2>
                <table class="w-full mt-[30px]">
                    <tbody class=" ">
                        <!-- time row  -->
                        <tr class="flex items-center w-full justify-between">
                            <td>
                                <div class="flex lg:text-[18px] gap-2 font-[500] text-[#864444] text-[12px] flex-col">
                                    <p style="display: none">Time ></p>
                                    <p style="display: none">Days ></p>
                                </div>
                            </td>
                            <td class="text-[#2A2A2A] lg:text-[18px] text-[12px] font-[500]">
                                Mon
                            </td>
                            <td class="text-[#2A2A2A] lg:text-[18px] text-[12px] font-[500]">
                                Tue
                            </td>
                            <td class="text-[#2A2A2A] lg:text-[18px] text-[12px] font-[500]">
                                wed
                            </td>
                            <td class="text-[#2A2A2A] lg:text-[18px] text-[12px] font-[500]">
                                Thus
                            </td>
                            <td class="text-[#2A2A2A] lg:text-[18px] text-[12px] font-[500]">
                                Fri
                            </td>
                            <td class="text-[#2A2A2A] lg:text-[18px] text-[12px] font-[500]">
                                Sat
                            </td>
                            <td class="text-[#2A2A2A] lg:text-[18px] text-[12px] font-[500]">
                                Sun
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                        <!-- 9AM-10AM -->
                        <tr
                            class="text-[#2A2A2A] flex items-center w-full justify-between bg-[#F4F4F4] rounded-[12px] lg:text-[18px] text-[12px] font-[500]">
                            <td>
                                <div class="flex lg:text-[14px] font-[600] text-[#C95555] text-[10px] flex-col">
                                    <p>9AM</p>
                                    <p>-</p>
                                    <p>10AM</p>
                                </div>
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                            <td>
                                <input class="w-[34px] h-[34px]" type="checkbox" id="myCheckbox" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
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

    // function saveAvailability() {
    //     let availabilityData = {};
    //     document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    //         if (checkbox.checked) {
    //             const [day, timeSlot] = checkbox.id.split('-');
    //             if (!availabilityData[day]) {
    //                 availabilityData[day] = [];
    //             }
    //             availabilityData[day].push(timeSlot);
    //         }
    //     });

    //     // Clear the previous availability list
    //     const availabilityList = document.getElementById('availabilityList');
    //     availabilityList.innerHTML = '';

    //     // Display the availability data on the main form
    //     for (const [day, timeSlots] of Object.entries(availabilityData)) {
    //         const dayItem = document.createElement('div');
    //         dayItem.textContent = `${day}: ${timeSlots.join(', ')}`;
    //         availabilityList.appendChild(dayItem);
    //     }

    //     // Store the availability data in a hidden input
    //     document.getElementById('availabilityInput').value = JSON.stringify(availabilityData);
    // }
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

    $(document).ready(function() {
        $('#nominationForm').submit(function(event) {
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('advisor-nominations.store') }}', // Replace with your actual URL
                data: formData,
                success: function(res) {
                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: res.msg
                        }).then(() => {
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            } else {
                                window.open("/", "_self");
                            }
                        });
                    } else {
                        // In case the response is not success
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred: ' + res.msg
                        });
                    }
                },
                error: function(xhr, status, error) {
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
<script>
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
</script>
{{-- <script>
    function openContent(cityName, evt) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("city");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tabButton");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" bg-red-500 text-white", " bg-white text-black");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " bg-red-500 text-white";
    }

    document.getElementById('myBtn').onclick = function() {
        document.getElementById('myModal').classList.remove('hidden');
    };

    document.getElementsByClassName('close')[0].onclick = function() {
        document.getElementById('myModal').classList.add('hidden');
    };

    document.getElementById('closeBtn').onclick = function() {
        document.getElementById('myModal').classList.add('hidden');
    };
</script> --}}

</html>
