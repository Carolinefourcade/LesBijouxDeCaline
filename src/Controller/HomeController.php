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
     * @Route("/", name="jewelry_home")
     */
    public function index(JewelryRepository $jewelryRepository) : Response
    {
        return $this->render('home/index.html.twig', [
            'website' => 'Les Bijoux de Caline',
            'jewelries' => $jewelryRepository->findAll(),
            'jewelry' => $jewelryRepository->findAll()
        ]);
    }
    /**
     * @Route("/{id}", name="jewelry_show", methods={"GET"})
     * @param Jewelry $jewelry
     * @return Response
     */
    public function show(Jewelry $jewelry): Response
    {
        return $this->render('jewelry/show.html.twig', [
            'jewelry' => $jewelry,
        ]);
    }
}
