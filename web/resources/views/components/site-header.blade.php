<header class="site-header">
  <div class="container">
    <!-- Desktop header with logo and navigation -->
    <div class="header-flex-container">
      <div class="logo-header">
        <a href="/holding">
          <img src="/images/logos/aeyia_logo_black.png" alt="AEYIA Logo" style="height: 100px;">
        </a>
      </div>

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
    </div>

    <!-- Mobile header with logo and menu button -->
    <div class="mobile-header">
      <a href="/holding" class="logo">
        <img src="/images/logos/aeyia_logo_black.png" alt="AEYIA Logo" style="height: 80px;">
      </a>
      <button id="mobile-menu-toggle" class="menu-toggle" aria-label="Toggle menu">
        <span class="menu-icon"></span>
      </button>
    </div>
  </div>
</header>