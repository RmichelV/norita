<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NumericInput extends Component
{
    public $name;
    public $id;
    public $value;
    public $placeholder;

    public $min;
    public $max;
    public $maxLength;
    public $minLength;
    public function __construct($name,$id = null ,$value='',$placeholder='', $min = '', $max = '', $maxLength = '', $minLength = '')
    {
        $this->name = $name;
        $this->id = $id?? $name;  
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->min = $min;
        $this->max = $max;
        $this->maxLength = $maxLength;
        $this->minLength = $minLength;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.numeric-input');
    }
}
