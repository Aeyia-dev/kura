<header class="site-header">
  <div class="container">
    <div class="header-container">
      <!-- Desktop navigation -->
      <nav class="desktop-nav">
        <ul>
          <li><a href="{{ route('society') }}">society</a></li>
          <li><a href="{{ route('about') }}">about</a></li>
          <li><a href="{{ route('contact') }}">contact</a></li>
        </ul>
      </nav>
    </div>

    <!-- Mobile header with logo and menu button -->
    <div class="mobile-header">
      <a href="{{ route('landing') }}" class="logo">AEYIA</a>
      <button id="mobile-menu-toggle" class="menu-toggle" aria-label="Toggle menu">
        <span class="menu-icon"></span>
      </button>
    </div>
  </div>
</header>