<?php

namespace Nexph\View;

class ViewFactory
{
    public function __construct(
        private string $basePath
    ) {}

    public function make(string $view, array $data = []): View
    {
        $path = $this->basePath . '/' . str_replace('.', '/', $view) . '.nx.php';
        return new View($path, $data);
    }
}
