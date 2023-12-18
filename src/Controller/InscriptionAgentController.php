<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Agent;
use App\Form\InscriptionAgentType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionAgentController extends AbstractController
{

    #[Route('/in', name: 'inscription_agent')]

    public function index(Environment $twig, Request $request, EntityManagerInterface $manager) // Update this line
    {
        $agent= new Agent();
        $form = $this->createForm(InscriptionAgentType::class, $agent);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

           $manager->persist($agent);
           $manager->flush();


            return $this->redirectToRoute('app_main');
        }

        return new Response($twig->render('inscription_agent/index.html.twig', ['agent_form' =>$form->createView()]));

        return $this->render('inscription_agent/index.html.twig', [
            'controller_name' => 'InscriptionAgentController',
        ]);
    } 
     
}
