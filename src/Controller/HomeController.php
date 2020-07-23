<?php


namespace App\Controller;


use App\Entity\Jewelry;
use App\Repository\JewelryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param JewelryRepository $jewelryRepository
     *@return Response
     * @Route("/", name="wild_home")
     */
    public function index(JewelryRepository $jewelryRepository) : Response
    {
        return $this->render('home/index.html.twig', [
            'website' => 'Les Bijoux de Caline',
            'jewelries' => $jewelryRepository->findAll(),
            'jewelry' => $jewelryRepository->findAll()
        ]);
    }

}
