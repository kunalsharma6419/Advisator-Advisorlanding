@extends('web.layouts.app')

@section('maincontent')
    <div class="relative w-full overflow-x-hidden">
        <!-- Header -->
        @include('web.components.header')

        <!-- main -->
        <div class="flex flex-col text-[#2A2A2A] w-[90%] md:w-[95%] lg:w-[90%] mx-auto mt-[24px]">
            <!-- 1st content  lg design  -->
            <div class="lg:flex hidden gap-[80px] w-full">
                <!-- 1.1 -->
                <div class="flex flex-col w-[50%] gap-[40px]">
                    {{-- <h1 class="lg:text-[32px] text-[16px] font-[500]">Who we are?</h1> --}}
                    <h1 class="text-[20px] lg:text-[38px] mt-[2rem] mb-[-1rem]">
                        Who we <span class="text-[#FF3131]">are</span><span class="text-[#6A9023]">?</span>
                    </h1>
                    <p class="text-[12px] lg:text-[18px] font-[400] mt-0">
                        Shift180 is a social enterprise owned and operated by a group of leaders and expert professionals
                        who have a drive for innovation, passion for problem-solving, and a talent for tackling real-world
                        challenges. <br></br>
                        Shift180 is committed to progressively introducing digital platforms and management consulting
                        services across diverse geographical regions and industry sectors, to generate a positive impact on
                        enterprise's business and people's live. <br></br>
                        {{--
                        Your companion to discover reliable and affordable expert advice for overcoming business challenges
                        in digital age. --}}
                        Shift180 has introduced <strong>Advisator</strong>. Advisator is your companion to discover reliable
                        and affordable expert advice for overcoming business challenges in the digital age.
                    </p>
                    {{-- <h2 class="text-[40px] font-[400]">
                        Leading with purpose!
                    </h2> --}}
                    {{-- <img class="w-[580px] h-[353px]" src="../src/assets/whyus.webp" alt="" /> --}}
                </div>
                <!-- 1.2 -->
                <div class="flex w-[50%] gap-[12px]">
                    <img class="" src="../src/assets/Rectangle 533.png" alt="" />
                    <img class="" src="../src/assets/Rectangle 532.png" alt="" />
                </div>
            </div>
            <!-- 1st content  small screen design  -->
            <div class="flex lg:hidden flex-col gap-[38px]">
                <!-- 1.1 -->
                <div class="flex flex-col gap-[18px]">
                    {{-- <h1 class="text-[16px] font-[500]">Who we are?</h1> --}}
                    <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                        Who we <span class="text-[#FF3131]">are</span><span class="text-[#6A9023]">?</span>
                    </h1>
                    <p class="text-[12px] font-[400]">
                        Shift180 is a social enterprise owned and operated by a group of leaders and expert professionals
                        who have a drive for innovation, passion for problem-solving, and a talent for tackling real-world
                        challenges. <br></br>
                        Shift180 is committed to progressively introducing digital platforms and management consulting
                        services across diverse geographical regions and industry sectors, to generate a positive impact on
                        enterprise's business and people's live. <br></br>
                        Shift180 has introduced <strong>Advisator</strong>. Advisator is your companion to discover reliable
                        and affordable expert advice for overcoming business challenges in the digital age.
                    </p>
                </div>
                <!-- 1.2 -->
                <div class="flex w-full items-center flex-col md:flex-row gap-[12px]">
                    <!-- 1st -->
                    <div class="flex w-full md:w-[40%] flex-col gap-[35px]">
                        {{-- <h2 class="text-[16px] md:text-[20px] font-[400] text-center md:text-left">
                            Leading with purpose!
                        </h2> --}}
                        {{-- <img class="md:w-full md:h-[190px]" src="../src/assets/whyus.webp" alt="" /> --}}
                    </div>
                    <!-- 2nd -->
                    <div class="flex w-full md:w-[60%] gap-[5px] justify-center md:justify-start flex-wrap md:flex-nowrap">
                        <img class="w-[112px] h-[224px] md:w-[50%] md:h-[350px] object-cover mb-[10px] md:mb-0"
                            src="../src/assets/Rectangle 533.png" alt="" />
                        <img class="w-[112px] h-[224px] md:w-[50%] md:h-[350px] object-cover"
                            src="../src/assets/Rectangle 532.png" alt="" />
                    </div>
                </div>

            </div>
            <!-- 2nd content  -->
            <div class="flex flex-col gap-[60px] mt-[60px]">
                <!-- 2.1 -->
                <div class="flex flex-col gap-[30px]">
                    {{-- <h3 class="lg:text-[32px] text-[16px] font-[500]">Why Advisator?</h3> --}}
                    <h1 class="text-[20px] lg:text-[38px] mt-[2rem] ">
                        Why <span class="text-[#FF3131]">Advis</span><span class="text-[#6A9023]">ator?</span>
                    </h1>
                    <p class="text-[12px] lg:text-[18px] font-[400] leading-[1.17em]">
                        In Digital era, enterprise-wide digital transformations, digital products and solutions led by AI
                        and ML have become the center of an organization's business growth. However, its execution is
                        expensive and complex.
                        It requires synergies of different fields - business domain, statistics, computational algorithms
                        and technology to discover a solution that is result oriented & sustainable.
                        Advisory by reliable experts would play a critical role in democratizing and spread of the know-how
                        of technology and AI/ML.
                        <br /><br />
                        Lack of awareness regarding a systematic approach to entrepreneurship, coupled with the complexities
                        of India's legal system and the disorganized nature of business operations, has led to the need for
                        education and support within the entrepreneurial ecosystem.
                        <br /><br />
                        To address all the points mentioned above Shift180 launched Advisator in Oct'2023 to empower
                        enterprises with easy access to reliable and affordable expert advice.
                    </p>
                </div>
                <div class="flex flex-col gap-[30px]">




                    <!-- 2.3 -->








                    <div class="flex flex-col gap-[30px]">
                        <h1 class="text-[20px] lg:text-[38px] my-[2rem]">
                            Why choose <span class="text-[#FF3131]">Advis</span><span class="text-[#6A9023]">ator?</span>
                        </h1>
                        {{-- <h3 class="lg:text-[32px] text-[16px] font-[500]">Why use Advisator ?</h3>
                    <p class="text-[12px] lg:text-[18px] font-[400] leading-[1.17em]">
                        Behind Advisator is a dedicated team of passionate individuals who
                        are driven by a shared purpose: to make quality advice accessible
                        to all. From our founders to our developers, each member of the
                        Advisator team brings a unique set of skills, experiences, and
                        perspectives to the table, united by a common commitment to
                        excellence and impact.
                    </p> --}}


                        <div class="flex flex-col lg:flex-row gap-[30px] lg:gap-[84px] justify-center">
                            <!-- 1st  -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] rounded-xl">
                                    <div>
                                        <img class="lg:h-[300px] h-[200px] w-full object-cover object-center"
                                            src="https://images.businessnewsdaily.com/app/uploads/2022/04/04074404/GettyImages-1133767597.jpg"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                        <h4
                                            class="text-[#6A9023] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            ONE-ONE DISCUSSION
                                        </h4>
                                        <p
                                            class="font-normal text-[#2A2A2A] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Every business has unique requirements hence your specific goals are considered
                                            while designing solutions.
                                        </p>
                                        {{-- <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- 2st  -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] rounded-xl">
                                    <div>
                                        <img class="lg:h-[300px] h-[200px] w-full object-cover object-center"
                                            src="https://th.bing.com/th/id/OIP.1YWLWbDMm94FhgmztdfMEwHaEK?w=298&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                        <h4
                                            class="text-[#6A9023] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            RECOGNISED EXPERTS
                                        </h4>
                                        <p
                                            class="font-normal text-[#2A2A2A] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Our experts have extensive knowledge and experience in their respective
                                            industries.
                                        </p>
                                        {{-- <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- 3st  -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] rounded-xl">
                                    <div>
                                        <img class="lg:h-[300px] h-[200px] w-full object-cover object-center"
                                            src="https://th.bing.com/th/id/OIP.8-CjQ5-iBX9SRZqv5EZVmgHaHa?rs=1&pid=ImgDetMain"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                        <h4
                                            class="text-[#6A9023] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            VETTED ADVISORS
                                        </h4>
                                        <p
                                            class="font-normal text-[#2A2A2A] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Verified credentials, qualifications, and track records to give you confidence
                                            in
                                            their abilities.
                                        </p>
                                        {{-- <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-[30px] lg:gap-[84px] justify-center">
                            <!-- 1st  -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] rounded-xl">
                                    <div>
                                        <img class="lg:h-[300px] h-[200px] w-full object-cover object-center"
                                            src="https://searchengineland.com/wp-content/seloads/2018/05/shutterstock_184576229-1536x864.jpg"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                        <h4
                                            class="text-[#6A9023] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            TRANSPARENCY
                                        </h4>
                                        <p
                                            class="font-normal text-[#2A2A2A] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            We complete insights into the expert's experiences and processes.

                                        </p>
                                        {{-- <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- 2st  -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex flex-col items-center w-[180px] sm:w-[240px] md:w-[320px] lg:w-[290px] xl:w-[350px] rounded-xl">
                                    <div>
                                        <img class="lg:h-[300px] h-[200px] w-full object-cover object-center"
                                            src="https://th.bing.com/th/id/OIP.t7YkpLOIbNlk3KcaAoBEyAHaE8?w=230&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                                            alt="" />
                                    </div>

                                    <div class="flex flex-col justify-between w-full p-1 px-3 sm:p-2 grow">
                                        <h4
                                            class="text-[#6A9023] font-medium text-xs sm:text-sm md:text-base lg:text-lg text-start">
                                            ONGOING SUPPORT
                                        </h4>
                                        <p
                                            class="font-normal text-[#2A2A2A] text-[10px] sm:text-xs md:text-sm lg:text-base text-start">
                                            Regular communication is maintained to ensure that you get the apt
                                            solutions
                                            for your business problem.
                                        </p>
                                        {{-- <button
                                            class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                            Learn More
                                        </button> --}}
                                    </div>
                                </div>
                                {{--

                            <div class="hidden lg:flex gap-[200px] w-[100%] justify-start mx-auto">
                                <h2 class="text-[32px] font-[500]">Blogs</h2>
                            </div>
                            <!-- 1st small screen  -->
                            <div class="flex flex-col gap-[18px] lg:hidden">
                                <!-- search box  -->
                                <!-- search box for moblie screen -->

                                <h2 class="text-[18px] lg:text-[40px] font-[500] ml-2">Blogs</h2>
                            </div>

                            <!-- 2nd -->
                            <div
                                class="flex justify-center mx-auto w-full mt-[36px] h-full flex-wrap gap-5 lg:gap-[24px] items-center">
                                <!-- Blog Item 1 -->
                                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                                    <img class="w-full h-[320px] object-cover rounded-t-[40px]"
                                        src="{{ asset('blogs/ProductManagement.webp') }}" alt="" />
                                    <div class="p-3">
                                        <h2 class="text-[16px] font-[500] mt-[8px]">
                                            5 Phases That Drive Continuous Innovation in a Product
                                        </h2>
                                        <p
                                            class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                            Learn about the five phases that help businesses to drive continuous product
                                            innovation and stay
                                            ahead in the market.
                                        </p>
                                        <a href="{{ url('blog/5-phases-that-drive-continuous-innovation-in-a-product') }}"
                                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                                            Learn more
                                        </a>
                                    </div>
                                </div>

                                <!-- Blog Item 2 -->
                                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                                    <img class="w-full h-[320px] object-cover rounded-t-[40px]"
                                        src="{{ asset('blogs/SuccessfulAdoptionofAI.webp') }}" alt="" />
                                    <div class="p-3">
                                        <h2 class="text-[16px] font-[500] mt-[8px]">
                                            Successful Adoption of AI
                                        </h2>
                                        <p
                                            class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                            Discover how businesses can leverage AI for increased productivity and
                                            competitive advantage in
                                            the modern world.
                                        </p>
                                        <a href="{{ url('blog/successful-adoption-of-ai') }}"
                                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                                            Learn more
                                        </a>
                                    </div>
                                </div>

                                <!-- Blog Item 3 -->
                                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                                    <img class="w-full h-[320px] object-cover rounded-t-[40px]"
                                        src="{{ asset('blogs/aianalyticsassessment.webp') }}" alt="" />
                                    <div class="p-3">
                                        <h2 class="text-[16px] font-[500] mt-[8px]">
                                            AI & Analytics Assessment
                                        </h2>
                                        <p
                                            class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                            Explore how understanding AI and analytics assessments can optimize business
                                            functions and
                                            customer behaviors.
                                        </p>
                                        <a href="{{ url('blog/ai-analytics-assessment') }}"
                                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                                            Learn more
                                        </a>
                                    </div>
                                </div>

                                <!-- Blog Item 4 -->
                                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                                    <img class="w-full h-[320px] object-cover rounded-t-[40px]"
                                        src="{{ asset('blogs/AI&Analytics.webp') }}" alt="" />
                                    <div class="p-3">
                                        <h2 class="text-[16px] font-[500] mt-[8px]">
                                            AI & Analytics Roadmap and Strategy
                                        </h2>
                                        <p
                                            class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                            The readiness assessment report for AI & Analytics aims to pinpoint any gaps in
                                            the adoption of
                                            AI across various business domains.
                                        </p>
                                        <a href="{{ url('blog/ai-analytics-roadmap-and-strategy') }}"
                                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                                            Learn more
                                        </a>
                                    </div>
                                </div>

                                <!-- Blog Item 5 -->
                                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                                    <img class="w-full h-[320px] object-cover rounded-t-[40px]"
                                        src="{{ asset('blogs/roleofdigitalmarketing.webp') }}" alt="" />
                                    <div class="p-3">
                                        <h2 class="text-[16px] font-[500] mt-[8px]">
                                            Role of Digital Marketing
                                        </h2>
                                        <p
                                            class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                            Learn why digital marketing is essential for the success of modern businesses
                                            and how it engages
                                            today's consumers.
                                        </p>
                                        <a href="{{ url('blog/role-of-digital-marketing') }}"
                                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                                            Learn more
                                        </a>
                                    </div>
                                </div>

                                <!-- Blog Item 6 -->
                                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                                    <img class="w-full h-[320px] object-cover rounded-t-[40px]"
                                        src="{{ asset('blogs/MLmodels.webp') }}" alt="" />
                                    <div class="p-3">
                                        <h2 class="text-[16px] font-[500] mt-[8px]">
                                            Key Challenges in Building and Deploying ML Models
                                        </h2>
                                        <p
                                            class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                            Uncover the challenges organizations face when building and deploying Machine
                                            Learning models to
                                            solve real-world problems.
                                        </p>
                                        <a href="{{ url('blog/key-challenges-in-building-and-deploying-ml-models') }}"
                                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                                            Learn more
                                        </a>
                                    </div>
                                </div>


                                <!-- Blog Item 7 -->
                                <div class="w-[320px] shadow shadow-[#0000001A] rounded-[24px] h-full flex-col flex">
                                    <img class="w-full h-[320px] object-cover rounded-t-[40px]"
                                        src="{{ asset('blogs/MahaShivratriday.webp') }}" alt="" />
                                    <div class="p-3">
                                        <h2 class="text-[16px] font-[500] mt-[8px]">
                                            Maha Shivratri and International Women's Day on the same day
                                        </h2>
                                        <p
                                            class="text-[14px] font-[400] mt-[12px] overflow-hidden max-h-[40px] text-ellipsis">
                                            Maha Shivratri and International Women's Day on the same day carries profound
                                            meaning. Maha
                                            Shivratri signifies the union of Shiva with Shakti, symbolizing the balance and
                                            harmony between
                                            masculine and feminine energies...
                                        </p>
                                        <a href="{{ url('blog/maha-shivratri-and-international-womens-day-on-the-same-day') }}"
                                            class="border py-[9px] flex items-center justify-center rounded-[24px] bg-gradient-to-r from-[#EDF6DB] to-[#C5D5A7] w-full mt-[6px] text-[20px] font-[600]">
                                            Learn more
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                                <!-- 3st  -->

                            </div>
                        </div>
                        <!-- 2.4 -->
                        {{-- <div class="flex flex-col mb-[200px] lg:mb-[50px] gap-[30px]">
                            {{-- <h3 class="lg:text-[32px] text-[16px] font-[500]">
                                Join Us on the Journey
                            </h3>
                            <h1 class="text-[20px] lg:text-[38px]">
                                Join us on the <span class="text-[#FF3131]">Jour</span><span
                                    class="text-[#6A9023]">ney</span>
                            </h1>
                            <p class="text-[12px] lg:text-[18px] font-[400] leading-[1.17em]">
                                Advisator is your companion to discover reliable and affordable digital and business expert
                                advice.
                                Whether you're here to seek advice, share your expertise, or
                                simply explore new possibilities, we invite you to join us on this
                                journey of growth, discovery, and transformation.
                            </p>
                            <img src="../src/assets/journey.jpg" alt="" />
                        </div> --}}
                    </div>
                    {{-- <h3 class="lg:text-[32px] text-[16px] font-[500]">Meet Our Team</h3> --}}
                    <h1 class="text-[20px] lg:text-[38px] mt-[2rem]">
                        Meet our <span class="text-[#FF3131]">te</span><span class="text-[#6A9023]">am</span>
                    </h1>
                    {{-- <div class="flex items-center gap-[15px] sm:gap-[30px] lg:gap-[84px] justify-center flex-wrap mb-32 sm:mb-0">

                        <!-- 1st -->
                        <div class="flex items-center flex-col text-center">
                            <img class="w-[80px] h-[80px] sm:w-[100px] sm:h-[100px] lg:w-[120px] lg:h-[120px] rounded-full border-2 border-gray-300  bg-white"
                                src="../src/assets/cto2.png" alt="Shuchi Rakheja" />
                            <h4 class="text-[12px] sm:text-[14px] lg:text-[18px] font-semibold mt-[10px]">Shuchi Rakheja
                            </h4>
                            <h6 class="text-[10px] sm:text-[12px] lg:text-[16px] font-normal text-gray-600">Founder & CEO</h6>
                        </div>
                        <!-- 2nd -->
                        {{-- <div class="flex items-center flex-col text-center">
                            <img class="w-[80px] h-[80px] sm:w-[100px] sm:h-[100px] lg:w-[120px] lg:h-[120px] rounded-full border-2 border-gray-300 bg-white"
                                src="../src/assets/cto3.png" alt="Puneet Rakheja" />
                            <h4 class="text-[12px] sm:text-[14px] lg:text-[18px] font-semibold mt-[10px]">Puneet Rakheja
                            </h4>
                            <h6 class="text-[10px] sm:text-[12px] lg:text-[16px] font-normal text-gray-600">CO-FOUNDER</h6>
                        </div> --}}
                    <!-- 3rd -->
                    {{-- -<div class="flex items-center flex-col text-center">
                            <img class="w-[80px] h-[80px] sm:w-[100px] sm:h-[100px] lg:w-[120px] lg:h-[120px] rounded-full border-2 border-gray-300 bg-white"
                                {{-- src="https://media.licdn.com/dms/image/v2/D5603AQGBcYDqMEvGig/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1714992305625?e=1736985600&v=beta&t=0Q3Fy82nNod_zyC5YJ9Ah9lTsvWYdP27LEfs_9oCztQ"
                                src="../src/assets/cto1.jpeg"
                                alt="Kunal Vashisht" />
                        {{-- -   <h4 class="text-[12px] sm:text-[14px] lg:text-[18px] font-semibold mt-[10px]">Kunal Vashisht
                            </h4>
                            <h6 class="text-[10px] sm:text-[12px] lg:text-[16px] font-normal text-gray-600">CTO</h6>
                        </div>
                    </div> ----- --}}
                    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-auto-fit gap-6 justify-center mb-32 lg:mb-0">
                        <!-- 1st Card -->
                        <div class="flex items-center rounded-lg p-4 border bg-white shadow-md">
                            <img class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] lg:w-[120px] lg:h-[120px] rounded-full border-2 border-gray-300"
                                src="../src/assets/cto2.png" alt="Shuchi Rakheja" />
                            <div class="flex-1 ml-4">
                                <h4 class="text-[14px] sm:text-[14px] lg:text-[18px] font-semibold">Shuchi Rakheja</h4>
                                <h6 class="text-[12px] sm:text-[12px] lg:text-[18px] font-bold text-gray-600">Founder & CEO
                                </h6>
                                <a href="https://in.linkedin.com/in/shuchirakheja" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                                    viewBox="0 0 48 48">
                                    <path fill="#0078d4"
                                        d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z">
                                    </path>
                                    <path
                                        d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z"
                                        opacity=".05"></path>
                                    <path
                                        d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z"
                                        opacity=".07"></path>
                                    <path fill="#fff"
                                        d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z">
                                    </path>
                                </svg>
                                <p class="text-[12px] sm:text-[12px] lg:text-[17px] font-normal text-gray-600">
                                    Shuchi is innovative and enterprising, with a solid track record in the data-driven
                                    business transformation,
                                    Machine Learning, and Advanced analytics domains.
                                    <span id="extra-text-1"
                                        class="hidden max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                        During dynamic 17+ years of corporate experience, she had the privilege of working
                                        with several top-tier
                                        IT consulting organizations - Hewlett-Packard, Accenture, KPMG, and TCS. She has
                                        been honored with awards
                                        like Innovation Pride by TCS, 3AI Pinnacle Awards 2023, and the coveted Indian
                                        Achievers Award 2023.
                                        A fervent believer in education, with credentials from renowned institutes like ISI
                                        Kolkata, IIM-B,
                                        Duke Corporate Education, and ISB. Shuchi's entrepreneurial spirit led her to found
                                        Shift180 in February 2023.
                                    </span>
                                    <a href="javascript:void(0)" onclick="toggleText('extra-text-1', this)"
                                        class="text-[#6A9023] hover:underline">
                                        Read More
                                    </a>
                                </p>
                            </div>
                        </div>

                        {{-- <!-- 2nd Card -->
                        <div class="flex items-center   rounded-lg p-4 ">
                            <img class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] lg:w-[120px] lg:h-[120px] rounded-full border-2 border-gray-300"
                                src="../src/assets/cto3.png" alt="Puneet Rakheja" />
                            <div class="flex-1 ml-4">
                                <h4 class="text-[14px] sm:text-[14px] lg:text-[18px] font-semibold">Puneet Rakheja</h4>
                                <h6 class="text-[12px] sm:text-[12px] lg:text-[16px] font-normal text-gray-600">Co-Founder</h6>
                                <a href="https://linkedin.com/in/puneet-rakheja" target="_blank" class="flex items-center mt-2 text-blue-600 hover:underline">
                                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM0 8h5V24H0V8zm7.5 0h4.86v2.34h.07c.68-1.29 2.33-2.65 4.8-2.65 5.13 0 6.08 3.37 6.08 7.74V24h-5V15.1c0-2.12-.04-4.85-2.96-4.85-2.97 0-3.43 2.32-3.43 4.7V24h-5V8z" />
                                    </svg>

                                </a>
                            </div>
                        </div> --}}

                        <!-- 3rd Card -->
                        <div class="flex items-center rounded-lg p-4 border bg-white shadow-md">
                            <img class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] lg:w-[120px] lg:h-[120px] rounded-full border-2 border-gray-300"
                                src="../src/assets/cto1.jpeg" alt="Kunal Vashisht" />
                            <div class="flex-1 ml-4">
                                <h4 class="text-[14px] sm:text-[14px] lg:text-[18px] font-semibold">Kunal Vashisht</h4>
                                <h6 class="text-[12px] sm:text-[12px] lg:text-[18px] font-bold text-gray-600">CTO</h6>
                                <a href="https://www.linkedin.com/in/kunal-vashisht-991bb6199/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                                viewBox="0 0 48 48">
                                <path fill="#0078d4"
                                    d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z">
                                </path>
                                <path
                                    d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z"
                                    opacity=".05"></path>
                                <path
                                    d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z"
                                    opacity=".07"></path>
                                <path fill="#fff"
                                    d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z">
                                </path>
                            </svg>
                        </a>
                                <p class="text-[12px] sm:text-[12px] lg:text-[17px] font-normal text-gray-600">
                                    As the CTO at Advisator, I lead the technology strategy and execution, playing a key
                                    role in driving innovation
                                    and delivering cutting-edge solutions in the B2C SaaS space.
                                    <span id="extra-text-2"
                                        class="hidden max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                        My responsibilities include:
                                        <br>
                                        1. Technology Vision: Developing and implementing a strategic technology roadmap
                                        aligned with business objectives.
                                        <br> 2. Product Development: Overseeing end-to-end product development lifecycle.
                                        <br> 3. Team Leadership: Building and leading a high-performing tech team.
                                        <br> 4. Tech Stack Management: Evaluating and selecting appropriate technologies.
                                        <br> 5. Data Security and Compliance: Ensuring privacy, security, and regulatory
                                        compliance.
                                    </span>
                                    <a href="javascript:void(0)" onclick="toggleText('extra-text-2', this)"
                                        class="text-[#6A9023] hover:underline">
                                        Read More
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>



                    <!-- bottom menu bar -->

                    <!-- bottom menu bar -->
                    @include('web.components.bottommenu')

                    <!-- side bar -->
                    @include('web.components.sidebar')
                </div>


            </div>
        </div>
        @include('web.components.footer')
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

        <script>
            function toggleText(id, link) {
                // Close all other expanded texts
                const allExtraText = document.querySelectorAll('.extra-text');
                allExtraText.forEach(text => {
                    if (text.id !== id) {
                        text.classList.add('hidden');
                        text.style.maxHeight = '0'; // Collapse other content
                        const siblingLink = text.nextElementSibling;
                        if (siblingLink) siblingLink.innerText = 'Read More';
                    }
                });

                // Toggle current clicked text
                const extraText = document.getElementById(id);
                if (extraText.classList.contains('hidden')) {
                    extraText.classList.remove('hidden');
                    extraText.style.maxHeight = extraText.scrollHeight + 'px'; // Expanding animation
                    link.innerText = 'Read Less';
                } else {
                    extraText.classList.add('hidden');
                    extraText.style.maxHeight = '0'; // Collapse with animation
                    link.innerText = 'Read More';
                }
            }
        </script>
    @endsection
