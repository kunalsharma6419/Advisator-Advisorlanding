<div class="swiper swiper-meet-team h-[17rem] sm:h-[22rem] lg:h-[35rem] mt-5">
    <div class="swiper-wrapper">
        @foreach ($advisors as $advisor)
            <div class="swiper-slide">
                <a href="{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}">
                    <div
                        class="shadow-md flex flex-col items-center w-[140px] sm:w-[200px] lg:w-[290px] xl:w-[350px] h-[240px] sm:h-[300px] lg:h-[500px] rounded-xl">
                        <div style="background-image: url('./src/assets/meetTeam2.png');"
                            class="flex items-center justify-center w-full">
                            <img class="w-fit h-[110px] sm:h-[150px] lg:h-[300px]"
                                src="{{ $advisor->profile_photo_path ? asset('storage/' . $advisor->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                                alt="{{ $advisor->full_name }}" />
                        </div>
                        <div class="flex flex-col justify-between w-full p-1 sm:p-2 grow">
                            <div class="flex items-center justify-between text-xs">
                                <h2 class="text-[#2A2A2A] sm:text-base lg:text-xl">
                                    @if (Auth::check())
                                        {{ $advisor->full_name }}
                                    @else
                                        {{ $advisor->user_id }}
                                    @endif
                                </h2>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 lg:w-6 lg:h-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="#FFE500"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                    <p class="text-[#3A3A3A] smLtext-sm lg:text-base">
                                        {{ $advisor->rating }}</p>
                                </div>
                            </div>
                            <p
                                class="text-start text-[10px] sm:text-sm lg:text-base text-[#3A3A3A] font-normal mt-1s">
                                <span class="text-[#6A9023]">Industry:</span>
                                @foreach ($advisor->getIndustries() as $industry)
                                    {{ $industry->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                            <div
                                class="flex items-center sm:text-sm lg:text-base justify-between text-[10px] text-[#3A3A3A] font-medium">
                                <p>UID: {{ $advisor->user_id }}</p>
                                <p>{{ $advisor->is_super_advisor == 'true' ? 'Super Advisor' : 'Advisor' }}
                                </p>
                            </div>
                            <a href="{{ route('advisors.detail', ['advisor_id' => $advisor->user_id]) }}"
                                class="mt-2 font-medium text-[10px] sm:text-sm lg:text-base text-[#000000] w-full bg-gradient-to-r from-[#F7FFE9] to-[#D5E4B8] rounded-3xl py-2">
                                View Profile
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>