<?php

namespace App\Controller;

use App\Entity\Stat;
use App\Form\StatType;
use App\Repository\StatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class StatController extends AbstractController
{
    /**
     * @Route("/stat", name="stat")
     */
    public function index()
    {
        $stats = $this->getDoctrine()->getRepository(Stat::class)->findAll();
        return $this->render('stat/index.html.twig', [
            'stats' =>$stats,
            ]);
    }
    /**
     * Affiche une statistique
     * @Route("/stat/{id}", name="stat_show", methods={"GET"}, requirements={"id":"\d+"})
     * @param Stat $stat
     */
    public function show(Stat $stat)
    {
        return $this->render('stat/show.html.twig', [
            'stat' => $stat
        ]);
    }

    /**
     *Formulaire de création de statistiques 
     * @Route("/stat/new", name="stat_new", methods={"GET" ,"POST"})
     * @param Stat $stat
     */

    public function new(Request $request)
    {
    $stat = new Stat();
    $form = $this->createForm(StatType::class, $stat);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {
        $stat = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($stat);
        $entityManager->flush();

        return $this->redirectToRoute('country');
    }

    return $this->render('stat/form.html.twig', [
        'form' => $form->createView()
    ]);
    }

    /**
     * Traite la requête d'un formulaire de création de statistiques
     * @Route("/stat", name="stat_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * Affiche et Traite le formulaire d'édition d'une statistique (POST) et (GET)
     * 
     * @Route("/stat/{id}/edit", name="stat_edit", methods={"GET", "POST"})
     * @param Stat $stat
     */
    public function edit(Stat $stat)
    {
    }

    /**
     * Supprime une statistiques
     * @Route("/stat/{id}", name="stat_delete", methods={"DELETE"})
     * @param Stat $stat
     */
    public function delete(Stat $stat)
    {
    }
}
