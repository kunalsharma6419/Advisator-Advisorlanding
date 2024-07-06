@extends('user.layouts.app')

@section('usercontent')
    <div class="w-full min-h-screen h-full relative overflow-hidden">
        <!-- header -->
        @include('user.components.mainheader')


        <div class="font-Roboto w-[90%] md:w-[90%] lg:w-[85%] mx-auto">
            <!-- page name -->
            @include('user.components.dashmenu')


            <!-- page for desktop view -->
            <div class="mb-[4rem]">
                <div class="hidden md:flex mt-6 w-full">
                    <div class="px-4 md:w-[12rem] lg:w-[20rem] xl:w-[25rem] shrink-0">
                        <div
                            class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl">
                            <div class="flex items-center justify-between">
                                <h5>Profile Information</h5>
                                <span class="text-lg lg:text-xl cursor-pointer">></span>
                            </div>
                            <p class="text-[#828282]">
                                Update your profile's information and email address
                            </p>
                        </div>
                    </div>
                    <div class="grow border shadow-sm p-4 rounded-xl flex gap-6">
                        <div>
                            <img class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-[2rem]"
                                src=" ../src/assets/img/profileImage.png" alt="" />
                        </div>
                        <div class="grow">
                            <form action="">
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="fullname">Full Name</label>
                                    <input type="text" placeholder="Enter Full Name" id="fullname"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2" />
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="Email">Email Address</label>
                                    <input type="email" placeholder="Enter Email Address" id="Email"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2" />
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="location">Location</label>
                                    <input type="text" placeholder="Enter location" id="locaiton"
                                        class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2" />
                                </div>
                                <div class="w-full mb-6">
                                    <label class="text-[#828282] font-normal text-base" for="Description">Business
                                        description</label>
                                    <br />
                                    <textarea
                                        class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2"
                                        name="" id="">
