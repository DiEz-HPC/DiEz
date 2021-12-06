<?php

namespace App\Service\Image;

use App\Entity\ImageFluid;
use Doctrine\ORM\EntityManagerInterface;

class MediasFluid implements ImageFluidInterface
{
    private array $imagesFluids = [];

    public function __construct(
        private ResizeImage $resizeImage,
        private EntityManagerInterface $entityManager
    )
    {}

    public function getImagesFluid(string $baseImageName): array
    {
         $this->imagesFluids = $this->entityManager->getRepository(ImageFluid::class)->findBy([
            'baseImageName' => $baseImageName
        ]);

         return $this->imagesFluids;
    }

    public function setImagesFluid(string $baseImageName): array
    {
        $this->imagesFluids =  $this->createImagesFluid($baseImageName);
        return $this->imagesFluids;
    }

    public function createImagesFluid(string $baseImageName): array
    {
        $this->resizeImage->setFileName($baseImageName());
        return $this->resizeImage->resize();
    }

    public function removeImagesFluid(string $baseImageName): void
    {
        foreach ($this->getImagesFluid($baseImageName) as $imageFluid) {
            $this->entityManager->remove($imageFluid);
        }

        $this->imagesFluids =  [];
    }
}
