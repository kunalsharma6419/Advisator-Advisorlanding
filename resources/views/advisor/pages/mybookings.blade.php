@extends('advisor.layouts.app')

@section('advisorcontent')
    <div class="relative w-full h-full min-h-screen overflow-hidden">
        <!-- header -->
        @include('advisor.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">


            <!-- page name -->
            @include('advisor.components.dashmenu')


            <!-- serarch bar -->
            <div class="flex justify-between items-center gap-2 mt-[2rem]">
                <h2 class= "text-base lg:text-lg text-[#2A2A2A] font-medium hidden md:block">Bookings</h2>



                <div class="lg:w-[60%]">
                    <form method="GET" action="{{ route('advisor.mybookings') }}">
                        <div
                            class="max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A]">
                            
                            <!-- Search Input -->
                            <div>
                                <input
                                    class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                                    type="text" name="search" value="{{ request('search') }}" placeholder="Search Bookings">
                            </div>
                
                            <!-- Search Button -->
                            <div
                                class="px-[1rem] py-1 md:py-2 md:px-[2rem] flex items-center gap-x-2 rounded-[2rem] bg-[#EDF6DB] shadow-md">
                                <svg class="w-5 h-5 text-[#000000]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <button type="submit"
                                    class="font-Roboto text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A]">Search</button>
                            </div>
                        </div>
                    </form>
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
        <div class="w-[90%] mx-auto mt-[2rem] bg-[#FAFAFA] p-1 shadow-sm mb-[7rem] md:mb-[1rem]">

    <!-- Table for tablet and desktop screen -->
    <div class="hidden md:block">
        <table class="table-fixed w-full border-separate text-[#2A2A2A] border-spacing-y-3">
            <thead class="text-[#2A2A2A] font-medium text-base lg:text-lg">
                <tr>
                    <th class="hidden text-left align-top md:block">Booking Id</th>
                    <th class="text-left align-top">Date</th>
                    <th class="text-left align-top">Client</th>
                    <th class="text-left align-top">Medium</th>
                    <th class="text-left align-top">Status</th>
                    <th class="text-left align-top">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm lg:text-base border-spacing-y-10">
                @if($bookings && $bookings->count() > 0)
                    @foreach($bookings as $index => $booking)
                        <tr>

                            <td class="hidden md:block">{{ $booking->booking_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}</td>
                            <td>{{ $booking->userProfile->full_name ?? 'N/A' }}</td>
                            <td>{{ $booking->booking_medium }}</td>
                            <td
                            class="
@if ($booking->booking_status == 'Upcoming')  text-blue-800
@elseif($booking->booking_status == 'Completed')  text-green-800
@elseif($booking->booking_status == 'Pending') text-yellow-800
@elseif($booking->booking_status == 'Rejected') text-red-800 @endif
">
                            {{ $booking->booking_status }}
                        </td>
                        <td class="flex gap-2">
                            @if ($booking->booking_status !== 'Rejected')
                                <form action="{{ route('advisor.booking.updateStatus', $booking->booking_id) }}" method="POST" id="bookingForm-{{ $booking->booking_id }}">
                                    @csrf
                                    @method('PATCH')
                        
                                    <!-- If booking status is Pending, show Accept and Reject buttons -->
                                    @if ($booking->booking_status === 'Pending')
                                        <button type="button" class="px-2 py-1 text-white bg-green-500 rounded" onclick="confirmAction('Accept', '{{ $booking->booking_id }}')">Accept</button>
                                        <button type="button" class="px-2 py-1 text-white bg-red-500 rounded" onclick="confirmAction('Reject', '{{ $booking->booking_id }}')">Reject</button>
                                    @endif
                        
                                    <!-- If booking status is Upcoming, show Consult Call and Reject buttons -->
                                    @if ($booking->booking_status === 'Upcoming')
                                        <button type="button" class="px-2 py-1 text-white bg-blue-500 rounded">Consult Call</button>
                                        <button type="button" class="px-2 py-1 text-white bg-red-500 rounded" onclick="confirmAction('Reject', '{{ $booking->booking_id }}')">Reject</button>
                                    @endif
                                </form>
                            @endif
                        </td>
                        
                        
                        
                        
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="py-4 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-32 h-32 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M15 12H9" />
                                    <path d="M12 9v6" />
                                </svg>
                                <p class="text-[#2A2A2A] text-lg font-semibold">No data to display</p>
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        
      
        
        
    </div>

    <!-- For mobile screen -->
    <div class="md:hidden">
        <div class="flex items-center justify-around font-medium font-sm sm:font-base">
            <h2 id="myBooking" class="booking activebooking">My Booking</h2>
            <h2 id="bookingHistory" class="booking">Booking History</h2>
        </div>

        <div class='w-full mt-[1rem]'>
            <!-- Upcoming Bookings -->
            <div id="myBookingTable" class="flex flex-col gap-2">
                @if($bookings && $bookings->count() > 0)
                    @foreach($bookings as $booking)
                        <div class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 grid grid-cols-2 gap-y-2 justify-items-start">
                            <div class="flex flex-col text-xs font-medium w-fit sm:text-sm">
                                <p class="text-[#828282]">Client Name:</p>
                                <p class="text-[#2A2A2A]">{{ $booking->client_name }}</p>
                            </div>
                            <div class="flex flex-col text-xs font-medium w-fit sm:text-sm">
                                <p class="text-[#828282]">Date:</p>
                                {{-- <p class="text-[#2A2A2A]">{{ $booking->date->format('d/m/Y') }}</p> --}}
                            </div>
                            <div class="flex flex-col text-xs font-medium w-fit sm:text-sm">
                                <p class="text-[#828282]">Time:</p>
                                <p class="text-[#2A2A2A]">{{ $booking->time }}</p>
                            </div>
                            <div class="flex flex-col text-xs font-medium w-fit sm:text-sm">
                                <p class="text-[#828282]">Medium:</p>
                                <p class="text-[#2A2A2A]">{{ $booking->medium }}</p>
                            </div>
                            <div class="flex flex-col text-xs font-medium w-fit sm:text-sm">
                                <p class="text-[#828282]">Status:</p>
                                <p>Status: {{ $booking->status_label }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-[#FFFFFF] rounded-xl shadow-md p-4 sm:p-6 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <!-- SVG Illustration -->
                            <svg class="w-24 h-24 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M15 12H9" />
                                <path d="M12 9v6" />
                            </svg>
                            <!-- Message -->
                            <p class="text-[#2A2A2A] text-base font-semibold">No data to display</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Booking History Section (if applicable) -->
            <div id="bookingHistoryTable" class="flex flex-col hidden gap-2">
                <!-- Add similar code for booking history if you have it available -->
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


    
    @if($bookings->isEmpty() && request('search'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "No Bookings Found",
            text: "You currently have no bookings assigned.",
            icon: "info",
            confirmButtonText: "Okay",
        });
    </script>
@endif

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>
<script>
    function confirmAction(action, bookingId) {
        let actionText = action === 'Accept' ? 'Accept' : 'Reject';
        let confirmButtonText = action === 'Accept' ? 'Yes, Accept it!' : 'Yes, Reject it!';

        Swal.fire({
            title: `Are you sure you want to ${actionText} this booking?`,
            text: `This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Find the form and submit it after confirmation
                let bookingForm = document.getElementById(`bookingForm-${bookingId}`);
                if (bookingForm) {
                    // Add a hidden input to specify action ('accept' or 'reject')
                    let actionInput = document.createElement('input');
                    actionInput.type = 'hidden';
                    actionInput.name = action.toLowerCase(); // 'accept' or 'reject'
                    actionInput.value = true;
                    bookingForm.appendChild(actionInput);
                    bookingForm.submit();
                } else {
                    console.error(`Form with ID bookingForm-${bookingId} not found.`);
                }
            }
        });
    }
</script>



@endsection
