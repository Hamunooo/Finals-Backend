<?php

// Generate placeholder product images using curl
$products = [
    'headphones' => 'FF6B6B',
    'smartwatch' => '4ECDC4',
    'cable' => '95E1D3',
    'laptop-stand' => 'F38181',
    'watch' => 'FFEAA7',
    'tshirt' => 'A29BFE',
    'jacket' => '6C5CE7',
    'sunglasses' => '00B894',
    'mug' => 'FF7675',
    'knife-set' => 'D63031',
    'pillow' => 'FDCB6E',
    'lamp' => 'E17055',
    'yoga-mat' => '00CEC9',
    'dumbbells' => '0984E3',
    'shoes' => '5F27CD',
    'water-bottle' => '00D2D3',
];

$uploadDir = __DIR__ . '/storage/app/public/products/';

// Create directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

foreach ($products as $filename => $color) {
    $filepath = $uploadDir . $filename . '.jpg';
    $label = ucfirst(str_replace('-', ' ', $filename));
    $url = "https://via.placeholder.com/400x400/{$color}/FFFFFF?text={$label}";
    
    // Use curl to download
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $imageData = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200 && $imageData !== false) {
        file_put_contents($filepath, $imageData);
        echo "✓ Created: $filename.jpg\n";
    } else {
        echo "✗ Failed to create: $filename.jpg (HTTP $httpCode)\n";
    }
}

echo "\nDone! Product images have been generated.\n";
?>


