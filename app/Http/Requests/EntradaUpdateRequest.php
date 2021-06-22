<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
// use App\Ahex\Entrada\Domain\UpdaterFactory;
use App\Ahex\Entrada\Domain\Update\UpdaterFactory;

class EntradaUpdateRequest extends FormRequest
{
    private $updaters_name;

    public function authorize()
    {
        return UpdaterFactory::exists( $this->actualizar );
    }

    public function rules()
    {
        return [];
    }

    public function messages()
    {
        return [];
    }
}
