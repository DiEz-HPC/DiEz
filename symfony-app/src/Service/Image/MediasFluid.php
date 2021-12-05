<?php

namespace App\Service\Image;

use App\Entity\ImageFluid;
use Doctrine\ORM\EntityManagerInterface;

class MediasFluid implements ImageFluidInterface
{

    public function __construct(
        private ResizeImage $resizeImage,
        private EntityManagerInterface $entityManager
    )
    {}

    public function getImagesFluid(string $baseImageName): array
    {
        return $this->entityManager->getRepository(ImageFluid::class)->findBy([
            'baseImageName' => $baseImageName
        ]);
    }

    public function setImagesFluid(string $baseImageName): void
    {
        $this->resizeImage->setFileName($baseImageName());
        $this->resizeImage->resize();
    }
}
