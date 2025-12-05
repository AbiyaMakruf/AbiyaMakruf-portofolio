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
<body class="antialiased font-sans text-slate-900 bg-slate-50">
    <div class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-slate-50 via-white to-primary-50">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        
        <div class="relative z-10 w-full max-w-md p-6">
            <div class="overflow-hidden rounded-2xl border border-white/50 bg-white/80 shadow-xl backdrop-blur-xl ring-1 ring-slate-900/5">
                <div class="p-8">
                    <div class="mb-8 text-center">
                        <a href="{{ route('home') }}" class="text-3xl font-bold tracking-tight text-slate-900 hover:text-primary-600 transition-colors">
                            Abiya Makruf
                        </a>
                        <h2 class="mt-4 text-xl font-semibold text-slate-900">{{ __('Welcome Back') }}</h2>
                        <p class="mt-2 text-sm text-slate-500">{{ __('Please sign in to your account') }}</p>
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-primary-600 hover:text-primary-700 transition-colors">
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
                            class="bg-white"
                        />

                        <!-- Password -->
                        <flux:input
                            name="password"
                            :label="__('Password')"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            class="bg-white"
                            viewable
                        />

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <flux:checkbox name="remember" :label="__('Remember me')" />
                            
                            @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-primary-600 hover:text-primary-700 hover:underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-2">
                            <flux:button variant="primary" type="submit" class="w-full justify-center !bg-primary-600 hover:!bg-primary-700 !border-transparent !text-white">
                                {{ __('Log in') }}
                            </flux:button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="mt-6 text-center text-xs text-slate-400">
                &copy; {{ date('Y') }} Abiya Makruf. All rights reserved.
            </p>
        </div>
    </div>
    @fluxScripts
</body>
</html>
