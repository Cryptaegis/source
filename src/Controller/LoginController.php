<?php

namespace App\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;
use App\Entity\Agent;
use App\Form\InscriptionAgentType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]

    public function index(AuthenticationUtils $authenticationUtils, Environment $twig, Request $request, EntityManagerInterface $manager): Response
    {

         // get the login error if there is one
     $error = $authenticationUtils->getLastAuthenticationError();
       // last username entered by the user
        $mail = $request->request->get('email');
        if ($request->isMethod('POST') && $authenticationUtils->getLastAuthenticationError() === null) {
           return $this->redirectToRoute('Mission');             
        }


        return $this->render('login/index.html.twig', [
            'mail' => $mail,
              'error'         => $error,
        ]);

    }
}
