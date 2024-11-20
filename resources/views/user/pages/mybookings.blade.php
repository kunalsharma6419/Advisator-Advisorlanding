@extends('user.layouts.app')

@section('usercontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('user.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">


            <!-- page name -->
            @include('user.components.dashmenu')

            <!-- serarch bar -->
            {{-- <div class="flex justify-between items-center gap-2 mt-[2rem]">
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

            </div> --}}
            <form method="GET" action="{{ route('user.mybookings') }}"
                class="flex justify-between items-center gap-2 mt-[2rem]">
                <h2 class="text-base lg:text-lg text-[#2A2A2A] font-medium hidden md:block">Bookings</h2>

                <div class="lg:w-[60%]">
                    <div
                        class="max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A]">
                        <input
                            class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                            type="text" name="search" placeholder="Search Bookings" value="{{ request('search') }}">

                        <button type="submit"
                            class="px-[1rem] py-1 md:py-2 md:px-[2rem] flex items-center gap-x-2 rounded-[2rem] bg-[#EDF6DB] shadow-md font-Roboto text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A]">
                            Search
                        </button>
                    </div>
                </div>

                <div class="hidden md:block w-fit font-medium rounded-lg bg-[#FFE2E2] shadow-md p-2">
                    <select name="date_filter" id="date_filter"
                        class="outline-none bg-transparent w-full lg:pr-[1rem] text-[#3A3A3A]">
                        <option value="" {{ request('date_filter') == '' ? 'selected' : '' }}>All</option>
                        <option value="1_month" {{ request('date_filter') == '1_month' ? 'selected' : '' }}>Before 1 month
                        </option>
                        <option value="6_months" {{ request('date_filter') == '6_months' ? 'selected' : '' }}>Before 6
                            months</option>
                        <option value="1_year" {{ request('date_filter') == '1_year' ? 'selected' : '' }}>Before 1 year
                        </option>
                    </select>
                </div>
            </form>


        </div>
<!-- Table Section -->
<div class="w-[90%] mx-auto mt-[2rem] bg-[#FAFAFA] p-1 shadow-sm mb-[7rem] md:mb-[1rem]">

    <!-- Table for Tablet and Desktop Screens -->
    <div class="hidden md:block">
        <table class="table-fixed w-full border-separate border-spacing-y-3">
            <thead class="text-[#2A2A2A] font-medium text-base lg:text-lg">
                <tr>
                    <th class="text-left align-top">Booking ID</th>
                    <th class="text-left align-top">Booking Date</th>
                    <th class="text-left align-top">Day</th>
                    <th class="text-left align-top">Time Slot</th>
                    <th class="text-left align-top">Advisor</th>
                    <th class="text-left align-top">Medium</th>
                    <th class="text-left align-top">Status</th>
                    <th class="text-left align-top">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm lg:text-base">
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->booking_date->format('d/m/Y') }}</td>
                        <td>{{ $booking->day }}</td>
                        <td>{{ $booking->time_slot }}</td>
                        <td>{{ $booking->advisorNomination->full_name ?? 'N/A' }}</td>
                        <td>{{ $booking->booking_medium }}</td>
                        <td class=" 
                            @if ($booking->booking_status == 'Upcoming') text-blue-800
                            @elseif($booking->booking_status == 'Completed') text-green-800
                            @elseif($booking->booking_status == 'Pending') text-yellow-800
                            @elseif($booking->booking_status == 'Rejected') text-red-800 @endif
                        ">
                            {{ $booking->booking_status }}
                        </td>
                        <td>
                            @if ($booking->booking_status !== 'Rejected')
                                <button onclick="confirmCancel(this)" data-id="{{ $booking->booking_id }}"
                                        class="bg-red-500 text-white rounded px-3 py-1">Cancel Appointment</button>
                                <button class="bg-blue-500 text-white rounded px-3 py-1">Consultation Call</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $bookings->links() }}
        </div>
    </div>

    <!-- For Mobile Screens -->
    <div class="md:hidden">
        <div class="flex items-center justify-around font-sm sm:font-base font-medium">
            <h2 id="myBooking" class="booking activebooking">My Booking</h2>
            <h2 id="bookingHistory" class="booking">Booking History</h2>
        </div>

        <div class="w-full mt-[1rem]">
            <!-- Upcoming Bookings -->
            <div id="myBookingTable" class="flex flex-col gap-2">
                @forelse($upcomingBookings as $booking)
                    <div class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Booking Id:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->booking_id ?? 'N/A' }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Advisor Name:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->advisorNomination->full_name ?? 'N/A' }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Date:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->booking_date->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Time:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->time_slot }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Medium:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->booking_medium }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Status:</p>
                            <p class="@if ($booking->booking_status == 'Upcoming') text-blue-800
                                @elseif($booking->booking_status == 'Completed') text-green-800
                                @elseif($booking->booking_status == 'Pending') text-yellow-800
                                @elseif($booking->booking_status == 'Rejected') text-red-800 @endif">
                                {{ $booking->booking_status }}
                            </p>
                        </div>

                        @if ($booking->booking_status !== 'Rejected')
                            <div class="flex flex-col space-x-2 font-medium text-xs sm:text-sm" style="align-items: center;">
                                <button class="bg-blue-500 text-white rounded px-3 py-1">Consultation Call</button>
                            </div>
                            <div class="flex flex-col space-x-2 font-medium text-xs sm:text-sm" style="align-items: center;">
                                <button onclick="confirmCancel(this)" data-id="{{ $booking->booking_id }}"
                                        class="bg-red-500 text-white rounded px-3 py-1">Cancel Appointment</button>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6">
                        <p class="text-center">No upcoming bookings available.</p>
                    </div>
                @endforelse

                <!-- Pagination for Upcoming Bookings -->
                <div class="mt-4">
                    {{ $upcomingBookings->links() }}
                </div>
            </div>

            <!-- Booking History -->
            <div id="bookingHistoryTable" class="hidden flex flex-col gap-2">
                @forelse($bookingHistory as $booking)
                    <div class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-3 gap-y-2 justify-items-center">
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Booking Id:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->booking_id ?? 'N/A' }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Advisor Name:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->advisorNomination->full_name ?? 'N/A' }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Date:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->booking_date->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Time:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->time_slot }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Medium:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->booking_medium }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Duration:</p>
                            <p class="text-[#2A2A2A]">{{ $booking->duration ?? 'N/A' }}</p>
                        </div>
                        <div class="flex flex-col w-fit font-medium text-xs sm:text-sm">
                            <p class="text-[#828282]">Status:</p>
                            <p class="@if ($booking->booking_status == 'Upcoming') text-blue-800
                                @elseif($booking->booking_status == 'Completed') text-green-800
                                @elseif($booking->booking_status == 'Pending') text-yellow-800
                                @elseif($booking->booking_status == 'Rejected') text-red-800 @endif">
                                {{ $booking->booking_status }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6">
                        <p class="text-center">No booking history available.</p>
                    </div>
                @endforelse

                <!-- Pagination for Booking History -->
                <div class="mt-4">
                    {{ $bookingHistory->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
        <hr class="mb-[400px] block md:hidden">


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
        @include('user.components.sidebar')



        <!-- bottom menu bar -->
        @include('user.components.bottommenu')


    </div>
    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mt-2">
            {{ session('error') }}
        </div>
    @endif

    <script>
        function confirmCancel(button) {
            // Retrieve the booking ID from the data attribute
            const bookingId = button.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to cancel this appointment? 10% payment paid as advance will be considered as cancellation charges.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Call cancellation route with the booking ID
                    window.location.href = `/user/my-bookings/cancel-appointment/${bookingId}`;
                }
            });
        }
    </script>
@endsection
