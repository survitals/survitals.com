<?php
namespace chromosome;
use \chromosome\Loci;
use \slash\Path;
use \airve\Phat;
?><!DOCTYPE html>
<?php echo \class_exists('\\airve\\Phat') ? Phat::tag('html', function() {
    $list = (array) loci()->data('class');
    $hier = \trim(\dirname($_SERVER['REQUEST_URI']), '/');
    $hier and $list[] = \rtrim('/' . Phat::esc($hier), '/');
    $list[] = 'base-' . \basename($_SERVER['REQUEST_URI']);
    $list[] = 'view-' . Path::filename(__FILE__);
    return ['lang' => 'en-US', 'class' => $list, 'itemscope'];
}) : '<html lang="en-US" itemscope>'; ?>

<head>
    <meta charset='utf-8'>
    <title>{{titlebar}}</title>
    <meta name='viewport' content='width=device-width,initial-scale=1.0'>
    <?php echo Loci::meta('author', loci()->data('author:name') ?: loci()->data('author')); ?>
    <?php echo Loci::meta('description', loci()->data('description')); ?>
    
    <link rel=stylesheet href="/css/base.<?php echo date('YW'); ?>.css">
    <link rel=stylesheet href="/css/main.<?php echo date('YmdH'); ?>.css" media="screen,projection">
    <?php echo \rtrim(\call_user_func(function($ctxt, $tab = '    ', $markup = '') {
        if ($value = $ctxt->data('url'))
            $markup .= "<link rel=canonical href='$value'>\n$tab";
        if ($value = $ctxt->data('thumb'))
            $markup .= "<link rel=image_src href='$value'>\n$tab<meta property=og:image content='$value'>\n$tab";
        if (trim($_SERVER['REQUEST_URI'], '/'))
            $markup .= "<link rel='prerender prefetch' href=/>\n$tab"; 
        return $markup;
    }, loci())) . "\n"; ?>
</head>
<body id="start">

<?php include 'site-header.php'; ?>

    <main id="main" role="main">
        <div class="container">
    
        <?php \call_user_func(function() {
            $ctxt = Loci::context();
            $list = $ctxt->data('list');
            $file = Loci::option('basename:html');
            if ( !\is_array($list)) {
                include ('article.php');
            } else if ($from = Loci::option('path:items')) {
                foreach ($list as $path) {
                    $post = loci(Path::join($from, $path));
                    if ( ! Path::contains($post->data('type'), 'draft'))
                        echo $post->render_e('article-link');
                }
            }
        }); ?>
    
        </div>
    </main>

<?php include 'site-footer.php'; ?>

    <a id="end"></a>

<?php include 'site-analytics.php'; ?>
</body>
</html>