<?php

namespace App\Service;

use GdImage;

class ResizeImage
{
    private const IMAGE_TYPE = [
        1 => IMAGETYPE_GIF,
        2 => IMAGETYPE_JPEG,
        3 => IMAGETYPE_PNG,
        6 => IMAGETYPE_BMP,
        18 => IMAGETYPE_WEBP,
    ];

    public function __construct(
        private string $filename = '',
        private int|null $width = null,
        private int|null $height = null,
        private int $percent = 1,
        private int $quality = 100,
    )
    {}

    public function resize()
    {
        // Content type
        header('Content-Type: image/jpeg');

        // Calcul des nouvelles dimensions
        list($width, $height) = getimagesize($this->filename);

        $newHeight = $this->height ?? $height * $this->percent;
        $newWidth = $this->width ?? $width * $this->percent;

        // Redimensionnement
        $imageNewSize = imagecreatetruecolor($newWidth, $newHeight);

        imagecopyresampled(
            dst_image: $imageNewSize,
            src_image: $this->createImageByFormat(),
            dst_x: 0,
            dst_y: 0,
            src_x: 0,
            src_y: 0,
            dst_width: $newWidth,
            dst_height: $newHeight,
            src_width: $width,
            src_height: $height);

        // Affichage
        dd($this->renderImageByType($imageNewSize));
    }

    private function imageType($filename): int
    {
        return exif_imagetype($filename);
    }

    private function createImageByFormat (): GdImage
    {
        return match ($this->imageType($this->filename)) {
            1 => imagecreatefromgif($this->filename),
            2 => imagecreatefromjpeg($this->filename),
            3 => imagecreatefrompng($this->filename),
            18 => imagecreatefromwebp($this->filename),
        };
    }

    private function renderImageByType ($imageNewSize): bool
    {
        return match ($this->imageType($this->filename)) {
            1 => imagegif($imageNewSize, null),
            2 => imagejpeg($imageNewSize, null, $this->quality),
            3 => imagepng($imageNewSize, null, $this->quality),
            18 => imagewebp($imageNewSize, null, $this->quality),
        };
    }

}