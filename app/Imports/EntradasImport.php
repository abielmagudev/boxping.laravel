<?php

namespace App\Imports;

use App\Destinatario;
use App\Entrada;
use App\EntradaEtapa;
use App\Etapa;
use App\Remitente;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Row;

class EntradasImport implements OnEachRow, WithStartRow
{    
    use Importable;
    
    const VALIDATED_ROW = true;

    const SKIP_ROW = null;

    const SAVED_ROW = null;

    private $columns = [
        0 => 'número de entrada',
        1 => 'contenido',
        2 => null, // Separador
        3 => 'peso',
        4 => 'medición(g,kg,oz,lb)',
        5 => 'largo',
        6 => 'ancho',
        7 => 'alto',
        8 => 'medición(mm,cm,in,ft)',
        9 => null, // Separador
        10 => 'nombre(destinatario)',
        11 => 'dirección(destinatario)',
        12 => 'postal(destinatario)',
        13 => 'ciudad(destinatario',
        14 => 'estado(destinatario)',
        15 => 'pais(destinatario)',
        16 => 'referencias(destinatario)',
        17 => 'teléfono(destinatario)',
        18 => null, // Separador
        19 => 'nombre(remitente)',
        20 => 'dirección(remitente)',
        21 => 'postal(remitente)',
        22 => 'ciudad(remitente',
        23 => 'estado(remitente)',
        24 => 'pais(remitente)',
        25 => 'teléfono(remitente)',
        26 => null, // Separador
        27 => 'notas adicionales',
    ];

    private $rows = [
        'total' => 0,
        'success' => [],
        'failure' => [],
    ];
    
    public $settings;

    /**
     * Set the data required to create and save row models
     *
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->settings = [
            'cliente' => $settings['cliente'],
            'consolidado' => $settings['consolidado'],
            'etapa' => $settings['etapa'],
        ];
    }

    /**
    * Returns the row of the csv where the import should start
    *
    * @return int 
    */
    public function startRow(): int
    {
        return 2;
    }


    // ABOUT ALL ROWS
    public function rowsCount()
    {
        return $this->rows['total'];
    }

    public function increaseRowsCount()
    {
        return ++$this->rows['total'];
    }


    // ABOUT FAILURE ROWS
    public function failureRow(int $column_id)
    {
        return $this->rows['failure'][ $this->rowsCount() ] = $this->columns[$column_id] ?? 'columna desconocída';
    }

    public function failureRows()
    {
        return $this->rows['failure'];
    }

    public function failureRowsCount()
    {
        return count($this->rows['failure']);
    }


    // ABOUT SUCCESS ROWS
    public function successRow($numero_entrada)
    {
        return $this->rows['success'][ $this->rowsCount() ] = $numero_entrada;
    }

    public function successRows()
    {
        return $this->rows['success'];
    }
    
    public function successRowsCount()
    {
        return count($this->rows['success']);
    }


    /**
     * Validate current row after to save
     *
     * @param array $row
     * @return void
     */
    public function validate(array $row)
    {
        $validated = $this->rules($row);

        $errors = array_filter($validated, function ($rule) {
            return $rule === false;
        });

        return count($errors) ? array_key_first($errors) : self::VALIDATED_ROW;
    }


