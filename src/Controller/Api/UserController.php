<?php

namespace App\Controller\Api;

use App\Entity\User;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/api/register", methods={"POST"})
     */
    public function register(
        Request $request, 
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $userPasswordHasherInterface ): JsonResponse
    {
        // Récupérer les données d'inscription depuis la requête
        $data = json_decode($request->getContent(), true);

        // Créer un nouvel utilisateur
        $user = new User();
        $user->setEmail($data['email']);

        $user->setAvatar($data['avatar']);
        $user->setUsername($data['username']);
        $user->setRoles(["ROLE_USER"]);

        // Hacher le mot de passe
        $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $data['password']);
        $user->setPassword($hashedPassword);

        // Persiste l'utilisateur dans la base de données
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse(['message' => 'User enregistré']);
    }

    /**
     * @Route("/api/users", methods={"GET"})
     */
    public function listUser(UserRepository $userRepository): Response
    {
        $user = $userRepository->getRepository(User::class)->findAll();
        
        $userData = [];
        foreach ($user as $user) {
            $userData[] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'role' => $user->getRole(),
                'avatar' => $user->getAvatar(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
            ];
        }

        return $this->json($userData);
    }

    /**
     * @Route("/api/user/{id}", methods={"GET"})
     */
    public function findUser(int $id,UserRepository $userRepository): Response
    {
        $user = $userRepository->getRepository(User::class)->find($id);

        if (!$user) {
            return $this->json(['message' => 'Utilisateur non trouvé'], Response::HTTP_NOT_FOUND);
        }

        $userData = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'role' => $user->getRole(),
            'avatar' => $user->getAvatar(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];

        return $this->json($userData);
    }
}
