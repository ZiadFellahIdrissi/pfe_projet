<?php   
    Class Config{
        public static function get($path=null){
            if($path){
                $config = $GLOBALS['config'];
                $path = explode('/',$path);

                // foreach($path as $bit){
                //     if(isset($config[$bit])){
                //         $config=$config[$bit];
                //     }
                // }
                // return $config;

                if(isset($config[$path[0]]))
                    return $config[$path[0]][$path[1]];
            }
            return false;
        }
    }
?>