<?php

namespace App\LaraFormik\Table\Filter;

class RadioInput
{

    protected $data = [
        'label' => null,
        'id' => null,
        'key' => null,
        'resetKey' => [],
        'options' => [],
        'type' => 'radio',
        'isEmit' => false,
        'mode' => 'single',
        'value' => '',
        'name' => ''
    ];

    public function label(string $value)
    {
        $this->data['label'] = $value;
        return $this;  // Return the instance for chaining
    }

    public function name(string $value)
    {
        $this->data['name'] = $value;
        return $this;  // Return the instance for chaining
    }

    public function options(array $value = [])
    {
        $this->data['options'] = $value;
        return $this;  // Return the instance for chaining
    }

    public function setId(string $value)
    {
        $this->data['id'] = $value;
        return $this;  // Return the instance for chaining
    }

    public function resetKey(array $value = [])
    {
        $this->data['resetKey'] = $value;
        return $this;  // Return the instance for chaining
    }

    public function isEmit()
    {
        $this->data['isEmit'] = true;
        return $this;  // Return the instance for chaining
    }

    public function init()
    {
        $param = $this->data['key'];
        $value = request()->get($param);
        $this->data['value'] = $value;
        return $this->data;
    }

    public static function make(string $param)
    {
        $instance = new self();  // Create a new instance of the object

        $instance->data['key'] = $param;  // Initialize the key
        // Return the instance to allow chaining
        return $instance;
    }

}
