<?php


namespace App\Controller;


use App\Repository\JewelryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NecklaceController extends AbstractController
{
    /**
     * @param JewelryRepository $jewelryRepository
     * @return Response
     * @Route("/necklace", name="jewelry_necklace")
     */
public function index(JewelryRepository $jewelryRepository): Response
{
    return $this->render('necklace/index.html.twig', [
        'jewelry' => $jewelryRepository->findByCategory(23),
        'jewelries' => $jewelryRepository->findByCategory(23)
    ]);
}
}
