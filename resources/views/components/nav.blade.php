<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('admin.home') }}">🍰</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('shop.home') }}">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('orders.index') }}">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('chefs.index') }}">Chefs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('reviews.index') }}">Reviews</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categores
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('categories.index') }}">List</a></li>
            <li><a class="dropdown-item" href="{{ route('categories.create') }}">Create</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cakes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('cakes.index') }}">List</a></li>
            <li><a class="dropdown-item" href="{{ route('cakes.create') }}">Create</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>