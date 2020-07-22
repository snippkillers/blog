<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['published' => true], ['id' => 'DESC'], 5);
        return $this->render('Blog/home.html.twig', [
            'articles' => $articles,
        ]);
    }
}
