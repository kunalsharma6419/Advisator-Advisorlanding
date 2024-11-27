@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.components.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.components.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Advisor Accounts</h4>
                            <p class="card-description">Edit Advisor Details</p>
                            @if (session('success'))
                                <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-4"
                                    role="alert">
                                    <span>{{ session('success') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('advisatoradmin.advisoraccounts.update', $advisor->id) }}" method="POST"
                                enctype="multipart/form-data" class="w-full forms-sample">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                                    <div class="mt-1 flex items-center">
                                        @if ($advisor->profile_photo_path)
                                            <img id="profilePhoto"
                                                src="{{ asset('../storage/' . $advisor->profile_photo_path) }}"
                                                alt="Profile Photo" width="100"
                                                class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-full">
                                        @else
                                            <?php
                                            $fullName = $advisor->full_name;
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

                                <div class="form-group">
                                    <label for="full_name" class="text-[#828282] font-normal text-base">Full Name</label>
                                    <input type="text" id="full_name" name="full_name"
                                        value="{{ old('full_name', $advisor->full_name) }}"
                                        class="form-control text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                    @error('full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="text-[#828282] font-normal text-base">Email address</label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $advisor->email) }}"
                                        class="form-control text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile_number" class="text-[#828282] font-normal text-base">Mobile
                                        Number</label>
                                    <input type="text" id="mobile_number" name="mobile_number"
                                        value="{{ old('mobile_number', $advisor->mobile_number) }}"
                                        class="form-control text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                    @error('mobile_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="location" class="text-[#828282] font-normal text-base">City</label>
                                    <input type="text" id="location" name="location"
                                        value="{{ old('location', $advisor->location) }}"
                                        class="form-control text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="business_function_category_id"
                                        class="text-[#828282] font-normal text-base">Business functions</label>
                                    <div id="business_function"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                        <select id="business_function_category_id" name="business_function_category_id"
                                            class="form-select w-full p-2 rounded-[12px]">
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
                                    <div class="form-group">
                                        <label for="sub_function_category_id_1"
                                            class="text-[#828282] font-normal text-base">Sub Business function 1</label>
                                        <div id="sub_function_1"
                                            class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                            <select id="sub_function_category_id_1" name="sub_function_category_id_1"
                                                class="form-select w-full p-2 rounded-[12px]">
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

                                    <div class="form-group">
                                        <label for="sub_function_category_id_2"
                                            class="text-[#828282] font-normal text-base">Sub Business function 2</label>
                                        <div id="sub_function_2"
                                            class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                            <select id="sub_function_category_id_2" name="sub_function_category_id_2"
                                                class="form-select w-full p-2 rounded-[12px]">
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

                                <div class="form-group">
                                    <label for="industry" class="text-[#828282] font-normal text-base">Industry</label>
                                    <div id="industry"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                        <select id="industry_select" class="form-select outline-none w-full">
                                            <option value="">Select Industry</option>
                                            @foreach ($industries as $industry)
                                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                        <button id="add_industry" class="btn btn-primary px-3 py-1">Add</button>
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
                                    <input type="hidden" name="industries" id="industries"
                                        value="{{ json_encode($advisor->industry_ids) }}">
                                </div>

                                <div class="form-group">
                                    <label for="geography" class="text-[#828282] font-normal text-base">Geography</label>
                                    <div id="geography"
                                        class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md">
                                        <select id="geography_select" class="form-select outline-none w-full">
                                            <option value="">Select Geography</option>
                                            @foreach ($geographies as $geography)
                                                <option value="{{ $geography->id }}">{{ $geography->name }}</option>
                                            @endforeach
                                        </select>
                                        <button id="add_geography" class="btn btn-primary px-3 py-1">Add</button>
                                    </div>
                                    <div id="selected_geographies" class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($advisor->getGeographies() as $geography)
                                            <div id="geography_{{ $geography->id }}"
                                                class="bg-blue-200 text-blue-800 px-2 py-1 rounded flex items-center">
                                                <span>{{ $geography->name }}</span>
                                                <button type="button"
                                                    class="ml-2 text-red-600 hover:text-red-800 focus:outline-none"
                                                    onclick="removeGeography({{ $geography->id }})">x</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="geographies" id="geographies"
                                        value="{{ json_encode($advisor->geography_ids) }}">
                                </div>
                                <div class="w-100 mb-4">
                                    <label for="highlighted_images" class="form-label text-secondary">Highlighted
                                        Images</label>
                                    <input type="file" name="highlighted_images[]" id="highlighted_images"
                                        accept="image/*" multiple class="form-control">
                                    @error('highlighted_images.*')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror

                                    <!-- Display selected images -->
                                    <div id="preview-images" class="mt-2 d-flex flex-wrap gap-2">
                                        @if ($advisor->highlighted_images)
                                            @foreach ($advisor->highlighted_images as $image)
                                                @if (is_string($image))
                                                    <div class="position-relative">
                                                        <img src="{{ asset('storage/' . $image) }}" alt="Image"
                                                            class="rounded h-100" style="width: 300px; height:250px;">
                                                        <input type="hidden" name="removed_images[]"
                                                            value="{{ $image }}">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm position-absolute top-0 end-0"
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

                                <div class="w-100 mb-4 mt-4">
                                    <label for="about" class="form-label text-secondary">About you</label>
                                    <textarea id="about" name="about" rows="6" class="form-control">{{ old('about', $advisor->about) }}</textarea>
                                    @error('about')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-100">
                                    <label for="is_founder" class="form-label text-secondary">Is Founder</label>
                                    <div
                                        class="d-flex justify-content-between align-items-center p-2 border rounded shadow-sm">
                                        <p class="mb-0">Are you a business owner?</p>
                                        <input type="checkbox" name="is_founder" id="is_founder" value="1"
                                            {{ old('is_founder', $advisor->is_founder ? 'checked' : '') }}
                                            class="form-check-input">
                                        @error('is_founder')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-100 mb-4 mt-4">
                                    <label for="company_name" class="form-label text-secondary">Company Name</label>
                                    <input type="text" name="company_name" id="company_name"
                                        value="{{ old('company_name', $advisor->company_name) }}" class="form-control">
                                    @error('company_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-100 mb-4 mt-4">
                                    <label for="company_website" class="form-label text-secondary">Company Website</label>
                                    <input type="text" name="company_website" id="company_website"
                                        value="{{ old('company_website', $advisor->company_website) }}"
                                        class="form-control">
                                    @error('company_website')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-100 mb-4 mt-4">
                                    <label for="awards_recognition" class="form-label text-secondary">Awards Recognition</label>
                                    <div id="awards-recognition-editor"
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    </div>
                                    <textarea hidden id="awards_recognition" name="awards_recognition" rows="6" class="form-control">{{ old('awards_recognition', $advisor->awards_recognition) }}</textarea>
                                    @error('awards_recognition')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-100 mb-4 mt-4">
                                    <label for="services" class="form-label text-secondary">Services</label>
                                    <div id="services-editor"
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    </div>
                                    <textarea hidden id="services" name="services" rows="6" class="form-control">{{ old('services', $advisor->services) }}</textarea>
                                    @error('services')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>



                </div>
                <div>
                    <div class=" d-md-flex mt-4">
                        <div class="px-4 col-md-3 col-lg-4 col-xl-3 flex-shrink-0">
                            <div
                                class="d-flex flex-column gap-3 text-dark font-weight-medium p-4 bg-light border shadow-sm rounded-xl">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Availability</h5>
                                    <span class="text-lg cursor-pointer" onclick="openAvailabilityModal()">></span>
                                </div>
                                <p class="text-muted">Choose your availability effortlessly.</p>
                            </div>
                        </div>
                        <div class="flex-grow-1 border shadow-sm p-4 rounded-xl">
                            <div id="availability-summary" class="d-flex flex-wrap gap-2"
                                data-advisor-id="{{ $advisor->id }}">
                                <!-- Availability summary will be loaded here -->
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-4">
                                <button onclick="openAvailabilityModal()"
                                    class="btn btn-success text-white px-4 py-2 rounded-pill font-weight-semibold">
                                    Choose Availability
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap Modal -->
                <div id="availabilityModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content p-4">
                            <div class="modal-header">
                                <h5 class="modal-title">Choose your Availability</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" onclick="closeAvailabilityModal()">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th></th>
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
                                                    <th class="text-center">
                                                        <div>
                                                            <p class="mb-0">{{ explode('-', $slot)[0] }}</p>
                                                            <p class="mb-0">-</p>
                                                            <p class="mb-0">{{ explode('-', $slot)[1] }}</p>
                                                        </div>
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                            @endphp
                                            @foreach ($days as $day)
                                                <tr class="text-dark bg-light rounded-xl font-weight-medium">
                                                    <td>{{ $day }}</td>
                                                    @foreach ($slots as $slot)
                                                        <td>
                                                            <input type="checkbox" class="availability-checkbox"
                                                                id="{{ $day . '-' . $slot }}"
                                                                data-day="{{ $day }}"
                                                                data-slot="{{ $slot }}">
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="saveAvailability()">Save
                                    Availability</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Advisor Price-->
                <div>
                    <div class=" d-md-flex mt-4">
                        <div class="px-4 col-md-3 col-lg-4 col-xl-3 flex-shrink-0">
                            <div
                                class="d-flex flex-column gap-3 text-dark font-weight-medium p-4 bg-light border shadow-sm rounded-xl">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Advisory Price</h5>
                                    <span class="text-lg cursor-pointer">></span>
                                </div>
                                <p class="text-muted">Choose your availability effortlessly.</p>
                            </div>
                        </div>
                        <div class="flex-grow-1 border shadow-sm p-5 rounded-xl">
                            <form action="{{ route('advisatoradmin.advisoraccounts.updatePrices', $advisor->id) }}"
                                method="POST">
                                @csrf
                                <div class="d-flex align-items-center justify-content-between gap-2 w-100">
                                    <p class="font-weight-medium">Set Your Advisory Price</p>
                                    <div class="border border-secondary px-3 py-2 bg-white rounded-lg">
                                        <button type="button" id="toggle-minute"
                                            class="btn btn-primary rounded-lg px-3 py-1">Minute</button>
                                        <button type="button" id="toggle-hour"
                                            class="btn btn-outline-secondary rounded-lg px-3 py-1">Hour</button>
                                    </div>
                                </div>
                                <div class="container mt-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="card border-secondary shadow-sm p-3"
                                                style="border-radius: .5rem;">
                                                <h5 class="font-weight-medium">Discovery call</h5>
                                                <div class="row align-items-end mt-3">
                                                    <div class="col-4">
                                                        <label class="text-muted">Currency</label>
                                                        <p class="form-control-plaintext font-weight-semibold bg-light px-2 py-1 rounded"
                                                            style="display: inline-block; width: auto;">INR (₹)</p>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <div style="border-left: 1px solid #000; height: 1.5rem;"></div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label class="text-muted">Price</label>
                                                        <input type="number" name="discovery_call_price_per_minute"
                                                            value="{{ $advisor->discovery_call_price_per_minute }}"
                                                            id="discovery_call_price_per_minute"
                                                            class="form-control font-weight-semibold mb-2">
                                                        <input type="number" name="discovery_call_price_per_hour"
                                                            value="{{ $advisor->discovery_call_price_per_hour }}"
                                                            id="discovery_call_price_per_hour"
                                                            class="form-control font-weight-semibold mb-2 d-none">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-secondary shadow-sm p-3"
                                                style="border-radius: .5rem;">
                                                <h5 class="font-weight-medium">Consultation call</h5>
                                                <div class="row align-items-end mt-3">
                                                    <div class="col-4">
                                                        <label class="text-muted">Currency</label>
                                                        <p class="form-control-plaintext font-weight-semibold bg-light px-2 py-1 rounded"
                                                            style="display: inline-block; width: auto;">INR (₹)</p>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <div style="border-left: 1px solid #000; height: 1.5rem;"></div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label class="text-muted">Price</label>
                                                        <input type="number" name="conference_call_price_per_minute"
                                                            value="{{ $advisor->conference_call_price_per_minute }}"
                                                            id="conference_call_price_per_minute"
                                                            class="form-control font-weight-semibold mb-2">
                                                        <input type="number" name="conference_call_price_per_hour"
                                                            value="{{ $advisor->conference_call_price_per_hour }}"
                                                            id="conference_call_price_per_hour"
                                                            class="form-control font-weight-semibold mb-2 d-none">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-success text-white py-2 px-4 rounded-pill font-weight-semibold mt-4">Update
                                    Price</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Upload Video-->
                <div class="container" style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-md hidden md:flex mt-8">
                            <div class="px-4 md:w-12rem lg:w-20rem xl:w-25rem">
                                <div
                                    class="flex flex-col gap-3 text-dark font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-light rounded-xl">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Upload a Video</h5>
                                        <span class="text-lg lg:text-xl cursor-pointer">></span>
                                    </div>
                                    <p class="text-secondary">Share your expertise visually by uploading informative videos
                                        to assist users</p>
                                </div>
                            </div>
                            <form action="{{ route('advisatoradmin.advisoraccounts.updateVideos', $advisor->id) }}"
                                method="POST" enctype="multipart/form-data"
                                class="grow border flex flex-col justify-around shadow-sm p-5 rounded-xl">
                                @csrf

                                <p class="text-secondary text-base font-medium">Upload your video content here. Accepted
                                    file formats include MP4, MOV, AVI, and more.</p>
                                <div class="w-100 mb-6 mt-8">
                                    <label for="video_upload" class="text-secondary font-normal text-base">Video Upload
                                        (Max 2)</label>
                                    <input type="file" name="video_upload[]" id="video_upload" accept="video/*"
                                        multiple
                                        class="text-dark placeholder-text-dark text-base font-medium outline-none rounded-lg mt-6px bg-white border border-secondary shadow-md w-95p lg:w-90p p-2">
                                    @error('video_upload.*')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror

                                    <!-- Display selected videos -->
                                    <div id="preview-videos" class="mt-2 flex flex-wrap gap-4">
                                        @if ($advisor->video_upload)
                                            @foreach ($advisor->video_upload as $video)
                                                <div class="relative">
                                                    <video controls class="rounded-lg h-24 w-24"
                                                        style="width: 400px; height:auto;">
                                                        <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <input type="hidden" name="removed_videos[]"
                                                        value="{{ $video }}">
                                                    <button type="button"
                                                        class="absolute top-1 right-1 bg-danger text-white rounded-full h-6 w-6 d-flex align-items-center justify-content-center"
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
                                    class="w-fit bg-success text-white py-2 px-6 rounded-2rem text-base font-semibold">
                                    Add video file
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto p-4">
                    <div class="md:flex mt-8">
                        <div class="px-4 md:w-1/4 lg:w-1/3 xl:w-1/3">
                            <div
                                class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                                <div class="flex items-center justify-between">
                                    <h5>Payment Information</h5>
                                    <span class="text-lg lg:text-xl cursor-pointer">></span>
                                </div>
                                <p class="text-[#828282]">Safely store your preferred payment method for seamless
                                    transactions on your profile.</p>
                            </div>
                        </div>
                        <div class="flex-grow border flex flex-col justify-around shadow-sm p-5 rounded-xl mt-8 md:mt-0">
                            <p class="text-[#828282] text-base font-medium">Add your payment information.</p>
                            <form action="{{ route('advisatoradmin.advisoraccounts.bankDetails.store', $advisor->id) }}"
                                method="POST" class="">
                                @csrf
                                <div class=" grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" name="bank_name" id="bank_name"
                                            value="{{ old('bank_name', $advisor->bankDetails->bank_name ?? '') }}"
                                            required class="form-control">
                                    </div>
                                    <div>
                                        <label for="account_holder_name" class="form-label">Account Holder Name</label>
                                        <input type="text" name="account_holder_name" id="account_holder_name"
                                            value="{{ old('account_holder_name', $advisor->bankDetails->account_holder_name ?? '') }}"
                                            required class="form-control">
                                    </div>
                                    <div>
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" name="account_number" id="account_number"
                                            value="{{ old('account_number', $advisor->bankDetails->account_number ?? '') }}"
                                            required class="form-control">
                                    </div>
                                    <div>
                                        <label for="account_type" class="form-label">Account Type</label>
                                        <select name="account_type" id="account_type" required class="form-select">
                                            <option value="saving"
                                                {{ (old('account_type') ?? ($advisor->bankDetails->account_type ?? '')) == 'saving' ? 'selected' : '' }}>
                                                Saving</option>
                                            <option value="current"
                                                {{ (old('account_type') ?? ($advisor->bankDetails->account_type ?? '')) == 'current' ? 'selected' : '' }}>
                                                Current</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="bank_ifsc" class="form-label">Bank IFSC</label>
                                        <input type="text" name="bank_ifsc" id="bank_ifsc"
                                            value="{{ old('bank_ifsc', $advisor->bankDetails->bank_ifsc ?? '') }}"
                                            required class="form-control">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mt-4">{{ $advisor->bankDetails ? 'Update' : 'Add' }}</button>
                            </form>
                        </div>
                    </div>

                    <!-- Display Bank Details in Table -->
                    @if ($advisor->bankDetails)
                        <div class="hidden md:block mt-8">
                            <div class="overflow-hidden border shadow-sm rounded-xl">
                                <table class="table table-bordered table-responsive" style="width:auto;">
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

                <!-- partial:partials/_footer.html -->
                @include('admin.components.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">

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

            // Awards and Recognition (Web)
            var awardsContentWeb = document.getElementById('awards_recognition').value;
            initializeQuillEditor('#awards-recognition-editor', 'awards_recognition', awardsContentWeb);

              // Services (Web)
              var servicesContentWeb = document.getElementById('services').value;
            initializeQuillEditor('#services-editor', 'services', servicesContentWeb);

        
          
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                    imgElement.className = 'rounded h-100 w-100'; // Add Bootstrap classes

                    const closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.className = 'btn btn-danger btn-sm position-absolute top-0 end-0';
                    closeButton.setAttribute('onclick', `removeImage(this, '${event.target.result}')`);
                    closeButton.innerHTML = `<svg class="bi bi-x-lg" width="1em" height="1em" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.854 1.146a.5.5 0 0 1 .708 0L8 6.293l5.438-5.147a.5.5 0 1 1 .708.708L8.707 7l5.147 5.438a.5.5 0 0 1-.708.708L8 7.707 2.562 13.146a.5.5 0 0 1-.708-.708L7.293 7 1.854 1.562a.5.5 0 0 1 0-.708z"/>
                                        </svg>`;

                    const container = document.createElement('div');
                    container.className = 'position-relative';
                    container.appendChild(imgElement);
                    container.appendChild(closeButton);

                    previewContainer.appendChild(container);
                };
                reader.readAsDataURL(file);
            });
        });
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
    </script> --}}
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- <!-- Your Custom Script -->
    <script>
        // Function to open the availability modal
        function openAvailabilityModal() {
            $('#availabilityModal').modal('show');
            loadAvailability();
        }

        // Function to close the availability modal
        function closeAvailabilityModal() {
            $('#availabilityModal').modal('hide');
        }

        // Function to load availability data
        function loadAvailability() {
            fetch('advisatoradmin/advisoraccounts/{id}/availability')
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

        // Function to save availability
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

            fetch('advisatoradmin/advisoraccounts/{id}/availability/update', {
                    method: 'POST',
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

        // Function to update availability summary
        function updateAvailabilitySummary() {
            fetch('advisatoradmin/advisoraccounts/{id}/availability')
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

                    // Function to show slots for a specific day
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

                        // Function to format time
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

        // Event listener when document is ready
        document.addEventListener('DOMContentLoaded', () => {
            updateAvailabilitySummary();
        });
    </script> --}}
    <!-- Your Custom Script -->
    <script>
        // Function to open the availability modal
        function openAvailabilityModal() {
            $('#availabilityModal').modal('show');
            loadAvailability();
        }

        // Function to close the availability modal
        function closeAvailabilityModal() {
            $('#availabilityModal').modal('hide');
        }

        // Function to get the advisor ID from the data attribute
        function getAdvisorId() {
            return document.getElementById('availability-summary').dataset.advisorId;
        }

        // Function to load availability data
        function loadAvailability() {
            const advisorId = getAdvisorId();
            fetch(`/advisatoradmin/advisoraccounts/${advisorId}/availability`)
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

        // Function to save availability
        function saveAvailability() {
            const advisorId = getAdvisorId();
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

            fetch(`/advisatoradmin/advisoraccounts/${advisorId}/availability/update`, {
                    method: 'POST',
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

        // Function to update availability summary
        function updateAvailabilitySummary() {
            const advisorId = getAdvisorId();
            fetch(`/advisatoradmin/advisoraccounts/${advisorId}/availability`)
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

                    // Function to show slots for a specific day
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

                        // Function to format time
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

        // Event listener when document is ready
        document.addEventListener('DOMContentLoaded', () => {
            updateAvailabilitySummary();
        });
    </script>
    <script>
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.btn').forEach(btn => {
                    btn.classList.remove('btn-primary', 'text-white');
                    btn.classList.add('btn-outline-secondary', 'text-dark');
                });
                this.classList.remove('btn-outline-secondary', 'text-dark');
                this.classList.add('btn-primary', 'text-white');

                const isMinute = this.id === 'toggle-minute';
                document.querySelectorAll('[id$="_price_per_minute"]').forEach(input => {
                    input.classList.toggle('d-none', !isMinute);
                });
                document.querySelectorAll('[id$="_price_per_hour"]').forEach(input => {
                    input.classList.toggle('d-none', isMinute);
                });
            });
        });

        // Default to minute view
        document.getElementById('toggle-minute').click();
    </script>
    <script>
        // Function to handle file upload and display progress bar
        function handleFileUpload(file, index) {
            const formData = new FormData();
            formData.append('video_upload[]', file);

            const advisorId = '{{ $advisor->id }}'; // Fetch the advisor's ID from your Blade template

            const xhr = new XMLHttpRequest();
            xhr.open('POST', `{{ route('advisatoradmin.advisoraccounts.updateVideos', ['id' => ':id']) }}`.replace(':id',
                advisorId));
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
                        progressBar.classList.remove('bg-light-green-200'); // Remove background
                        progressBar.classList.add('bg-success'); // Change to green
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
                    videoElement.className = 'rounded-lg h-24'; // Add Bootstrap classes
                    const sourceElement = document.createElement('source');
                    sourceElement.src = event.target.result;
                    sourceElement.type = 'video/mp4';
                    videoElement.appendChild(sourceElement);

                    const closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.className =
                        'absolute top-1 right-1 bg-danger text-white rounded-full h-6 w-6 d-flex align-items-center justify-content-center';
                    closeButton.setAttribute('onclick', `removeVideo(this, '${event.target.result}')`);
                    closeButton.innerHTML = `<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>`;

                    const progressContainer = document.createElement('div');
                    progressContainer.className = 'h-2 mt-1 bg-success rounded-md';
                    const progressBar = document.createElement('div');
                    progressBar.id = 'progress-bar-' + index;
                    progressBar.className = 'h-full bg-light-green-200 rounded-md';
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

@endsection
