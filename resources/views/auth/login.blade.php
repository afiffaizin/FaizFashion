<x-guest-layout>
    <div class="flex flex-col items-center mb-8 text-center">
        {{-- <div class="h-24 w-24 bg-black rounded-full flex items-center justify-center mb-4 shadow-lg">
            <span class="text-white font-serif text-3xl font-bold">FF</span>
        </div> --}}

        <h2 class="text-3xl font-bold text-gray-900 uppercase tracking-widest font-serif">
            Faiz Fashion
        </h2>
        <p class="text-sm text-gray-500 mt-2 tracking-wide">
            Login sekarang.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Address')"
                class="uppercase text-xs font-bold tracking-wider text-gray-700" />
            <x-text-input id="email"
                class="block mt-2 w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm py-3"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')"
                class="uppercase text-xs font-bold tracking-wider text-gray-700" />

            <x-text-input id="password"
                class="block mt-2 w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm py-3"
                type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-black shadow-sm focus:ring-black" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-500 hover:text-black transition duration-200"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center py-3 bg-black hover:bg-gray-800 active:bg-gray-900 focus:ring-gray-900 uppercase tracking-widest text-white transition ease-in-out duration-150">
                {{ __('Log in') }}
            </x-primary-button>
        </div>


    </form>
</x-guest-layout>
