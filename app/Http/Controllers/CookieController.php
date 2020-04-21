<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller {

    /* below code a set a cookie in browser */
     public function setCookie(Request $request){
        $response = new Response('Hello World');
        $response->withCookie(cookie('name', 'Anything else'));
        return $response;
     }
    /* below code a get a cookie in browser */
     public function getCookie(Request $request){
        $value = $request->cookie('name');
        echo $value;
     }
  }
