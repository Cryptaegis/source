<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Session\Session;

class NavigationController extends AbstractController
{
        /**
         * @Route("/", name="home")
         */
        public function home(Session $session)
        {
                $return = [];

                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->render('navigation/home.html.twig');
        }
        /**
         * @Route("/ministere", name="ministere", methods={"GET"})
         */
        public function ministere(Session $session)
        {
                $return = [];

                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->render('navigation/ministere.html.twig');
        }
        /**
         * @Route("/politics", name="politics", methods={"GET"})
         */
        public function politics(Session $session)
        {
                $return = [];

                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->render('navigation/politics.html.twig');
        }
        /**
         * @Route("/Dossier pays", name="land", methods={"GET"})
         */
        public function land(Session $session)
        {
                $return = [];

                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->render('navigation/land.html.twig');
        }
        /**
         * @Route("/contact", name="contact", methods={"GET"})
         */
        public function contact(Session $session)
        {
                $return = [];

                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->render('navigation/contact.html.twig');
        
        }

        
        /**
         * @Route("/Apropos", name="story", methods={"GET"})
         */
        public function story(Session $session)
        {
                $return = [];

                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->render('navigation/story.html.twig');
        }

/**
 * Class MissionController
 * @package app\Controller
 * 
 */
        /**
         * @Route("/membre", name="membre")
         * @IsGranted("IS_AUTHENTICATED_FULLY")
         */
        public function membre(Session $session)
        {
                   
                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                       $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                //test si un utilisateur est connecté
                $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
                return $this->render('navigation/membre.html.twig');
        }



        /**
         * Besoin des droits admin
         * @Route("/admin", name="admin")
         * @IsGranted("ROLE_ADMIN")
         */
        public function admin(Session $session)
        {
                $utilisateur = $this->getUser();
                if (!$utilisateur) {
                        $session->set("message", "Merci de vous connecter");
                        return $this->redirectToRoute('app_login');
                } else if (in_array('ROLE_ADMIN', $utilisateur->getRoles())) {
                        return $this->render('navigation/admin.html.twig');
                }
                $session->set("message", "Vous n'avez pas le droit d'acceder à la page admin vous avez été redirigé sur cette page");
                if ($session->has('message')) {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->redirectToRoute('home', $return);
        }
}
