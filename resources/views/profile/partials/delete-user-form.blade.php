<section id="delete_account">
    <header class="p-4 sm:px-6">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
        <p class="text-sm text-red-600">
            Demo profile cannot be deleted!
        </p>
    </header>

    <hr class="border-gray-300">

    <div class="p-4 sm:px-6">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Delete Account') }}</x-danger-button>

        @if (session('status') === 'account-not-deleted')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="
                    $nextTick(() => {
                        document.querySelector('#delete_account').scrollIntoView({ behavior: 'smooth'});
                    });
                    setTimeout(() => show = false, 2000);
                "
                class="text-sm text-red-600"
            >{{ __('Not deleted!') }}</p>
        @endif
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <header class="p-4 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </header>

            <hr class="border-gray-300">

            <div class="p-4 sm:px-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="p-4 sm:px-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
