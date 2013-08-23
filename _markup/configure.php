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