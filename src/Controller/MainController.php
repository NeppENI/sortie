<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController

{

    #[Route ("/", name: "main_home")]
    public function home()
    {
        return $this->render('main/home.html.twig');
    }

    #[Route ("/profil", name: "main_profil")]
    public function profil(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('main/profil.html.twig');
    }

    #[Route ("/admin/campus", name: "admin_campus")]
    public function campus(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('admin/campus.html.twig');
    }

}