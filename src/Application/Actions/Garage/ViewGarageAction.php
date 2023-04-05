<?php

namespace App\Application\Actions\Garage;

use App\Application\Actions\Action;
use App\Application\Models\Garage;
use Illuminate\Support\Facades\Schema;
use Psr\Http\Message\ResponseInterface as Response;

class ViewGarageAction extends Action
{
    protected function action(): Response
    {
        return $this->respondWithData(['success' => true]);
    }
}