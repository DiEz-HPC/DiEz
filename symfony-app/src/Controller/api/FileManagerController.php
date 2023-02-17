<?php

namespace App\Controller\api;

require __DIR__ . '/../../../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use EdSDK\FlmngrServer\FlmngrServer;

#[Route('/api/v2', name: 'FileManager_')]
class FileManagerController extends AbstractController
{
 
    #[Route('/filemanager', name: 'filemanager')]
    public function filemanager(): Response
    {
        // get the kernel dir
        $kernelDir = $this->getParameter('kernel.project_dir');
        FlmngrServer::flmngrRequest(
            array(
                // Directory of your files storage
                'dirFiles' =>  $kernelDir . '/public/uploads/images',
        
                // Optionally: if you wish to use separate directory for cache files
                // This is handy when your "dirFiles" is slower a local disk,
                // for example this is a drive mounted over a network.
                //'dirCache' => '/var/www/cache'
            )
        );
        return new Response();
    }
}
