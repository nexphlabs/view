<?php

namespace Nexph\View;

class View
{
    public function __construct(
        private string $path,
        private array $data = []
    ) {}

    public function render(): string
    {
        $basePath = defined('NEXPH_BASE_PATH') ? NEXPH_BASE_PATH : getcwd();
        $compiled = (new ViewCompiler($basePath . '/storage/nexph/views'))->compile($this->path);
        extract($this->data);
        ob_start();
        require $compiled;
        return ob_get_clean();
    }

    public function with(string $key, mixed $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }
}
