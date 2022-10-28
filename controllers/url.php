<?php

function url($path = ''){
    $basePath = "http://localhost/password-manager/";
    if($basePath != ""){
        $basePath = $basePath.$path;
    }
    return $basePath;
}