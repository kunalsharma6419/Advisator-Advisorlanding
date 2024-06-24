@extends('advisor.layouts.app')

@section('advisorcontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('advisor.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[85%] lg:w-[85%] mx-auto mb-[8rem] md:mb-[3rem]">

            <!-- page name -->
            @include('advisor.components.dashmenu')


            <div class="flex flex-col w-full h-[575px] my-[2rem] shadow-md bg-[#FFF6F6] rounded-xl">
                <div class="flex items-center justify-between p-[1rem]">
                    <h3 class="text-sm sm:text-base md:text-lg text-[#2A2A2A] font-medium">Total Earnings</h3>
                    <div class="bg-[#FFFFFF] rounded-lg p-2 flex gap-2 items-center">
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Daily</button>
                        </div>
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Weekly</button>
                        </div>
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">Monthly</button>
                        </div>
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#FFFFFF] font-bold rounded-xl bg-[#FF3131] py-1 px-2 md:p-2 md:px-3">Yearly</button>
                        </div>

                    </div>

                </div>

                <ul class="list-disc flex flex-col md:flex-row items-start md:items-center justify-between px-[2rem] gap-2">
                    <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Average Monthly Earnings: <span
                            class='font-bold'>₹ 2,083</span></li>
                    <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Most Advisory hours Month: <span
                            class='font-bold'> Oct 2023 (295h)</span></li>
                    <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Least Advisory hours Month: <span
                            class='font-bold'> Jan 2023 (80h)</span></li>
                </ul>
                <div id="earningChartdiv" class="w-full h-full"></div>
            </div>

            <div class="w-full flex items-center justify-center mb-[4rem] ">
                <div class="bg-[#F5F5F5] rounded-xl flex justify-between items-center p-3 w-full md:max-w-[30rem]">
                    <h2 class="text-sm sm:text-base md:text-lg font-medium">Check all my earnings</h2>
                    <a href="../Advisor pages/advisortransactionhistory.html">
                        <span>></span>
                    </a>
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
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/sidebar/money.png"
                                    alt="">
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
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/sidebar/Blogs.png"
                                    alt="">
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

        <!-- bottom menu bar -->
        <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Advisor pages/advisordashboard.html">
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/home.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Home</p>
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
                <a href="../Advisor pages/advisorMyearning.html" class="flex flex-col items-center justify-center gap-1">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/activeEarning.png"
                        alt="">
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000]">My Earnings</p>
                </a>
            </div>

        </div>


    </div>

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
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX"
        }));

        // Add cursor
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
            behavior: "zoomX"
        }));
        cursor.lineY.set("visible", false);

        // Generate random data
        var date = new Date();
        date.setHours(0, 0, 0, 0);
        var value = 100;

        function generateData() {
            value = Math.round((Math.random() * 10 - 5) + value);
            am5.time.add(date, "day", 1);
            return {
                date: date.getTime(),
                value: value
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
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
            maxDeviation: 0,
            baseInterval: {
                timeUnit: "day",
                count: 1
            },
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 40
            }),
            tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));

        // Add series
        var series = chart.series.push(am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            valueXField: "date",
            curveFactory: d3.curveNatural
        }));

        series.fills.template.setAll({
            visible: true,
            fillOpacity: 0.2
        });

        series.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 0,
                sprite: am5.Circle.new(root, {
                    radius: 4,
                    stroke: root.interfaceColors.get("background"),
                    strokeWidth: 2,
                    fill: series.get("fill")
                })
            });
        });

        var tooltip = series.set("tooltip", am5.Tooltip.new(root, {}));
        tooltip.label.set("text", "{valueY}");

        // Add scrollbar
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
            orientation: "horizontal"
        }));

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
            } else if (index >= (selector.options.length - 1)) {
                document.getElementById("selector-prev").disabled = "";
                document.getElementById("selector-next").disabled = "disabled";
            } else {
                document.getElementById("selector-prev").disabled = "";
                document.getElementById("selector-next").disabled = "";
            }
        }



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
        advisoryroot.setThemes([
            am5themes_Animated.new(advisoryroot)
        ]);

        // Create chart
        var chart = advisoryroot.container.children.push(am5xy.XYChart.new(advisoryroot, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX"
        }));

        // Add cursor
        var cursor = chart.set("cursor", am5xy.XYCursor.new(advisoryroot, {
            behavior: "zoomX"
        }));
        cursor.lineY.set("visible", false);

        // Generate random data
        var date = new Date();
        date.setHours(0, 0, 0, 0);
        var value = 100;

        function generateData() {
            value = Math.round((Math.random() * 10 - 5) + value);
            am5.time.add(date, "day", 1);
            return {
                date: date.getTime(),
                value: value
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
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(advisoryroot, {
            maxDeviation: 0,
            baseInterval: {
                timeUnit: "day",
                count: 1
            },
            renderer: am5xy.AxisRendererX.new(advisoryroot, {
                minGridDistance: 40
            }),
            tooltip: am5.Tooltip.new(advisoryroot, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(advisoryroot, {
            renderer: am5xy.AxisRendererY.new(advisoryroot, {})
        }));

        // Add series
        var series = chart.series.push(am5xy.LineSeries.new(advisoryroot, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            valueXField: "date",
            curveFactory: d3.curveNatural
        }));

        series.fills.template.setAll({
            visible: true,
            fillOpacity: 0.2
        });

        series.bullets.push(function() {
            return am5.Bullet.new(advisoryroot, {
                locationY: 0,
                sprite: am5.Circle.new(advisoryroot, {
                    radius: 4,
                    stroke: advisoryroot.interfaceColors.get("background"),
                    strokeWidth: 2,
                    fill: series.get("fill")
                })
            });
        });

        var tooltip = series.set("tooltip", am5.Tooltip.new(advisoryroot, {}));
        tooltip.label.set("text", "{valueY}");




        // total client graph chart
        var advisoryroot = am5.Root.new("totalClientChartdiv");

        // Set themes
        advisoryroot.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        var chart = advisoryroot.container.children.push(am5xy.XYChart.new(advisoryroot, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX"
        }));

        // Add cursor
        var cursor = chart.set("cursor", am5xy.XYCursor.new(advisoryroot, {
            behavior: "zoomX"
        }));
        cursor.lineY.set("visible", false);

        // Generate random data
        var date = new Date();
        date.setHours(0, 0, 0, 0);
        var value = 100;

        function generateData() {
            value = Math.round((Math.random() * 10 - 5) + value);
            am5.time.add(date, "day", 1);
            return {
                date: date.getTime(),
                value: value
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
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(advisoryroot, {
            maxDeviation: 0,
            baseInterval: {
                timeUnit: "day",
                count: 1
            },
            renderer: am5xy.AxisRendererX.new(advisoryroot, {
                minGridDistance: 40
            }),
            tooltip: am5.Tooltip.new(advisoryroot, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(advisoryroot, {
            renderer: am5xy.AxisRendererY.new(advisoryroot, {})
        }));

        // Add series
        var series = chart.series.push(am5xy.LineSeries.new(advisoryroot, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            valueXField: "date",
            curveFactory: d3.curveNatural
        }));

        series.fills.template.setAll({
            visible: true,
            fillOpacity: 0.2
        });

        series.bullets.push(function() {
            return am5.Bullet.new(advisoryroot, {
                locationY: 0,
                sprite: am5.Circle.new(advisoryroot, {
                    radius: 4,
                    stroke: advisoryroot.interfaceColors.get("background"),
                    strokeWidth: 2,
                    fill: series.get("fill")
                })
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
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0
            }));


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
                value = Math.round((Math.random() * 10 - 5) + value);
                am5.time.add(date, "day", 1);
                return {
                    date: date.getTime(),
                    value: value
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
            var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
                baseInterval: {
                    timeUnit: "day",
                    count: 1
                },
                renderer: am5xy.AxisRendererX.new(root, {
                    minorGridEnabled: true,
                    minGridDistance: 80
                })
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.LineSeries.new(root, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.fills.template.setAll({
                fillOpacity: 0.2,
                visible: true
            });


            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set("scrollbarX", am5.Scrollbar.new(root, {
                orientation: "horizontal"
            }));


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
                opacity: 0.3
            });

            seriesRange.fills.template.set("fillPattern", am5.LinePattern.new(root, {
                color: am5.color(0xff0000),
                rotation: 45,
                strokeWidth: 2,
                width: 2000,
                height: 2000,
                fill: am5.color(0xffffff)
            }));

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
                stroke: color
            });

            var resizeButton = am5.Button.new(root, {
                themeTags: ["resize", "horizontal"],
                icon: am5.Graphics.new(root, {
                    themeTags: ["icon"]
                })
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
            range.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: resizeButton
            }));


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
                    wheelY: "zoomX"
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
                    visits += Math.round((Math.random() < b ? 1 : -1) * Math.random() * 10);

                    chartData.push({
                        date: newDate.getTime(),
                        visits: visits
                    });
                }
                return chartData;
            }

            // Create Y-axis
            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    extraTooltipPrecision: 1,
                    renderer: am5xy.AxisRendererY.new(root, {
                        minGridDistance: 30
                    })
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
                        cellEndLocation: 0.8
                    })
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
                        pointerOrientation: "horizontal"
                    })
                })
            );

            series.strokes.template.setAll({
                strokeWidth: 3
            });

            series.fills.template.setAll({
                fillOpacity: 0.5,
                visible: true
            });


            series.data.setAll(data);

            // Create axis ranges

            var rangeDataItem = yAxis.makeDataItem({
                value: -1000,
                endValue: 0
            });

            var range = series.createAxisRange(rangeDataItem);

            range.strokes.template.setAll({
                stroke: am5.color(0xff621f),
                strokeWidth: 3
            });

            range.fills.template.setAll({
                fill: am5.color(0xff621f),
                fillOpacity: 0.5,
                visible: true
            });


            // Add cursor
            chart.set(
                "cursor",
                am5xy.XYCursor.new(root, {
                    behavior: "zoomX",
                    xAxis: xAxis
                })
            );

            xAxis.set(
                "tooltip",
                am5.Tooltip.new(root, {
                    themeTags: ["axis"]
                })
            );

            yAxis.set(
                "tooltip",
                am5.Tooltip.new(root, {
                    themeTags: ["axis"]
                })
            );

        }); // end am5.ready()
    </script>
@endsection
