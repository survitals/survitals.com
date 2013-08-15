<?php use chromosome\Loci; ?>

    <header class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <div class="site-branding" itemprop="provider publisher" itemscope itemtype="http://schema.org/Brand">
            <h1 class="site-name site-title">
                <a itemprop="url" rel="home" href="/" accesskey="1">
                    <span itemprop="name"><?php echo Loci::option('site:name'); ?></span>
                </a>
            </h1>
        </div>
        <form class="form-search" role="search" method="get" action="http://www.google.com/search">
            <input name="sitesearch" type="radio" value="<?php echo $_SERVER['SERVER_NAME']; ?>" checked hidden>
            <input name="q" type="search" placeholder="water">
            <input type="submit" value="Search">
        </form>
    </header>

