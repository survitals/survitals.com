<?php use chromosome\Loci; ?>

<header class="site-header" role="banner">
  <div class="container">
    <div class="site-branding">
      <h1 class="site-name site-title">
        <a rel="home" href="/" accesskey="1">
          <span><?php echo Loci::option('site:name'); ?></span>
        </a>
      </h1>
    </div>
    <form class="form-search" role="search" method="get" action="http://www.google.com/search">
      <input name="sitesearch" type="radio" value="<?php echo $_SERVER['SERVER_NAME']; ?>" checked hidden>
      <input name="q" type="search">
      <input type="submit" value="Search">
    </form>
  </div>
</header>
