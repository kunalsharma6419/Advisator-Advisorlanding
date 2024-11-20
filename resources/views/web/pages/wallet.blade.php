@extends('web.layouts.app')

@section('maincontent')
    <div class="relative overflow-hidden w-full">
        <!-- Header -->
        @include('web.components.header')

        <!-- main -->
        <div class="flex flex-col w-[90%] md:w-[95%] lg:w-[90%] mx-auto mt-[24px]">
            <!-- heading -->
            <div class="flex items-center">
                <span class="text-[16px] font-[500]">Home /<span class="font-[600]"> Wallet </span></span>
                <h1 class="text-[24px] font-[500] mx-auto flex">Wallet Recharge</h1>
            </div>
            <!-- content  -->
            <div class="flex flex-col lg:flex-row mt-[40px] gap-[56px] justify-between">
                <!-- 1col -->
                <div class="flex order-2 lg:order-1 gap-[24px]">
                    <!-- 1.1 col  -->
                    <div class="flex flex-col gap-[24px]">
                        <div
                            class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                            <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                Basic Plan
                            </h3>
                            <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                Get started with a basic recharge pack to explore our platform's
                                features.
                            </p>
                            <h4 class="text-[16px] lg:text-[24px] font-[700]">₹199</h4>
                        </div>
                        <div
                            class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                            <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                Premium
                            </h3>
                            <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                Unlock premium features, exclusive content, and priority support
                                with the premium plan.
                            </p>
                            <h4 class="text-[16px] lg:text-[24px] font-[700]">₹499</h4>
                        </div>
                        <div
                            class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                            <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                Business Plan
                            </h3>
                            <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                Designed for businesses looking for comprehensive solutions,
                                team collaboration, and dedicated account management.
                            </p>
                            <h4 class="text-[16px] lg:text-[24px] font-[700]">₹999</h4>
                        </div>
                    </div>
                    <!-- 1.2 col  -->
                    <div class="flex flex-col gap-[24px]">
                        <div
                            class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                            <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                Standard
                            </h3>
                            <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                Upgrade to the standard plan for expanded features and access to
                                a wider range of content.
                            </p>
                            <h4 class="text-[16px] lg:text-[24px] font-[700]">₹299</h4>
                        </div>
                        <div
                            class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                            <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                Professional Plan
                            </h3>
                            <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                Ideal for professionals seeking advanced tools, analytics, and
                                personalized support.
                            </p>
                            <h4 class="text-[16px] lg:text-[24px] font-[700]">₹799</h4>
                        </div>
                        <div
                            class="bg-[#FFEDE2] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFFFFF] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                            <h3 class="text-[16px] lg:text-[24px] font-[700] hover:text-[#6a9023]">
                                Enterprise Plan
                            </h3>
                            <p class="text-[#3A3A3A] font-[400] text-[14px] mt-[15px] lg:text-[16px]">
                                Tailored solutions for large enterprises, including advanced
                                customization, dedicated support, and strategic guidance.
                            </p>
                            <h4 class="text-[16px] lg:text-[24px] font-[700]">₹1299</h4>
                        </div>
                    </div>
                </div>
                <!-- 2col -->
                <div class="flex lg:order-2 order-1 flex-col gap-[24px]">
                    <!-- 2.1 box -->
                    <div
                        class="bg-[#FDFADF] w-full lg:w-[400px] text-[#2A2A2A] rounded-[18px] hover:bg-[#FFF2AB] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                        <div class=" flex flex-row justify-between lg:flex-col">
                            <div class="flex gap-[12px]">
                                <img class="w-[30px] h-[30px]" src="../src/assets/wallet.png" alt="" />
                                <h3 class="text-[14px] lg:text-[18px] font-[700] hover:text-[#6a9023]">
                                    Wallet Balance:
                                </h3>
                            </div>

                            <h4 class="text-[20px] mt-[5px] lg:text-[32px] font-[500]">
                                ₹ 0.00
                            </h4>
                        </div>

                        <p class="text-[#FF3131] font-[400] text-right lg:text-left text-[14px] mt-[30px] lg:text-[16px]">
                            Low balance! Recharge now
                        </p>
                    </div>

                    <!-- 2.2 box  -->
                    <div class="flex flex-col rounded-[18px] bg-[#F7F7F7] gap-[18px] w-full px-[25px] py-[20px]">
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
                    </div>

                    <!-- 2.3 box, coupon  -->
                    <div class="flex justify-between border border-[#EAEAEA] rounded-[50px] p-3">
                        <input type="text" placeholder="Enter Coupon code" />
                        <button
                            class="border border-[#F4F6F0] rounded-[40px] bg-[#EDF6DB] py-[8px] px-[20px] text-[16px] font-[500]">
                            Apply code
                        </button>
                    </div>
                    <!-- button  -->
                    <button
                        class="mt-[30px] text-[16px] rounded-[24px] font-[700] lg:font-[600] lg:text-[20px] text-white text-center w-full py-[10px] bg-gradient-to-r from-[#6AA300] to-[#3F5713]">
                        <a href="">Proceed to make a Payment</a>
                    </button>
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
        <!-- bottom menu bar -->
        <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Home.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/activeHome.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Home</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./consultadvisor.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                            src="../src/assets/bottomNavbar/constultadvisor.png" alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Consult Advisor</p>
                </div>
                <div></div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./advisorbooking.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/booking.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Booking</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./userProfile.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/profile.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">My Profile</p>
                </div>
            </div>

            <div
                class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                <a href="./featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/advisor.png"
                        alt="">
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">Featured Advisor</p>
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
    <script>
        function updatePrice(value) {
            document.getElementById("minPrice").textContent = "₹" + value;
        }
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
