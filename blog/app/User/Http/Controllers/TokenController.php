<?php
namespace App\User\Http\Controllers;
use App\User\Services\TokenService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class TokenController extends Controller
{
    protected $tokenService;
  public function __construct(TokenService $tokenService)
  {
      $this->tokenService = $tokenService;
  }
  public function token(Request $request)
  {
      $name = $request->get('name');
      $password = $request->get('password');
      $token = $this->tokenService->token($name,$password);
      return $token;
  }
}
