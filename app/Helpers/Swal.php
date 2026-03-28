<?php

namespace App\Helpers;

class Swal
{
    /**
    * Status possíveis
    *
    * - warning
    * - error
    * - success
    * - info
    **/
    public static function redirect($status, $title, $message, $route, $route_param = null)
    {
        if ($route_param !== null) {
            $redirect = redirect()->route($route, $route_param);
        } else {
            $redirect = redirect()->route($route);
        }

        return $redirect->with('swal', $status)
                        ->with('title', $title)
                        ->with('message', $message);
    }
}