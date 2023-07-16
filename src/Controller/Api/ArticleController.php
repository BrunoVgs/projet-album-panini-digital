<?php
namespace App\Controller\Api;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/api/articles", methods={"GET"})
     */
    public function listArticles(ArticleRepository $articleRepository, SerializerInterface $serializer): Response
    {
        $articles = $articleRepository->findAll();
        $serializedArticles = $serializer->serialize($articles, 'json', ['groups' => 'article_read']);

        return new Response($serializedArticles, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/api/article/{id}", methods={"GET"})
     */
    public function findArticle(int $id, ArticleRepository $articleRepository, SerializerInterface $serializer): Response
    {
        $article = $articleRepository->find($id);

        if (!$article) {
            return $this->json(['message' => 'Article non trouvé'], Response::HTTP_NOT_FOUND);
        }

        $serializedArticle = $serializer->serialize($article, 'json', ['groups' => 'article_read']);

        return new Response($serializedArticle, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
}
?>
