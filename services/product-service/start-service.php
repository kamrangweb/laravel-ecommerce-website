<?php

// Get the directory where the script is located
$scriptDir = __DIR__;

// Change to the product service directory
chdir($scriptDir);

// Check if vendor directory exists, if not run composer install
if (!is_dir('vendor')) {
    echo "Installing dependencies...\n";
    exec('composer install');
}

// Start the PHP development server
echo "Starting Product Service on http://localhost:8001\n";
exec('php -S localhost:8001 -t public'); 