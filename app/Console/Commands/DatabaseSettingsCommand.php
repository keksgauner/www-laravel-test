<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

class DatabaseSettingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'p:environment:database
                            {--host= : The connection address for the MySQL server.}
                            {--port= : The connection port for the MySQL server.}
                            {--database= : The database to use.}
                            {--username= : Username to use when connecting.}
                            {--password= : Password to use for this database.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure database settings for the Panel.';

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
        $this->output->note('It is highly recommended to not use "localhost" as your database host as we have seen frequent socket connection issues. If you want to use a local connection you should be using "127.0.0.1".');
        $this->variables['DB_HOST'] = $this->option('host') ?? $this->ask(
            'Database Host',
            config('database.connections.mysql.host', '127.0.0.1')
        );

        $this->variables['DB_PORT'] = $this->option('port') ?? $this->ask(
            'Database Port',
            config('database.connections.mysql.port', 3306)
        );

        $this->variables['DB_DATABASE'] = $this->option('database') ?? $this->ask(
            'Database Name',
            config('database.connections.mysql.database', 'panel')
        );

        $this->output->note('Using the "root" account for MySQL connections is not only highly frowned upon, it is also not allowed by this application. You\'ll need to have created a MySQL user for this software.');
        $this->variables['DB_USERNAME'] = $this->option('username') ?? $this->ask(
            'Database Username',
            config('database.connections.mysql.username', 'pterodactyl')
        );

        $askForMySQLPassword = true;
        if (!empty(config('database.connections.mysql.password')) && $this->input->isInteractive()) {
            $this->variables['DB_PASSWORD'] = config('database.connections.mysql.password');
            $askForMySQLPassword = $this->confirm('It appears you already have a MySQL connection password defined, would you like to change it?');
        }

        if ($askForMySQLPassword) {
            $this->variables['DB_PASSWORD'] = $this->option('password') ?? $this->secret('Database Password');
        }

        $this->updateEnvFile($this->variables);

        $this->output->success('Database settings have been configured successfully.');
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
