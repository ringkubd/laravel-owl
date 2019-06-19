<?php
/**
 * Add Carousel Style
 */
if (!function_exists("LaravelOwlStyle")){
    function LaravelOwlStyle(){
        echo <<<EOT
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
EOT;

    }
}

/**
 * Add Carousel JavaScript
 */

if (!function_exists("LaravelOwlJs")){
    function LaravelOwlJs(){
        echo <<<EOT
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
EOT;

    }
}


/**
 * Load Script
 */
if (!function_exists("LoadCarousel")){
    function LoadCarousel($selectorName, array $option = []){
        if (!function_exists("LaravelOwlJs")){
            LaravelOwlJs();
        }
        if (!function_exists("LaravelOwlStyle")){
            LaravelOwlStyle();
        }
        $script =  "<script>window.onload =  function(){";
        $script .= "$('$selectorName').owlCarousel({";
        foreach ($option as $key=>$opt){
            $script .=  $key.":".$opt.",";
        }
        $script .="navText: [\""."<i class='fa fa-angle-left' aria-hidden='true'></i>"."\",
            \"<i class='fa fa-angle-left' aria-hidden='true'></i>\"
        ]";
        $script .=  "})}</script>";
        echo $script;


    }
}

