<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- <link href="./output.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>

<style>
    .content-change span::before {
        content: "Grow your business";
        animation: animate infinite 20s;
    }

    @keyframes animate {

        0% {
            content: "Grow your business";
        }

        20% {
            content: "Make informed business decisions";
        }

        40% {
            content: "Find solutions to business problems";
        }

        60% {
            content: "Brainstorm new business ideas";
        }

        80% {
            content: "Get career guidance";
        }
    }



    .counter {
        font-size: 2rem;
    }

    .count {
        display: inline-block;
        width: 3rem;
        text-align: center;
        animation: count-up 2s ease-out forwards;
    }

    @keyframes count-up {
        from {
            transform: translateY(50%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .selected-team {
        color: #3F5713;
        border-color: #6A9023;
    }
</style>

<title>Home</title>
<style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        height: fit-content;
        width: fit-content;
        position: relative;
    }

    .swiper-button-next,
    .swiper-button-prev {
        position: absolute;
        top: 25px;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        z-index: 10;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f5f5f5;
        box-shadow: #fff;
    }

    .swiper-button-prev {
        left: 90%;
        background-color: #f5f5f5;
        box-shadow: #fff;
    }

    .swiper-button-prev::after {
        content: "❮";
        font-size: 20px;
        color: #000;
    }

    .swiper-button-prev:focus,
    .swiper-button-next:focus {
        background-color: #FF3131;
        color: #FFFFFF;
    }

    .swiper-button-next::after {
        content: "❯";
        font-size: 20px;
        color: #000;
    }

    @media screen and (max-width: 980px) {
        .swiper-button-prev {
            left: 85%;
        }
    }

    @media screen and (max-width: 700px) {
        .swiper-button-prev {
            left: 75%;
        }
    }

    @media screen and (max-width: 430px) {
        .swiper-button-prev {
            left: 65%;
        }
    }

    .swiper-pagination {
        position: absolute;
        top: 20px;
        /* Adjust top position as needed */
        right: 80px;
        /* Adjust right position as needed */
    }
</style>
