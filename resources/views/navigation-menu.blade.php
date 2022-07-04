<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class=" mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex justify-start h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center me-2">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('favicon.ico') }}" />
                    </a>
                </div>
            </div>
            <!-- Search bar -->
            <form id="searchform" class="d-flex col-xl-9 col-lg-8 col-md-9 col-9 py-2 m-1" method="get" action="{{ route('search') }}">
                <input id="search" name="search" class="form-control" type="search" placeholder="Buscar items" aria-label="Search" required>
                <a id='lupa'><svg class="searchIcon" width="2.2em" height="2.2em" class="icon icon--search" viewBox="0 0 480 480">
                        <path transform="rotate(-45, 328, 222)" fill="none" stroke="grey" stroke-width="50" stroke-linecap="round" d="M0,10 m250,250 a110,110 0 1,0-1,0 l0,140"></path>
                    </svg>
                </a>
            </form>

            <div class="hidden sm:flex sm:items-center sm:ml-6 ms-auto">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    @if(Auth::user())
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>
                        
                        <x-slot name="content">
                            @if (Auth::user()->state == 3)
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administrador') }}
                                </div>
                                <x-jet-dropdown-link href="{{ route('panel') }}">
                                    {{ __("Panell d'administrador") }}
                                </x-jet-dropdown-link>
                            @endif   

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Productes') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('items.create') }}">
                                {{ __('Pujar producte') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('items') }}">
                                {{ __('Veure productes') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('items-user') }}">
                                {{ __('Els meus productes') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Compte') }}
                            </div>

                            <x-jet-dropdown-link href="#" data-bs-toggle="modal" data-bs-target="#userModal">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Sortir') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    @else
                    <div class=" navbar-collapse justify-content-end" id="">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item w-auto mx-2">
                                <a class="nav-link btn btn-outline-success link-dark inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition" href="/login">Iniciar Sesió</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if(Auth::user())
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            @endif

            <div class="mt-3 space-y-1">
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Productes') }}
                </div>
                <x-jet-dropdown-link href="{{ route('items.create') }}">
                    {{ __('Pujar producte') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('items') }}">
                    {{ __('Veure productes') }} 
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('items-user') }}">
                    {{ __('Els meus productes') }} 
                </x-jet-dropdown-link>
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Compte') }}
                </div>
                <x-jet-responsive-nav-link href="#" data-bs-toggle="modal" data-bs-target="#userModal">
                    {{ __('Perfil') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Sortir') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-jet-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-jet-responsive-nav-link>
                @endcan

                <div class="border-t border-gray-200"></div>

                <!-- Team Switcher -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Contact Modal -->
    @if (Auth::user())
    <div class="modal" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Perfil</h5>
                    @if(Auth::user())
                    <button type="button" class="btn btn-outline-success edituserprofile">Editar</button>
                    <button type="button" class="btn btn-outline-success hidden user-edit-mini canceluserprofile">Cancel·lar</button>
                    @endif
                </div>
                <div class="modal-body container-fluid">
                    <form action="/user/editprofile" class="row" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="col-6">
                            <img src="{{ Auth::user()->profile_photo_path }}" alt="Perfil" class="avatar-user ms-3 user-mini-avatar">
                            <input type="file" name="profile_photo_path" class="hidden user-edit-mini form-control mt-1 user-mini-avatar-input">
                        </div>
                        <div class="col-6">
                            <div class="h3"><b>{{ Auth::user()->name }}</b></div>
                            <hr>
                            <textarea  class="form-control customshadow user-edit-mini hidden user-descriptionf" name="description" ></textarea>
                            @if (Auth::user()->description == null)
                            <div class="user-descriptionm">No s'ha proporcionat informació</div>
                            @else
                            <div class="user-descriptionm" class="my-2">{{ Auth::user()->description }}</div>
                            @endif
                            <hr>
                            <div class="h6 mt-2"><b>Email de contacte</b></div>
                            <div class="mb-2">{{ Auth::user()->email }}</div>
                            <hr>
                            <div class="h6 mt-2"><b>Altres vies de contacte</b></div>
                            @if(Auth::user()->instagram == null)
                            <div>Instagram: <input class="customimput form-control customshadow hiden user-edit-mini user-instagramf" type="text" name="instagram" value=""><span class="user-instagramm">---</span></div>
                            @else
                            <div>Instagram: <input class="customimput form-control customshadow hiden user-edit-mini user-instagramf" type="text" name="instagram" value=""><span class="user-instagramm">{{ Auth::user()->instagram }}</span></div>
                            @endif
                            @if(Auth::user()->whatsapp == null)
                            <div>Whatsapp: <input class="customimput form-control customshadow hiden user-edit-mini user-whatsappf" type="number" name="whatsapp" value=""><span class="user-whatsappm">---</span></div>
                            @else
                            <div>Whatsapp: <input class="customimput form-control customshadow hiden user-edit-mini user-whatsappf" type="number" name="whatsapp" value=""><span class="user-whatsappm">{{ Auth::user()->whatsapp }}</span></div>
                            @endif
                            @if(Auth::user()->o_contact == null)
                            <div>Opcional: <input class="customimput form-control customshadow hiden user-edit-mini user-o_contactf" type="text" name="o_contact" value=""><span class="user-o_contactm">---</span></div>
                            @else
                            <div>Opcional: <input class="customimput form-control customshadow hiden user-edit-mini user-o_contactf" type="text" name="o_contact" value=""><span class="user-o_contactm">{{ Auth::user()->o_contact }}</span></div>
                            @endif
                            <div class="flex items-center justify-end mt-2 hidden user-edit-mini">
                                <input type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 nav-link btn btn-outline-success" value="Enviar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 nav-link btn btn-outline-success" data-bs-dismiss="modal">Tancar</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</nav>