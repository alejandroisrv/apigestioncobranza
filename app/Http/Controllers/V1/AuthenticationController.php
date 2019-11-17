<?php

namespace App\Http\Controllers\V1;

use App\Business\Util\Database;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;


use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWTAuth as JWTAuthLogin;

class AuthenticationController extends Controller {

    /**
     * @var JWTAuth
     */
    private $auth;

    /**
     * @param JWTAuth $auth
     */
    public function __construct(JWTAuthLogin $auth){
        $this->auth = $auth;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function login(Request $request){
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            $token = $this->auth->attempt($credentials);
            if (!$token) {
                return response()->json(['error' => 'invalid_credentials'], IlluminateResponse::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR);
        } finally{
            Database::disconnect();
        }

        return response()->json([
            'user' => User::with(['sucursal','bodega'])->where('email',$credentials['email'])->first(),
            'token' => $token,
            'success' => true,
        ]);
    }


    function refreshToken(){
        $token = JWTAuth::getToken();

        try {
            $token = JWTAuth::refresh($token);
            return response()->json([
                'token' => $token,
                'success' => true,
            ]);
        } catch (TokenExpiredException $exception){

            return response()->json([
                'success' => false,
                'message' => 'El token ha expirado'
            ],401);

        } catch (TokenBlacklistedException $exception){
              return response()->json([
                  'success' => false,
                  'message' => 'No se puede actualizar el token'
              ],401);
        }
    }

    function logout(){

        $token = JWTAuth::getToken();

        try{
            JWTAuth::invalidate($token);
            return response()->json(['success'=> true],200);
        }catch (JWTException $exception){
            return response()->json(['success'=> false],422);
        }

    }

}
