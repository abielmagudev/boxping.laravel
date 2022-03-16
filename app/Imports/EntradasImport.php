<?php

namespace App\Imports;

use App\Entrada;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EntradasImport implements ToModel, WithStartRow
{    
    const ROW_VALID = true;

    const ROW_INVALID = false;

    const NOT_MODEL = null;

    private $rows_total = 0;

    private $rows_saved = 0;

    private $owner;

    public function __construct(object $owner)
    {
        $this->owner = $owner;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->rows_total;

        if(! $this->validateRow($row) )
            return self::NOT_MODEL;

        $entrada = $this->saveRow($row);

        ++$this->rows_saved;

        return $entrada;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function validateRow(array $row)
    {
        if( is_null($row[0]) )
            return self::ROW_INVALID;

        if( Entrada::existsNumero($row[0]) )
            return self::ROW_INVALID;

        return self::ROW_VALID;
    }

    public function saveRow(array $row)
    {
        return new Entrada([
            'numero' => $row[0],
            'consolidado_id' => is_a($this->owner, \App\Consolidado::class) ? $this->owner->id : null,
            'cliente_id' => is_a($this->owner, \App\Cliente::class) ? $this->owner->id : $this->owner->cliente_id,
            'contenido' => $row[1],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
    }

    public function getRowsTotal()
    {
        return $this->rows_total;
    }

    public function getRowsSaved()
    {
        return $this->rows_saved;
    }
}
