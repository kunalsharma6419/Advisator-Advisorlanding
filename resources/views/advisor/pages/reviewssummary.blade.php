@extends('advisor.layouts.app')

@section('advisorcontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('advisor.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">


            <!-- page name -->
            @include('advisor.components.dashmenu')


            <div
                class="border border-[#F3EA9A] shadow-md p-2 lg:p-3 my-[2rem] w-full hidden md:flex flex-col lg:flex-row gap-y-10">
                <div class="w-full flex flex-col justify-between borders border-black h-[7rem] lg:h-auto">
                    <div class="flex justify-start items-center gap-4">
                        <img class="w-6 h-6" src="../src/assets/icons/star.png" alt="">
                        <p class="text-[#2A2A2A] font-medium text-lg lg:text-xl">Feedback Received</p>
                    </div>
                    <p class="text-[#2A2A2A] text-base lg:text-lg font-normal ml-[2.5rem]">Average rating: <span
                            class="font-bold">4.6</span></p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start gap-2">
                            <div class="w-4 h-4 bg-[#29CB29] rounded-full shadow-md shrink-0"></div>
                            <p class="text-[#3A3A3A] text-base lg:text-lg font-normal">5 stars: <span
                                    class="font-semibold">50%</span></p>
                        </div>
                        <div class="text-[#C1C1C1]">|</div>

                        <div class="flex items-center justify-start gap-2">
                            <div class="w-4 h-4 bg-[#AEFE60] rounded-full shadow-md shrink-0"></div>
                            <p class="text-[#3A3A3A] text-base lg:text-lg font-normal">4 stars: <span
                                    class="font-semibold">30%</span></p>
                        </div>
                        <div class="text-[#C1C1C1]">|</div>
                        <div class="flex items-center justify-start gap-2">
                            <div class="w-4 h-4 bg-[#FFC300] rounded-full shadow-md shrink-0"></div>
                            <p class="text-[#3A3A3A] text-base lg:text-lg font-normal">3 stars: <span
                                    class="font-semibold">10%</span></p>
                        </div>
                        <div class="text-[#C1C1C1]">|</div>
                        <div class="flex items-center justify-start gap-2">
                            <div class="w-4 h-4 bg-[#FF8B72] rounded-full shadow-md shrink-0"></div>
                            <p class="text-[#3A3A3A] text-base lg:text-lg font-normal ">2 stars: <span
                                    class="font-semibold">7%</span></p>
                        </div>
                        <div class="text-[#C1C1C1]">|</div>
                        <div class="flex items-center justify-start gap-2">
                            <div class="w-4 h-4 bg-[#FF0000] rounded-full shadow-md shrink-0"></div>
                            <p class="text-[#3A3A3A] text-base lg:text-lg font-normal">1 stars: <span
                                    class="font-semibold">3%</span></p>
                        </div>

                    </div>

                </div>

                <div id="chartdiv" class="w-full lg:w-[45rem] h-full"></div>

            </div>

            <!-- serarch bar -->
            <div class="hidden md:flex justify-between items-center gap-2 mt-[2rem]">
                <h2 class= "text-base lg:text-lg text-[#2A2A2A] font-medium ">All Reviews</h2>


                <div class="hidden md:block w-fit font-medium rounded-lg bg-[#FFE2E2] shadow-md p-2">
                    <select id="underline_select" class="outline-none bg-transparent w-full lg:pr-[1rem] text-[#3A3A3A]">
                        <option selected>All</option>
                        <option value="+92">Before 1 month</option>
                        <option value="+92">Before 6 month</option>
                        <option value="+94">Before 1 year</option>
                    </select>
                </div>

                <img class="w-8 h-8 cursor-pointer md:hidden" src="../src/assets/icons/Book Appointment.png"
                    alt="book appointment">

            </div>

            <!-- bottom menu bar -->
            <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
                <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="../Advisor pages/advisordashboard.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                                src="../src/assets/bottomNavbar/activeHome.png" alt="">
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Home</p>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="../Advisor pages/advisorbooking.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/booking.png"
                                alt="">
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Bookings</p>
                    </div>
                    <div></div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="../Advisor pages/advisortransactionhistory.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                                src="../src/assets/bottomNavbar/Transactions.png" alt="">
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Transactions</p>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <a href="../Advisor pages/advisorProfile.html">
                            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/profile.png"
                                alt="">
                        </a>
                        <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">My Profile</p>
                    </div>
                </div>

                <div
                    class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                    <a href="../Advisor pages/advisorMyearning.html"
                        class="flex flex-col items-center justify-center gap-1">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/earning.png"
                            alt="">
                        <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">My Earnings</p>
                    </a>
                </div>

            </div>
        </div>

        <!-- header for mobile view -->
        <div class="w-[90%] mx-auto my-[2rem] md:hidden">
            <div class="flex items-center justify-start gap-4 mx-2">
                <a href="../Advisor pages/advisordashboard.html">
                    <img class="w-6 h-6" src="../src/assets/icons/lets-icons_back.png" alt="">
                </a>
                <p class="text-xs sm:text-sm font-medium text-[#2A2A2A]">Reviews summary</p>
            </div>
            <p class="text-[#2A2A2A] text-sm sm:text-base font-medium my-[1rem]">All Reviews</p>

            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start gap-2">
                    <p class="text-[#3A3A3A] text-xs sm:text-sm font-normal">5 stars: <span class="font-semibold">50%</span>
                    </p>
                </div>
                <div class="text-[#C1C1C1]">|</div>

                <div class="flex items-center justify-start gap-2">
                    <p class="text-[#3A3A3A] text-xs sm:text-sm font-normal">4 stars: <span class="font-semibold">30%</span>
                    </p>
                </div>
                <div class="text-[#C1C1C1]">|</div>
                <div class="flex items-center justify-start gap-2">
                    <p class="text-[#3A3A3A] text-xs sm:text-sm font-normal">3 stars: <span
                            class="font-semibold">10%</span></p>
                </div>
                <div class="text-[#C1C1C1]">|</div>
                <div class="flex items-center justify-start gap-2">
                    <p class="text-[#3A3A3A] text-xs sm:text-sm font-normal ">2 stars: <span
                            class="font-semibold">7%</span></p>
                </div>
                <div class="text-[#C1C1C1]">|</div>
                <div class="flex items-center justify-start gap-2">
                    <p class="text-[#3A3A3A] text-xs sm:text-sm font-normal">1 stars: <span
                            class="font-semibold">3%</span></p>
                </div>

            </div>
        </div>

        <!-- table  -->
        <div class=" w-[90%] mx-auto mt-[2rem] bg-[#FAFAFA] p-1 shadow-sm mb-[5rem] md:mb-[1rem]">
            <table class="table-fixed w-full border-separate text-[Generate invoice] border-spacing-y-3">
                <thead class="text-[#2A2A2A] font-medium text-base lg:text-lg ">
                    <tr>
                        <th class="hidden md:block text-left align-top">Date</th>
                        <th class="text-left align-top hidden md:block">Time</th>
                        <th class="text-left align-top">Client</th>
                        <th class="text-left align-top">Service</th>
                        <th class="text-left align-top">Ratings</th>
                        <th class="text-left align-top">Reviews</th>
                    </tr>
                </thead>
                <tbody class="text-sm lg:text-base border-spacing-y-10">
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent1">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent1">Read more</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent2">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent2">Read more</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent3">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent3">Read more</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent4">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent4">Read more</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent5">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent5">Read more</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent6">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent6">Read more</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent7">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent7">Read more</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden md:block">15/04/2024</td>
                        <td class="hidden md:block">10:48am</td>
                        <td class="">Sarah Jade</td>
                        <td>DLeadership coaching</td>
                        <td class="flex items-center justify-center gap-2">
                            <p>5</p>
                            <img class="w-4 h-4 md:w-5 md:h-5" src="../src/assets/icons/solar_star-bold.png"
                                alt="">
                        </td>
                        <td class="content-container">
                            <div class="truncate" id="truncateContent8">
                                <p>
                                    Great mentorship session! Very insightful advice.
                                </p>
                            </div>
                            <div class="mt-2">
                                <button class="read-more-button text-black cursor-pointer"
                                    data-target="truncateContent7">Read more</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <!-- side bar -->
        <div
            class="sidebar absolute md:hidden flex justify-end z-20 top-0 transition-all left-full w-full min-h-screen h-full bottom-0">
            <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
                <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
                    <div class="flex justify-between items-center">
                        <a href="./advisorProfile.html">
                            <div class=" flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                                <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                    src="../src/assets/img/profileImage.png" alt="">
                                <div>
                                    <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">Radhika Sharma</h2>
                                    <h3 class="text-xs sm:text-sm text-[#828282] font-medium">radhikasharma@abc.com</h3>
                                </div>
                            </div>
                        </a>
                        <div>
                            <img id="hideSideMenu" class=" w-7 sm:w-8 cursor-pointer" src="../src/assets/img/cross.png"
                                alt="">
                        </div>
                    </div>

                    <a href="../auth/client.html">
                        <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                            <a href="">
                                <div class=" ml-[2rem] flex items-center gap-4">
                                    <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                        src="../src/assets/sidebar/userImg.png" alt="">
                                    <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">Switch to Client</h2>
                                </div>
                            </a>
                        </div>
                    </a>

                    <div class="px-[2rem] py-2 flex flex-col gap-6">
                        <a href="../Advisor pages/advisorbooking.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/MyBookings.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">My Bookings</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/advisorMyearning.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/money.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">My Earnings</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/advisortransactionhistory.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/tabler_transaction-rupee.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">My Transactions</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/blog.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Blogs.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">Blogs</h2>
                            </div>
                        </a>
                        <a href="../Advisor pages/aboutus.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Aboutus.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">About us</h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Customersupport.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">Customer support</h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/sidebar/Logout.png" alt="">
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">Logout</h2>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="px-[2rem] py-2">
                    <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">Find us on:</h3>
                    <div class="flex gap-5">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/instagram.png" alt="">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/facebook.png" alt="">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/linkedin.png" alt="">
                        <img class="w-[30px] h-[30px]" src="../src/assets/sidebar/youtube.png" alt="">
                    </div>
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

    <script>
        // JavaScript to toggle sidebar
        // const toggleBtn = document.querySelector('.toggleBtn');
        const hideSideMenu = document.getElementById('hideSideMenu')
        const showSideMenu = document.getElementById('showSideMenu')


        // console.log(toggleBtn)
        console.log(hideSideMenu, showSideMenu)
        const sidebar = document.querySelector('.sidebar');

        hideSideMenu.addEventListener('click', () => {
            sidebar.classList.add('left-full');
        })
        showSideMenu.addEventListener('click', () => {
            sidebar.classList.remove('left-full');
        });
    </script>


    <script>
        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.PieChart);

        // Add data
        chart.data = [{
            "country": "Lithuania",
            "value": 501.9
        }, {
            "country": "Czechia",
            "value": 301.9
        }, {
            "country": "Ireland",
            "value": 201.1
        }, {
            "country": "Germany",
            "value": 165.8
        }, {
            "country": "Australia",
            "value": 139.9
        }, ];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "value";
        pieSeries.dataFields.category = "country";
        pieSeries.labels.template.disabled = false;
        pieSeries.ticks.template.disabled = true;

        // pieSeries.dataFields.value.legend = 20;

        chart.legend = new am4charts.Legend();
        chart.legend.disabled = true,
            chart.legend.position = "left";

        chart.innerRadius = am4core.percent(50);

        var label = pieSeries.createChild(am4core.Label);
        label.disabled = true;

        chart.logo.disabled = true;

        // label.text = "${values.value.sum}";
        // label.horizontalCenter = "middle";
        // label.verticalCenter = "middle";
        // label.fontSize = 20;
    </script>


    <script>
        const toggleButtons = document.querySelectorAll('.read-more-button');

        toggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const contentContainer = content.parentElement;

                content.classList.toggle('truncate');
                if (button.textContent === 'Read more') {
                    button.textContent = 'Show less';
                    contentContainer.style.height = 'auto';
                } else {
                    button.textContent = 'Read more';
                    contentContainer.style.height = 'auto';
                    setTimeout(() => {
                        contentContainer.style.height = content.clientHeight + 'px';
                    }, 0);
                }
            });
        });
    </script>
@endsection
