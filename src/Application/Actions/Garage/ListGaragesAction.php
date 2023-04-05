<?php

namespace App\Application\Actions\Garage;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;

class ListGaragesAction  extends Action
{

    protected function action(): Response
    {
        return $this->respondWithData();
    }
}