<?php

return [
    'required' => 'The :attribute field is required.',
    'sometimes' => 'The :attribute field is required.',
    'string' => 'The :attribute must be a string.',
    'numeric' => 'The :attribute must be a number.',
    'integer' => 'The :attribute must be a whole number.',
    'decimal' => 'The :attribute must be a decimal number.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'max' => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'email' => 'The :attribute must be a valid email address.',
    'enum' => 'The :attribute must be a valid :values.',

    'attributes' => [
        'name' => 'Name',
        'info' => 'Info',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Confirm password',
        'latitude' => 'Latitude',
        'longitude' => 'Longitude',
        'total_seats' => 'Total seats',
    ]
];
