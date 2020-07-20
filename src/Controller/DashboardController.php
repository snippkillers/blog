<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractController
{

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard()
    {
        return $this->render('dashboard/dashboard.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/dashboard/list", name="list-articles")
     */

    public function listArticle()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('dashboard/list-article.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/dashboard/view/{id}", name="view-article")
     */
    public function viewArticle(int $id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        return $this->render('dashboard/view-article.html.twig', [
        'article' => $article,
        ]);
    }

    
    /**
     * @IsGranted("ROLE_BO")
     * @Route("/dashboard/create", name="create-article"))
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $article = new article();

        $form = $this->createFormBuilder($article)
        ->add('image', TextType::class)
        ->add('title', TextType::class)
        ->add('content', TextType::class)
        ->add('class', TextType::class)
        
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $this->getDoctrine()->getManager()->persist($article);
            $this->getDoctrine()->getManager()->flush(); 
            
            return $this->redirectToRoute ('view-article', ['id'=> $article->getId()]);
        }

        return $this->render('dashboard/create-article.html.twig', [ 'formAddArticle' => $form->createView()]);
    }


    /**
     * @Route("/dashboard/modified-article/{id}", name="modified-article")
     */
    public function modified(Request $request, int $id)
    {

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $form = $this->createFormBuilder($article)
        ->add('title', TextType::class)
        ->add('content', TextType::class)
        ->add('image', TextType::class)
        ->add('class', TextType::class)
        ->getForm();
        $form->handleRequest($request);
        dump($article);
        if ($form->isSubmitted() && $form->isValid()) { 
            $this->getDoctrine()->getManager()->persist($article);
            $this->getDoctrine()->getManager()->flush(); 
            
            return $this->redirectToRoute ('view-article', ['id'=> $article->getId()]);
        }

        return $this->render('dashboard/modified-article.html.twig', [ 'formAddArticle' => $form->createView()]);
    }
}
