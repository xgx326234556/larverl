<?php
namespace App\Common\Http\Controllers;

use App\Common\Services\SwooleHttpServer;

class SwooleController
{
    protected $swooleHttpServer;
    public function __construct(SwooleHttpServer $swooleHttpServer)
    {
        $this->swooleHttpServer = $swooleHttpServer;
    }

    public function swooleHttpServer()
    {
        $this-> swooleHttpServer->swooleHttpServer();
    }
}