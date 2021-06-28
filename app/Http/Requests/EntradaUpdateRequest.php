<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Ahex\Entrada\Application\Update\Updaters\UpdatersContainer;

class EntradaUpdateRequest extends FormRequest
{
    private $updaters_name;

    public function authorize()
    {
        return UpdatersContainer::exists( $this->actualizar );
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
