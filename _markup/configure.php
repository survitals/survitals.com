<?php
use chromosome\Loci;
use airve\Path;

Loci::option('uri:repo') and Loci::on('normalize', function() {
    $repo = Loci::option('uri:repo');
    $ctxt = Loci->context();
    $hier = \strtok($_SERVER['REQUEST_URI'], '?#');
    $ctxt->data('url.tree', Path::join($repo, $hier));
});