@extends('web.layouts.app')

@section('maincontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- Header -->
        @include('web.components.header')

        <!-- main -->
        <!-- main -->
        <div class="flex flex-col w-[98%] text-[#2A2A2A] mx-auto mt-[24px] mb-20 pb-40 min-h-[80vh]">
            <!-- 1st    lg screen  -->
            <div class="lg:flex gap-[200px] w-[70%] items-center justify-center mx-auto  ">
                <h2 class="text-[32px] font-[500]">Blogs</h2>
                <!-- search box  -->
                <div class="flex p-3 bg-white border border-gray-300 rounded-full justify-between w-full lg:w-[70%] mx-auto">
                    <input id="searchInput" class="bg-white rounded-full w-full px-4 py-2 outline-none"
                        placeholder="Search Blogs" type="text" />
                    <button id="searchButton"
                        class="flex items-center bg-[#EDF6DB] px-4 py-2 lg:px-8 lg:py-3 rounded-full gap-2 lg:gap-5 ml-3">
                        <i class="fa-solid fa-magnifying-glass text-black"></i>
                        <p class="text-[12px] lg:text-[18px] font-medium">Search</p>
                    </button>
                </div>



            </div>

            {{-- <!-- 1st small screen  -->
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
            </div> --}}

            <!-- 2nd -->
            <div class="flex justify-center w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-[24px] mx-auto mt-[36px] ">


                    <!-- Blog Item 1 -->
                    <div class="blog-item w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex flex-col"
                        data-title="5 Phases That Drive Continuous Innovation in a Product">
                        <img class="w-full h-[320px] object-cover" src="{{ asset('blogs/ProductManagement.webp') }}"
                            alt="" />
                        <div class="p-3 flex flex-col h-full">
                            <h2 class="text-[16px] font-[500] mt-[8px]">5 Phases That Drive Continuous Innovation in a
                                Product</h2>
                            <p class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                Learn about the five phases that help businesses to drive continuous product innovation and
                                stay ahead in the market.
                            </p>
                            <a href="{{ url('blog/5-phases-that-drive-continuous-innovation-in-a-product') }}"
                                class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-auto text-[18px] font-[600] sm:text-[16px] md:text-[18px]">
                                Click to read
                            </a>
                        </div>
                    </div>

                    <!-- Blog Item 2 -->
                    <div class="blog-item w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex flex-col"
                        data-title="Successful Adoption of AI">
                        <img class="w-full h-[320px] object-cover" src="{{ asset('blogs/SuccessfulAdoptionofAI.webp') }}"
                            alt="" />
                        <div class="p-3 flex flex-col h-full">
                            <h2 class="text-[16px] font-[500] mt-[8px]">Successful Adoption of AI</h2>
                            <p class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                Discover how businesses can leverage AI for increased productivity and competitive advantage
                                in the modern world.
                            </p>
                            <a href="{{ url('blog/successful-adoption-of-ai') }}"
                                class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-auto text-[18px] font-[600] sm:text-[16px] md:text-[18px]">
                                Click to read
                            </a>
                        </div>
                    </div>

                    <!-- Blog Item 3 -->
                    <div class="blog-item w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex flex-col"
                        data-title="AI & Analytics Assessment">
                        <img class="w-full h-[320px] object-cover" src="{{ asset('blogs/aianalyticsassessment.webp') }}"
                            alt="" />
                        <div class="p-3 flex flex-col h-full">
                            <h2 class="text-[16px] font-[500] mt-[8px]">AI & Analytics Assessment</h2>
                            <p class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                Explore how understanding AI and analytics assessments can optimize business functions and
                                customer behaviors.
                            </p>
                            <a href="{{ url('blog/ai-analytics-assessment') }}"
                                class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-auto text-[18px] font-[600] sm:text-[16px] md:text-[18px]">
                                Click to read
                            </a>
                        </div>
                    </div>

                    <!-- Blog Item 4 -->
                    <div class="blog-item w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex flex-col"
                        data-title="AI & Analytics Roadmap and Strategy">
                        <img class="w-full h-[320px] object-cover" src="{{ asset('blogs/AI&Analytics.webp') }}"
                            alt="" />
                        <div class="p-3 flex flex-col h-full">
                            <h2 class="text-[16px] font-[500] mt-[8px]">AI & Analytics Roadmap and Strategy</h2>
                            <p class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                The readiness assessment report for AI & Analytics aims to pinpoint any gaps in the adoption
                                of AI across various business domains.
                            </p>
                            <a href="{{ url('blog/ai-analytics-roadmap-and-strategy') }}"
                                class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-auto text-[18px] font-[600] sm:text-[16px] md:text-[18px]">
                                Click to read
                            </a>
                        </div>
                    </div>

                    <!-- Blog Item 5 -->
                    <div class="blog-item w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex flex-col"
                        data-title="Role of Digital Marketing">
                        <img class="w-full h-[320px] object-cover" src="{{ asset('blogs/roleofdigitalmarketing.webp') }}"
                            alt="" />
                        <div class="p-3 flex flex-col h-full">
                            <h2 class="text-[16px] font-[500] mt-[8px]">Role of Digital Marketing</h2>
                            <p class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                Learn why digital marketing is essential for the success of modern businesses and how it
                                engages today's consumers.
                            </p>
                            <a href="{{ url('blog/role-of-digital-marketing') }}"
                                class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-auto text-[18px] font-[600] sm:text-[16px] md:text-[18px]">
                                Click to read
                            </a>
                        </div>
                    </div>

                    <!-- Blog Item 6 -->
                    <div class="blog-item w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex flex-col"
                        data-title="Key Challenges in Building and Deploying ML Models">
                        <img class="w-full h-[320px] object-cover" src="{{ asset('blogs/MLmodels.webp') }}"
                            alt="" />
                        <div class="p-3 flex flex-col h-full">
                            <h2 class="text-[16px] font-[500] mt-[8px]">Key Challenges in Building and Deploying ML Models
                            </h2>
                            <p class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                Uncover the challenges organizations face when building and deploying Machine Learning
                                models to solve real-world problems.
                            </p>
                            <a href="{{ url('blog/key-challenges-in-building-and-deploying-ml-models') }}"
                                class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-auto text-[18px] font-[600] sm:text-[16px] md:text-[18px]">
                                Click to read
                            </a>
                        </div>
                    </div>

                    <!-- Blog Item 7 -->
                    <div class="blog-item w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex flex-col"
                        data-title="Maha Shivratri and International Women's Day on the same day">
                        <img class="w-full h-[320px] object-cover" src="{{ asset('blogs/MahaShivratriday.webp') }}"
                            alt="" />
                        <div class="p-3 flex flex-col h-full">
                            <h2 class="text-[16px] font-[500] mt-[8px]">Maha Shivratri and International Women's Day on the
                                same day</h2>
                            <p class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                Maha Shivratri and International Women's Day on the same day carries profound meaning. Maha
                                Shivratri signifies the union of Shiva with Shakti, symbolizing the balance and harmony
                                between masculine and feminine energies...
                            </p>
                            <a href="{{ url('blog/maha-shivratri-and-international-womens-day-on-the-same-day') }}"
                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-auto text-[18px] font-[600] 
                            sm:text-[12px] md:text-[14px] lg:text-[16px]">
                                Click to read
                            </a>
                        </div>
                    </div>



                    <div id="noResultsMessage" class="hidden text-center text-[18px] text-gray-500 mt-10">
                        No blogs match your search criteria.
                    </div>

                </div>
            </div>

            <!-- bottom menu bar -->
            @include('web.components.sidebar')
            <!-- bottom menu bar -->
            @include('web.components.bottommenu')
            <!-- side bar -->


        </div>
    </div>
    <hr class="mb-[400px] block md:hidden">


    @include('web.components.footer')

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const searchButton = document.getElementById("searchButton");
            const blogItems = document.querySelectorAll(".blog-item");
            const noResultsMessage = document.getElementById("noResultsMessage");

            function performSearch(query) {
                let hasResults = false;

                // If the query is empty, show all blog items
                if (query.trim() === "") {
                    blogItems.forEach((item) => {
                        item.style.display = "flex";
                    });
                    noResultsMessage.classList.add("hidden"); // Hide "no results" message
                    return;
                }

                // Filter items based on query
                blogItems.forEach((item) => {
                    const title = item.getAttribute("data-title").toLowerCase();
                    if (title.includes(query)) {
                        item.style.display = "flex";
                        hasResults = true;
                    } else {
                        item.style.display = "none";
                    }
                });

                // Show the "no results" message if no items are displayed
                noResultsMessage.classList.toggle("hidden", hasResults);
            }

            // Trigger search only when clicking the search button
            searchButton.addEventListener("click", function() {
                const query = searchInput.value.toLowerCase();
                performSearch(query);
            });

            // Show all items again if the search bar is cleared
            searchInput.addEventListener("input", function() {
                if (searchInput.value.trim() === "") {
                    performSearch(""); // Show all items
                }
            });
        });
    </script>
@endsection
