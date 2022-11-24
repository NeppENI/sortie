<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
* @Route("/sortie", name="sortie_")
*/
class SortieController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
        public function list(SortieRepository $sortieRepository): \Symfony\Component\HttpFoundation\Response
        {
            $sorties = $sortieRepository->findBy([], ['date_sortie' => 'DESC'], limit: 30);

            return $this->render('main/sortie/sortie.html.twig',[
                "sorties" => $sorties
                ]);
        }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id, SortieRepository $sortieRepository): \Symfony\Component\HttpFoundation\Response
    {
        $sortie =$sortieRepository->find($id);

        return $this->render('main/sortie/details.html.twig', [
        "sortie" => $sortie
        ]);
    }

    /**
     * @Route("/create/{id}", name="create")
     */
    public function create(
        Request $request,
        EntityManagerInterface $entityManager
    ): \Symfony\Component\HttpFoundation\Response
    {
        $sortie = new Sortie();
        $sortieForm = $this->createForm(SortieType::class, $sortie);

        $sortieForm->handleRequest($request);

        if ($sortieForm->isSubmitted()){
            $entityManager->persist($sortie);
            $entityManager->flush();
        }


        return $this->render('main/sortie/create.html.twig',[
            'sortieForm' => $sortieForm->createView()
        ]);
    }

    /**
     * @Route ("/demo", name="em-demo")
     */
    public function demo(EntityManagerInterface $entityManager): \Symfony\Component\HttpFoundation\Response
    {
        $sortie = new Sortie();

        $sortie->setNomDeLaSortie('Bowling');
        $sortie->setDateSortie(new \DateTime());
        $sortie->setDescriptionInfo('Petit Bowling & Apéro');
        $sortie->setCampus('La-Roche-Sur-Yon');
        $sortie->setVille('La-Roche-Sur-Yon');
        $sortie->setRue('Rue du Bowling');
        $sortie->setCodePostal('85000');

        dump($sortie);

        $entityManager->persist($sortie);
        $entityManager->flush();

        return $this->render('main/sortie/create.html.twig');
    }
}