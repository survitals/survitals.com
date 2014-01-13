<?php
namespace chromosome; 
use \slash\Path;
require __DIR__ . '/_package/chromosome/bootstrap.php';
echo loci(\array_merge(json_decode('{
  "title": "Survitals: Safety, Survival, and Preparedness",
  "type": "home plural",
  "author": "Ryan Van Etten",
  "description": "Learn about modern survival, safety, emergency preparedness, situation awareness, and rescue."
}', true), ['list' => Path::getJson(__DIR__ . '/list.json')]))->render();