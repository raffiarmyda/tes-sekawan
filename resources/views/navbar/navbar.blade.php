<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">POOL Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(auth()->user()->role == 'Master Admin')
                    <li class="nav-item">
                        <a class="nav-link {{($title === "Home") ? 'active' : ''}}" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($title === "User") ? 'active' : ''}}" aria-current="page" href="/user">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($title === "Driver") ? 'active' : ''}}" aria-current="page"
                           href="/driver">Data Driver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($title === "Vehicle") ? 'active' : ''}}" aria-current="page"
                           href="/vehicle">Data Vehicle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($title === "Order") ? 'active' : ''}}" aria-current="page" href="/order">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @endif
                @if(auth()->user()->role == 'Manager')
                    <li class="nav-item">
                        <a class="nav-link {{($title === "Order") ? 'active' : ''}}" aria-current="page" href="/order">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @endif
                @if(auth()->user()->role == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link {{($title === "Order") ? 'active' : ''}}" aria-current="page" href="/order/create_order">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
