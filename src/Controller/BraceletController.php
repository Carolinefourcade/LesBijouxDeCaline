<?php


namespace App\Controller;


use App\Repository\JewelryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BraceletController extends AbstractController
{
    /**
     * @param JewelryRepository $jewelryRepository
     * @return Response
     * @Route("/bracelet", name="jewelry_bracelet")
     */
public function index(JewelryRepository $jewelryRepository): Response
{

    return $this->render('bracelet/index.html.twig', [
        'jewelry' => $jewelryRepository->findByCategory(24),
        'jewelries' => $jewelryRepository->findByCategory(24)
    ]);
}
}
