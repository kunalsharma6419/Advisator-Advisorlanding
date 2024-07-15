{{-- <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
    <div class="h-full w-[85%] mx-auto flex justify-between items-center">
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.dashboard') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/dashboard') ? asset('src/assets/bottomNavbar/activeHome.png') : asset('src/assets/bottomNavbar/home.png') }}" alt="Home" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555]">
                Home
            </p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.mybookings') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/my-bookings') ? asset('src/assets/bottomNavbar/activeBooking.png') : asset('src/assets/bottomNavbar/booking.png') }}" alt="Bookings" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('advisor/my-bookings') ? '' : 'hidden' }}">
                Bookings
            </p>
        </div>
        <div></div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.reviewssummary') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/reviews-summary') ? asset('src/assets/bottomNavbar/activeTransactions.png') : asset('src/assets/bottomNavbar/transactions.png') }}" alt="Transactions" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('advisor/reviews-summary') ? '' : 'hidden' }}">
                My Reviews
            </p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.myprofile') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/my-profile-info') ? asset('src/assets/bottomNavbar/activeProfile.png') : asset('src/assets/bottomNavbar/profile.png') }}" alt="My Profile" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('advisor/my-profile-info') ? '' : 'hidden' }}">
                My Profile
            </p>
        </div>
    </div>

    <div class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
        <a href="{{ route('advisor.myearnings') }}" class="flex flex-col items-center justify-center gap-1">
            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/my-earnings') ? asset('src/assets/bottomNavbar/activeEarnings.png') : asset('src/assets/bottomNavbar/earning.png') }}" alt="My Earnings" />
            <p class="font-semibold text-xs sm:text-sm text-[#DA9000] {{ Request::is('advisor/my-earnings') ? '' : 'hidden' }}">
                My Earnings
            </p>
        </a>
    </div>
</div> --}}
<div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
    <div class="h-full w-[85%] mx-auto flex justify-between items-center">
        <!-- Home -->
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.dashboard') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/dashboard') ? asset('src/assets/bottomNavbar/activeHome.png') : asset('src/assets/bottomNavbar/home.png') }}" alt="Home" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('advisor/dashboard') ? '' : 'hidden' }}">
                Home
            </p>
        </div>
        <!-- Bookings -->
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.mybookings') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/my-bookings') ? asset('src/assets/bottomNavbar/activeBooking.png') : asset('src/assets/bottomNavbar/booking.png') }}" alt="Bookings" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('advisor/my-bookings') ? '' : 'hidden' }}">
                Bookings
            </p>
        </div>
        <div></div>
        <!-- My Reviews -->
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.reviewssummary') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/reviews-summary') ? asset('src/assets/bottomNavbar/activeTransactions.png') : asset('src/assets/bottomNavbar/transactions.png') }}" alt="My Reviews" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('advisor/reviews-summary') ? '' : 'hidden' }}">
                My Reviews
            </p>
        </div>
        <!-- My Profile -->
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('advisor.myprofile') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/my-profile-info') ? asset('src/assets/bottomNavbar/activeProfile.png') : asset('src/assets/bottomNavbar/profile.png') }}" alt="My Profile" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('advisor/my-profile-info') ? '' : 'hidden' }}">
                My Profile
            </p>
        </div>
    </div>

    <div class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
        <a href="{{ route('advisor.myearnings') }}" class="flex flex-col items-center justify-center gap-1">
            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('advisor/my-earnings') ? asset('src/assets/bottomNavbar/activeEarning.png') : asset('src/assets/bottomNavbar/earning.png') }}" alt="My Earnings" />
            <p class="font-semibold text-xs sm:text-sm text-[#DA9000] {{ Request::is('advisor/my-earnings') ? '' : 'hidden' }}">
                My Earnings
            </p>
        </a>
    </div>
</div>

