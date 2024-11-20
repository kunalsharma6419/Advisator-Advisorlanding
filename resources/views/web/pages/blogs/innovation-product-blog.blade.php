@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-[#FFFFFF] relative overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')



        <!-------Main Content--------->

        <body class="font-inter">
            <section class="relative pt-20 pb-24 bg-[#6A9023]">
              <div class="w-full max-w-lg md:max-w-2xl lg:max-w-4xl px-5 lg:px-11 mx-auto max-md:px-4">
                <h1 class="text-white  font-semibold text-4xl min-[500px]:text-5xl leading-tight mb-8">5 phases that drive continuous innovation in a product</h1>
                <div class="flex items-center justify-between">
                  <div class="data">
                    <p class="font-medium text-xl leading-8 text-white mb-1">24 March 2024</p>
                    <p class="font-normal text-lg leading-7 text-white">Product Management</p>
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
                    <img src="{{ asset('blogs/ProductManagement.webp') }}" alt="Blog tailwind page" class="object-cover">
                  </div>




                <div class="topics mb-14">
                    <h5 class=" font-semibold text-2xl leading-9 text-[#6A9023] mb-8">
                        5 phases that drive continuous innovation in a product are:
                    </h5>

                    <ul class="list-decimal list-outside ml-5">

                        <li class="font-normal text-lg leading-8 text-gray-600">Product Discovery — Product Manager</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">Product Planning — Product Manager</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">Product Execution — Product Owner</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">Go-to-Market strategy — Product Manager</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">Evaluation of product success — Product Owner / Product Manager</li>
                    </ul>
                  </div>



                  <div class="head-2 mb-12">

                        <h2 class=" font-semibold text-[#6A9023] mb-5 text-2xl leading-tight">Product Discovery</h2>
                        <p class="font-normal text-lg leading-8 text-gray-600">The customer-centric approach to product development forms the core of the product discovery process. It’s important for entrepreneurs, investors or sponsors to validate any idea that they are passionate about taking to market, by doing extensive market research, competitor analysis and economic viability analysis. At the end of this phase, stakeholders would have clarity in terms of</p>
                        <div class="mt-4">
                        <p class="font-normal text-lg leading-8 text-gray-600 mb-2">1) Customer segments to target </li>
                        <p class="font-normal text-lg leading-8 text-gray-600 mb-2">2) Needs and wants of customers to address </li>
                        <p class="font-normal text-lg leading-8 text-gray-600 mb-2">3) Economic viability analysis of the idea.</li>
                        </div>
                  </div>



                  <div class="topics mb-14">
                    <h4 class=" font-semibold text-2xl leading-9 text-[#6A9023] mb-8">
                        Outcomes from Product Discovery
                    </h4>

                    <ul class="list-disc list-outside flex flex-col gap-8 ml-5 mb-14">
                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Market Sizing <span class="font-normal text-base leading-7 text-black">
                                    Market sizing aims to explore the potential of a market in terms of size and profitability. Market size can be viewed in terms of 1) Total Available Market (TAM) 2) Served Available Market (SAM) 3) Share of Market (SOM).
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Market Research: <span class="font-normal text-base leading-7 text-black">
                                    Surveys and Interviews are important tools to identify the interest and usability of the target customers. GrowMax Consulting designs and sends digital surveys to gather responses from targeted customers, conducts interviews, and summarizes responses in a visual report.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Competitor Analysis: <span class="font-normal text-base leading-7 text-black">
                                    Competitor analysis is a process of researching competitors to learn about their strengths, weaknesses, products, and marketing strategies. Competitor analysis can provide you with data that can help shape strategy and business decisions.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Key Customer Segments: <span class="font-normal text-base leading-7 text-black">
                                    Identify customer segments that businesses would like to target over different time spans.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Identify Personas: <span class="font-normal text-base leading-7 text-black">
                                    Identifying and describing a persona for each segment helps businesses understand customer behavior, including demography, spend size, location, motivation, living situation, shopping method, etc. This information aids in developing targeted marketing communication.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                User Journey Map: <span class="font-normal text-base leading-7 text-black">
                                    A user journey is a path a user may take to reach their goal when using a product. This process helps identify different stages of the journey, customer goals, touchpoints, experience, feelings (Happy or Sad), pain points, and expectations at each stage.
                                </span>
                            </p>
                        </li>

                        <!-- Existing content for Business Loan Management and Conclusion -->
                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Business Loan Management: <span class="font-normal text-base leading-7 text-black">
                                    Responsibly Managing Funds: Best practices for utilizing loan funds efficiently. Repayment Strategies: Formulating a repayment plan that suits your business.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Conclusion: <span class="font-normal text-base leading-7 text-black">
                                    Securing a business loan can be a pivotal moment for your company's growth. Armed with this guide, you're better equipped to navigate the complexities of the loan process. Remember, choosing the right loan and managing it wisely can set your business on a path to success.
                                </span>
                            </p>
                        </li>
                    </ul>
                </div>




                <div class="head-1 mb-12">
                  <h2 class=" font-semibold text-[#6A9023] mb-5 text-2xl leading-tight">Product Planning</h2>
                  <p class="font-normal text-lg leading-8 text-gray-600">The planning phase involves in-depth evaluation of the right set of features and functionalities that would cater to the needs of customers on one hand and availability of skills and other resources to execute them on the other hand. This phase requires 1) Breaking down the business vision into themes, epics and user stories to be developed and released to the market in a given amount of time. 2) Identify key business metrics to gauge success of the product.</p>
                </div>


                <div class="topics mb-14">
                    <h4 class=" font-semibold text-2xl leading-9 text-[#6A9023] mb-8">
                        Outcomes from Product Planning
                    </h4>

                    <ul class="list-disc list-outside flex flex-col gap-8 ml-5 mb-14">
                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Themes, Epics, User Stories & Features: <span class="font-normal text-base leading-7 text-black">
                                    Based on customer segments and respective pain points to be addressed, the product to be built is broken down into smaller chunks of work called themes. Each theme is a part of a product that in itself is functional. Each theme is further broken down into Epics, User stories, and Features.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Vision, Strategy and Roadmaps: <span class="font-normal text-base leading-7 text-black">
                                    Based on the priority of different needs and resource capacity — Epics, user stories, and features are identified to be included in different product releases planned across the calendar year. Once the base roadmap is ready, its revision will happen with progressive development of the product.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                UI Conceptualization: <span class="font-normal text-base leading-7 text-black">
                                    The User Journey Map (designed during the Discovery phase) lists customer pain points and expectations that would act as input to design an integrated UI workflow for a seamless user experience. During UI conceptualization, Wireframe and Prototype would be built in discussion with stakeholders to ensure clarity prior to actual development.
                                </span>
                            </p>
                        </li>
                        <p class="font-normal text-xl leading-7 text-black">
                            During UI conceptualization, Wireframe and Prototype would be built in discussion with stakeholders to ensure clarity prior to actual development.
                        </p>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Product Analytics Framework: <span class="font-normal text-base leading-7 text-black">
                                    Product analytics is the process of analyzing how users engage with a product. The Product Analytics Framework is critical as it establishes a feedback loop from the market to the product development cycle. Key business metrics that would define the success of a product are identified.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Product Requirement Document (PRD): <span class="font-normal text-base leading-7 text-black">
                                    The product requirement document (PRD) is a guide for business and technical teams to help develop, launch, and market the product. It communicates in detail about the product’s requirements, including its purpose, features, functionality, and behavior.
                                </span>
                            </p>
                        </li>
                    </ul>
                </div>





                <div class="head-1 mb-12">
                    <h2 class=" font-semibold text-[#6A9023] mb-5 text-2xl  leading-tight">Product Execution</h2>
                    <p class="font-normal text-lg leading-8 text-gray-600">During the Product Execution phase, an idea takes the shape of a tangible product, as the technology team builds features and functionalities, across different sprint cycles. The execution phase requires extensive collaboration between stakeholders, product owners and the development team. It’s during this phase that the practical challenges might surface and would require continuous feedback from stakeholders and sponsors to ensure a workable product gets built ready to be released at the end of sprint cycles.</p>
                  </div>


                  <div class="topics mb-14">
                    <h4 class=" font-semibold text-2xl leading-9 text-[#6A9023] mb-8">
                        Outcomes from Product Execution
                    </h4>

                    <ul class="list-disc list-outside flex flex-col gap-8 ml-5 mb-14">
                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Product Management in Agile Framework: <span class="font-normal text-base leading-7 text-black">
                                    Monitoring user stories, features, and reporting progress to update stakeholders after every sprint cycle.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Design Key Processes: <span class="font-normal text-base leading-7 text-black">
                                    To ensure effective coordination and collaboration across different teams — a Market Research team, a Technology team, Business stakeholders, Data Management, and Data Science — required processes will be designed and implemented.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Trainings & Workshops: <span class="font-normal text-base leading-7 text-black">
                                    Workshops and training sessions on critical subjects would be conducted to bring the entire team on the same page.
                                </span>
                            </p>
                        </li>
                    </ul>
                </div>



                <div class="head-1 mb-12">
                    <h2 class=" font-semibold text-[#6A9023] mb-5 text-2xl md:text-2xl sm:text-2xl  leading-tight">Product Go to Market Strategy</h2>
                    <p class="font-normal text-lg leading-8 text-gray-600">Go to Market Strategy involves clarity on</p>
                    <ul class="list-decimal list-outside ml-5">

                        <li class="font-normal text-lg leading-8 text-gray-600">How will the product be launched depending on its lifecycle ?</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">Through which all acquisition channels will it reach target customers?</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">What would be the message to ensure targeted customers buy the product ?</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">Product Positioning viz viz its competitor</li>
                        <li class="font-normal text-lg leading-8 text-gray-600">Identify opportunities and strategies to grow the product into different geographic regions.</li>


                    </ul>
                  </div>

                  <div class="topics mb-14">
                    <h4 class=" font-semibold text-2xl leading-9 text-[#6A9023] mb-8">
                        Outcomes from Go to Market Strategy
                    </h4>

                    <ul class="list-disc list-outside flex flex-col gap-8 ml-5 mb-14">
                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Launch Strategy: <span class="font-normal text-base leading-7 text-black">
                                    A product developed and ready to be released to the market requires a comprehensive marketing strategy that details different acquisition channels, acquisition strategies, and activation strategies to ensure that the product reaches and is being used by the target customers.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Retention Strategy: <span class="font-normal text-base leading-7 text-black">
                                    To ensure customer loyalty and continued usage of product services, devising the right retention and engagement strategy is vital.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Growth Strategy: <span class="font-normal text-base leading-7 text-black">
                                    Over a period of time, launching different marketing offers, events, and campaigns would ensure continued growth of product customers.
                                </span>
                            </p>
                        </li>
                    </ul>
                </div>


                <div class="head-1 mb-12">
                    <h2 class=" font-semibold text-[#6A9023] mb-5 text-2xl  leading-tight">Evaluation of Product Success</h2>
                    <p class="font-normal text-lg leading-8 text-gray-600">Once the product is launched in the market and has acquired paid customers, it’s imperative to gauge the ever changing needs of the market via carefully selected business metrics. In case a business metric doesn’t meet the desired goal, the product strategy would need a revision. The feedback loop from this phase to the discovery phase would ensure that the market needs to drive product innovation on a continuous basis.</p>
                  </div>


                  <div class="topics mb-14">
                    <h4 class=" font-semibold text-2xl leading-9 text-[#6A9023] mb-8">
                        Outcomes from Product Success
                    </h4>

                    <ul class="list-disc list-outside flex flex-col gap-8 ml-5 mb-14">
                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Metrics Tracking: <span class="font-normal text-base leading-7 text-black">
                                    Though an analytics framework is designed during planning, its post-launch performance is monitored and reported to the required stakeholders through a visual dashboard.
                                </span>
                            </p>
                        </li>

                        <li class="list-disc">
                            <p class="font-medium text-xl leading-8 text-black">
                                Actionable Insights: <span class="font-normal text-base leading-7 text-black">
                                    Product usage data is analyzed to derive actionable insights, which are considered for subsequent strategic decisions on product development and Product Marketing.
                                </span>
                            </p>
                        </li>
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
