@extends('advisor.layouts.app')

@section('advisorcontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('advisor.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">


            <!-- page name -->
            @include('advisor.components.dashmenu')


            <!-- serarch bar -->
            <div class="flex justify-between items-center gap-2 mt-[2rem]">
                <h2 class= "text-base lg:text-lg text-[#2A2A2A] font-medium hidden md:block">Bookings</h2>



                <div class="lg:w-[60%]">
                    <div
                        class="max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex  justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A]">

                        <div>
                            <input
                                class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                                type="text" placeholder="Search Bookings">
                        </div>

                        <div
                            class="px-[1rem] py-1 md:py-2 md:px-[2rem] flex items-center gap-x-2  rounded-[2rem] bg-[#EDF6DB] shadow-md">
                            <svg class="w-5 h-5 text-[#000000]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>

                            <button
                                class="font-Roboto text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A]">Search</button>
                        </div>
                    </div>
                </div>


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


        </div>

        <!-- table  -->
        <div class=" w-[90%] mx-auto mt-[2rem] bg-[#FAFAFA] p-1 shadow-sm mb-[7rem] md:mb-[1rem]">

            <!-- table for tablet and desktop screen -->
            <div class="hidden md:block">
                <table class="table-fixed w-full border-separate text-[Generate invoice] border-spacing-y-3">
                    <thead class="text-[#2A2A2A] font-medium text-base lg:text-lg ">
                        <tr>
                            <th class="hidden md:block text-left align-top">sr.no</th>
                            <th class="text-left align-top">Date</th>
                            <th class="text-left align-top">Client</th>
                            <th class="text-left align-top">Medium</th>
                            <th class="text-left align-top">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm lg:text-base border-spacing-y-10">
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Sarah Jade</td>
                            <td>Discovery call</td>
                            <td>Upcoming</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Anonymous</td>
                            <td>Consultation call</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Sarah Jade</td>
                            <td>Chat</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Sarah Jade</td>
                            <td>Discovery call</td>
                            <td>Upcoming</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Anonymous</td>
                            <td>Consultation call</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Sarah Jade</td>
                            <td>Chat</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Sarah Jade</td>
                            <td>Discovery call</td>
                            <td>Upcoming</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Anonymous</td>
                            <td>Consultation call</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td class="hidden md:block">01</td>
                            <td>15/04/2024</td>
                            <td class="">Sarah Jade</td>
                            <td>Chat</td>
                            <td>Pending</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- for mobile screen -->
            <div class="md:hidden">
                <div class="flex items-center justify-around font-sm sm:font-base font-medium">
                    <h2 id="myBooking" class="booking activebooking">My Booking</h2>
                    <h2 id="bookingHistory" class="booking ">Booking History</h2>
                </div>

                <div class='w-full mt-[1rem]'>
                    <div id="myBookingTable" class="flex flex-col gap-2">
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div></div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>

                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div></div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div></div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div></div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div></div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div></div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>

                    </div>

                    <div id="bookingHistoryTable" class="hidden flex flex-col gap-2">
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Duration:</p>
                                <p class="text-[#2A2A2A]">10m 39s</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Duration:</p>
                                <p class="text-[#2A2A2A]">10m 39s</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Duration:</p>
                                <p class="text-[#2A2A2A]">10m 39s</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Duration:</p>
                                <p class="text-[#2A2A2A]">10m 39s</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Duration:</p>
                                <p class="text-[#2A2A2A]">10m 39s</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>
                        <div
                            class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">Catherine Paize</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                <p class="text-[#2A2A2A]">20/04/2024</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">13:30 pm</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">Discovery call</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Duration:</p>
                                <p class="text-[#2A2A2A]">10m 39s</p>
                            </div>
                            <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p class="text-[#2A2A2A]">Upcoming</p>
                            </div>


                        </div>

                    </div>
                </div>

            </div>


        </div>

        @include('advisor.components.footer')

        <!-- side bar -->
        @include('advisor.components.sidebar')




        <!-- bottom menu bar -->
        @include('advisor.components.bottommenu')


    </div>

    <script>
        const myBooking = document.getElementById('myBooking');
        const bookingHistory = document.getElementById('bookingHistory');

        const myBookingTable = document.getElementById('myBookingTable');
        const bookingHistoryTable = document.getElementById('bookingHistoryTable');

        myBooking.addEventListener('click', () => {
            myBooking.classList.add('activebooking');
            bookingHistory.classList.remove('activebooking')

            myBookingTable.classList.remove('hidden');
            bookingHistoryTable.classList.add('hidden')
        })
        bookingHistory.addEventListener('click', () => {
            myBooking.classList.remove('activebooking');
            bookingHistory.classList.add('activebooking')

            myBookingTable.classList.add('hidden');
            bookingHistoryTable.classList.remove('hidden')
        })
    </script>

    <script>
        // JavaScript to toggle sidebar
        // const toggleBtn = document.querySelector('.toggleBtn');
        const hideSideMenu = document.getElementById('hideSideMenu')
        const showSideMenu = document.getElementById('showSideMenu')


        // console.log(toggleBtn)
        // console.log(hideSideMenu, showSideMenu)
        const sidebar = document.querySelector('.sidebar');

        hideSideMenu.addEventListener('click', () => {
            sidebar.classList.add('left-full');
        })
        showSideMenu.addEventListener('click', () => {
            sidebar.classList.remove('left-full');
        });
    </script>
@endsection
