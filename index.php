<?php
namespace chromosome; 
use \airve\Path;
require_once __DIR__ . '/_package/chromosome/bootstrap.php';
echo loci(json_decode('{
    "title": "Survitals: Safety, Survival, and Preparedness",
    "type": "home plural",
    "author": "Ryan Van Etten",
    "description": "Learn about modern survival, safety, rescue, preparedness, and situation awareness.",
    "list": [
        "about/",
        "water/"
    ]
}'))->render();