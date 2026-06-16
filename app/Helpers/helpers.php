<?php

use App\Core\Csrf;

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(Csrf::token()) . '">';
}

function money($amount): string
{
    return number_format((float) $amount) . ' ریال';
}

function app_base_path(): string
{
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');

    if ($basePath === '/' || $basePath === '.') {
        return '';
    }

    return $basePath;
}

function url(string $path = ''): string
{
    return app_base_path() . '/' . ltrim($path, '/');
}
