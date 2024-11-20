@extends('user.layouts.app')

@section('usercontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- header -->
        <div class="w-full h-[80px]  shadow-md">
            <div class="h-full w-[90%] md:w-[95%] lg:w-[90%] mx-auto flex justify-between items-center">
                <!-- logo -->
                <div>
                    <a href="{{ route('home') }}">
                        <img class="w-[130px]" src=" /src/assets/img/advisatorLogo.png" alt="" />
                    </a>
                </div>
                <div class="hidden md:flex xl:w-[75%] xl:justify-between gap-8d md:gap-x-10 xl:gap-[60px]">
                    <ul
                        class="font-Roboto font-normal text-[#3A3A3A] grow xl:justify-center gap-4 text-sm lg:text-lg xl:gap-5 flex items-center">
                        <li
                            class="{{ Route::currentRouteName() == 'home' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('home') }}">Home</a></li>
                        <li
                            class="{{ Route::currentRouteName() == 'consult-advisor' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('consult-advisor') }}">Consult Advisor</a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'about-us' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('about-us') }}">About us</a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'blog' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'contact-us' ? 'font-bold text-[#6A9023]' : '' }} cursor-pointer">
                            <a href="{{ route('contact-us') }}">Contact us</a>
                        </li>
                    </ul>

                    <div class="ml-3 relative" id="dropdown-container">
                        <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition cursor-pointer"
                            id="dropdown-trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            @endif
                        </div>

                        <!-- Dropdown content -->
                        <div id="dropdown-content"
                            class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Profile') }}
                            </a>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a href="{{ route('api-tokens.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ __('API Tokens') }}
                                </a>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="md:hidden w-[40%] gap-2 flex items-center justify-between">
                    <div class="border border-[#DB9206] bg-[#FFF3DB] rounded sm:rounded-lg px-2 py-1 sm:py-2 sm:px-4">
                        <a class="cursor-pointer flex items-center gap-2" href="/src/Advisor pages/wallet.html">
                            <img class="h-5 w-5" src=" /src/assets/img/iconWallet.png" alt="" />
                            <div class="flex items-center font-Roboto text-sm sm:text-base text-[#DB9206] font-semibold">
                                <p>₹ {{ number_format(Auth::user()->user_wallet_balance, 2) }}</p>
                            </div>
                        </a>
                    </div>
                    <div id="showSideMenu" class="w-[24px] h-[24px] sm:w-7 sm:h-7 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>



        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('user.components.dashmenu')
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

            <!-- content  -->
            <div class="flex flex-col w-[90%] md:w-[95%] lg:w-[90%] mx-auto mt-[24px]">
                <!-- heading -->
                <div class="flex items-center">
                    <span class="text-[16px] font-[500]">Home /<span class="font-[600]"> Wallet </span></span>
                    <h1 class="text-[24px] font-[500] mx-auto flex">Wallet Recharge</h1>
                </div>
                <!-- content  -->
                <form method="POST" action="{{ route('user.mywallet.recharge.store') }}">
                    @csrf
                    <div class="flex flex-col lg:flex-row mt-[40px] gap-[56px] justify-between">
                        <!-- 1col -->
                        {{-- <div class="flex order-2 lg:order-1 gap-[24px]">
                        <!-- 1.1 col -->
                        <div class="flex flex-col gap-[24px]">
                            @foreach ($walletplans->take(3) as $plan)
                                <!-- First 3 plans for the first column -->
                                <div
                                    class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                                    <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                        {{ $plan->plan_name }}
                                    </h3>
                                    <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                        {{ $plan->plan_description }}
                                    </p>
                                    <h4 class="text-[16px] lg:text-[24px] font-[700]">₹{{ $plan->plan_price }}</h4>
                                    <!-- Button to open modal -->
                                    <button onclick="openModal({{ $plan->id }})"
                                        class="mt-[15px] bg-[#6A9023] text-white px-[16px] py-[8px] rounded-[12px] hover:bg-[#548b18]">
                                        View Details
                                    </button>
                                </div>
                                <!-- Modal (hidden by default) -->
                                <div id="modal-{{ $plan->id }}"
                                    class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                                    style="display: none;">
                                    <div class="bg-white rounded-lg p-6 lg:w-1/3 w-11/12">
                                        <h3 class="text-2xl font-bold mb-4">{{ $plan->plan_name }} - ₹{{ $plan->plan_price }}
                                        </h3>
                                        <p class="text-gray-700 mb-4">{{ $plan->plan_description }}</p>
                                        <h4 class="font-bold text-lg mb-2">Features:</h4>
                                        <div class="features-content mb-4" id="features-content-{{ $plan->id }}">
                                            {!! $plan->plan_features !!}
                                        </div>
                                        <button onclick="closeModal({{ $plan->id }})"
                                            class="mt-4 bg-[#6A9023] text-white px-4 py-2 rounded-lg hover:bg-[#548b18]">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- 1.2 col -->
                        <div class="flex flex-col gap-[24px]">
                            @foreach ($walletplans->skip(3) as $plan)
                                <!-- Remaining plans for the second column -->
                                <div
                                    class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                                    <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                        {{ $plan->plan_name }}
                                    </h3>
                                    <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                        {{ $plan->plan_description }}
                                    </p>
                                    <h4 class="text-[16px] lg:text-[24px] font-[700]">₹{{ $plan->plan_price }}</h4>
                                    <!-- Button to open modal -->
                                    <button onclick="openModal({{ $plan->id }})"
                                        class="mt-[15px] bg-[#6A9023] text-white px-[16px] py-[8px] rounded-[12px] hover:bg-[#548b18]">
                                        View Details
                                    </button>
                                </div>
                                <!-- Modal (hidden by default) -->
                                <div id="modal-{{ $plan->id }}"
                                    class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                                    style="display: none;">
                                    <div class="bg-white rounded-lg p-6 lg:w-1/3 w-11/12">
                                        <h3 class="text-2xl font-bold mb-4">{{ $plan->plan_name }} - ₹{{ $plan->plan_price }}
                                        </h3>
                                        <p class="text-gray-700 mb-4">{{ $plan->plan_description }}</p>
                                        <h4 class="font-bold text-lg mb-2">Features:</h4>
                                        <div class="features-content mb-4" id="features-content-{{ $plan->id }}">
                                            {!! $plan->plan_features !!}
                                        </div>
                                        <button onclick="closeModal({{ $plan->id }})"
                                            class="mt-4 bg-[#6A9023] text-white px-4 py-2 rounded-lg hover:bg-[#548b18]">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
                        <div class="flex flex-col lg:flex-row gap-[24px]">
                            <!-- 1.1 col -->
                            <div class="flex flex-col lg:w-1/2 gap-[24px]">
                                @foreach ($walletplans->take(3) as $plan)
                                    <!-- Plan Card -->
                                    <div data-plan-id="{{ $plan->id }}" data-plan-name="{{ $plan->plan_name }}"
                                        data-plan-price="{{ $plan->plan_price }}"
                                        onclick="updatePlanDetails({{ $plan->id }}, '{{ $plan->plan_name }}', {{ $plan->plan_price }})"
                                        class="plan-card bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                                        <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                            {{ $plan->plan_name }}
                                        </h3>
                                        <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                            {{ $plan->plan_description }}
                                        </p>
                                        <h4 class="text-[16px] lg:text-[24px] font-[700]">₹{{ $plan->plan_price }}</h4>
                                        <label>
                                            <input type="radio" name="plan_id" value="{{ $plan->id }}"
                                                class="hidden">{{ $plan->plan_name }}
                                        </label>
                                        <!-- Button to open modal -->
                                        <button onclick="openModal({{ $plan->id }})"
                                            class="mt-[15px] bg-[#6A9023] text-white px-[16px] py-[8px] rounded-[12px] hover:bg-[#548b18]">
                                            View Details
                                        </button>
                                    </div>

                                    <!-- Modal (hidden by default) -->
                                    <div id="modal-{{ $plan->id }}"
                                        class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                                        style="display: none;">
                                        <div class="bg-white rounded-lg p-6 lg:w-1/3 w-11/12">
                                            <h3 class="text-2xl font-bold mb-4">{{ $plan->plan_name }} -
                                                ₹{{ $plan->plan_price }}</h3>
                                            <p class="text-gray-700 mb-4">{{ $plan->plan_description }}</p>
                                            <h4 class="font-bold text-lg mb-2">Features:</h4>
                                            <div class="features-content mb-4" id="features-content-{{ $plan->id }}">
                                                {!! $plan->plan_features !!}
                                            </div>
                                            <button onclick="closeModal({{ $plan->id }})"
                                                class="mt-4 bg-[#6A9023] text-white px-4 py-2 rounded-lg hover:bg-[#548b18]">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- 1.2 col -->
                            <div class="flex flex-col lg:w-1/2 gap-[24px]">
                                @foreach ($walletplans->skip(3) as $plan)
                                    <!-- Plan Card -->
                                    <div data-plan-id="{{ $plan->id }}" data-plan-name="{{ $plan->plan_name }}"
                                        data-plan-price="{{ $plan->plan_price }}"
                                        onclick="updatePlanDetails({{ $plan->id }}, '{{ $plan->plan_name }}', {{ $plan->plan_price }})"
                                        class="plan-card bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                                        <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                            {{ $plan->plan_name }}
                                        </h3>
                                        <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                            {{ $plan->plan_description }}
                                        </p>
                                        <h4 class="text-[16px] lg:text-[24px] font-[700]">₹{{ $plan->plan_price }}</h4>
                                        <label>
                                            <input type="radio" name="plan_id" value="{{ $plan->id }}"
                                                class="hidden">{{ $plan->plan_name }}
                                        </label>
                                        <!-- Button to open modal -->
                                        <button onclick="openModal({{ $plan->id }})"
                                            class="mt-[15px] bg-[#6A9023] text-white px-[16px] py-[8px] rounded-[12px] hover:bg-[#548b18]">
                                            View Details
                                        </button>
                                    </div>

                                    <!-- Modal (hidden by default) -->
                                    <div id="modal-{{ $plan->id }}"
                                        class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                                        style="display: none;">
                                        <div class="bg-white rounded-lg p-6 lg:w-1/3 w-11/12">
                                            <h3 class="text-2xl font-bold mb-4">{{ $plan->plan_name }} -
                                                ₹{{ $plan->plan_price }}</h3>
                                            <p class="text-gray-700 mb-4">{{ $plan->plan_description }}</p>
                                            <h4 class="font-bold text-lg mb-2">Features:</h4>
                                            <div class="features-content mb-4" id="features-content-{{ $plan->id }}">
                                                {!! $plan->plan_features !!}
                                            </div>
                                            <button onclick="closeModal({{ $plan->id }})"
                                                class="mt-4 bg-[#6A9023] text-white px-4 py-2 rounded-lg hover:bg-[#548b18]">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <!-- 2col -->
                        <div class="flex lg:order-2 order-1 flex-col gap-[24px]">
                            <!-- 2.1 box -->
                            <div
                                class="bg-[#FDFADF] w-full lg:w-[400px] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFF2AB] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                                <div class=" flex flex-row justify-between lg:flex-col">
                                    <div class="flex gap-[12px]">
                                        <img class="w-[30px] h-[30px]" src="/src/assets/wallet.png" alt="" />
                                        <h3 class="text-[14px] lg:text-[18px] font-[700] hover:text-[#6a9023]">
                                            Wallet Balance:
                                        </h3>
                                    </div>

                                    <h4 class="text-[20px] mt-[5px] lg:text-[32px] font-[500]">
                                        ₹ {{ number_format(Auth::user()->user_wallet_balance, 2) }}
                                    </h4>
                                </div>

                                @if (Auth::user()->user_wallet_balance < 100)
                                    <p
                                        class="text-[#FF3131] font-[400] text-right lg:text-left text-[14px] mt-[30px] lg:text-[16px]">
                                        Low balance! Recharge now
                                    </p>
                                @endif
                            </div>

                            <!-- 2.2 box  -->
                            {{-- <div class="flex flex-col rounded-[18px] bg-[#F7F7F7] gap-[18px] w-full px-[25px] py-[20px]">
                            <div class="flex justify-between">
                                <p class="text-[12px] lg:text-[18px] font-[400] text-[#3A3A3A]">
                                    Plan Name:
                                </p>
                                <p class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A]">
                                    Basic plan
                                </p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-[12px] lg:text-[18px] font-[400] text-[#3A3A3A]">
                                    Amount:
                                </p>
                                <p class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A]">
                                    ₹199.00
                                </p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-[12px] lg:text-[18px] font-[400] text-[#3A3A3A]">
                                    Tax:
                                </p>
                                <p class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A]">
                                    ₹8.88
                                </p>
                            </div>
                            <div class="border-[2px] border-[#E5E5E5] w-full"></div>
                            <div class="flex justify-between">
                                <p class="text-[12px] lg:text-[18px] font-[500] text-[#3A3A3A]">
                                    Total Amount:
                                </p>
                                <p class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A]">
                                    ₹8.88
                                </p>
                            </div>
                        </div> --}}
                            <div class="flex flex-col rounded-[18px] bg-[#F7F7F7] gap-[18px] w-full px-[25px] py-[20px]">
                                <div class="flex justify-between">
                                    <p class="text-[12px] lg:text-[18px] font-[400] text-[#3A3A3A]">Plan Name:</p>
                                    <p
                                        class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A] plan-name">
                                        Basic plan</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-[12px] lg:text-[18px] font-[400] text-[#3A3A3A]">Amount:</p>
                                    <p
                                        class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A] plan-amount">
                                        ₹199.00</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-[12px] lg:text-[18px] font-[400] text-[#3A3A3A]">Tax (18%):</p>
                                    <p class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A] plan-tax">
                                        ₹8.88</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-[12px] lg:text-[18px] font-[400] text-[#3A3A3A]">Platform Fee (2% on
                                        Tax):
                                    </p>
                                    <p
                                        class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A] plan-platform-fee">
                                        ₹0.18</p>
                                </div>
                                <div class="border-[2px] border-[#E5E5E5] w-full"></div>
                                <div class="flex justify-between">
                                    <p class="text-[12px] lg:text-[18px] font-[500] text-[#3A3A3A]">Total Amount:</p>
                                    <p
                                        class="lg:text-[18px] lg:font-[700] font-[600] text-[12px] text-[#2A2A2A] plan-total">
                                        ₹8.88</p>
                                </div>
                            </div>



                            <!-- 2.3 box, coupon  -->
                            {{-- <div class="flex justify-between border border-[#EAEAEA] rounded-[50px] p-3">
                                <input type="text" placeholder="Enter Coupon code" />
                                <button
                                    class="border border-[#F4F6F0] rounded-[40px] bg-[#EDF6DB] py-[8px] px-[20px] text-[16px] font-[500]">
                                    Apply code
                                </button>
                            </div> --}}
                            <!-- button  -->
                            <button type="submit"
                                class="mt-[30px] mb-[130px] text-[16px] rounded-[24px] font-[700] lg:font-[600] lg:text-[20px] text-white text-center w-full py-[10px] bg-gradient-to-r from-[#6AA300] to-[#3F5713]">
                                Proceed to make a Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- bottom menu bar -->
        <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Home.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/activeHome.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Home</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./consultadvisor.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                            src="/src/assets/bottomNavbar/constultadvisor.png" alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Consult Advisor</p>
                </div>
                <div></div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./advisorbooking.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/booking.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Booking</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./userProfile.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/profile.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">My Profile</p>
                </div>
            </div>

            <div
                class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                <a href="./featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="/src/assets/bottomNavbar/advisor.png"
                        alt="">
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">Featured Advisor</p>
                </a>
            </div>

        </div>


        @include('user.components.footer')

        <!-- side bar -->
        <div
            class="sidebar absolute md:hidden flex justify-end z-20 top-0 transition-all left-full w-full min-h-screen h-full bottom-0">
            <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
                <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
                    <div class="flex justify-between items-center">
                        <a href="#">
                            <div class="flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                                @if (Auth::user()->profile_photo_path)
                                    <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                        src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="">
                                @else
                                    <?php
                                    $fullName = Auth::user()->full_name;
                                    $initial = strtoupper(substr($fullName, 0, 1));
                                    ?>
                                    <img id="profilePhoto"
                                        src="https://via.placeholder.com/150/000000/FFFFFF/?text={{ $initial }}"
                                        alt="Profile Photo" width="100"
                                        class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]">
                                @endif

                                <div>
                                    <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">
                                        {{ Auth::user()->full_name }}
                                    </h2>
                                    <h3 class="text-xs sm:text-sm text-[#828282] font-medium">
                                        {{ Auth::user()->email }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div>
                            <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="/src/assets/img/cross.png"
                                alt="" />
                        </div>
                    </div>

                    <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                        <a href="../auth/advisornominationform.html">
                            <div class="ml-[2rem] flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/phone.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                    Become an Advisor
                                </h2>
                            </div>
                        </a>
                    </div>

                    <div class="px-[2rem] py-2 flex flex-col gap-6">
                        <a href="../Client pages/consultadvisor.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/Consult Advisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Consult Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/featuredadvisor.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/FeaturedAdvisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Featured Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/advisorbooking.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/MyBookings.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    My Bookings
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/mywallet.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/Wallet.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Wallet
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/blog.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/Blogs.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Blogs
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/aboutus.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="/src/assets/img/Aboutus.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    About us
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/img/Customersupport.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Customer support
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="/src/assets/sidebar/Logout.png" alt="" />
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        {{ __('Log Out') }}
                                    </button>

                                </form>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="px-[2rem] py-2">
                    <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">
                        Find us on:
                    </h3>
                    <div class="flex gap-5">
                        <a href="https://www.instagram.com/shift180world" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/instagram.png" alt="" /></a>
                        <a href="https://www.facebook.com/Shift180.world/" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/facebook.png" alt="" /></a>
                        <a href="https://www.linkedin.com/company/shift180/" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/linkedin.png" alt="" /></a>
                        <a href="http://www.youtube.com/@Shift180AdvisoryServices" target="_blank" rel="noopener"><img
                                class="w-[30px] h-[30px]" src="/src/assets/sidebar/youtube.png" alt="" /></a>
                    </div>
                </div>
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
        function openModal(planId) {
            document.getElementById('modal-' + planId).style.display = 'flex';
        }

        function closeModal(planId) {
            document.getElementById('modal-' + planId).style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Get the first plan's details (assuming you have an array of plans in JS or you can fetch them dynamically)
            const firstPlanCard = document.querySelector(
                '.plan-card'); // Assuming all plan cards have the class "plan-card"

            if (firstPlanCard) {
                // Extract plan details from the first card
                const planId = firstPlanCard.getAttribute('data-plan-id');
                const planName = firstPlanCard.getAttribute('data-plan-name');
                const planPrice = firstPlanCard.getAttribute('data-plan-price');

                // Trigger the plan update for the first plan
                updatePlanDetails(planId, planName, planPrice);
            }
        });

        function updatePlanDetails(planId, planName, planPrice) {
            // Remove hover effect from previously selected card
            const previouslySelectedCard = document.querySelector('.selected-plan');
            if (previouslySelectedCard) {
                previouslySelectedCard.classList.remove('bg-[#FFFFFF]', 'border-[#6A9023]', 'hover:text-[#6a9023]',
                    'selected-plan');
                previouslySelectedCard.classList.add('bg-[#FFEDE2]', 'border-[#F4C2A4]');
            }

            // Add hover effect to the clicked card
            const selectedCard = document.querySelector(`[data-plan-id='${planId}']`);
            selectedCard.classList.remove('bg-[#FFEDE2]', 'border-[#F4C2A4]');
            selectedCard.classList.add('bg-[#FFFFFF]', 'border-[#6A9023]', 'hover:text-[#6a9023]', 'selected-plan');

            // Calculate amounts
            const planAmount = parseFloat(planPrice);
            const tax = (planAmount * 0.18).toFixed(2); // 18% tax
            const platformFee = (tax * 0.02).toFixed(2); // 2% platform fee on the tax
            const totalAmount = (planAmount + parseFloat(tax) + parseFloat(platformFee)).toFixed(2);

            // Update the target div with the selected plan data
            document.querySelector('.plan-name').textContent = planName;
            document.querySelector('.plan-amount').textContent = `₹${planAmount.toFixed(2)}`;
            document.querySelector('.plan-tax').textContent = `₹${tax}`;
            document.querySelector('.plan-platform-fee').textContent = `₹${platformFee}`;
            document.querySelector('.plan-total').textContent = `₹${totalAmount}`;

            // Automatically select the radio button for the chosen plan
            selectedCard.querySelector('input[type="radio"]').checked = true;
        }
    </script>
@endsection
