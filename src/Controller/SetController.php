<?php


namespace App\Controller;


use App\Repository\JewelryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SetController extends AbstractController
{
    /**
     * @param JewelryRepository $jewelryRepository
     * @return Response
     * @Route("/set", name="jewelry_set")
     */
public function index(JewelryRepository $jewelryRepository): Response
{
    return $this->render('set/index.html.twig', [
        'jewelry' => $jewelryRepository->findByCategory(22),
        'jewelries' => $jewelryRepository->findByCategory(22)
    ]);

}
}
