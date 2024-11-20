@extends('user.layouts.app')

@section('usercontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- header -->
        @include('user.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('user.components.dashmenu')

            <!-- content  -->
            <div class="flex text-[#2A2A2A] mt-[28px] flex-col gap-[55px]">
                <div class="flex gap-[46px]">
                    <div
                        class="lg:flex  hidden flex-col w-[342px] h-[122px] bg-[#F5F5F5] rounded-[12px] gap-[14px] p-[24px]">
                        <div class="flex justify-between">
                            <h3 class="font-[500] text-[16px]">Wallet Balance</h3>
                            <img class="w-[24px] h-[24px]" src="../src/assets/right arrow.png" alt="" />
                        </div>
                        <p class="text-[#828282] font-[400] text-[16px]">
                            Check our wallet balance
                        </p>
                    </div>
                    <!-- card  -->
                    <div
                        class="bg-[#FDFADF] w-full text-[#2A2A2A] rounded-[18px] hover:bg-[#FFF2AB] flex flex-col gap-[15px] hover:border-[2px] hover:border-[#6A9023] p-[24px] border border-[#F4C2A4]">
                        <div class="flex flex-row justify-between lg:flex-col">
                            <div class="flex gap-[12px]">
                                <img class="w-[30px] h-[30px]" src="../src/assets/wallet.png" alt="" />
                                <h3 class="text-[14px] lg:text-[18px] font-[700] hover:text-[#6a9023]">
                                    Wallet Balance:
                                </h3>
                            </div>

                            <h4 class="text-[20px] mt-[5px] lg:text-[32px] font-[500]">
                                ₹ {{ number_format(Auth::user()->user_wallet_balance, 2) }}
                            </h4>
                        </div>

                        @if (Auth::user()->user_wallet_balance < 100)
                            <p
                                class="text-[#FF3131] font-[400] text-right lg:text-left text-[14px] mt-[30px] lg:text-[16px]">
                                Low balance! Recharge now
                            </p>
                        @endif
                    </div>
                </div>
                <div class="flex gap-[46px]">
                    <div class=" flex-col lg:flex  hidden  w-[342px] h-fit bg-[#F5F5F5] rounded-[12px] gap-[14px] p-[24px]">
                        <div class="flex justify-between">
                            <h3 class="font-[500] text-[16px]">Recharge Wallet</h3>
                            <img class="w-[24px] h-[24px]" src="../src/assets/right arrow.png" alt="" />
                        </div>
                        <p class="text-[#828282] font-[400] text-[16px]">
                            Recharge Wallet and experience hassle free connection with our
                            expert advisors
                        </p>
                    </div>
                    <!-- card  -->
                    <div
                        class="bg-[#FAFAFA] w-full text-[#2A2A2A] rounded-[18px] flex flex-col gap-[15px] shadow shadow-[#00000026] p-[24px]">
                        <h4 class="text-[12px] lg:text-[16px] font-[500]">
                            Check & choose the Recharge packs suitable for your needs.
                        </h4>
                        <button
                            class="w-fit bg-[#526E1C] shadow-md text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold"
                            onclick="window.location.href='{{ route('user.mywallet.recharge') }}'">
                            Recharge Wallet
                        </button>

                    </div>


                </div>
            </div>
        </div>
    <hr class="mb-[800px] block md:hidden">


        <!-- bottom menu bar -->
        @include('user.components.bottommenu')

        @include('user.components.footer')

        <!-- side bar -->
        @include('user.components.sidebar')
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // JavaScript to toggle sidebar
        const hideSideMenu = document.getElementById("hideSideMenu");
        const showSideMenu = document.getElementById("showSideMenu");

        const sidebar = document.querySelector(".sidebar");

        hideSideMenu.addEventListener("click", () => {
            sidebar.classList.add("left-full");
        });
        showSideMenu.addEventListener("click", () => {
            sidebar.classList.remove("left-full");
        });
    </script>


    <script>
        // JavaScript to toggle the answers and rotate the arrows
        document
            .querySelectorAll('[id^="question"]')
            .forEach(function(button, index) {
                button.addEventListener("click", function() {
                    var answer = document.getElementById("answer" + (index + 1));
                    var arrow = document.getElementById("arrow" + (index + 1));

                    if (
                        answer.style.display === "none" ||
                        answer.style.display === ""
                    ) {
                        answer.style.display = "block";
                        arrow.style.transform = "rotate(0deg)";
                    } else {
                        answer.style.display = "none";
                        arrow.style.transform = "rotate(-180deg)";
                    }
                });
            });
    </script>
@endsection
