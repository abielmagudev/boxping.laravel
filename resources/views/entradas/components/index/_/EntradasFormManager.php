<?php

return new class
{
    const ENTRADAS_ACTION_FORM_ID = 'entradasActionForm';

    const METHODS_POST = ['post', 'put', 'patch', 'delete'];

    public function id()
    {
        return self::ENTRADAS_ACTION_FORM_ID;
    }

    public function htmlForm(string $action = '#', string $method = 'get')
    {
        $form = "<form action='{$action}' method='{$method}' id='{$this->id()}'>";

        if( in_array($method, self::METHODS_POST) )
        {
            $form .= "<input type='hidden' name='_method' value='{$method}'>";
            $form .= "<input type='hidden' name='_token' value='{csrf_token()}'>";
        }

        return $form .= "</form>";
    }
    
    public function checkboxName()
    {
        return 'entradas[]';
    }

    public function checkboxPrefix()
    {
        return 'checkboxEntrada';
    }

    public function checkboxId(string $string)
    {
        return $this->checkboxPrefix() . $string;
    }

    public function switcher()
    {
        return 'checkbox';
    }
};
