<?php

namespace App\Ahex\Zkeleton\Domain;

trait UpdateDescriptionCallableTrait {
    public function hasUpdateDescription($updated)
    {
        return (bool) array_key_exists($updated, $this->descriptions);
    }

    public function getUpdateDescription($updated)
    {
        return call_user_func([$this, $this->descriptions[$updated]]);
    }
}
