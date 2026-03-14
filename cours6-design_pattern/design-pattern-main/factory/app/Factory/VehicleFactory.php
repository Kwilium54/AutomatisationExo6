<?php

namespace App\Factory;

use App\Entity\VehicleInterface;
use App\Entity\Bicycle;
use App\Entity\Car;
use App\Entity\Truck;

class VehicleFactory
{
    public function create(string $type): VehicleInterface
    {
        return match ($type) {
            'bicycle' => new Bicycle(0.10, 'none'),
            'car'     => new Car(0.15, 'gasoline'),
            'truck'   => new Truck(0.25, 'diesel'),
            default   => throw new \InvalidArgumentException("Unknown vehicle type: $type"),
        };
    }

    public function createByDistanceAndWeight(float $distance, float $weight): VehicleInterface
    {
        if ($weight > 200) {
            return new Truck(0.25, 'diesel');
        }

        if ($weight > 20 || $distance >= 20) {
            return new Car(0.15, 'gasoline');
        }

        return new Bicycle(0.10, 'none');
    }
}
