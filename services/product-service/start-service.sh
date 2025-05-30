#!/bin/bash

# Get the directory where the script is located
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# Change to the product service directory
cd "$SCRIPT_DIR"

# Check if vendor directory exists, if not run composer install
if [ ! -d "vendor" ]; then
    echo "Installing dependencies..."
    composer install
fi

# Start the PHP development server
echo "Starting Product Service on http://localhost:8001"
php -S localhost:8001 -t public 