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
use FOS\CKEditorBundle\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Entity\ArticleComment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Form\EditorType;
use KMS\FroalaEditorBundle\Form\Type\FroalaEditorType;

class DashboardController extends AbstractController
{
    /**
     * @Security("is_granted('ROLE_BO')")
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
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['published' => true]);
        return $this->render('dashboard/list-article.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/dashboard/drafts", name="drafts-articles")
     */

    public function draftsArticle()
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['published' => false]);
        return $this->render('dashboard/drafts-article.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/dashboard/view/{id}", name="view-article")
     */
    public function viewArticle(int $id)
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);
        return $this->render('dashboard/view-article.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Security("is_granted('ROLE_USER')")
     * @Route("/dashboard/comment/{id}/create", name="create-comment-article")
     */
    public function createComment(Article $article, Request $request)
    {
        $comment = new ArticleComment();
        $comment->setArticle($article);

        $form = $this->createFormBuilder($comment)
            ->add('content', TextareaType::class)
            ->add('add', SubmitType::class, [
                'label' => 'Publier',
            ])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTime());
            $comment->setUser($this->getUser());
            $this->getDoctrine()
                ->getManager()
                ->persist($comment);
            $this->getDoctrine()
                ->getManager()
                ->flush();

            return $this->redirectToRoute('view-article', [
                'id' => $article->getId(),
            ]);
        }

        return $this->render('Dashboard/create-comment.html.twig', [
            'commentForm' => $form->createView(),
        ]);
    }

    /**
     * @Security("is_granted('ROLE_BO')")
     * @Route("/dashboard/create", name="create-article"))
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $article = new article();

        $form = $this->createForm(EditorType::class, $article);
        $form->handleRequest($request);
        dump($article);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($request->request->get('published')) {
                $article->setPublished(true);
            }
            $this->getDoctrine()
                ->getManager()
                ->persist($article);
            $this->getDoctrine()
                ->getManager()
                ->flush();

            if ($request->request->get('published')) {
                return $this->redirectToRoute('list-articles', [
                    'id' => $article->getId(),
                ]);
            }
            return $this->redirectToRoute('drafts-articles', [
                'id' => $article->getId(),
            ]);
        }

        return $this->render('dashboard/create-article.html.twig', [
            'formAddArticle' => $form->createView(),
        ]);
    }

    /**
     * @Security("is_granted('ROLE_EDITOR')")
     * @Route("/dashboard/modified-article/{id}", name="modified-article")
     */
    public function modified(Request $request, int $id)
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);
        $form = $this->createFormBuilder($article)
            ->add('title', TextType::class)
            ->add('content', FroalaEditorType::class)
            ->add('image', TextType::class)
            ->add('class', TextType::class)
            ->add('published')
            ->getForm();
        $form->handleRequest($request);
        dump($article);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($request->request->get('published')) {
                $article->setPublished(true);
            }
            $this->getDoctrine()
                ->getManager()
                ->persist($article);
            $this->getDoctrine()
                ->getManager()
                ->flush();

            if ($request->request->get('published')) {
                return $this->redirectToRoute('list-articles', [
                    'id' => $article->getId(),
                ]);
            }
            return $this->redirectToRoute('drafts-articles', [
                'id' => $article->getId(),
            ]);
        }

        return $this->render('dashboard/modified-article.html.twig', [
            'formAddArticle' => $form->createView(),
        ]);
    }

    /**
     * @Security("is_granted('ROLE_EDITOR')")
     * @Route("/dashboard/delete-article/{id}", name="delete-article")
     */
    public function delete(Request $request, Article $article)
    {
        $this->getDoctrine()
            ->getManager()
            ->remove($article);
        $this->getDoctrine()
            ->getManager()
            ->flush();

        return $this->redirectToRoute('list-articles');
    }
}
