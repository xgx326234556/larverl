<?php
namespace App\User\Services;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class TokenService{
    protected  $JWTAuth;
    public function __construct(JWTAuth $JWTAuth)
    {
        $this->JWTAuth = $JWTAuth;
    }

    public function token($name,$password)
    {
        $credentials['name'] = $name;
        $credentials['password'] = $password;
        try {
            if (!$token = $this->JWTAuth->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
}