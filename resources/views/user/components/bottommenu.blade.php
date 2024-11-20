{{-- <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
    <div class="h-full w-[85%] mx-auto flex justify-between items-center">
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="../Home.html">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/activeHome.png"
                    alt="">
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555]">Home</p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="./consultadvisor.html">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/constultadvisor.png"
                    alt="">
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Consult Advisor</p>
        </div>
        <div></div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="./advisorbooking.html">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/booking.png"
                    alt="">
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Booking</p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="./userProfile.html">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/profile.png"
                    alt="">
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">My Profile</p>
        </div>
    </div>

    <div
        class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
        <a href="./featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/advisor.png"
                alt="">
            <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">Featured Advisor</p>
        </a>
    </div>

</div> --}}
<div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
    <div class="h-full w-[85%] mx-auto flex justify-between items-center">
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('home') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                    src="{{ Request::is('/') ? asset('src/assets/bottomNavbar/activeHome.png') : asset('src/assets/bottomNavbar/home.png') }}"
                    alt="Home" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('/') ? '' : 'hidden' }}">
                Home
            </p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{ route('about-us') }}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
                    src="{{ Request::is('about-us') ? asset('src/assets/bottomNavbar/activeabout.png') : asset('src/assets/bottomNavbar/about.png') }}"
                    alt="About" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('about-us') ? '' : 'hidden' }}">
                About
            </p>
        </div>
        <div></div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="{{route('blog')}}">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('blog') ? asset('src/assets/bottomNavbar/activeblog.png') : asset('src/assets/bottomNavbar/blog.png') }}"
                    alt="Blogs" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] {{ Request::is('blog') ? '' : 'hidden' }}">
                Blogs
            </p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
            <a href="javascript:void(0);" onclick="redirectToProfile()">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/profile.png"
                    alt="" />
            </a>
            <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">
                My Profile
            </p>
        </div>
    </div>

    <div
        class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
        <a href="{{ route('consult-advisor') }}" class="flex flex-col items-center justify-center gap-1">
            <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="{{ Request::is('consult-advisor') ? asset('src/assets/bottomNavbar/activeAdvisor.png') : asset('src/assets/bottomNavbar/advisor.png') }}"
                    alt="Consult Advisor" />
            <p class="font-semibold text-xs sm:text-sm text-[#DA9000] text-center {{ Request::is('consult-advisor') ? '' : 'hidden' }}">
                Consult Advisor
            </p>
        </a>
    </div>
</div>
<script>
    function redirectToProfile() {
        @if(auth()->check())
            // User is logged in
            @if(auth()->user()->usertype == 0)
                window.location.href = "{{ route('user.myprofile') }}";
            @elseif(auth()->user()->usertype == 2)
                window.location.href = "{{ route('advisor.myprofile') }}";
            @endif
        @else
            // User is not logged in, redirect to login page
            window.location.href = "{{ route('login') }}";
        @endif
    }
</script>

