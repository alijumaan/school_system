<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Full name -->
        <div>
            <x-input-label for="full_name" :value="__('validation.attributes.full_name')" />
            <x-text-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')" />
            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('validation.attributes.phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- National ID -->
        <div class="mt-4">
            <x-input-label for="national_id" :value="__('validation.attributes.national_id')" />
            <x-text-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="old('national_id')" />
            <x-input-error :messages="$errors->get('national_id')" class="mt-2" />
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('validation.attributes.age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('validation.attributes.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Birth Date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('validation.attributes.birth_date')" />
            <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('validation.attributes.password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('validation.attributes.password_confirmation')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('') }}
                {{ __('global.already_registered') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('global.register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
