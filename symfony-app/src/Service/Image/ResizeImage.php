<?php

namespace App\Service\Image;

use App\Entity\FormatImageSize;
use App\Entity\ImageFluid;
use App\Repository\FormatImageSizeRepository;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
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

    private const QUALTIY_MIN_PNG = 9;
    private const QUALTIY_MAX_JPEG = 100;

    private const ROOT_PATH = 'uploads/images/';
    private const IMAGE_PATH = 'fluid/';
    private string $fileName;

    public function __construct(
        private FormatImageSizeRepository $formatImageSizeRepository,
        private EntityManagerInterface $entityManager
    )
    {
    }


    public function resize(): array|Exception
    {
        $imagesNames = [];
        $formats = $this->formatImageSizeRepository->findAll();
        list($width, $height) = $this->getResolution();
        try {
            foreach ($formats as $format) {
                //header('Content-Type: image/jpeg');
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
                    'baseImageName' => $this->fileName,
                    'format' => $format,
                    'newImage' => $imageNewSize,
                ];
                //Création
                $imagesNames[] = $this->createImageByType($image);
            }
            return $imagesNames;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function removeFluidsImage(): void
    {
        $images = $this->entityManager->getRepository(ImageFluid::class)->findBy([
            'baseImageName' => $this->fileName,
        ]);
        foreach ($images as $image) {
            $path = self::ROOT_PATH . self::IMAGE_PATH . $image->getImageName();
            if (file_exists($path)) {
                unlink($path);
            }
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

    /**
     * @throws Exception
     */
    private function createImageByType(array $image): ImageFluid|null
    {
        $gdImage = $image['newImage'];
        $newImageName = $this->rename($image);
        $newPath = self::ROOT_PATH . self::IMAGE_PATH . $newImageName;
        $image['imageName'] = $newImageName;
        $image['path'] = $newPath;
        return match ($this->imageType(self::ROOT_PATH . $this->getFileName())) {
            1 => imagegif($gdImage, $newPath) ? $this->newImageFluid($image) : null,
            2 => imagejpeg($gdImage, $newPath, $this->getQuality($image)) ? $this->newImageFluid($image) : null,
            3 => imagepng($gdImage, $newPath, $this->getQuality($image)) ? $this->newImageFluid($image) : null,
            18 => imagewebp($gdImage, $newPath, $this->getQuality($image)) ? $this->newImageFluid($image) : null,
        };
    }

    private function rename(array $image): array|string
    {
        $oldName = $this->getFileName();
        foreach (self::IMAGE_TYPE as $type => $extension) {
            if ($this->imageType(self::ROOT_PATH . $oldName) === $type) {
                foreach ($extension as $ext) {
                    return str_replace($ext, '_' . $image['format']->getWidth() . 'x' . $image['format']->getHeight() . $ext, $oldName);
                }
            }
        }
        return $oldName;
    }

    /**
     * @throws Exception
     */
    private function newImageFluid(array $image): ImageFluid
    {
        $fluidImage = new ImageFluid();
        $fluidImage->setBaseImageName($image['baseImageName']);
        $fluidImage->setImageName($image['imageName']);
        $fluidImage->setFormatImageSize($image['format']);
        $fluidImage->setWidth($image['format']->getWidth());
        $fluidImage->setHeight($image['format']->getHeight());
        $fluidImage->setCreatedAt(new DateTimeImmutable('', new DateTimeZone('Europe/Paris')));
        $this->entityManager->persist($fluidImage);
        $this->entityManager->flush();
        return $fluidImage;
    }

    private function getQuality(array $image): int
    {
        $type = $this->imageType(self::ROOT_PATH . $this->getFileName());
        if ($type === 3) {
            return intval(($image['format']->getQuality() * self::QUALTIY_MIN_PNG) / self::QUALTIY_MAX_JPEG);
        }

        return $image['quality']->getQuality();
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
