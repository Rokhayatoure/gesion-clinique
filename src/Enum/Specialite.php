<?php

namespace App\Enum;

enum Specialite: string

{
    case CARDIOLOGIE = 'cardilogie';
    case Diabetique = 'diabetique';
    case Dentiste = 'dentiste';
    
    public function getLabel(): string
    {
        return match ($this) {

            self:: CARDIOLOGIE => 'cardilogie',
            self:: Diabetique =>'diabetique',
            self ::Dentiste => 'dentiste',
            
        };
    }
}
