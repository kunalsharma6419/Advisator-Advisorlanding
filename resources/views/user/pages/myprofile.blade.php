@extends('user.layouts.app')

@section('usercontent')
    <div class="relative w-full h-full min-h-screen overflow-hidden">
        <!-- header -->
        @include('user.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('user.components.dashmenu')


            @if (session('success'))
                <div id="successAlert"
                    class="relative px-4 py-3 mt-4 text-green-700 bg-green-100 border border-green-400 rounded">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button class="absolute top-0 bottom-0 right-0 px-4 py-3 focus:outline-none"
                        onclick="document.getElementById('successAlert').style.display = 'none';">
                        <svg class="w-6 h-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path fill-rule="evenodd"
                                d="M14.293 5.293a1 1 0 0 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 1 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 1 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 1.414-1.414L10 8.586l4.293-4.293z" />
                        </svg>
                    </button>
                </div>
            @endif
            <!-- page for desktop view -->
            <div class="mb-[4rem]">
                <div class="hidden w-full mt-6 md:flex">
                    <div class="px-4 md:w-[12rem] lg:w-[20rem]  xl:w-[25rem] shrink-0">
                        <div
                            class="flex flex-col  gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg  w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Profile Information</h5>
                                <span class="text-lg cursor-pointer lg:text-xl">></span>
                            </div>
                            <p class="text-[#828282]">Update your profile information</p>
                        </div>
                    </div>
                    <div class="flex gap-6 p-4 border shadow-sm grow rounded-xl">
                        <form action="{{ route('user.myprofile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm"
                            class="w-full">
                            @csrf
                            @method('PUT')

                            <!-- Desktop Version -->
                            <div class="hidden text-center lg:block">
                                <h3 class="text-2xl font-bold">User Profile</h3>
                                <hr class="mt-2 border-gray-300">
                            </div>

                            <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                                <div class="flex items-center mt-1">
                                    @if (Auth::user()->profile_photo_path)
                                        <img id="profilePhotoDesktop"
                                            src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                            alt="Profile Photo" width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @else
                                        <?php $initial = strtoupper(substr($userprofile->full_name, 0, 1)); ?>
                                        <img id="profilePhotoDesktop"
                                            src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                            alt="Profile Photo" width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @endif
                                    <input type="file" name="photo" id="photoDesktop" class="hidden"
                                        onchange="previewPhoto('Desktop')">
                                </div>
                                @error('photo')
                                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                                <div class="flex mt-2 space-x-3">
                                    <button type="button" onclick="document.getElementById('photoDesktop').click()"
                                        class="px-4 py-2 font-semibold text-gray-700 bg-gray-200 rounded-lg shadow-md hover:bg-gray-300">Select
                                        a New Photo</button>
                                    <button type="button" onclick="removePhoto('Desktop')"
                                        class="px-4 py-2 font-semibold text-red-700 bg-red-200 rounded-lg shadow-md hover:bg-red-300">Remove
                                        Photo</button>
                                    <button type="submit"
                                        class="px-4 py-2 font-semibold text-white bg-indigo-700 rounded-lg shadow-md hover:bg-indigo-700">Save</button>
                                </div>
                            </div>



                            <div class="mt-6 grow">
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="full_name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name"
                                        value="{{ old('full_name', $userprofile->full_name) }}"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="Email">Email Address</label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $userprofile->email) }}"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="mobile_number">Mobile
                                        Number</label>
                                    <div
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <input type="text" id="mobile_number" name="mobile_number"
                                            value="{{ old('mobile_number', $userprofile->mobile_number) }}"
                                            class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base outline-none w-full">
                                        @error('mobile_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="location">Location</label>
                                    <input type="text" id="location" name="location"
                                        value="{{ old('location', $userprofile->location) }}"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="hidden text-center lg:block" style="margin-top: 50px;">
                                    <h3 class="text-2xl font-bold">Additional Information</h3>
                                    <hr class="mt-2 border-gray-300">
                                </div>

                                <div class="w-full mt-8 mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="about">Mention details
                                        about yourself e.g. experience, expertise / Your Business</label>
                                    <br>
                                    <textarea id="about" name="about" rows="6"
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%]  p-2">{{ old('about', $userprofile->about) }}</textarea>
                                    @error('about')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="is_founder" class="text-[#828282] font-normal text-base">Is
                                        Founder</label>
                                    <div
                                        class="flex items-center justify-between text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%]  p-2 ">
                                        <p>Are you a business owner?</p>
                                        <!-- Hidden input to ensure a value is always submitted -->
                                        <input type="hidden" name="is_founder" value="0">
                                        <input type="checkbox" name="is_founder" id="is_founder" value="1"
                                            {{ old('is_founder', $userprofile->is_founder ? 'checked' : '') }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded outline-none focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        @error('is_founder')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="industry">Industry</label>
                                    <div id="industry"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="industry_select" class="w-full outline-none">
                                            <option value="" style="text-color: #FF3131;">Select Industry</option>
                                            @foreach ($industries as $industry)
                                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                        <button id="add_industry"
                                            class="px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none">Add</button>
                                    </div>
                                    <div id="selected_industries" class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($userprofile->getIndustries() as $industry)
                                            <div id="industry_{{ $industry->id }}"
                                                class="flex items-center px-2 py-1 text-blue-800 bg-blue-200 rounded">
                                                <span>{{ $industry->name }}</span>
                                                <button type="button"
                                                    class="ml-2 text-red-600 hover:text-red-800 focus:outline-none"
                                                    onclick="removeIndustry({{ $industry->id }})">x</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Hidden input to store selected industry IDs -->
                                    <input type="hidden" name="industries" id="industries"
                                        value="{{ json_encode($userprofile->industry_ids) }}">
                                </div>


                                <div class="flex justify-end w-full mt-6 space-x-3">
                                    <button type="submit" id="saveButton"
                                        class="px-4 py-2 font-bold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700">Save</button>
                                    <button type="reset"
                                        class="px-4 py-2 font-bold text-gray-700 bg-gray-300 rounded-lg shadow-md hover:bg-gray-400">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>




                </div>
            </div>

            <div>
                <div class="hidden mt-8 md:flex">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Customer Support</h5>
                                <span class="text-lg cursor-pointer lg:text-xl">></span>
                            </div>
                            <p class="text-[#828282]">Have queries? Ask us!</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-around gap-3 p-5 border shadow-sm grow rounded-xl">
                        <p class="text-[#828282] text-base font-medium">Raise a ticket and tell us your queries, our
                            support team will get back to you within 24 hours.</p>
                        <button id="raiseTicketBtn"
                            class="w-fit bg-[#6A9023] shadow-md text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                            Raise Ticket
                        </button>
                    </div>
                </div>
            </div>


            <!---Delete Account-->
            <div>
                <div class="hidden mt-8 md:flex">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5 class="text-[#FF3131]">Delete account</h5>
                                <span class="text-lg cursor-pointer lg:text-xl">></span>
                            </div>
                            <p class="text-[#828282]">Permanently delete your account.</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-around gap-3 p-5 border shadow-sm grow rounded-xl">
                        <p class="text-[#828282] text-base font-medium">
                            Once your account is deleted, all of its resources and data will
                            be permanently deleted.
                        </p>
                        <button id="DeleteAccountbtn"
                            class="w-fit bg-[#FF3131] text-[#FFFFFF] shadow-md py-2 px-6 rounded-[2rem] text-base font-semibold">
                            Delete Account
                        </button>
                    </div>
                </div>
            </div>







            <!---Delete Account Modal-->



            <div id="DeleteVerifyModal" class="fixed inset-0 flex items-center justify-center hidden w-full h-full modal">
                <div class="absolute inset-0 bg-black opacity-50 modal-overlay"></div>

                <div
                    class="modal-content bg-white p-8 rounded-lg shadow-lg relative z-10 w-full max-w-lg mx-4 md:mx-auto md:w-[70%] lg:w-[50%]">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-[#526E1C] font-semibold text-lg lg:text-xl">Verify OTP</h2>
                        <button id="closeBtn"
                            class="w-6 h-6 text-2xl leading-none text-gray-500 hover:text-gray-700 focus:outline-none"
                            aria-label="Close">&times;</button>
                    </div>

                    <p class="mb-6 text-sm font-medium text-center text-gray-700 lg:text-base">
                        Please enter the One-Time Password sent to your email address
                    </p>

                    <form id="otp-form" method="post">
                        @csrf
                        <div class="flex items-center justify-center gap-1 md:gap-3 lg:gap-3">
                            <input type="text"
                                class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                maxlength="1" name="otp[]" />
                            <input type="text"
                                class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                maxlength="1" name="otp[]" />
                            <input type="text"
                                class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                maxlength="1" name="otp[]" />
                            <input type="text"
                                class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                maxlength="1" name="otp[]" />
                            <input type="text"
                                class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none transparent w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                maxlength="1" name="otp[]" />
                            <input type="text"
                                class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none transparent w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                maxlength="1" name="otp[]" />
                        </div>
                        <div class="max-w-[260px] mx-auto mt-4"></div>
                        <!-- button -->
                        <button type="submit"
                            class="mt-[30px] text-[#2A2A2A] font-[600] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                            Verify
                        </button>
                    </form>
                    <p class="time"></p>
                    <button id="resendOtpVerificationDesktop" disabled
                    class="mt-4 text-[#2A2A2A] font-[600] text-center w-full py-[10px] bg-gray-400 cursor-not-allowed"
                    style="opacity: 0.6;">
                    Resend Verification OTP
                </button>
                
                </div>
                </form>
            </div>
        </div>



       <!-- Delete Verification Modal Mobile -->
<div id="DeleteVerifyMobileModal" class="fixed inset-0 flex items-center justify-center hidden w-full h-full modal">
    <div class="absolute inset-0 bg-black opacity-50 modal-overlay"></div>

    <div class="modal-content bg-white p-4 sm:p-8 rounded-lg shadow-lg relative z-10 w-full max-w-lg mx-4 md:mx-auto md:w-[70%] lg:w-[50%]">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-[#526E1C] font-semibold text-lg lg:text-xl">Verify OTP</h2>
            <button id="closemodalBtn" class="w-6 h-6 text-2xl leading-none text-gray-500 hover:text-gray-700 focus:outline-none" aria-label="Close">&times;</button>
        </div>

        <p class="mb-6 text-sm font-medium text-center text-gray-700 lg:text-base">
            Please enter the One-Time Password sent to your email address
        </p>

        <form id="otp-form" method="post">
            @csrf
            <div class="flex items-center justify-center gap-1 md:gap-3 lg:gap-3">
                <input type="text" class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100" maxlength="1" name="otp[]" />
                <input type="text" class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100" maxlength="1" name="otp[]" />
                <input type="text" class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100" maxlength="1" name="otp[]" />
                <input type="text" class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100" maxlength="1" name="otp[]" />
                <input type="text" class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none transparent w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100" maxlength="1" name="otp[]" />
                <input type="text" class="p-4 text-2xl font-extrabold text-center bg-white border rounded outline-none appearance-none transparent w-14 h-14 text-slate-900 focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100" maxlength="1" name="otp[]" />
            </div>

            <div class="max-w-[260px] mx-auto mt-4"></div>

            <!-- Submit button -->
            <button type="submit" class="mt-[30px] text-[#2A2A2A] font-[600] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                Verify
            </button>
        </form>

        <p class="time"></p>

        <!-- Resend OTP Button -->
        <button id="resendOtpVerificationMobile" disabled class="mt-4 text-[#2A2A2A] font-[600] text-center w-full py-[10px] bg-gray-400 cursor-not-allowed" style="opacity: 0.6;">
            Resend Verification OTP
        </button>
    </div>
</div>





        <!-- page for mobile view -->
        <div class="md:hidden mt-[2rem] mb-[6rem] flex flex-col gap-[1.5rem]">
            <div class="w-[90%]s font-Roboto md:w-[95%]s lg:w-[90%]s mx-autos mt-[2rem]s p-2s">
                <div class="flex flex-col gap-4 md:flex-row">

                    <div class="flex flex-col gap-4 w-full md:w-[50%]">

                        <!-- profile -->
                        <form action="{{ route('user.myprofile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm"
                            class="w-full">
                            @csrf
                            @method('PUT')
                            <div class="transition-all duration-200 bg-[#FFF4ED] rounded-lg  shadow-lg cursor-pointer ">
                                <button type="button" id="question1" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">


                                    <div class="flex items-center gap-3">
                                        @if (Auth::user()->profile_photo_path)
                                            <img class="w-[60px] h-[60px] rounded-[2rem] shadow-md"
                                                src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                                alt="">
                                        @else
                                            <?php
                                            $fullName = Auth::user()->full_name;
                                            $initial = strtoupper(substr($fullName, 0, 1));
                                            ?>
                                            <img id="profilePhoto"
                                                src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                                alt="Profile Photo" width="100"
                                                class="w-[60px] h-[60px] rounded-[2rem] shadow-md">
                                        @endif
                                        <div class="flex flex-col justify-between">
                                            <p class="text-base text-[#2A2A2A] font-semibold">
                                                {{ Auth::user()->full_name }}</p>
                                            <p class="text-sm text-[#828282] font-medium">Profile Information
                                            </p>
                                        </div>
                                        <!-- <div class="flex flex-col items-start">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Availability</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <p class="text-xs sm:text-sm text-[#828282] font-medium">Choose your availability effortlessly.</p>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->
                                    </div>
                                    <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer1" style="display:none">
                                    {{-- <div class="w-full mx-auto h-[3rem] flex justify-between items-center">
                                            <div class="flex items-center justify-start gap-2">

                                                <h5 class="ftext-[#3A3A3A] font-medium  text-sm sm:text-base">Personal
                                                    Information</h5>
                                            </div>
                                            <div class="flex items-center justify-end gap-2">
                                                <img class="w-6 h-6" src="../src/assets/icons/akar-icons_edit.png"
                                                    alt="">
                                                <h6 class="text-[#3A3A3A] font-medium text-xs sm:text-sm">Edit</h6>
                                            </div>

                                        </div> --}}
                                    <div class="block text-center lg:hidden">
                                        <h3 class="text-xl font-bold">Profile</h3>
                                        <hr class="mt-2 border-gray-300">
                                    </div>



                                    <div class="w-[90%] md:w-[90%] lg:w-[85%] mx-auto mt-[1rem] mb-[3rem]">

                                        <div class="bg-[#FAFAFA]  shadow-md p-4 rounded-xl flex gap-6">
                                            <!-- Mobile Version -->
                                            <div>
                                                <label for="photoMobile"
                                                    class="block text-sm font-medium text-gray-700">Photo</label>
                                                <div class="flex items-center mt-1">
                                                    @if (Auth::user()->profile_photo_path)
                                                        <img id="profilePhotoMobile"
                                                            src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                                            alt="Profile Photo" width="100"
                                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                                    @else
                                                        <?php
                                                        $fullName = Auth::user()->full_name;
                                                        $initial = strtoupper(substr($fullName, 0, 1));
                                                        ?>
                                                        <img id="profilePhotoMobile"
                                                            src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                                            alt="Profile Photo" width="100"
                                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                                    @endif
                                                    <input type="file" name="photo" id="photoMobile" class="hidden"
                                                        onchange="previewPhoto('Mobile')">
                                                </div>
                                                @error('photo')
                                                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                                @enderror
                                                <div class="flex mt-2 space-x-3">
                                                    <button type="button"
                                                        onclick="document.getElementById('photoMobile').click()"
                                                        class="px-4 py-2 font-semibold text-gray-700 bg-gray-200 rounded-lg shadow-md hover:bg-gray-300">
                                                        Select a New Photo
                                                    </button>
                                                    <button type="button" onclick="removePhoto('Mobile')"
                                                        class="px-4 py-2 font-semibold text-red-700 bg-red-200 rounded-lg shadow-md hover:bg-red-300">
                                                        Remove Photo
                                                    </button>
                                                    <button type="submit"
                                                        class="px-4 py-2 font-semibold text-white bg-indigo-700 rounded-lg shadow-md hover:bg-indigo-700">Save</button>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="grow">
                                            <div>
                                                <div class="w-full mb-2">
                                                    <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Full
                                                        Name
                                                    </h5>

                                                    <input type="text" id="full_name" name="full_name"
                                                        value="{{ old('full_name', $userprofile->full_name) }}"
                                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                                    @error('full_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="w-full mb-2">
                                                    <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Email
                                                    </h5>
                                                    <input type="email" name="email" id="email"
                                                        value="{{ old('email', $userprofile->email) }}"
                                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[100%] p-2">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="w-full mb-2">
                                                    <h5 class="text-[#828282] font-normal text-xs sm:text-sm">
                                                        Mobile Number
                                                    </h5>
                                                    <div
                                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                                        <input type="text" id="mobile_number" name="mobile_number"
                                                            value="{{ old('mobile_number', $userprofile->mobile_number) }}"
                                                            class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base outline-none w-full">
                                                        @error('mobile_number')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full mb-2">
                                                    <h5 class="text-[#828282] font-normal text-xs sm:text-sm">
                                                        Location
                                                    </h5>
                                                    <input type="text" id="location" name="location"
                                                        value="{{ old('location', $userprofile->location) }}"
                                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                                    @error('location')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>



                                        </div>


                                        <div class="block text-center lg:hidden">
                                            <h3 class="text-xl font-bold">Additional Information</h3>
                                            <hr class="mt-2 border-gray-300">
                                        </div>
                                        <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                            <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                for="Description">Mention details about yourself e.g. experience,
                                                expertise</label>
                                            <textarea id="about" name="about" rows="6"
                                                class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">{{ old('about', $userprofile->about) }}</textarea>
                                            @error('about')
                                                <span class="text-sm text-red-500">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="bg-[#FAFAFA] my-[1rem] shadow-md p-4 rounded-xl flex justify-between items-center gap-2">
                                            <p>Are you a business Owner?</p>
                                        
                                            <!-- Hidden input to ensure 'is_founder' has a value even if checkbox is unchecked -->
                                            <input type="hidden" name="is_founder" value="0">
                                        
                                            <!-- Checkbox input, sends '1' when checked -->
                                            <input type="checkbox" name="is_founder" id="is_founder" value="1"
                                                {{ old('is_founder', $userprofile->is_founder ? 'checked' : '') }}
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded outline-none focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        
                                            @error('is_founder')
                                                <span class="text-sm text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        

                                        <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                            <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                for="industry">Industry</label>
                                            <div id="industry">
                                                <select id="industry_select_mobile" class="w-full outline-none">
                                                    <option value="">Select Industry</option>
                                                    @foreach ($industries as $industry)
                                                        <option value="{{ $industry->id }}">{{ $industry->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                <button id="add_industry_mobile"
                                                    class="px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none">Add</button>
                                            </div>
                                            <div id="selected_industries_mobile" class="flex flex-wrap gap-2 mt-2">
                                                @foreach ($userprofile->getIndustries() as $industry)
                                                    <div id="industry_{{ $industry->id }}"
                                                        class="flex items-center px-2 py-1 text-blue-800 bg-blue-200 rounded">
                                                        <span>{{ $industry->name }}</span>
                                                        <button type="button"
                                                            class="ml-2 text-red-600 hover:text-red-800 focus:outline-none"
                                                            onclick="removeIndustry({{ $industry->id }})">x</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Hidden input to store selected industry IDs -->
                                            <input type="hidden" name="industries" id="industries_mobile"
                                                value="{{ json_encode($userprofile->industry_ids) }}">
                                        </div>


                                        <div class="flex justify-end w-full mt-6 mb-5 space-x-3">
                                            <button type="submit"
                                                class="px-4 py-2 font-bold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700">Save</button>
                                            <button type="reset"
                                                class="px-4 py-2 font-bold text-gray-700 bg-gray-300 rounded-lg shadow-md hover:bg-gray-400">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>




                        <!-- Customer Support -->
                        <div
                            class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                            <button type="button" id="question2" data-state="closed"
                                class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                <div class="flex flex-col items-start">
                                    <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Customer Support</p>
                                    <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Have queries?
                                        Ask us!</p>
                                </div>

                                <svg id="arrow6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor"
                                    class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="answer2" style="display:none">
                                <div class="flex flex-col justify-around gap-3 p-5 border shadow-sm grow rounded-xl ">
                                    <p class="text-[#828282] text-sm sm:text-base font-medium">Raise a ticket and tell
                                        us your queries, our support team will get back to you within 24 hours. </p>
                                    <button id="raiseTicketBtnmobile"
                                        class="w-fit bg-[#6A9023] shadow-md text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                                        Raise Ticket
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Account -->
                        <div
                            class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                            <button type="button" id="question3" data-state="closed"
                                class="flex items-center justify-between w-full px-2 py-3 lg:px-4 sm:p-3">
                                <div class="flex flex-col items-start">
                                    <p class="text-sm sm:text-base text-[#FF3131] font-semibold">Delete Account</p>
                                    <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Permanently
                                        delete your account.</p>
                                </div>

                                <svg id="arrow7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor"
                                    class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="answer3" style="display:none">
                                <div class="flex flex-col justify-around gap-3 p-5 border shadow-sm grow rounded-xl ">
                                    <p class="text-[#828282] text-sm sm:text-base font-medium">Once your account is
                                        deleted, all of its resources and data will be permanently deleted. </p>
                                    <button
                                    id="DeleteVerifyMobileModalbtn"
                                        class="w-fit bg-[#FF3131] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                        Delete Account
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    <!-- side bar -->
    @include('user.components.sidebar')
    </div>

    <div id="ticketModal" class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-full modal">
        <div class="absolute w-full h-full bg-black opacity-50 modal-overlay"></div>

        <div
            class="modal-content bg-white p-8 rounded shadow-lg relative z-10 w-full h-full md:h-auto md:w-[70%] lg:w-[65%]">
            <div class="flex items-center justify-between">
                <p class="text-[#526E1C] font-medium text-lg lg:text-xl">Raise a Ticket</p>
                <button id="closeBtn" class="w-6 h-6 cursor-pointer">&times;</button>
            </div>
            <form id="ticketForm" action="{{ route('user.tickets.store') }}" method="POST"
                enctype="multipart/form-data" class="mt-[2rem]">
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="subject" class="text-base lg:text-lg font-medium text-[#3A3A3A]">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="border border-[#AFCB7A] outline-none shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]">
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="description" class="text-base lg:text-lg font-medium text-[#3A3A3A]">Describe
                        issue/query</label>
                    <textarea id="description" name="description"
                        class="border border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]" rows="3"></textarea>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="attachment" class="text-base lg:text-lg font-medium text-[#3A3A3A]">Attachments
                        (Attach files)</label>
                    <div
                        class="border flex justify-between items-center border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF]">
                        <input type="file" id="attachment" name="attachment" class="outline-none text-[#3A3A3A]">
                        <label for="attachment">
                            <img src="../src/assets/icons/file.png" alt="Attach File" class="w-5 h-5">
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-center w-full mt-4 md:justify-end">
                    <button type="submit"
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] text-lg lg:text-xl text-[#FFFFFF] font-semibold py-1 px-6 rounded-[24px]">
                        Submit Ticket
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div id="ticketModalmobile" class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-full modal">
        <div class="absolute w-full h-full bg-black opacity-50 modal-overlay"></div>

        <div
            class="modal-content bg-white p-8 rounded shadow-lg relative z-10 w-full h-full md:h-auto md:w-[70%] lg:w-[65%]">
            <div class="flex items-center justify-between">
                <p class="text-[#526E1C] font-medium text-lg lg:text-xl">Raise a Ticket</p>
                <button id="closeBtnmobile" class="w-6 h-6 cursor-pointer">&times;</button>
            </div>
            <form id="ticketForm" action="{{ route('user.tickets.store') }}" method="POST"
                enctype="multipart/form-data" class="mt-[2rem]">
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="subject" class="text-base lg:text-lg font-medium text-[#3A3A3A]">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="border border-[#AFCB7A] outline-none shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]">
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="description" class="text-base lg:text-lg font-medium text-[#3A3A3A]">Describe
                        issue/query</label>
                    <textarea id="description" name="description"
                        class="border border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]" rows="3"></textarea>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="attachment" class="text-base lg:text-lg font-medium text-[#3A3A3A]">Attachments
                        (Attach files)</label>
                    <div
                        class="border flex justify-between items-center border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF]">
                        <input type="file" id="attachment" name="attachment" class="outline-none text-[#3A3A3A]">
                        <label for="attachment">
                            <img src="../src/assets/icons/file.png" alt="Attach File" class="w-5 h-5">
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-center w-full mt-4 md:justify-end">
                    <button type="submit"
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] text-lg lg:text-xl text-[#FFFFFF] font-semibold py-1 px-6 rounded-[24px]">
                        Submit Ticket
                    </button>
                </div>
            </form>
        </div>
        
    
    </div>

    <!-- bottom menu bar -->
    @include('user.components.bottommenu')

    @include('user.components.footer')


    <!-- modal box -->
    <div id="myModal" class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-full modal">
        <!-- Background Overlay -->
        <div class="absolute w-full h-full bg-black opacity-50 modal-overlay"></div>

        <div
            class="modal-content bg-white p-8 rounded shadow-lg relative z-10 w-full h-full md:h-auto md:w-[70%] lg:w-[65%]">
            <div class="flex items-center justify-between">
                <p class="text-[#526E1C] font-medium text-lg lg:text-xl">
                    Raise a Ticket
                </p>
                <img id="closeBtn" class="w-6 h-6 cursor-pointer" src=" ../src/assets/img/cross.png" alt="" />
            </div>
            <form class="mt-[2rem]">
                <div class="flex flex-col gap-2">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="subject">Subject</label>
                    <input
                        class="border border-[#AFCB7A] outline-none shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]"
                        type="text" />
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="subject">Describe
                        issue/query</label>
                    <textarea class="border border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]" name=""
                        rows="3" id=""></textarea>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="file">Attachments (Attach
                        files)</label>
                    <div
                        class="border flex justify-between items-center border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF]">
                        <input class="outline-none text-[#3A3A3A]" type="file" id="file" />
                        <label for="file">
                            <img class="w-5 h-5" src=" ../src/assets/icons/file.png" alt="" />
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-end w-full mt-4">
                    <button
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] text-lg lg:text-xl text-[#FFFFFF] font-semibold py-1 px-6 rounded-[24px]">
                        Submit Ticket
                    </button>
                </div>
            </form>
        </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // JavaScript to toggle sidebar
        const hideSideMenu = document.getElementById("hideSideMenu");
        const showSideMenu = document.getElementById("showSideMenu");

        const sidebar = document.querySelector(".sidebar");

        hideSideMenu.addEventListener("click", () => {
            sidebar.classList.add("left-full");
        });
        showSideMenu.addEventListener("click", () => {
            sidebar.classList.remove("left-full");
        });
    </script>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var btnsm = document.getElementById("myBtnsm");

        var span = document.getElementById("closeBtn");

        btn.onclick = function() {
            modal.classList.remove("hidden");

        };

        btnsm.onclick = function() {
            modal.classList.remove("hidden")
        }

        span.onclick = function() {
            modal.classList.add("hidden");
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.add("hidden");
            }
        };
    </script>

    <script>
        // JavaScript to toggle the answers and rotate the arrows
        document
            .querySelectorAll('[id^="question"]')
            .forEach(function(button, index) {
                button.addEventListener("click", function() {
                    var answer = document.getElementById("answer" + (index + 1));
                    var arrow = document.getElementById("arrow" + (index + 1));

                    if (
                        answer.style.display === "none" ||
                        answer.style.display === ""
                    ) {
                        answer.style.display = "block";
                        arrow.style.transform = "rotate(0deg)";
                    } else {
                        answer.style.display = "none";
                        arrow.style.transform = "rotate(-180deg)";
                    }
                });
            });
    </script>
    <script>
        function previewPhoto(type) {
            const photoInput = document.getElementById(`photo${type}`);
            const profilePhoto = document.getElementById(`profilePhoto${type}`);

            if (photoInput && profilePhoto) {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profilePhoto.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        function removePhoto(type) {
            const profilePhoto = document.getElementById(`profilePhoto${type}`);
            const photoInput = document.getElementById(`photo${type}`);

            if (profilePhoto && photoInput) {
                const fullName = "{{ Auth::user()->full_name }}";
                const initial = fullName.trim().charAt(0).toUpperCase();

                profilePhoto.src = `https://via.placeholder.com/150/000000/FFFFFF/?text=${initial}`;
                photoInput.value = '';
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIndustryButton = document.getElementById('add_industry');
            const industrySelect = document.getElementById('industry_select');
            const selectedIndustriesContainer = document.getElementById('selected_industries');
            const industriesInput = document.getElementById('industries');

            addIndustryButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission

                const industryId = industrySelect.value;
                const industryName = industrySelect.options[industrySelect.selectedIndex].text;

                if (industryId && !isIndustrySelected(industryId)) {
                    if (selectedIndustriesContainer.children.length < 3) {
                        appendIndustryTag(industryId, industryName);
                        updateIndustriesInput();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Limit Reached',
                            text: 'You can select only up to 3 industries.'
                        });
                    }
                }
            });

            function isIndustrySelected(id) {
                return document.getElementById(`industry_${id}`) !== null;
            }

            function appendIndustryTag(id, name) {
                const tag = document.createElement('div');
                tag.id = `industry_${id}`;
                tag.className = 'bg-blue-200 text-blue-800 px-2 py-1 rounded flex items-center';
                tag.innerHTML = `
            <span>${name}</span>
            <button type="button" class="ml-2 text-red-600 hover:text-red-800 focus:outline-none" onclick="removeIndustry(${id})">x</button>
        `;
                selectedIndustriesContainer.appendChild(tag);
            }

            window.removeIndustry = function(id) {
                const tag = document.getElementById(`industry_${id}`);
                if (tag) {
                    tag.remove();
                    updateIndustriesInput();
                }
            };

            function updateIndustriesInput() {
                const selectedIds = Array.from(selectedIndustriesContainer.children).map(tag => tag.id.replace(
                    'industry_', ''));
                industriesInput.value = JSON.stringify(selectedIds);
                console.log('Updated industries:', industriesInput.value); // Debugging log
            }

            @if ($userprofile->industries)
                @foreach ($userprofile->industries as $industry)
                    appendIndustryTag({{ $industry->id }}, '{{ $industry->name }}');
                @endforeach
                updateIndustriesInput();
            @endif
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIndustryButton = document.getElementById('add_industry_mobile');
            const industrySelect = document.getElementById('industry_select_mobile');
            const selectedIndustriesContainer = document.getElementById('selected_industries_mobile');
            const industriesInput = document.getElementById('industries_mobile');

            addIndustryButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission

                const industryId = industrySelect.value;
                const industryName = industrySelect.options[industrySelect.selectedIndex].text;

                if (industryId && !isIndustrySelected(industryId)) {
                    if (selectedIndustriesContainer.children.length < 3) {
                        appendIndustryTag(industryId, industryName);
                        updateIndustriesInput();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Limit Reached',
                            text: 'You can select only up to 3 industries.'
                        });
                    }
                }
            });

            function isIndustrySelected(id) {
                return document.getElementById(`industry_${id}`) !== null;
            }

            function appendIndustryTag(id, name) {
                const tag = document.createElement('div');
                tag.id = `industry_${id}`;
                tag.className = 'bg-blue-200 text-blue-800 px-2 py-1 rounded flex items-center';
                tag.innerHTML = `
            <span>${name}</span>
            <button type="button" class="ml-2 text-red-600 hover:text-red-800 focus:outline-none" onclick="removeIndustry(${id})">x</button>
        `;
                selectedIndustriesContainer.appendChild(tag);
            }

            window.removeIndustry = function(id) {
                const tag = document.getElementById(`industry_${id}`);
                if (tag) {
                    tag.remove();
                    updateIndustriesInput();
                }
            };

            function updateIndustriesInput() {
                const selectedIds = Array.from(selectedIndustriesContainer.children).map(tag => tag.id.replace(
                    'industry_', ''));
                industriesInput.value = JSON.stringify(selectedIds);
                console.log('Updated industries:', industriesInput.value); // Debugging log
            }

            @if ($userprofile->industries)
                @foreach ($userprofile->industries as $industry)
                    appendIndustryTag({{ $industry->id }}, '{{ $industry->name }}');
                @endforeach
                updateIndustriesInput();
            @endif
        });
    </script>



    <script>
        // Get the modal
        var modal = document.getElementById("ticketModal");

        // Get the button that opens the modal
        var btn = document.getElementById("raiseTicketBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementById("closeBtn");

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "flex";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const inputs = [...document.querySelectorAll("input[name='otp[]']")];
        const submit = document.querySelector("button[type=submit]");

        const handleKeyDown = (e) => {
            if (!/^[0-9]{1}$/.test(e.key) && e.key !== "Backspace" && e.key !== "Delete" && e.key !==
                "Tab" && !e.metaKey) {
                e.preventDefault();
            }

            if (e.key === "Backspace" || e.key === "Delete") {
                const index = inputs.indexOf(e.target);
                if (index > 0 && !e.target.value) {
                    inputs[index - 1].focus();
                }
            }
        };

        const handleInput = (e) => {
            const target = e.target;
            const index = inputs.indexOf(target);
            if (target.value) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                } else {
                    submit.focus();
                }
            }
        };

        const handleFocus = (e) => {
            e.target.select();
        };

        const handlePaste = (e) => {
            e.preventDefault();
            const text = e.clipboardData.getData("text");
            if (!/^[0-9]{6}$/.test(text)) {
                return;
            }
            const digits = text.split("");
            inputs.forEach((input, index) => (input.value = digits[index]));
            submit.focus();
        };

        inputs.forEach((input) => {
            input.addEventListener("input", handleInput);
            input.addEventListener("keydown", handleKeyDown);
            input.addEventListener("focus", handleFocus);
            input.addEventListener("paste", handlePaste);
        });
    });
