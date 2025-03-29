
<header class="bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('img/logo-paraclet.png') }}" alt="" width="125" height="65"></a>
            </div>
            <div class="col-7">
                <div id="social">
                    <ul>
                        <li>
                            @if(Auth::user())
                                <div class="dropdown">
                                    <button class="btn btn-light border-0 rounded-circle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #9fccff;">
                                        <i class="bi bi-person-circle text-primary" style="font-size: 1.75rem;"></i>
                                    </button>
                                    <ul class="dropdown-menu shadow-sm" aria-labelledby="userDropdown" style="min-width: 200px; border-radius: 5px;">
                                        <li class="ps-4 py-2" style="color: #001659;font-family: 'Roboto', sans-serif; font-weight: 500;">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="w-100">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                                    <i class="bi bi-power"></i> Déconnexion
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary text-white border-0" style="background-color: #001659; border-radius: 10px; padding: 0.5rem 1.5rem; font-family: 'Roboto', sans-serif; font-weight: 500;">
                                    Se Connecter
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</header>
<!-- /header -->
