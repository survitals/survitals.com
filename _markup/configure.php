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
  $md = $ctx->data('item.md') ?: '';
  # Strip HTML comments before parsing - stackoverflow.com/a/3235781/770127
  $md and $md = preg_replace('/<!--(.*)-->/Uis', '', trim($md));
  $md and $md = Parsedown::instance()->parse($md);
  $ctx->data('item.html', $md);
});