<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use CoffeeCode\Optimizer\Optimizer;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected Optimizer $optimizer;

    public function __construct()
    {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
          "Instituto Educacional Profissionalizante (IEP)",
          "pt_BR",
          "article"
        );
    }
}
