<?php

namespace App\Controller;

use App\Repository\OrdinateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OrdinateursRepositoryRepository;

class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(OrdinateursRepository $ordinateurRepository): Response
    {
        $ordinateurs = $ordinateurRepository->findAll(); // Récupérer tous les produits

        return $this->render('list/index.html.twig', [
            'ordinateurs' => $ordinateurs,
        ]);
    }
}
