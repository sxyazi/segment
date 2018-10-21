<?php

namespace App\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;

class Unique extends AbstractRule
{
    private $model;
    private $field;

    public function __construct($model, $field)
    {
        $this->model = $model;
        $this->field = $field;
    }

    public function validate($input)
    {
        return !($this->model)::where($this->field, $input)->exists();
    }
}
