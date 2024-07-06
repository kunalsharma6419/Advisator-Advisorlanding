@extends('user.layouts.app')

@section('usercontent')
    <div class="w-full relative min-h-screen h-full overflow-x-hidden">
        <!-- header -->
        @include('user.components.mainheader')

        <!-- Dash Menu -->
        {{-- @include('user.components.dashmenu') --}}
        <div class="font-Roboto w-[90%] md:w-[85%] lg:w-[85%] mx-auto mb-[8rem] md:mb-[3rem]">
            <!-- page name -->
            @include('user.components.dashmenu')

            <!-- graph -->
            <div class="w-full flex flex-col md:flex-row gap-4 md:gap-3 lg:gap-6 mt-[3rem]">
                <div class="border border-[#B6F39A] lg:h-[280px] p-4 w-full rounded-xl bg-[#FFFFFF] shadow-md">
                    <div class="flex gap-2 items-center justify-start my-2">
                        <img class="w-6 h-6 mt-2" src=" ../src/assets/icons/teenyicons_appointments-solid.png"
                            alt="" />
                        <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                            Upcoming bookings
                        </p>
                    </div>
                    <ul class="list-disc pl-2 xl:px-4 flex flex-col gap-4 mt-[1.5rem]">
                        <div class="text-sm md:text-base text-[#2A2A2A]">
                            <div class="flex items-center justify-between text-[#AD3939]">
                                <p class="font-medium">Advisor Name</p>
                                <p class="font-normal">Date</p>
                                <p class="font-normal">Time</p>
                            </div>
                        </div>
                        <li class="text-sm md:text-base text-[#2A2A2A]">
                            <div class="flex items-center justify-between">
                                <p class="font-medium">Rachel Wayne</p>
                                <p class="font-normal">18/04/2024</p>
                                <p class="font-normal">13:30 pm</p>
                            </div>
                        </li>
                        <li class="text-sm md:text-base text-[#2A2A2A]">
                            <div class="flex items-center justify-between">
                                <p class="font-medium">Catherine Paize</p>
                                <p class="font-normal">18/04/2024</p>
                                <p class="font-normal">13:30 pm</p>
                            </div>
                        </li>
                        <li class="text-sm md:text-base text-[#2A2A2A]">
                            <div class="flex items-center justify-between">
                                <p class="font-medium">Sam Will</p>
                                <p class="font-normal">18/04/2024</p>
                                <p class="font-normal">13:30 pm</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="border border-[#DBDFFF] lg:h-[280px] p-4 w-full rounded-xl bg-[#FFFFFF] shadow-md">
                    <div class="flex gap-2 items-center justify-start my-2">
                        <img class="w-6 h-6 mt-2" src=" ../src/assets/icons/fa6-solid_ranking-star.png" alt="" />
                        <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                            Completing your profile
                        </p>
                    </div>
                    <div class="my-[2rem] flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                        role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-[#7482FF] text-xs text-white text-center whitespace-nowrap dark:bg-[#7482FF] transition duration-500"
                            style="width: 80%">
                            80%
                        </div>
                    </div>
                    <ul class="list-disc px-4">
                        <li class="text-[#3A3A3A] text-sm md:text-base">
                            Add your profile image.
                        </li>
                        <li class="text-[#3A3A3A] text-sm md:text-base">
                            Add your business description.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full flex flex-col md:flex-row gap-4 md:gap-3 lg:gap-6 mt-[3rem]">
                <div class="border border-[#B6F39A] h-[320px] p-4 w-full rounded-xl bg-[#FFFFFF] shadow-md">
                    <div class="flex gap-2 items-start my-2">
                        <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                            Top 3 Advisors
                        </p>
                    </div>
                    <div id="advisorchartdiv" class="w-full h-[90%]"></div>
                </div>

                <div
                    class="border border-[#F3EA9A] h-[320px] p-4 w-full flex justify-center flex-col rounded-xl bg-[#FFFFFF] shadow-md">
                    <div class="flex gap-2 items-start my-1">
                        <p class="text-sm sm:text-base md:text-xl text-[#2A2A2A]">
                            Wallet Insights
                        </p>
                    </div>
                    <div id="chartdiv" class="w-full h-full"></div>
                </div>
            </div>

            <div class="flex flex-col w-full h-[575px] my-[2rem] shadow-md bg-[#FFF6F6] rounded-xl">
                <div class="flex items-center justify-between p-[1rem]">
                    <h3 class="text-sm sm:text-base md:text-lg text-[#2A2A2A] font-medium">
                        Total Advisory Hours
                    </h3>
                    <div class="bg-[#FFFFFF] rounded-lg p-2 flex gap-2 items-center">
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">
                                Daily
                            </button>
                        </div>
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">
                                Weekly
                            </button>
                        </div>
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#2A2A2A] font-bold rounded-xl bg-transparent py-1 px-2 md:p-2 md:px-3">
                                Monthly
                            </button>
                        </div>
                        <div>
                            <button
                                class="text-xs sm:text-sm md:text-base text-[#FFFFFF] font-bold rounded-xl bg-[#FF3131] py-1 px-2 md:p-2 md:px-3">
                                Yearly
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="list-disc flex flex-col md:flex-row items-start md:items-center justify-between px-[2rem] gap-2">
                    <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">
                        Average Monthly Advisory hours:
                        <span class="font-bold">230 hrs</span>
                    </li>
                    <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">
                        Most Advisory hours Month:
                        <span class="font-bold"> Oct 2023 (295h)</span>
                    </li>
                    <li class="font-normal text-[#2A2A2A] text-xs md:text-sm lg:text-base">
                        Least Advisory hours Month:
                        <span class="font-bold"> Jan 2023 (80h)</span>
                    </li>
                </ul>
                <div id="earningChartdiv" class="w-full h-full"></div>
            </div>
        </div>




        <!-- bottom menu bar -->
        @include('user.components.bottommenu')

        <!--Footer -->
        @include('user.components.footer')


        <!-- side bar -->
        @include('user.components.sidebar')
    </div>
    <script>
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

        // // // advios dashboard
        am5.ready(function() {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("advisorchartdiv");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([am5themes_Animated.new(root)]);

            var data = [{
                    name: "Catherine Paize",
                    steps: 45688,
                    pictureSettings: {
                        src: " ../src/assets/auth/Rectangle 65.png",
                    },
                },
                {
                    name: "Sienna Miller",
                    steps: 35781,
                    pictureSettings: {
                        src: " ../src/assets/Ellipse 4.png",
                    },
                },
                {
                    name: "Chris Matthew",
                    steps: 25464,
                    pictureSettings: {
                        src: " ../src/assets/Ellipse 5.png",
                    },
                },
            ];

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    paddingLeft: 0,
                    paddingRight: 20,
                    wheelX: "none",
                    wheelY: "none",
                })
            );

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/

            var yRenderer = am5xy.AxisRendererY.new(root, {
                minorGridEnabled: true,
            });
            yRenderer.grid.template.set("visible", false);

            var yAxis = chart.yAxes.push(
                am5xy.CategoryAxis.new(root, {
                    categoryField: "name",
                    renderer: yRenderer,
                    paddingRight: 40,
                })
            );

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 80,
                minorGridEnabled: true,
            });

            var xAxis = chart.xAxes.push(
                am5xy.ValueAxis.new(root, {
                    min: 0,
                    renderer: xRenderer,
                })
            );

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    name: "Income",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueXField: "steps",
                    categoryYField: "name",
                    sequencedInterpolation: true,
                    calculateAggregates: true,
                    maskBullets: false,
                    tooltip: am5.Tooltip.new(root, {
                        dy: -30,
                        pointerOrientation: "vertical",
                        labelText: "{valueX}",
                    }),
                })
            );

            series.columns.template.setAll({
                strokeOpacity: 0,
                cornerRadiusBR: 10,
                cornerRadiusTR: 10,
                cornerRadiusBL: 10,
                cornerRadiusTL: 10,
                maxHeight: 40,
                fillOpacity: 0.8,
            });

            var currentlyHovered;

            series.columns.template.events.on("pointerover", function(e) {
                handleHover(e.target.dataItem);
            });

            series.columns.template.events.on("pointerout", function(e) {
                handleOut();
            });

            function handleHover(dataItem) {
                if (dataItem && currentlyHovered != dataItem) {
                    handleOut();
                    currentlyHovered = dataItem;
                    var bullet = dataItem.bullets[0];
                    bullet.animate({
                        key: "locationX",
                        to: 1,
                        duration: 600,
                        easing: am5.ease.out(am5.ease.cubic),
                    });
                }
            }

            function handleOut() {
                if (currentlyHovered) {
                    var bullet = currentlyHovered.bullets[0];
                    bullet.animate({
                        key: "locationX",
                        to: 0,
                        duration: 600,
                        easing: am5.ease.out(am5.ease.cubic),
                    });
                }
            }

            var circleTemplate = am5.Template.new({});

            series.bullets.push(function(root, series, dataItem) {
                var bulletContainer = am5.Container.new(root, {});
                var circle = bulletContainer.children.push(
                    am5.Circle.new(
                        root, {
                            radius: 34,
                        },
                        circleTemplate
                    )
                );

                var maskCircle = bulletContainer.children.push(
                    am5.Circle.new(root, {
                        radius: 27
                    })
                );

                // only containers can be masked, so we add image to another container
                var imageContainer = bulletContainer.children.push(
                    am5.Container.new(root, {
                        mask: maskCircle,
                    })
                );

                // not working
                var image = imageContainer.children.push(
                    am5.Picture.new(root, {
                        templateField: "pictureSettings",
                        centerX: am5.p50,
                        centerY: am5.p50,
                        width: 60,
                        height: 60,
                    })
                );

                return am5.Bullet.new(root, {
                    locationX: 0,
                    sprite: bulletContainer,
                });
            });

            // heatrule
            series.set("heatRules", [{
                    dataField: "valueX",
                    min: am5.color(0xe5dc36),
                    max: am5.color(0x5faa46),
                    target: series.columns.template,
                    key: "fill",
                },
                {
                    dataField: "valueX",
                    min: am5.color(0xe5dc36),
                    max: am5.color(0x5faa46),
                    target: circleTemplate,
                    key: "fill",
                },
            ]);

            series.data.setAll(data);
            yAxis.data.setAll(data);

            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineX.set("visible", false);
            cursor.lineY.set("visible", false);

            cursor.events.on("cursormoved", function() {
                var dataItem = series.get("tooltip").dataItem;
                if (dataItem) {
                    handleHover(dataItem);
                } else {
                    handleOut();
                }
            });

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();
            chart.appear(1000, 100);
        }); // end am5.ready()

        // earning chart graph
        // Create root element
        var root = am5.Root.new("earningChartdiv");

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
    </script>

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
@endsection
