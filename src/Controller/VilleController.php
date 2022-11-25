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
    #[Route('admin/ville/index', name: 'ville_index')]
    public function index(villeRepository $villeRepository):Response
    {
        $ville = $villeRepository->findAll();
        return $this->render('admin/ville/index.html.twig',[
            'ville' => $ville]);
    }

    #[Route('admin/ville/create', name: 'ville_form')]
    public function create(Request $request, EntityManagerInterface $entityManager):Response
    {
        $ville = new Ville();
        $villeForm = $this->createForm(VilleFormType::class, $ville);

        $villeForm->handleRequest($request);
        if($villeForm->isSubmitted()){
            $entityManager->persist($ville);
            $entityManager->flush();
        $this->addFlash('success', 'ville ajoutée!');
        }

        return $this->render('admin/ville/create.html.twig',[
            "villeForm" => $villeForm->createView(),
        ]);
    }
    #[Route("admin/ville/delete/{id}", name: "delete_ville", methods: ['GET', 'DELETE'])]
    public function delete(villeRepository $villeRepository, EntityManagerInterface $entityManager,$id):Response
    {
        $campus = $villeRepository->find($id);
        $entityManager->remove($campus);
        $entityManager->flush;
        $this->addFlash('success','la ville a été supprimée');

        return $this->redirectToRoute('ville_index');
    }
}