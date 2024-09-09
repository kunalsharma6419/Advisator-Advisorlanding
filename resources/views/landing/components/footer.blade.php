<footer class="hidden md:block bg-[#FFFFFF] shadow-2xl border border-transparent mt-[2rem]">
    <div class="md:w-[95%] lg:w-[90%] mx-auto my-[2rem]">
        <div class="w-full flex items-start gap-[2rem] lg:gap-[4rem] font-Roboto">
            {{-- <div class="font-semibold text-xl lg:text-2xl flex flex-col gap-2 items-start justify-starts">
                <a href="../Home.html">
                    <img class="w-[400px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
                </a>
                <h2 class="text-sm lg:text-base text-[#3A3A3A] font-normal text-start" style="text-align: center;">
                    Business & Digital Expert Advice
                </h2>
            </div> --}}
            <div class="font-semibold text-xl lg:text-2xl flex flex-col gap-2 items-center">
                <a href="{{ route('home') }}">
                    <img class="w-[400px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
                </a>
                {{-- <h2 class="text-lg lg:text-xl text-[#3A3A3A] font-normal text-center">
                    SHIFT180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED
                </h2> --}}
            </div>


            <div>
                <h4 class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">
                    Reach Out to Us
                </h4>
                <div
                    class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A] mt-[15px]">
                    <div class="flex items-center gap-2">
                        <img class="w-3 h-4" src="../src/assets/img/location.png" alt="" />
                        <h2 class="text-sm text-[#3A3A3A] font-normal">Company: <a href="#"
                                style="color: #6AA300">SHIFT180 BUSINESS ADVISORY AND <br> SERVICES PRIVATE LIMITED</a>
                        </h2>
                    </div>
                </div>
                <div
                    class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A] mt-[15px]">
                    <div class="flex items-center gap-2">
                        <img class="w-3 h-4" src="../src/assets/img/location.png" alt="" />
                        <h2 class="text-sm text-[#3A3A3A] font-normal">Mail Us: <a href="mailto:advisory@shift180.in"
                                style="color: #6AA300">advisory@shift180.in</a></h2>
                    </div>
                </div>
                <div
                    class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A] mt-[15px]">
                    <div class="flex items-center gap-2">
                        <img class="w-3 h-4" src="../src/assets/img/call.png" alt="" />
                        <h2 class="text-sm text-[#3A3A3A] font-normal">Contact: <a href="telto:+91-9667707712"
                                style="color: #6AA300">+91-9667707712</a></h2>
                    </div>
                </div>
                <div
                    class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A] mt-[15px]">
                    <div class="flex items-center gap-2">
                        <img class="w-3 h-4" src="../src/assets/img/location.png" alt="" />
                        <h2 class="text-sm text-[#3A3A3A] font-normal">Location: <a
                                href="https://maps.app.goo.gl/XULGmFcD3VZuNcEF6" style="color: #6AA300">Gera Adara,
                                Pune, India</a>
                        </h2>
                    </div>
                </div>
            </div>

            <ul class="flex items-start flex-col gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                <li class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">Quick Links</li>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="#about">About us</a>
                </li>
                <li>
                    <a href="#steps"> Onboarding Steps</a>
                </li>
                <li>
                    <a href="#Feature">Features</a>
                </li>
                <li>
                    <a href="#Contact">Contact us</a>
                </li>
            </ul>
            <ul class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                <li class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">Our Policies</li>
                <li>
                    <a href="{{ route('terms-of-service') }}">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="./src/assets/Landing_page/Terms.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Terms of Services
                            </h2>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('privacy-policy') }}">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="./src/assets/Landing_page/Privacy.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Privacy Policy
                            </h2>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('onboarding-policy') }}">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="./src/assets/Landing_page/Onboard.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Onboarding Policy
                            </h2>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('shipping-delivery-policy') }}">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                fill="#6aa300" viewBox="0 0 24 24">
                                <path
                                    d="M19 8h-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v15a1 1 0 0 0 1 1h1a3 3 0 0 0 6 0h2a3 3 0 0 0 6 0h1a1 1 0 0 0 1-1v-4a1 1 0 0 0-.276-.688l-4-4A1 1 0 0 0 19 8zM6 18a1 1 0 1 1 1-1 1 1 0 0 1-1 1zm9-1H9a3 3 0 0 0-6 0H4V4h12v4h-4a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5zm1-4h1.586L20 14.414V16h-2zM18 18a1 1 0 1 1 1-1 1 1 0 0 1-1 1z" />
                            </svg>
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Shipping & Delivery Policy
                            </h2>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cancellation-refund-policy') }}">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                fill="#6aa300" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10c5.514 0 10-4.486 10-10S17.514 2 12 2zm5 13a1 1 0 0 1-1.707.707L12 13.414l-3.293 3.293A1 1 0 1 1 7.293 15.293L10.586 12l-3.293-3.293A1 1 0 1 1 8.707 7.293L12 10.586l3.293-3.293A1 1 0 1 1 16.707 8.707L13.414 12l3.293 3.293A1 1 0 0 1 17 15z" />
                            </svg>
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Cancellation & Refund Policy
                            </h2>
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                <li class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">Social Media</li>
                <li>
                    <a href="https://www.instagram.com/shift180world">
                        <div class="flex items-center gap-4">
                            <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </span>
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Instagram
                            </h2>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/Shift180.world/">
                        <div class="flex items-center gap-4">
                            <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                    <path
                                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                </svg>
                            </span>
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Facebook
                            </h2>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="http://www.youtube.com/@Shift180AdvisoryServices">
                        <div class="flex items-center gap-4">
                            <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#ff0000]">
                                <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                    <path
                                        d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                                </svg>
                            </span>
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Youtube
                            </h2>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/company/shift180/">
                        <div class="flex items-center gap-4">
                            <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#0077b5]">
                                <svg class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                    <path
                                        d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                </svg>
                            </span>
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Linkedin
                            </h2>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="border border-[#EAEAEA] my-4 w-full"></div>

        <div class="w-full flex items-center justify-between">
            <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                © 2024 Advisator. All rights reserved.
            </h3>
            <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                <a href="mailto:advisory@shift180.in">advisory@shift180.in</a>
            </h3>
        </div>
    </div>
</footer>
