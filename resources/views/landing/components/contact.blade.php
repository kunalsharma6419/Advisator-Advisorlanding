<section id="Contact" class="text-gray-600 body-font bg-gradient-to-r from-[#F7FFE9] to-[#fff]">

    <div class="container flex flex-col md:flex-row lg:max-w-5xl w-full px-5 py-12 md:py-24 mx-auto section"
        id="contact-form">
        <div class="md:w-1/3 w-full">
            <img class="w-[800px] h-[400px] rounded" src="./src/assets/contact.png" alt="" />
            <p class="leading-relaxed text-xl text-gray-900 mt-5">
                We're here to assist you! If you have any questions or need
                assistance, please feel free to reach out to us.
                <br /><br />

                <span class="inline-flex mt-6 justify-center sm:justify-start">
                </span>
            </p>
        </div>

        <div class="md:w-2/3 w-full mt-10 md:mt-0 pb-20 lg:pb-0 md:pl-28">
            <h1 class="text-[28px] text-center lg:text-left lg:text-[38px] font-extrabold mx-auto">
                Contact <span class="text-[#FF3131]">U</span><span class="text-[#6A9023]">S</span>
            </h1>
            <form action="{{ route('send.contact') }}" method="post" id="submit-contact-form">
                @csrf
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="name" class="leading-7 py-4 text-lg text-gray-900">Your Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full bg-white rounded border border-gray-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-900 py-1 px-1 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="email" class="leading-7 py-4 text-lg text-gray-900">Your Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full bg-white rounded border border-gray-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-900 py-1 px-1 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="message" class="leading-7 py-4 text-lg text-gray-900">Your Message</label>
                        <textarea id="message" name="message" required
                            class="w-full bg-white rounded border border-gray-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-900 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button type="submit"
                        class="rounded-lg flex items-center justify-center border-0 bg-[#ff3033] text-[28px] mt-[20px] px-6 py-3 text-white shadow-lg shadow-slate-300 transition hover:bg-[#b99c9c] hover:text-slate-900 dark:shadow-sm sm:py-2">Send
                        Message ✉
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
