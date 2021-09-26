<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- gender -->
            <div class="mt-4">
                <p>Gender : </p>

                <input id="laki-laki" class="block mt-1" type="radio" 
                name="gender" value="l" required />
                <label for="username">Laki laki</label><br>

                <input id="perempuan" class="block mt-1" type="radio" 
                name="gender" value="p" required />
                <label for="perempuan">Perempuan </label>

            </div>

            <!--ktp-->
            <div class="mt-4">
                <x-label for="ktp" :value="__('Nomor KTP')" />

                <x-input id="ktp" class="block mt-1 w-full" type="text" 
                name="no_ktp" :value="old('no_ktp')" required />
            </div>

            <!-- date of birth -->
            <div class="mt-4">
                <x-label for="date-of-birth" :value="__('Tanggal lahir')" />

                <x-input id="date-of-birth" class="block mt-1 w-full" type="date" 
                name="date_of_birth" :value="old('date_of_birth')" required />
            </div>

            <!-- phone number-->
            <div class="mt-4">
                <x-label for="date-of-birth" :value="__('Nomor Handphone')" />

                <x-input id="date-of-birth" class="block mt-1 w-full" type="text" 
                name="phone_number" :value="old('phone_number')" required />
            </div>

            <div class="mt-4">
                <label for="image">Foto diri (max 1mb) : </label>
                <input type="file" class="form-control" id="image" name="image"
                accept="image/png, image/gif, image/jpeg" />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
