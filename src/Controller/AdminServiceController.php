<?php

namespace App\Controller;

use App\Service\GithubApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/service', name:'admin_service_')]
class AdminServiceController extends AbstractController
{
    #[Route('/github', name: 'github')]
    public function index(GithubApi $githubApi): Response
    {
        // A faire : Gérer les message d'erreur
        if($githubApi->saveRepos()) {
            $this->addFlash('success', 'Les répos ont bien été sauvegardés');
        } else {
            $this->addFlash('error', 'Les répos n\'ont pas pu être sauvegardés ou sont déja à jour');
        }
        return $this->redirectToRoute('admin_index');
    }
}
