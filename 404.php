<!DOCTYPE html>
<html lang=en-US>
<meta charset=utf-8>
<title>404 - Page Not Found</title>
<style>
  html { background:#f8f8f8; color:#222; font:normal 1.1em sans-serif }
  body { word-wrap:break-word; margin:auto; padding:2%; max-width:40em }
  [hidden] { display:none }
  h1 { font-size:2em }
  h1 span { color:#888 }
  a:link, a:visited { color:#15c }
  input { font-size:1.1em; max-width:96% }
</style>

<h1>Not Found <span>:(</span></h1>
<div>
  <p>The link was either <b>outdated</b> or <b>mistyped</b>.
  <h4><a href="/" rel="home">Visit home</a> or search:</h4>
  <form role="search" method="get" action="http://www.google.com/search">
    <input name="sitesearch" type="radio" value="<?php echo $_SERVER['SERVER_NAME']; ?>" checked hidden>
    <input name="q" type="search">
    <input type="submit" value="Search">
  </form>
</div>