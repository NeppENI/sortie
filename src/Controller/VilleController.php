<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Form\VilleFormType;
use App\Repository\VilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    #[Route('admin/ville', name: 'ville_list')]

    public function index(villeRepository $villeRepository):Response
    {
        $ville = $villeRepository->findAll();
        return $this->render('admin/ville.html.twig',[
            'ville' => $ville ]);
    }

//    public function create(Request $request, EntityManagerInterface $entityManager):Response
//    {
//        $ville = new Ville();
//        $villeForm = $this->createForm(VilleFormType::class, $ville);
//
//        $villeForm->handleRequest($request);
//        if($villeForm->isSubmitted()){
//            $entityManager->persist($ville);
//            $entityManager->flush();
//        $this->addFlash('success', 'ville ajoutée!');
//        }
//
//        return $this->render('admin/ville.html.twig',[
//            "villeForm" => $villeForm->createView(),
//        ]);
//    }
}