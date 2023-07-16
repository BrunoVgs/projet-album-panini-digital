<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * on préfixe les routes du controller en la déclarant ici
     * @Route("/back/league", name="app_back_league_" )
     */
class LeagueController extends AbstractController
{
    /**
     *
     * @Route("/", name="index" , methods={"GET", "POST"})
     */
    public function index(): Response
    {
        return $this->render('league/index.html.twig', [

        ]);
    }

    /**

     * @Route("/new", name="new", methods={"POST"})
     */
    public function new(): Response
    {
        return $this->render('league/new.html.twig', [
        
        ]);
    }

    /**
     *
     * @Route ("/{id}", name="show", methods={"GET"})
     */
    public function show(): Response

    {
        return $this->render('league/show.html.twig', [

        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET", "POST"},requirements={"id"="\d+"})
     */ 
    public function edit(int $id): Response
    {
        return $this->render('league/edit.html.twig', [
        
        ]);
    }


    /**
     * @Route("/{id}",name="delete", methods={"POST"},requirements={"id"="\d+"})
     */
    public function delete(int $id): Response
    {
        return $this->render('league/delete.html.twig', [
        
        ]);
    }
}
