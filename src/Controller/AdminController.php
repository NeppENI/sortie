<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class AdminController extends AbstractController

{

    #[Route ("admin/administrateur" , name:"main_admin")]
    public function admin(): Response
    {
        return $this->render('admin/administrateur.html.twig');
    }
}