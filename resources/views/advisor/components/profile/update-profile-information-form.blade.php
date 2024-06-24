<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <div class="grow border shadow-sm p-4 rounded-xl flex gap-6">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                           wire:model="photo"
                           x-ref="photo"
                           x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                           " />

                    <!-- Current Profile Photo -->
                    <div x-show="!photoPreview">
                        <img class="shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-[2rem] object-cover" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div x-show="photoPreview" style="display: none;">
                        <span class="block shrink-0 w-[70px] h-[70px] lg:w-[80px] lg:h-[80px] shadow-md rounded-[2rem] bg-cover bg-no-repeat bg-center"
                              x-bind:style="'background-image: url(' + photoPreview + ');'">
                        </span>
                    </div>

                    <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-secondary-button>
                    @endif

                    <x-input-error for="photo" class="mt-2" />
                </div>
            @endif

            <div class="grow">
                <form action="">
                    <!-- Name -->
                    <div class="w-full mb-6">
                        <x-label class="text-[#828282] font-normal text-base" for="name" value="{{ __('Full Name') }}" />
                        <x-input id="name" type="text" class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2" wire:model.defer="state.name" autocomplete="name" placeholder="Enter Full Name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="w-full mb-6">
                        <x-label class="text-[#828282] font-normal text-base" for="email" value="{{ __('Email Address') }}" />
                        <x-input id="email" type="email" class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2" wire:model.defer="state.email" autocomplete="username" placeholder="Enter Email Address" />
                        <x-input-error for="email" class="mt-2" />

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                            <p class="text-sm mt-2">
                                {{ __('Your email address is unverified.') }}

                                <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if ($this->verificationLinkSent)
                                <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        @endif
                    </div>

                    {{-- <!-- Number -->
                    <div class="w-full mb-6">
                        <x-label class="text-[#828282] font-normal text-base" for="number" value="{{ __('Number') }}" />
                        <div class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                            <select id="underline_select" class="outline-none">
                                <option selected>+91</option>
                                <option value="+92">+92</option>
                                <option value="+93">+93</option>
                                <option value="+94">+94</option>
                            </select>
                            <input type="number" placeholder="Enter Number" class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base outline-none w-full">
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="w-full mb-6">
                        <x-label class="text-[#828282] font-normal text-base" for="location" value="{{ __('Location') }}" />
                        <x-input id="location" type="text" class="text-[#3A3A3A] placeholder:text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2" wire:model.defer="state.location" placeholder="Enter Location" />
                        <x-input-error for="location" class="mt-2" />
                    </div>

                    <!-- Business Function -->
                    <div class="w-full mb-6">
                        <x-label class="text-[#828282] font-normal text-base" for="businessFunction" value="{{ __('Business functions') }}" />
                        <div id="businessFunction" class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                            <select id="underline_select" class="outline-none w-full">
                                <option selected>Business Growth, Business Legal</option>
                                <option value="Business Growth, Business Legal">Business Growth, Business Legal</option>
                                <option value="Finance management, Ecommerce">Finance management, Ecommerce</option>
                            </select>
                        </div>
                    </div>

                    <!-- Industry -->
                    <div class="w-full mb-6">
                        <x-label class="text-[#828282] font-normal text-base" for="industry" value="{{ __('Industry') }}" />
                        <div id="industry" class="flex gap-2 items-center font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                            <select id="underline_select" class="outline-none w-full">
                                <option selected>Finance management, Ecommerce</option>
                                <option value="Business Growth, Business Legal">Business Growth, Business Legal</option>
                                <option value="Finance management, Ecommerce">Finance management, Ecommerce</option>
                            </select>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="w-full mb-6">
                        <x-label class="text-[#828282] font-normal text-base" for="description" value="{{ __('Description') }}" />
                        <textarea id="description" class="text-base font-medium rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2" placeholder="Enter Description"></textarea>
                    </div>

                    <!-- LinkedIn Profile Link -->
                    <div class="w-full">
                        <x-label class="text-[#828282] font-normal text-base" for="linkedin" value="{{ __('LinkedIn Profile Link') }}" />
                        <div class="flex items-center justify-between text-[#3A3A3A] text-base font-medium outline-none rounded-lg mt-[6px] bg-[#FFFFFF] border border-[#E1E9D3] shadow-md w-[95%] lg:w-[90%] p-2">
                            <p>Are you a business Owner?</p>
                            <input checked id="disabled-checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 outline-none bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
