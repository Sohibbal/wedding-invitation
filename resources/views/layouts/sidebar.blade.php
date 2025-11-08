<div class="sidebar">
    <a href="{{ route('dashboard.main') }}" class="dash" style="text-decoration: none;">
        <h1 class="text-danger">DASHBOARD</h1>
    </a>
    
    <!-- Data Tamu Link -->
    <a href="{{ route('dashboard') }}" id="dataTamuLink" class="{{ request()->is('dashboard/guest') ? 'active' : '' }}">
        <i class="fas fa-table"></i> Data Tamu
    </a>

    <!-- Dropdown Edit -->
    <div class="dropdown-horizontal">

    <a href="" id="editToggle" class="d-flex justify-content-between align-items-center">
        <span><i class="fas fa-edit"></i> Edit</span>
        <i class="fas fa-chevron-down ms-2" id="editArrow" style="cursor: pointer;"></i>
    </a>

    <div class="submenu-horizontal d-none" id="editSubmenu">
        <a href="{{ route('dashboard.edit.cover') }}" data-target="cover-form">
            <i class="fas fa-image"></i> Cover
        </a>
        <a href="{{ route('dashboard.edit.pengantar') }}" data-target="pengantar-form">
            <i class="fas fa-file-text"></i> Pengantar
        </a>
        <a href="{{ route('dashboard.edit.home') }}" data-target="home-form">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="{{ route('dashboard.edit.info') }}" data-target="info-form">
            <i class="fas fa-info-circle"></i> Info
        </a>
        <a href="{{ route('dashboard.edit.story') }}" data-target="story-form">
            <i class="fas fa-heart"></i> Story
        </a>
        <a href="{{ route('dashboard.edit.galeri') }}" data-target="galeri-form">
            <i class="fas fa-images"></i> Galeri
        </a>
        <a href="{{ route('dashboard.edit.gift') }}" data-target="gifts-form">
            <i class="fas fa-gift"></i> Gifts
        </a>
    </div>
</div>

    <hr>
    
    <!-- User Profile -->
    <a href="{{ route('profile.edit') }}" class="{{ request()->is('profile/edit') ? 'active' : '' }}">
        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
    </a>
    
    <!-- Logout -->
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

