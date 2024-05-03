<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\Session;


class SecurityController extends AbstractController
{
        /**
         * @Route("/login", name="app_login")
         */
        public function login(AuthenticationUtils $authenticationUtils, Session $session): Response
        {
                

                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();
                if($error)
                {
                        return $this->redirectToRoute('home');
                echo "<script>alert('Identifiant ou mot de passe incorrect');</script>";
                 echo "<script>setTimeout(function(){document.getElementById('message').style.display = 'none';}, 10000);</script>";

                }

                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();

                $return = ['last_username' => $lastUsername, 'error' => $error];

                if($session->has('message'))
                {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                //si, ROLE_ADMIN est dans la session, on redirige vers la page d'accueil
                if ($this->isGranted('ROLE_ADMIN')) {
                        return $this->redirectToRoute('admin');
                }else{
                        return $this->render('security/login.html.twig', $return);
                }
                if($this->isGranted('ROLE_USER'))
                {
                        return $this->redirectToRoute('home');
                }else
                {
                        return $this->render('security/login.html.twig', $return);
                }
        }

        /**
         * @Route("/logout", name="app_logout")
         */
        public function logout()
        {
                throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
        }
}