    /**
     * Rules to validate row's cells
     *
     * @param array $row
     * @return void
     */
    public function rules(array $row): array
    {
        return [
            // Número de entrada
            0 => isset($row[0]) && Entrada::notExistsNumero($row[0]),

            // Peso
            3 => ! isset($row[3]) || is_numeric($row[3]),
            // Medición de peso
            4 => ! isset($row[4]) || in_array(strtolower($row[4]), Etapa::medicionesPeso(true)),
            // Largo
            5 => ! isset($row[5]) || is_numeric($row[5]),
            // Ancho
            6 => ! isset($row[6]) || is_numeric($row[6]),
            // Alto
            7 => ! isset($row[7]) || is_numeric($row[7]),
            // Medición de volúmen
            8 => ! isset($row[8]) || in_array(strtolower($row[8]), Etapa::medicionesVolumen(true)),
            
            // Nombre del destinatario
            10 => isset($row[10]) && is_string($row[10]),
            // Direccion del destinatario
            11 => isset($row[11]) && is_string($row[11]),
            // Postal del destinatario
            12 => isset($row[12]) && is_string($row[12]) || is_int($row[12]),
            // Ciudad del destinatario
            13 => isset($row[13]) && is_string($row[13]),
            // Estado del destinatario
            14 => isset($row[14]) && is_string($row[14]),
            // Pais del destinatario
            15 => isset($row[15]) && is_string($row[15]),
            // Referencias del destinatario
            16 => isset($row[16]) && is_string($row[16]),
            // Telefono del destinatario
            17 => isset($row[17]) && is_string($row[17]),

            // Nombre del remitente
            19 => isset($row[19]) && is_string($row[19]),
            // Direccion del remitente
            20 => isset($row[20]) && is_string($row[20]),
            // Postal del remitente
            21 => isset($row[21]) && is_string($row[21]) || is_int($row[21]),
            // Ciudad del remitente
            22 => isset($row[22]) && is_string($row[22]),
            // Estado del remitente
            23 => isset($row[23]) && is_string($row[23]),
            // Pais del remitente
            24 => isset($row[24]) && is_string($row[24]),
            // Telefono del remitente
            25 => isset($row[25]) && is_string($row[25]),
        ];
    }

    public function create(array $row)
    {
        // Prepare???...
        return Entrada::create([
            'numero' => $row[0],
            'cliente_id' => $this->settings['cliente'],
            'consolidado_id' => $this->settings['consolidado'],
            'destinatario_id' => $this->detinatarioId($row),
            'remintente_id' => $this->remitenteId($row),
            'contenido' => $row[1],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
    }

    public function detinatarioId(array $row)
    {
        $prepared = Destinatario::prepare([
            'nombre' => $row[10],
            'direccion' => $row[11],
            'postal' => $row[12],
            'ciudad' => $row[13],
            'estado' => $row[14],
            'pais' => $row[15],
            'referencias' => $row[16],
            'telefono' => $row[17],
            'notas' => null,
        ]);

        if(! $destinatario = Destinatario::exactly($prepared)->first() )
            $destinatario = Destinatario::create($prepared);

        return $destinatario->id;
    }

    public function remitenteId(array $row)
    {
        $prepared = Remitente::prepare([
            'nombre' => $row[19],
            'direccion' => $row[20],
            'postal' => $row[21],
            'ciudad' => $row[22],
            'estado' => $row[23],
            'pais' => $row[24],
            'telefono' => $row[25],
            'notas' => null,
        ]);

        if(! $remitente = Remitente::exactly($prepared)->first() )
            $remitente = Remitente::create($prepared);

        return $remitente->id;
    }

    public function etapaAdditionalData(array $row)
    {
        return EntradaEtapa::prepare([
            'peso' => $row[3] ?? null,
            'medicion_peso' => $row[4] ?? null,
            'ancho' => $row[5] ?? null,
            'altura' => $row[6] ?? null,
            'largo' => $row[7] ?? null,
            'medicion_volumen' => $row[8] ?? null,
        ]);
    }




     /**
     * Importing the rows to database with Eloquent
     *
     * @param Row $row
     * @return void
     */
    public function onRow(Row $row)
    {
        $this->increaseRowsCount();

        // if( $this->rowsCount() == 2 )
        //     dd($row->toArray());

        $the_row = $row->toArray();

        if( ($error = $this->validate($the_row)) !== true )
        {
            $this->failureRow($error);
            return self::SKIP_ROW;
        }

        $entrada = $this->create($the_row);
        $entrada->etapas()->attach(
            $this->settings['etapa'], 
            $this->etapaAdditionalData($the_row)
        );

        $this->successRow($entrada->numero);

        return self::SAVED_ROW;
    }
}
