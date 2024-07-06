@extends('user.layouts.app')

@section('usercontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- header -->
        @include('user.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('user.components.dashmenu')

            <!-- content  -->
            <div class="flex text-[#2A2A2A] mt-[28px] flex-col gap-[55px]">
                <div class="flex gap-[46px]">
                    <div
                        class="lg:flex  hidden flex-col w-[342px] h-[122px] bg-[#F5F5F5] rounded-[12px] gap-[14px] p-[24px]">
                        <div class="flex justify-between">
                            <h3 class="font-[500] text-[16px]">Wallet Balance</h3>
                            <img class="w-[24px] h-[24px]" src="../src/assets/right arrow.png" alt="" />
                        </div>
                        <p class="text-[#828282] font-[400] text-[16px]">
                            Check our wallet balance
                        </p>
                    </div>
                    <!-- card  -->
                    <div
                        class="bg-[#FDFADF] w-full text-[#2A2A2A] rounded-[18px] hover:bg-[#FFF2AB] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                        <div class="flex flex-row justify-between lg:flex-col">
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
                </div>
                <div class="flex gap-[46px]">
                    <div class=" flex-col lg:flex  hidden  w-[342px] h-fit bg-[#F5F5F5] rounded-[12px] gap-[14px] p-[24px]">
                        <div class="flex justify-between">
                            <h3 class="font-[500] text-[16px]">Recharge Wallet</h3>
                            <img class="w-[24px] h-[24px]" src="../src/assets/right arrow.png" alt="" />
                        </div>
                        <p class="text-[#828282] font-[400] text-[16px]">
                            Recharge Wallet and experience hassle free connection with our
                            expert advisors
                        </p>
                    </div>
                    <!-- card  -->
                    <div
                        class="bg-[#FAFAFA] w-full text-[#2A2A2A] rounded-[18px] flex flex-col gap-[15px] shadow shadow-[#00000026] p-[24px]">
                        <h4 class="text-[12px] lg:text-[16px] font-[500]">
                            Check & choose the Recharge packs suitable for your needs.
                        </h4>
                        <button
                            class="w-fit bg-[#526E1C] shadow-md text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold">
                            Recharge Wallet
                        </button>
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
    </div>

    <!-- bottom menu bar -->
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
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/constultadvisor.png"
                        alt="">
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
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/MyBookings.png"
                                alt="" />
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

    <!-- modal box -->
    <div id="myModal" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
        <!-- Background Overlay -->
        <div class="modal-overlay absolute w-full h-full bg-black opacity-50"></div>

        <div class="modal-content bg-white p-8 rounded shadow-lg relative z-10 w-[90%] md:w-[70%] lg:w-[65%]">
            <!-- <span id="closeBtn" class="close absolute top-0 right-0 p-4">&times;</span> -->
            <!-- <img id="closeBtn" class="absolute top-0 right" src=" ../src/assets/img/cross.png" alt=""> -->
            <!-- <div>
                                    <p class="text-[#526E1C] font-medium text-lg lg:text-xl">Raise a Ticket</p>
                                    <img src=" ../src/assets/img/cross.png" alt="">
                                </div> -->
            <div class="flex items-center justify-between">
                <p class="text-[#526E1C] font-medium text-lg lg:text-xl">
                    Raise a Ticket
                </p>
                <img id="closeBtn" class="w-6 h-6 cursor-pointer" src=" ../src/assets/img/cross.png" alt="" />
            </div>
            <form class="mt-[2rem]">
                <div class="flex flex-col gap-2">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="subject">Subject</label>
                    <input
                        class="border border-[#AFCB7A] outline-none shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]"
                        type="text" />
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="subject">Describe
                        issue/query</label>
                    <textarea class="border border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]" name=""
                        rows="3" id=""></textarea>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="file">Attachments (Attach
                        files)</label>
                    <div
                        class="border flex justify-between items-center border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF]">
                        <input class="outline-none text-[#3A3A3A]" type="file" id="file" />
                        <label for="file">
                            <img class="w-5 h-5" src=" ../src/assets/icons/file.png" alt="" />
                        </label>
                    </div>
                </div>

                <div class="w-full flex items-center justify-end mt-4">
                    <button
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] text-lg lg:text-xl text-[#FFFFFF] font-semibold py-1 px-6 rounded-[24px]">
                        Submit Ticket
                    </button>
                </div>
            </form>
            <!-- <div class=" flex  items-center justify-between rounded-[12px] flex-col gap-[50px]">
                                <h2 class="text-[#526E1C] font-[700] text-[24px]">Your booking has been successfully confirmed!</h2>
                               <div class=" flex flex-col gap-[12px] items-center justify-between">
                                <span class="font-[700] text-[18px]">
                                    Your appointment with <span class="text-[#526E1C] font-[700] ">Catherine Paize on 20/04/2024</span> Paize on 20/04/2024 between <span class="text-[#526E1C] font-[700] ">12pm-1pm is confirmed</span>

                                </span>
                                <p class="font-[500] text-[18px] text-[#3A3A3A]">Thank you for scheduling your appointment with us. We look forward to assisting you!</p>
                               </div>
                                <button
                                    class="mt-[12px] w-[270px] text-[16px] rounded-[24px] font-[700] lg:font-[600] lg:text-[20px] text-white text-center  py-[10px] bg-gradient-to-r from-[#6AA300] to-[#3F5713]"
                                  >
                                    <a href="">Continue</a>
                                  </button>
                               </div> -->
        </div>
    </div>
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

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementById("closeBtn");

        btn.onclick = function() {
            modal.classList.remove("hidden");
        };

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
@endsection
