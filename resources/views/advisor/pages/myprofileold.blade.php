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
                            <p class="text-[#828282]">Update your profile's information and email address</p>
                        </div>
                    </div>
                    <div class="grow border shadow-sm p-4 rounded-xl flex gap-6">
                        <form action="{{ route('advisor.myprofile.update') }}" method="POST" enctype="multipart/form-data"
                            class="w-full">
                            @csrf
                            @method('PUT')
                            {{-- <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                                <div class="mt-1 flex items-center">
                                    @if (Auth::user()->profile_photo_path)
                                        <img id="profilePhoto"
                                            src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                            alt="Profile Photo" width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @else
                                        <img id="profilePhoto" src="{{ generateInitialPhotoUrl(Auth::user()->full_name) }}"
                                            alt="Profile Photo" width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @endif
                                    <input type="file" name="photo" id="photo" class="hidden"
                                        onchange="previewPhoto()">
                                </div>
                                @error('photo')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                                <div class="mt-2 flex space-x-3">
                                    <button type="button" onclick="document.getElementById('photo').click()"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-md">Select
                                        a New Photo</button>
                                    <button type="button" onclick="removePhoto()"
                                        class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-2 px-4 rounded-lg shadow-md">Remove
                                        Photo</button>
                                </div>
                            </div> --}}
                            <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                                <div class="mt-1 flex items-center">
                                    @if (Auth::user()->profile_photo_path)
                                        <img id="profilePhoto"
                                            src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                            alt="Profile Photo" width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @else
                                        <?php
                                        $fullName = Auth::user()->full_name;
                                        $initial = strtoupper(substr($fullName, 0, 1));
                                        ?>
                                        <img id="profilePhoto"
                                            src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                            alt="Profile Photo" width="100"
                                            class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                    @endif
                                    <input type="file" name="photo" id="photo" class="hidden"
                                        onchange="previewPhoto()">
                                </div>
                                @error('photo')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                                <div class="mt-2 flex space-x-3">
                                    <button type="button" onclick="document.getElementById('photo').click()"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-md">Select
                                        a New Photo</button>
                                    <button type="button" onclick="removePhoto()"
                                        class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-2 px-4 rounded-lg shadow-md">Remove
                                        Photo</button>
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
                                {{-- <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="business_function">Business
                                        functions</label>
                                    <div id="business_function"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="business_function_category_id" name="business_function_category_id"
                                            class="w-full p-2 rounded-[12px]" required>
                                            <option selected>Choose Business Function Category</option>
                                            @foreach ($businessFunctionCategories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $advisor->business_function_category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="sub_function_category_id_1">Sub
                                        Business function 1</label>
                                    <div id="sub_function_1"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="sub_function_category_id_1" name="sub_function_category_id_1"
                                            class="w-full p-2 rounded-[12px]" required>
                                            <option selected>Choose Sub Function 1</option>
                                            @foreach ($subFunction1Options as $option)
                                                <option value="{{ $option->id }}"
                                                    {{ $option->id == $advisor->sub_function_category_id_1 ? 'selected' : '' }}>
                                                    {{ $option->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="sub_function_category_id_2">Sub
                                        Business function 2</label>
                                    <div id="sub_function_2"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="sub_function_category_id_2" name="sub_function_category_id_2"
                                            class="w-full p-2 rounded-[12px]" required>
                                            <option selected>Choose Sub Function 2</option>
                                            @foreach ($subFunction2Options as $option)
                                                <option value="{{ $option->id }}"
                                                    {{ $option->id == $advisor->sub_function_category_id_2 ? 'selected' : '' }}>
                                                    {{ $option->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base"
                                        for="business_function_category_id">Business functions</label>
                                    <div id="business_function"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="business_function_category_id" name="business_function_category_id"
                                            class="w-full p-2 rounded-[12px]">
                                            <option value="">Choose Business Function Category</option>
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
                                                <option value="">Choose Sub Function 1</option>
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
                                                <option value="">Choose Sub Function 2</option>
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

                                {{-- <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="industry">Industry</label>
                                    <div id="industry"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="industry_select" class="outline-none w-full">
                                            <option value="">Choose Industry</option>
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
                                </div>

                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="geography">Geography</label>
                                    <div id="geography"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="geography_select" class="outline-none w-full">
                                            <option value="">Choose Geography</option>
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
                                </div> --}}
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="industry">Industry</label>
                                    <div id="industry"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <select id="industry_select" class="outline-none w-full">
                                            <option value="">Choose Industry</option>
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
                                            <option value="">Choose Geography</option>
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
                                {{-- <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base"
                                        for="description">Description</label>
                                    <br>
                                    <textarea
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2"
                                        name="description" id="description">Enter Description</textarea>
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="linkedin">LinkedIn Profile
                                        Link</label>
                                    <div
                                        class="flex items-center justify-between text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        <input type="url" placeholder="Enter LinkedIn Profile Link"
                                            name="linkedin_profile" class="w-full outline-none bg-transparent">
                                    </div>
                                </div> --}}
                                {{-- <!-- Highlighted Images -->
                                <div class="mt-4">
                                    <label for="highlighted_images"
                                        class="block text-sm font-medium text-gray-700">Highlighted Images</label>
                                    <input type="file" name="highlighted_images[]" id="highlighted_images"
                                        accept="image/*" multiple
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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

                                <!-- Is Available -->
                                <div class="mt-4">
                                    <label for="is_available" class="block text-sm font-medium text-gray-700">Is
                                        Available</label>
                                    <input type="checkbox" name="is_available" id="is_available" value="1"
                                        {{ old('is_available', $advisor->is_available ? 'checked' : '') }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('is_available')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Language Known -->
                                <div class="mt-4">
                                    <label for="language_known" class="block text-sm font-medium text-gray-700">Language
                                        Known</label>
                                    <select name="language_known" id="language_known"
                                        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option value="">Select Language</option>
                                        <option value="English"
                                            {{ old('language_known', $advisor->language_known) === 'English' ? 'selected' : '' }}>
                                            English</option>
                                        <option value="Hindi"
                                            {{ old('language_known', $advisor->language_known) === 'Hindi' ? 'selected' : '' }}>
                                            Hindi</option>
                                    </select>
                                    @error('language_known')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Services -->
                                <div class="mt-4">
                                    <label for="services" class="block text-sm font-medium text-gray-700">Services</label>
                                    <input type="text" name="services[]" id="services"
                                        value="{{ old('services', is_array($advisor->services) ? implode(',', $advisor->services) : $advisor->services) }}"
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('services.*')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Awards and Recognition -->
                                <div class="mt-4">
                                    <label for="awards_recognition" class="block text-sm font-medium text-gray-700">Awards
                                        & Recognition</label>
                                    <input type="text" name="awards_recognition[]" id="awards_recognition"
                                        value="{{ old('awards_recognition', is_array($advisor->awards_recognition) ? implode(',', $advisor->awards_recognition) : $advisor->awards_recognition) }}"
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('awards_recognition.*')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Video Upload (Max 2) -->
                                <div class="mt-4">
                                    <label for="video_upload" class="block text-sm font-medium text-gray-700">Video Upload
                                        (Max 2)</label>
                                    <input type="file" name="video_upload[]" id="video_upload" accept="video/*"
                                        multiple
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
                                                    <div class="h-2 mt-1 bg-green-500 rounded-md">
                                                        <div id="progress-bar-{{ $loop->index }}"
                                                            class="h-full bg-green-200 rounded-md"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- Progress Bars for Uploads -->
                                <div id="progress-bars" class="mt-4 space-y-2"></div>

                                <!-- About -->
                                <div class="mt-4">
                                    <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                                    <textarea id="about" name="about" rows="3"
                                        class="block w-full mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">{{ old('about', $advisor->about) }}</textarea>
                                    @error('about')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Is Founder -->
                                <div class="mt-4">
                                    <label for="is_founder" class="block text-sm font-medium text-gray-700">Is
                                        Founder</label>
                                    <input type="checkbox" name="is_founder" id="is_founder" value="1"
                                        {{ old('is_founder', $advisor->is_founder ? 'checked' : '') }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('is_founder')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Company Name -->
                                <div class="mt-4">
                                    <label for="company_name" class="block text-sm font-medium text-gray-700">Company
                                        Name</label>
                                    <input type="text" name="company_name" id="company_name"
                                        value="{{ old('company_name', $advisor->company_name) }}"
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('company_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Company Website -->
                                <div class="mt-4">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">Company
                                        Website</label>
                                    <input type="text" name="company_website" id="company_website"
                                        value="{{ old('company_website', $advisor->company_website) }}"
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('company_website')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                <div class="w-full mb-6">
                                    <label for="highlighted_images"
                                        class="text-[#828282] font-normal text-base">Highlighted Images</label>
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

                                <div class="w-full">
                                    <label for="is_available" class="text-[#828282] font-normal text-base">Is
                                        Available</label>
                                    <div
                                        class="flex items-center justify-between text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%]  p-2 ">
                                        <p>Are you availiable?</p>
                                        <input type="checkbox" name="is_available" id="is_available" value="1"
                                            {{ old('is_available', $advisor->is_available ? 'checked' : '') }}
                                            class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        @error('is_available')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                    {{-- <div class="mt-4">
                                    <label for="language_known" class="block text-sm font-medium text-gray-700">Language
                                        Known</label>
                                    <select name="language_known" id="language_known"
                                        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option value="">Select Language</option>
                                        <option value="English"
                                            {{ old('language_known', $advisor->language_known) === 'English' ? 'selected' : '' }}>
                                            English</option>
                                        <option value="Hindi"
                                            {{ old('language_known', $advisor->language_known) === 'Hindi' ? 'selected' : '' }}>
                                            Hindi</option>
                                    </select>
                                    @error('language_known')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="services" class="block text-sm font-medium text-gray-700">Services</label>
                                    <input type="text" name="services[]" id="services"
                                        value="{{ old('services', is_array($advisor->services) ? implode(',', $advisor->services) : $advisor->services) }}"
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('services.*')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="awards_recognition" class="block text-sm font-medium text-gray-700">Awards
                                        & Recognition</label>
                                    <input type="text" name="awards_recognition[]" id="awards_recognition"
                                        value="{{ old('awards_recognition', is_array($advisor->awards_recognition) ? implode(',', $advisor->awards_recognition) : $advisor->awards_recognition) }}"
                                        class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('awards_recognition.*')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                                    <!--Video Upload -->
                                    {{-- <div class="w-full mb-6 mt-8">
                                        <label for="video_upload" class="text-[#828282] font-normal text-base">Video
                                            Upload
                                            (Max 2)</label>
                                        <input type="file" name="video_upload[]" id="video_upload" accept="video/*"
                                            multiple
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
                                    </div> --}}

                                    <div class="w-full mb-6 mt-8">
                                        <label class="text-[#828282] font-normal text-base" for="about">About
                                            you</label>
                                        <br>
                                        <textarea id="about" name="about" rows="6"
                                            class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%]  p-2">{{ old('about', $advisor->about) }}</textarea>
                                        @error('about')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
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
                                            class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        @error('company_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full mb-6 mt-6">
                                        <label class="text-[#828282] font-normal text-base" for="company_website">Company
                                            Website</label>
                                        <input type="text" name="company_website" id="company_website"
                                            value="{{ old('company_website', $advisor->company_website) }}"
                                            class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                        @error('company_website')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
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
            {{-- <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0  lg:w-[20rem]  xl:w-[25rem]">
                        <div
                            class="flex flex-col  gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg  w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Availability</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Choose your availability effortlessly.</p>
                        </div>
                    </div>
                    <div class="grow border  shadow-sm p-5 rounded-xl ">
                        <div class="flex gap-2 xl:gap-4 w-full flex-wrap">
                            <p class="text-base text-[#2A2A2A] font-medium">Monday</p>
                            <p class="text-base text-[#828282] font-medium">Tuesday</p>
                            <p class="text-base text-[#828282] font-medium">Wednesday</p>
                            <p class="text-base text-[#828282] font-medium">Wednesday</p>
                            <p class="text-base text-[#828282] font-medium">Friday</p>
                            <p class="text-base text-[#828282] font-medium">Saturday</p>
                            <p class="text-base text-[#828282] font-medium">Sunday</p>

                        </div>
                        <div class="flex justify-between items-end mt-4">
                            <div class="flex gap-4 items-end">
                                <div class="flex flex-col gap-2 text-base">
                                    <p class="text-[#828282] font-normal">Start time</p>
                                    <p
                                        class="text-base text-[#3A3A3A] font-semibold  py-2 px-3 bg-[#FFFFFF] border b order-[#E1E9D3] rounded-lg shadow-md">
                                        10:00 am</p>
                                </div>
                                <div class="w-[1.5rem] mb-4 border border-[#000000e2]"></div>
                                <div class="flex flex-col gap-2 text-base">
                                    <p class="text-[#828282] font-normal">End time</p>
                                    <p
                                        class="text-base text-[#3A3A3A] font-semibold  py-2 px-3 bg-[#FFFFFF] border b order-[#E1E9D3] rounded-lg shadow-md">
                                        05:00 px</p>
                                </div>
                            </div>
                            <button onclick="openlargeCalender()"
                                class="bg-[#6A9023] text-[#FFFFFF] px-4 py-2 lg:py-2 lg:px-6 rounded-[2rem] text-sm lg:text-base font-semibold">
                                Choose Availability

                            </button>

                        </div>
                    </div>
                </div>
            </div> --}}
            <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0  lg:w-[20rem]  xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Availability</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Choose your availability effortlessly.</p>
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
                        <h2 class="text-[16px] md:text-[20px] font-[500] text-[#526E1C]">Choose your Availability</h2>
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
                            <p class="text-[#828282]">Choose your availability effortlessly.</p>
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
                                    <p class="text-base text-[#2A2A2A] font-medium">Conference call</p>
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
                                <div class="h-[6rem] border border-[#AFAFAF]"></div>
                                <div class="flex flex-col gap-2">
                                    <p class="text-base text-[#2A2A2A] font-medium">Chat</p>
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
                                            <input type="number" name="chat_price_per_minute"
                                                value="{{ $advisor->chat_price_per_minute }}" id="chat_price_per_minute"
                                                class="text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md w-[90px]">
                                            <input type="number" name="chat_price_per_hour"
                                                value="{{ $advisor->chat_price_per_hour }}" id="chat_price_per_hour"
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
                            <p class="text-[#828282]">Share your expertise visually by uploading informative videos to
                                assist users</p>
                        </div>
                    </div>
                    <form action="{{ route('advisor.updateVideos') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grow border flex flex-col justify-around shadow-sm p-5 rounded-xl">
                            <p class="text-[#828282] text-base font-medium">Upload your video content here. Accepted file
                                formats include MP4, MOV, AVI, and more.</p>
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
            {{-- <div>
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem]  xl:w-[25rem]">
                        <div
                            class="flex flex-col  gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg  w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Payment Information</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Safely store your preferred payment method for seamless transactions
                                on your profile.</p>
                        </div>
                    </div>
                    <div class="grow border flex flex-col justify-around  shadow-sm p-5 rounded-xl ">
                        <p class="text-[#828282] text-base font-medium">Add your payment information.</p>
                        <button class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                            Add
                        </button>
                    </div>
                </div>
            </div> --}}
            <div class="container mx-auto p-4">
                <div class="hidden md:flex mt-8">
                    <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Payment Information</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">Safely store your preferred payment method for seamless transactions
                                on your profile.</p>
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
                                Update
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
                            <div class="transition-all duration-200 bg-[#FFF4ED] rounded-lg  shadow-lg cursor-pointer ">
                                <button type="button" id="question1" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">

                                    <div class="flex gap-3 items-center">
                                        <img class="w-[60px] h-[60px] rounded-[2rem] shadow-md"
                                            src="../src/assets/img/profileImage.png" alt="">

                                        <div class="flex flex-col justify-between">
                                            <p class="text-base text-[#2A2A2A] font-semibold">Catherine Paize</p>
                                            <p class="text-sm text-[#828282] font-medium">Cath39@abc.com</p>
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
                                    <div class="w-full mx-auto h-[3rem] flex justify-between items-center">
                                        <div class="flex gap-2 items-center justify-start">

                                            <h5 class="ftext-[#3A3A3A] font-medium  text-sm sm:text-base">Personal
                                                Information</h5>
                                        </div>
                                        <div class="flex gap-2 items-center justify-end">
                                            <img class="w-6 h-6" src="../src/assets/icons/akar-icons_edit.png"
                                                alt="">
                                            <h6 class="text-[#3A3A3A] font-medium text-xs sm:text-sm">Edit</h6>
                                        </div>

                                    </div>


                                    <div class="w-[90%] md:w-[90%] lg:w-[85%] mx-auto mt-[1rem] mb-[3rem]">

                                        <div class="bg-[#FAFAFA]  shadow-md p-4 rounded-xl flex gap-6">
                                            <div>
                                                <img class="shrink-0 w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] shadow-md rounded-[2rem]"
                                                    src="../src/assets/img/profileImage.png" alt="">
                                            </div>
                                            <div class="grow">
                                                <div>
                                                    <div class="w-full mb-2">
                                                        <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Full Name
                                                        </h5>
                                                        <h5 class="text-[#2A2A2A] font-medium text-sm sm:text-base">Risa
                                                        </h5>
                                                    </div>
                                                    <div class="w-full mb-2">
                                                        <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Email
                                                        </h5>
                                                        <h5 class="text-[#2A2A2A] font-medium text-sm sm:text-base">
                                                            Cath39@abc.com</h5>
                                                    </div>
                                                    <div class="w-full mb-2">
                                                        <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Location
                                                        </h5>
                                                        <h5 class="text-[#2A2A2A] font-medium text-sm sm:text-base">Delhi,
                                                            India</h5>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                            <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                for="Description">Description</label>
                                            <textarea name="" id=""
                                                class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent"
                                                placeholder="Add Description"></textarea>
                                        </div>
                                        <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                            <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                for="businessFunction">Business functions</label>
                                            <div id="businessFunction">
                                                <select id="underline_select" class="outline-none w-full">
                                                    <option selected>Business Growth, Business Legal</option>
                                                    <option value="+92">Business Growth, Business Legal</option>
                                                    <option value="+92">Business Growth, Business Legal</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                            <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                for="Industry">Industry</label>
                                            <div id="Industry">
                                                <select id="underline_select" class="outline-none w-full">
                                                    <option selected>Finance management, Ecommerce</option>
                                                    <option value="+92">Business Growth, Business Legal</option>
                                                    <option value="+92">Finance management, Ecommerce</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                            <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                                for="profileLink">LinkedIn profile link</label>
                                            <input type="text" id="profileLink"
                                                placeholder="Enter LinkedIn profile link"
                                                class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">
                                        </div>
                                        <div
                                            class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex justify-between items-center  gap-2">
                                            <p>Are you a business Owner?</p>
                                            <input checked id="disabled-checked-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- availability -->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question2" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Availability</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium">Choose your availability
                                            effortlessly.</p>

                                    </div>
                                    <svg id="arrow2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer2" style="display:none">
                                    <div class="grow border  p-5 rounded-xl ">
                                        <div class="flex gap-2 xl:gap-4 w-full flex-wrap">
                                            <p class="text-sm sm:text-base text-[#2A2A2A] font-medium">Monday</p>
                                            <p class="text-sm sm:text-base text-[#828282] font-medium">Tuesday</p>
                                            <p class="text-sm sm:text-base text-[#828282] font-medium">Wednesday</p>
                                            <p class="text-sm sm:text-base text-[#828282] font-medium">Wednesday</p>
                                            <p class="text-sm sm:text-base text-[#828282] font-medium">Friday</p>
                                            <p class="text-sm sm:text-base text-[#828282] font-medium">Saturday</p>
                                            <p class="text-sm sm:text-base text-[#828282] font-medium">Sunday</p>

                                        </div>
                                        <div class="flex justify-between items-end mt-4">
                                            <div class="flex gap-4 items-end">
                                                <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                    <p class="text-[#828282] font-normal">Start time</p>
                                                    <p
                                                        class="text-sm sm:text-base text-[#3A3A3A] font-semibold  py-2 px-3 bg-[#FFFFFF] border b order-[#E1E9D3] rounded-lg shadow-md">
                                                        10:00 am</p>
                                                </div>
                                                <div class="w-[1.5rem] mb-4 border border-[#000000e2]"></div>
                                                <div class="flex flex-col gap-2 text-base">
                                                    <p class="text-[#828282] font-normal">End time</p>
                                                    <p
                                                        class="text-sm sm:text-base text-[#3A3A3A] font-semibold  py-2 px-3 bg-[#FFFFFF] border b order-[#E1E9D3] rounded-lg shadow-md">
                                                        05:00 px</p>
                                                </div>
                                            </div>
                                            <button onclick="opensmallCalender()"
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
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium">Recharge and check your
                                            wallet balance.</p>
                                    </div>

                                    <svg id="arrow3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer3" style="display:none">
                                    <div class="border shadow-sm p-2 sm:p-5 rounded-xl ">
                                        <div class="flex items-center justify-between gap-2  w-full">
                                            <p class="font-medium text-sm sm:text-base text-[#2A2A2A]">Set Your Advisory
                                                Price</p>
                                            <div
                                                class="border-2 borderr-[#828282] px-4 py-2 bg-[#FFFFFF] rounded-lg text-xs sm:text-sm">
                                                <button
                                                    class="bg-[#DB5001] text-[#FFFFFF] rounded-lg px-3 py-1">Minute</button>
                                                <button
                                                    class="bg-transparent text-[#2A2A2A] rounded-lg px-3 py-1">Hour</button>
                                            </div>
                                        </div>
                                        <div class="flex justify-between flex-col items-ends mt-6 gap-y-[2rem]">
                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm sm:text-base text-[#2A2A2A] font-medium">Discovery call
                                                </p>
                                                <div class="flex gap-4 items-end">
                                                    <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                        <p class="text-[#828282] font-normal">Currency</p>
                                                        <p
                                                            class="text-sm sm:text-base text-[#3A3A3A] font-semibold py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                            INR (₹)</p>
                                                    </div>
                                                    <div class="w-[1rem]  mb-4 border border-[#3A3A3A]"></div>
                                                    <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                        <p class="text-[#828282] font-normal">Price</p>
                                                        <p
                                                            class="text-sm sm:text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                            20</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm sm:text-base text-[#2A2A2A] font-medium">Conference call
                                                </p>
                                                <div class="flex gap-4 items-end">
                                                    <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                        <p class="text-[#828282] font-normal">Currency</p>
                                                        <p
                                                            class="text-sm sm:text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                            INR (₹)</p>
                                                    </div>
                                                    <div class="w-[1rem] mb-4 border border-[#3A3A3A]"></div>
                                                    <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                        <p class="text-[#828282] font-normal">Price</p>
                                                        <p
                                                            class="text-sm sm:text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                            30</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm sm:text-base text-[#2A2A2A] font-medium">Chat</p>
                                                <div class="flex gap-4 items-end">
                                                    <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                        <p class="text-[#828282] font-normal">Currency</p>
                                                        <p
                                                            class="text-sm sm:text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                            INR (₹)</p>
                                                    </div>
                                                    <div class="w-[1.5rem] mb-4 border border-[#3A3A3A]"></div>
                                                    <div class="flex flex-col gap-2 text-sm sm:text-base">
                                                        <p class="text-[#828282] font-normal">Price</p>
                                                        <p
                                                            class="text-sm sm:text-base text-[#3A3A3A] font-semibold  py-1 lg:py-2 px-1 lg:px-3 bg-[#FFFFFF] border border-[#E1E9D3] rounded-lg shadow-md">
                                                            20</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Safely store
                                            your preferred payment method for seamless transactions on your profile.</p>
                                    </div>

                                    <svg id="arrow4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer4" style="display:none">
                                    <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                                        <p class="text-[#828282] text-sm sm:text-base font-medium">Add your payment
                                            information.</p>
                                        <button
                                            class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- review summery-->
                            <div
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
                            </div>


                            <!-- upload a video-->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question6" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Upload a video</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Share your
                                            expertise visually by uploading informative videos to assist users</p>
                                    </div>

                                    <svg id="arrow6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer6" style="display:none">
                                    <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                                        <p class="text-[#828282] text-sm sm:text-base font-medium">Upload your video
                                            content here. Accepted file formats include MP4, MOV, AVI, and more.</p>
                                        <div
                                            class="w-[170px] h-[130px] bg-[#F8FFEA] rounded-xl flex items-center justify-center">
                                            <div class="w-fit">
                                                <img class="w-8 h-8 mx-auto" src="../src/assets/icons/video.png"
                                                    alt="">
                                                <p class="font-medium text-sm sm:text-base text-[#6A9023]">Choose video
                                                    <br> and upload
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-full border border-[#E4E4E4]"></div>

                                        <p class="font-medium  text-[#2A2A2A] text-sm sm:text-base">My videos</p>
                                        <div>
                                            <img class="w-[160px] h-[120px] rounded-xl" src="../src/assets/vad1.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Support -->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question7" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Customer Support</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Have queries?
                                            Ask us!</p>
                                    </div>

                                    <svg id="arrow7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer7" style="display:none">
                                    <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                                        <p class="text-[#828282] text-sm sm:text-base font-medium">Raise a ticket and tell
                                            us your queries, our support team will get back to you within 24 hours. </p>
                                        <button id="myBtnsm"
                                            class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                            Raise Ticket
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Support -->
                            <div
                                class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                                <button type="button" id="question8" data-state="closed"
                                    class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm sm:text-base text-[#FF3131] font-semibold">Delete Account</p>
                                        <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Permanently
                                            delete your account.</p>
                                    </div>

                                    <svg id="arrow8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="answer8" style="display:none">
                                    <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                                        <p class="text-[#828282] text-sm sm:text-base font-medium">Once your account is
                                            deleted, all of its resources and data will be permanently deleted. </p>
                                        <button
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
                            <input type="file" id="attachment" name="attachment" class="outline-none text-[#3A3A3A]">
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
        <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Advisor pages/advisordashboard.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/home.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Home</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Advisor pages/advisorbooking.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/booking.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Bookings</p>
                </div>
                <div></div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Advisor pages/advisortransactionhistory.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                            src="../src/assets/bottomNavbar/Transactions.png" alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Transactions</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Advisor pages/advisorProfile.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                            src="../src/assets/bottomNavbar/activeProfile.png" alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">My Profile</p>
                </div>
            </div>

            <div
                class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                <a href="../Advisor pages/advisorMyearning.html" class="flex flex-col items-center justify-center gap-1">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/earning.png"
                        alt="">
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">My Earnings</p>
                </a>
            </div>

        </div>

        <!-- side bar -->
        <div
            class="sidebar absolute md:hidden flex justify-end z-20 top-0 transition-all left-full w-full min-h-screen h-full bottom-0">
            <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
                <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
                    <div class="flex justify-between items-center">
                        <a href="./advisorProfile.html">
                            <div class=" flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                                <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                    src="../src/assets/img/profileImage.png" alt="">
                                <div>
                                    <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">Radhika Sharma</h2>
                                    <h3 class="text-xs sm:text-sm text-[#828282] font-medium">radhikasharma@abc.com</h3>
                                </div>
                            </div>
                        </a>
                        <div>
                            <img id="hideSideMenu" class=" mr-[2rem] w-7 sm:w-8 cursor-pointer"
                                src="../src/assets/img/cross.png" alt="">
                        </div>
                    </div>

                    <a href="../auth/client.html">
                        <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                            <a href="">
                                <div class=" ml-[2rem] flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/userImg.png" alt="">
                                    <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">Switch to Client</h2>
                                </div>
                            </a>
                        </div>
                    </a>

                    <div class="px-[2rem] py-2 flex flex-col gap-6">
                        <a href="../Advisor pages/advisorbooking.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/MyBookings.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">My Bookings</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/advisorMyearning.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/money.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">My Earnings</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/advisortransactionhistory.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/tabler_transaction-rupee.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">My Transactions</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/blog.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Blogs.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">Blogs</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/aboutus.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Aboutus.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">About us</h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Customersupport.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">Customer support</h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Logout.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">Logout</h2>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="px-[2rem] py-2">
                    <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">Find us on:</h3>
                    <div class="flex gap-5">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/instagram.png" alt="">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/facebook.png" alt="">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/linkedin.png" alt="">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/youtube.png" alt="">
                    </div>
                </div>

            </div>

        </div>




    </div>

    <footer class="hidden md:block bg-[#FFFFFF] shadow-2xl border border-transparent mt-[2rem]">
        <div class="border border-[#EAEAEA] mb-4 w-full"></div>
        <div class="md:w-[95%] lg:w-[90%] mx-auto my-[2rem]">
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
        function previewPhoto() {
            const photoInput = document.getElementById('photo');
            const profilePhoto = document.getElementById('profilePhoto');

            const file = photoInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePhoto.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        // function removePhoto() {
        //     const profilePhoto = document.getElementById('profilePhoto');
        //     const photoInput = document.getElementById('photo');

        //     $name = Auth::user()->full_name);
        //     $initial = strtoupper(substr($name, 0, 1));
        //     // Set the profile photo to default with the user's initial
        //     profilePhoto.src =
        //         "https://via.placeholder.com/150/000000/FFFFFF/?text=$initial"; // Call the function to generate initial photo URL
        //     photoInput.value = ''; // clear the file input
        // }
        function removePhoto() {
            const profilePhoto = document.getElementById('profilePhoto');
            const photoInput = document.getElementById('photo');

            const fullName = "{{ Auth::user()->full_name }}"; // Assuming this is within a Blade template or PHP context
            const initial = fullName.trim().charAt(0)
                .toUpperCase(); // Get the first character of the full name and convert it to uppercase

            // Set the profile photo to default with the user's initial
            profilePhoto.src =
                `https://via.placeholder.com/150/000000/FFFFFF/?text=${initial}`; // Use template literals for string interpolation

            photoInput.value = ''; // Clear the file input
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
                subFunctionCategorySelect1.innerHTML = '<option value="">Choose Sub Function 1</option>';
                subFunctionCategorySelect2.innerHTML = '<option value="">Choose Sub Function 2</option>';

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

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIndustryButton = document.getElementById('add_industry');
            const addGeographyButton = document.getElementById('add_geography');
            const industrySelect = document.getElementById('industry_select');
            const geographySelect = document.getElementById('geography_select');
            const selectedIndustriesContainer = document.getElementById('selected_industries');
            const selectedGeographiesContainer = document.getElementById('selected_geographies');
            const industriesInput = document.getElementById('industries');
            const geographiesInput = document.getElementById('geographies');

            // Function to add selected industry
            addIndustryButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission

                const industryId = industrySelect.value;
                const industryName = industrySelect.options[industrySelect.selectedIndex].text;

                if (industryId && !isIndustrySelected(industryId)) {
                    if (selectedIndustriesContainer.children.length < 3) {
                        appendIndustryTag(industryId, industryName);
                        updateIndustriesInput();
                    } else {
                        // SweetAlert notification
                        Swal.fire({
                            icon: 'error',
                            title: 'Limit Reached',
                            text: 'You can select only up to 3 industries.'
                        });
                    }
                }
            });

            // Function to add selected geography
            addGeographyButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission

                const geographyId = geographySelect.value;
                const geographyName = geographySelect.options[geographySelect.selectedIndex].text;

                if (geographyId && !isGeographySelected(geographyId)) {
                    if (selectedGeographiesContainer.children.length < 3) {
                        appendGeographyTag(geographyId, geographyName);
                        updateGeographiesInput();
                    } else {
                        // SweetAlert notification
                        Swal.fire({
                            icon: 'error',
                            title: 'Limit Reached',
                            text: 'You can select only up to 3 geographies.'
                        });
                    }
                }
            });

            // Function to check if industry is already selected
            function isIndustrySelected(id) {
                return document.getElementById(`industry_${id}`) !== null;
            }

            // Function to check if geography is already selected
            function isGeographySelected(id) {
                return document.getElementById(`geography_${id}`) !== null;
            }

            // Function to append industry tag
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

            // Function to append geography tag
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

            // Function to remove selected industry
            window.removeIndustry = function(id) {
                const tag = document.getElementById(`industry_${id}`);
                if (tag) {
                    tag.remove();
                    updateIndustriesInput();
                }
            };

            // Function to remove selected geography
            window.removeGeography = function(id) {
                const tag = document.getElementById(`geography_${id}`);
                if (tag) {
                    tag.remove();
                    updateGeographiesInput();
                }
            };

            // Update hidden input for industries
            function updateIndustriesInput() {
                const selectedIds = Array.from(selectedIndustriesContainer.children).map(tag => tag.id.replace(
                    'industry_', ''));
                industriesInput.value = JSON.stringify(selectedIds);
            }

            // Update hidden input for geographies
            function updateGeographiesInput() {
                const selectedIds = Array.from(selectedGeographiesContainer.children).map(tag => tag.id.replace(
                    'geography_', ''));
                geographiesInput.value = JSON.stringify(selectedIds);
            }

            // Pre-select industries if available
            @if ($advisor->industries)
                @foreach ($advisor->industries as $industry)
                    appendIndustryTag({{ $industry->id }}, '{{ $industry->name }}');
                @endforeach
                updateIndustriesInput();
            @endif

            // Pre-select geographies if available
            @if ($advisor->geographies)
                @foreach ($advisor->geographies as $geography)
                    appendGeographyTag({{ $geography->id }}, '{{ $geography->name }}');
                @endforeach
                updateGeographiesInput();
            @endif
        });
    </script> --}}
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
@endsection
