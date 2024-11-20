{{-- <form method="POST" action="{{ route('register') }}"
    class="mt-[1rem] shadow-md rounded-[1rem] p-4 px-6 hidden md:block font-sans h-full w-[90%] md:w-[95%] lg:w-[90%] mx-auto">
    <div class="w-full gap-x-5 flex justify-normal items-center">
        <div>
            <p class="font-normal text-sm lg:text-base text-[#3A3A3A]">
                Unlock your business potential <br /> with personalized consultation.
            </p>
        </div>

        @csrf
        <div class="border border-[#DADADA] w-[18rem] px-2 xl:px-4 py-2 rounded-[24px] shadow-md">
            <input
                class="font-medium text-sm lg:text-base w-[95%] text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                type="text" placeholder="Full Name" id="full_name" name="full_name" :value="old('full_name')" required
                autofocus autocomplete="full_name" />
        </div>
        <div class="border border-[#DADADA] w-[20rem] px-2 xl:px-4 py-2 rounded-[24px] shadow-md">
            <input id="email"
                class="font-medium text-sm w-[95%] lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                type="email" placeholder="Enter Your Email Address" name="email" :value="old('email')" required
                autocomplete="username" />
        </div>
        <div
            class="border border-[#DADADA] w-[18rem] px-2 xl:px-4 py-2 rounded-[24px] shadow-md flex gap-x-2 font-sans font-normal text-sm lg:text-base text-[#2A2A2A]">
            <div>
                <input id="phone_number"
                    class="font-medium text-sm w-[16rem] lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                    type="text" placeholder="Moblie Number + Countrycode" name="phone_number"
                    :value="old('phone_number')" required autocomplete="phone_number" />
            </div>
        </div>
        <div
            class="px-4 py-2 md:px-[2.5rem] mt-[1rem] ml-auto w-fit rounded-[2rem] bg-gradient-to-r from-[#D1E8A7] to-[#6A9023] shadow-md">
            <button class='font-sans text-nowrap font-semibold text-sm lg:text-base text-[#2A2A2A] cursor-pointer'>Sign
                Up</button>
        </div>
    </div>
</form> --}}
<form method="POST" action="{{ route('register') }}"
    class="mt-[1rem] shadow-md rounded-[1rem] p-4 px-6 hidden md:block font-sans h-full w-[90%] md:w-[95%] lg:w-[90%] mx-auto">

    <!-- Full-width Heading Section -->
    <div class="w-full mb-6">
        <h2 class="font-bold text-2xl lg:text-3xl text-[#6A9023] w-full text-start md:text-center">
            Unlock your business potential with personalized consultation.
        </h2>
    </div>

    @csrf
    <!-- Form Fields Section -->
    <div class="w-full gap-x-4 flex flex-wrap justify-start items-center">
        <div class="border border-[#DADADA] w-full md:w-[18rem] px-2 xl:px-4 py-2 rounded-[24px] shadow-md mb-4 md:mb-0">
            <input
                class="font-medium text-sm lg:text-base w-full text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                type="text" placeholder="Full Name" id="full_name" name="full_name" :value="old('full_name')" required
                autofocus autocomplete="full_name" />
        </div>
        <div class="border border-[#DADADA] w-full md:w-[20rem] px-2 xl:px-4 py-2 rounded-[24px] shadow-md mb-4 md:mb-0">
            <input id="email"
                class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                type="email" placeholder="Enter Your Email Address" name="email" :value="old('email')" required
                autocomplete="username" />
        </div>
        <div
            class="border border-[#DADADA] w-full md:w-[18rem] px-2 xl:px-4 py-2 rounded-[24px] shadow-md mb-4 md:mb-0 flex gap-x-2 font-sans font-normal text-sm lg:text-base text-[#2A2A2A]">
            <input id="phone_number"
                class="font-medium text-sm w-full lg:text-base text-[#AFAFAF] placeholder:text-[#AFAFAF] outline-none bg-[#FFFFFF]"
                type="text" placeholder="Mobile Number + Country code" name="phone_number" :value="old('phone_number')"
                required autocomplete="phone_number" />
        </div>
        <!-- Enlarged Sign Up Button -->
        <div
            class="ml-auto px-12 py-3 md:px-[3rem] rounded-[2rem] bg-gradient-to-r from-[#D1E8A7] to-[#6A9023] shadow-md font-sans font-semibold text-base lg:text-lg text-[#2A2A2A] cursor-pointer">
            <button type="submit">Sign Up</button>
        </div>
    </div>
</form>

