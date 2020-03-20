<?php

namespace App\Controller;


use App\Entity\Country;
use App\Form\CountryType;
use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class CountryController extends AbstractController
{
    /**
     * @Route("/country", name="country")
     */
    public function index()
    {
        $countries = $this->getDoctrine()->getRepository(Country::class)->findBy([],['name' =>"ASC"]);
        return $this->render('country/index.html.twig', [
            'countries' =>$countries,
        ]);
        
    }
    /**
     * Affiche un pays
     * @Route("/country/{id}", name="country_show", methods={"GET"}, requirements={"id":"\d+"})
     * @param Country $country
     * 
     */
    public function show(Country $country)
    {
        return $this->render('country/show.html.twig', [
            'country' => $country
        ]);
    }

    /**
     * Affiche et  le formulaire de création d'un pays
     * @Route("/country/new", name="country_new", methods={"GET","POST"})
     *@param Country $country
     */
    public function new(Request $request )
    {
    $country = new Country();
    $form = $this->createForm(CountryType::class, $country);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
        $country = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($country);
        $entityManager->flush();

        return $this->redirectToRoute('country');
    }

    return $this->render('country/form.html.twig', [
        'form' => $form->createView(),
        
    ]);
    
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
