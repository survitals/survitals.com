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
  return ['id' => 'start', 'lang' => 'en-US', 'class' => $list];
}) : '<html id="start" lang="en-US">'; ?>

<meta charset=utf-8>
<title>{{titlebar}}</title>
<meta name='viewport' content='width=device-width,initial-scale=1.0'>
<?php echo Loci::meta('author', loci()->data('author:name') ?: loci()->data('author')); ?>
<?php echo Loci::meta('description', loci()->data('description')); ?>

<link rel=stylesheet href="/css/base.<?php echo date('YW'); ?>.css">
<link rel=stylesheet href="/css/main.<?php echo date('YmdH'); ?>.css" media="screen,projection">

<?php echo \call_user_func(function($ctx, $a = []) {
  if (trim($_SERVER['REQUEST_URI'], '/')) $a[] = "<link rel='prerender prefetch' href=/>"; 
  if ($v = $ctx->data('url')) $a[] = "<link rel=canonical href='$v'>";
  if ($v = $ctx->data('thumb')) \array_push($a, "<link rel=image_src href='$v'>", "<meta property=og:image content='$v'>");
  return \trim(\implode("\n", $a)) . "\n";
}, loci());

include 'site-header.php'; ?>

<main id="main" role="main">
  <div class="container">

  <?php \call_user_func(function() {
    $ctx = Loci::context();
    $list = $ctx->data('list');
    $file = Loci::option('basename:html');
    if (!\is_array($list)) { 
      include 'article.php';
    } elseif ($from = Loci::option('path:items')) {
      foreach ($list as $path) {
        $post = loci(Path::join($from, $path));
        Path::contains($post->data('type'), 'draft') or $post->render_e('article-link');
      }
    }
  }); ?>

  </div>
</main>

<?php include 'site-footer.php'; ?>

<a id="end"></a>

<?php include 'site-analytics.php';