@extends('web.layouts.app')

@section('maincontent')
    <div class="relative overflow-hidden w-full">
        <!-- Header -->
        @include('web.components.header')

        <!-- main -->
        <div class="flex flex-col gap-[45px] text-[#2A2A2A] mt-[60px] w-[90%] md:w-[95%] lg:w-[90%] mx-auto">
            <h2 class="text-[32px] font-[500]">Contact us</h2>
            <!-- 1st content  -->
            <div class="flex flex-col lg:flex-row gap-[94px] w-full">
                <p class="text-[18px] font-[400]">
                    Have a question, feedback, or just want to say hello?
                    <br />
                    <br />

                    We'd love to hear from you!
                    <br />
                    <br />

                    You can reach out to us using the contact information below or fill
                    out the form, and we'll get back to you as soon as possible.
                </p>
                <img class="w-full lg:w-[670px]" src="../src/assets/Contactus.png" alt="" />
            </div>
            <div class="flex flex-col bg-[#F7F7F7] md:flex-row gap-[24px] h-full justify-between lg:px-[60px] lg:py-[32px]">
                <!-- contact  -->
                <div class="flex flex-col gap-[30px]">
                    <div class="flex gap-[8px]">
                        <img class="w-[30px] h-[30px]" src="../src/assets/fluent_call-20-regular.png" alt="" />
                        <a href="telto:+919667707712" class="text-[16px] font-[400]">+91-9667707712</a>
                    </div>
                    <div class="flex gap-[8px]">
                        <img class="w-[30px] h-[30px]" src="../src/assets/iconoir_mail.png" alt="" />
                        <a href="mailto:advisory@shift180.in" class="text-[16px] font-[400]">Advisory@shift180.in</a>
                    </div>
                    <div class="flex gap-[8px]">
                        <img class="w-[30px] h-[30px]" src="../src/assets/mynaui_location.png" alt="" />
                        <p class="text-[16px] font-[400]">Gera Adara, Pune, India</p>
                    </div>
                </div>
                <!-- divder  -->
                <div class="w-[1px] hidden lg:flex h-[304px] border border-[#ACACAC]"></div>
                <!-- form  -->
                <form class="flex flex-col">
                    <h4 class="text-[18px] font-[500]">Write to us:</h4>
                    <div class="flex flex-col md:flex-row gap-[30px] mt-[24px]">
                        <input class="rounded-[8px] p-2 bg-white border border-[#ABCA74]" placeholder="Full Name"
                            type="text" />
                        <input class="rounded-[8px] p-2 border border-[#ABCA74]" placeholder="Email address"
                            type="email" />
                    </div>
                    <input class="rounded-[8px] mt-[24px] p-2 border border-[#ABCA74]" placeholder="Subject"
                        type="text" />
                    <textarea class="rounded-[12px] mt-[12px] h-52 p-2 border border-[#ABCA74]" placeholder="Message" type="textarea"></textarea>
                    <button
                        class="w-[270px] self-end h-[40px] bg-gradient-to-r from-[#6AA300] to-[#3F5713] rounded-[24px] text-white mt-[24px] flex items-center justify-center">
                        Send Message
                    </button>
                </form>
            </div>
            <!-- 2nd content  -->

        </div>
        {{-- <div class="flex flex-col gap-[45px] text-[#2A2A2A] mt-[60px] w-[90%] md:w-[95%] lg:w-[90%] mx-auto">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.6547613225475!2d73.69852937486066!3d18.589597082517432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bbb98892c15b%3A0xe12859dacb0c770e!2sGera&#39;s%20Adara!5e0!3m2!1sen!2sin!4v1717133546064!5m2!1sen!2sin"
                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="w-[100%] md:w-[95%] lg:w-[90%]"></iframe>
        </div> --}}
        @include('web.components.footer')
        <!-- bottom menu bar -->
        @include('web.components.bottommenu')


        <!-- side bar -->
        @include('web.components.sidebar')
    </div>
    <script>
        function updatePrice(value) {
            document.getElementById("minPrice").textContent = "₹" + value;
        }
        // JavaScript to toggle sidebar
        // const toggleBtn = document.querySelector('.toggleBtn');
        const hideSideMenu = document.getElementById("hideSideMenu");
        const showSideMenu = document.getElementById("showSideMenu");

        // console.log(toggleBtn)
        console.log(hideSideMenu, showSideMenu);
        const sidebar = document.querySelector(".sidebar");

        hideSideMenu.addEventListener("click", () => {
            sidebar.classList.add("left-full");
        });
        showSideMenu.addEventListener("click", () => {
            sidebar.classList.remove("left-full");
        });
    </script>
@endsection
