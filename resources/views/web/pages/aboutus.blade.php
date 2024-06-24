@extends('web.layouts.app')

@section('maincontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- Header -->
        @include('web.components.header')

        <!-- main -->
        <div class="flex flex-col text-[#2A2A2A] w-[90%] md:w-[95%] lg:w-[90%] mx-auto mt-[24px]">
            <!-- 1st content  lg design  -->
            <div class="lg:flex hidden gap-[80px] w-full">
                <!-- 1.1 -->
                <div class="flex flex-col w-[50%] gap-[40px]">
                    <h1 class="lg:text-[32px] text-[16px] font-[500]">Who we are?</h1>
                    <p class="text-[12px] lg:text-[18px] font-[400]">
                        We are more than just a place to seek guidance—it's a vibrant
                        community where dreams take flight and aspirations become reality.
                    </p>
                    <h2 class="text-[40px] font-[400]">
                        Ignite growth, inspire change and transform lives
                    </h2>
                    <img class="w-[580px] h-[353px]" src="../src/assets/Rectangle 534.png" alt="" />
                </div>
                <!-- 1.2 -->
                <div class="flex w-[50%] gap-[12px]">
                    <img class="" src="../src/assets/Rectangle 533.png" alt="" />
                    <img class="" src="../src/assets/Rectangle 532.png" alt="" />
                </div>
            </div>
            <!-- 1st content  small screen design  -->
            <div class="flex lg:hidden flex-col gap-[38px]">
                <!-- 1.1 -->
                <div class="flex flex-col gap-[18px]">
                    <h1 class="text-[16px] font-[500]">Who we are?</h1>
                    <p class="text-[12px] font-[400]">
                        We are more than just a place to seek guidance—it's a vibrant
                        community where dreams take flight and aspirations become reality.
                    </p>
                </div>
                <!-- 1.2 -->
                <div class="flex w-full items-center flex-row gap-[12px]">
                    <!-- 1st  -->
                    <div class="flex w-[40%] flex-col gap-[35px]">
                        <h2 class="text-[20px] font-[400]">
                            Ignite growth, inspire change and transform lives
                        </h2>
                        <img class="md:w-full md:h-[190px]" src="../src/assets/Rectangle 534.png" alt="" />
                    </div>
                    <!-- 2nd  -->
                    <div class="flex w-[60%] gap-[5px]">
                        <img class="md:w-[50%] md:h-[350px] w-[112px] h-[224px]" src="../src/assets/Rectangle 533.png"
                            alt="" />
                        <img class="md:w-[50%] md:h-[350px] w-[112px] h-[224px]" src="../src/assets/Rectangle 532.png"
                            alt="" />
                    </div>
                </div>
            </div>
            <!-- 2nd content  -->
            <div class="flex flex-col gap-[60px] mt-[60px]">
                <!-- 2.1 -->
                <div class="flex flex-col gap-[30px]">
                    <h3 class="lg:text-[32px] text-[16px] font-[500]">Our Story</h3>
                    <p class="text-[12px] lg:text-[18px] font-[400] leading-[1.17em]">
                        Founded with a vision to democratize access to advice, Advisator b
                        was born out of a desire to empower individuals from all walks of
                        life to receive the guidance they need to achieve their full
                        potential. What started as a simple idea has blossomed into a
                        thriving ecosystem of advisors, seekers, and changemakers, united
                        by a shared passion for learning and growth.<br /><br />
                        Founded with a vision to democratize access to advice, Advisator b
                        was born out of a desire to empower individuals from all walks of
                        life to receive the guidance they need to achieve their full
                        potential. What started as a simple idea has blossomed into a
                        thriving ecosystem of advisors, seekers, and changemakers, united
                        by a shared passion for learning and growth.<br /><br />
                        Founded with a vision to democratize access to advice, Advisator b
                        was born out of a desire to empower individuals from all walks of
                        life to receive the guidance they need to achieve their full
                        potential. What started as a simple idea has blossomed into a
                        thriving ecosystem of advisors, seekers, and changemakers, united
                        by a shared passion for learning and growth.
                    </p>
                </div>
                <!-- 2.2 -->
                <div class="flex lg:flex-row flex-col gap-[68px]">
                    <img class="w-full lg:w-[670px] h-[225px] order-2 lg:order-1" src="../src//assets/Rectangle 535.png"
                        alt="" />
                    <div class="flex flex-col order-1 lg:order-2 gap-[30px]">
                        <h2 class="lg:text-[32px] text-[16px] font-[400]">
                            Why Advisator?
                        </h2>
                        <p class="text-[12px] lg:text-[18px] font-[400]">
                            What sets Advisator apart is our unwavering commitment to
                            excellence, innovation, and impact. From our carefully curated
                            network of advisors to our cutting-edge platform features, every
                            aspect of Advisator is designed with one goal in mind: to help
                            you succeed. Whether you're seeking career advice, financial
                            guidance, or personal development insights, Advisator has the
                            tools, resources, and support you need to thrive.
                        </p>
                    </div>
                </div>
                <!-- 2.3 -->
                <div class="flex flex-col gap-[30px]">
                    <h3 class="lg:text-[32px] text-[16px] font-[500]">Meet Our Team</h3>
                    <p class="text-[12px] lg:text-[18px] font-[400] leading-[1.17em]">
                        Behind Advisator is a dedicated team of passionate individuals who
                        are driven by a shared purpose: to make quality advice accessible
                        to all. From our founders to our developers, each member of the
                        Advisator team brings a unique set of skills, experiences, and
                        perspectives to the table, united by a common commitment to
                        excellence and impact.
                    </p>
                    <div class="flex items-center gap-[30px] lg:gap-[84px] justify-center">
                        <!-- 1st  -->
                        <div class="flex items-center flex-col">
                            <img class="w-[120px] h-[120px]" src="../src/assets/Ellipse 32 (1).png" alt="" />
                            <h4 class="text-[12px] lg:text-[18px] font-[500]">
                                Ridhima Sharma
                            </h4>
                            <h6 class="text-[12px] lg:text-[18px] font-[400]">CEO</h6>
                        </div>
                        <!-- 2st  -->
                        <div class="flex items-center flex-col">
                            <img class="w-[120px] h-[120px]" src="../src/assets/Ellipse 32 (1).png" alt="" />
                            <h4 class="text-[12px] lg:text-[18px] font-[500]">
                                Ridhima Sharma
                            </h4>
                            <h6 class="text-[12px] lg:text-[18px] font-[400]">
                                Co-Founder
                            </h6>
                        </div>
                        <!-- 3st  -->
                        <div class="flex items-center flex-col">
                            <img class="w-[120px] h-[120px]" src="../src/assets/Ellipse 32 (1).png" alt="" />
                            <h4 class="text-[12px] lg:text-[18px] font-[500]">
                                Ridhima Sharma
                            </h4>
                            <h6 class="text-[12px] lg:text-[18px] font-[400]">CEO</h6>
                        </div>
                    </div>
                </div>
                <!-- 2.4 -->
                <div class="flex flex-col mb-[60px] gap-[30px]">
                    <h3 class="lg:text-[32px] text-[16px] font-[500]">
                        Join Us on the Journey
                    </h3>
                    <p class="text-[12px] lg:text-[18px] font-[400] leading-[1.17em]">
                        Whether you're here to seek advice, share your expertise, or
                        simply explore new possibilities, we invite you to join us on this
                        journey of growth, discovery, and transformation. Together, we can
                        unlock the limitless potential that lies within each of us and
                        create a brighter, more empowered future for generations to come.
                    </p>
                    <img src="../src/assets/Rectangle 534 (1).png" alt="" />
                </div>
            </div>
            <!-- bottom menu bar -->

            <!-- bottom menu bar -->
            <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
                <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="../Home.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                                src="../src/assets/bottomNavbar/activeHome.png" alt="" />
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555]">
                            Home
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="./consultadvisor.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                                src="../src/assets/bottomNavbar/constultadvisor.png" alt="" />
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">
                            Consult Advisor
                        </p>
                    </div>
                    <div></div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="./advisorbooking.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/booking.png"
                                alt="" />
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">
                            Booking
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="./userProfile.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/profile.png"
                                alt="" />
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">
                            My Profile
                        </p>
                    </div>
                </div>

                <div
                    class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                    <a href="./featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/advisor.png"
                            alt="" />
                        <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">
                            Featured Advisor
                        </p>
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
                                <div class="flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                                    <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                        src="../src/assets/img/profileImage.png" alt="" />
                                    <div>
                                        <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">
                                            Radhika Sharma
                                        </h2>
                                        <h3 class="text-xs sm:text-sm text-[#828282] font-medium">
                                            radhikasharma@abc.com
                                        </h3>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer"
                                    src="../src/assets/img/cross.png" alt="" />
                            </div>
                        </div>

                        <a href="../auth/client.html">
                            <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                                <a href="">
                                    <div class="ml-[2rem] flex items-center gap-4">
                                        <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                            src="../src/assets/sidebar/userImg.png" alt="" />
                                        <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                            Switch to Client
                                        </h2>
                                    </div>
                                </a>
                            </div>
                        </a>

                        <div class="px-[2rem] py-2 flex flex-col gap-6">
                            <a href="../Advisor pages/advisorbooking.html">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/MyBookings.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        My Bookings
                                    </h2>
                                </div>
                            </a>
                            <a href="../Advisor pages/advisorMyearning.html">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/money.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        My Earnings
                                    </h2>
                                </div>
                            </a>
                            <a href="../Advisor pages/advisortransactionhistory.html">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/tabler_transaction-rupee.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        My Transactions
                                    </h2>
                                </div>
                            </a>
                            <a href="../Advisor pages/blog.html">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/Blogs.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Blogs
                                    </h2>
                                </div>
                            </a>
                            <a href="../Advisor pages/aboutus.html">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/Aboutus.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        About us
                                    </h2>
                                </div>
                            </a>
                            <a href="">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/Customersupport.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Customer support
                                    </h2>
                                </div>
                            </a>
                            <a href="">
                                <div class="flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/Logout.png" alt="" />
                                    <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                        Logout
                                    </h2>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="px-[2rem] py-2">
                        <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">
                            Find us on:
                        </h3>
                        <div class="flex gap-5">
                            <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/instagram.png" alt="" />
                            <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/facebook.png" alt="" />
                            <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/linkedin.png" alt="" />
                            <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/youtube.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="hidden md:block bg-[#FFFFFF] shadow-2xl border border-transparent mt-[2rem]">
            <div class="md:w-[95%] lg:w-[90%] mx-auto my-[2rem]">
                <div class="w-full flex items-start gap-[2rem] lg:gap-[4rem] font-Roboto">
                    <div class="font-semibold text-xl lg:text-2xl flex flex-col gap-2 items-start justify-starts">
                        <a href="../Home.html">
                            <img class="w-[200px]" src="../src/assets/logo/AdvisatorLogo.png" alt="" />
                        </a>
                        <p class="text-sm lg:text-base text-[#3A3A3A] font-normal text-start">
                            Business & Digital Expert Advice
                        </p>
                        <div class="flex items-center gap-2">
                            <img class="w-3 h-4" src="../src/assets/img/call.png" alt="" />
                            <p class="text-sm text-[#3A3A3A] font-normal">+91 1234567890</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img class="w-3 h-4" src="../src/assets/img/location.png" alt="" />
                            <p class="text-sm text-[#3A3A3A] font-normal">Delhi, India</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-bold text-base text-[#3A3A3A] text-start my-2 px-4">
                            Subscribe to Newsletter
                        </h4>
                        <div
                            class="h-fit max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A]">
                            <div>
                                <input
                                    class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                                    type="email" placeholder="Email address" />
                            </div>

                            <div class="py-2 px-[2rem] flex items-center gap-x-2 rounded-[2rem] bg-[#EDF6DB] shadow-md">
                                <button class="font-Roboto text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A]">
                                    Subscribe
                                </button>
                            </div>
                        </div>
                    </div>

                    <ul
                        class="flex items-start flex-col gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                        <li class="text-[#3A3A3A]">Quick Links</li>
                        <li>
                            <a href="../Home.html">Home</a>
                        </li>
                        <li>
                            <a href="">Browse Mentors</a>
                        </li>
                        <li>
                            <a href="">Featured Mentors</a>
                        </li>
                        <li>
                            <a href="./blog.html">Blogs</a>
                        </li>
                    </ul>
                    <ul
                        class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                        <li class="text-[#3A3A3A]">About</li>
                        <li>
                            <a href="./aboutus.html">About us</a>
                        </li>
                        <li>
                            <a href="./contactus.html">Contact us</a>
                        </li>
                        <li>
                            <a href="">Terms of services</a>
                        </li>
                    </ul>
                    <ul
                        class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
                        <li class="text-[#3A3A3A]">Social Media</li>
                        <li>
                            <a href="">Instagram</a>
                        </li>
                        <li>
                            <a href="">Facebook</a>
                        </li>
                        <li>
                            <a href="">Twitter</a>
                        </li>
                        <li>
                            <a href="">Linkedin</a>
                        </li>
                    </ul>
                </div>

                <div class="border border-[#EAEAEA] my-4 w-full"></div>

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
    </div>
    <script>
        // JavaScript to toggle sidebar
        // const toggleBtn = document.querySelector('.toggleBtn');
        const hideSideMenu = document.getElementById("hideSideMenu");
        const showSideMenu = document.getElementById("showSideMenu");

        // console.log(toggleBtn)
        console.log(hideSideMenu, showSideMenu);
        const sidebar = document.querySelector(".sidebar");

        hideSideMenu.addEventListener("click", () => {
            sidebar.classList.add("left-full");
        });
        showSideMenu.addEventListener("click", () => {
            sidebar.classList.remove("left-full");
        });
    </script>
@endsection
