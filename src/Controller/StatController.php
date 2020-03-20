<?php

namespace App\Controller;

use App\Entity\Stat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StatController extends AbstractController
{
    /**
     * @Route("/stat", name="stat" , methods={"GET"})
     */
    public function index()
    {
        return $this->render('stat/index.html.twig', [
            'controller_name' => 'StatController',
        ]);
    }
     /**
     * Affiche une statistique
     * @Route("/stat/{id}", name="stat_show", methods={"GET"})
     * @param Stat $stat
     */
    public function show(Stat $stat)
    {
    }

    /**
     *Formulaire de création de statistiques 
     * @Route("/stat/new", name="stat_new", methods={"GET"})
     */
    public function new()
    {
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
