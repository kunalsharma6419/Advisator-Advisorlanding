<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper1", {
        slidesPerView: "auto",
        spaceBetween: 32,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                spaceBetween: 20,
            },
            400: {
                spaceBetween: 10,
            },
            375: {
                spaceBetween: 10,
            },
        },
        cssMode: false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });

    // swiper-bussiness
    var swiper = new Swiper(".swiper-bussiness", {
        slidesPerView: "auto",
        spaceBetween: 10,
        slidesPerView: 3,
        autoplay: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
    });


    var swiper = new Swiper(".swiper-verticals-geography", {
        slidesPerView: "auto",
        spaceBetween: 10,
        slidesPerView: 3,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
    });

    var swiper = new Swiper(".swiper-meet-team", {
        slidesPerView: "auto",
        spaceBetween: 10,
        slidesPerView: 2,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });

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

    const target = 100; // Change this to your target number
    const duration = 2000; // Animation duration in milliseconds
    const step = Math.ceil(target / (duration / 60));
    let current = 0;

    const counterElement = document.getElementById("counter");
    const industeriesElement = document.getElementById("industeries");
    const clientElement = document.getElementById("client");

    const counter = setInterval(() => {
        current += step;
        if (current >= target) {
            clearInterval(counter);
            current = target;
        }
        counterElement.textContent = current.toLocaleString();
        industeriesElement.textContent = current.toLocaleString();
        clientElement.textContent = current.toLocaleString();
    }, 1000 / 60); // 60 frames per second
</script>



<script>
    // Get the button element
    const goToTopBtn = document.getElementById("goToTopBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            goToTopBtn.style.display = "block";
        } else {
            goToTopBtn.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document smoothly
    goToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
</script>
<script>
    function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("meet-team");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";


        var buttons = document.querySelectorAll('.tabButton');
        buttons.forEach(button => {
            button.classList.add('bg-[#FFFFFF]', 'text-[#828282]');
            button.classList.remove('bg-[#FF3131]', 'text-[#FFFFFF]');
        });
        document.getElementById('btn' + cityName).classList.remove('bg-[#FFFFFF]', 'text-[#828282]');
        document.getElementById('btn' + cityName).classList.add('bg-[#FF3131]', 'text-[#FFFFFF]');
    }
</script>



<!-- <script>
    function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("meet-team");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }

    // Reset all button styles and icon colors
    var buttons = document.getElementsByClassName("tabButton");
    console.log(buttons)
    for (i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove(
            "bg-red-500",
            "bg-white",
            "text-black",
            "text-white"
        );
        console.log(buttons[i])
        buttons[i].classList.add("bg-white", "text-black");

        buttons[i].querySelector("i").style.color = "#000000";
    }

    // Set styles for active button and icon color to white
    var activeButton = document.getElementById("btn" + cityName);
    console.log(activeButton)
    activeButton.classList.add("bg-red-500", "text-white");
    activeButton.classList.remove("bg-white", "text-black");
    activeButton.querySelector("i").style.color = "#FFFFFF";
</script> -->
