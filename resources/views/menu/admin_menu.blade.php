<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item {{ request()->routeIs('news.create') }}">
                    <a class="nav-link" href="{{ route('news.create') }}">Создать новость</a>
                </li>
                <li class="nav-item {{ request()->routeIs('user.users') }}">
                    <a class="nav-link" href="{{ route('user.users') }}">Пользователи</a>
                </li>

                <li class="nav-item {{ request()->routeIs('source.index') }}">
                    <a class="nav-link" href="{{ route('source.index') }}">Ресурсы</a>
                </li>

                <li class="nav-item {{ request()->routeIs('source.parse') }}">
                    <a class="nav-link" href="{{ route('source.parse') }}">Парсить</a>
                </li>
                
            </ul>

            <!-- Right Side Of Navbar -->
          
        </div>
    </div>
</nav>