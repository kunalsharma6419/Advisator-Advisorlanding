<section
    class="container mx-auto gap-[20px] lg:gap-[50px] flex flex-col items-center px-8 py-4 sm:flex-row-reverse sm:px-12 bg-gradient-to-r from-[#F7FFE9] to-[#fff] bg-center bg-cover rounded pt-[20px]">
    <div class="mb-8 w-[100%] sm:mb-0 sm:w-1/2 sm:pl-4 md:pl-16 mt-8">
        <img alt="Hanging out with friends"
            class="w-full xl:max-w-lg xl:mx-auto 2xl:origin-bottom 2xl:scale-110 rounded h-auto md:h-[490px]"
            src="./src/assets/advisorbanner.jpg" />
    </div>
    <div class="mr-4 w-full font-sans text-center sm:w-1/2 sm:text-left">
        {{-- <h1
            class="content-change text-[#FF3131] text-[40px] font-[700] text-start leading-[1.2] md:leading-[1.2] font-sans w-[100%] sm:w-[120%]">
            Onboard ADVISATOR
            <br />
            
            <span class="text-[#6A9023]"> Earn by consulting clients from various industries!</span>
        </h1> --}}
        <h1
            class="content-change text-[#FF3131] text-[40px] font-[700] text-center md:text-start leading-[1.2] md:leading-[1.2] font-sans w-[100%] sm:w-[120%]">
            Onboard ADVISATOR
            <br />
            {{-- <span class="text-[#6A9023] lowercase">to engage with Clients from diverse industries!</span> --}}
            <span class="text-[#6A9023]"> Earn by consulting clients from various industries!</span>
        </h1>


        <div class="mt-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/4198125.jpg" alt="Diverse Clients" class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        Diversified Clients
                    </h3>
                </div>
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/leads.avif" alt="Prospective leads" class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        Prospective leads
                    </h3>
                </div>
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/professionaldevelopment.jpg" alt="Professional Development"
                        class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        Professional Development
                    </h3>
                </div>
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/financialgrowth.avif" alt="Financial Growth"
                        class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        Financial Growth
                    </h3>
                </div>
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/onboard.png" alt="No Onboarding Charges" class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        Free Onboarding
                    </h3>
                </div>
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/nolegal.jpg" alt="No Legal hassles" class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        No Legal hassles
                    </h3>
                </div>
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/freepromotion.jpg" alt="Free promotions" class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        Free promotions
                    </h3>
                </div>
                <div class="flex flex-col items-center border p-2 rounded-lg shadow bg-[#fff]">
                    <img src="./src/assets/consult.avif" alt="Consult at convenience"
                        class="w-full h-auto rounded-lg" />
                    <h3 class="mt-2 text-lg font-semibold text-center">
                        Consult at convenience
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div
    class="w-full block min-[2000px]:hidden 2xl: items-center max-w-7xl md:px-12 px-8 pb-8 bg-gradient-to-r from-[#F7FFE9] to-[#fff] bg-center bg-cover">
    <div class="relative items-center">
        <div class="w-full justify-between lg:inline-flex lg:items-center">
            <div class="flex flex-col space-y-3 w-full lg:w-[50%] md:flex-row md:space-x-2 md:space-y-0">
                <button
                    class="rounded-lg border-0 bg-[#ff3033] w-full px-8 py-4 text-lg text-white shadow-lg shadow-slate-300 transition hover:bg-[#b99c9c] hover:text-slate-900 dark:shadow-sm sm:py-3"
                    onclick="window.location.href='{{ route('register') }}'">
                    Get Started
                </button>
                <button
                    class="px-8 py-4 text-lg bg-gradient-to-r w-full from-[#6AA300] to-[#3F5713] rounded-lg text-white flex items-center justify-center"
                    onclick="window.location.href='#Contact'">
                    Contact us
                </button>
            </div>

            <div class="max-w-xl mt-[20px] lg:mt-0">
                <div class="flex space-x-2 items-center animate-out zoom-in duration-200 delay-300">
                    <div class="flex lg:block">
                        <div class="font-semibold text-center md:text-left text-[30px]">
                            Trusted by 100+ other Advisors
                        </div>
                        <div class="flex space-x-2 items-center flex-col md:flex-row">
                            <div class="flex -space-x-2 overflow-hidden p-2">
                                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-200 hover:scale-105 tranform duration-100"
                                    src="https://randomuser.me/api/portraits/men/51.jpg" alt="" />
                                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-200 hover:scale-105 tranform duration-100"
                                    src="https://randomuser.me/api/portraits/women/4.jpg" alt="" />
                                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-200 hover:scale-105 tranform duration-100"
                                    src="https://randomuser.me/api/portraits/men/34.jpg" alt="" />
                                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-200 hover:scale-105 tranform duration-100"
                                    src="https://randomuser.me/api/portraits/women/6.jpg" alt="" />
                                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-200 hover:scale-105 tranform duration-100"
                                    src="https://randomuser.me/api/portraits/men/9.jpg" alt="" />
                                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-gray-200 hover:scale-105 tranform duration-100"
                                    src="https://randomuser.me/api/portraits/women/9.jpg" alt="" />
                            </div>
                            <!-- <div>Join 100+ other Advisors</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
