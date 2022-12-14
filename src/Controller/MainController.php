<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class MainController extends AbstractController

{

    #[Route ("/" , name:"main_home")]
    public function home():Response
    {
        return $this->render('main/home.html.twig');
    }

    #[Route ("/profil" , name:"main_profil")]
    public function profil(): Response
    {
        return $this->render('main/profil.html.twig');
    }

}