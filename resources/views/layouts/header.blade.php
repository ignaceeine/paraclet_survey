
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
                                    <button class="btn btn-circle bg-primary-subtle dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle text-primary fs-4"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-primary-subtle" aria-labelledby="userDropdown">
                                        <li class="text-primary ms-3">{{ Auth::user()->prenom }}</li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="bg-danger w-100">
                                            <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">Déconnexion</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">connexion</a>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#022d68;">
                <h5 class="modal-title" style="color: #fff;"  id="exampleModalLabel">Profil</h5>
                <button type="button" class="btn-close" style="color: #fff !important;" data-bs-dismiss="modal" aria-label="Close" >
                </button>
            </div>
            <div class="modal-body" style="color: black;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                sequi quaerat saepe odit laudantium, repellendus dolorem corporis lab
                orum dolores optio sed consequuntur
                reprehenderit nobis maiores et doloribus debitis deserunt magnam.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- /header -->
