<?php
require('../vendor/autoload.php');

use App\Factory\VehicleFactory;

$factory = new VehicleFactory();

echo "=== Création par type ===" . PHP_EOL . PHP_EOL;

$bicycle = $factory->create('bicycle');
$car     = $factory->create('car');
$truck   = $factory->create('truck');

echo "Véhicule   : " . get_class($bicycle) . PHP_EOL;
echo "Carburant  : " . $bicycle->getFuelType() . PHP_EOL;
echo "Coût/km    : " . $bicycle->getCostPerKm() . "€" . PHP_EOL;

echo PHP_EOL;

echo "Véhicule   : " . get_class($car) . PHP_EOL;
echo "Carburant  : " . $car->getFuelType() . PHP_EOL;
echo "Coût/km    : " . $car->getCostPerKm() . "€" . PHP_EOL;

echo PHP_EOL;

echo "Véhicule   : " . get_class($truck) . PHP_EOL;
echo "Carburant  : " . $truck->getFuelType() . PHP_EOL;
echo "Coût/km    : " . $truck->getCostPerKm() . "€" . PHP_EOL;

echo PHP_EOL;

echo "=== Création par distance et poids ===" . PHP_EOL . PHP_EOL;

$v1 = $factory->createByDistanceAndWeight(10, 5);    // < 20km, <= 20kg  → Bicycle
$v2 = $factory->createByDistanceAndWeight(25, 5);    // >= 20km          → Car
$v3 = $factory->createByDistanceAndWeight(10, 50);   // > 20kg           → Car
$v4 = $factory->createByDistanceAndWeight(10, 250);  // > 200kg          → Truck

echo "10km /  5kg  → " . get_class($v1) . PHP_EOL;
echo "25km /  5kg  → " . get_class($v2) . PHP_EOL;
echo "10km / 50kg  → " . get_class($v3) . PHP_EOL;
echo "10km / 250kg → " . get_class($v4) . PHP_EOL;