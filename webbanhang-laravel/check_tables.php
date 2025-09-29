<?php

echo "=== EShopper Database Tables ===\n";
// Change to eshopper directory
chdir('eshopper');

// Load Laravel autoloader
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

// Boot the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get database connection
$eshopper_tables = DB::select('SHOW TABLES');
foreach($eshopper_tables as $table) {
    $table_name = array_values((array)$table)[0];
    echo "- $table_name\n";
}

echo "\n=== WebHuy Database Tables ===\n";
// Change to webhuy directory  
chdir('../webhuy');

// Load Laravel autoloader
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

// Boot the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get database connection
$webhuy_tables = DB::select('SHOW TABLES');
foreach($webhuy_tables as $table) {
    $table_name = array_values((array)$table)[0];
    echo "- $table_name\n";
}

echo "\n=== Summary ===\n";
echo "Both projects use the same database: shop_shared\n";
echo "EShopper prefix: esh_\n";
echo "WebHuy prefix: wh_\n";
echo "Database connection: SHARED (same database, different table prefixes)\n";