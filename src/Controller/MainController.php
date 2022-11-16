<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController

{

    #[Route ("/" , name:"main_home")]
    public function home()
    {
        return $this->render('home.html.twig');
    }

    #[Route ("/register" , name:"main_register")]
    public function register()
    {
        return $this->render('register.html.twig');
    }

    #[Route ("/login" , name:"main_login")]
    public function login(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('login.html.twig');
    }

    #[Route ("/profil" , name:"main_profil")]
    public function profil(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('profil.html.twig');
    }

}