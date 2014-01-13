<?php
use chromosome\Loci;
use slash\Path;

Loci::option('uri:repo') and Loci::on('normalize', function() {
    $tree = $repo = Loci::option('uri:repo');
    $ctxt = Loci::context();
    !empty($ctxt->dir)
        and ($hier = \str_replace($_SERVER['DOCUMENT_ROOT'], '', $ctxt->dir))
        and ($tree = Path::join($repo, 'tree/master', $hier)); 
    $ctxt->data('url.tree', $tree);
});

class_exists('Parsedown') or require_once(Path::root('_package/parsedown/Parsedown.php'));
class_exists('Parsedown') and Loci::on('normalize', function() {
  $ctx = Loci::context();
  $key = 'item.html'; #todo Unhardcode the filename.
  if ($md = $ctx->data($key))
    if ($md = preg_replace('/<!--(.*)-->/Uis', '', $md)) //stackoverflow.com/a/3235781/770127
      $ctx->data($key, Parsedown::instance()->parse($md));
});