<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'provincium' => [
        'title' => 'Provincia',

        'actions' => [
            'index' => 'Provincia',
            'create' => 'New Provincium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'localidad' => [
        'title' => 'Localidad',

        'actions' => [
            'index' => 'Localidad',
            'create' => 'New Localidad',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'provincia_id' => 'Provincia',
            'nombre' => 'Nombre',
            
        ],
    ],

    'productor' => [
        'title' => 'Productor',

        'actions' => [
            'index' => 'Productor',
            'create' => 'New Productor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'cuit' => 'Cuit',
            'domicilio' => 'Domicilio',
            'localidad_id' => 'Localidad',
            
        ],
    ],

    'cerveza' => [
        'title' => 'Cerveza',

        'actions' => [
            'index' => 'Cerveza',
            'create' => 'New Cerveza',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'productor_id' => 'Productor',
            'nombre' => 'Nombre',
            'ibu' => 'Ibu',
            'abv' => 'Abv',
            'srm' => 'Srm',
            'og' => 'Og',
            
        ],
    ],

    'cervecerium' => [
        'title' => 'Cerveceria',

        'actions' => [
            'index' => 'Cerveceria',
            'create' => 'New Cervecerium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'cuit' => 'Cuit',
            'domicilio' => 'Domicilio',
            'localidad_id' => 'Localidad',
            
        ],
    ],

    'punto-ventum' => [
        'title' => 'Punto Venta',

        'actions' => [
            'index' => 'Punto Venta',
            'create' => 'New Punto Ventum',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cerveza_id' => 'Cerveza',
            'cerveceria_id' => 'Cerveceria',
            
        ],
    ],

    'productor' => [
        'title' => 'Productor',

        'actions' => [
            'index' => 'Productor',
            'create' => 'New Productor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'cuit' => 'Cuit',
            'domicilio' => 'Domicilio',
            'localidad_id' => 'Localidad',
            
        ],
    ],

    'productor' => [
        'title' => 'Productor',

        'actions' => [
            'index' => 'Productor',
            'create' => 'New Productor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'productor' => [
        'title' => 'Productor',

        'actions' => [
            'index' => 'Productor',
            'create' => 'New Productor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cuit' => 'Cuit',
            'domicilio' => 'Domicilio',
            'localidad_id' => 'Localidad',
            'nombre' => 'Nombre',
            'provincia_id' => 'Provincia',
            
        ],
    ],

    'productor' => [
        'title' => 'Productor',

        'actions' => [
            'index' => 'Productor',
            'create' => 'New Productor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'cuit' => 'Cuit',
            'domicilio' => 'Domicilio',
            'provincia_id' => 'Provincia',
            'localidad_id' => 'Localidad',
            
        ],
    ],

    'cervecerium' => [
        'title' => 'Cerveceria',

        'actions' => [
            'index' => 'Cerveceria',
            'create' => 'New Cervecerium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'cuit' => 'Cuit',
            'domicilio' => 'Domicilio',
            'localidad_id' => 'Localidad',
            
        ],
    ],

    'cervecerium' => [
        'title' => 'Cerveceria',

        'actions' => [
            'index' => 'Cerveceria',
            'create' => 'New Cervecerium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cuit' => 'Cuit',
            'domicilio' => 'Domicilio',
            'localidad_id' => 'Localidad',
            'nombre' => 'Nombre',
            'provincia_id' => 'Provincia',
            
        ],
    ],

    'cerveza' => [
        'title' => 'Cerveza',

        'actions' => [
            'index' => 'Cerveza',
            'create' => 'New Cerveza',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'abv' => 'Abv',
            'ibu' => 'Ibu',
            'nombre' => 'Nombre',
            'og' => 'Og',
            'productor_id' => 'Productor',
            'srm' => 'Srm',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];