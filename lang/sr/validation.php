<?php

return [
    'required' => 'Polje :attribute je obavezno.',
    'sometimes' => 'Polje :attribute je obavezno.',
    'string' => 'Polje :attribute mora biti tekst.',
    'numeric' => 'Polje :attribute mora biti broj.',
    'integer' => 'Polje :attribute mora biti ceo broj.',
    'decimal' => 'Polje :attribute mora biti decimalni broj.',
    'min' => [
        'string' => 'Polje :attribute mora imati najmanje :min karaktera.',
    ],
    'max' => [
        'string' => 'Polje :attribute ne sme imati više od :max karaktera.',
    ],
    'email' => 'Polje :attribute mora biti važeća imejl adresa.',
    'enum' => 'Polje :attribute mora imati jednu od sledećih vrednosti: :values.',

    'attributes' => [
        'name' => 'Ime',
        'info' => 'Informacije',
        'email' => 'Imejl',
        'password' => 'Lozinka',
        'password_confirmation' => 'Potvrda lozinke',
        'latitude' => 'Geografska širina',
        'longitude' => 'Geografska dužina',
        'total_seats' => 'Ukupan broj mesta',
    ]
];
