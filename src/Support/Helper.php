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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
EOT;

    }
}


/**
 * Load Script
 */
if (!function_exists("LoadCarousel")){
    function LoadCarousel(array $option = []){
        //return dump($option);
        if (!function_exists("LaravelOwlStyle")){
            LaravelOwlStyle();
        }

        $script =  "<script>window.onload =  function(){";
        $script .= "$('#laravelCarousel').owlCarousel({";
        foreach ($option as $key=>$opt){
            $script .=  $key.":".$opt.",";
        }
        $script .= "loop:true,";
        $script .= "items:1,";
        $script .="navText: [\""."<i class='fa fa-angle-left' aria-hidden='true'></i>"."\",
            \"<i class='fa fa-angle-left' aria-hidden='true'></i>\"
        ]";
        $script .=  "})}</script>";
        echo $script;

        if (!function_exists("LaravelOwlJs")){
            LaravelOwlJs();
        }



    }
}

/**
 * Carousel Menu
 */
if (!function_exists("CaouselMenu")){
    function CaouselMenu($class = [],$id=[]){
        $classes  = implode(" ",$class);
        $ids  = implode(" ",$id);
        $index = url("carousel");
        echo <<<EOT
 <li class="treeview {$classes}" id="{$ids}">
                <a href="#">
                    <i class="fa fa-address-card-o"></i> <span>Carousel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="$index"><i class="fa fa-circle-o"></i>Carousel</a></li>
                    <li><a href="{{url('admin/admission/schedule')}}"><i class="fa fa-circle-o"></i> Schedule</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
EOT;

    }
}

/**
 *
 */

if (!function_exists("laraOwlCarousel")){
    function laraOwlCarousel($slider_short_code,$class = []){
        $carouselList = \Anwar\LaravelOwl\Models\OwlCarouselImage::join("owl_register as lp","lp.id","laravelowl_pictures.carousel_id")
            ->where("lp.short_code",$slider_short_code)
            ->get();
        $cls = !empty($class) ? implode(" ",$class):null;

        $carouselHtml = "<div id='laravelCarousel' class='owl-carousel owl-theme'>";
        if (!empty($carouselList)) {
            foreach ($carouselList as $cl){
                //$dimension = $cl->dimensions != null ? explode("x",$cl->dimensions):["50%","200dp"];
                $height = $cl->height ?? "250dp";
                $width = $cl->width ?? "50%";
                $carouselHtml .= "<div class=\"single-blog-post style-3 $cls\">
                            <!-- Blog Thumbnail -->
                            <div class=\"blog-thumbnail item\">
                                <img height='{$height}' width='{$width}' src=\"$cl->picture_uri\" alt=\"\">
                                <a href=\"#\" class=\"img-title\">
                                    $cl->img_title
                                </a>
                            </div>
                        </div>";

            }
        }
        $carouselHtml .= "</div>";
        return  $carouselHtml;

    }
}


if (!function_exists("LaravelCarousel")){
    function LaravelCarousel(array $option = ["short_code"=>"","selector"=>"","classes"=>[],"carouselOption"=>[],"container"=>""]){

        $carouselTemplate = laraOwlCarousel($option["short_code"],$option["classes"]);
        if ($option["container"] != ""){
            $container = $option["container"];
            $script = "<script>$('#{$container}').html({$carouselTemplate})</script>";
            echo $script;
        }else{
            echo $carouselTemplate;
        }
    }
}
