<div class="bg-[#FEFFF6] hidden w-full mt-[1.5rem] lg:mt-[2.5rem] md:flex items-center justify-between">
    <!-- Dashboard -->
    <div id="dashboard-link"
        class="py-2 px-6 lg:px-10 flex items-center justify-center gap-1 md:gap-2 rounded-lg cursor-pointer {{ request()->routeIs('user.dashboard') ? 'bg-[#6A9023]' : 'bg-transparent' }}">
        <a href="{{ route('user.dashboard') }}" id="dashboard-anchor">
            <p
                class="text-base lg:text-xl {{ request()->routeIs('user.dashboard') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
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
            <p
                class="text-base lg:text-xl {{ request()->routeIs('user.mywallet') ? 'text-[#FFFFFF]' : 'text-[#828282]' }}">
                My
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
@if (Auth::check())
    @php
        $uniqueId = Auth::user()->unique_id;
        $userType = Auth::user()->usertype;

        // Fetch the corresponding UserProfile model using the unique_id
        $userProfile = \App\Models\UserProfiles::where('user_id', $uniqueId)->first();

        // Check if the profile completion percentage exists and is less than 100
        $profileCompletion = $userProfile ? $userProfile->profile_completion_percentage : 0;

        // Determine the dashboard route based on user type and profile completion status
        if ($profileCompletion < 100) {
            $dashboardRoute = 'user.myprofile'; // Redirect to profile if not complete
        } else {
            // Set dashboard route based on user type
            if ($userType == 1) {
                $dashboardRoute = 'advisatoradmin.dashboard';
            } elseif ($userType == 2) {
                $dashboardRoute = 'advisor.dashboard';
            } else {
                $dashboardRoute = 'user.dashboard'; // Default for usertype 0
            }
        }
    @endphp
    @if ($userType == 0 && $profileCompletion < 100)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById('dashboard-link').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent navigation
                console.log('Dashboard clicked. Profile incomplete, showing SweetAlert.');

                Swal.fire({
                    icon: 'info',
                    title: 'Complete Your Profile',
                    text: 'Your profile is incomplete. Please complete your profile before proceeding.',
                    showCancelButton: true,
                    confirmButtonText: 'Go to My Profile',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    confirmButtonColor: '#6A9023',
                    cancelButtonColor: '#FF5555'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to profile page
                        console.log('Redirecting to profile...');
                        window.location.href = "{{ route('user.myprofile') }}";
                    } else {
                        console.log('User cancelled. Staying on the same page.');
                    }
                });
            });
        </script>
    @else
        <script>
            document.getElementById('dashboard-link').addEventListener('click', function(event) {
                console.log('Dashboard clicked. Profile complete, redirecting to dashboard.');
                window.location.href = "{{ route('user.dashboard') }}"; // Proceed normally if profile is complete
            });
        </script>
    @endif
@endif


