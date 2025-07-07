<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    @include('components.alert')

    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                {{ ucwords(auth()->user()->name) }}
            </button>
            <div class="dropdown-menu">
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#update-password">
                    Ubah Password
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn text-danger">Logout</button>
                </form>
            </div>
        </div>
</nav>

@include('components.update-password')
