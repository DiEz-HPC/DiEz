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
        $githubApi->saveRepos();
        return $this->redirectToRoute('admin_index');
    }
}
