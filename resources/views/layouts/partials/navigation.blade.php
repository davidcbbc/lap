<div class="site-navbar mt-4">
    <div class="container py-1">
      <div class="row align-items-center">
        <div class="col-8 col-md-8 col-lg-4">
          <h1 class="mb-0"><a href="/" class="text-white h2 mb-0"><strong>UFP eSPORTS<span class="text-primary">.</span></strong></a></h1>
        </div>
        <div class="col-4 col-md-4 col-lg-8">
          <nav class="site-navigation text-right text-md-right" role="navigation">

            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

            <ul class="site-menu js-clone-nav d-none d-lg-block">
                @guest
                @yield('inicio')
                <a href="/">Início</a>
                @else
                    @yield('inicio')
                    <a href="/">Torneios</a>
                @endguest


              </li>

                @yield('equipas')
                <a href="/equipas">Equipas</a>
                </li>

                @guest


                    @yield('login')
                    <a href="/login">Entrar</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{'/users/'.Auth::user()->id}}">Perfil</a>
                            <a class="dropdown-item" href="/notificacoes">Notificações</a>
                            <a class="dropdown-item" href="{{route('home')}}">Definições</a>
                            <div class="dropdown-divider"></div>
                            @if(Auth::user()->equipa_id != null)
                            <a class="dropdown-item" href="{{'/equipas/'.Auth::user()->equipa->id}}">{{Auth::user()->equipa->nome}}</a>
                            @else
                                <a class="dropdown-item" href="{{'/equipa/create'}}">Criar equipa</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest
            </ul>
          </nav>
        </div>


      </div>
    </div>
  </div>
</div>
