<?php

namespace Tsetis\StandalonePluginTutorial\Commands;

use Illuminate\Console\Command;

class StandalonePluginTutorialCommand extends Command
{
    public $signature = 'standalone-plugin-tutorial';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
