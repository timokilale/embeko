<div class="bg-white text-black border-end border-dark" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4">
        <img src="{{ asset('images/logo.png') }}" alt="Embeko Logo" class="img-fluid" style="max-width: 60px;">
        <div class="mt-2">Embeko Admin</div>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.dashboard') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('admin.posts.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.posts.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-newspaper me-2"></i> Posts
        </a>
        <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.categories.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-tags me-2"></i> Categories
        </a>
        <a href="{{ route('admin.events.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.events.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-calendar-alt me-2"></i> Events
        </a>
        <a href="{{ route('admin.downloads.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.downloads.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-download me-2"></i> Downloads
        </a>
        <a href="{{ route('admin.exam-results.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.exam-results.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-chart-bar me-2"></i> Exam Results
        </a>
        <a href="{{ route('admin.school-info.edit') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.school-info.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-school me-2"></i> School Info
        </a>
        <a href="{{ route('admin.welcome-messages.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.welcome-messages.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-home me-2"></i> Homepage Welcome
        </a>
        <a href="{{ route('admin.leaders.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.leaders.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-user-tie me-2"></i> School Leadership
        </a>
        <a href="{{ route('admin.pages.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.pages.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-file-alt me-2"></i> Website Pages
        </a>

        <a href="{{ route('admin.messages.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.messages.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-envelope me-2"></i> Messages
        </a>

         <a href="{{ route('admin.fees.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.messages.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-dollar-sign me-2"></i> Fees
        </a>

        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action bg-white text-black border-bottom {{ request()->routeIs('admin.users.*') ? 'fw-bold text-decoration-underline' : '' }}">
            <i class="fas fa-users me-2"></i> Users
        </a>
    </div>
</div>
