<?php

return [
    'roles' => [
        'Administrator' => [
            'name' => 'Administrator',
            'abilities' => [
                'manage' => true,
            ],
        ],
        'Seller' => [
            'name' => 'Seller',
            'abilities' => [
                'sell' => true,
            ],
        ],
        'Buyer' => [
            'name' => 'Buyer',
            'abilities' => [
                'buy' => true,
            ],
        ]
    ]
];