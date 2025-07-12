<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-3">
    <div class="container-fluid">
        <button class="btn btn-outline-secondary d-lg-none" onclick="toggleSidebar()">
            ☰
        </button>

        <span class="navbar-brand ms-2">@yield('title', 'Admin Panel')</span>

        <div class="ms-auto d-flex align-items-center">
            <span class="me-3">Logged in as <strong>{{ Auth::user()->name }}</strong></span>
            <!-- Logout Modal Trigger -->
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                Logout
            </button>
        </div>
    </div>
</nav>
<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes, Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
