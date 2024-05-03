<x-action-section>
    <x-slot name="title">
        @lang('messages.delete_profile')
    </x-slot>

    <x-slot name="description">
        @lang('messages.final_delete_profile')
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-white">
            @lang('messages.final_delete_profile_description')
        </div>

        <div class="mt-5">
            <x-danger-button class="border-0" data-mdb-ripple-init wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                @lang('messages.delete_profile')
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                @lang('messages.delete_profile')
            </x-slot>

            <x-slot name="content">
                @lang('messages.delete_profile_confirmation')

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-label for="password" class="text-white">@lang('messages.password')</x-label>
                    <x-input type="password" class="mt-1 block w-3/4 bg-main-color"
                                autocomplete="current-password"
                                x-ref="password"
                                id="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" data-mdb-ripple-init class="border-0 me-3" wire:loading.attr="disabled">
                    @lang('messages.cancel')
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" class="border-0" data-mdb-ripple-init wire:loading.attr="disabled">
                    @lang('messages.delete_profile')
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
