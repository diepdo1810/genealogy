<?php

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

if (!function_exists('changeRoute')) {
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function getLocalizedRoute($route, $locale)
    {
        if (session()->has('locale') && session()->get('locale') === $locale) {
            return match ($route) {
                'about' => 'gioi-thieu',
                'help' => 'tro-giup',
                'terms-of-service' => 'dieu-khoan-su-dung',
                'privacy-policy' => 'chinh-sach-bao-mat',
                default => $route,
            };
        }

        return $route;
    }
}
