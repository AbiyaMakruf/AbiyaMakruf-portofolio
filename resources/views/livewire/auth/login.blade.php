<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Log in') }} - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
</head>
<body class="antialiased">
    <div class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-[#CEF9FF] via-white to-[#D2F9E7]">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        
        <div class="relative z-10 w-full max-w-md p-6">
            <div class="overflow-hidden rounded-2xl border border-white/20 bg-white/70 shadow-2xl backdrop-blur-xl">
                <div class="p-8">
                    <div class="mb-8 text-center">
                        <a href="{{ route('home') }}" class="text-3xl font-bold tracking-tight text-[#125C78]">
                            AM.
                        </a>
                        <h2 class="mt-4 text-xl font-semibold text-slate-800">{{ __('Welcome Back') }}</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ __('Please sign in to your account') }}</p>
                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#00B3DB] hover:text-[#0A7396]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7m-7 7h18" /></svg>
                                {{ __('Back to home') }}
                            </a>
                        </div>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

                    <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                        @csrf

                        <!-- Email Address -->
                        <flux:input
                            name="email"
                            :label="__('Email address')"
                            :value="old('email')"
                            type="email"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="email@example.com"
                            class="bg-white/50"
                        />

                        <!-- Password -->
                        <div class="relative">
                            <flux:input
                                name="password"
                                :label="__('Password')"
                                type="password"
                                required
                                autocomplete="current-password"
                                :placeholder="__('Password')"
                                viewable
                                class="bg-white/50"
                            />

                            @if (Route::has('password.request'))
                                <flux:link class="absolute top-0 text-sm end-0 text-[#00B3DB] hover:text-[#0A7396]" :href="route('password.request')" wire:navigate>
                                    {{ __('Forgot password?') }}
                                </flux:link>
                            @endif
                        </div>

                        <!-- Remember Me -->
                        <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

                        <div class="flex items-center justify-end">
                            <button type="submit" class="w-full rounded-xl bg-[#125C78] px-8 py-3 font-semibold text-white shadow-xl shadow-[#125C78]/20 transition hover:-translate-y-1 hover:bg-[#0A7396]">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @fluxScripts
</body>
</html>
