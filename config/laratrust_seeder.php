<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'admins'  => 'c,r,u,d',
            'sellers' => 'c,r,u,d',
            'drivers' => 'c,r,u,d',
            'cities'  => 'c,r,u,d',
            'orders'  => 'c,r,u,d',
            'roles'   => 'c,r,u,d'
        ],
        'warehouse' => [
            'sellers' => 'r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
