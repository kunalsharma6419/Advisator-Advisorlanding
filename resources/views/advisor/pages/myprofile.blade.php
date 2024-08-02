@extends('advisor.layouts.app')

@section('advisorcontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('advisor.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">


            <!-- page name -->
            @include('advisor.components.dashmenu')

            @if (session('success'))
                <div id="successAlert"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button class="absolute top-0 bottom-0 right-0 px-4 py-3 focus:outline-none"
                        onclick="document.getElementById('successAlert').style.display = 'none';">
                        <svg class="h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
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
                <div class="hidden md:flex mt-6 w-full">
                    <div class="px-4 md:w-[12rem] lg:w-[20rem]  xl:w-[25rem] shrink-0">
                        <div
                            class="flex flex-col  gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg  w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Profile Information</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Update your business profile information</p>
                        </div>
                    </div>
                    <div class="grow border shadow-sm p-4 rounded-xl flex gap-6">
                        <form action="{{ route('advisor.myprofile.update') }}" method="POST" enctype="multipart/form-data"
                            class="w-full">
                            @csrf
                            @method('PUT')

                            <!-- Desktop Version -->
                            <div class="hidden lg:block text-center">
                                <h3 class="text-2xl font-bold">Business Profile</h3>
                                <hr class="mt-2 border-gray-300">
                            </div>

                            <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                                <div class="mt-1 flex items-center">
                                    @if ($advisor->profile_photo_path)
                                        <img id="profilePhotoDesktop"
                                            src="{{ asset('storage/' . $advisor->profile_photo_path) }}" alt="Profile Photo"
                                            width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @else
                                        <?php $initial = strtoupper(substr($advisor->full_name, 0, 1)); ?>
                                        <img id="profilePhotoDesktop"
                                            src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                            alt="Profile Photo" width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @endif
                                    <input type="file" name="photo" id="photoDesktop" class="hidden"
                                        onchange="previewPhoto('Desktop')">
                                </div>
                                @error('photo')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                                <div class="mt-2 flex space-x-3">
                                    <button type="button" onclick="document.getElementById('photoDesktop').click()"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-md">Select
                                        a New Photo</button>
                                    <button type="button" onclick="removePhoto('Desktop')"
                                        class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-2 px-4 rounded-lg shadow-md">Remove
                                        Photo</button>
                                    <button type="submit"
                                        class="bg-indigo-700 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">Save</button>
                                </div>
                            </div>



                            <div class="grow mt-6">
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="full_name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name"
                                        value="{{ old('full_name', $advisor->full_name) }}"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="Email">Email Address</label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $advisor->email) }}"
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
                                            value="{{ old('mobile_number', $advisor->mobile_number) }}"
                                            class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base outline-none w-full">
                                        @error('mobile_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="location">Location</label>
                                    <input type="text" id="location" name="location"
                                        value="{{ old('location', $advisor->location) }}"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full mb-6 mt-6">
                                    <label class="text-[#828282] font-normal text-base" for="linkedin_profile">Linkedin
                                        Profile</label>
                                    <input type="linkedin_profile" name="linkedin_profile" id="linkedin_profile"
                                        value="{{ old('linkedin_profile', $advisor->linkedin_profile) }}"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('linkedin_profile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base"
                                        for="business_function_category_id">Business function</label>
                                    <div id="business_function"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="business_function_category_id" name="business_function_category_id"
                                            class="w-full p-2 rounded-[12px]">
                                            <option value="">Select Business Function Category</option>
                                            @foreach ($businessFunctionCategories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $advisor->business_function_category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if ($advisor->business_function_category_id)
                                    <div class="w-full mb-6" id="sub_function_1">
                                        <label class="text-[#828282] font-normal text-base"
                                            for="sub_function_category_id_1">Sub Business function 1</label>
                                        <div
                                            class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                            <select id="sub_function_category_id_1" name="sub_function_category_id_1"
                                                class="w-full p-2 rounded-[12px]">
                                                <option value="">Select Sub Function 1</option>
                                                @foreach ($subFunction1Options as $option)
                                                    <option value="{{ $option->id }}"
                                                        {{ $option->id == $advisor->sub_function_category_id_1 ? 'selected' : '' }}>
                                                        {{ $option->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-full mb-6" id="sub_function_2">
                                        <label class="text-[#828282] font-normal text-base"
                                            for="sub_function_category_id_2">Sub Business function 2</label>
                                        <div
                                            class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                            <select id="sub_function_category_id_2" name="sub_function_category_id_2"
                                                class="w-full p-2 rounded-[12px]">
                                                <option value="">Select Sub Function 2</option>
                                                @foreach ($subFunction2Options as $option)
                                                    <option value="{{ $option->id }}"
                                                        {{ $option->id == $advisor->sub_function_category_id_2 ? 'selected' : '' }}>
                                                        {{ $option->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif


                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="industry">Industry</label>
                                    <div id="industry"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="industry_select" class="outline-none w-full">
                                            <option value="" style="text-color: #FF3131;">Select Industry</option>
                                            @foreach ($industries as $industry)
                                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                        <button id="add_industry"
                                            class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Add</button>
                                    </div>
                                    <div id="selected_industries" class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($advisor->getIndustries() as $industry)
                                            <div id="industry_{{ $industry->id }}"
                                                class="bg-blue-200 text-blue-800 px-2 py-1 rounded flex items-center">
                                                <span>{{ $industry->name }}</span>
                                                <button type="button"
                                                    class="ml-2 text-red-600 hover:text-red-800 focus:outline-none"
                                                    onclick="removeIndustry({{ $industry->id }})">x</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Hidden input to store selected industry IDs -->
                                    <input type="hidden" name="industries" id="industries"
                                        value="{{ json_encode($advisor->industry_ids) }}">
                                </div>

                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="geography">Geography</label>
                                    <div id="geography"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="geography_select" class="outline-none w-full">
                                            <option value="">Select Geography</option>
                                            @foreach ($geographies as $geography)
                                                <option value="{{ $geography->id }}">{{ $geography->name }}</option>
                                            @endforeach
                                        </select>
                                        <button id="add_geography"
                                            class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Add</button>
                                    </div>
                                    <div id="selected_geographies" class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($advisor->getGeographies() as $geography)
                                            <div id="geography_{{ $geography->id }}"
                                                class="bg-green-200 text-green-800 px-2 py-1 rounded flex items-center">
                                                <span>{{ $geography->name }}</span>
                                                <button type="button"
                                                    class="ml-2 text-red-600 hover:text-red-800 focus:outline-none"
                                                    onclick="removeGeography({{ $geography->id }})">x</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Hidden input to store selected geography IDs -->
                                    <input type="hidden" name="geographies" id="geographies"
                                        value="{{ json_encode($advisor->geography_ids) }}">
                                </div>

                                <div class="hidden lg:block text-center" style="margin-top: 50px;">
                                    <h3 class="text-2xl font-bold">Additional Information</h3>
                                    <hr class="mt-2 border-gray-300">
                                </div>

                                <div class="w-full">
                                    <label for="is_founder" class="text-[#828282] font-normal text-base">Is
                                        Founder</label>
                                    <div
                                        class="flex items-center justify-between text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%]  p-2 ">
                                        <p>Are you a business owner?</p>
                                        <input type="checkbox" name="is_founder" id="is_founder" value="1"
                                            {{ old('is_founder', $advisor->is_founder ? 'checked' : '') }}
                                            class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        @error('is_founder')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-full mb-6 mt-6">
                                    <label class="text-[#828282] font-normal text-base" for="company_name">Company
                                        Name</label>
                                    <input type="company_name" name="company_name" id="company_name"
                                        value="{{ old('company_name', $advisor->company_name) }}"
                                        placeholder="Mention your company name"
                                        class="text-[#3A3A3A] placeholder:text-[#B0B0B0] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('company_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full mb-6 mt-6">
                                    <label class="text-[#828282] font-normal text-base" for="company_website">Company
                                        Website</label>
                                    <div class="relative inline-block border-b border-dotted border-black group">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-blue-500 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 16h-1v-4h-1m0-4h.01M12 17h0a1 1 0 010 2h0a1 1 0 010-2zm0-10h0a1 1 0 010 2h0a1 1 0 010-2z" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-50 bg-[#6AA300] text-white text-center rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            Enter Company Website like that https://xyz.com
                                            <span
                                                class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-5 border-solid border-transparent border-t-gray-700"></span>
                                        </span>
                                    </div>
                                    <input type="text" name="company_website" id="company_website"
                                        value="{{ old('company_website', $advisor->company_website) }}"
                                        placeholder="example - https//xyz.com"
                                        class="text-[#3A3A3A] placeholder:text-[#B0B0B0] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('company_website')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="w-full mb-6 mt-8">
                                    <label class="text-[#828282] font-normal text-base" for="about">Mention details
                                        about yourself e.g. experience, expertise</label>
                                    <br>
                                    <textarea id="about" name="about" rows="6"
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%]  p-2">{{ old('about', $advisor->about) }}</textarea>
                                    @error('about')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Awards and Recognition -->
                                <div class="mt-4">
                                    <label for="awards_recognition" class="text-[#828282] font-normal text-base">Mention
                                        accomplishments in your professional career</label>
                                    <div id="awards-recognition-editor"
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    </div>
                                    <input type="hidden" id="awards_recognition" name="awards_recognition"
                                        value="{{ old('awards_recognition', $advisor->awards_recognition) }}">
                                    <!-- Error Handling (if applicable) -->
                                    @error('awards_recognition')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Services -->
                                <div class="mt-4">
                                    <label for="services" class="text-[#828282] font-normal text-base">Mention about
                                        Services and products you or your company offers</label>
                                    <div id="services-editor"
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[80%] lg:w-[90%] p-2">
                                    </div>
                                    <input type="hidden" id="services" name="services"
                                        value="{{ old('services', $advisor->services) }}">
                                    <!-- Error Handling (if applicable) -->
                                    @error('services')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="w-full mb-6">
                                    <label for="highlighted_images" class="text-[#828282] font-normal text-base">Select
                                        multiple images that highlight your services or products.</label>
                                    <input type="file" name="highlighted_images[]" id="highlighted_images"
                                        accept="image/*" multiple
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    @error('highlighted_images.*')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <!-- Display selected images -->
                                    <div id="preview-images" class="mt-2 flex flex-wrap gap-4">
                                        @if ($advisor->highlighted_images)
                                            @foreach ($advisor->highlighted_images as $image)
                                                @if (is_string($image))
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/' . $image) }}" alt="Image"
                                                            class="rounded-lg h-24">
                                                        <input type="hidden" name="removed_images[]"
                                                            value="{{ $image }}">
                                                        <button type="button"
                                                            class="absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center"
                                                            onclick="removeImage(this, '{{ $image }}')">
                                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>


                                <div class="w-full mt-6 flex justify-end space-x-3">
                                    <button type="submit"
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">Save</button>
                                    <button type="reset"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded-lg shadow-md">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>




                </div>
            </div>

            <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0  lg:w-[20rem]  xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Choose your availability effortlessly. </h5>
                                <span class="text-lg lg:text-xl cursor-pointer" onclick="openAvailabilityModal()">></span>
                            </div>
                            <p class="text-[#828282]">Select available timeslots for client discussions.</p>
                        </div>
                    </div>
                    <div class="grow border shadow-sm p-5 rounded-xl">
                        <div id="availability-summary" class="flex gap-2 xl:gap-4 w-full flex-wrap">
                            <!-- Availability summary will be loaded here -->
                        </div>
                        <div class="flex justify-between items-end mt-4">
                            <button onclick="openAvailabilityModal()"
                                class="bg-[#6A9023] text-[#FFFFFF] px-4 py-2 lg:py-2 lg:px-6 rounded-[2rem] text-sm lg:text-base font-semibold">
                                Choose Availability
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="availabilityModal" class="modal hidden fixed z-50 inset-0 overflow-y-auto">
                <div
                    class="modal-content bg-white p-4 md:p-8 rounded shadow-lg relative z-10 mx-auto mt-10 md:mt-20 w-full md:w-3/4 lg:w-2/3 max-w-4xl">
                    <span class="close absolute top-2 right-2 text-gray-600 cursor-pointer"
                        onclick="closeAvailabilityModal()">&times;</span>
                    <div class="bg-white p-4 md:p-8">
                        <h2 class="text-[16px] md:text-[20px] font-[500] text-[#526E1C]">Choose your availability
                            effortlessly. </h2>
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
                                                    <input
                                                        class="availability-checkbox w-[20px] h-[20px] md:w-[34px] md:h-[34px]"
                                                        type="checkbox" id="{{ $day . '-' . $slot }}"
                                                        data-day="{{ $day }}"
                                                        data-slot="{{ $slot }}" />
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="button" class="mt-[10px] md:mt-[20px] bg-blue-500 text-white px-4 py-2 rounded"
                        onclick="saveAvailability()">Save Availability</button>
                </div>
            </div>
            {{--  --}}
            <!-- Advisory Prices Blade View -->
            <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Advisory Price</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">State your advisory fee for clients. For discovery calls, the
                                suggested price is INR 0 to 500.</p>
                        </div>
                    </div>
                    <div class="grow border shadow-sm p-5 rounded-xl">
                        <form action="{{ route('advisor.updatePrices') }}" method="POST">
                            @csrf
                            <div class="flex items-center justify-between gap-2 w-full">
                                <p class="font-medium text-base text-[#2A2A2A]">Set Your Advisory Price</p>
                                <div class="border border-[#E1E9D3] px-6 py-2 bg-[#FFFFFF] rounded-lg">
                                    <button type="button" id="toggle-minute"
                                        class="toggle-button bg-[#DB5001] text-[#FFFFFF] rounded-lg px-3 py-1">Minute</button>
                                    <button type="button" id="toggle-hour"
                                        class="toggle-button bg-transparent text-[#2A2A2A] rounded-lg px-3 py-1">Hour</button>
                                </div>
                            </div>
                            <div class="flex justify-between items-end mt-6">
                                <div class="flex flex-col gap-2">
                                    <p class="text-base text-[#2A2A2A] font-medium">Discovery call</p>
                                    <div class="flex gap-2 lg:gap-4 items-end">
                                        <div class="flex flex-col gap-2 text-base">
                                            <p class="text-[#828282] font-normal">Currency</p>
                                            <p
                                                class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[77px]">
                                                INR (₹)</p>
                                        </div>
                                        <div class="w-[1.5rem] mb-4 border border-[#000000e2]"></div>
                                        <div class="flex flex-col gap-2 text-base">
                                            <p class="text-[#828282] font-normal">Price</p>
                                            <input type="number" name="discovery_call_price_per_minute"
                                                value="{{ $advisor->discovery_call_price_per_minute }}"
                                                id="discovery_call_price_per_minute"
                                                class="text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[90px]">
                                            <input type="number" name="discovery_call_price_per_hour"
                                                value="{{ $advisor->discovery_call_price_per_hour }}"
                                                id="discovery_call_price_per_hour"
                                                class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md hidden w-[100px]">
                                        </div>
                                    </div>
                                </div>
                                <div class="h-[6rem] border border-[#AFAFAF]"></div>
                                <div class="flex flex-col gap-2">
                                    <p class="text-base text-[#2A2A2A] font-medium">Consultation call</p>
                                    <div class="flex gap-2 lg:gap-4 items-end">
                                        <div class="flex flex-col gap-2 text-base">
                                            <p class="text-[#828282] font-normal">Currency</p>
                                            <p
                                                class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[77px]">
                                                INR (₹)</p>
                                        </div>
                                        <div class="w-[1.5rem] mb-4 border border-[#000000e2]"></div>
                                        <div class="flex flex-col gap-2 text-base">
                                            <p class="text-[#828282] font-normal">Price</p>
                                            <input type="number" name="conference_call_price_per_minute"
                                                value="{{ $advisor->conference_call_price_per_minute }}"
                                                id="conference_call_price_per_minute"
                                                class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[90px]">
                                            <input type="number" name="conference_call_price_per_hour"
                                                value="{{ $advisor->conference_call_price_per_hour }}"
                                                id="conference_call_price_per_hour"
                                                class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md hidden w-[100px]">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit"
                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold mt-6">Update
                                Price</button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0  lg:w-[20rem]  xl:w-[25rem]">
                        <div
                            class="flex flex-col  gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg  w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Upload a Video</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Showcase your expertise by uploading videos for users. </p>
                        </div>
                    </div>
                    <form action="{{ route('advisor.updateVideos') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grow border flex flex-col justify-around shadow-sm p-5 rounded-xl">
                            <p class="text-[#828282] text-base font-medium"> Accepted file
                                formats include MP4, MOV, AVI, and more. </p>
                            <div class="w-full mb-6 mt-8">
                                <label for="video_upload" class="text-[#828282] font-normal text-base">Video Upload (Max
                                    2)</label>
                                <input type="file" name="video_upload[]" id="video_upload" accept="video/*" multiple
                                    class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                @error('video_upload.*')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                                <!-- Display selected videos -->
                                <div id="preview-videos" class="mt-2 flex flex-wrap gap-4">
                                    @if ($advisor->video_upload)
                                        @foreach ($advisor->video_upload as $video)
                                            <div class="relative">
                                                <video controls class="rounded-lg h-24">
                                                    <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <input type="hidden" name="removed_videos[]"
                                                    value="{{ $video }}">
                                                <button type="button"
                                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center"
                                                    onclick="removeVideo(this, '{{ $video }}')">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="submit"
                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                                Add video file
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="hidden md:block container mx-auto p-4">
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Payment Information</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Specify the account information for receiving advisory payments.</p>
                        </div>
                    </div>
                    <div class="grow border flex flex-col justify-around shadow-sm p-5 rounded-xl">
                        <p class="text-[#828282] text-base font-medium">Add your payment information.</p>
                        <form action="{{ route('advisor.bankDetails.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="bank_name" class="text-sm sm:text-base text-[#2A2A2A] font-medium">Bank
                                        Name</label>
                                    <input type="text" name="bank_name" id="bank_name"
                                        value="{{ old('bank_name', $advisor->bankDetails->bank_name ?? '') }}" required
                                        class="text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                </div>
                                <div>
                                    <label for="account_holder_name"
                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Account Holder Name</label>
                                    <input type="text" name="account_holder_name" id="account_holder_name"
                                        value="{{ old('account_holder_name', $advisor->bankDetails->account_holder_name ?? '') }}"
                                        required
                                        class="text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                </div>
                                <div>
                                    <label for="account_number"
                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Account Number</label>
                                    <input type="text" name="account_number" id="account_number"
                                        value="{{ old('account_number', $advisor->bankDetails->account_number ?? '') }}"
                                        required
                                        class="text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                </div>
                                <div>
                                    <label for="account_type"
                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Account Type</label>
                                    <select name="account_type" id="account_type" required
                                        class="text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                        <option value="saving"
                                            {{ (old('account_type') ?? ($advisor->bankDetails->account_type ?? '')) == 'saving' ? 'selected' : '' }}>
                                            Saving</option>
                                        <option value="current"
                                            {{ (old('account_type') ?? ($advisor->bankDetails->account_type ?? '')) == 'current' ? 'selected' : '' }}>
                                            Current</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="bank_ifsc" class="text-sm sm:text-base text-[#2A2A2A] font-medium">Bank
                                        IFSC</label>
                                    <input type="text" name="bank_ifsc" id="bank_ifsc"
                                        value="{{ old('bank_ifsc', $advisor->bankDetails->bank_ifsc ?? '') }}" required
                                        class="text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                </div>
                            </div>
                            <button type="submit"
                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                                {{ $advisor->bankDetails ? 'Update' : 'Add' }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Display Bank Details in Table -->
                @if ($advisor->bankDetails)
                    <div class="hidden md:block mt-8">
                        <div class="overflow-hidden border shadow-sm rounded-xl">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Bank Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Account Holder Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Account Number</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Account Type</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Bank IFSC</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $advisor->bankDetails->bank_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $advisor->bankDetails->account_holder_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $advisor->bankDetails->account_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ ucfirst($advisor->bankDetails->account_type) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $advisor->bankDetails->bank_ifsc }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>

            <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Customer Support</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Have queries? Ask us!</p>
                        </div>
                    </div>
                    <div class="grow border flex flex-col gap-3 justify-around shadow-sm p-5 rounded-xl">
                        <p class="text-[#828282] text-base font-medium">Raise a ticket and tell us your queries, our
                            support team will get back to you within 24 hours.</p>
                        <button id="raiseTicketBtn"
                            class="w-fit bg-[#6A9023] shadow-md text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                            Raise Ticket
                        </button>
                    </div>
                </div>
            </div>
            {{-- <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem]  xl:w-[25rem]">
                        <div
                            class="flex flex-col  gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg  w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5 class="text-[#FF3131]">Delete account</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Permanently delete your account.</p>
                        </div>
                    </div>
                    <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                        <p class="text-[#828282] text-base font-medium">Once your account is deleted, all of its resources
                            and data will be permanently deleted.</p>
                        <button
                            class="w-fit bg-[#FF3131] text-[#FFFFFF] shadow-md py-2 px-6 rounded-[2rem] text-base font-semibold">
                            Delete Account
                        </button>
                    </div>
                </div>
            </div> --}}


            <!-- page for mobile view -->
            <div class="md:hidden mt-[2rem] mb-[6rem] flex flex-col gap-[1.5rem]">
                <div class="w-[90%]s font-Roboto md:w-[95%]s lg:w-[90%]s mx-autos mt-[2rem]s p-2s">
                    <div class="flex flex-col md:flex-row gap-4">

                        <div class="flex flex-col gap-4 w-full md:w-[50%]">

                            <!-- profile -->
                            <form action="{{ route('advisor.myprofile.update') }}" method="POST"
                                enctype="multipart/form-data" class="w-full">
                                @csrf
                                @method('PUT')
                                <div
                                    class="transition-all duration-200 bg-[#FFF4ED] rounded-lg  shadow-lg cursor-pointer ">
                                    <button type="button" id="question1" data-state="closed"
                                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">


                                        <div class="flex gap-3 items-center">
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
                                                <p class="text-sm text-[#828282] font-medium">Business Profile Information
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
                                            <div class="flex gap-2 items-center justify-start">

                                                <h5 class="ftext-[#3A3A3A] font-medium  text-sm sm:text-base">Personal
                                                    Information</h5>
                                            </div>
                                            <div class="flex gap-2 items-center justify-end">
                                                <img class="w-6 h-6" src="../src/assets/icons/akar-icons_edit.png"
                                                    alt="">
                                                <h6 class="text-[#3A3A3A] font-medium text-xs sm:text-sm">Edit</h6>
                                            </div>

                                        </div> --}}
                                        <div class="block lg:hidden text-center">
                                            <h3 class="text-xl font-bold">Business Profile</h3>
                                            <hr class="mt-2 border-gray-300">
                                        </div>



                                        <div class="w-[90%] md:w-[90%] lg:w-[85%] mx-auto mt-[1rem] mb-[3rem]">

                                            <div class="bg-[#FAFAFA]  shadow-md p-4 rounded-xl flex gap-6">
                                                <!-- Mobile Version -->
                                                <div>
                                                    <label for="photoMobile"
                                                        class="block text-sm font-medium text-gray-700">Photo</label>
                                                    <div class="mt-1 flex items-center">
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
                                                        <input type="file" name="photo" id="photoMobile"
                                                            class="hidden" onchange="previewPhoto('Mobile')">
                                                    </div>
                                                    @error('photo')
                                                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="mt-2 flex space-x-3">
                                                        <button type="button"
                                                            onclick="document.getElementById('photoMobile').click()"
                                                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-md">
                                                            Select a New Photo
                                                        </button>
                                                        <button type="button" onclick="removePhoto('Mobile')"
                                                            class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-2 px-4 rounded-lg shadow-md">
                                                            Remove Photo
                                                        </button>
                                                        <button type="submit"
                                                            class="bg-indigo-700 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">Save</button>
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
                                                            value="{{ old('full_name', $advisor->full_name) }}"
                                                            class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                                        @error('full_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full mb-2">
                                                    <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Email
                                                    </h5>
                                                    <input type="email" name="email" id="email"
                                                        value="{{ old('email', $advisor->email) }}"
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
                                                                value="{{ old('mobile_number', $advisor->mobile_number) }}"
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
                                                            value="{{ old('location', $advisor->location) }}"
                                                            class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                                        @error('location')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>
                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="company_name">Linkedin
                                                    Profile</label>
                                                <input type="linkedin_profile" name="linkedin_profile"
                                                    id="linkedin_profile"
                                                    value="{{ old('linkedin_profile', $advisor->linkedin_profile) }}"
                                                    class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">
                                                @error('linkedin_profile')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="businessFunction">Business function</label>
                                                <div id="businessFunction">
                                                    <select id="business_function_category_id"
                                                        name="business_function_category_id" class="outline-none w-full">
                                                        <option value="">Select Business Function Category</option>
                                                        @foreach ($businessFunctionCategories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ $category->id == $advisor->business_function_category_id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            @if ($advisor->business_function_category_id)
                                                <div
                                                    class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                    <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                        for="sub_function_category_id_1">Sub Business function 1</label>
                                                    <div id="sub_function_category_id_1">
                                                        <select id="sub_function_category_id_1"
                                                            name="sub_function_category_id_1" class="outline-none w-full">
                                                            <option value="">Select Sub Function 1</option>
                                                            @foreach ($subFunction1Options as $option)
                                                                <option value="{{ $option->id }}"
                                                                    {{ $option->id == $advisor->sub_function_category_id_1 ? 'selected' : '' }}>
                                                                    {{ $option->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div
                                                    class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                    <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                        for="sub_function_category_id_2">Sub Business function 2</label>
                                                    <div id="sub_function_category_id_2">
                                                        <select id="sub_function_category_id_2"
                                                            name="sub_function_category_id_2" class="outline-none w-full">
                                                            <option value="">Select Sub Function 2</option>
                                                            @foreach ($subFunction2Options as $option)
                                                                <option value="{{ $option->id }}"
                                                                    {{ $option->id == $advisor->sub_function_category_id_2 ? 'selected' : '' }}>
                                                                    {{ $option->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="industry">Industry</label>
                                                <div id="industry">
                                                    <select id="industry_select_mobile" class="outline-none w-full">
                                                        <option value="">Select Industry</option>
                                                        @foreach ($industries as $industry)
                                                            <option value="{{ $industry->id }}">{{ $industry->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <button id="add_industry_mobile"
                                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Add</button>
                                                </div>
                                                <div id="selected_industries_mobile" class="flex flex-wrap gap-2 mt-2">
                                                    @foreach ($advisor->getIndustries() as $industry)
                                                        <div id="industry_{{ $industry->id }}"
                                                            class="bg-blue-200 text-blue-800 px-2 py-1 rounded flex items-center">
                                                            <span>{{ $industry->name }}</span>
                                                            <button type="button"
                                                                class="ml-2 text-red-600 hover:text-red-800 focus:outline-none"
                                                                onclick="removeIndustry({{ $industry->id }})">x</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Hidden input to store selected industry IDs -->
                                                <input type="hidden" name="industries" id="industries_mobile"
                                                    value="{{ json_encode($advisor->industry_ids) }}">
                                            </div>

                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="geography">Geography</label>
                                                <div id="geography">
                                                    <select id="geography_select_mobile" class="outline-none w-full">
                                                        <option value="">Select Geography</option>
                                                        @foreach ($geographies as $geography)
                                                            <option value="{{ $geography->id }}">{{ $geography->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <button id="add_geography_mobile"
                                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Add</button>
                                                </div>
                                                <div id="selected_geographies_mobile" class="flex flex-wrap gap-2 mt-2">
                                                    @foreach ($advisor->getGeographies() as $geography)
                                                        <div id="geography_{{ $geography->id }}"
                                                            class="bg-green-200 text-green-800 px-2 py-1 rounded flex items-center">
                                                            <span>{{ $geography->name }}</span>
                                                            <button type="button"
                                                                class="ml-2 text-red-600 hover:text-red-800 focus:outline-none"
                                                                onclick="removeGeography({{ $geography->id }})">x</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Hidden input to store selected industry IDs -->
                                                <input type="hidden" name="geographies" id="geographies_mobile"
                                                    value="{{ json_encode($advisor->industry_ids) }}">
                                            </div>
                                            <div class="block lg:hidden text-center">
                                            <h3 class="text-xl font-bold">Additional Information</h3>
                                            <hr class="mt-2 border-gray-300">
                                        </div>
                                        <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex justify-between items-center  gap-2">
                                                <p>Are you a business Owner?</p>
                                                <input type="checkbox" name="is_founder" id="is_founder" value="1"
                                                    {{ old('is_founder', $advisor->is_founder ? 'checked' : '') }}
                                                    class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                                @error('is_founder')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="profileLink">Company Name</label>
                                                <input type="company_name" name="company_name" id="company_name"
                                                    value="{{ old('company_name', $advisor->company_name) }}"
                                                    placeholder="Mention your company name"
                                                    class="text-[#2A2A2A] placeholder:text-[#B0B0B0] font-medium text-sm sm:text-base outline-none bg-transparent">
                                                @error('company_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="profileLink">Company Website</label>
                                                <input type="text" name="company_website" id="company_website"
                                                    value="{{ old('company_website', $advisor->company_website) }}"
                                                    placeholder="example - https//xyz.com"
                                                    class="text-[#2A2A2A] placeholder:text-[#B0B0B0] font-medium text-sm sm:text-base outline-none bg-transparent">
                                                @error('company_website')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="Description">Mention details about yourself e.g. experience, expertise</label>
                                                <textarea id="about" name="about" rows="6"
                                                    class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">{{ old('about', $advisor->about) }}</textarea>
                                                @error('about')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <!-- Awards and Recognition -->
                                            <div class="mt-4">
                                                <label for="awards_recognition"
                                                    class="text-[#828282] font-normal text-base">Mention accomplishments in your professional career</label>
                                                <div id="awards-recognition-editor-mobile"
                                                    class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">
                                                </div>
                                                <input type="hidden" id="awards_recognition-mobile"
                                                    name="awards_recognition"
                                                    value="{{ old('awards_recognition', $advisor->awards_recognition) }}">
                                                <!-- Error Handling (if applicable) -->
                                                @error('awards_recognition')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <label for="services"
                                                    class="text-[#828282] font-normal text-base">Mention about services and products you or your company offers</label>
                                                <div id="services-editor-mobile"
                                                    class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">
                                                </div>
                                                <input type="hidden" id="services-mobile" name="services"
                                                    value="{{ old('services', $advisor->services) }}">
                                                <!-- Error Handling (if applicable) -->
                                                @error('services')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="highlighted_images">Select multiple images that highlight your services or products.</label>
                                                <input type="file" name="highlighted_images[]"
                                                    id="highlighted_images_mobile" accept="image/*" multiple
                                                    class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">
                                                @error('highlighted_images.*')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                                <!-- Display selected images -->
                                                <div id="preview-images_mobile" class="mt-2 flex flex-wrap gap-4">
                                                    @if ($advisor->highlighted_images)
                                                        @foreach ($advisor->highlighted_images as $image)
                                                            @if (is_string($image))
                                                                <div class="relative">
                                                                    <img src="{{ asset('storage/' . $image) }}"
                                                                        alt="Image" class="rounded-lg h-24">
                                                                    <input type="hidden" name="removed_images[]"
                                                                        value="{{ $image }}">
                                                                    <button type="button"
                                                                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center"
                                                                        onclick="removeImage(this, '{{ $image }}')">
                                                                        <svg class="h-4 w-4" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex justify-between items-center  gap-2">
                                                <p>Is Available</p>
                                                <input type="checkbox" name="is_available" id="is_available"
                                                    value="1"
                                                    {{ old('is_available', $advisor->is_available ? 'checked' : '') }}
                                                    class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                                @error('is_available')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror

                                            </div> --}}
                                            <!-- Services -->


                                            {{-- <div
                                                class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                                <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                    for="profileLink">LinkedIn profile link</label>
                                                <input type="text" id="profileLink"
                                                    placeholder="Enter LinkedIn profile link"
                                                    class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">
                                            </div> --}}

                                            <div class="w-full mt-6 flex justify-end space-x-3 mb-5">
                                                <button type="submit"
                                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">Save</button>
                                                <button type="reset"
                                                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded-lg shadow-md">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <!-- availability -->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question2" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Availability</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium">Select available timeslots for client discussions.</p>

                                    </div>
                                    <svg id="arrow2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer2" style="display:none">
                                    <div class="grow border shadow-sm p-5 rounded-xl">
                                        <div id="availability-summary-mobile"
                                            class="flex gap-2 xl:gap-4 w-full flex-wrap">
                                            <!-- Availability summary will be loaded here -->
                                        </div>
                                        <div class="flex justify-between items-end mt-4">
                                            <button onclick="openAvailabilityModal()"
                                                class="bg-[#6A9023] text-[#FFFFFF] px-4 py-2 lg:py-2 lg:px-6 rounded-[2rem] text-sm lg:text-base font-semibold">
                                                Choose Availability
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- advisory -->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question3" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Advisory Price</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">State your advisory fee for clients. For discovery calls, the suggested price is INR 0 to 500.</p>
                                    </div>

                                    <svg id="arrow3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer3" style="display:none">
                                    <form action="{{ route('advisor.updatePrices') }}" method="POST">
                                        @csrf
                                        <div class="border shadow-sm p-2 sm:p-5 rounded-xl">
                                            <div class="flex items-center justify-between gap-2 w-full">
                                                <p class="font-medium text-sm sm:text-base text-[#2A2A2A]">Set Your
                                                    Advisory Price</p>
                                                <div
                                                    class="border-2 border-[#828282] px-4 py-2 bg-[#FFFFFF] rounded-lg text-xs sm:text-sm">
                                                    <button type="button" id="mobile-toggle-minute"
                                                        class="mobile-toggle-button bg-[#DB5001] text-[#FFFFFF] rounded-lg px-3 py-1">Minute</button>
                                                    <button type="button" id="mobile-toggle-hour"
                                                        class="mobile-toggle-button bg-transparent text-[#2A2A2A] rounded-lg px-3 py-1">Hour</button>
                                                </div>
                                            </div>
                                            <div class="flex flex-col items-center mt-6 gap-y-[2rem]">
                                                <div class="flex flex-col gap-2">
                                                    <p class="text-sm sm:text-base text-[#2A2A2A] font-medium">Discovery
                                                        call</p>
                                                    <div class="flex gap-4 items-end">
                                                        <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                            <p class="text-[#828282] font-normal">Currency</p>
                                                            <p
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                                INR (₹)</p>
                                                        </div>
                                                        <div class="w-[1rem] mb-4 border border-[#3A3A3A]"></div>
                                                        <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                            <p class="text-[#828282] font-normal">Price</p>
                                                            <input type="number" name="discovery_call_price_per_minute"
                                                                id="mobile_discovery_call_price_per_minute"
                                                                value="{{ $advisor->discovery_call_price_per_minute }}"
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[90px]">
                                                            <input type="number" name="discovery_call_price_per_hour"
                                                                id="mobile_discovery_call_price_per_hour"
                                                                value="{{ $advisor->discovery_call_price_per_hour }}"
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md hidden w-[100px]">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex flex-col gap-2">
                                                    <p class="text-sm sm:text-base text-[#2A2A2A] font-medium">Consultation
                                                        call</p>
                                                    <div class="flex gap-4 items-end">
                                                        <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                            <p class="text-[#828282] font-normal">Currency</p>
                                                            <p
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                                INR (₹)</p>
                                                        </div>
                                                        <div class="w-[1rem] mb-4 border border-[#3A3A3A]"></div>
                                                        <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                            <p class="text-[#828282] font-normal">Price</p>
                                                            <input type="number" name="conference_call_price_per_minute"
                                                                id="mobile_conference_call_price_per_minute"
                                                                value="{{ $advisor->conference_call_price_per_minute }}"
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[90px]">
                                                            <input type="number" name="conference_call_price_per_hour"
                                                                id="mobile_conference_call_price_per_hour"
                                                                value="{{ $advisor->conference_call_price_per_hour }}"
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md hidden w-[100px]">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="flex flex-col gap-2">
                                                    <p class="text-sm sm:text-base text-[#2A2A2A] font-medium">Chat</p>
                                                    <div class="flex gap-4 items-end">
                                                        <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                            <p class="text-[#828282] font-normal">Currency</p>
                                                            <p
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                                INR (₹)</p>
                                                        </div>
                                                        <div class="w-[1.5rem] mb-4 border border-[#3A3A3A]"></div>
                                                        <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                            <p class="text-[#828282] font-normal">Price</p>
                                                            <input type="number" name="chat_price_per_minute"
                                                                id="mobile_chat_price_per_minute"
                                                                value="{{ $advisor->chat_price_per_minute }}"
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[90px]">
                                                            <input type="number" name="chat_price_per_hour"
                                                                id="mobile_chat_price_per_hour"
                                                                value="{{ $advisor->chat_price_per_hour }}"
                                                                class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md hidden w-[100px]">
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold mt-6">Update
                                            Price</button>
                                    </form>
                                </div>

                            </div>

                            <!-- payment information -->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question4" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Payment Information
                                        </p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Specify the account information for receiving advisory payments.</p>
                                    </div>

                                    <svg id="arrow4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer4" style="display:none">
                                    <form action="{{ route('advisor.bankDetails.store') }}" method="POST"
                                        class="space-y-4">
                                        @csrf
                                        <div
                                            class="grow border flex flex-col justify-around gap-3 shadow-sm p-5 rounded-xl">
                                            <p class="text-[#828282] text-sm sm:text-base font-medium">Add your payment
                                                information.</p>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="mobile_bank_name"
                                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Bank
                                                        Name</label>
                                                    <input type="text" name="bank_name" id="mobile_bank_name"
                                                        value="{{ old('bank_name', $advisor->bankDetails->bank_name ?? '') }}"
                                                        required
                                                        class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                                </div>
                                                <div>
                                                    <label for="mobile_account_holder_name"
                                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Account
                                                        Holder Name</label>
                                                    <input type="text" name="account_holder_name"
                                                        id="mobile_account_holder_name"
                                                        value="{{ old('account_holder_name', $advisor->bankDetails->account_holder_name ?? '') }}"
                                                        required
                                                        class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                                </div>
                                                <div>
                                                    <label for="mobile_account_number"
                                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Account
                                                        Number</label>
                                                    <input type="text" name="account_number"
                                                        id="mobile_account_number"
                                                        value="{{ old('account_number', $advisor->bankDetails->account_number ?? '') }}"
                                                        required
                                                        class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                                </div>
                                                <div>
                                                    <label for="mobile_account_type"
                                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Account
                                                        Type</label>
                                                    <select name="account_type" id="mobile_account_type" required
                                                        class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                                        <option value="saving"
                                                            {{ (old('account_type') ?? ($advisor->bankDetails->account_type ?? '')) == 'saving' ? 'selected' : '' }}>
                                                            Saving</option>
                                                        <option value="current"
                                                            {{ (old('account_type') ?? ($advisor->bankDetails->account_type ?? '')) == 'current' ? 'selected' : '' }}>
                                                            Current</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="mobile_bank_ifsc"
                                                        class="text-sm sm:text-base text-[#2A2A2A] font-medium">Bank
                                                        IFSC</label>
                                                    <input type="text" name="bank_ifsc" id="mobile_bank_ifsc"
                                                        value="{{ old('bank_ifsc', $advisor->bankDetails->bank_ifsc ?? '') }}"
                                                        required
                                                        class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-full">
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                                                {{ $advisor->bankDetails ? 'Update' : 'Add' }}
                                            </button>

                                        </div>
                                    </form>
                                </div>

                            </div>


                            <!-- review summery-->
                            {{-- <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question5" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Reviews summary</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Check your
                                            reviews analytics here.</p>
                                    </div>

                                    <svg id="arrow5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer5" style="display:none">
                                    <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                                        <p class="text-[#828282] text-sm sm:text-base font-medium">Add your Review summary.
                                        </p>
                                        <button
                                            class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div> --}}


                            <!-- upload a video-->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question5" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Upload a video</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Showcase your expertise by uploading videos for users.</p>
                                    </div>

                                    <svg id="arrow5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer5" style="display:none">
                                    <form action="{{ route('advisor.updateVideos') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div
                                            class="grow border flex flex-col justify-around gap-3 shadow-sm p-5 rounded-xl">
                                            <p class="text-[#828282] text-sm sm:text-base font-medium">Upload your video
                                                content here. Accepted file formats include MP4, MOV, AVI, and more.</p>

                                            <div
                                                class="w-[170px] h-[130px] bg-[#F8FFEA] rounded-xl flex items-center justify-center mb-6 mt-8">
                                                <label for="video_upload" class="w-fit cursor-pointer">
                                                    <img class="w-8 h-8 mx-auto" src="../src/assets/icons/video.png"
                                                        alt="">
                                                    <p class="font-medium text-sm sm:text-base text-[#6A9023]">Choose
                                                        video<br> and upload</p>
                                                    <input type="file" name="video_upload[]" id="video_upload"
                                                        accept="video/*" multiple class="hidden">
                                                </label>
                                                @error('video_upload.*')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="w-full border border-[#E4E4E4]"></div>

                                            <p class="font-medium text-[#2A2A2A] text-sm sm:text-base">My videos</p>
                                            <div id="preview-videos-mobile" class="flex flex-wrap gap-4">
                                                @if ($advisor->video_upload)
                                                    @foreach ($advisor->video_upload as $video)
                                                        <div class="relative">
                                                            <video controls class="rounded-lg h-24">
                                                                <source src="{{ asset('storage/' . $video) }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            <input type="hidden" name="removed_videos[]"
                                                                value="{{ $video }}">
                                                            <button type="button"
                                                                class="absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center"
                                                                onclick="removeVideo(this, '{{ $video }}')">
                                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <button type="submit"
                                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                                                {{ $advisor->video_upload ? 'Update video file' : 'Add video file' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <!-- Customer Support -->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question6" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
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
                                <div id="answer6" style="display:none">
                                    <div
                                        class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
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
                            {{-- <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question7" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
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
                                <div id="answer7" style="display:none">
                                    <div
                                        class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                                        <p class="text-[#828282] text-sm sm:text-base font-medium">Once your account is
                                            deleted, all of its resources and data will be permanently deleted. </p>
                                        <button
                                            class="w-fit bg-[#FF3131] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                            Delete Account
                                        </button>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>

            </div>

        </div>





        <div id="ticketModal" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
            <div class="modal-overlay absolute w-full h-full bg-black opacity-50"></div>

            <div
                class="modal-content bg-white p-8 rounded shadow-lg relative z-10 w-full h-full md:h-auto md:w-[70%] lg:w-[65%]">
                <div class="flex items-center justify-between">
                    <p class="text-[#526E1C] font-medium text-lg lg:text-xl">Raise a Ticket</p>
                    <button id="closeBtn" class="w-6 h-6 cursor-pointer">&times;</button>
                </div>
                <form id="ticketForm" action="{{ route('advisor.tickets.store') }}" method="POST"
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
                            <input type="file" id="attachment" name="attachment"
                                class="outline-none text-[#3A3A3A]">
                            <label for="attachment">
                                <img src="../src/assets/icons/file.png" alt="Attach File" class="w-5 h-5">
                            </label>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-center md:justify-end mt-4">
                        <button type="submit"
                            class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] text-lg lg:text-xl text-[#FFFFFF] font-semibold py-1 px-6 rounded-[24px]">
                            Submit Ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="ticketModalmobile"
            class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
            <div class="modal-overlay absolute w-full h-full bg-black opacity-50"></div>

            <div
                class="modal-content bg-white p-8 rounded shadow-lg relative z-10 w-full h-full md:h-auto md:w-[70%] lg:w-[65%]">
                <div class="flex items-center justify-between">
                    <p class="text-[#526E1C] font-medium text-lg lg:text-xl">Raise a Ticket</p>
                    <button id="closeBtnmobile" class="w-6 h-6 cursor-pointer">&times;</button>
                </div>
                <form id="ticketForm" action="{{ route('advisor.tickets.store') }}" method="POST"
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
                            <input type="file" id="attachment" name="attachment"
                                class="outline-none text-[#3A3A3A]">
                            <label for="attachment">
                                <img src="../src/assets/icons/file.png" alt="Attach File" class="w-5 h-5">
                            </label>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-center md:justify-end mt-4">
                        <button type="submit"
                            class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] text-lg lg:text-xl text-[#FFFFFF] font-semibold py-1 px-6 rounded-[24px]">
                            Submit Ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>






        <!-- bottom menu bar -->
        @include('advisor.components.bottommenu')
        <!-- side bar -->
        @include('advisor.components.sidebar')




    </div>

    @include('advisor.components.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function openlargeCalender() {
            Swal.fire({
                html: document.getElementById('calenderLg').innerHTML,
                showConfirmButton: true,
                confirmButtonText: 'Done',
                confirmButtonColor: '#6A9023',
                customClass: {
                    container: 'custom-calender-width'
                },
                showCloseButton: true,
            });
        }
    </script>
    <script>
        function opensmallCalender() {
            Swal.fire({
                html: document.getElementById('calendersm').innerHTML,
                showConfirmButton: true,
                confirmButtonText: 'Done',
                confirmButtonColor: '#6A9023',
                customClass: {
                    container: 'custom-calender-width'
                },
                showCloseButton: true,
            });
        }
    </script>

    <script>
        // JavaScript to toggle sidebar
        // const toggleBtn = document.querySelector('.toggleBtn');
        const hideSideMenu = document.getElementById('hideSideMenu')
        const showSideMenu = document.getElementById('showSideMenu')


        // console.log(toggleBtn)
        console.log(hideSideMenu, showSideMenu)
        const sidebar = document.querySelector('.sidebar');

        hideSideMenu.addEventListener('click', () => {
            sidebar.classList.add('left-full');
        })
        showSideMenu.addEventListener('click', () => {
            sidebar.classList.remove('left-full');
        });
    </script>


    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var btnsm = document.getElementById("myBtnsm");
        // console.log(btnsm)
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
        document.querySelectorAll('[id^="question"]').forEach(function(button, index) {
            button.addEventListener('click', function() {
                var answer = document.getElementById('answer' + (index + 1));
                var arrow = document.getElementById('arrow' + (index + 1));

                if (answer.style.display === 'none' || answer.style.display === '') {
                    answer.style.display = 'block';
                    arrow.style.transform = 'rotate(0deg)';
                } else {
                    answer.style.display = 'none';
                    arrow.style.transform = 'rotate(-180deg)';
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


    {{-- @php
        function generateInitialPhotoUrls($name)
        {
            $initial = strtoupper(substr($name, 0, 1));
            return "https://via.placeholder.com/150/000000/FFFFFF/?text=$initial"; // Replace with actual initial photo generator service
        }
    @endphp --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const businessFunctionCategorySelect = document.getElementById('business_function_category_id');
            const subFunctionCategorySelect1 = document.getElementById('sub_function_category_id_1');
            const subFunctionCategorySelect2 = document.getElementById('sub_function_category_id_2');

            businessFunctionCategorySelect.addEventListener('change', function() {
                const selectedCategoryId = this.value;

                // Reset sub function dropdowns
                subFunctionCategorySelect1.innerHTML = '<option value="">Select Sub Function 1</option>';
                subFunctionCategorySelect2.innerHTML = '<option value="">Select Sub Function 2</option>';

                if (selectedCategoryId) {
                    fetch(`/api/sub-function-categories/${selectedCategoryId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            data.forEach(subFunction => {
                                const option1 = document.createElement('option');
                                option1.value = subFunction.id;
                                option1.textContent = subFunction.name;
                                subFunctionCategorySelect1.appendChild(option1);

                                const option2 = document.createElement('option');
                                option2.value = subFunction.id;
                                option2.textContent = subFunction.name;
                                subFunctionCategorySelect2.appendChild(option2);
                            });

                            // Show sub function dropdowns
                            document.getElementById('sub_function_1').style.display = 'block';
                            document.getElementById('sub_function_2').style.display = 'block';

                            // Set selected options based on advisor's data
                            if (selectedCategoryId ==
                                '{{ $advisor->business_function_category_id }}') {
                                subFunctionCategorySelect1.value =
                                    '{{ $advisor->sub_function_category_id_1 }}';
                                subFunctionCategorySelect2.value =
                                    '{{ $advisor->sub_function_category_id_2 }}';
                            }
                        })
                        .catch(error => console.error('Error fetching sub functions:', error));
                } else {
                    // Hide sub function dropdowns if no category selected
                    document.getElementById('sub_function_1').style.display = 'none';
                    document.getElementById('sub_function_2').style.display = 'none';
                }
            });

            // Trigger change event initially if a business function category is pre-selected
            if (businessFunctionCategorySelect.value) {
                businessFunctionCategorySelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIndustryButton = document.getElementById('add_industry');
            const addGeographyButton = document.getElementById('add_geography');
            const industrySelect = document.getElementById('industry_select');
            const geographySelect = document.getElementById('geography_select');
            const selectedIndustriesContainer = document.getElementById('selected_industries');
            const selectedGeographiesContainer = document.getElementById('selected_geographies');
            const industriesInput = document.getElementById('industries');
            const geographiesInput = document.getElementById('geographies');

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

            addGeographyButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission

                const geographyId = geographySelect.value;
                const geographyName = geographySelect.options[geographySelect.selectedIndex].text;

                if (geographyId && !isGeographySelected(geographyId)) {
                    if (selectedGeographiesContainer.children.length < 3) {
                        appendGeographyTag(geographyId, geographyName);
                        updateGeographiesInput();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Limit Reached',
                            text: 'You can select only up to 3 geographies.'
                        });
                    }
                }
            });

            function isIndustrySelected(id) {
                return document.getElementById(`industry_${id}`) !== null;
            }

            function isGeographySelected(id) {
                return document.getElementById(`geography_${id}`) !== null;
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

            function appendGeographyTag(id, name) {
                const tag = document.createElement('div');
                tag.id = `geography_${id}`;
                tag.className = 'bg-green-200 text-green-800 px-2 py-1 rounded flex items-center';
                tag.innerHTML = `
            <span>${name}</span>
            <button type="button" class="ml-2 text-red-600 hover:text-red-800 focus:outline-none" onclick="removeGeography(${id})">x</button>
        `;
                selectedGeographiesContainer.appendChild(tag);
            }

            window.removeIndustry = function(id) {
                const tag = document.getElementById(`industry_${id}`);
                if (tag) {
                    tag.remove();
                    updateIndustriesInput();
                }
            };

            window.removeGeography = function(id) {
                const tag = document.getElementById(`geography_${id}`);
                if (tag) {
                    tag.remove();
                    updateGeographiesInput();
                }
            };

            function updateIndustriesInput() {
                const selectedIds = Array.from(selectedIndustriesContainer.children).map(tag => tag.id.replace(
                    'industry_', ''));
                industriesInput.value = JSON.stringify(selectedIds);
                console.log('Updated industries:', industriesInput.value); // Debugging log
            }

            function updateGeographiesInput() {
                const selectedIds = Array.from(selectedGeographiesContainer.children).map(tag => tag.id.replace(
                    'geography_', ''));
                geographiesInput.value = JSON.stringify(selectedIds);
                console.log('Updated geographies:', geographiesInput.value); // Debugging log
            }

            @if ($advisor->industries)
                @foreach ($advisor->industries as $industry)
                    appendIndustryTag({{ $industry->id }}, '{{ $industry->name }}');
                @endforeach
                updateIndustriesInput();
            @endif

            @if ($advisor->geographies)
                @foreach ($advisor->geographies as $geography)
                    appendGeographyTag({{ $geography->id }}, '{{ $geography->name }}');
                @endforeach
                updateGeographiesInput();
            @endif
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIndustryButton = document.getElementById('add_industry_mobile');
            const addGeographyButton = document.getElementById('add_geography_mobile');
            const industrySelect = document.getElementById('industry_select_mobile');
            const geographySelect = document.getElementById('geography_select_mobile');
            const selectedIndustriesContainer = document.getElementById('selected_industries_mobile');
            const selectedGeographiesContainer = document.getElementById('selected_geographies_mobile');
            const industriesInput = document.getElementById('industries_mobile');
            const geographiesInput = document.getElementById('geographies_mobile');

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

            addGeographyButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission

                const geographyId = geographySelect.value;
                const geographyName = geographySelect.options[geographySelect.selectedIndex].text;

                if (geographyId && !isGeographySelected(geographyId)) {
                    if (selectedGeographiesContainer.children.length < 3) {
                        appendGeographyTag(geographyId, geographyName);
                        updateGeographiesInput();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Limit Reached',
                            text: 'You can select only up to 3 geographies.'
                        });
                    }
                }
            });

            function isIndustrySelected(id) {
                return document.getElementById(`industry_${id}`) !== null;
            }

            function isGeographySelected(id) {
                return document.getElementById(`geography_${id}`) !== null;
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

            function appendGeographyTag(id, name) {
                const tag = document.createElement('div');
                tag.id = `geography_${id}`;
                tag.className = 'bg-green-200 text-green-800 px-2 py-1 rounded flex items-center';
                tag.innerHTML = `
            <span>${name}</span>
            <button type="button" class="ml-2 text-red-600 hover:text-red-800 focus:outline-none" onclick="removeGeography(${id})">x</button>
        `;
                selectedGeographiesContainer.appendChild(tag);
            }

            window.removeIndustry = function(id) {
                const tag = document.getElementById(`industry_${id}`);
                if (tag) {
                    tag.remove();
                    updateIndustriesInput();
                }
            };

            window.removeGeography = function(id) {
                const tag = document.getElementById(`geography_${id}`);
                if (tag) {
                    tag.remove();
                    updateGeographiesInput();
                }
            };

            function updateIndustriesInput() {
                const selectedIds = Array.from(selectedIndustriesContainer.children).map(tag => tag.id.replace(
                    'industry_', ''));
                industriesInput.value = JSON.stringify(selectedIds);
                console.log('Updated industries:', industriesInput.value); // Debugging log
            }

            function updateGeographiesInput() {
                const selectedIds = Array.from(selectedGeographiesContainer.children).map(tag => tag.id.replace(
                    'geography_', ''));
                geographiesInput.value = JSON.stringify(selectedIds);
                console.log('Updated geographies:', geographiesInput.value); // Debugging log
            }

            @if ($advisor->industries)
                @foreach ($advisor->industries as $industry)
                    appendIndustryTag({{ $industry->id }}, '{{ $industry->name }}');
                @endforeach
                updateIndustriesInput();
            @endif

            @if ($advisor->geographies)
                @foreach ($advisor->geographies as $geography)
                    appendGeographyTag({{ $geography->id }}, '{{ $geography->name }}');
                @endforeach
                updateGeographiesInput();
            @endif
        });
    </script>
    <!-- JavaScript to Preview Images and Remove -->
    {{-- <script>
        // Remove image function
        function removeImage(imagePath) {
            const imagesContainer = document.getElementById('preview-images');
            // Remove from DOM
            const imageToRemove = imagesContainer.querySelector(`[src='${imagePath}']`).parentNode;
            imageToRemove.remove();
            // Remove from form data (if needed)
            // Handle removal in backend if required
        }

        // Preview images on file selection
        document.getElementById('highlighted_images').addEventListener('change', function() {
            const previewContainer = document.getElementById('preview-images');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.className = 'rounded-lg h-24'; // Add Tailwind CSS classes

                    const closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.className =
                        'absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center';
                    closeButton.setAttribute('onclick', `removeImage('${event.target.result}')`);
                    closeButton.innerHTML = `<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>`;

                    const container = document.createElement('div');
                    container.className = 'relative';
                    container.appendChild(imgElement);
                    container.appendChild(closeButton);

                    previewContainer.appendChild(container);
                };
                reader.readAsDataURL(file);
            });
        });
    </script> --}}
    <!-- JavaScript to Preview Images and Remove -->
    <script>
        // Remove image function
        function removeImage(button, imagePath) {
            const imagesContainer = document.getElementById('preview-images');
            // Remove from DOM
            const imageToRemove = button.parentNode;
            imageToRemove.remove();
        }

        // Preview images on file selection
        document.getElementById('highlighted_images').addEventListener('change', function() {
            const previewContainer = document.getElementById('preview-images');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.className = 'rounded-lg h-24'; // Add Tailwind CSS classes

                    const closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.className =
                        'absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center';
                    closeButton.setAttribute('onclick', `removeImage(this, '${event.target.result}')`);
                    closeButton.innerHTML = `<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>`;

                    const container = document.createElement('div');
                    container.className = 'relative';
                    container.appendChild(imgElement);
                    container.appendChild(closeButton);

                    previewContainer.appendChild(container);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
    <script>
        // Remove image function
        function removeImage(button, imagePath) {
            const imagesContainer = document.getElementById('preview-images_mobile');
            // Remove from DOM
            const imageToRemove = button.parentNode;
            imageToRemove.remove();
        }

        // Preview images on file selection
        document.getElementById('highlighted_images_mobile').addEventListener('change', function() {
            const previewContainer = document.getElementById('preview-images_mobile');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.className = 'rounded-lg h-24'; // Add Tailwind CSS classes

                    const closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.className =
                        'absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center';
                    closeButton.setAttribute('onclick', `removeImage(this, '${event.target.result}')`);
                    closeButton.innerHTML = `<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>`;

                    const container = document.createElement('div');
                    container.className = 'relative';
                    container.appendChild(imgElement);
                    container.appendChild(closeButton);

                    previewContainer.appendChild(container);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
    <!-- JavaScript to Handle Video Uploads and Progress Bars -->
    <script>
        // Function to handle file upload and display progress bar
        function handleFileUpload(file, index) {
            const formData = new FormData();
            formData.append('video_upload[]', file);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('advisor.myprofile.update') }}');
            xhr.upload.addEventListener('progress', function(event) {
                if (event.lengthComputable) {
                    const percentComplete = (event.loaded / event.total) * 100;
                    const progressBar = document.getElementById('progress-bar-' + index);
                    if (progressBar) {
                        progressBar.style.width = percentComplete + '%';
                    }
                }
            });

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle success
                        console.log('Upload successful');
                        const progressBar = document.getElementById('progress-bar-' + index);
                        progressBar.style.width = '100%'; // Set to 100% on completion
                        progressBar.classList.remove('bg-green-200'); // Remove background
                        progressBar.classList.add('bg-green-500'); // Change to green
                    } else {
                        // Handle error
                        console.error('Error during upload:', xhr.status);
                    }
                }
            };

            xhr.send(formData);
        }

        // Preview videos on file selection
        document.getElementById('video_upload').addEventListener('change', function() {
            const previewContainer = document.getElementById('preview-videos');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(this.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const videoElement = document.createElement('video');
                    videoElement.controls = true;
                    videoElement.className = 'rounded-lg h-24'; // Add Tailwind CSS classes
                    const sourceElement = document.createElement('source');
                    sourceElement.src = event.target.result;
                    sourceElement.type = 'video/mp4';
                    videoElement.appendChild(sourceElement);

                    const closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.className =
                        'absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center';
                    closeButton.setAttribute('onclick', `removeVideo(this, '${event.target.result}')`);
                    closeButton.innerHTML = `<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>`;

                    const progressContainer = document.createElement('div');
                    progressContainer.className = 'h-2 mt-1 bg-green-500 rounded-md';
                    const progressBar = document.createElement('div');
                    progressBar.id = 'progress-bar-' + index;
                    progressBar.className = 'h-full bg-green-200 rounded-md';
                    progressContainer.appendChild(progressBar);

                    const container = document.createElement('div');
                    container.className = 'relative';
                    container.appendChild(videoElement);
                    container.appendChild(closeButton);
                    container.appendChild(progressContainer);

                    previewContainer.appendChild(container);

                    // Upload file and update progress bar
                    handleFileUpload(file, index);
                };
                reader.readAsDataURL(file);
            });
        });

        // Remove video function
        function removeVideo(button, videoPath) {
            const videosContainer = document.getElementById('preview-videos');
            // Remove from DOM
            const videoToRemove = button.parentNode;
            videoToRemove.remove();
        }

        document.getElementById('video_upload').addEventListener('change', function() {
            const previewContainer = document.getElementById('preview-videos-mobile');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(this.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const videoElement = document.createElement('video');
                    videoElement.controls = true;
                    videoElement.className = 'rounded-lg h-24'; // Add Tailwind CSS classes
                    const sourceElement = document.createElement('source');
                    sourceElement.src = event.target.result;
                    sourceElement.type = 'video/mp4';
                    videoElement.appendChild(sourceElement);

                    const closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.className =
                        'absolute top-1 right-1 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center';
                    closeButton.setAttribute('onclick', `removeVideo(this, '${event.target.result}')`);
                    closeButton.innerHTML = `<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>`;

                    const progressContainer = document.createElement('div');
                    progressContainer.className = 'h-2 mt-1 bg-green-500 rounded-md';
                    const progressBar = document.createElement('div');
                    progressBar.id = 'progress-bar-' + index;
                    progressBar.className = 'h-full bg-green-200 rounded-md';
                    progressContainer.appendChild(progressBar);

                    const container = document.createElement('div');
                    container.className = 'relative';
                    container.appendChild(videoElement);
                    container.appendChild(closeButton);
                    container.appendChild(progressContainer);

                    previewContainer.appendChild(container);

                    // Upload file and update progress bar
                    handleFileUpload(file, index);
                };
                reader.readAsDataURL(file);
            });
        });

        // Remove video function
        function removeVideo(button, videoPath) {
            const videosContainer = document.getElementById('preview-videos-mobile');
            // Remove from DOM
            const videoToRemove = button.parentNode;
            videoToRemove.remove();
        }
    </script>
    {{-- <script>
    function openAvailabilityModal() {
        document.getElementById('availabilityModal').classList.remove('hidden');
        loadAvailability();
    }

    function closeAvailabilityModal() {
        document.getElementById('availabilityModal').classList.add('hidden');
    }

    function loadAvailability() {
        fetch('/advisor/advisorinfo/availability')
            .then(response => response.json())
            .then(data => {
                document.querySelectorAll('.availability-checkbox').forEach(checkbox => {
                    const day = checkbox.dataset.day;
                    const slot = checkbox.dataset.slot;
                    checkbox.checked = data[day] && data[day].includes(slot);
                });
            });
    }

    function saveAvailability() {
        const availability = {};

        document.querySelectorAll('.availability-checkbox:checked').forEach(checkbox => {
            const day = checkbox.dataset.day;
            const slot = checkbox.dataset.slot;

            if (!availability[day]) {
                availability[day] = [];
            }

            availability[day].push(slot);
        });

        fetch('/advisor/advisorinfo/{{ $advisor->advisor_id }}/availability/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ availability: JSON.stringify(availability) })
        }).then(response => response.json())
          .then(data => {
              alert(data.message);
              closeAvailabilityModal();
              updateAvailabilitySummary();
          });
    }

    function updateAvailabilitySummary() {
        fetch('/advisor/advisorinfo/availability')
            .then(response => response.json())
            .then(data => {
                const summary = document.getElementById('availability-summary');
                summary.innerHTML = '';

                for (const day in data) {
                    const slots = data[day].join(', ');
                    const dayElement = document.createElement('p');
                    dayElement.classList.add('text-base', 'text-[#2A2A2A]', 'font-medium');
                    dayElement.textContent = `${day}: ${slots}`;
                    summary.appendChild(dayElement);
                }
            });
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateAvailabilitySummary();
    });
</script> --}}
    <script>
        function openAvailabilityModal() {
            document.getElementById('availabilityModal').classList.remove('hidden');
            loadAvailability();
        }

        function closeAvailabilityModal() {
            document.getElementById('availabilityModal').classList.add('hidden');
        }

        function loadAvailability() {
            fetch('/advisor/advisorinfo/availability')
                .then(response => response.json())
                .then(data => {
                    document.querySelectorAll('.availability-checkbox').forEach(checkbox => {
                        const day = checkbox.dataset.day;
                        const slot = checkbox.dataset.slot;

                        // Check if slot exists in availability data for the day
                        checkbox.checked = data[day] && data[day].some(item => item.time_slot === slot);
                    });
                });
        }

        function saveAvailability() {
            const availability = {};

            document.querySelectorAll('.availability-checkbox:checked').forEach(checkbox => {
                const day = checkbox.dataset.day;
                const slot = checkbox.dataset.slot;

                if (!availability[day]) {
                    availability[day] = [];
                }

                availability[day].push({
                    time_slot: slot,
                    availability_status: 1
                });
            });

            fetch('/advisor/advisorinfo/availability/update', {
                    method: 'POST', // Ensure you are using POST here
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        availability: availability
                    })
                }).then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Availability Saved',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        closeAvailabilityModal();
                        updateAvailabilitySummary();
                    });
                }).catch(error => {
                    console.error('Error saving availability:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to save availability. Please try again later.',
                        confirmButtonText: 'OK'
                    });
                });
        }


        // function updateAvailabilitySummary() {
        //     fetch('/advisor/advisorinfo/availability')
        //         .then(response => response.json())
        //         .then(data => {
        //             const summary = document.getElementById('availability-summary');
        //             summary.innerHTML = '';

        //             for (const day in data) {
        //                 const slots = data[day].map(item => item.time_slot).join(', ');
        //                 const dayElement = document.createElement('p');
        //                 dayElement.classList.add('text-base', 'text-[#2A2A2A]', 'font-medium');
        //                 dayElement.textContent = `${day}: ${slots}`;
        //                 summary.appendChild(dayElement);
        //             }
        //         });
        // }
        function updateAvailabilitySummary() {
            fetch('/advisor/advisorinfo/availability')
                .then(response => response.json())
                .then(data => {
                    const summary = document.getElementById('availability-summary');
                    summary.innerHTML = '';

                    // Iterate over each day in the data
                    Object.keys(data).forEach(day => {
                        const dayButton = document.createElement('button');
                        dayButton.classList.add('tab-button', 'py-2', 'px-4', 'rounded', 'cursor-pointer',
                            'hover:bg-green-500', 'hover:text-white');
                        dayButton.textContent = day;
                        dayButton.addEventListener('click', () => showSlotsForDay(day, data[day]));

                        summary.appendChild(dayButton);
                    });

                    function showSlotsForDay(day, slots) {
                        const activeTab = document.querySelector('.active-tab');
                        if (activeTab) {
                            activeTab.classList.remove('active-tab', 'bg-green-500', 'text-white');
                            activeTab.classList.add('bg-white', 'text-gray-800');
                        }

                        const selectedTab = summary.querySelector(`.tab-button[data-day="${day}"]`);
                        if (selectedTab) {
                            selectedTab.classList.add('active-tab', 'bg-green-500', 'text-white');
                            selectedTab.classList.remove('bg-white', 'text-gray-800');
                        }

                        // Clear existing table and create new one
                        const slotsTable = document.createElement('table');
                        slotsTable.classList.add('slots-table', 'w-full', 'mt-4', 'border-collapse', 'border',
                            'border-gray-300', 'rounded-lg', 'shadow-md');
                        slotsTable.innerHTML = `
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b border-gray-300">Start Time</th>
                            <th class="py-2 px-4 border-b border-l border-gray-300">End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${slots.length > 0 ?
                            slots.map(slot => `
                                                                                                                                                                                                                                                                                                                    <tr align="center">
                                                                                                                                                                                                                                                                                                                        <td class="py-2 px-4 border-b border-gray-300">
                                                                                                                                                                                                                                                                                                                            <span class="text-green-600 font-bold">${formatTime(slot.time_slot.split('-')[0].trim())}</span>
                                                                                                                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                                                                                                                        <td class="py-2 px-4 border-b border-l border-gray-300">
                                                                                                                                                                                                                                                                                                                            <span class="text-red-600 font-bold">${formatTime(slot.time_slot.split('-')[1].trim())}</span>
                                                                                                                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                                                                                                                                `).join('') :
                            `<tr><td colspan="2" class="py-2 px-4 text-center">No slots available</td></tr>`
                        }
                    </tbody>
                `;

                        function formatTime(time) {
                            const parts = time.match(/(\d+)(\w+)/);
                            if (parts && parts.length === 3) {
                                return `${parts[1]} ${parts[2]}`;
                            }
                            return time;
                        }

                        // Replace existing table or append if none
                        const existingTable = summary.querySelector('.slots-table');
                        if (existingTable) {
                            existingTable.replaceWith(slotsTable);
                        } else {
                            summary.appendChild(slotsTable);
                        }
                    }

                    // Initially show slots for the first day
                    if (Object.keys(data).length > 0) {
                        const firstDay = Object.keys(data)[0];
                        showSlotsForDay(firstDay, data[firstDay]);
                    }
                })
                .catch(error => {
                    console.error('Error fetching availability:', error);
                    // Handle error display if needed
                });
        }




        document.addEventListener('DOMContentLoaded', () => {
            updateAvailabilitySummary();
        });
    </script>
    {{-- <script>
        function updateAvailabilitySummary() {
            fetch('/advisor/advisorinfo/availability')
                .then(response => response.json())
                .then(data => {
                    const summary = document.getElementById('availability-summary-mobile');
                    summary.innerHTML = '';

                    // Iterate over each day in the data
                    Object.keys(data).forEach(day => {
                        const dayButton = document.createElement('button');
                        dayButton.classList.add('tab-button', 'py-2', 'px-4', 'rounded', 'cursor-pointer',
                            'hover:bg-green-500', 'hover:text-white');
                        dayButton.textContent = day;
                        dayButton.addEventListener('click', () => showSlotsForDay(day, data[day]));

                        summary.appendChild(dayButton);
                    });

                    function showSlotsForDay(day, slots) {
                        const activeTab = document.querySelector('.active-tab');
                        if (activeTab) {
                            activeTab.classList.remove('active-tab', 'bg-green-500', 'text-white');
                            activeTab.classList.add('bg-white', 'text-gray-800');
                        }

                        const selectedTab = summary.querySelector(`.tab-button[data-day="${day}"]`);
                        if (selectedTab) {
                            selectedTab.classList.add('active-tab', 'bg-green-500', 'text-white');
                            selectedTab.classList.remove('bg-white', 'text-gray-800');
                        }

                        // Clear existing table and create new one
                        const slotsTable = document.createElement('table');
                        slotsTable.classList.add('slots-table', 'w-full', 'mt-4', 'border-collapse', 'border',
                            'border-gray-300', 'rounded-lg', 'shadow-md');
                        slotsTable.innerHTML = `
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b border-gray-300">Start Time</th>
                            <th class="py-2 px-4 border-b border-l border-gray-300">End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${slots.length > 0 ?
                            slots.map(slot => `
                                                                <tr align="center">
                                                                    <td class="py-2 px-4 border-b border-gray-300">
                                                                        <span class="text-green-600 font-bold">${formatTime(slot.time_slot.split('-')[0].trim())}</span>
                                                                    </td>
                                                                    <td class="py-2 px-4 border-b border-l border-gray-300">
                                                                        <span class="text-red-600 font-bold">${formatTime(slot.time_slot.split('-')[1].trim())}</span>
                                                                    </td>
                                                                </tr>
                                                            `).join('') :
                            `<tr><td colspan="2" class="py-2 px-4 text-center">No slots available</td></tr>`
                        }
                    </tbody>
                `;

                        function formatTime(time) {
                            const parts = time.match(/(\d+)(\w+)/);
                            if (parts && parts.length === 3) {
                                return `${parts[1]} ${parts[2]}`;
                            }
                            return time;
                        }

                        // Replace existing table or append if none
                        const existingTable = summary.querySelector('.slots-table');
                        if (existingTable) {
                            existingTable.replaceWith(slotsTable);
                        } else {
                            summary.appendChild(slotsTable);
                        }
                    }

                    // Initially show slots for the first day
                    if (Object.keys(data).length > 0) {
                        const firstDay = Object.keys(data)[0];
                        showSlotsForDay(firstDay, data[firstDay]);
                    }
                })
                .catch(error => {
                    console.error('Error fetching availability:', error);
                    // Handle error display if needed
                });
        }

         document.addEventListener('DOMContentLoaded', () => {
            updateAvailabilitySummary();
        });
    </script> --}}
    <script>
        document.querySelectorAll('.toggle-button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.toggle-button').forEach(btn => {
                    btn.classList.remove('bg-[#DB5001]', 'text-[#FFFFFF]');
                    btn.classList.add('bg-transparent', 'text-[#2A2A2A]');
                });
                this.classList.remove('bg-transparent', 'text-[#2A2A2A]');
                this.classList.add('bg-[#DB5001]', 'text-[#FFFFFF]');

                const isMinute = this.id === 'toggle-minute';
                document.querySelectorAll('[id$="_price_per_minute"]').forEach(input => {
                    input.classList.toggle('hidden', !isMinute);
                });
                document.querySelectorAll('[id$="_price_per_hour"]').forEach(input => {
                    input.classList.toggle('hidden', isMinute);
                });
            });
        });

        // Default to minute view
        document.getElementById('toggle-minute').click();
    </script>
    <script>
        document.getElementById('mobile-toggle-minute').addEventListener('click', function() {
            togglePricing('minute');
        });
        document.getElementById('mobile-toggle-hour').addEventListener('click', function() {
            togglePricing('hour');
        });

        function togglePricing(mode) {
            const minuteElements = [
                document.getElementById('mobile_discovery_call_price_per_minute'),
                document.getElementById('mobile_conference_call_price_per_minute'),
                // document.getElementById('mobile_chat_price_per_minute')
            ];
            const hourElements = [
                document.getElementById('mobile_discovery_call_price_per_hour'),
                document.getElementById('mobile_conference_call_price_per_hour'),
                // document.getElementById('mobile_chat_price_per_hour')
            ];

            if (mode === 'minute') {
                minuteElements.forEach(el => el.classList.remove('hidden'));
                hourElements.forEach(el => el.classList.add('hidden'));
                document.getElementById('mobile-toggle-minute').classList.add('bg-[#DB5001]', 'text-[#FFFFFF]');
                document.getElementById('mobile-toggle-minute').classList.remove('bg-transparent', 'text-[#2A2A2A]');
                document.getElementById('mobile-toggle-hour').classList.add('bg-transparent', 'text-[#2A2A2A]');
                document.getElementById('mobile-toggle-hour').classList.remove('bg-[#DB5001]', 'text-[#FFFFFF]');
            } else if (mode === 'hour') {
                minuteElements.forEach(el => el.classList.add('hidden'));
                hourElements.forEach(el => el.classList.remove('hidden'));
                document.getElementById('mobile-toggle-minute').classList.add('bg-transparent', 'text-[#2A2A2A]');
                document.getElementById('mobile-toggle-minute').classList.remove('bg-[#DB5001]', 'text-[#FFFFFF]');
                document.getElementById('mobile-toggle-hour').classList.add('bg-[#DB5001]', 'text-[#FFFFFF]');
                document.getElementById('mobile-toggle-hour').classList.remove('bg-transparent', 'text-[#2A2A2A]');
            }
        }
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
        document.addEventListener('DOMContentLoaded', function() {
            // Function to initialize Quill editor
            function initializeQuillEditor(selector, hiddenInputId, initialContent) {
                var quill = new Quill(selector, {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                'header': '1'
                            }, {
                                'header': '2'
                            }],
                            ['bold', 'italic', 'underline'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }],
                            ['link', 'image'],
                            ['clean']
                        ]
                    }
                });

                // Set the initial content of the Quill editor
                quill.root.innerHTML = initialContent;

                // Sync Quill content with hidden input field
                quill.on('text-change', function() {
                    var html = quill.root.innerHTML;
                    document.getElementById(hiddenInputId).value = html;
                });

                return quill;
            }

            // Initialize Quill editors for both web and mobile views

            // Services (Web)
            var servicesContentWeb = document.getElementById('services').value;
            initializeQuillEditor('#services-editor', 'services', servicesContentWeb);

            // Awards and Recognition (Web)
            var awardsContentWeb = document.getElementById('awards_recognition').value;
            initializeQuillEditor('#awards-recognition-editor', 'awards_recognition', awardsContentWeb);

            // Services (Mobile)
            var servicesContentMobile = document.getElementById('services-mobile').value;
            initializeQuillEditor('#services-editor-mobile', 'services-mobile', servicesContentMobile);

            // Awards and Recognition (Mobile)
            var awardsContentMobile = document.getElementById('awards_recognition-mobile').value;
            initializeQuillEditor('#awards-recognition-editor-mobile', 'awards_recognition-mobile',
                awardsContentMobile);
        });
    </script>

@endsection
