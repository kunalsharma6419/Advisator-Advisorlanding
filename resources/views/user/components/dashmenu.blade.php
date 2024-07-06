<div class="bg-[#FEFFF6] hidden w-full mt-[1.5rem] lg:mt-[2.5rem] md:flex items-center justify-between">
    <!-- Dashboard -->
    <div
        class="py-2 px-6 lg:px-10 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer {{ request()->routeIs('user.dashboard') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('user.dashboard') }}">
            <p class="text-base lg:text-xl {{ request()->routeIs('user.dashboard') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                Dashboard</p>
        </a>
    </div>

    <!-- My Profile -->
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer {{ request()->routeIs('user.myprofile') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('user.myprofile') }}">
            <p
                class="text-base lg:text-xl {{ request()->routeIs('user.myprofile') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                My Profile</p>
        </a>
    </div>

    <!-- My Wallet -->
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer {{ request()->routeIs('user.mywallet') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('user.mywallet') }}">
            <p class="text-base lg:text-xl {{ request()->routeIs('user.mywallet') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">My
                Wallet</p>
        </a>
    </div>

    <!-- My Bookings -->
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer {{ request()->routeIs('user.mybookings') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('user.mybookings') }}">
            <p
                class="text-base lg:text-xl {{ request()->routeIs('user.mybookings') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                My Bookings</p>
        </a>
    </div>

    <!-- Transaction History -->
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer {{ request()->routeIs('user.transactionhistory') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('user.transactionhistory') }}">
            <p
                class="text-base lg:text-xl {{ request()->routeIs('user.transactionhistory') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                Transaction History</p>
        </a>
    </div>
</div>

{{-- <div class="bg-[#FEFFF6] hidden w-full mt-[1.5rem] lg:mt-[2.5rem] md:flex items-center justify-between">
    <div
        class="py-2 px-6 lg:px-10 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-[#6A9023] cursor-pointer">
        <a href="./analytics.html">
            <p class="text-base lg:text-xl text-[#FFFFFF]">Dashboard</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="./userProfile.html">
            <p class="text-base lg:text-xl text-[#828282]">My Profile</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="./wallet.html">
            <p class="text-base lg:text-xl text-[#828282]">My Wallet</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="./advisorbooking.html">
            <p class="text-base lg:text-xl text-[#828282]">My Bookings</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="./usertransactionhistory.html">
            <p class="text-base lg:text-xl text-[#828282]">
                Transaction history
            </p>
        </a>
    </div>
</div> --}}
