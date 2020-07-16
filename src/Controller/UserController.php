<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     *  @Route("/sign-in", name="sign-in")
     */

    public function signin(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $lastAuthenticationError = $authenticationUtils->getLastAuthenticationError();
            $lastEmailAdress = $authenticationUtils->getLastUsername();
    
            if ($request->query->has('Mail')) {
                $lastEmailAdress = $request->query->get('Mail');
            }
            return $this->render('User/sign-in.html.twig',
            ['lastAuthenticationError' => $lastAuthenticationError,
                'lastEmailAdress' => $lastEmailAdress,
    ]);
    }

    

    /**
     * @Route("/sign-up", name="sign-up")
     */
        public function singUp(Request $request, UserPasswordEncoderInterface $encoder) {
        $user = new user();

        $singUp = $this->createFormBuilder($user)
        ->add('name', TextType::class)
        ->add('mdp', PasswordType::class)
        ->add('email')
        ->getForm();
        $singUp->handleRequest($request);
        dump($user);
        if ($singUp->isSubmitted() && $singUp->isValid()) { 
            $hash = $encoder->encodePassword($user, $user->getMdp());
            $user->setMdp($hash); 
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush(); 
            

            return $this->redirectToRoute ('home');
        }

        return $this->render('User/sing-up.html.twig', [ 'formAddUser' => $singUp->createView()]);
    }

    /**
     * @Route("/sign-out", name="sign-out")
     */
    public function signOut()
    {
        // controller can be blank: it will never be executed!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
