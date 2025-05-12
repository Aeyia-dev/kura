<style>
  /* Styles for mobile menu */
  body.mobile-menu-open {
    overflow: hidden;
  }
  
  /* Mobile Menu Overlay */
  .mobile-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: var(--black);
    z-index: 1000;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease-in-out;
    transform: translateY(-100%);
    opacity: 0;
  }

  .mobile-menu-overlay.active {
    transform: translateY(0);
    opacity: 1;
  }

  .mobile-menu-header {
    padding: var(--spacing-md) var(--spacing-md);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .mobile-logo {
    font-family: var(--heading-font), sans-serif;
    font-size: 1.5rem;
    font-weight: 500;
    color: var(--white);
  }

  .mobile-menu-close {
    background: none;
    border: none;
    color: var(--white);
    cursor: pointer;
    padding: var(--spacing-sm);
  }

  .mobile-menu-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    margin-top: -1.25rem;
  }

  .mobile-nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
  }

  .mobile-nav a {
    color: var(--white);
    font-family: var(--heading-font), sans-serif;
    font-size: 2.5rem;
    font-weight: 500;
    margin-bottom: var(--spacing-xl);
    text-align: center;
    text-decoration: none;
    transition: opacity 0.2s;
  }

  .mobile-nav a:hover {
    opacity: 0.8;
  }

  .mobile-menu-footer {
    padding: var(--spacing-lg) var(--spacing-md);
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .mobile-social-icons {
    display: flex;
    justify-content: center;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-lg);
  }

  .mobile-social-icon {
    display: block;
  }

  .mobile-social-icon img {
    width: 2.5rem;
    height: 2.5rem;
  }

  .mobile-copyright {
    color: var(--white);
    font-size: 0.75rem;
  }

  /* Mobile Header */
  @media (max-width: 767px) {
    .desktop-nav {
      display: none;
    }

    .mobile-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: var(--spacing-md) 0;
    }

    .logo {
      font-family: var(--heading-font), sans-serif;
      font-size: 1.5rem;
      font-weight: 500;
    }

    .menu-toggle {
      display: block;
      width: 30px;
      height: 30px;
      background: none;
      border: none;
      cursor: pointer;
      position: relative;
    }

    .menu-icon, 
    .menu-icon::before, 
    .menu-icon::after {
      display: block;
      width: 100%;
      height: 2px;
      background-color: var(--black);
      position: absolute;
      transition: all 0.3s;
    }

    .menu-icon {
      top: 50%;
      transform: translateY(-50%);
    }

    .menu-icon::before {
      content: "";
      top: -8px;
    }

    .menu-icon::after {
      content: "";
      bottom: -8px;
    }
  }
</style>