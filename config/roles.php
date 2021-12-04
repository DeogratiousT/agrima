<?php

return [
    'roles' => [
        'Administrator' => [
            'name' => 'Administrator',
            'abilities' => [
                'manage' => true,
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