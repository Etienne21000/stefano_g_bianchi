<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Form\SerieFormType;
use App\Repository\SerieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    private $em;

    private $repository;

    public function __construct(EntityManagerInterface $em, SerieRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @Route("/serie", name="serie")
     */
    public function index()
    {
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
        ]);
    }

    /**
     * @Route("/addSerie", name="addSerie")
     */
    public function addSerie(Request $request)
    {
        $serie = new Serie();

        $form = $this->createForm(SerieFormType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($serie);
            $this->em->flush();
            $this->addFlash('success', 'L\'élément ' . $serie->getTitle() . 'à bien été créé');
            return $this->redirectToRoute('series');

        }

        return $this->render('back-end/addSerieView.html.twig', [
            'serie' => $serie,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/series", name="series")
     */
    public function allSeries()
    {
        $serie = $this->repository->findAllSerie();

        return $this->render('front-end/serieView.html.twig', [
            'serie' => $serie,
        ]);
    }
}
