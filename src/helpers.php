<?php

namespace Nexph\View;

if (!function_exists('view')) {
    function view(string $view, array $data = []): ViewResponse
    {
        $factory = app(ViewFactory::class);
        return new ViewResponse($factory->make($view, $data));
    }
}

if (!function_exists('nx')) {
    function nx(mixed $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('nx_json')) {
    function nx_json(mixed $data): string
    {
        return htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('nx_asset')) {
    function nx_asset(string $path): string
    {
        return '/' . ltrim($path, '/');
    }
}

if (!function_exists('nx_island')) {
    function nx_island(string $name, array $props): string
    {
        $encoded = htmlspecialchars(json_encode($props), ENT_QUOTES, 'UTF-8');
        return sprintf('<div nx-island="%s" nx-props="%s"></div>', nx($name), $encoded);
    }
}

if (!function_exists('nx_mount')) {
    function nx_mount(string $name, array $props): string
    {
        $encoded = htmlspecialchars(json_encode($props), ENT_QUOTES, 'UTF-8');
        return sprintf('<div nx-mount="%s" nx-props="%s"></div>', nx($name), $encoded);
    }
}
