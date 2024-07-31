@extends('advisor.layouts.app')

@section('advisorcontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('advisor.components.mainheader')

        <div class="font-Roboto w-[90%] md:w-[85%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('advisor.components.dashmenu')

            <!-- graph -->
            <div class="w-full flex flex-col md:flex-row gap-4 md:gap-3 lg:gap-6 mt-[3rem]">
                <div class="border border-[#DBDFFF] lg:h-[280px] p-4 w-full rounded-xl bg-[#FFFFFF] shadow-md">
                    <div class="flex gap-2 items-start justify-start my-2">
                        <img class="w-6 h-6 mt-2" src="../src/assets/icons/fa6-solid_ranking-star.png" alt="" />
                        <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]" style="font-weight: bold;">
                            Profile Completion Status
                        </p>
                    </div>
                    {{-- <div class="my-[2rem] flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                        role="progressbar" aria-valuenow="{{ $completionPercentage }}" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-[#7482FF] text-xs text-white text-center whitespace-nowrap dark:bg-[#7482FF] transition duration-500"
                            style="width: {{ $completionPercentage }}%">
                            {{ $completionPercentage }}%
                        </div>
                    </div> --}}
                    <div class="my-[2rem] flex w-full h-8 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                        role="progressbar" aria-valuenow="{{ $completionPercentage }}" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="flex items-center justify-center rounded-full overflow-hidden text-xs text-black text-center whitespace-nowrap transition duration-500"
                            style="
             width: {{ $completionPercentage }}%;
             background-color: {{ $completionPercentage <= 50 ? '#FF4D4F' : ($completionPercentage <= 80 ? '#FFD700' : '#28A745') }};
             height: 100%;
         ">
                            {{ $completionPercentage }}%
                        </div>
                    </div>

                    <ul class="list-disc px-4">
                        <li class="text-[#3A3A3A] text-sm md:text-base">
                            Upload informative videos to assist and engage with users
                        </li>
                    </ul>
                </div>
                {{-- <div
                    class="border border-[#F3EA9A] h-[280px] p-4 w-full flex justify-center flex-col rounded-xl bg-[#FFFFFF] shadow-md">
                    <div class="flex gap-2 items-start my-1">
                        <img class="w-6 h-6 mt-2" src="../src/assets/icons/star.png" alt="" />
                        <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                            Feedback Received
                        </p>
                    </div>
                    <div id="chartdiv" class="w-full h-full"></div>
                </div> --}}
                <div
                    class="border border-[#F3EA9A] h-[280px] p-4 w-full flex justify-center flex-col rounded-xl bg-[#FFFFFF] shadow-md">
                    @if ($feedbackData && $feedbackData->count() > 0)
                        <div class="flex gap-2 items-start my-1">
                            <img class="w-6 h-6 mt-2" src="../src/assets/icons/star.png" alt="Star Icon" />
                            <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                                Feedback Received
                            </p>
                        </div>
                        <div id="chartdiv" class="w-full h-full"></div>
                        {{-- Include the script to render your chart here --}}
                    @else
                        <div class="flex flex-col justify-center items-center w-full h-full text-center">
                            <div class="flex gap-2 items-start my-1">
                                <img class="w-6 h-6 mt-2" src="../src/assets/icons/star.png" alt="Star Icon" />
                                <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                                    Feedback Received
                                </p>
                            </div>
                            <svg class="w-20 h-20 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M2 12c0-5.5 4.5-10 10-10s10 4.5 10 10-4.5 10-10 10H7l-5 5V12z" stroke="#FF6F61"
                                    fill="#FF6F61" />
                                <path d="M6 12h12m-6-6v12" stroke="#FFFFFF" />
                            </svg>
                            <p class="text-sm sm:text-base md:text-lg text-[#2A2A2A]">
                                No data to display
                            </p>
                        </div>
                    @endif
                </div>

                <div class="border border-[#B6F39A] lg:h-[280px] p-4 w-full rounded-xl bg-[#FFFFFF] shadow-md">
                    @if ($upcomingBookings !== null && $upcomingBookings->isNotEmpty())
                        <div class="flex gap-2 items-start my-2">
                            <img class="w-6 h-6 mt-2" src="../src/assets/icons/teenyicons_appointments-solid.png"
                                alt="Appointments Icon" />
                            <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                                Upcoming bookings
                            </p>
                        </div>
                        <ul class="list-disc pl-2 xl:px-4 flex flex-col gap-4 mt-[1.5rem]">
                            @foreach ($upcomingBookings as $booking)
                                <li class="text-sm md:text-base text-[#2A2A2A]">
                                    <div class="flex items-center justify-between">
                                        <p class="font-medium">{{ $booking->client_name }}</p>
                                        <p class="font-normal">{{ $booking->date->format('M d, Y - h:i A') }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="flex flex-col justify-center items-center w-full h-full text-center">
                            <div class="flex gap-2 items-start my-2">
                                <img class="w-6 h-6 mt-2" src="../src/assets/icons/teenyicons_appointments-solid.png"
                                    alt="Appointments Icon" />
                                <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                                    No Upcoming bookings
                                </p>
                            </div>
                            <svg class="w-20 h-20 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M12 6v6h6" stroke="#FF6F61" fill="none" />
                                <circle cx="12" cy="12" r="10" stroke="#FF6F61" stroke-width="2"
                                    fill="none" />
                                <path d="M12 18h-6m12 0h-6" stroke="#FF6F61" fill="none" />
                            </svg>

                            <p class="text-sm sm:text-base md:text-lg text-[#2A2A2A]">
                                There are no upcoming bookings at the moment.
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-col w-full h-[575px] my-[2rem] shadow-md bg-[#FFF6F6] rounded-xl">
                <div class="flex items-center justify-between p-[1rem]">
                    <h3 class="text-sm sm:text-base md:text-lg text-[#2A2A2A] font-medium">
                        Total Earnings
                    </h3>
                    <div class="bg-[#FFFFFF] rounded-lg p-2 flex gap-2 items-center">
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Daily</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Weekly</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Monthly</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#FFFFFF] font-bold rounded-xl bg-[#FF3131] py-1 px-2 md:p-2 md:px-3">Yearly</button>
                    </div>
                </div>
                @if ($earningsData !== null && $earningsData->count() > 0)
                    <ul
                        class="list-disc flex flex-col md:flex-row items-start md:items-center justify-between px-[2rem] gap-2">
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Average Monthly Earnings:
                            <span class="font-bold">₹ 2,083</span>
                        </li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Most Advisory hours Month:
                            <span class="font-bold"> Oct 2023 (295h)</span>
                        </li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Least Advisory hours Month:
                            <span class="font-bold"> Jan 2023 (80h)</span>
                        </li>
                    </ul>
                    <div id="earningChartdiv" class="w-full h-full"></div>
                @else
                    <div class="flex flex-col justify-center items-center w-full h-full text-center">
                        <svg class="w-20 h-20 mb-4 text-[#FF6F61]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 2v4m0 0v4m0-4h4m-4 0H8m4 0v10m0-10h4m-4 0H8m4 0v4m-4 4h4m-4-4h-4" />
                            <circle cx="12" cy="12" r="10" stroke="#FF6F61" stroke-width="2"
                                fill="none" />
                        </svg>

                        <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-[#2A2A2A] mb-2">No Earnings Data</h2>
                        <p class="text-sm sm:text-base md:text-lg text-[#2A2A2A]">There is no earnings data available.</p>
                    </div>
                @endif
            </div>

            <div class="flex flex-col w-full h-[575px] my-[2rem] shadow-md bg-[#F4FAFF] rounded-xl">
                <div class="flex items-center justify-between p-[1rem]">
                    <h3 class="text-sm sm:text-base md:text-lg text-[#2A2A2A] font-medium">
                        Total Advisory Hours
                    </h3>
                    <div class="bg-[#FFFFFF] rounded-lg p-2 flex gap-2 items-center">
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Daily</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Weekly</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Monthly</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#FFFFFF] font-bold rounded-xl bg-[#2159E8] py-1 px-2 md:p-2 md:px-3">Yearly</button>
                    </div>
                </div>
                @if ($advisoryHoursData !== null && $advisoryHoursData->count() > 0)
                    <ul
                        class="list-disc flex flex-col md:flex-row items-start md:items-center justify-between px-[2rem] gap-2">
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Average Monthly Advisory
                            hours: <span class="font-bold">230 hrs</span></li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Most Advisory hours Month:
                            <span class="font-bold"> Oct 2023 (295h)</span>
                        </li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Least Advisory hours Month:
                            <span class="font-bold"> Jan 2023 (80h)</span>
                        </li>
                    </ul>
                    <div id="advisoryHoursChartdiv" class="w-full h-full"></div>
                @else
                    <div class="flex flex-col justify-center items-center w-full h-full text-center">
                        <svg class="w-20 h-20 mb-4 text-[#2159E8]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" stroke="#2159E8" stroke-width="2"
                                fill="none" />
                            <path d="M12 6v6h6" />
                        </svg>

                        <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-[#2A2A2A] mb-2">No Advisory Hours Data
                        </h2>
                        <p class="text-sm sm:text-base md:text-lg text-[#2A2A2A]">There is no advisory hours data
                            available.</p>
                    </div>
                @endif
            </div>

            <div class="flex flex-col w-full h-[575px] my-[2rem] shadow-md bg-[#FFFBF1] rounded-xl mt-[3rem] md:mt-0">
                <div class="flex items-center justify-between p-[1rem]">
                    <h3 class="text-sm sm:text-base md:text-lg text-[#2A2A2A] font-medium">
                        Total Clients
                    </h3>
                    <div class="bg-[#FFFFFF] rounded-lg p-2 flex gap-2 items-center">
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Daily</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Weekly</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Monthly</button>
                        <button
                            class="text-xs sm:text-sm md:text-base text-[#FFFFFF] font-bold rounded-xl bg-[#FF3131] py-1 px-2 md:p-2 md:px-3">Yearly</button>
                    </div>
                </div>
                @if ($clientsData !== null && $clientsData->count() > 0)
                    <ul
                        class="list-disc flex flex-col md:flex-row items-start md:items-center justify-between px-[2rem] gap-2">
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Average Monthly Clients:
                            <span class="font-bold">16</span>
                        </li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Top Month for new Clients:
                            <span class="font-bold"> Oct 2023 (28)</span>
                        </li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Lowest Month for New
                            Clients: <span class="font-bold"> Jan 2023 (7)</span></li>
                    </ul>
                    <div id="totalClientChartdiv" class="w-full h-full"></div>
                @else
                    <div class="flex flex-col justify-center items-center w-full h-full text-center">
                        <svg class="w-20 h-20 mb-4 text-[#FF3131]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="7" r="4" stroke="#FF3131" stroke-width="2"
                                fill="none" />
                            <path d="M5 20c0-4 3-7 7-7s7 3 7 7" stroke="#FF3131" stroke-width="2" fill="none" />
                            <path d="M16 20c0-4-3-7-7-7s-7 3-7 7" stroke="#FF3131" stroke-width="2" fill="none" />
                        </svg>

                        <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-[#2A2A2A] mb-2">No Clients Data</h2>
                        <p class="text-sm sm:text-base md:text-lg text-[#2A2A2A]">There are no client data available.</p>
                    </div>
                @endif
            </div>


            <!-- bottom menu bar -->
            @include('advisor.components.bottommenu')
        </div>


        @include('advisor.components.footer')

        <!-- side bar -->
        @include('advisor.components.sidebar')
    </div>

    {{-- <script>
        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.PieChart);

        // Add data
        chart.data = [{
                country: "Lithuania",
                value: 501.9,
            },
            {
                country: "Czechia",
                value: 301.9,
            },
            {
                country: "Ireland",
                value: 201.1,
            },
            {
                country: "Germany",
                value: 165.8,
            },
            {
                country: "Australia",
                value: 139.9,
            },
        ];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "value";
        pieSeries.dataFields.category = "country";
        pieSeries.labels.template.disabled = true;
        pieSeries.ticks.template.disabled = true;

        // pieSeries.dataFields.value.legend = 20;

        chart.legend = new am4charts.Legend();
        chart.legend.position = "left";

        chart.innerRadius = am4core.percent(50);

        var label = pieSeries.createChild(am4core.Label);
        label.disabled = true;

        chart.logo.disabled = true;

        // label.text = "${values.value.sum}";
        // label.horizontalCenter = "middle";
        // label.verticalCenter = "middle";
        // label.fontSize = 20;

        // earning chart graph
        // Create root element
        var root = am5.Root.new("earningChartdiv");
        // var root = am5.Root.new("newChart");

        // Set themes
        root.setThemes([am5themes_Animated.new(root)]);

        // Create chart
        var chart = root.container.children.push(
            am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
            })
        );

        // Add cursor
        var cursor = chart.set(
            "cursor",
            am5xy.XYCursor.new(root, {
                behavior: "zoomX",
            })
        );
        cursor.lineY.set("visible", false);

        // Generate random data
        var date = new Date();
        date.setHours(0, 0, 0, 0);
        var value = 100;

        function generateData() {
            value = Math.round(Math.random() * 10 - 5 + value);
            am5.time.add(date, "day", 1);
            return {
                date: date.getTime(),
                value: value,
            };
        }

        function generateDatas(count) {
            var data = [];
            for (var i = 0; i < count; ++i) {
                data.push(generateData());
            }
            return data;
        }

        // Create axes
        var xAxis = chart.xAxes.push(
            am5xy.DateAxis.new(root, {
                maxDeviation: 0,
                baseInterval: {
                    timeUnit: "day",
                    count: 1,
                },
                renderer: am5xy.AxisRendererX.new(root, {
                    minGridDistance: 40,
                }),
                tooltip: am5.Tooltip.new(root, {}),
            })
        );

        var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {}),
            })
        );

        // Add series
        var series = chart.series.push(
            am5xy.LineSeries.new(root, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                curveFactory: d3.curveNatural,
            })
        );

        series.fills.template.setAll({
            visible: true,
            fillOpacity: 0.2,
        });

        series.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 0,
                sprite: am5.Circle.new(root, {
                    radius: 4,
                    stroke: root.interfaceColors.get("background"),
                    strokeWidth: 2,
                    fill: series.get("fill"),
                }),
            });
        });

        var tooltip = series.set("tooltip", am5.Tooltip.new(root, {}));
        tooltip.label.set("text", "{valueY}");

        // Add scrollbar
        chart.set(
            "scrollbarX",
            am5.Scrollbar.new(root, {
                orientation: "horizontal",
            })
        );

        var data = generateDatas(50);
        series.data.setAll(data);

        // Make stuff animate on load
        series.appear(1000);
        chart.appear(1000, 100);

        function setCurveFactory(factory) {
            series.set("curveFactory", d3[factory]);
            setButtonState();
        }

        function setButtonState() {
            var selector = document.getElementById("selector");
            var index = selector.selectedIndex;
            if (index == 0) {
                document.getElementById("selector-prev").disabled = "disabled";
                document.getElementById("selector-next").disabled = "";
            } else if (index >= selector.options.length - 1) {
                document.getElementById("selector-prev").disabled = "";
                document.getElementById("selector-next").disabled = "disabled";
            } else {
                document.getElementById("selector-prev").disabled = "";
                document.getElementById("selector-next").disabled = "";
            }
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
    </script> --}}
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
        //  Advisory Hours graph chart
        // var advisoryroot = am5.Root.new("advisoryHoursChartdiv");

        // Set themes
        advisoryroot.setThemes([am5themes_Animated.new(advisoryroot)]);

        // Create chart
        var chart = advisoryroot.container.children.push(
            am5xy.XYChart.new(advisoryroot, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
            })
        );

        // Add cursor
        var cursor = chart.set(
            "cursor",
            am5xy.XYCursor.new(advisoryroot, {
                behavior: "zoomX",
            })
        );
        cursor.lineY.set("visible", false);

        // Generate random data
        var date = new Date();
        date.setHours(0, 0, 0, 0);
        var value = 100;

        function generateData() {
            value = Math.round(Math.random() * 10 - 5 + value);
            am5.time.add(date, "day", 1);
            return {
                date: date.getTime(),
                value: value,
            };
        }

        function generateDatas(count) {
            var data = [];
            for (var i = 0; i < count; ++i) {
                data.push(generateData());
            }
            return data;
        }

        // Create axes
        var xAxis = chart.xAxes.push(
            am5xy.DateAxis.new(advisoryroot, {
                maxDeviation: 0,
                baseInterval: {
                    timeUnit: "day",
                    count: 1,
                },
                renderer: am5xy.AxisRendererX.new(advisoryroot, {
                    minGridDistance: 40,
                }),
                tooltip: am5.Tooltip.new(advisoryroot, {}),
            })
        );

        var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(advisoryroot, {
                renderer: am5xy.AxisRendererY.new(advisoryroot, {}),
            })
        );

        // Add series
        var series = chart.series.push(
            am5xy.LineSeries.new(advisoryroot, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                curveFactory: d3.curveNatural,
            })
        );

        series.fills.template.setAll({
            visible: true,
            fillOpacity: 0.2,
        });

        series.bullets.push(function() {
            return am5.Bullet.new(advisoryroot, {
                locationY: 0,
                sprite: am5.Circle.new(advisoryroot, {
                    radius: 4,
                    stroke: advisoryroot.interfaceColors.get("background"),
                    strokeWidth: 2,
                    fill: series.get("fill"),
                }),
            });
        });

        var tooltip = series.set("tooltip", am5.Tooltip.new(advisoryroot, {}));
        tooltip.label.set("text", "{valueY}");

        // total client graph chart
        var advisoryroot = am5.Root.new("totalClientChartdiv");

        // Set themes
        advisoryroot.setThemes([am5themes_Animated.new(root)]);

        // Create chart
        var chart = advisoryroot.container.children.push(
            am5xy.XYChart.new(advisoryroot, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
            })
        );

        // Add cursor
        var cursor = chart.set(
            "cursor",
            am5xy.XYCursor.new(advisoryroot, {
                behavior: "zoomX",
            })
        );
        cursor.lineY.set("visible", false);

        // Generate random data
        var date = new Date();
        date.setHours(0, 0, 0, 0);
        var value = 100;

        function generateData() {
            value = Math.round(Math.random() * 10 - 5 + value);
            am5.time.add(date, "day", 1);
            return {
                date: date.getTime(),
                value: value,
            };
        }

        function generateDatas(count) {
            var data = [];
            for (var i = 0; i < count; ++i) {
                data.push(generateData());
            }
            return data;
        }

        // Create axes
        var xAxis = chart.xAxes.push(
            am5xy.DateAxis.new(advisoryroot, {
                maxDeviation: 0,
                baseInterval: {
                    timeUnit: "day",
                    count: 1,
                },
                renderer: am5xy.AxisRendererX.new(advisoryroot, {
                    minGridDistance: 40,
                }),
                tooltip: am5.Tooltip.new(advisoryroot, {}),
            })
        );

        var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(advisoryroot, {
                renderer: am5xy.AxisRendererY.new(advisoryroot, {}),
            })
        );

        // Add series
        var series = chart.series.push(
            am5xy.LineSeries.new(advisoryroot, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                curveFactory: d3.curveNatural,
            })
        );

        series.fills.template.setAll({
            visible: true,
            fillOpacity: 0.2,
        });

        series.bullets.push(function() {
            return am5.Bullet.new(advisoryroot, {
                locationY: 0,
                sprite: am5.Circle.new(advisoryroot, {
                    radius: 4,
                    stroke: advisoryroot.interfaceColors.get("background"),
                    strokeWidth: 2,
                    fill: series.get("fill"),
                }),
            });
        });

        var tooltip = series.set("tooltip", am5.Tooltip.new(advisoryroot, {}));
        tooltip.label.set("text", "{valueY}");
    </script>
    <script>
        am5.ready(function() {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("advisoryHoursChartdiv");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([am5themes_Animated.new(root)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true,
                    paddingLeft: 0,
                })
            );

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineX.set("forceHidden", true);
            cursor.lineY.set("forceHidden", true);

            // Generate random data
            var date = new Date();
            date.setHours(0, 0, 0, 0);
            var value = 100;

            function generateData() {
                value = Math.round(Math.random() * 10 - 5 + value);
                am5.time.add(date, "day", 1);
                return {
                    date: date.getTime(),
                    value: value,
                };
            }

            function generateDatas(count) {
                var data = [];
                for (var i = 0; i < count; ++i) {
                    data.push(generateData());
                }
                return data;
            }

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root, {
                    baseInterval: {
                        timeUnit: "day",
                        count: 1,
                    },
                    renderer: am5xy.AxisRendererX.new(root, {
                        minorGridEnabled: true,
                        minGridDistance: 80,
                    }),
                })
            );

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {}),
                })
            );

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root, {
                    name: "Series",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "date",
                    tooltip: am5.Tooltip.new(root, {
                        labelText: "{valueY}",
                    }),
                })
            );

            series.fills.template.setAll({
                fillOpacity: 0.2,
                visible: true,
            });

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
                "scrollbarX",
                am5.Scrollbar.new(root, {
                    orientation: "horizontal",
                })
            );

            // Set data
            var data = generateDatas(1200);
            series.data.setAll(data);

            var rangeDate = new Date();
            am5.time.add(rangeDate, "day", Math.round(series.dataItems.length / 2));
            var rangeTime = rangeDate.getTime();

            // add series range
            var seriesRangeDataItem = xAxis.makeDataItem({});
            var seriesRange = series.createAxisRange(seriesRangeDataItem);
            seriesRange.fills.template.setAll({
                visible: true,
                opacity: 0.3,
            });

            seriesRange.fills.template.set(
                "fillPattern",
                am5.LinePattern.new(root, {
                    color: am5.color(0xff0000),
                    rotation: 45,
                    strokeWidth: 2,
                    width: 2000,
                    height: 2000,
                    fill: am5.color(0xffffff),
                })
            );

            seriesRange.strokes.template.set("stroke", am5.color(0xff0000));

            xAxis.onPrivate("max", function(value) {
                seriesRangeDataItem.set("endValue", value);
                seriesRangeDataItem.set("value", rangeTime);
            });

            // add axis range
            var range = xAxis.createAxisRange(xAxis.makeDataItem({}));
            var color = root.interfaceColors.get("primaryButton");

            range.set("value", rangeDate.getTime());
            range.get("grid").setAll({
                strokeOpacity: 1,
                stroke: color,
            });

            var resizeButton = am5.Button.new(root, {
                themeTags: ["resize", "horizontal"],
                icon: am5.Graphics.new(root, {
                    themeTags: ["icon"],
                }),
            });

            // restrict from being dragged vertically
            resizeButton.adapters.add("y", function() {
                return 0;
            });

            // restrict from being dragged outside of plot
            resizeButton.adapters.add("x", function(x) {
                return Math.max(0, Math.min(chart.plotContainer.width(), x));
            });

            // change range when x changes
            resizeButton.events.on("dragged", function() {
                var x = resizeButton.x();
                var position = xAxis.toAxisPosition(x / chart.plotContainer.width());

                var value = xAxis.positionToValue(position);

                range.set("value", value);

                seriesRangeDataItem.set("value", value);
                seriesRangeDataItem.set("endValue", xAxis.getPrivate("max"));
            });

            // set bullet for the range
            range.set(
                "bullet",
                am5xy.AxisBullet.new(root, {
                    sprite: resizeButton,
                })
            );

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
        }); // end am5.ready()
    </script>
    <script>
        am5.ready(function() {
            // Create root and chart
            var root = am5.Root.new("totalClientChartdiv");

            root.setThemes([am5themes_Animated.new(root)]);

            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    wheelY: "zoomX",
                })
            );

            // Define data
            var data = generatechartData();

            function generatechartData() {
                var chartData = [];
                var firstDate = new Date();
                firstDate.setDate(firstDate.getDate() - 150);
                var visits = -40;
                var b = 0.6;
                for (var i = 0; i < 150; i++) {
                    var newDate = new Date(firstDate);
                    newDate.setHours(0, 0, 0);
                    newDate.setDate(newDate.getDate() + i);
                    if (i > 80) {
                        b = 0.4;
                    }
                    visits += Math.round(
                        (Math.random() < b ? 1 : -1) * Math.random() * 10
                    );

                    chartData.push({
                        date: newDate.getTime(),
                        visits: visits,
                    });
                }
                return chartData;
            }

            // Create Y-axis
            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    extraTooltipPrecision: 1,
                    renderer: am5xy.AxisRendererY.new(root, {
                        minGridDistance: 30,
                    }),
                })
            );

            // Create X-Axis
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root, {
                    baseInterval: {
                        timeUnit: "day",
                        count: 1
                    },
                    renderer: am5xy.AxisRendererX.new(root, {
                        minorGridEnabled: true,
                        cellStartLocation: 0.2,
                        cellEndLocation: 0.8,
                    }),
                })
            );

            // Create series
            var series = chart.series.push(
                am5xy.SmoothedXLineSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "visits",
                    valueXField: "date",
                    tooltip: am5.Tooltip.new(root, {
                        labelText: "{valueX.formatDate()}: {valueY}",
                        pointerOrientation: "horizontal",
                    }),
                })
            );

            series.strokes.template.setAll({
                strokeWidth: 3,
            });

            series.fills.template.setAll({
                fillOpacity: 0.5,
                visible: true,
            });

            series.data.setAll(data);

            // Create axis ranges

            var rangeDataItem = yAxis.makeDataItem({
                value: -1000,
                endValue: 0,
            });

            var range = series.createAxisRange(rangeDataItem);

            range.strokes.template.setAll({
                stroke: am5.color(0xff621f),
                strokeWidth: 3,
            });

            range.fills.template.setAll({
                fill: am5.color(0xff621f),
                fillOpacity: 0.5,
                visible: true,
            });

            // Add cursor
            chart.set(
                "cursor",
                am5xy.XYCursor.new(root, {
                    behavior: "zoomX",
                    xAxis: xAxis,
                })
            );

            xAxis.set(
                "tooltip",
                am5.Tooltip.new(root, {
                    themeTags: ["axis"],
                })
            );

            yAxis.set(
                "tooltip",
                am5.Tooltip.new(root, {
                    themeTags: ["axis"],
                })
            );
        }); // end am5.ready()
    </script>
@endsection
