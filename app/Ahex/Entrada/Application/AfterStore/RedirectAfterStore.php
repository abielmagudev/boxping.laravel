<?php

namespace App\Ahex\Entrada\Application\AfterStore;

use App\Http\Requests\EntradaStoreRequest as StoreRequest;
use App\Entrada;

class RedirectAfterStore
{ 
    public $all_redirects;
    public $stored;

    public function __construct(Entrada $entrada)
    {
        $this->stored = $entrada->hasConsolidado()
                      ? new EntradaConsolidadoStored($entrada)
                      : new EntradaStored($entrada);
    }

    public function redirect($next)
    {   
        return call_user_func([$this->stored, $next]) ?: $this->back();
    }

    /**
     * 
     * Retornar con helper redirect(), para posteriormente 
     * conectar metodo with() para flash-messages
     * 
     * @return object
     * 
     * @return string url()->previous(): string | back(): object
     * 
     */
    public function back()
    {
        return redirect()->back();
    }
}
