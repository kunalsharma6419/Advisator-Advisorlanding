<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
</head>

<body>
    <div class="flex font-Roboto lg:px-[60px] lg:py-[40px] w-full flex-row justify-between items-center lg:gap-[56px]">
        <!-- 1 row -->
        <div class=" hidden lg:flex flex-col items-center w-full">
            <div class="relative">
                <img class="w-[573px] h-full" src="../../../src/assets/auth/Group 750.png" />
            </div>
        </div>
        <!-- 2nd row -->
        <div class="flex flex-col bg-[#F6F8F1] px-[20px] lg:px-[30px] rounded-[18px] py-[70px] w-full">
            <!-- welcome -->
            <div class="flex w- flex-col gap-[4px]">
                <a href="{{ route('home') }}"><img class="w-[154px] h-[72px]"
                        src="../../../src/assets/auth/Rectangle 546.png" alt="" /></a>
                <p class="font-[400] text-[16px]">User Registration form</p>
            </div>
            <form class="flex flex-col mt-[35px] gap-[28px] px-30" id="registrationForm" method="POST"
                class="flex flex-col mt-[35px] gap-[28px] px-30" enctype="multipart/form-data">
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

                        <input type="text" class="w-full" id="mobile_number" name="mobile_number"
                            value="{{ $user->phone_number }}" readonly />
                    </div>
                </div>

                <div>
                    <label for="location">Location :</label>
                    <input placeholder="Location" class="px-[18px] w-full h-[60px] rounded-[8px] shadow-lg"
                        type="text" id="location" name="location" required />
                </div>
                <div class="border w-full border-1 my-[28px] border-[#AFAFAF]"></div>
                {{-- <h2 class="font-[500] text-[16px] mt-[15px]">Business Function</h2> --}}
                <!-- dropdown -->
                <div class="flex flex-col mt-[28px] gap-[28px]">
                    <!-- dropdown1 -->
                    <div class="flex flex-col gap-[28px]">
                        {{-- <div class="w-full mx-auto">
                            {{-- <label for="business_function_category_id">Select Business Function :</label>
                            <select id="business_function_category_id" name="business_function_category_id"
                                class="w-full p-2 rounded-[12px]">
                                <option selected>Choose Business Function</option>
                                @foreach ($businessFunctionCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="border border-gray-400 border-1 my-30"></div>

                        <div class="w-full mx-auto" id="sub_function_1" style="display:none;">
                            <label for="sub_function_category_id_1">Select Sub Function 1 :</label>
                            <select id="sub_function_category_id_1" name="sub_function_category_id_1"
                                class="w-full p-2 rounded-[12px]" required>
                                <option value="">Select one Option</option>
                            </select>
                        </div>

                        {{-- <div class="border border-gray-400 border-1 my-30"></div>

                        <div class="w-full mx-auto" id="sub_function_2" style="display:none;">
                            <label for="sub_function_category_id_2">Select Sub Function 2 :</label>
                            <select id="sub_function_category_id_2" name="sub_function_category_id_2"
                                class="w-full p-2 rounded-[12px]">
                                <option value="">Select one Option</option>
                            </select>
                        </div>
                        <div class="border border-gray-400 border-1 my-30"></div> --}}

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
                                    To select multiple Industry verticals, use Ctrl + Click
                                    <span
                                        class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-5 border-solid border-transparent border-t-gray-700"></span>
                                </span>
                            </div>
                            <p class="mt-[18px]" style="color: #db5001">Each registration form allows an user to select
                                at
                                the most 3 Industry verticals.</p>
                            <select id="industry" name="industry[]" class="w-full p-2 rounded-[12px] mt-[18px]"
                                multiple>
                                @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" id="other-industry" name="other_industry"
                                class="w-full p-2 rounded-[12px] mt-[18px] hidden"
                                placeholder="Please mention other industry">
                        </div>
                        <div class="border border-1 my-30 border-[#AFAFAF]"></div>

                        {{-- <div class="w-full mx-auto">
                            <label for="geography">Select Geographical Locations:</label>
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
                            <p class="mt-[18px] " style="color: #db5001">Each registration form allows an user to
                                select
                                3 geographical regions.</p>
                            <select id="geography" name="geography[]" class="w-full p-2 rounded-[12px] mt-[18px]"
                                multiple>
                                {{-- <option selected>Select Geographical Locations</option> -
                                @foreach ($geographies as $geography)
                                    <option value="{{ $geography->id }}">{{ $geography->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                </div>

                <div class="flex items-center gap-2 mt-[20px]">
                    <input type="checkbox" id="is_terms_accept" name="is_terms_accept" class="cursor-pointer" value="1" required>
                    <label for="is_terms_accept" class="text-sm text-gray-700">
                        I accept the 
                        <a href="/terms-of-service" style="color: #526E1C; text-decoration: underline;">Terms and Conditions</a>,
                        <a href="/privacy-policy" style="color: #526E1C; text-decoration: underline;">Privacy Policy</a>,
                        <a href="/shipping-and-delivery-policy" style="color: #526E1C; text-decoration: underline;">Shipping & Delivery Policy</a>,
                        <a href="/onboarding-policy" style="color: #526E1C; text-decoration: underline;">Onboarding Policy</a> and 
                        <a href="/cancellation-and-refund-policy" style="color: #526E1C; text-decoration: underline;">Cancellation and Refund Policy</a>
                    </label>
                </div>
                <button type="submit"
                    class="mt-[40px] text-[#2A2A2A] rounded-[18px] font-[600] text-center w-full py-[10px] bg-gradient-to-r from-[#EDF6DB] via-[#dce8c4] to-[#C5D5A7]">
                    Submit
                </button>
            </form>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#registrationForm').submit(function(event) {
            event.preventDefault();
            let formData = $(this).serialize();

            // Show loading indicator
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait a moment',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('user-registrations.store') }}', // Replace with your actual URL
                data: formData,
                success: function(res) {
                    Swal.close(); // Close the loading indicator

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
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred: ' + res.msg
                        });
                    }
                },
                error: function(xhr, status, error) {
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

        // Initialize visibility on page load
        handleOtherIndustryField();
    });
</script>

</html>
