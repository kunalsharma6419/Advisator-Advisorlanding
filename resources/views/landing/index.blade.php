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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 0a10 10 0 0 0-6.3 17.7L2 20l2.3-.6A10 10 0 1 0 10 0zm4.4 14.6l-.7-.4c-.4-.3-.8-.7-1-1-.2-.3-.3-.6-.2-.9l.4-1.1c.2-.5-.1-1-.5-1.3-.4-.3-.9-.4-1.4-.2l-1 .5c-.4.2-.8.2-1.2 0l-1-.5c-.5-.2-1-.1-1.4.2-.4.3-.7.8-.5 1.3l.4 1.1c.1.3 0 .6-.2.9-.2.3-.6.7-1 1l-.7.4c-.4.2-.8.3-1.2.1a1.6 1.6 0 0 0-.9-.2c-.5.1-1 .5-1 1 0 .1-.1 1.1 1.3 2.3 1.4 1.2 2.2 1.3 2.4 1.4.3.1.6.1.9-.2l.6-.4c.3-.2.8-.3 1.2-.1l.9.2c.3.1 1 .4 2 .2 1.1-.2 2-1 2.3-1.4 0-.1.2-.3.3-.4 0 0 .2-.2.2-.3 0-.2.1-.4.1-.5 0-.1 0-.2-.1-.3z" />
                </svg>
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
