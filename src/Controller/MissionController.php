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


class MissionController extends AbstractController
{
    /**
     * @Route("/show" )
     */
    public function show(Environment $twig, Request $request, EntityManagerInterface $entityManager)
    {
        $mission = new Mission();
        $form = $this->createForm(MissionFormType::class, $mission);
        $form->handleRequest($request);
        $agreeTerms = $form->get('agreeTerms')->getData();

        if ($form->isSubmitted() && $form->isValid() && $agreeTerms) {
           $entityManager->persist($mission);
           $entityManager->flush();

           return new Response('Mission number'. $mission->getId(). 'created..');
        }

        return new  Response($twig->render('mission:show.html.twig', ['mission_form'=>$form->createView()]));
        // TODO: Implement the logic for the mission controller
        return $this->render('mission/index.html.twig', [
            'controller_name' => 'MissionController',
        ]);
    }
}
