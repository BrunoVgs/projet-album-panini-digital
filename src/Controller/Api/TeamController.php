<?php

namespace App\Controller\Api;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class TeamController extends AbstractController
{
    /**
     * @Route("/api/teams", methods={"GET"})
     */
    public function listTeams(TeamRepository $teamRepository, SerializerInterface $serializer): Response
    {
        $teams = $teamRepository->findAll();
        $serializedTeams = $serializer->serialize($teams, 'json', ['groups' => 'team_read']);

        return new JsonResponse($serializedTeams, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/api/team/{id}", methods={"GET"})
     */
    public function findTeam(int $id, TeamRepository $teamRepository, SerializerInterface $serializer): Response
    {
        $team = $teamRepository->find($id);

        if (!$team) {
            return $this->json(['message' => 'Equipe non trouvée'], Response::HTTP_NOT_FOUND);
        }

        $serializedTeam = $serializer->serialize($team, 'json', ['groups' => 'team_read']);

        return new JsonResponse($serializedTeam, Response::HTTP_OK, [], true);
    }
}