<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppSettingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'p:environment:setup
                            {--url= : The URL that this Panel is running on.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure basic environment settings for the Panel.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->output->comment('The application URL MUST begin with https:// or http:// depending on if you are using SSL or not. If you do not include the scheme your emails and other content will link to the wrong location.');
        $this->variables['APP_URL'] = $this->option('url') ?? $this->ask(
            'Application URL',
            config('app.url', 'https://example.com')
        );
    }
}
