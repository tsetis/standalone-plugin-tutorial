<?php

namespace Tsetis\StandalonePluginTutorial;

use Closure;
use Filament\Context\Concerns\HasColors;
use Filament\Forms\Components\Component;
use Filament\Support\Color;

class StandalonePluginTutorial extends Component
{
    use HasColors;

    protected string | int $level = 2;

    protected string | Closure $content = '';

    protected string $view = 'standalone-plugin-tutorial::heading';

    protected Color $color;

    final public function __construct(string | int $level)
    {
        $this->level($level);
    }

    public static function make(string | int $level): static
    {
        return app(static::class, ['level' => $level]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(false);
    }

    public function content(string | Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function level(string | int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getColor(): array
    {
        return $this->evaluate($this->color) ?? Color::Amber;
    }

    public function getContent(): string
    {
        return $this->evaluate($this->content);
    }

    public function getLevel(): string
    {
        return is_int($this->level) ? 'h' . $this->level : $this->level;
    }
}
