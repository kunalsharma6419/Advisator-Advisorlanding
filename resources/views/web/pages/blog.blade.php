@extends('web.layouts.app')

@section('maincontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- Header -->
        @include('web.components.header')

        <!-- main -->
        <div class="flex flex-col w-[98%] text-[#2A2A2A] mx-auto mt-[24px]">
            <!-- 1st    lg screen  -->
            <div class="hidden lg:flex gap-[200px] w-[70%] items-center justify-center mx-auto">
                <h2 class="text-[32px] font-[500]">Blogs</h2>
                <!-- search box  -->
                <div
                    class="lg:flex hidden p-3 bg-white border mx-auto border-[#EAEAEA] rounded-[50px] justify-between w-[70%]">
                    <input class="bg-white rounded-[50px]" placeholder="Search Blogs" type="text" />
                    <button class="flex items-center bg-[#EDF6DB] px-[32px] rounded-[40px] py-[12px] gap-5">
                        <i class="fa-solid fa-magnifying-glass" style="color: #000000"></i>
                        <p class="lg:text-[18px] text-[12px] font-[500]">Search</p>
                    </button>
                </div>
            </div>
            <!-- 1st small screen  -->
            <div class="flex flex-col gap-[18px] lg:hidden">
                <!-- search box  -->
                <!-- search box for moblie screen -->
                <div
                    class="flex p-3 mx-auto lg:hidden bg-white border border-[#EAEAEA] rounded-[40px] justify-between w-full md:w-[80%]">
                    <input class="bg-white rounded-[40px]" placeholder="Search Blogs" type="text" />
                    <button
                        class="flex items-center bg-[#EDF6DB] px-[12px] py-[10px] md:px-[32px] rounded-[40px] md:py-[12px] gap-1 md:gap-5">
                        <i class="fa-solid fa-magnifying-glass fa-xs" style="color: #000000"></i>
                        <p class="font-[500] text-[10px] lg:text-[16px]">Search</p>
                    </button>
                </div>
                <h2 class="text-[18px] lg:text-[32px] font-[500] ml-2">Blogs</h2>
            </div>
            <!-- 2nd  -->
            <div class="flex justify-center mx-auto w-full mt-[36px] h-full flex-wrap gap-5 lg:gap-[24px] items-center">
                <!-- 2.1  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
                <!-- 2.2  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
                <!-- 2.3  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
                <!-- 2.4  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
                <!-- 2.5  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
                <!-- 2.6  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
                <!-- 2.7  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
                <!-- 2.8  -->
                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                    <img src="../src/assets/Rectangle 14.png" alt="" />
                    <div class="p-3">
                        <h2 class="text-[16px] font-[500] mt-[8px]">
                            The Power of Mentorship: How Mentors Can Transform Your Career
                        </h2>
                        <p class="text-[14px] font-[400] mt-[12px]">
                            Learn about the benefits of mentorship and how having the right
                            mentor can propel your career forward.
                        </p>
                        <button
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                            Learn more
                        </button>
                    </div>
                </div>
            </div>

            <!-- 3rd  -->
            <div class="flex mt-[64px] items-center justify-center gap-[26px]">
                <div class="flex bg-[#AFAFAF] rounded-full items-center justify-center p-2">
                    <img class="w-[14px] h-[14px]" src="../src/assets/left arrow.png" alt="" />
                </div>
                <p class="text-[18px] font-[400]">1/5</p>
                <div class="flex bg-[#AFAFAF] rounded-full items-center justify-center p-2">
                    <img class="w-[14px] h-[14px]" src="../src/assets/right arrow.png" alt="" />
                </div>
            </div>
        </div>

        <!-- bottom menu bar -->
        <!-- bottom menu bar -->
        <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Home.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/activeHome.png"
                            alt="" />
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Home</p>
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
                        <a href="../Client pages/userProfile.html">
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
                            <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="../src/assets/img/cross.png"
                                alt="" />
                        </div>
                    </div>

                    <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                        <a href="../auth/advisornominationform.html">
                            <div class="ml-[2rem] flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/phone.png"
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
                                    src="../src/assets/img/Consult Advisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Consult Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/featuredadvisor.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/img/FeaturedAdvisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Featured Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/advisorbooking.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/img/MyBookings.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    My Bookings
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/mywallet.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Wallet.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Wallet
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/blog.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Blogs.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Blogs
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/aboutus.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Aboutus.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    About us
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/img/Customersupport.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Customer support
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Logout.png"
                                    alt="" />
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
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/instagram.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/facebook.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/linkedin.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/youtube.png" alt="" />
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

                <ul class="flex items-start flex-col gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
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
                <ul class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
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
                <ul class="flex flex-col items-start gap-2 font-Roboto font-normal text-sm lg:text-base text-[#828282]">
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
