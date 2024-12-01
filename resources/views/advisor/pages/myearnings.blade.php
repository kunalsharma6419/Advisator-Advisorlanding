@extends('advisor.layouts.app')

@section('advisorcontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('advisor.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[85%] lg:w-[85%] mx-auto mb-[8rem] md:mb-[3rem]">

            <!-- page name -->
            @include('advisor.components.dashmenu')


            {{-- <div class="flex flex-col w-full h-[575px] my-[2rem] shadow-md bg-[#FFF6F6] rounded-xl">
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
            </div> --}}
            <div class="flex gap-[46px] mt-[50px]">
                <div class="lg:flex  hidden flex-col w-[342px] h-[122px] bg-[#F5F5F5] rounded-[12px] gap-[14px] p-[24px]">
                    <div class="flex justify-between">
                        <h3 class="font-[500] text-[16px]">Wallet Earnings</h3>
                        <img class="w-[24px] h-[24px]" src="../src/assets/right arrow.png" alt="" />
                    </div>
                    <p class="text-[#828282] font-[400] text-[16px]">
                        Check your wallet earnings
                    </p>
                </div>
                <!-- card  -->
                <div
                    class="bg-[#FDFADF] w-full text-[#2A2A2A] rounded-[18px] hover:bg-[#FFF2AB] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                    <div class="flex flex-row justify-between lg:flex-col">
                        <div class="flex gap-[12px]">
                            <img class="w-[30px] h-[30px]" src="../src/assets/wallet.png" alt="" />
                            <h3 class="text-[14px] lg:text-[18px] font-[700] hover:text-[#6a9023]">
                                Wallet Earnings:
                            </h3>
                        </div>

                        <h4 class="text-[20px] mt-[5px] lg:text-[32px] font-[500]">
                            ₹ {{ number_format(Auth::user()->advisor_wallet_balance, 2) }}
                        </h4>
                    </div>

                    @if (Auth::user()->advisor_wallet_balance < 100)
                        <p class="text-[#FF3131] font-[400] text-right lg:text-left text-[14px] mt-[30px] lg:text-[16px]">
                            Low balance! Withdrawal is allowed for more than INR 100/-
                        </p>
                    @endif
                    @if (Auth::user()->advisor_wallet_balance >= 100)
                        <!-- Withdrawal Form -->
                        <form action="{{ route('advisor.myearnings.withdraw') }}" method="POST">
                            @csrf
                            <div class="mt-4">
                                <label for="withdraw_amount" class="block text-sm font-medium text-gray-700">Withdraw
                                    Amount</label>
                                <input type="number" name="withdraw_amount" class="mt-1 block w-full" min="100"
                                    max="{{ Auth::user()->advisor_wallet_balance }}" required>

                                <label for="bank_account_number" class="block text-sm font-medium text-gray-700">Bank
                                    Account Number</label>
                                <input type="text" name="bank_account_number" class="mt-1 block w-full"
                                    value="{{ optional($advisor->bankDetails)->account_number ?? 'N/A' }}" required>

                                <label for="bank_ifsc" class="block text-sm font-medium text-gray-700">Bank IFSC</label>
                                <input type="text" name="bank_ifsc" class="mt-1 block w-full"
                                    value="{{ optional($advisor->bankDetails)->bank_ifsc ?? 'N/A' }}" required>

                                <button type="submit" class="mt-4 bg-green-500 text-white py-2 px-4 rounded">
                                    Request Withdrawal
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            <div class="flex gap-[46px] mt-[50px]">
                <div class="lg:flex  hidden flex-col w-[342px] h-[122px] bg-[#F5F5F5] rounded-[12px] gap-[14px] p-[24px]">
                    <div class="flex justify-between">
                        <h3 class="font-[500] text-[16px]">Wallet Withdrawals</h3>
                        <img class="w-[24px] h-[24px]" src="../src/assets/right arrow.png" alt="" />
                    </div>
                    <p class="text-[#828282] font-[400] text-[16px]">
                        Check your wallet withdrawals
                    </p>
                </div>
                <!-- card  -->
                <div
                    class="bg-[#FDFADF] w-full text-[#2A2A2A] rounded-[18px] hover:bg-[#FFF2AB] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                    @if ($withdrawalRequests->isNotEmpty())
                        <div class="mt-8">
                            <div class="flex gap-[12px]">
                                <img class="w-[30px] h-[30px]" src="../src/assets/wallet.png" alt="" />
                                <h3 class="text-[14px] lg:text-[18px] font-[700] hover:text-[#6a9023]">
                                    Wallet Withdraw Requests:
                                </h3>
                            </div>
                            <table
                                class="min-w-full bg-white border border-gray-300 mt-4 rounded-lg shadow-md overflow-hidden">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                            Date</th>
                                        <th
                                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                            Amount</th>
                                        <th
                                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($withdrawalRequests as $request)
                                        <tr class="hover:bg-gray-50">
                                            <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-900">
                                                {{ $request->created_at->format('d M Y') }}</td>
                                            <td class="py-4 px-6 whitespace-nowrap text-sm text-bold text-red-900">₹
                                                {{ number_format($request->withdraw_amount, 2) }}</td>
                                            <td class="py-4 px-6 whitespace-nowrap text-sm font-medium">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        @if ($request->status == 'approved') bg-green-100 text-green-800
                        @elseif ($request->status == 'pending')
                            bg-yellow-100 text-yellow-800
                        @else
                            bg-red-100 text-red-800 @endif">
                                                    {{ ucfirst($request->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
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

                @if ($earningsData && $earningsData->isNotEmpty())
                    <!-- Display Earnings Data -->
                    <ul
                        class="list-disc flex flex-col md:flex-row items-start md:items-center justify-between px-[2rem] gap-2">
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Average Monthly Earnings:
                            <span class='font-bold'>₹ 2,083</span>
                        </li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Most Advisory Hours Month:
                            <span class='font-bold'>Oct 2023 (295h)</span>
                        </li>
                        <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">Least Advisory Hours Month:
                            <span class='font-bold'>Jan 2023 (80h)</span>
                        </li>
                    </ul>
                    <div id="earningChartdiv" class="w-full h-full">
                        <!-- Placeholder for the chart or data visualization -->
                    </div>
                @else
                    <!-- No Data Message -->
                    <div class="flex flex-col items-center justify-center w-full h-full p-4">
                        <svg class="w-32 h-32 mb-4 text-[#FF3131]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M3 12l2 2 4-4 4 4 6-6" />
                        </svg>
                        <p class="text-[#2A2A2A] text-lg font-semibold">No data to display</p>
                    </div>
                @endif
            </div>


            {{-- <div class="w-full flex items-center justify-center mb-[4rem] ">
                <div class="bg-[#F5F5F5] rounded-xl flex justify-between items-center p-3 w-full md:max-w-[30rem]">
                    <h2 class="text-sm sm:text-base md:text-lg font-medium">Check all my earnings</h2>
                    <a href="../Advisor pages/advisortransactionhistory.html">
                        <span>></span>
                    </a>
                </div>
            </div> --}}

        </div>

        @include('advisor.components.footer')

        <!-- side bar -->
        @include('advisor.components.sidebar')

        <!-- bottom menu bar -->
        @include('advisor.components.bottommenu')


    </div>

    {{-- <script>
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
