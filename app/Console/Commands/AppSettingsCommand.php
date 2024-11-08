<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

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
     * The variables to store environment settings.
     *
     * @var array
     */
    protected $variables = [];

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

        $this->updateEnvFile($this->variables);

        $this->output->success("The Setup has been completed successfully.");
    }

    /**
     * Update the .env file with the given variables.
     *
     * @param array $variables
     */
    protected function updateEnvFile(array $variables)
    {
        try {
            $dotenv = Dotenv::createImmutable(base_path());
            $env = $dotenv->load();
        } catch (InvalidPathException $e) {
            $env = [];
        }

        $envFilePath = base_path('.env');
        $envContent = file_exists($envFilePath) ? file_get_contents($envFilePath) : '';

        foreach ($variables as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            $replacement = "{$key}={$value}";

            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                $envContent .= "\n{$replacement}";
            }
        }

        file_put_contents($envFilePath, $envContent);
    }
}
