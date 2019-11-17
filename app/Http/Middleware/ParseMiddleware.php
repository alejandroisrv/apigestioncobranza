<?php
/**
 * Created by PhpStorm.
 * User: cristhian
 * Date: 4/7/17
 * Time: 7:14 AM
 */

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;


class ParseMiddleware
{

    public function handle($request, Closure $next, $guard = null)
    {
        $payload = null;
        try {
            app('tymon.jwt.parser')->setRequest($request);
            $payload = JWTAuth::parseToken()->getPayload();
        }catch (TokenExpiredException $ex) {
            return response(["errors" => [lang('auth.unauthorized')]],
                Response::HTTP_UNAUTHORIZED);
        }catch(Exception $e){
            //Without token
        }
        $request->attributes->add([
            'payload' => $payload
        ]);
        return $next($request);
    }

    private function highlightUser(){
        //convertir sub to user_id
    }

}
