<?php

namespace App\Controller\Api;


use App\Entity\Player;
use App\Repository\PlayerRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\SerializerInterface;


class PlayerController extends AbstractController
{
  /**
     * @Route("/api/players", methods={"GET"})
     */
    public function listPlayers(PlayerRepository $playerRepository, SerializerInterface $serializer): Response
    {
        $players = $playerRepository->findAll();
        $serializedPlayers = $serializer->serialize($players, 'json', ['groups' => 'player_read']);

        return new JsonResponse($serializedPlayers, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/api/players/{id}", methods={"GET"})
     */
    public function findPlayer(Player $player, SerializerInterface $serializer): Response
    {
        if (!$player) {
            return $this->json(['message' => 'Joueur non trouvé'], Response::HTTP_NOT_FOUND);
        }

        $serializedPlayer = $serializer->serialize($player, 'json', ['groups' => 'player_read']);

        return new JsonResponse($serializedPlayer, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/api/players/search", methods={"GET"})
     */
    public function searchPlayers(Request $request, PlayerRepository $playerRepository, SerializerInterface $serializer): JsonResponse
    {
        $keyword = $request->query->get('keyword');

        if (empty($keyword)) {
            return $this->json(['message' => 'Veuillez fournir un mot-clé'], Response::HTTP_BAD_REQUEST);
        }

        $players = $playerRepository->searchByName($keyword);
        $serializedPlayers = $serializer->serialize($players, 'json', ['groups' => 'player_read']);

        return new JsonResponse($serializedPlayers, Response::HTTP_OK, [], true);
    }
}
?>