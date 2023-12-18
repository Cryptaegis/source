<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MissionController
 * @package app\Controller
 * 
 */
class AgentController extends AbstractController
{
    #[Route('/agent', name: 'ac-agent')]
    public function index()
    {
        return $this->render('agent/index.html.twig', [
            'controller_name' => 'AgentController',
        ]);
        
    }
}
