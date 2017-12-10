<?php

namespace app\models\traits;

trait Loadable {

    public function validateLoad()
    {
        return (bool) $this->load(request()->post()) && $this->validate();
    }
}