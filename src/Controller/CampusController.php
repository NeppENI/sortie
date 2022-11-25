<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Form\CampusFormType;
use App\Repository\CampusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusController extends AbstractController
{
    #[Route('admin/campus/index', name: 'campus_index')]

        public function index(CampusRepository $campusRepository): Response
    {
            $campus = $campusRepository->findAll();
            return $this->render('admin/campus/index.html.twig',[
                'campus' => $campus ]);
        }

   #[Route('admin/campus/create', name: 'campus_form')]

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

            return $this->render('admin/campus/create.html.twig',[
            "campusForm" => $campusForm->createView(),
        ]);
        }

    #[Route("admin/campus/delete/{id}", methods: ['GET', 'DELETE'],name: "delete_campus")]

        public function delete(CampusRepository $campusRepository, EntityManagerInterface $entityManager,$id):Response
        {
            $campus = $campusRepository->find($id);
            $entityManager->remove($campus);
            $this->addFlash('success','le campus a été supprimé');

            return $this->redirectToRoute('campus_index');
        }

}
