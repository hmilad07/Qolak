<?php

namespace App\Core;

final class Router
{
    private array $routes = [];

    public function get(string $path, array $action): void
    {
        $this->add('GET', $path, $action);
    }

    public function post(string $path, array $action): void
    {
        $this->add('POST', $path, $action);
    }

    public function add(string $method, string $path, array $action): void
    {
        $pattern = '#^' . preg_replace('#\{([a-z_]+)\}#', '(?P<$1>[^/]+)', $path) . '$#';
        $this->routes[] = [$method, $pattern, $action];
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $path = $this->stripBasePath($path);

        foreach ($this->routes as [$routeMethod, $pattern, $action]) {
            if ($routeMethod === $method && preg_match($pattern, $path, $matches)) {
                [$controller, $handler] = $action;
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                (new $controller())->$handler(...array_values($params));
                return;
            }
        }

        http_response_code(404);
        echo 'صفحه یافت نشد';
    }

    private function stripBasePath(string $path): string
    {
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $basePath = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');

        if ($basePath === '/' || $basePath === '.') {
            $basePath = '';
        }

        if ($basePath !== '' && str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath)) ?: '/';
        }

        return '/' . ltrim($path, '/');
    }
}
