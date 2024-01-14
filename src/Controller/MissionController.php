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
    public function show( Request $request, EntityManagerInterface $entityManager)
    {
        //Récupération de la liste des missions en base

        $mission = new Mission();
        $form = $this->createForm(MissionFormType::class, $mission);
        $form->handleRequest($request);
        $agreeTerms = $form->get('agreeTerms')->getData();

        if ($form->isSubmitted() && $form->isValid() && $agreeTerms) {
            $data = $form->getData();
            $nom = $data->getNom();
            $alias = $data->getAlias();
            $statut = $data->getStatut();
            $description = $data->getDescription();
            $contact = $data->getContact();
            $cible = $data->getCible();
            $planque = $data->getPlanque();
            $dated = $data->getDateDebut();
            $datef = $data->getDateFin();
            return $this->render('navigation/quest.html.twig', ['Nom'=> $nom, 'Alias' => $alias, 'Statut' => $statut, 'Description' => $description, 'Contact' => $contact, 'Cible' => $cible, 'Planque'=> $planque, 'DateDebut' => $dated, 'DateFin'=>$datef ]);
            $entityManager->persist($mission);
            $entityManager->flush();
        } else {
            return $this->render('mission/show.html.twig', [
                'mission_form' => $form->createView(),
            ]);
            // TODO: Implement the logic for the mission controller
            return $this->render('mission/show.html.twig', [
                'controller_name' => 'MissionController',
            ]);
        }



    }
}
