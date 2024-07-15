@extends('landing.layouts.app')

@section('landingcontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- Header -->
        @include('landing.components.header')

        <!-- main -->
        <div
            class="flex flex-col font-sans text-[#2A2A2A] w-[90%] md:w-[95%] lg:w-[90%] mx-auto mt-[24px] pt-2 lg:pt-8 rounded">
            <!--Hero Section-->
            @include('landing.components.hero')

            <!--Followus-->
            @include('landing.components.followus')

            <!--About-->
            @include('landing.components.about')

            <!--How It Works-->
            @include('landing.components.howworks')

            <!--Features-->
            @include('landing.components.features')

            <!--Contact-->
            @include('landing.components.contact')

            <!-- bottom menu bar -->
            @include('landing.components.bottommenu')
            <!-- bottom menu bar -->


            <!-- side bar -->
            @include('landing.components.sidebar')
        </div>

        <!--Footer-->
        @include('landing.components.footer')
    </div>
    <!-- Add this at the end of your HTML body or within a fixed container -->
    {{-- <div class="fixed bottom-4 right-4 z-10">
        <button class="flex items-center justify-center bg-[#ff3033] hover:bg-blue-600 text-white rounded-full shadow-lg p-3" id="scrollToTopBtn" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div> --}}
    <div class="fixed bottom-12 right-4 z-10 flex flex-col items-center hidden lg:block">
        <!-- WhatsApp floating button -->
        <a href="https://wa.me/+919810440780" target="_blank" rel="noopener noreferrer" class="mb-4">
            <button
                class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg p-3">
                <img src="./src/assets/whatsappicon.png" class="h-6 w-6">
            </button>
        </a>

        <button
            class="flex items-center justify-center bg-[#ff3033] hover:bg-blue-600 text-white rounded-full shadow-lg p-3"
            id="scrollToTopBtn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>
@endsection
