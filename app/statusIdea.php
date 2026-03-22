<?php

namespace App;

enum statusIdea: string
{
    case PENDING = 'pendente';
    case PROCESSING = 'em_processo';
    case FINISHED = 'finalizado';

    public function label(){
        return match($this){
            self::PENDING =>'Pendente',
            self::PROCESSING =>'Em processo',
            self::FINISHED =>'Finalizado',
        };
    }
}
