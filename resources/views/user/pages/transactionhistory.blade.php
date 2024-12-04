@extends('user.layouts.app')

@section('usercontent')
    <div class="relative w-full h-full min-h-screen overflow-hidden">
        <!-- header -->
        @include('user.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            @include('user.components.dashmenu')

            <!-- Search bar -->
            <form action="{{ route('user.transactionhistory') }}" method="GET">
                <div class="flex justify-between items-center gap-2 mt-[2rem]">
                    <h2 class="text-base lg:text-lg text-[#2A2A2A] font-medium hidden md:block">All Transaction History</h2>

                    <div class="lg:w-[60%]">
                        <div
                            class="max-w-[40rem] mx-auto border border-[#DADADA] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex justify-between items-center gap-x-2 font-Roboto font-normal text-sm lg:text-base text-[#2A2A2A]">
                            <input
                                class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                                type="text" name="search" value="{{ $searchTerm }}" placeholder="Search Transaction">

                            <div
                                class="px-[1rem] py-1 md:py-2 md:px-[2rem] flex items-center gap-x-2 rounded-[2rem] bg-[#EDF6DB] shadow-md">
                                <svg class="w-5 h-5 text-[#000000]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <button
                                    class="font-Roboto text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A]">Find
                                    Advisor</button>
                            </div>
                        </div>
                    </div>

                    <!-- Date filter dropdown -->
                    <div class="hidden md:block w-fit font-medium rounded-lg bg-[#FFE2E2] shadow-md p-2">
                        <select id="underline_select" name="date_filter"
                            class="outline-none bg-transparent w-full lg:pr-[1rem] text-[#3A3A3A]">
                            <option value="all" {{ $dateFilter == 'all' ? 'selected' : '' }}>All</option>
                            <option value="1" {{ $dateFilter == '1' ? 'selected' : '' }}>Before 1 month</option>
                            <option value="6" {{ $dateFilter == '6' ? 'selected' : '' }}>Before 6 months</option>
                            <option value="12" {{ $dateFilter == '12' ? 'selected' : '' }}>Before 1 year</option>
                        </select>
                    </div>

                    <img class="w-8 h-8 cursor-pointer md:hidden" src="../src/assets/icons/Book Appointment.png"
                        alt="book appointment">
                </div>
            </form>

            <!-- Table -->
            <div class="w-[98%] sm:w-[90%] mx-auto mt-8 bg-[#FAFAFA] p-4 shadow-sm mb-[5rem] md:mb-[1rem]">
                <table class="w-full border-separate table-auto border-spacing-y-3">
                    <thead class="text-sm font-medium text-gray-800 bg-gray-100 md:text-base">
                        <tr>
                            <th class="hidden px-2 py-3 text-left md:block">Sr. No.</th>
                            <th class="px-2 py-3 text-left">Date</th>
                            <th class="hidden px-2 py-3 text-left md:block">Time</th>
                            <th class="px-2 py-3 text-left">Status</th>
                            <th class="px-2 py-3 text-left">Method</th>
                            <th class="px-2 py-3 text-left">Amount</th>
                            <th class="px-2 py-3 text-left">Wallet Balance</th>
                            <th class="px-2 py-3 text-left">Invoice</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm md:text-base">
                        @if ($transactions->isEmpty())
                            <tr>
                                <td colspan="8" class="py-4 text-center text-gray-500">
                                    No transactions available.
                                </td>
                            </tr>
                        @else
                            @foreach ($transactions as $transaction)
                                <tr class="bg-white hover:bg-gray-50">
                                    <td class="hidden px-2 py-3 md:block">{{ $loop->iteration }}</td>
                                    <td class="px-2 py-3">{{ $transaction->created_at->format('d/m/Y') }}</td>
                                    <td class="hidden px-2 py-3 md:block">{{ $transaction->created_at->format('h:i A') }}</td>
                                    <td class="px-2 py-3">{{ $transaction->status }}</td>
                                    <td class="px-2 py-3">{{ $transaction->method }}</td>
                                    <td class="px-2 py-3 {{ $transaction->method == 'booking refund' ? 'text-green-500' : 'text-red-500' }}">
                                        ₹{{ number_format($transaction->amount, 2) }}
                                    </td>
                                    <td class="px-2 py-3">₹{{ number_format($transaction->total_wallet_balance, 2) }}</td>
                                    <td class="hidden px-2 py-3 text-green-600 underline cursor-pointer md:block">
                                        Generate Invoice
                                    </td>
                                    <td class="block px-2 py-3 text-green-600 underline cursor-pointer md:hidden">
                                        Download
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            
                <!-- Pagination -->
                <div class="mt-4">
                    {{ $transactions->links() }} <!-- Laravel pagination links -->
                </div>
            </div>
        </div>            
            

        

        {{-- <!-- side bar -->
        <div
            class="absolute top-0 bottom-0 z-20 flex justify-end w-full h-full min-h-screen transition-all sidebar md:hidden left-full">
            <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
                <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
                    <div class="flex items-center justify-between">
                        <a href="../Client pages/userProfile.html">
                            <div class="flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                                <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                    src="../src/assets/img/profileImage.png" alt="" />
                                <div>
                                    <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">
                                        Radhika Sharma
                                    </h2>
                                    <h3 class="text-xs sm:text-sm text-[#828282] font-medium">
                                        radhikasharma@abc.com
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div>
                            <img id="hideSideMenu" class="cursor-pointer w-7 sm:w-8" src="../src/assets/img/cross.png"
                                alt="" />
                        </div>
                    </div>

                    <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                        <a href="../auth/advisornominationform.html">
                            <div class="ml-[2rem] flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/phone.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                    Become an Advisor
                                </h2>
                            </div>
                        </a>
                    </div>

                    <div class="px-[2rem] py-2 flex flex-col gap-6">
                        <a href="../Client pages/consultadvisor.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/img/Consult Advisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Consult Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/featuredadvisor.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/img/FeaturedAdvisor.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Featured Advisor
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/advisorbooking.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/img/MyBookings.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    My Bookings
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/mywallet.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Wallet.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Wallet
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/blog.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Blogs.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Blogs
                                </h2>
                            </div>
                        </a>
                        <a href="../Client pages/aboutus.html">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Aboutus.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    About us
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                    src="../src/assets/img/Customersupport.png" alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Customer support
                                </h2>
                            </div>
                        </a>
                        <a href="">
                            <div class="flex items-center gap-4">
                                <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Logout.png"
                                    alt="" />
                                <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                    Logout
                                </h2>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="px-[2rem] py-2">
                    <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">
                        Find us on:
                    </h3>
                    <div class="flex gap-5">
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/instagram.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/facebook.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/linkedin.png" alt="" />
                        <img class="w-[30px] h-[30px]" src="../src/assets/img/youtube.png" alt="" />
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- <!-- bottom menu bar -->
        <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
            <div class="h-full w-[85%] mx-auto flex justify-between items-center">
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="../Home.html">
                        <img class="cursor-pointer w-7 h-7 sm:h-8 sm:w-8" src="../src/assets/bottomNavbar/activeHome.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Home</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./consultadvisor.html">
                        <img class="cursor-pointer w-7 h-7 sm:h-8 sm:w-8"
                            src="../src/assets/bottomNavbar/constultadvisor.png" alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Consult Advisor</p>
                </div>
                <div></div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./advisorbooking.html">
                        <img class="cursor-pointer w-7 h-7 sm:h-8 sm:w-8" src="../src/assets/bottomNavbar/booking.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Booking</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-1">
                    <a href="./userProfile.html">
                        <img class="cursor-pointer w-7 h-7 sm:h-8 sm:w-8" src="../src/assets/bottomNavbar/profile.png"
                            alt="">
                    </a>
                    <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">My Profile</p>
                </div>
            </div>

            <div
                class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
                <a href="./featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
                    <img class="cursor-pointer w-7 h-7 sm:h-8 sm:w-8" src="../src/assets/bottomNavbar/advisor.png"
                        alt="">
                    <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">Featured Advisor</p>
                </a>
            </div>

        </div> --}}

        @include('user.components.sidebar')
        @include('user.components.bottommenu')
    </div>

    <footer class="hidden md:block bg-[#FFFFFF] shadow-2xl border border-transparent mt-[2rem]">
        <div class="border border-[#EAEAEA] mb-4 w-full"></div>
        <div class="md:w-[95%] lg:w-[90%] mx-auto my-[2rem]">
            <div class="flex items-center justify-between w-full">
                <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                    © 2024 Advisator. All rights reserved.
                </h3>
                <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                    info@advisator.in
                </h3>
            </div>
        </div>
    </footer>
    
    @if($transactions->isEmpty() && request('search'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "No Transactions Found",
            text: "No transactions match your search. Would you like to add funds to your wallet?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Add Funds",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('user.mywallet.recharge') }}";
            }
        });
    </script>
@endif


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