</script>


<script>
    // Select relevant elements
    const deleteAccountBtn = document.getElementById('DeleteAccountbtn');
    const deleteVerifyModal = document.getElementById('DeleteVerifyModal');
    const closeModalBtn = document.getElementById('closeBtn');
    const modalOverlay = document.querySelector('.modal-overlay');

    // Function to show the modal
    function showModal() {
        deleteVerifyModal.classList.remove('hidden'); // Show the modal
        deleteVerifyModal.classList.add('flex'); // Set it to flex display
        timer('resendOtpVerificationDesktop'); 
    }

    // Function to hide the modal
    function hideModal() {
        deleteVerifyModal.classList.add('hidden'); // Hide the modal
        deleteVerifyModal.classList.remove('flex'); // Remove flex display
    }

    // Event listeners
    if (deleteAccountBtn) {
        deleteAccountBtn.addEventListener('click', showModal); // Show modal on button click
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', hideModal); // Hide modal on close button click
    }

    if (modalOverlay) {
        modalOverlay.addEventListener('click', hideModal); // Hide modal when overlay is clicked
    }

    // Close modal with the ESC key
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            hideModal(); // Close modal if ESC key is pressed
        }
    });
</script>

  

<script>
    // Function to toggle the modal visibility
    function toggleModal(modalId, action) {
        const modal = document.getElementById(modalId);
        if (modal) {
            if (action === 'show') {
                modal.classList.remove('hidden');
                modal.classList.add('flex'); // Show modal
            } else if (action === 'hide') {
                modal.classList.add('hidden');
                modal.classList.remove('flex'); // Hide modal
            }
        } else {
            console.error(`Modal element with ID "${modalId}" not found!`);
        }
    }

    // Adding event listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Open modal when the button is clicked
        const openModalButton = document.getElementById('DeleteVerifyMobileModalbtn');
        if (openModalButton) {
            openModalButton.addEventListener('click', function() {
                toggleModal('DeleteVerifyMobileModal', 'show');
                timer('resendOtpVerificationMobile'); 
            });
        } else {
            console.error('Button with ID "DeleteVerifyMobileModalbtn" not found!');
        }

        // Close modal when the close button is clicked
        const closeModalButton = document.getElementById('closemodalBtn');
        if (closeModalButton) {
            closeModalButton.addEventListener('click', function() {
                toggleModal('DeleteVerifyMobileModal', 'hide');
            });
        } else {
            console.error('Close button with ID "closeBtn" not found!');
        }

        // Close modal when overlay is clicked
        const modalOverlay = document.querySelector('.modal-overlay');
        if (modalOverlay) {
            modalOverlay.addEventListener('click', function() {
                toggleModal('DeleteVerifyMobileModal', 'hide');
            });
        } else {
            console.error('Overlay with class "modal-overlay" not found!');
        }

        // Close modal with the Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                toggleModal('DeleteVerifyMobileModal', 'hide');
            }
        });
    });
