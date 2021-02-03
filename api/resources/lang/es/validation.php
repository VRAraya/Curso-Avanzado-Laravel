<?php

return [

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

'accepted' => 'Se debe aceptar el :attribute',
'active_url' => 'El :attribute no es una URL válida.',
'after' => 'El :attribute debe ser una fecha posterior a :date.',
'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :date.',
'alpha' => 'El :attribute solo puede contener letras.',
'alpha_dash' => 'El :attribute solo puede contener letras, números, guiones y guiones bajo.',
'alpha_num' => 'El :attribute solo puede contener letras y números.',
'array' => 'El :attribute debe ser una matriz.',
'before' => 'El :attribute debe ser una fecha anterior a :date.',
'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :date.',
'between' => [
    'numeric' => 'El :attribute debe estar entre :min y :max.',
    'file' => 'El :attribute debe estar entre :min y :max Kilobytes.',
    'string' => 'El :attribute debe estar entre :min y :max caracteres.',
    'array' => 'El :attribute debe estar entre :min y :max artículos.',
],
'boolean' => 'El campo de :attribute debe ser verdadero o falso.',
'confirmed' => 'La confirmación del :attribute no coincide.',
'date' => 'El :attribute no es una fecha válida.',
'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
'date_format' => 'El :attribute no coincide con el formato :format.',
'different' => 'El :attribute y :other deben ser diferentes.',
'digits' => 'El :attribute debe ser :digits dígitos.',
'digits_between' => 'EL :attribute debe estar entre :min y :max dígitos.',
'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
'distinct' => 'El campo de :attribute tiene un valor duplicado.',
'email' => 'El :attribute debe ser una dirección de correo electrónico válida.',
'ends_with' => 'El :attribute debe terminar con uno de los siguientes valores: :values.',
'exists' => 'El :attribute seleccionado no es válido.',
'file' => 'El :attribute debe ser un archivo.',
'filled' => 'El campo de :attribute debe tener un valor.',
'gt' => [
    'numeric' => 'El :attribute debe ser mayor que :value.',
    'file' => 'El :attribute debe ser mayor que :value kilobytes.',
    'string' => 'El :attribute debe ser mayor que :value caracteres.',
    'array' => 'El :attribute debe tener más de :value elementos.',
],
'gte' => [
    'numeric' => 'El :attribute debe ser mayor que :value.',
    'file' => 'El :attribute debe ser mayor que :value kilobytes.',
    'string' => 'El :attribute debe ser mayor que :value caracteres.',
    'array' => 'El :attribute debe tener :value elementos o más.',
],
'image' => 'El :attribute debe ser una imagen.',
'in' => 'El :attribute seleccionado es inválido.',
'in_array' => 'El campo de :attribute no existe en :other.',
'integer' => 'El :attribute debe ser un entero.',
'ip' => 'El :attribute debe ser una dirección de IP válida.',
'ipv4' => 'El :attribute debe ser una dirección de IPv4 válida.',
'ipv6' => 'El :attribute debe ser una dirección de IPv6 válida.',
'json' => 'El :attribute debe ser una cadena JSON válida.',
'lt' => [
    'numeric' => 'El :attribute debe ser menor que :value.',
    'file' => 'El :attribute debe ser menor que :value Kilobytes.',
    'string' => 'El :attribute debe tener menos de :value caracteres.',
    'array' => 'El :attribute debe tener menos de :value elementos.',
],
'lte' => [
    'numeric' => 'El :attribute debe ser menor o igual a :value.',
    'file' => 'El :attribute debe ser menor o igual a :value Kilobytes.',
    'string' => 'El :attribute debe ser menor o igual :value caracteres.',
    'array' => 'El :attribute no debe tener más de :value elementos.',
],
'max' => [
    'numeric' => 'El :attribute puede no ser mayor que :max.',
    'file' => 'El :attribute puede no ser mayor que :max Kilobytes.',
    'string' => 'El :attribute puede no ser mayor que :max caracteres.',
    'array' => 'El :attribute puede no tener más de :max elementos.',
],
'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
'min' => [
    'numeric' => 'El :attribute debe ser al menos de :min.',
    'file' => 'El :attribute debe ser al menos de :min Kilobytes.',
    'string' => 'El :attribute debe ser al menos de :min caracteres.',
    'array' => 'El :attribute debe ser al menos de :min elementos.',
],
'multiple_of' => 'El :attribute debe ser un múltiplo de :value.',
'not_in' => 'El :attribute seleccionado es inválido.',
'not_regex' => 'El formato de :attribute es inválido.',
'numeric' => 'El :attribute debe ser un número.',
'password' => 'La contraseña es incorrecta.',
'present' => 'El campo :attribute debe estar presente.',
'regex' => 'El formato de :attribute es inválido.',
'required' => 'El campo :attribute es obligatorio.',
'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los :values están presentes.',
'same' => 'El :attribute y :other debe coincidir.',
'size' => [
    'numeric' => 'El :attribute debe ser de tamaño :size.',
    'file' => 'El :attribute debe ser de :size Kilobytes.',
    'string' => 'El :attribute debe ser de :size caracteres.',
    'array' => 'El :attribute debe contener :size elementos.',
],
'starts_with' => 'El :attribute debe empezar con uno de los siguientes valores: :values.',
'string' => 'El :attribute debe ser una cadena.',
'timezone' => 'El :attribute debe estar en una zona válida.',
'unique' => 'El :attribute ya ha sido utilizado.',
'uploaded' => 'El :attribute falló en ser actualizado.',
'url' => 'El formato de :attribute es inválido.',
'uuid' => 'El :attribute debe ser un UUID válido.',

/*
|--------------------------------------------------------------------------
| Custom Validation Language Lines
|--------------------------------------------------------------------------
|
| Here you may specify custom validation messages for attributes using the
| convention "attribute.rule" to name the lines. This makes it quick to
| specify a specific custom language line for a given attribute rule.
|
*/

'custom' => [
    'attribute-name' => [
        'rule-name' => 'custom-message',
    ],
],

/*
|--------------------------------------------------------------------------
| Custom Validation Attributes
|--------------------------------------------------------------------------
|
| The following language lines are used to swap our attribute placeholder
| with something more reader friendly such as "E-Mail Address" instead
| of "email". This simply helps us make our message more expressive.
|
*/

'attributes' => [
    'name' => 'Nombre',
    'email' => 'Correo Electrónico',
    'password' => 'Contraseña',
],

];
