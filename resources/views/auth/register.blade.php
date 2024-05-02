<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4"/>

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

        <h2 class="text-center mb-5">@lang('messages.registration')</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <div class="form-outline" data-mdb-input-init>
                    <input id="name" class="form-control login" type="text" name="name" required autocomplete="name"/>
                    <label for="name" class="form-label">@lang('messages.name')</label>
                </div>
            </div>

            <div class="mt-4">
                <div class="form-outline" data-mdb-input-init>
                    <input id="email" class="form-control login" type="email" name="email" required autocomplete="email"/>
                    <label for="email" class="form-label">@lang('messages.email')</label>
                </div>
            </div>

            <div class="mt-4">
                <div class="form-outline" data-mdb-input-init>
                    <input id="password" class="form-control login" type="password" name="password" required
                             autocomplete="new-password"/>
                    <label for="password" class="form-label">@lang('messages.password')</label>
                </div>
            </div>

            <div class="mt-4">
                <div class="form-outline" data-mdb-input-init>
                    <input id="password_confirmation" class="form-control login" type="password"
                             name="password_confirmation" required autocomplete="new-password"/>
                    <label for="password_confirmation" class="form-label">@lang('messages.password_conf')</label>
                </div>
            </div>

            <div class="mt-4">
                <div class="form-outline" data-mdb-input-init>
                    <input id="phone_number" class="form-control login" type="tel" name="phone_number"
                             pattern="[0-9]{2} [0-9]{2} [0-9]{3} [0-9]{4}" required
                             autocomplete="phone"/>
                    <label for="phone_number" class="form-label">@lang('messages.mobile_phone')</label>
                </div>
            </div>

            <div id="plus_agent" style="display: none">
                <div class="mt-4">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="commission" class="form-control login" type="text" name="commission"
                                 autocomplete="commission"/>
                        <label for="commission" class="form-label">@lang('messages.commission')</label>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="experience" class="form-control login" type="number" name="experience"
                                 autocomplete="experience"/>
                        <label for="experience" class="form-label">@lang('messages.experience')</label>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        {{--<button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#help" aria-expanded="false"
                                aria-controls="collapseExample" data-mdb-ripple-init>
                            @lang('messages.help_reg')
                        </button>
                        <div class="collapse" id="help">--}}
                        <label class="form-label text-black">@lang('messages.help_reg')</label>
                            <div class="card card-body bg-third-color shadow-custom">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="belsőépítész"
                                           name="help[]" id="belsőépítész">
                                    <label class="form-check-label" for="belsőépítész">
                                        @lang('messages.int_designer')
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="energetikai tanúsító"
                                           name="help[]" id="energetikai_tanúsító">
                                    <label class="form-check-label" for="energetikai_tanúsító">
                                        @lang('messages.energy_certificate')
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="építész"
                                           name="help[]" id="epitesz">
                                    <label class="form-check-label" for="epitesz">
                                        @lang('messages.architect')
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="földhivatali ügyintézés"
                                           name="help[]" id="foldhivatali_ugyintezes">
                                    <label class="form-check-label" for="foldhivatali_ugyintezes">
                                        @lang('messages.land_reg_administration')
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           value="hitelügyintézés"
                                           name="help[]" id="hitel">
                                    <label class="form-check-label" for="hitel">
                                        @lang('messages.credit_management')
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="közjegyző"
                                           name="help[]" id="kozjegyzo">
                                    <label class="form-check-label" for="kozjegyzo">
                                        @lang('messages.notary_public')
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="lakberendező"
                                           name="help[]" id="lakberendezo">
                                    <label class="form-check-label" for="lakberendezo">
                                        @lang('messages.decorator')
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="ügyvéd"
                                           name="help[]" id="ugyved">
                                    <label class="form-check-label" for="ugyved">
                                        @lang('messages.lawyer')
                                    </label>
                                </div>
                            </div>
                        {{--</div>--}}
                    </div>
                </div>
                <div class="mt-4">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="known_language" class="form-control login" type="text" name="known_language"
                                 autocomplete="known_language"/>
                        <label for="known_language" class="form-label">@lang('messages.language')</label>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="col">
                        <div class="form-outline" data-mdb-input-init>
                            <textarea class="form-control" id="description"
                                      name="description"></textarea>
                            <label for="description" class="form-label">@lang('messages.description')</label>
                        </div>
                    </div>
                </div>
            </div>

            <div id="plus_user" style="display: none">
                <div class="mt-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" onclick="newsletter()" id="email_notification" name="email_notification" value="{{true}}"/>
                        <label for="email_notification" class="form-check-label">@lang('messages.newsletter')</label>
                    </div>
                </div>

                <div class="mt-4" style="display: none" id="county">
                    <label class="text-black mb-2">@lang('messages.newsletter_county')</label>
                    <div>
                        <div class="card card-body shadow-custom bg-third-color">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Győr-Moson-Sopron"
                                               name="state[]" id="gyor_moson">
                                        <label class="form-check-label" for="gyor_moson">
                                            Győr-Moson-Sopron
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Vas"
                                               name="state[]" id="vas">
                                        <label class="form-check-label" for="vas">
                                            Vas
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Zala"
                                               name="state[]" id="zala">
                                        <label class="form-check-label" for="zala">
                                            Zala
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Komárom-Esztergom"
                                               name="state[]" id="komarom">
                                        <label class="form-check-label" for="komarom">
                                            Komárom-Esztergom
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Veszprém"
                                               name="state[]" id="veszprem">
                                        <label class="form-check-label" for="veszprem">
                                            Veszprém
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Somogy"
                                               name="state[]" id="somogy">
                                        <label class="form-check-label" for="somogy">
                                            Somogy
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Fejér"
                                               name="state[]" id="fejer">
                                        <label class="form-check-label" for="fejer">
                                            Fejér
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Tolna"
                                               name="state[]" id="tolna">
                                        <label class="form-check-label" for="tolna">
                                            Tolna
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Baranya"
                                               name="state[]" id="baranya">
                                        <label class="form-check-label" for="baranya">
                                            Baranya
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Pest"
                                               name="state[]" id="pest">
                                        <label class="form-check-label" for="pest">
                                            Pest
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Bács-Kiskun"
                                               name="state[]" id="bacs_kiskun">
                                        <label class="form-check-label" for="bacs_kiskun">
                                            Bács-Kiskun
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Nógrád"
                                               name="state[]" id="nograd">
                                        <label class="form-check-label" for="nograd">
                                            Nógrád
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Heves"
                                               name="state[]" id="heves">
                                        <label class="form-check-label" for="heves">
                                            Heves
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Jász-Nagykun-Szolnok"
                                               name="state[]" id="jasz">
                                        <label class="form-check-label" for="jasz">
                                            Jász-Nagykun-Szolnok
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Csongrád-Csanád"
                                               name="state[]" id="csongrad">
                                        <label class="form-check-label" for="csongrad">
                                            Csongrád-Csanád
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Borsod-Abaúj-Zemplén"
                                               name="state[]" id="borsod">
                                        <label class="form-check-label" for="borsod">
                                            Borsod-Abaúj-Zemplén
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Szabolcs-Szatmár-Bereg"
                                               name="state[]" id="szabolcs">
                                        <label class="form-check-label" for="szabolcs">
                                            Szabolcs-Szatmár-Bereg
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Hajdú-Bihar"
                                               name="state[]" id="hajdu">
                                        <label class="form-check-label" for="hajdu">
                                            Hajdú-Bihar
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               value="Békés"
                                               name="state[]" id="bekes">
                                        <label class="form-check-label" for="bekes">
                                            Békés
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="magan" name="user" onclick="plusinfo()" value="m" required
                           autocomplete="m">
                    <label for="magan" class="form-check-label text-black">@lang('messages.private_person')</label>
                </div>
            </div>

            <div class="mt-2">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="ingatlanos" onclick="plusinfo()" name="user" value="i" required
                           autocomplete="i">
                    <label for="ingatlanos" class="form-check-label text-black">@lang('messages.real_estate_agent')</label>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="w-100 btn btn-danger text-15 px-3 btn-second-main-color"
                        data-mdb-ripple-init> @lang('messages.registration')</button>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    @lang('messages.have_account')
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
