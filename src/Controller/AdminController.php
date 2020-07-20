<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('dashboard/dashboard.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
 * @Route("/admin", name="role-user")
 */
public function usersList(UsersRepository $users)
{
    return $this->render('admin/admin.html.twig', [
        'users' => $users->findAll(),
    ]);
}

/**
 * @Route("/admin/modified-user/{id}", name="modified_user")
 */

public function editUser(Users $user, Request $request)
{
    $form = $this->createForm(EditUserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('message', 'Utilisateur modifié avec succès');
        return $this->redirectToRoute('admin_utilisateurs');
    }
    
    return $this->render('admin/edituser.html.twig', [
        'userForm' => $form->createView(),
    ]);
}
}
