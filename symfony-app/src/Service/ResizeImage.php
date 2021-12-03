<?php

namespace App\Service;

use GdImage;

class ResizeImage
{
    private const IMAGE_TYPE = [
        1 => ['.gif'],
        2 => ['.jpeg', '.jpg'],
        3 => '.png',
        18 => '.webp',
    ];

    private const ROOT_PATH = 'uploads/images/';

    public function __construct(
        private string   $filename = '',
        private int|null $width = null,
        private int|null $height = null,
        private int      $percent = 1,
        private int      $quality = 100,
    )
    {
        $this->filename = self::ROOT_PATH . $this->filename;
    }

    public function resize()
    {
        $this->rename();
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

    private function createImageByFormat(): GdImage
    {
        return match ($this->imageType($this->filename)) {
            1 => imagecreatefromgif($this->filename),
            2 => imagecreatefromjpeg($this->filename),
            3 => imagecreatefrompng($this->filename),
            18 => imagecreatefromwebp($this->filename),
        };
    }

    private function renderImageByType($imageNewSize): bool
    {
        return match ($this->imageType($this->filename)) {
            1 => imagegif($imageNewSize, $this->rename()),
            2 => imagejpeg($imageNewSize, $this->rename(), $this->quality),
            3 => imagepng($imageNewSize, $this->rename(), $this->quality),
            18 => imagewebp($imageNewSize, $this->rename(), $this->quality),
        };
    }

    private function rename(): array|string
    {
        $oldName = $this->filename;
        $newName = $this->filename;
        foreach (self::IMAGE_TYPE as $type => $extension) {
            if ($this->imageType($oldName) === $type) {
                foreach ($extension as $ext) {
                    $newName = str_replace($ext, '_' . $this->width . 'x' . $this->height . $ext, $oldName);
                }
            }
        }

        return $newName;
    }

}