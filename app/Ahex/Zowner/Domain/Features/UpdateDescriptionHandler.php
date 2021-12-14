<?php

namespace App\Ahex\Zowner\Domain\Features;

use App\User;

trait UpdateDescriptionHandler
{
    public function hasUpdateDescription($updated)
    {
        return array_key_exists($updated, $this->descriptions);
    }

    public function getUpdateDescription($updated)
    {
        return call_user_func([$this, $this->descriptions[$updated]]);
    }
}
