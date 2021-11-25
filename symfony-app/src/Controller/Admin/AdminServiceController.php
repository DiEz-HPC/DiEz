<?php

namespace App\Controller\Admin;

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
            $this->addFlash('success', 'Les répos ont bien été sauvegardés ou mis à jour');
        } else {
            $this->addFlash('danger', 'Aucune modification n\'a était apportée.');
        }
        return $this->redirectToRoute('admin_index');
    }
}
