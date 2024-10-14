<?php
/**
 * @package Plugin_Development
 */
namespace Config;

 final class Init{
  
    public static function get_Services(){
        return[
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingLinks::class
        ];
    }

     public static function register_services()
    {
        foreach (self:: get_Services() as $class){
            $service = self :: instantiate ($class);
            if (method_exists($service, 'register')){
                $service ->register();
            }
        }
        
    }

    private static function instantiate ($class){
        $service = new $class();
        return $service;
    }

}
 
