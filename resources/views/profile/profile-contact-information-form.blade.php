<x-jet-form-section submit="updateProfileContactInformation">
    <x-slot name="title">
        {{ __('Profile Contact Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile contact information.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
