<?php

return [

    'local' => '/uploads/',
    'quality' => [
        'image' => 85,
        'jpg' => 90
    ],
    'sizes' => [
        'square' => [
            'name' => 'sqr',
            'size' => 50
        ],
        'thumbnail' => [
            'name' => 'thn',
            'size' => 280
        ],
        'small' => [
            'name' => 'sml',
            'width' => 150,
            'height' => null
        ],
        'medium' => [
            'name' => 'mdm',
            'width' => 300,
            'height' => null
        ],
        'large' => [
            'name' => 'lrg',
            'width' => 600,
            'height' => null
        ],
        'original' => [
            'name' => 'org'
        ]
    ]


];
