@auth
  <div class="row">
    <nav class="navbar col-md-2 bg-light" role="Navigiation">
      <span class="navbar-brand mb-0 h1">MilliSeconde</span>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?=action('ProductController@index');?>">Producten</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=action('CategoryController@index');?>">Categorieëen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=action('OrderController@index');?>">Bestellingen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=action('UserController@index');?>">Gebruikers</a>
        </li>
      </ul>
    </nav>
  </div>
@else
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="col-md-3 offset-1">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <a class="navbar-brand" href="#">MilliSeconde</a>
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Over Ons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Contact</a>
        </li>
      </ul>
    </div>
    <div class="col-md-2 offset-6">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?=action('Auth\LoginController@showLoginForm');?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=action('Auth\RegisterController@showRegistrationForm');?>">Registreren</a>
        </li>
      </ul>
    </div>
  </nav>
@endauth