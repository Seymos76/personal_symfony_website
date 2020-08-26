<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\HttpFoundation\Response;

class PublicController extends AbstractController
{
    /**
     * @Route(path="/", name="public_homepage")
     * @return Response
     */
    public function homepage(): Response
    {
        return $this->render(
            'public/homepage.html.twig'
        );
    }
}
