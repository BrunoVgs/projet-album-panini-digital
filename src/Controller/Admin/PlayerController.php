<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;


/**
 * on préfixe les routes du controller en la déclarant ici
 * @Route("/back/player", name="app_back_player_", )
 */
class PlayerController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $players = $entityManager->getRepository(Player::class)->findAll();

        return $this->render('player/index.html.twig', [
            'players' => $players,
        ]);
    }

    /**
     * @Route("/list", name="list", methods={"GET"})
     */
    public function list(EntityManagerInterface $entityManager): Response
    {
        $players = $entityManager->getRepository(Player::class)->findAll();

        return $this->render('player/list.html.twig', [
            'players' => $players,
        ]);
    }


    /**
     * @Route("/new", name="new", methods={"POST"})
     */
    public function new(): Response
    {
        return $this->redirectToRoute('player/new.html.twig');
    }

    /**
     * @Route("/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit($id, EntityManagerInterface $entityManager): Response
    {
        $player = $entityManager->getRepository(Player::class)->find($id);

        if (!$player) {
            throw $this->createNotFoundException('Joueur introuvable.');
        }

        return $this->render('player/edit.html.twig', [
            'player' => $player,
        ]);
    }


    /**
     * @Route("/{id}", name="update", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function update($id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $player = $entityManager->getRepository(Player::class)->find($id);

        if (!$player) {
            throw $this->createNotFoundException('Joueur introuvable.');
        }

        // Récupérer les données du formulaire
        $firstname = $request->request->get('firstname');
        $lastname = $request->request->get('lastname');
        $age = $request->request->get('age');
        $position = $request->request->get('position');

        // Mettre à jour les propriétés du joueur
        $player->setFirstname($firstname);
        $player->setLastname($lastname);
        $player->setAge($age);
        $player->setPosition($position);

        // Enregistrer les modifications dans la base de données
        $entityManager->flush();

        // Rediriger vers la page de liste des joueurs
        return $this->redirectToRoute('app_back_player_index');
    }


    /**
     * @Route("/player/{id}/delete", name="delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Player $player, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($player);
        $entityManager->flush();

        return $this->redirectToRoute('app_back_player_index');
    }


    public function show(?Player $player): Response
    {
        if ($player === null) {
            throw $this->createNotFoundException("ce joueur n'existe pas");
        }

        return $this->render('player/show.html.twig', []);
    }
}
