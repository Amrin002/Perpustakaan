<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
            </ul>
            <form method="POST" class="d-flex" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark input-group-text" type="submit" id="basic-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</nav>