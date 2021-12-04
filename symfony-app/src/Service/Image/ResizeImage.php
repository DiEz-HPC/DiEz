<?php

namespace App\Service\Image;

use App\Repository\FormatImageSizeRepository;
use Exception;
use GdImage;

class ResizeImage
{
    private const IMAGE_TYPE = [
        1 => ['.gif'],
        2 => ['.jpeg', '.jpg'],
        3 => ['.png'],
        18 => ['.webp'],
    ];

    private const ROOT_PATH = 'uploads/images/';
    private const IMAGE_PATH = 'fluid/';
    private string $fileName;

    public function __construct(private FormatImageSizeRepository $formatImageSizeRepository)
    {
    }


    public function resize(): bool
    {
        $formats = $this->formatImageSizeRepository->findAll();
        list($width, $height) = $this->getResolution();
        try {
            foreach ($formats as $format) {
                header('Content-Type: image/jpeg');
                // Calcul des nouvelles dimensions
                $newWidth = $width;
                $newHeight = $height;
                if (($format->getWidth() && $format->getHeight()) || $format->getPercent()) {
                    $newHeight = $format->getHeight() ?? $height * $format->getPercent();
                    $newWidth = $format->getWidth() ?? $width * $format->getPercent();
                }

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

                $image = [
                    'newImage'=> $imageNewSize,
                    'width'=> $newWidth,
                    'height'=> $newHeight,
                    'quality'=> $format->getQuality(),
                ];

                //Création
                $this->renderImageByType($image);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function imageType($filename): int
    {
        return exif_imagetype($filename);
    }

    private function createImageByFormat(): GdImage
    {
        return match ($this->imageType(self::ROOT_PATH . $this->getFileName())) {
            1 => imagecreatefromgif(self::ROOT_PATH . $this->getFileName()),
            2 => imagecreatefromjpeg(self::ROOT_PATH . $this->getFileName()),
            3 => imagecreatefrompng(self::ROOT_PATH . $this->getFileName()),
            18 => imagecreatefromwebp(self::ROOT_PATH . $this->getFileName()),
        };
    }

    private function renderImageByType(array $image): bool
    {
        return match ($this->imageType($this->getFileName())) {
            1 => imagegif($image['newImage'], self::ROOT_PATH . self::IMAGE_PATH . $this->rename($image)),
            2 => imagejpeg($image['newImage'], self::ROOT_PATH . self::IMAGE_PATH . $this->rename($image), $image['quality']),
            3 => imagepng($image['newImage'], self::ROOT_PATH . self::IMAGE_PATH . $this->rename($image), $image['quality']),
            18 => imagewebp($image['newImage'], self::ROOT_PATH . self::IMAGE_PATH . $this->rename($image), $image['quality']),
        };
    }

    private function rename(array $image): array|string
    {
        $oldName = $this->getFileName();
        dd($oldName);
        foreach (self::IMAGE_TYPE as $type => $extension) {
            if ($this->imageType($oldName) === $type) {
                foreach ($extension as $ext) {
                    return str_replace($ext, '_' . $image['width'] . 'x' . $image['height'] . $ext, $oldName);
                }
            }
        }
        return $oldName;
    }


    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return ResizeImage
     */
    public function setFileName(string $fileName): ResizeImage
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getResolution(): array
    {
        return getimagesize(self::ROOT_PATH . $this->getFileName());
    }

}