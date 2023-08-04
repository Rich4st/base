<div class="drawer lg:hidden">
  <input id="my-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    <label for="my-drawer">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
        <path fill="currentColor" d="M4 18h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zm0-5h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zM3 7c0 .55.45 1 1 1h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1z" />
      </svg>
    </label>
  </div>
  <div class="drawer-side z-[9999]">
    <label for="my-drawer" class="drawer-overlay h-screen"></label>
    <div class="menu h-screen p-4 w-80 bg-base-200 text-base-content font-rockwell">
      <?php wp_nav_menu(array(
        'container' => 'ul',
        'menu_class' => 'header-nav text-xl hover:text-gray-600 space-y-4 py-12',
      )); ?>
    </div>
  </div>
</div>
