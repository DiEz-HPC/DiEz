<?php

namespace App\Service;

use App\Repository\ThemeRepository;

class ConfigurationTheme
{
    private const FILENAME = 'css/theme.css';
    public function __construct(private ThemeRepository $themeRepository)
    {}

    public function defineTheme(): void
    {
        $theme = $this->themeRepository->findOneBy(['isActive' => true]);

        if ($theme) {
            $primary = $theme->getPrimaryColor();
            $secondary = $theme->getSecondaryColor();
            $dark = $theme->getDarkColor();
            $light = $theme->getLightColor();
            $content = ":root{
        --primaryColor: $primary !important;
        --secondaryColor: $secondary !important;
        --darkColor: $dark !important;
        --lightColor: $light !important;
        }";
            $css = file_put_contents(self::FILENAME, $content);
        } else {
            if (file_exists(self::FILENAME)) {
                $css = file_put_contents(self::FILENAME, '/* File is empty because theme is not active */');
            }
        }

    }
}
