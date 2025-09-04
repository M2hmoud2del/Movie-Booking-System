
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film me-2"></i>CineMax Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="https://ui-avatars.com/api/?name=User+Name&background=dc3545&color=fff"
                                class="user-avatar" alt="User Avatar">
                                <h5 style="display: inline-block">{{Auth::user()->name}}</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>