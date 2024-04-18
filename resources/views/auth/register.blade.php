<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Név') }}"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autocomplete="email"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Jelszó') }}"/>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Jelszó megerősítése') }}"/>
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                         name="password_confirmation" required autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-label for="phone_number" value="{{__('Telefonszám')}}"/>
                <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number"
                         placeholder="06 70 632 3578" pattern="[0-9]{2} [0-9]{2} [0-9]{3} [0-9]{4}" requied
                         autocomplete="phone"/>
            </div>

            <div id="plus_agent" style="display: none">
                <div class="mt-4">
                    <x-label for="commission" value="{{ __('Jutalék') }}"/>
                    <x-input id="commission" class="block mt-1 w-full" type="text" name="commission"
                             :value="old('commission')"
                             autocomplete="commission"/>
                </div>

                <div class="mt-4">
                    <x-label for="experience" value="{{ __('Tapasztalat') }}"/>
                    <x-input id="experience" class="block mt-1 w-full" type="number" name="experience"
                             :value="old('experience')"
                             autocomplete="experience"/>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#help" aria-expanded="false"
                                aria-controls="collapseExample">
                            Amiben segítséget tud nyújtani:
                        </button>
                        <div class="collapse" id="help">
                            <div class="card card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="belsőépítész"
                                           name="help[]" id="belsőépítész">
                                    <label class="form-check-label" for="belsőépítész">
                                        belsőépítész
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="energetikai tanúsító"
                                           name="help[]" id="energetikai_tanúsító">
                                    <label class="form-check-label" for="energetikai_tanúsító">
                                        energetikai tanúsító
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="építész"
                                           name="help[]" id="epitesz">
                                    <label class="form-check-label" for="epitesz">
                                        építész
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="földhivatali ügyintézés"
                                           name="help[]" id="foldhivatali_ugyintezes">
                                    <label class="form-check-label" for="foldhivatali_ugyintezes">
                                        földhivatali ügyintézés
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           value="hitelügyintézés"
                                           name="help[]" id="hitel">
                                    <label class="form-check-label" for="hitel">
                                        hitelügyintézés
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="közjegyző"
                                           name="help[]" id="kozjegyzo">
                                    <label class="form-check-label" for="kozjegyzo">
                                        közjegyző
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="lakberendező"
                                           name="help[]" id="lakberendezo">
                                    <label class="form-check-label" for="lakberendezo">
                                        lakberendező
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="ügyvéd"
                                           name="help[]" id="ugyved">
                                    <label class="form-check-label" for="ugyved">
                                        ügyvéd
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <x-label for="known_language" value="{{ __('Nyelvtudás') }}"/>
                    <x-input id="known_language" class="block mt-1 w-full" type="text" name="known_language"
                             :value="old('known_language')"
                             autocomplete="known_language"/>
                </div>

                <div class="mt-4">
                    <div class="col">
                        <x-label for="description" value="{{__('Leírás: ')}}"/>
                        <textarea class="block mt-1 w-full rounded border-gray-300" id="description"
                                  name="description"></textarea>
                    </div>
                </div>
            </div>

            <div id="plus_user" style="display: none">
                <div class="mt-4">
                    <label for="email_notification" class="flex items-center">
                        <x-input id="email_notification" name="email_notification" type="checkbox" value="{{true}}"/>
                        <span
                            class="ms-2 text-sm text-gray-600">Szeretnék kapni emailt új ingatlanok közzétételéről</span>
                    </label>
                </div>

                <div class="mt-4">
                    <x-label for="description" value="{{__('Válassza ki milyen vármegyékről szeretne hírlevelet: ')}}"/>
                    <div class="">
                        {{--<button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#state" aria-expanded="false"
                                aria-controls="collapseExample">
                            Vármegyék:
                        </button>
                        <div class="collapse" id="state" style="max-width: 650px">--}}
                        <div class="card card-body" {{--style="width: 650px"--}}>
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
                {{--</div>--}}
            </div>

            <div class="mt-4">
                <label for="magan" class="flex items-center">
                    <x-input id="magan" name="user" onclick="plusinfo()" type="radio" value="m" required
                             autocomplete="m"/>
                    <span class="ms-2 text-sm text-gray-600">Magánszemély</span>
                </label>
            </div>

            <div class="mt-4">
                <label for="ingatlanos" class="flex items-center">
                    <x-input id="ingatlanos" onclick="plusinfo()" name="user" type="radio" value="i" required
                             autocomplete="i"/>
                    <span class="ms-2 text-sm text-gray-600">Ingatlanos</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    {{ __('Van már fiókod?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Regisztrálás') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
