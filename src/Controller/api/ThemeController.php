<?php

namespace App\Controller\api;

use App\Entity\Theme;
use App\Repository\ThemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/v2', name: 'theme_')]
class ThemeController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[
        Route('/themes/active', name: 'getOne', methods: ['GET']),
    ]
    public function getLastPosts(ThemeRepository $themeRepository): Response
    {
        $theme = $themeRepository->findOneBy([
            'isActive' => true,
        ]);

        $posts = $this->serializer->serialize($theme, 'json');
        return new Response(
            content: $posts,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }

    #[
        Route('/themes/{id}', name: 'getByName', methods: ['POST'])
    ]
    public function defineTheme(
        Theme $theme,
        ThemeRepository $themeRepository,
        EntityManagerInterface $entityManager
    ): Response
    {
        if($theme->getIsActive()) {
            $theme->setIsActive(false);
        } else {
            $theme->setIsActive(true);
        }
        $entityManager->persist($theme);

        $themes = $themeRepository->findAll();
        foreach ($themes as $t) {
            if($t !== $theme) {
                $t->setIsActive(false);
                $entityManager->persist($t);
            }
        }
        $entityManager->flush();


        return new Response(
            status: Response::HTTP_OK,
        );
    }
}
