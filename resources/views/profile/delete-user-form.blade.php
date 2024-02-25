<x-action-section>
    <x-slot name="title">
        {{ __('Fiók törlése') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Fiókjának végleges törlése.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('A fiók törlése után az összes erőforrás és adat véglegesen törlődik.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Fiók törlése') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Fiók Törlése') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Biztosan törölni szeretné fiókját? A fiók törlése után az összes erőforrás és adat véglegesen törlődik. Kérjük, adja meg jelszavát annak megerősítéséhez, hogy véglegesen törölni szeretné fiókját.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Jelszó') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Mégse') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Fiók Törlése') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
