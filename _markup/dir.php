<?php 
namespace chromosome;
use \chromosome\Loci;
use \slash\Path;
use \airve\Phat;
?><!DOCTYPE html><?php \call_user_func(function() {
        $list = [];
        $ctxt = Loci::context();
        $tree = Path::tree($ctxt->dir);
        $request = $_SERVER['REQUEST_URI']; 
        $base = '/' === \substr($base, -1) ? '' : Path::rslash($request);
        foreach ($tree as $name => $path) {
            $name = \is_array($path) ? $name : $path;
            $list[] = "<a href='$base$name'>$name</a>";
        }
        $title = 'Index of ' . $request;
        echo "<html class=type-dir><head>";
        echo '<meta charset=utf-8><meta name=viewport content="width=device-width,initial-scale=1.0">';
        echo "<title>$title</title>";
        echo '<style>body{font:normal 1em monospace;word-wrap:break-word}h1{font-family:sans-serif}</style>';
        echo "</head><body><h1>$title</h1>";
        echo '<ul><li>' . \implode('</li><li>', $list) . "</li></ul>";
        echo '</body></html>';
}); ?>
