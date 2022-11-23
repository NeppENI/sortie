<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/sortiehome", name="sortie_sortiehome")
     */
        public function sortieHome()
        {
            return $this->render('main/sortiehome.html.twig');
        }

}