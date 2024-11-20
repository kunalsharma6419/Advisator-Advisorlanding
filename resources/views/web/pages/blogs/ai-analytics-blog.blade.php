@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->

        @include('web.components.header')



        <!-------Main Content--------->

        <body class="font-inter">
            <section class="relative pt-20 pb-24 bg-[#6A9023]">
              <div class="w-full max-w-lg md:max-w-2xl lg:max-w-4xl px-5 lg:px-11 mx-auto max-md:px-4">
                <h1 class="text-white font-manrope font-semibold text-4xl min-[500px]:text-5xl leading-tight mb-8">AI & Analytics Assessment</h1>
                <div class="flex items-center justify-between">
                  <div class="data">
                    <p class="font-medium text-xl leading-8 text-white mb-1">24 March 2024</p>
                    <p class="font-normal text-lg leading-7 text-white">AI & Analytics</p>
                  </div>
                  <div class="flex items-center gap-5">
                    <a href="javascript:;"><svg class="w-10 h-10 text-white group-hover:text-white" width="32" height="32"
                        viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M18.1139 14.2985L26.3866 4.88892H24.4263L17.2431 13.0591L11.5059 4.88892H4.88867L13.5645 17.2437L4.88867 27.1111H6.84915L14.4348 18.4831L20.4937 27.1111H27.1109L18.1134 14.2985H18.1139ZM15.4288 17.3526L14.5497 16.1223L7.55554 6.333H10.5667L16.2111 14.2333L17.0902 15.4636L24.4272 25.7327H21.416L15.4288 17.3531V17.3526Z"
                          fill="currentColor" />
                      </svg></a>
                    <a href="javascript:;">
                      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M15.4234 19.8791C15.4234 17.3223 17.526 15.2491 20.1203 15.2491C22.7146 15.2491 24.8183 17.3223 24.8183 19.8791C24.8183 22.4359 22.7146 24.5091 20.1203 24.5091C17.526 24.5091 15.4234 22.4359 15.4234 19.8791ZM12.8837 19.8791C12.8837 23.818 16.1235 27.0109 20.1203 27.0109C24.1171 27.0109 27.3569 23.818 27.3569 19.8791C27.3569 15.9402 24.1171 12.7473 20.1203 12.7473C16.1235 12.7473 12.8837 15.9402 12.8837 19.8791ZM25.9522 12.4646C25.9521 12.7942 26.0511 13.1165 26.2368 13.3906C26.4225 13.6648 26.6866 13.8785 26.9955 14.0048C27.3045 14.131 27.6445 14.1642 27.9726 14.1C28.3007 14.0358 28.6021 13.8772 28.8387 13.6442C29.0753 13.4112 29.2365 13.1143 29.3019 12.791C29.3673 12.4678 29.3339 12.1326 29.206 11.828C29.0781 11.5235 28.8615 11.2631 28.5835 11.0798C28.3054 10.8966 27.9785 10.7987 27.644 10.7986H27.6433C27.195 10.7988 26.7651 10.9743 26.448 11.2867C26.1309 11.5991 25.9526 12.0227 25.9522 12.4646ZM14.4267 31.1843C13.0527 31.1227 12.3059 30.8971 11.8096 30.7066C11.1517 30.4541 10.6822 30.1535 10.1886 29.6677C9.69501 29.1819 9.38947 28.7197 9.13445 28.0712C8.94098 27.5823 8.71211 26.8461 8.64965 25.492C8.58133 24.028 8.56768 23.5882 8.56768 19.8792C8.56768 16.1702 8.58245 15.7317 8.64965 14.2665C8.71222 12.9123 8.94278 12.1776 9.13445 11.6872C9.3906 11.0388 9.69568 10.5761 10.1886 10.0897C10.6815 9.60323 11.1505 9.30212 11.8096 9.05079C12.3057 8.86012 13.0527 8.63457 14.4267 8.57301C15.9123 8.50568 16.3585 8.49223 20.1203 8.49223C23.8821 8.49223 24.3288 8.50679 25.8155 8.57301C27.1896 8.63468 27.9351 8.8619 28.4327 9.05079C29.0906 9.30212 29.5601 9.6039 30.0537 10.0897C30.5473 10.5755 30.8517 11.0388 31.1078 11.6872C31.3013 12.1761 31.5302 12.9123 31.5926 14.2665C31.661 15.7317 31.6746 16.1702 31.6746 19.8792C31.6746 23.5882 31.661 24.0268 31.5926 25.492C31.5301 26.8461 31.3001 27.5821 31.1078 28.0712C30.8517 28.7197 30.5466 29.1823 30.0537 29.6677C29.5608 30.153 29.0906 30.4541 28.4327 30.7066C27.9366 30.8972 27.1896 31.1228 25.8155 31.1843C24.33 31.2517 23.8838 31.2651 20.1203 31.2651C16.3568 31.2651 15.9118 31.2517 14.4267 31.1843ZM14.3101 6.07435C12.8098 6.14168 11.7846 6.37612 10.8893 6.71946C9.9621 7.07401 9.17718 7.54968 8.39282 8.32146C7.60846 9.09323 7.12705 9.86801 6.76728 10.7818C6.4189 11.6647 6.18101 12.6745 6.11269 14.153C6.04324 15.6339 6.02734 16.1073 6.02734 19.8791C6.02734 23.6509 6.04324 24.1243 6.11269 25.6052C6.18101 27.0839 6.4189 28.0936 6.76728 28.9765C7.12705 29.8897 7.60857 30.6653 8.39282 31.4368C9.17706 32.2082 9.9621 32.6832 10.8893 33.0388C11.7863 33.3821 12.8098 33.6166 14.3101 33.6839C15.8135 33.7512 16.2931 33.768 20.1203 33.768C23.9475 33.768 24.4279 33.7523 25.9305 33.6839C27.4309 33.6166 28.4554 33.3821 29.3513 33.0388C30.2779 32.6832 31.0634 32.2086 31.8478 31.4368C32.6321 30.665 33.1125 29.8897 33.4733 28.9765C33.8217 28.0936 34.0607 27.0838 34.1279 25.6052C34.1962 24.1232 34.2121 23.6509 34.2121 19.8791C34.2121 16.1073 34.1962 15.6339 34.1279 14.153C34.0596 12.6743 33.8217 11.6641 33.4733 10.7818C33.1125 9.86857 32.6309 9.09446 31.8478 8.32146C31.0647 7.54846 30.2779 7.07401 29.3524 6.71946C28.4554 6.37612 27.4308 6.14057 25.9317 6.07435C24.429 6.00701 23.9486 5.99023 20.1214 5.99023C16.2942 5.99023 15.8135 6.0059 14.3101 6.07435Z"
                          fill="white" />
                      </svg>
                    </a>
                    <a href="javascript:;">
                      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M13.7568 31.1112V15.7426H8.63583V31.1112H13.7574H13.7568ZM11.1974 13.6446C12.9828 13.6446 14.0944 12.4645 14.0944 10.9896C14.061 9.48118 12.9828 8.33398 11.2314 8.33398C9.47869 8.33398 8.33398 9.48118 8.33398 10.9895C8.33398 12.4643 9.44513 13.6445 11.1639 13.6445H11.197L11.1974 13.6446ZM16.5914 31.1112H21.712V22.5296C21.712 22.0709 21.7454 21.611 21.8807 21.2833C22.2507 20.3652 23.0933 19.4148 24.5083 19.4148C26.3609 19.4148 27.1024 20.8241 27.1024 22.8903V31.1112H32.2229V22.2993C32.2229 17.5789 29.6969 15.3822 26.3277 15.3822C23.5655 15.3822 22.3523 16.9223 21.6783 17.9712H21.7124V15.7431H16.5917C16.6585 17.1849 16.5913 31.1118 16.5913 31.1118L16.5914 31.1112Z"
                          fill="white" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </section>

            <section class="relative py-10 lg:py-16 ">
              <div class="w-full max-w-lg md:max-w-2xl lg:max-w-4xl px-5 lg:px-11 mx-auto max-md:px-3">

                <div class="img w-auto mb-14">
                    <img src="{{ asset('blogs/aianalyticsassessment.webp') }}" alt="Blog tailwind page" class="object-cover">
                  </div>



                  <div class="topics mb-10">
                  <p class="font-medium text-xl leading-8 text-gray-600">
                    Trillions of data points related to organization’s functions, customer behavior and operations are being generated as organizations are undergoing digital transformation. In depth understanding of patterns underlying data and actionable insights drawn from it are imperative in driving an organization towards business excellence.
                </p>
                  </div>

              <div>
                <p class="font-medium text-xl leading-8 text-gray-600">
                    The journey of Artificial Intelligence adoption can be taken forward when the current state is assessed comprehensively in around 3 parts —
                </p>

                <ul class="list-decimal list-outside ml-5">

                    <li class="font-normal text-lg leading-8 text-gray-600">Data Science foundation</li>
                    <li class="font-normal text-lg leading-8 text-gray-600">Data Science Usage</li>
                    <li class="font-normal text-lg leading-8 text-gray-600">Data Science environment</li>
                </ul>


                <div class="head-4 mb-14 mt-6">
                    <h3 class="font-manrope font-bold text-[#6A9023] mb-5 text-2xl leading-9">Data Science Foundation</h3>
                    <p class="font-normal text-lg leading-8 text-gray-600">
                        An organization with an excellent foundation ensures quick access to data and its conversion into actionable insights. Foundation assessment is performed on the following attributes:
                    </p>
                    <ul class="list-disc ml-5 text-lg text-gray-600">
                        <li>Digital Application Integrations</li>
                        <li>Workflows Data Availability</li>
                        <li>Data Metrics Used</li>
                        <li>Quality Data Storage</li>
                        <li>Technology (BI, AI/ML)</li>
                        <li>Skills (BI, AI/ML) Infrastructure</li>
                    </ul>
                </div>

                <div class="head-4 mb-14">
                    <h5 class="font-manrope font-bold text-[#6A9023] mb-5 text-2xl leading-9">Data Science Usage</h5>
                    <p class="font-normal text-lg leading-8 text-gray-600">
                        An organization that is at the higher end of the value chain and uses AI/ML for most of its processes would be categorized as high usage. Usage assessment is performed on the following attributes, and the outcome may differ for different business functions across organizations:
                    </p>
                    <ul class="list-disc ml-5 text-lg text-gray-600">
                        <li>Digital Application Integrations</li>
                        <li>Workflows Data Availability</li>
                        <li>Data Metrics Used</li>
                        <li>Quality Data Storage</li>
                        <li>Technology (BI, AI/ML)</li>
                        <li>Skills (BI, AI/ML) Infrastructure</li>
                    </ul>
                </div>

                <div class="head-4 mb-14">
                    <h5 class="font-manrope font-bold text-[#6A9023] mb-5 text-2xl leading-9">Data Science Environment</h5>
                    <p class="font-normal text-lg leading-8 text-gray-600">
                        An organization that has adopted data-centric decision-making and has processes to support the exchange of data in a secured environment is likely to face fewer data thefts and information leakage. Environment assessment is performed on the following attributes:
                    </p>
                    <ul class="list-disc ml-5 text-lg text-gray-600">
                        <li>Data Governance</li>
                        <li>Collaboration Across Organizations</li>
                        <li>Culture</li>
                    </ul>
                </div>

                <div class="head-4 mb-14">
                    <h5 class="font-manrope font-bold  mb-5 text-2xl text-[#6A9023] leading-9">What is the Outcome of Assessments?</h5>
                    <p class="font-normal text-lg leading-8 text-gray-600">
                        Based on the assessment, your business unit or organization can be categorized as one of the following:
                    </p>
                    <ul class=" list-decimal ml-5 text-lg text-gray-600">
                        <li><strong>Explorer:</strong> Organizations that have recently started their journey and are still identifying the right systems and processes to adopt AI.</li>
                        <li><strong>Users:</strong> Organizations with a strong foundation in terms of infrastructure and processes in a few business units, leveraging AI.</li>
                        <li><strong>Leaders:</strong> Organizations with a strong foundation in terms of infrastructure and processes throughout the organization; have adopted the latest tools and techniques available.</li>
                        <li><strong>Innovators:</strong> Organizations with an excellent foundation and environment throughout the organization. Have processes and systems to drive continuous innovation in AI in the industry.</li>
                    </ul>
                </div>






            </section>



          </body>



        <!-- bottom menu bar -->
        @include('web.components.bottommenu')

        <!-- side bar -->
        @include('web.components.sidebar')

        @include('web.components.footer')
    </div>



    <script>
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
