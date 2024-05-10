<nav x-data="{ open: false }" class="bg-main-color ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 bg-main-color">

            <div class="hidden sm:flex sm:items-center sm:ms-6 ">

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                        class="inline-flex items-center bg-main-color custom-border px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    @if(Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img class="h-8 w-8 rounded-full object-cover"
                                             src="{{ Auth::user()->profile_photo_url }}"
                                             alt="{{ Auth::user()->name }}"/>
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                    </svg>
                                </button>
                            </span>
                        </x-slot>


                        <x-slot name="content" >
                            <!-- Account Management -->
                            {{--<div class="block px-4 py-2 text-xs text-gray-400">
                                @lang('messages.edit_profile')
                            </div>--}}
                            @if(auth()->user()->is_ingatlanos == 'm')
                                <x-dropdown-link href="{{ route('liked.index') }}">
                                    @lang('messages.liked_properties')
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('auctions_entered.index') }}">
                                    Regisztrált aukciók???????
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    @lang('messages.profile')
                                </x-dropdown-link>
                                <x-dropdown-link type="button" data-bs-toggle="modal" data-bs-target="#notificationSetting">
                                    @lang('messages.newsletter_settings')
                                </x-dropdown-link>

                            @else
                                <x-dropdown-link href="{{route('properties.own')}}">
                                    @lang('messages.own_properties')
                                </x-dropdown-link>
                                <x-dropdown-link href="{{route('auctions.own')}}">
                                    Saját aukciók
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    @lang('messages.profile')
                                </x-dropdown-link>
                                <x-dropdown-link type="button" data-bs-toggle="modal" data-bs-target="#agentSettings">
                                    Ingatlanos információk
                                </x-dropdown-link>
                            @endif
                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                                 @click.prevent="$root.submit();">
                                    @lang('messages.logout')
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden bg-main-color">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

