<?php

namespace App\Application\Actions\Garage;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * @property Environment view
 */
class ViewGarageAction extends Action
{
    /**
     * @var mixed
     */
    protected Environment $view;

    /**
     * @param LoggerInterface $logger
     * @param Environment $view
     */
    public function __construct(LoggerInterface $logger, Environment $view)
    {
        parent::__construct($logger);

        $this->view = $view;
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    protected function action(): Response
    {
        $this->response->getBody()->write(
            $this->view->render('garages.twig')
        );

        return $this->response;
    }
}