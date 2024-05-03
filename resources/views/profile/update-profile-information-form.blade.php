<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        @lang('messages.profile_info')
    </x-slot>

    <x-slot name="description">
        @lang('messages.profile_edit')
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                       wire:model.live="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                <x-label for="photo" class="text-white">@lang('messages.profile_pic')</x-label>

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                         class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2 bg-second-main-color text-white border-0" data-mdb-ripple-init type="button" x-on:click.prevent="$refs.photo.click()">
                    @lang('messages.new_pic')
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-danger-button type="button" data-mdb-ripple-init class="mt-2 border-0" wire:click="deleteProfilePhoto">
                        @lang('messages.delete_pic')
                    </x-danger-button>
                @endif

                <x-input-error for="photo" class="mt-2"/>
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" class="text-white">@lang('messages.name')</x-label>
            <x-input id="name" type="text" class="mt-1 block w-full bg-main-color text-white" wire:model="state.name" required
                     autocomplete="name"/>
            <x-input-error for="name" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" class="text-white">@lang('messages.email')</x-label>
            <x-input id="email" type="email" class="mt-1 block w-full bg-main-color text-white" wire:model="state.email" required
                     autocomplete="username"/>
            <x-input-error for="email" class="mt-2"/>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    @lang('messages.email_verify')

                    <button type="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            wire:click.prevent="sendEmailVerification">
                        @lang('messages.email_verify_btn')
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        @lang('messages.new_email_verify')
                    </p>
                @endif
            @endif
        </div>

        @if($this->user->is_ingatlanos == 'm' && !$this->user->email_notification)
            <div class="col-span-6 sm:col-span-4">
                <label for="email_notification" class="flex items-center">
                    <x-input id="email_notification" wire:model="state.email_notification" type="checkbox"
                             value="{{true}}"/>
                    <span class="ms-2 text-sm text-gray-600">@lang('messages.newsletter')</span>
                </label>
            </div>
        @elseif($this->user->is_ingatlanos == 'm' && $this->user->email_notification)
            <div class="col-span-6 sm:col-span-4">
                <label for="email_notification_cancel" class="flex items-center">
                    <x-input id="email_notification_cancel" wire:model="state.email_notification_cancel" type="checkbox"
                             value="0"/>
                    <span class="ms-2 text-sm text-gray-600">@lang('messages.no_newsletter')</span>
                </label>
            </div>
        @endif

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3 text-white" on="saved">
            @lang('messages.saved')
        </x-action-message>

        <x-button wire:loading.attr="disabled" class="btn-second-main-color border-0" data-mdb-ripple-init  wire:target="photo">
            @lang('messages.save')
        </x-button>
    </x-slot>
</x-form-section>
