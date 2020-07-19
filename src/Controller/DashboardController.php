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
     * @Route("/dashboard/create", name="create-article"))
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $product = new article();

        $form = $this->createFormBuilder($article)
        ->add('title', TextType::class)
        ->add('content', TextType::class)
        ->add('image', TextType::class)
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

        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $form = $this->createFormBuilder($product)
        ->add('title', TextType::class)
        ->add('content', TextType::class)
        ->add('image', TextType::class)
        ->getForm();
        $form->handleRequest($request);
        dump($product);
        if ($form->isSubmitted() && $form->isValid()) { 
            $this->getDoctrine()->getManager()->persist($product);
            $this->getDoctrine()->getManager()->flush(); 
            
            return $this->redirectToRoute ('product_view', ['id'=> $product->getId()]);
        }

        return $this->render('Product/modifedProduct.html.twig', [ 'formAddProduct' => $form->createView()]);
    }
}
