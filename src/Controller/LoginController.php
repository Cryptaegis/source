<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        if ($this->getUser()) {
            return $this->redirectToRoute('Mission');
        }
       $authChecker = $this->container->get('security.authorization_checker');
       if ($authChecker->isGranted('ROLE_ADMIN')) {
           return $this->redirectToRoute('admin');
       }
       if ($authChecker->isGranted('ROLE_AGENT')) {
           return $this->redirectToRoute('agent');
       }
       return $this->render('login/login.html.twig', [
        'last_username' => $authenticationUtils->getLastUsername(),
        'error'         => $authenticationUtils->getLastAuthenticationError(),
    ]);

        return $this->render('login/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
            
   




    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}