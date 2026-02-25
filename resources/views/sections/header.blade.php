<header class="site-header">
  <div class="site-header__inner">
    <a class="site-brand" href="{{ home_url('/') }}">
      {!! $siteName !!}
    </a>

    @if (has_nav_menu('primary_navigation'))
      <nav class="site-nav" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'site-nav__list',
          'container' => false,
          'echo' => false,
        ]) !!}
      </nav>
    @endif
  </div>
</header>
