<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4"/>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <style>
            /* unfocused borders and label*/

            .form-outline .form-control ~ .form-notch .form-notch-trailing {
                border-top: .125rem solid var(--main-color);
                border-right: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
            }

            .form-outline .form-control ~ .form-notch .form-notch-middle {
                border-bottom: .125rem solid var(--main-color);
                border-top: .125rem solid var(--main-color);
            }

            .form-outline .form-control ~ .form-notch .form-notch-leading {
                border-top: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
                border-left: .125rem solid var(--main-color);
            }

            .form-outline .form-control ~ .form-label {
                color: var(--main-color);
            }


            /* focused borders and label*/
            .form-outline .form-control:focus ~ .form-notch .form-notch-leading {
                border-top: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
                border-left: .125rem solid var(--main-color);
            }

            .form-outline .form-control:focus ~ .form-notch .form-notch-trailing {
                border-top: .125rem solid var(--main-color);
                border-right: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
            }

            .form-outline .form-control:focus ~ .form-notch .form-notch-middle {
                border-top: 0;
                border-bottom: .125rem solid var(--main-color);
            }

            .form-outline .form-control:focus ~ .form-label {
                color: var(--main-color);
            }
        </style>

        <h1 class="text-center mb-5">@lang('messages.login')</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <div class="form-outline " data-mdb-input-init>
                    <input type="email" class="form-control login" id="email" name="email" required/>
                    <label class="form-label"
                           for="email">@lang('messages.email')</label>
                </div>
            </div>

            <div class="mt-4">
                <div class="form-outline" data-mdb-input-init>
                    <input id="password" class="form-control login" type="password" name="password" required/>
                    <label for="password" class="form-label">@lang('messages.password')</label>
                </div>

            </div>


            <div class="flex items-center mt-4">
                <button class="w-100 btn btn-danger text-15 px-3 btn-second-main-color"
                        data-mdb-ripple-init> @lang('messages.login')</button>
            </div>

            <div class="d-flex justify-content-center mt-3">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('register') }}">
                        @lang('messages.no_account_yet')
                    </a>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
