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
        $this->resizeImage->setFileName($baseImageName);
        return $this->resizeImage->resize();
    }

    public function removeImagesFluid(string $baseImageName): void
    {
        $this->resizeImage->setFileName($baseImageName);
        $this->resizeImage->removeFluidsImage();
        foreach ($this->getImagesFluid($baseImageName) as $imageFluid) {
            $this->entityManager->remove($imageFluid);
        }
    }

    /**
     * @return array
     */
    public function getImagesFluids(): array
    {
        return $this->imagesFluids;
    }

    /**
     * @param array $imagesFluids
     * @return MediasFluid
     */
    public function setImagesFluids(array $imagesFluids): MediasFluid
    {
        $this->imagesFluids = $imagesFluids;
        return $this;
    }
}
