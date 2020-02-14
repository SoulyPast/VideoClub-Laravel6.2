<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/catalog') }}" style="color:#777"><span style="font-size:15pt">&#9820;</span> Videoclub</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Catálogo
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/create')}}">
                            <span>&#10010</span> Nueva película
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('category') && ! Request::is('category/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/category')}}">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            Category
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('category/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/category/create')}}">
                            <span>&#10010</span> New category
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('catalog/millor') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/millor')}}">
                            <span class="glyphicon glyphicon-fire"></span> Puntuades
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                        <form action="{{ url('/catalog/search') }}" method="get" style="display:inline">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="search" name="search" class="control">
                                    <span class="form-group-btn">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </span>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
