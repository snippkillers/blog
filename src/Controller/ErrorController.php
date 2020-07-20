<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ErrorController extends AbstractController
{
    /**
     * @Route("/not-found")
     */
    public function notFound()
    {
        return $this->render('Error/error.html.twig');
    }
}
