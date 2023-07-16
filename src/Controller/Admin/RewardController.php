<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RewardController extends AbstractController
{
    /**
     * @Route("/reward", name="app_reward")
     */
    public function index(): Response
    {
        return $this->render('reward/index.html.twig', [
        
        ]);
    }
}