Enter Description</textarea
                    >
                  </div>

                  <!-- <div class="w-full">
                                <label class="text-[#828282] font-normal text-base" for="linkedin">LinkedIn Profile Link</label>
                                <div
                                class="flex items-center justify-between text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%]  p-2 ">
                                <p>Are you a business Owner?</p>
                                <input  checked id="disabled-checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                            </div> -->
                  <div
                    class="bg-[#FAFAFA] my-[1rem] w-full shadow-md p-4 rounded-xl flex justify-between items-center gap-2"
                  >
                    <p>Are you a business Owner?</p>
                    <input
                      checked
                      id="disabled-checked-checkbox"
                      type="checkbox"
                      value=""
                      class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="hidden md:flex mt-8">
            <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
              <div
                class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl"
              >
                <div class="flex items-center justify-between">
                  <h5>Interests</h5>
                  <span class="text-lg lg:text-xl cursor-pointer">></span>
                </div>
                <p class="text-[#828282]">
                  Select your preferred business functions and industry field
                </p>
              </div>
            </div>
            <div class="grow border shadow-sm p-5 rounded-xl">
              <div class="w-full mb-6">
                <label
                  class="text-[#828282] font-normal text-base"
                  for="businessFunction"
                  >Business functions</label
                >
                <div
                  id="businessFunction"
                  class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2"
                >
                  <select id="underline_select" class="outline-none w-full">
                    <option selected>Business Growth, Business Legal</option>
                    <option value="+92">Business Growth, Business Legal</option>
                    <option value="+92">Business Growth, Business Legal</option>
                  </select>
                </div>
              </div>
              <div class="w-full mb-6">
                <label
                  class="text-[#828282] font-normal text-base"
                  for="businessFunction"
                  >Industry</label
                >
                <div
                  id="businessFunction"
                  class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2"
                >
                  <select id="underline_select" class="outline-none w-full">
                    <option selected>Finance management, Ecommerce</option>
                    <option value="+92">Business Growth, Business Legal</option>
                    <option value="+92">Finance management, Ecommerce</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="hidden md:flex mt-8">
            <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
              <div
                class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl"
              >
                <div class="flex items-center justify-between">
                  <h5>Payment Information</h5>
                  <span class="text-lg lg:text-xl cursor-pointer">></span>
                </div>
                <p class="text-[#828282]">
                  Safely store your preferred payment method for seamless
                  transactions on your profile.
                </p>
              </div>
            </div>
            <div
              class="grow border flex flex-col justify-around shadow-sm p-5 rounded-xl"
            >
              <p class="text-[#828282] text-base font-medium">
                Add your payment information.
              </p>
              <button
                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold"
              >
                Add
              </button>
            </div>
          </div>
        </div>
        <div>
          <div class="hidden md:flex mt-8">
            <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
              <div
                class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl"
              >
                <div class="flex items-center justify-between">
                  <h5>Invoices</h5>
                  <span class="text-lg lg:text-xl cursor-pointer">></span>
                </div>
                <p class="text-[#828282]">View and download invoices.</p>
              </div>
            </div>
            <div
              class="grow border flex flex-col justify-around shadow-sm p-5 rounded-xl"
            >
              <p class="text-[#828282] text-base font-medium">Invoice</p>
              <button
                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold"
              >
                Download invoice
              </button>
            </div>
          </div>
        </div>
        <div>
          <div class="hidden md:flex mt-8">
            <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
              <div
                class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl"
              >
                <div class="flex items-center justify-between">
                  <h5>Customer Support</h5>
                  <span class="text-lg lg:text-xl cursor-pointer">></span>
                </div>
                <p class="text-[#828282]">Have queries? Ask us!</p>
              </div>
            </div>
            <div
              class="grow border flex flex-col gap-3 justify-around shadow-sm p-5 rounded-xl"
            >
              <p class="text-[#828282] text-base font-medium">
                Raise a ticket and tell us your queries, our support team will
                get back to you within 24 hours.
              </p>
              <button
                id="myBtn"
                class="w-fit bg-[#6A9023] shadow-md text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-base font-semibold"
              >
                Raise Ticket
              </button>
            </div>
          </div>
        </div>
        <div>
          <div class="hidden md:flex mt-8">
            <div class="px-4 md:w-[12rem] shrink-0 lg:w-[20rem] xl:w-[25rem]">
              <div
                class="flex flex-col gap-3 text-[#2A2A2A] font-medium text-base lg:text-lg w-full border shadow-sm p-4 bg-[#F5F5F5] rounded-xl"
              >
                <div class="flex items-center justify-between">
                  <h5 class="text-[#FF3131]">Delete account</h5>
                  <span class="text-lg lg:text-xl cursor-pointer">></span>
                </div>
                <p class="text-[#828282]">Permanently delete your account.</p>
              </div>
            </div>
            <div
              class="grow border flex flex-col justify-around gap-3 shadow-sm p-5 rounded-xl"
            >
              <p class="text-[#828282] text-base font-medium">
                Once your account is deleted, all of its resources and data will
                be permanently deleted.
              </p>
              <button
                class="w-fit bg-[#FF3131] text-[#FFFFFF] shadow-md py-2 px-6 rounded-[2rem] text-base font-semibold"
              >
                Delete Account
              </button>
            </div>
          </div>
        </div>

        <!-- page for mobile view -->
        <div class="md:hidden mt-[2rem] mb-[6rem] flex flex-col gap-[1.5rem]">
          <div class="w-[90%]s font-Roboto md:w-[95%]s lg:w-[90%]s mx-autos mt-[2rem]s p-2s" >
              <div class="flex flex-col md:flex-row gap-4">

                  <div class="flex flex-col gap-4 w-full md:w-[50%]">

                      <!-- profile -->
                      <div
                          class="transition-all duration-200 bg-[#FFF4ED] rounded-lg  shadow-lg cursor-pointer ">
                          <button type="button" id="question1" data-state="closed" class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">

                              <div class="flex gap-3 items-center">
                                  <img class="w-[60px] h-[60px] rounded-[2rem] shadow-md" src="../src/assets/img/profileImage.png" alt="">

                                  <div class="flex flex-col justify-between">
                                      <p class="text-base text-[#2A2A2A] font-semibold">Catherine Paize</p>
                                      <p class="text-sm text-[#828282] font-medium">Cath39@abc.com</p>
                                  </div>
                              </div>
                              <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                  class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                              </svg>
                          </button>
                          <div id="answer1" style="display:none">
                              <div class="w-full mx-auto h-[3rem] flex justify-between items-center">
                                  <div class="flex gap-2 items-center justify-start">

                                      <h5 class="ftext-[#3A3A3A] font-medium  text-sm sm:text-base">Personal Information</h5>
                                  </div>
                                  <div class="flex gap-2 items-center justify-end">
                                      <img class="w-6 h-6" src="../src/assets/icons/akar-icons_edit.png" alt="">
                                      <h6 class="text-[#3A3A3A] font-medium text-xs sm:text-sm">Edit</h6>
                                  </div>

                              </div>


                              <div class="w-[90%] md:w-[90%] lg:w-[85%] mx-auto mt-[1rem] mb-[3rem]">

                                  <div class="bg-[#FAFAFA]  shadow-md p-4 rounded-xl flex gap-6">
                                      <div>
                                          <img class="shrink-0 w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] shadow-md rounded-[2rem]" src="../src/assets/img/profileImage.png" alt="">
                                      </div>
                                      <div class="grow">
                                          <div>
                                              <div class="w-full mb-2">
                                                  <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Full Name</h5>
                                                  <h5 class="text-[#2A2A2A] font-medium text-sm sm:text-base">Risa</h5>
                                              </div>
                                              <div class="w-full mb-2">
                                                  <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Email</h5>
                                                  <h5 class="text-[#2A2A2A] font-medium text-sm sm:text-base">Cath39@abc.com</h5>
                                              </div>
                                              <div class="w-full mb-2">
                                                  <h5 class="text-[#828282] font-normal text-xs sm:text-sm">Location</h5>
                                                  <h5 class="text-[#2A2A2A] font-medium text-sm sm:text-base">Delhi, India</h5>
                                              </div>
                                          </div>


                                      </div>
                                  </div>
                                  <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                      <label class="text-[#828282] font-normal text-xs sm:text-sm" for="Description">Description</label>
                                      <textarea name="" id=""
                                      class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent"
                                      placeholder="Add Description"
                                      ></textarea>
                                </div>
                                <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                    <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                        for="businessFunction">Business functions</label>
                                    <div id="businessFunction">
                                        <select id="underline_select" class="outline-none w-full">
                                            <option selected>Business Growth, Business Legal</option>
                                            <option value="+92">Business Growth, Business Legal</option>
                                            <option value="+92">Business Growth, Business Legal</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                    <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                        for="Industry">Industry</label>
                                    <div id="Industry">
                                        <select id="underline_select" class="outline-none w-full">
                                            <option selected>Finance management, Ecommerce</option>
                                            <option value="+92">Business Growth, Business Legal</option>
                                            <option value="+92">Finance management, Ecommerce</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex flex-col gap-2">
                                    <label class="text-[#828282] font-normal text-xs sm:text-sm"
                                        for="profileLink">LinkedIn profile link</label>
                                    <input type="text" id="profileLink" placeholder="Enter LinkedIn profile link"
                                        class="text-[#2A2A2A] placeholder:text-[#2A2A2A] font-medium text-sm sm:text-base outline-none bg-transparent">
                                </div>
                                <div
                                    class="bg-[#FAFAFA] my-[1rem]  shadow-md p-4 rounded-xl flex justify-between items-center  gap-2">
                                    <p>Are you a business Owner?</p>
                                    <input checked id="disabled-checked-checkbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                </div>
                        </div>
                    </div>
                </div>


                <!-- Analytics -->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question2" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Analytics</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium">Check all your analytics here.</p>

                        </div>
                        <svg id="arrow2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer2" style="display:none">
                        <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">

                            <a href="./analytics.html">
                                <button
                                    class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                    View detailed analytics
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Interests-->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question3" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Interests</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium">Select your preferred business
                                functions and industry field.</p>
                        </div>

                        <svg id="arrow3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer3" style="display:none">
                        <div class="grow border shadow-sm p-5 rounded-xl">
                            <div class="w-full mb-6">
                                <label class="text-[#828282] font-normal text-sm sm:text-base"
                                    for="businessFunction">Business functions</label>
                                <div id="businessFunction"
                                    class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    <select id="underline_select" class="outline-none w-full text-sm sm:text-base">
                                        <option selected>Business Growth, Business Legal</option>
                                        <option value="+92">Business Growth, Business Legal</option>
                                        <option value="+92">Business Growth, Business Legal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full mb-6">
                                <label class="text-[#828282] font-normal text-sm sm:text-base"
                                    for="businessFunction">Industry</label>
                                <div id="businessFunction"
                                    class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                                    <select id="underline_select" class="outline-none w-full text-sm sm:text-base">
                                        <option selected>Finance management, Ecommerce</option>
                                        <option value="+92">Business Growth, Business Legal</option>
                                        <option value="+92">Finance management, Ecommerce</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- wallet -->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question4" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">My Wallet</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium">Recharge and check your wallet
                                balance.</p>

                        </div>
                        <svg id="arrow4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer4" style="display:none">
                        <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">

                            <a href="./mywallet.html">
                                <button
                                    class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                    View Wallet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>



                <!-- payment information -->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question5" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Payment Information</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Safely store your preferred
                                payment method for seamless transactions on your profile.</p>
                        </div>

                        <svg id="arrow5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer5" style="display:none">
                        <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                            <p class="text-[#828282] text-sm sm:text-base font-medium">Add your payment information.</p>
                            <button
                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Transaction History -->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question6" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Transaction History</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium">Check all your transactions here.</p>

                        </div>
                        <svg id="arrow6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A]">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer6" style="display:none">
                        <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">

                            <a href="./usertransactionhistory.html">
                                <button
                                    class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                    check Transaction History
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- invoise -->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question7" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Invoices</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">View and download invoices.
                            </p>
                        </div>

                        <svg id="arrow7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer7" style="display:none">
                        <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                            <p class="text-[#828282] text-sm sm:text-base font-medium">Invoice</p>
                            <button
                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                Download Invoice
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Customer Support -->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question8" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#2A2A2A] font-semibold">Customer Support</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Have queries? Ask us!</p>
                        </div>

                        <svg id="arrow8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer8" style="display:none">
                        <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                            <p class="text-[#828282] text-sm sm:text-base font-medium">Raise a ticket and tell us your
                                queries, our support team will get back to you within 24 hours. </p>
                            <button id="myBtnsm"
                                class="w-fit bg-[#6A9023] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                Raise Ticket
                            </button>
                        </div>
                    </div>
                </div>

                <!-- delete account -->
                <div
                    class="transition-all duration-200 bg-[#F5F5F5] rounded-lg  shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question9" data-state="closed"
                        class="flex items-center justify-between w-full px-2 lg:px-4 py-3 sm:p-3">
                        <div class="flex flex-col items-start">
                            <p class="text-sm sm:text-base text-[#FF3131] font-semibold">Delete Account</p>
                            <p class="text-xs sm:text-sm text-[#828282] font-medium text-start">Permanently delete your
                                account.</p>
                        </div>

                        <svg id="arrow9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 md:w-6 md:h-6 text-[#3A3A3A] shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer9" style="display:none">
                        <div class="grow border flex flex-col justify-around gap-3  shadow-sm p-5 rounded-xl ">
                            <p class="text-[#828282] text-sm sm:text-base font-medium">Once your account is deleted, all of
                                its resources and data will be permanently deleted. </p>
                            <button
                                class="w-fit bg-[#FF3131] text-[#FFFFFF] py-2 px-6 rounded-[2rem] text-sm sm:text-base font-semibold">
                                Delete Account
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>

    </div>

    <!-- bottom menu bar -->
    <div class="bg-[#FFFFFF] left-0 z-20 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full">
        <div class="h-full w-[85%] mx-auto flex justify-between items-center">
            <div class="flex flex-col items-center justify-center gap-1">
                <a href="../Home.html">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/home.png"
                        alt="">
                </a>
                <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Home</p>
            </div>
            <div class="flex flex-col items-center justify-center gap-1">
                <a href="./consultadvisor.html">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/constultadvisor.png"
                        alt="">
                </a>
                <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Consult Advisor</p>
            </div>
            <div></div>
            <div class="flex flex-col items-center justify-center gap-1">
                <a href="./advisorbooking.html">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/booking.png"
                        alt="">
                </a>
                <p class="font-semibold text-xs sm:text-sm text-[#C95555] hidden">Booking</p>
            </div>
            <div class="flex flex-col items-center justify-center gap-1">
                <a href="./userProfile.html">
                    <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/activeProfile.png"
                        alt="">
                </a>
                <p class="font-semibold text-xs sm:text-sm text-[#C95555] ">My Profile</p>
            </div>
        </div>

        <div
            class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]">
            <a href="./featuredadvisor.html" class="flex flex-col items-center justify-center gap-1">
                <img class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer" src="../src/assets/bottomNavbar/advisor.png"
                    alt="">
                <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">Featured Advisor</p>
            </a>
        </div>

    </div>

    <footer class="hidden md:block bg-[#FFFFFF] shadow-2xl border border-transparent mt-[2rem]">
        <div class="border border-[#EAEAEA] mb-4 w-full"></div>
        <div class="md:w-[95%] lg:w-[90%] mx-auto my-[2rem]">
            <div class="w-full flex items-center justify-between">
                <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                    © 2024 Advisator. All rights reserved.
                </h3>
                <h3 class="text-[#3A3A3A] font-normal text-base text-start">
                    info@advisator.in
                </h3>
            </div>
        </div>
    </footer>

    <!-- side bar -->
    <div
        class="sidebar absolute md:hidden flex justify-end z-20 top-0 transition-all left-full w-full min-h-screen h-full bottom-0">
        <div class="w-[70%] sm:w-[60%] bg-[#FFFFFF] h-full">
            <div class="w-[90%]s mx-auto flexs flex-col gap-4 py-[2rem]">
                <div class="flex justify-between items-center">
                    <a href="../Client pages/userProfile.html">
                        <div class="flex items-center gap-1 bg-[#FFF4ED] px-6 py-3 rounded-r-[30px]">
                            <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[3rem]"
                                src="../src/assets/img/profileImage.png" alt="" />
                            <div>
                                <h2 class="text-sm sm:text-base text-[#2A2A2A] font-medium">
                                    Radhika Sharma
                                </h2>
                                <h3 class="text-xs sm:text-sm text-[#828282] font-medium">
                                    radhikasharma@abc.com
                                </h3>
                            </div>
                        </div>
                    </a>
                    <div>
                        <img id="hideSideMenu" class="w-7 sm:w-8 cursor-pointer" src="../src/assets/img/cross.png"
                            alt="" />
                    </div>
                </div>

                <div class="mt-[2rem] border-t border-b border-[#E5E5E5] py-2 my-2">
                    <a href="../auth/advisornominationform.html">
                        <div class="ml-[2rem] flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/phone.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#BE7D00]">
                                Become an Advisor
                            </h2>
                        </div>
                    </a>
                </div>

                <div class="px-[2rem] py-2 flex flex-col gap-6">
                    <a href="../Client pages/consultadvisor.html">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="../src/assets/img/Consult Advisor.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Consult Advisor
                            </h2>
                        </div>
                    </a>
                    <a href="../Client pages/featuredadvisor.html">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="../src/assets/img/FeaturedAdvisor.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Featured Advisor
                            </h2>
                        </div>
                    </a>
                    <a href="../Client pages/advisorbooking.html">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/MyBookings.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                My Bookings
                            </h2>
                        </div>
                    </a>
                    <a href="../Client pages/mywallet.html">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Wallet.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Wallet
                            </h2>
                        </div>
                    </a>
                    <a href="../Client pages/blog.html">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Blogs.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Blogs
                            </h2>
                        </div>
                    </a>
                    <a href="../Client pages/aboutus.html">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Aboutus.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                About us
                            </h2>
                        </div>
                    </a>
                    <a href="">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]"
                                src="../src/assets/img/Customersupport.png" alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Customer support
                            </h2>
                        </div>
                    </a>
                    <a href="">
                        <div class="flex items-center gap-4">
                            <img class="w-[24px] h-[24px] sm:w-[30px] sm:h-[30px]" src="../src/assets/img/Logout.png"
                                alt="" />
                            <h2 class="font-medium text-sm sm:text-base text-[#2A2A2A]">
                                Logout
                            </h2>
                        </div>
                    </a>
                </div>
            </div>

            <div class="px-[2rem] py-2">
                <h3 class="text-sm sm:text-base text-[#2A2A2A] my-[1rem]">
                    Find us on:
                </h3>
                <div class="flex gap-5">
                    <img class="w-[30px] h-[30px]" src="../src/assets/img/instagram.png" alt="" />
                    <img class="w-[30px] h-[30px]" src="../src/assets/img/facebook.png" alt="" />
                    <img class="w-[30px] h-[30px]" src="../src/assets/img/linkedin.png" alt="" />
                    <img class="w-[30px] h-[30px]" src="../src/assets/img/youtube.png" alt="" />
                </div>
            </div>
        </div>
    </div>

    <!-- modal box -->
    <div id="myModal" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
        <!-- Background Overlay -->
        <div class="modal-overlay absolute w-full h-full bg-black opacity-50"></div>

        <div
            class="modal-content bg-white p-8 rounded shadow-lg relative z-10 w-full h-full md:h-auto md:w-[70%] lg:w-[65%]">
            <div class="flex items-center justify-between">
                <p class="text-[#526E1C] font-medium text-lg lg:text-xl">
                    Raise a Ticket
                </p>
                <img id="closeBtn" class="w-6 h-6 cursor-pointer" src=" ../src/assets/img/cross.png" alt="" />
            </div>
            <form class="mt-[2rem]">
                <div class="flex flex-col gap-2">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="subject">Subject</label>
                    <input
                        class="border border-[#AFCB7A] outline-none shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]"
                        type="text" />
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="subject">Describe
                        issue/query</label>
                    <textarea class="border border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF] text-[#3A3A3A]" name=""
                        rows="3" id=""></textarea>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label class="text-base lg:text-lg font-medium text-[#3A3A3A]" for="file">Attachments (Attach
                        files)</label>
                    <div
                        class="border flex justify-between items-center border-[#AFCB7A] shadow-md rounded-xl p-2 bg-[#FFFFFF]">
                        <input class="outline-none text-[#3A3A3A]" type="file" id="file" />
                        <label for="file">
                            <img class="w-5 h-5" src=" ../src/assets/icons/file.png" alt="" />
                        </label>
                    </div>
                </div>

                <div class="w-full flex items-center justify-end mt-4">
                    <button
                        class="bg-gradient-to-r from-[#6AA300] to-[#3F5713] text-lg lg:text-xl text-[#FFFFFF] font-semibold py-1 px-6 rounded-[24px]">
                        Submit Ticket
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>

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
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var btnsm = document.getElementById("myBtnsm");

        var span = document.getElementById("closeBtn");

        btn.onclick = function() {
            modal.classList.remove("hidden");

        };

        btnsm.onclick = function() {
            modal.classList.remove("hidden")
        }

        span.onclick = function() {
            modal.classList.add("hidden");
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.add("hidden");
            }
        };
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
