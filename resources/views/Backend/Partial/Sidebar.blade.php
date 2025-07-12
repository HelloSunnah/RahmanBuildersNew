<div class="sidebar d-flex flex-column position-fixed">
    <h4 class="text-center py-3 border-bottom border-secondary">Admin</h4>

    <a href="" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <i class="bi bi-people me-2"></i> Users
    </a>
    <a href="{{ route('admin.projects.index') }}">
        <i class="bi bi-gear me-2"></i> Settings
    </a>
    <a href="{{ route('admin.setup.index') }}">
        <i class="bi bi-gear me-2"></i> Setup

    </a>
    <a href="{{ route('admin.teams.index') }}">
        <i class="bi bi-gear me-2"></i> Team
    </a>
</div>
