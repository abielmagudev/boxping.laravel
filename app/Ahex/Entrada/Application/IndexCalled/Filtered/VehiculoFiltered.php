<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Vehiculo;

class VehiculoFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Vehículo';
    }

    public function content(): string
    {
        if(! $this->validate() )
            return 'Cualquiera';

        return Vehiculo::find($this->request->vehiculo)->nombre ?? 'Vehículo desconocído';
    }

    public function validate()
    {
        return $this->request->filled('vehiculo') && is_int( (int) $this->request->vehiculo );
    }
}
