<?php

namespace App\Controller\Admin;


use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller Users pour la gestion des utilisateurs via l'espace admin
 *@Route("/back/user", name="app_back_user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        $form = $this->createForm(UserType::class);
        if ($form->isSubmitted()) {
            die('coucou');
        }


        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/new",name="new", methods={"POST"})
     */
    public function new(): JsonResponse
    {
        return $this->json([
            'message' => 'Ajout d’un utilisateur',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
    /**
    * @Route("/{id}/edit", methods={"GET", "POST"},requirements={"id"="\d+"})
    */
    public function edit(int $id): JsonResponse
    {
        return $this->json([
            'message' => 'Modification d’un utilisateur spécifique',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
    /**
     * @Route("/{id}",methods={"POST"},requirements={"id"="\d+"})
     */
    public function delete(int $id): JsonResponse
    {
        return $this->json([
            'message' => 'Suppression d’un utilisateur spécifique',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}