</script>





    <script>
        // Get the modal
        var modal = document.getElementById("ticketModalmobile");

        // Get the button that opens the modal
        var btn = document.getElementById("raiseTicketBtnmobile");

        // Get the <span> element that closes the modal
        var span = document.getElementById("closeBtnmobile");

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "flex";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>


<script>

    function showModal(modalId, buttonId) {
        console.log("showModal called with modalId:", modalId, "buttonId:", buttonId);
        $(`#${modalId}`).removeClass('hidden').addClass('flex'); // Show modal
        timer(buttonId); // Start the timer for the specified button in the modal
    }
    
    document.getElementById('DeleteAccountbtn').addEventListener('click', () => {
        $.ajax({
            url: "{{ route('user.sendDeleteAccountOtp') }}",
            type: "POST",
            data: {_token: "{{ csrf_token() }}"},
            success: function(res) {
                if (res.success) {
                    // Directly show the OTP modal if the request is successful
                    console.log("OTP sent successfully");
                    showModal('otpModalId', 'resendOtpVerificationDesktop');
                }
            }
        });
    });
    
    document.getElementById('DeleteVerifyMobileModalbtn').addEventListener('click', () => {
        $.ajax({
            url: "{{ route('user.sendDeleteAccountOtp') }}",
            type: "POST",
            data: {_token: "{{ csrf_token() }}"},
            success: function(res) {
                if (res.success) {
                    // Directly show the OTP modal if the request is successful
                    console.log("OTP sent successfully for mobile");
                    showModal('otpModalId', 'resendOtpVerificationMobile'); 
                }
            }
        });
    });
    
    $('#otp-form').submit(function(e) {
        e.preventDefault();
        let otp = '';
        $('input[name="otp[]"]').each(function() {
            otp += $(this).val();
        });
    
        $.ajax({
            url: "{{ route('user.verifyDeleteAccountOtp') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                otp: otp
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire('Success', res.msg, 'success').then(() => {
                        window.location.href = '/'; // Redirect to home after deletion
                    });
                } else {
                    Swal.fire('Error', res.msg, 'error');
                }
            },
            error: function(xhr) {
                Swal.fire('Error', 'An unexpected error occurred while verifying the OTP. Please try again.', 'error');
            }
        });
    });
    
    let otpTimer;
    function timer(buttonId) {
    console.log("Timer function started for buttonId:", buttonId);
    clearInterval(otpTimer); // Clear any existing timer
    let seconds = 0;
    let minutes = 2;

    // Disable and style the specific Resend OTP button
    const buttonDesktop = $('#resendOtpVerificationDesktop');
    const buttonMobile = $('#resendOtpVerificationMobile');
    
    const currentButton = $(`#${buttonId}`);

    currentButton.prop('disabled', true).css({
        "opacity": "0.6",
        "cursor": "not-allowed",
        "background-color": "#d3d3d3"
    });

    otpTimer = setInterval(() => {
        if (minutes < 0) {
            console.log("Timer finished");
            $('.time').text(''); // Clear the timer text display
            clearInterval(otpTimer);

            // Re-enable both Resend OTP buttons
            setTimeout(() => {
                buttonDesktop.prop('disabled', false).css({
                    "opacity": "1",
                    "cursor": "pointer",
                    "background-color": "#EDF6DB"
                });
                
                buttonMobile.prop('disabled', false).css({
                    "opacity": "1",
                    "cursor": "pointer",
                    "background-color": "#EDF6DB"
                });

                // Force a reflow and redraw the buttons using requestAnimationFrame for mobile compatibility
                requestAnimationFrame(() => {
                    buttonDesktop[0].style.display = 'none'; // Temporarily hide it
                    buttonDesktop[0].offsetHeight;          // Trigger reflow
                    buttonDesktop[0].style.display = '';    // Re-show the button

                    buttonMobile[0].style.display = 'none'; // Temporarily hide it
                    buttonMobile[0].offsetHeight;           // Trigger reflow
                    buttonMobile[0].style.display = '';     // Re-show the button
                });
            }, 10);  // Small delay
        } else {
            let tempMinutes = minutes.toString().padStart(2, '0');
            let tempSeconds = seconds.toString().padStart(2, '0');
            $('.time').text(`${tempMinutes}:${tempSeconds}`);
        }

        if (seconds <= 0) {
            minutes--;
            seconds = 59;
        } else {
            seconds--;
        }
    }, 1000);
}



    $(document).on('click', '#resendOtpVerificationDesktop, #resendOtpVerificationMobile', function () {
        const buttonId = $(this).attr('id'); // Get the specific button ID (either desktop or mobile)
        console.log("Button clicked: ", buttonId);
    
        // Send the request to the backend to resend the OTP
        $.ajax({
            url: "{{ route('user.resendDeleteAccountOtp') }}",
            type: "POST",
            data: { _token: "{{ csrf_token() }}" },
            success: function (res) {
                if (res.success) {
                    Swal.fire('Success', res.msg, 'success');
                    
                    // Start the timer again for the specific button if OTP was resent successfully
                    timer(buttonId);
                } else {
                    Swal.fire('Error', res.msg, 'error');
                }
            },
            error: function () {
                Swal.fire('Error', 'An unexpected error occurred while resending the OTP. Please try again.', 'error');
            }
        });
    });
    
    // For debugging purposes, ensure the timer starts
     // You can comment this line after testing
    
    </script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButton = document.getElementById('saveButton');
        const form = document.getElementById('profileForm');

        saveButton.addEventListener('click', function(event) {
            // Prevent the form submission initially
            event.preventDefault();

            // Gather form data
            const fullName = document.getElementById('full_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const mobileNumber = document.getElementById('mobile_number').value.trim();
            const about = document.getElementById('about').value.trim();
            const location = document.getElementById('location').value.trim(); // Added location field

            // Validate Full Name (required and no numbers)
            if (!fullName) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Full Name is required.'
                });
                return; // Stop further execution
            } else if (/\d/.test(fullName)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Full Name should not contain numbers.'
                });
                return; // Stop further execution
            }

            // Validate Email (required and valid format)
            if (!email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Email is required.'
                });
                return; // Stop further execution
            } else if (!validateEmail(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please enter a valid email address.'
                });
                return; // Stop further execution
            }

            // Validate Mobile Number (must start with + and contain exactly 10 digits)
            if (!mobileNumber) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Mobile Number is required.'
                });
                return; // Stop further execution
            } else if (!validateMobileNumber(mobileNumber)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Mobile Number must start with a country code (e.g., +91) and contain exactly 10 digits.'
                });
                return; // Stop further execution
            }

            // Validate About (required and no special characters)
            if (!about) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please provide some details about yourself.'
                });
                return; // Stop further execution
            } else if (/[^a-zA-Z0-9\s]/.test(about)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'About should not contain special characters.'
                });
                return; // Stop further execution
            }

            // Validate Location (required, no numbers, and no special characters)
            if (!location) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Location is required.'
                });
                return; // Stop further execution
            } else if (/[^a-zA-Z\s]/.test(location)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Location should not contain numbers or special characters.'
                });
                return; // Stop further execution
            }

            // No errors, proceed with form submission
            form.submit(); // Now this submits the form
        });

        // Email validation function
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Mobile number validation function
        function validateMobileNumber(mobileNumber) {
            // Ensure number starts with a '+' followed by a country code and 10 digits
            const re = /^\+[1-9]\d{1,3}[1-9]\d{9}$/;
            return re.test(mobileNumber);
        }
    });
</script>






@endsection
