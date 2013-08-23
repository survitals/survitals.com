<?php 
use \slash\Path;

\call_user_func(function() {
    $data = \is_file($data = Path::root('chromosome.json')) ? (array) Path::getJson($data) : $data;
    $list = !empty($data[$list = 'ga:applies']) && \is_array($data[$list]) ? $data[$list] : [];
    $data = '';
    foreach ($list as $arr)
        \is_array($arr) and $data .= ';k.apply(i,' . \json_encode($arr) . ')';
    if ( ! $data) return; ?>

<script>
(function(k,i,l,o,g,r,a,m){
  if(k.indexOf("http"))return;i.GoogleAnalyticsObject=r;k=i[r]=i[r]||function(){(k.q=k.q||[]).push(arguments)}
  ;k.l=1*new Date();a=l.createElement(o);m=l.getElementsByTagName(o)[0];a.src=g;m.parentNode.insertBefore(a,m)
  <?php echo "$data\n"; ?>
})(location.protocol,window,document,"script","//www.google-analytics.com/analytics.js","ga");
</script>

<?php });