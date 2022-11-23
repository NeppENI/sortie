<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController

{

    #[Route ("/" , name:"main_home")]
    public function home(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('main/home.html.twig');
    }

    #[Route ("/profil" , name:"main_profil")]
    public function profil(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('main/profil.html.twig');
    }



    #[Route ("/admin/ville" , name:"admin_ville")]
    public function ville(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('admin/ville.html.twig');
    }
}