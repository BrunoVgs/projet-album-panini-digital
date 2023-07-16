<?php

namespace App\Controller\SecurityOld;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;


class RegisterController extends AbstractController
{

    /**
     * @Route("/register", name="register", methods={"POST"})
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

        // Hacher le mot de passe
        $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $data['password']);
        $user->setPassword($hashedPassword);

        // Persiste l'utilisateur dans la base de données
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse(['message' => 'User enregistré']);
    }

     /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(
        Request $request, 
        UserRepository $userRepository,
        UserPasswordHasherInterface $userPasswordHasherInterface): JsonResponse
        
    {
        $data = json_decode($request->getContent(), true);

        $email = $data['email'];
        $password = $data['password'];

        $user = $userRepository->findOneBy(['email' => $email]);

        if (!$user || !$userPasswordHasherInterface->isPasswordValid($user, $password)) {
            return new JsonResponse(['message' => 'Email ou mot de passe invalide'], 401);
        }

        // Generate JWT token
        $token = $this->jwtManager->create($user);

        return new JsonResponse(['token' => $token]);
    }
}
?>
