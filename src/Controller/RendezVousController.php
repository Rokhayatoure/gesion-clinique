<?php

namespace App\Controller;

use App\DataFixtures\RendezVous;
use App\Entity\RendezVous as EntityRendezVous;
use App\Form\RendezVousType;
use App\Repository\ClasseRepository;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;


final class RendezVousController extends AbstractController
{
    // #[Route('/rendez/vous', name: 'app_rendez_vous')]
    // public function index(): Response
    // {
    //     return $this->render('rendez_vous/index.html.twig', [
    //         'controller_name' => 'RendezVousController',
    //     ]);
    // }

    #[Route('/Rendezvous/liste',  name: 'listeRendezVous',methods: ['GET'])]
    public function index( RendezVousRepository $rendezVousRepository ,PaginatorInterface  $paginator , Request $request): \Symfony\Component\HttpFoundation\Response
    {
        $data = $rendezVousRepository->findAll();
        $data = $paginator->paginate(
            $data, /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            5 /* limit per page */              
        );
        return $this->render('rendez_vous/index.html.twig', [
            'rendezvous' => $data,
        ]);


  
}
#[Route('/rendezvous/add', name: 'app_rendezvous_add', methods: ['GET', 'POST'])]
public function add(RendezVousRepository $rendezVousRepository, EntityManagerInterface $entityManager, Request $request): Response
{
    $rendezVous = new  EntityRendezVous;
    $form = $this->createForm(RendezVousType::class, $rendezVous);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($rendezVous);
        $entityManager->flush();

        $this->addFlash('success', 'Rendez-vous ajouté avec succès');

        return $this->redirectToRoute('listeRendezVous');
    }

    return $this->render('rendez_vous/add.html.twig', [
        'form' => $form->createView(),
    ]);
}

     
}