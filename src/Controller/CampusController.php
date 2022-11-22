<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Form\CampusFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusController extends AbstractController
{
    #[Route('admin/campus', name: 'campus_list')]

    public function create(Request $request, EntityManagerInterface $entityManager):Response
    {
        $campus = new Campus();
        $campusForm = $this->createForm(CampusFormType::class, $campus);

        $campusForm->handleRequest($request);
        if($campusForm->isSubmitted()){
            $entityManager->persist($campus);
            $entityManager->flush();
        $this->addFlash('success', 'campus ajouté!');
        }

        return $this->render('admin/campus.html.twig',[
            "campusForm" => $campusForm->createView(),
        ]);
    }


}
