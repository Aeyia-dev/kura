<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="mobile-menu-overlay">
  <div class="mobile-menu-header">
    <a href="{{ route('landing') }}" class="mobile-logo">
      <img src="/images/landing/aeyia-logo-white.png" alt="AEYIA Logo" style="height: 4rem;">
    </a>
    <button id="mobile-menu-close" class="mobile-menu-close">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
  
  <div class="mobile-menu-content">
    <nav class="mobile-nav">
      <a href="{{ route('landing') }}" onclick="closeMobileMenu()">Home</a>
      <a href="{{ route('society') }}" onclick="closeMobileMenu()">Society</a>
      <a href="{{ route('about') }}" onclick="closeMobileMenu()">About</a>
      <a href="{{ route('contact') }}" onclick="closeMobileMenu()">Contact</a>
    </nav>
  </div>
  
  <div class="mobile-menu-footer">
    <div class="mobile-social-icons">
      <a href="//www.facebook.com/aeyia.au" class="mobile-social-icon" target="_blank">
        <img src="/images/landing/social-facebook.png" alt="Facebook">
      </a>
      <a href="//www.instagram.com/aeyia_/" class="mobile-social-icon" target="_blank">
        <img src="/images/landing/social-instagram.png" alt="Instagram">
      </a>
      <a href="//www.youtube.com/@AEYIAWellness" class="mobile-social-icon" target="_blank">
        <img src="/images/landing/social-youtube.png" alt="YouTube">
      </a>
    </div>
    <div class="mobile-copyright">
      <p>&copy; AEYIA {{ date('Y') }}</p>
    </div>
  </div>
</div>

<script>
  // Add this script if it's not already included elsewhere
  document.addEventListener('DOMContentLoaded', function() {
    // Define the initialization function
    window.initMobileMenu = function() {
      console.log('Mobile menu init called');
      const mobileMenu = document.getElementById('mobile-menu');
      const menuToggle = document.getElementById('mobile-menu-toggle');
      const menuClose = document.getElementById('mobile-menu-close');
      
      // Function to open mobile menu
      function openMobileMenu() {
        console.log('Opening mobile menu');
        mobileMenu.classList.add('active');
        document.body.classList.add('mobile-menu-open');
      }

      // Function to close mobile menu
      function closeMobileMenu() {
        mobileMenu.classList.remove('active');
        document.body.classList.remove('mobile-menu-open');
      }

      // Add event listeners
      if (menuToggle) {
        console.log('Adding click listener to menu toggle');
        menuToggle.addEventListener('click', openMobileMenu);
      } else {
        console.log('Menu toggle not found');
      }

      if (menuClose) {
        menuClose.addEventListener('click', closeMobileMenu);
      }

      // Add click event to all mobile nav links
      const mobileNavLinks = document.querySelectorAll('.mobile-nav a');
      mobileNavLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
      });

      // Make closeMobileMenu function global for onclick attributes
      window.closeMobileMenu = closeMobileMenu;
    };

    // Wait for DOM to be fully loaded before initializing
    setTimeout(function() {
      window.initMobileMenu();
    }, 100);
  });
</script>