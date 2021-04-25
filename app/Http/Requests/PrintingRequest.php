<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ahex\Printing\Application\Requests\RequestSetupFactory;
use App\Ahex\Printing\Application\Requests\RequestSetupInterface;

class PrintingRequest extends FormRequest
{
    private $setup;

    protected function prepareForValidation()
    {
        $this->setup = RequestSetupFactory::get( $this->route()->getName() );
    }

    public function authorize()
    {
        return $this->setup instanceof RequestSetupInterface;
    }

    public function rules()
    {
        return $this->setup->rules();
    }

    public function messages()
    {
        return $this->setup->messages();
    }
}
