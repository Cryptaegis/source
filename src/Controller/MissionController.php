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
           ['mission_form'=>$mission->getId()]);             
        }
        return new  Response($twig->render('mission/show.html.twig', ['mission_form'=>$form->createView()]));


        // TODO: Implement the logic for the mission controller
        return new Response('Mission not created..');
        return $this->render('templates\mission\show.html.twig', [
            'controller_name' => 'MissionController',
        ]);
    }

 /**
     * @Route("/agent/{mission_form}", name="ac-agent")
    */
    public function agent(Environment $twig, Request $request)
    {
        $mission = new Mission();
        $form = $this->createForm(MissionFormType::class, $mission);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data= $form->getData();
            $nom = $data->getNom();
            $alias = $data->getAlias();
            $statut = $data->getStatut();
            $description = $data->getDescription();
            $contact = $data->getContact();
            $cible = $data->getCible();
            $planque =$data->getPlanque();
            $dated = $data->getDateDebut();
            $datef = $data->getDateFin();
            return $this->render('agent/index.html.twig',['Nom'=>$nom, 'Alias' => $alias, 'Statut' => $statut, 'Description' => $description, 'Contact' => $contact, 'Cible' => $cible, 'Planque'=> $planque, 'DateDebut' => $dated, 'DateFin'=>$datef ]);
        }else{
            return $this->render('mission/show.html.twig',
            ['mission_form'=>$form]
);
        }
        
        //afficher le resultat du formulaire dans le document index.html.twig
        /* return $this->render('agent/index.html.twig', [
            'controller_name' => 'AgentController',
        ]);*/
    }
}