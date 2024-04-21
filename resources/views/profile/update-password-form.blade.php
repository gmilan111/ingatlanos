<x-form-section submit="updatePassword">
    <x-slot name="title">
        @lang('messages.password_edit')
    </x-slot>

    <x-slot name="description">
        @lang('messages.password_description')
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password">@lang('messages.current_password')</x-label>
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password">@lang('messages.new_password')</x-label>
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation">@lang('messages.password_conf')</x-label>
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            @lang('messages.saved')
        </x-action-message>

        <x-button>
            @lang('messages.save')
        </x-button>
    </x-slot>
</x-form-section>
