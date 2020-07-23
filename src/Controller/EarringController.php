<?php


namespace App\Controller;


use App\Entity\Jewelry;

use App\Repository\JewelryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EarringController extends AbstractController
{
    /**
     * @param JewelryRepository $jewelryRepository
     * @return Response
     * @Route("/earring", name="jewelry_earring")
     */
public function index(JewelryRepository $jewelryRepository) : Response
{
    return $this->render('earring/index.html.twig', [
        'jewelry' => $jewelryRepository->findByCategory(21),
        'jewelries' =>$jewelryRepository->findByCategory(21)
    ]);
}
}
