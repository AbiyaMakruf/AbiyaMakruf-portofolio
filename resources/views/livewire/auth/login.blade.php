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
    <div class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-accent-50">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-72 h-72 bg-primary-400/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-accent-400/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="relative z-10 w-full max-w-md p-6">
            <div class="overflow-hidden rounded-3xl border border-white/50 bg-white/80 shadow-2xl backdrop-blur-xl transition-all duration-300 hover:shadow-3xl">
                <div class="p-8 md:p-10">
                    <div class="mb-8 text-center space-y-2">
                        <a href="{{ route('home') }}" class="inline-block text-3xl font-bold tracking-tight bg-gradient-to-r from-primary-500 to-accent-500 bg-clip-text text-transparent hover:scale-105 transition-transform duration-300">
                            Abiya Makruf
                        </a>
                        <h2 class="text-2xl font-bold text-slate-800">{{ __('Welcome Back') }}</h2>
                        <p class="text-sm text-slate-600">{{ __('Please sign in to your account') }}</p>
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
                            <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-primary-500 to-accent-500 px-8 py-4.5 text-lg font-bold text-white shadow-xl shadow-primary-500/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary-500/50 hover:scale-[1.02] active:scale-[0.98]">
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
