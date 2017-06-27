<?php

namespace App\Helpers;

class Menu
{
    /**
     * [Menu Dashboard ].
     *
     * @param  bool , json or array
     *
     * @return [json or array]
     *             
     */
    public static function dashboard($returnArray = false, $guard = null)
    {        
        if (\Auth::guard($guard)->check() && \Auth::user()->isAn('admin')) {
            //Dashboard menu items for admin
            $menu = [
                ['route' => route('admin.home'), 'text' => 'Dashboard Home'],
                ['route' => route('users.index'), 'text' => 'Users'],
                ['route' => route('service-providers.index'),'text' => 'Service Providers'],
                ['route' => route('services.index'), 'text' => 'Services'],
            ];
               
        }elseif (\Auth::guard($guard)->check() && \Auth::user()->isA('service-provider')) {
            //Dashboard menu items for client
            $menu = [
                ['route' => route('sp-home'), 'text' => 'Dashboard Home'],
                ['route' => route('sp-services.index'), 'text' => 'Services'],
                ['route' => route('sp-orders'), 'text' => 'Orders'],
            ];
        }else {
            //Dashboard menu items for any one else with a different role
            $menu = [
                ['route' => '/', 'text' => 'Main Website'],
            ];
        }
        // dd($menu);
        return $returnArray ? $menu : json_encode($menu);
    }

    /**
     * [Menu Top ].
     *
     * @param  bool, json or array
     *
     * @return [json or array]
     *             
     */
    public static function websiteMainMenu($returnArray = false)
    {
        if (\Auth::guest()) { 
            $menu = [
                ['route' => '/login', 'url' => '', 'text' => trans('user.login'), 'divider' => 1],
                ['route' => '/register', 'url' => '', 'text' => trans('user.register')],
            ];
        } else { 
            $menu = self::dashboard(true);
        }

        return $returnArray ? $menu : json_encode($menu);
    }

}
