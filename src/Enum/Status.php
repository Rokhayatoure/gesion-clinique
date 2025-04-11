<?php

namespace App\Enum;

enum Status: string

{
    case EN_ATTENTE = 'en_attente';
    case CONFIRMÉ = 'confirme';
    case ANNULÉ = 'unavailable';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::EN_ATTENTE => 'en_attente',
            self::CONFIRMÉ => 'confirme',
            self:: ANNULÉ =>'annule',
        };
    }
}
