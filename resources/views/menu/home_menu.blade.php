<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
              <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Главная</a>
              </li>
              <li class="nav-item {{ request()->routeIs('news.categories') || 
                                  request()->routeIs('news.category') ||
                                  request()->routeIs('news.newsOne')
                                  ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('news.categories') }}">Новости</a>
              </li>
              <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('about') }}">О нас</a>
              </li>
              <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.index') }}">Админка</a>
              </li>
          </ul>

     
         
      </div>
  </div>
</nav>




