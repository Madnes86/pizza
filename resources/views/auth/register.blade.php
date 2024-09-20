<x-guest-layout>
    <head>
        <style>
            body {
                background-size: cover;
                background-position: center;
                font-family: 'Futura', sans-serif; /* Убедитесь, что у вас подключен шрифт Futura */
                margin: 0;
                padding: 0;
            }

            .form-container {
                background: rgba(255, 255, 255, 0.9); /* Полупрозрачный белый фон для формы */
                border-radius: 10px;
                padding: 2rem;
                max-width: 500px;
                margin: 2rem auto; /* Центрирование формы по вертикали и горизонтали */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .form-container input[type="text"],
            .form-container input[type="email"],
            .form-container input[type="password"] {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 0.5rem;
                margin-bottom: 1rem;
                width: 100%;
            }

            .form-container button {
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 0.5rem 1rem;
                cursor: pointer;
                font-size: 1rem;
            }

            .form-container button:hover {
                background-color: #0056b3;
            }

            .form-container a {
                color: #007bff;
                text-decoration: none;
            }

            .form-container a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Вы зарегестрированы?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Регистрация') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
