 <!-- Awal Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">Mu'adz Bayu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('home') ? "active" : ""}}" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="/">Product</a>
          </li>
        </ul>
        <!-- Logout - posisi kanan
        <span class="text-right text-white">
            <a href="#" class="a-logout">
                <i class="bi bi-box-arrow-right"></i> Logout</a>
        </span>
      -->
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->