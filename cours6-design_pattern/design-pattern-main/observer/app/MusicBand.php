<?php

namespace App;

use SplSubject;
use SplObserver;

class MusicBand implements SplSubject
{
    private array $observers = [];

    // Hors exercice mais notable:
    // Promotion du constructeur: https://www.php.net/manual/fr/language.oop5.decon.php#language.oop5.decon.constructor.promotion
    public function __construct(
        private string $name,
        private array $concerts = []
    ) {}


    public function addNewConcertDate(string $date, string $location): void
    {
        $this->concerts[] = [
            'date'     => $date,
            'location' => $location,
        ];
        $this->notify();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void
    {
        // On notifie l'observateur de sa désinscription
        $observer->update($this);
        $this->observers = array_values(
            array_filter($this->observers, fn($o) => $o !== $observer)
        );
    }

    public function notify(): void
    {
        // Le premier observateur inscrit est le gestionnaire du groupe :
        // il crée les dates lui-même, donc il n'est pas notifié.
        foreach (array_slice($this->observers, 1) as $observer) {
            $observer->update($this);
        }
    }
}
