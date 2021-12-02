<?php

namespace App\Ahex\Entrada\Application\UpdateCalled;

use App\Http\Requests\Entrada\UpdateRequest;
use App\Ahex\Entrada\Application\UpdateCalled\Validators\ValidatorsContainer;
use App\Ahex\Entrada\Application\UpdateCalled\Updaters\UpdatersContainer;

class GrandValidator
{
    private $validator;
    public $rules;
    public $messages;

    public function __construct(UpdateRequest $request)
    {
        if( $this->hasValidatorAndUpdater($request) )
            $this->validator = $this->getValidator($request);

        $this->rules = $this->getRules();
        $this->messages = $this->getMessages();
    }

    public function hasValidatorAndUpdater(UpdateRequest $request)
    {
        return ValidatorsContainer::exists($request->actualizar) && UpdatersContainer::exists($request->actualizar);
    }

    public function hasValidator()
    {
        return isset( $this->validator );
    }

    public function getValidator(UpdateRequest $request)
    {
        return ValidatorsContainer::get($request->actualizar, $request->entrada);
    }

    public function getRules()
    {
        $rules = [
            'actualizar' => ['required', 'in:' . implode(',', UpdatersContainer::names())],
        ];

        if( $this->hasValidator() )
            $rules += $this->validator->rules();

        return $rules;
    }

    public function getMessages()
    {
        $messages = [
            'actualizar.required' => 'Selecciona un editor de la entrada.',
            'actualizar.in' => 'Selecciona un editor válido para la entrada.',
        ];

        if( $this->hasValidator() )
            $messages += $this->validator->messages();

        return $messages;
    }
}
