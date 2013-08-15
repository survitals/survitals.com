<?php
use chromosome\Loci;
use airve\Path;

Loci::option('uri:repo') and Loci::on('normalize', function() {
    $repo = Loci::option('uri:repo');
    $ctxt = Loci::context();
    $hier = \str_replace($_SERVER['DOCUMENT_ROOT'], '', $ctxt->dir);
    $ctxt->data('url.tree', Path::join($repo, 'tree/master', $hier));
});