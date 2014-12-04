<?php 

use \Illuminate\Validation\Validator;

class UserValidator extends Validator {

    // Override parent class $rules
    protected $rules = [
            'image' => 'image',
            'title' => 'required|min:2|max:3'
            'location' => 'required|min:3',
            'date_of_birth' => 'required|date_format:"y/m/d"',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2'
    ];

    // ADD THIS
    public function __construct(TranslatorInterface $translator, array $data, array $rules, array $messages = array(), array $customAttributes = array())
    {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);
        if(count($rules)){
            foreach($rules as $k => $v) $this->rules[$k] = $v;
        }
    }

}
