<?php


namespace application\components;


class Validator
{
    public $rules = [];

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function validate()
    {
        $rules = $this->rules;
        if (!empty($rules)) {
            $data = [];

            if (isset($rules['required'])) {
                $required = $rules['required'];
                foreach ($required as $key => $value){
                    if ($value == '') {
                        $data[$key] = str_replace('_', ' ', $key) . ' ' . 'field is empty';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['name'])) {
                $name = $rules['name'];

                foreach ($name as $key => $value) {
                    if (strlen($value) < 3 || strlen($value) > 40) {
                        $data[$key] = 'enter three symbols and more';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
                foreach ($name as $key => $value) {
                    if (!preg_match('#^[a-zA-Z-. ]{3,40}$#', $value)) {
                        $data[$key] = 'enter without symbols';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['email'])) {
                $email = $rules['email'];
                foreach ($email as $key => $value) {
                    if (!preg_match('#^[a-zA-Z0-9-.]{1,40}+@[a-z]{2,5}+\.[a-z]{2,3}$#', $value)) {
                        $data[$key] = $key.' error';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['phone'])) {
                $phone = $rules['phone'];
                foreach ($phone as $key => $value) {
                    if (!preg_match('#^[0-9+()]{12,15}$#', $value)) {
                        $data[$key] = $key.' error';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['password'])) {
                $password = $rules['password'];
                foreach ($password as $key => $value) {
                    if (strlen($value) < 4 || strlen($value) > 40) {
                        $data[$key] = 'enter four symbols and more';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['fileError'])) {
                $fileError = $rules['fileError'];
                foreach ($fileError as $key => $value) {
                    if ($value !== 0) {
                        $data[$key] = 'file error';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['fileSize'])) {
                $fileSize = $rules['fileSize'];
                foreach ($fileSize as $key => $value) {
                    if ($value > 50000000) {
                        $data[$key] = 'file size exceeds';
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }
        }
        return [];
    }
}