<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your profile information and password')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            
            <div class="flex items-center gap-6">
                @if ($photo) 
                    <div class="h-20 w-20 shrink-0 rounded-full overflow-hidden bg-gray-100">
                        <img src="{{ $photo->temporaryUrl() }}" class="h-full w-full object-cover">
                    </div>
                @elseif (auth()->user()->profile_photo_url ?? auth()->user()->profile_photo_path)
                    <div class="h-20 w-20 shrink-0 rounded-full overflow-hidden bg-gray-100">
                        <img src="{{ auth()->user()->profile_photo_url ?? (auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : '') }}" class="h-full w-full object-cover">
                    </div>
                @else
                    <div class="h-20 w-20 shrink-0 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center text-gray-500 text-xl font-bold">
                        {{ auth()->user()->initials() }}
                    </div>
                @endif
                
                <div class="flex-1">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-1">{{ __('Photo') }}</label>
                    <input type="file" wire:model="photo" accept="image/*" class="block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                </div>
            </div>

            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div>
                        <flux:text class="mt-4">
                            {{ __('Your email address is unverified.') }}

                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                {{ __('Click here to re-send the verification email.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save Profile') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

        <flux:separator class="my-6" />

        <div class="space-y-6">
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Update Password') }}</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
            </div>

            <form wire:submit="updatePassword" class="w-full space-y-6">
                <flux:input
                    wire:model="current_password"
                    :label="__('Current password')"
                    type="password"
                    required
                    autocomplete="current-password"
                />
                <flux:input
                    wire:model="password"
                    :label="__('New password')"
                    type="password"
                    required
                    autocomplete="new-password"
                />
                <flux:input
                    wire:model="password_confirmation"
                    :label="__('Confirm Password')"
                    type="password"
                    required
                    autocomplete="new-password"
                />

                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full">{{ __('Save Password') }}</flux:button>
                    </div>

                    <x-action-message class="me-3" on="password-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>
        </div>
    </x-settings.layout>
</section>
