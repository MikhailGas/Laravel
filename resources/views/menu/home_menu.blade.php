<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Новости</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item 
            @if ($current == 'Главная')
                active
            @endif
        ">
            <a class="nav-link" href="{{ route('home') }}">Главная
                
            </a>
        </li>
        <li class="nav-item
            @if ($current == 'Новости')
                active
            @endif
        ">
        <a class="nav-link" href="{{ route('news.categories') }}">Новости</a>
        </li>
        <li class="nav-item
            @if ($current == 'О нас')
                active
            @endif
        ">
          <a class="nav-link" href="{{ route('about') }}">О нас</a>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Админка
            </a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{ route('admin.index') }}">Админка</a>
            <a class="dropdown-item" href="{{ route('admin.test1') }}">Тест1</a>
            <a class="dropdown-item" href="{{ route('admin.test2') }}">Тест2</a>
          </div>
        </li>
      </ul>
      
    </div>
  </nav>




