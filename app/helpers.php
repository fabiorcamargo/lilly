<?php

// if (! function_exists('layoutConfig')) {
//     function layoutConfig($configLayout) {

//         if ($configLayout === 'vertical-light-menu') {

//             $__getConfiguration = Config::get('app-config.layout.vlm');
            
//         } else if ($configLayout === 'vertical-dark-menu') {
            
//             $__getConfiguration = Config::get('app-config.layout.vdm');
            
//         } else if ($configLayout === 'cm') {
            
//             $__getConfiguration = Config::get('app-config.layout.cm');
            
//         }

//         return $__getConfiguration;
//     }
// }

if (! function_exists('get_thumb')) {
    function get_thumb($image)
    {
        $pos = (strripos($image, "/"));
            $path = (substr($image, 0, $pos) . "/");
            $name = (substr($image, $pos+1, 200));
            
            return ($path . "thumb" . $name);
    }
}

if (! function_exists('layoutConfig')) {
    function layoutConfig() {

        if (Request::is('ml/*')) {

            $__getConfiguration = Config::get('app-config.layout.vlm');
            
        } else if (Request::is('md/*')) {
            
            $__getConfiguration = Config::get('app-config.layout.vdm');
            
        } else if (Request::is('cm/*')) {
            
            $__getConfiguration = Config::get('app-config.layout.cm');
            
        } 
        
        // RTL

        else if (Request::is('rtl/ml/*')) {

            $__getConfiguration = Config::get('app-config.layout.vlm-rtl');
            
        } else if (Request::is('rtl/md/*')) {
            
            $__getConfiguration = Config::get('app-config.layout.vdm-rtl');
            
        } else if (Request::is('rtl/cm/*')) {
            
            $__getConfiguration = Config::get('app-config.layout.cm-rtl');
            
        }



        // Login

        else if (Request::is('login')) {

            $__getConfiguration = Config::get('app-config.layout.vlm');
            
        }
        
        $__getConfiguration = Config::get('app-config.layout.vlm');
        return $__getConfiguration;
    }
}



if (!function_exists('getRouterValue')) {
    function getRouterValue() {
        
        if (Request::is('ml/*')) {
            
            $__getRoutingValue = '/ml';
            
        } else if (Request::is('md/*')) {
            
            $__getRoutingValue = '/md';
            
        } else if (Request::is('cm/*')) {
            
            $__getRoutingValue = '/cm';

        }


        // RTL

        else if (Request::is('rtl/ml/*')) {

            $__getRoutingValue = '/rtl/ml';
            
        } else if (Request::is('rtl/md/*')) {
            
            $__getRoutingValue = '/rtl/md';
            
        } else if (Request::is('rtl/cm/*')) {
            
            $__getRoutingValue = '/rtl/cm';
            
        }


        // Login

        else if (Request::is('login')) {

            $__getRoutingValue = '/ml';
            
        }
        $__getConfiguration = Config::get('app-config.layout.vlm');
        $__getRoutingValue = '/ml';
        return $__getRoutingValue;
    }
}