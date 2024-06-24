<form method="POST" action="{{ route('register') }}"
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
            {{-- <div class="flex items-center gap-2">
                    <!-- +91(IN) -->
                    <!-- <div class="flex gap-[12px]"> -->

                    <label for="underline_select" class="sr-only">+91</label>

                    <select id="underline_select" class="outline-none">
                        <option selected>+91</option>
                        <option value="+92">+92</option>
                        <option value="+92">+93</option>
                        <option value="+94">+94</option>
                    </select>
                    <!-- </div> -->
                    <!-- <svg class="w-5 h-5 text-[#3A3A3A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                  <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                              </svg> -->
                </div>
                <div class="text-[#D6D6D6]">|</div> --}}
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
</form>
