@extends('user.layouts.app')

@section('usercontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- header -->
        @include('user.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('user.components.dashmenu')
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-4">Payment Failed</h1>
                <p>There was an issue with your payment. Please try again.</p>
            </div>
        </div>
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
