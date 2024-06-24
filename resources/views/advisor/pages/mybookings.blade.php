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
                        <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                            src="../src/assets/bottomNavbar/activeBooking.png" alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Bookings</p>
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
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/earning.png"
                        alt="">
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">My Earnings</p>
                </a>
            </div>

        </div>


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
