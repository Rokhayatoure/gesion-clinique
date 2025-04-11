<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HommeController extends AbstractController
{
    #[Route('/', name: 'app_homme')]
    public function index(): Response
    {
        return $this->render('homme/index.html.twig', [
            'controller_name' => 'HommeController',
        ]);
    }
}
