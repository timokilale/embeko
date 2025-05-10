<div class="bg-dark text-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4">
        <img src="{{ asset('images/logo.png') }}" alt="Embeko Logo" class="img-fluid" style="max-width: 60px;">
        <div class="mt-2">Embeko Admin</div>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('admin.posts.index') }}" class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper me-2"></i> Posts
        </a>
        <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="fas fa-tags me-2"></i> Categories
        </a>
        <a href="{{ route('admin.events.index') }}" class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt me-2"></i> Events
        </a>
        <a href="{{ route('admin.downloads.index') }}" class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">
            <i class="fas fa-download me-2"></i> Downloads
        </a>
        <a href="{{ route('admin.exam-results.index') }}" class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.exam-results.*') ? 'active' : '' }}">
            <i class="fas fa-chart-bar me-2"></i> Exam Results
        </a>
        <a href="{{ route('admin.school-info.edit') }}" class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.school-info.*') ? 'active' : '' }}">
            <i class="fas fa-school me-2"></i> School Info
        </a>
    </div>
</div>
