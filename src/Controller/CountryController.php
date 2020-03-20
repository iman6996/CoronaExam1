<?php

namespace App\Controller;

use App\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/country", name="country")
     */
    public function index()
    {
        return $this->render('country/index.html.twig', [
            'controller_name' => 'CountryController',
        ]);
    }
    /**
     * Affiche un pays
     * @Route("/country/{id}", name="country_show", methods={"GET"})
     * @param Country $country
     */
    public function show(Country $country)
    {
    }

    /**
     * Affiche le formulaire de création d'un pays
     * @Route("/country/new", name="country_new", methods={"GET"})
     */
    public function new()
    {
    }

    /**
     * Traite la requête d'un formulaire de création d'un pays
     * @Route("/country", name="country_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * Affiche et Traite le formulaire d'édition d'un pays (POST) et (GET)
     * 
     * @Route("/country/{id}/edit", name="country_edit", methods={"GET", "POST"})
     * @param Country $country
     */
    public function edit(Country $country)
    {
    }

    /**
     * Supprime un pays
     * @Route("/country/{id}", name="country_delete", methods={"DELETE"})
     * @param Country $country
     */
    public function delete(Country $country)
    {
    }
}
