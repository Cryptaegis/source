<?php
namespace App\Controller;
use App\Form\MissionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use App\Entity\Mission;
//KERNEL


class MissionController extends AbstractController
{
    /**
     * @Route("/show", name="Mission")
     */
    public function show(Environment $twig, Request $request, EntityManagerInterface $entityManager)
    {
        //Récupération de la liste des missions en base

        $mission = new Mission();
        $form = $this->createForm(MissionFormType::class, $mission);
        $form->handleRequest($request);
        $agreeTerms = $form->get('agreeTerms')->getData();

        if ($form->isSubmitted() && $form->isValid() && $agreeTerms) {
            // be absolutely sure they agree
           $entityManager->persist($mission);
           $entityManager->flush();
           return $this->redirectToRoute('ac-agent',
           ['id'=>$mission->getId()]);             
        }
        return new  Response($twig->render('mission/show.html.twig', ['mission_form'=>$form->createView()]));

        // TODO: Implement the logic for the mission controller
        return new Response('Mission not created..');
        return $this->render('templates\mission\show.html.twig', [
            'controller_name' => 'MissionController',
        ]);
    }
    /**
     * @Route("/agent/{id}", name="ac-agent")
     */
    public function agent(Environment $twig)
    {
        // Récupère l'entity à partir de la base de données et l'affiche

        return new  Response($twig->render('mission/agent.html.twig', ['id'=>"1"]));
    }
    

}