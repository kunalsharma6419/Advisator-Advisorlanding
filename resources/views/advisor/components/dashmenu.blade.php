<div class="bg-[#FEFFF6] hidden w-full mt-[1.5rem] lg:mt-[2.5rem] md:flex items-center justify-between">
    <div
        class="py-2 px-6 lg:px-10 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer
        {{ Request::routeIs('advisor.dashboard') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('advisor.dashboard') }}">
            <p
                class="text-base lg:text-xl {{ Request::routeIs('advisor.dashboard') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                Dashboard</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer
        {{ Request::routeIs('advisor.myprofile') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('advisor.myprofile') }}">
            <p
                class="text-base lg:text-xl {{ Request::routeIs('advisor.myprofile') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                My Profile</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer
        {{ Request::routeIs('advisor.reviewssummary') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('advisor.reviewssummary') }}">
            <p
                class="text-base lg:text-xl {{ Request::routeIs('advisor.reviewssummary') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                Reviews summary</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer
        {{ Request::routeIs('advisor.mybookings') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('advisor.mybookings') }}">
            <p
                class="text-base lg:text-xl {{ Request::routeIs('advisor.mybookings') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                My Bookings</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer
        {{ Request::routeIs('advisor.myearnings') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('advisor.myearnings') }}">
            <p
                class="text-base lg:text-xl {{ Request::routeIs('advisor.myearnings') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                My Earning</p>
        </a>
    </div>
</div>


{{-- <div class="bg-[#FEFFF6] hidden w-full mt-[1.5rem] lg:mt-[2.5rem] md:flex items-center justify-between">
    <div
        class="py-2 px-6 lg:px-10 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-[#6A9023] cursor-pointer">
        <a href="../Advisor pages/advisordashboard.html">
            <p class="text-base lg:text-xl text-[#FFFFFF]">Dashboard</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="../Advisor pages/advisorProfile.html">
            <p class="text-base lg:text-xl text-[#828282]">My Profile</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="../Advisor pages/advisorReview.html">
            <p class="text-base lg:text-xl text-[#828282]">Reviews summary</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="../Advisor pages/advisorbooking.html">
            <p class="text-base lg:text-xl text-[#828282]">My Bookings</p>
        </a>
    </div>
    <div
        class="py-2 px-2 lg:px-4 flex items-center justify-center gap-1 md:gap-2 rounded-lg bg-transparent cursor-pointer">
        <a href="../Advisor pages/advisorMyearning.html">
            <p class="text-base lg:text-xl text-[#828282]">My Earning</p>
        </a>
    </div>
</div> --}}
