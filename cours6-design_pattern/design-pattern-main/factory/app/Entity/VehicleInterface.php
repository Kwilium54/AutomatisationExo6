<?php

namespace App\Entity;

interface VehicleInterface
{
    public function getCostPerKm(): float;

    public function getFuelType(): string;
}
