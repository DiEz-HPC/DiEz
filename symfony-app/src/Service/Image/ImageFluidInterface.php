<?php

namespace App\Service\Image;

interface ImageFluidInterface
{
    public function getImagesFluid(string $baseImageName): array;
    public function setImagesFluid(string $baseImageName): array;
    public function removeImagesFluid(string $baseImageName): void;
    public function createImagesFluid(string $baseImageName): array;

}
