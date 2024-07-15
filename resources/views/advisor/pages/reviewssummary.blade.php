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
            @include('advisor.components.bottommenu')
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
       @include('advisor.components.sidebar')


    </div>

    @include('advisor.components.footer')

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
