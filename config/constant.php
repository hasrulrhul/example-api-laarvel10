<?php

return [
    'HTTP' => [
        'CODE' => [
            'SUCCESS' => 200,
            'FAILED' => 400,
            'UNAUTHORIZE' => 401,
            'UNAUTHORIZE_PERMISSION' => 403,
            'UNPROCESS' => 422,
            'SERVER_FAILED' => 500,
            'NOT_FOUND' => 404,
        ]
    ],
    'STATUS_ITEM' => [
        'CODE' => [
            'ACTIVE' => 1,
            'INACTIVE' => 0,
            'TEXT' => [
                'ACTIVE' => 'Aktif',
                'INACTIVE' => 'Non Aktif'
            ]
        ]
    ],
    'STATUS' => [
        'CODE' => [
            'SUCCESS' => 1,
            'FAILED' => 2,
            'VALIDATION' => 3,
            'NOT_ACTIVE' => 4,
            'EXPIRED' => 5,
            'NOT_FOUND' => 6,
            'UNAUTHORIZE' => 7,
            'NOT_PERMISSION' => 8,
            'NOT_MATCH' => 9,
            'INCOMPLETED' => 10,
            'VERSION_NOT' => 11,
            'VERSION_SAME' => 12,
            'UNAUTHORIZE_PERMISSION' => 13,
        ]
    ],
    'FORM_STATUS' => [
        'DRAFT' => 0,
        'SAVED' => 1,
        'BULK' => 2,
    ],
    'PRODUCT_STATUS' => [
        'CREATED' => 0,
        'ADDENDUM' => 1,
        'AMANDEMENT' => 2,
    ],
    'PRODUCT_USE' => [
        'USE' => 1,
        'NOT_USE' => 0,
    ],
    'STEP_INWARD_TREATY' => [
        'TREATY_INWARD' => 0,
        'BASIC_INFO' => 1,
        'DETAIL_PRODUCT' => 2,
        'COMMISSION' => 3,
        'CLAIM' => 4,
        'OTHERS' => 5
    ],
    'STEP_OUTWARD_TREATY' => [
        'TREATY_OUTWARD' => 0,
        'BASIC_INFO' => 1,
        'DETAIL_PRODUCT' => 2,
        'COMMISSION' => 3,
        'CLAIM' => 4,
        'OTHERS' => 5
    ],
    'DATA_REPORTING' => [
        'MONTHLY' => 1,
        'QUARTERLY' => 2,
        'SEMESTERLY' => 3,
        'YEARLY' => 4,
    ],
    'INSURED_DATA_MANAGEMENT_STATUS' => [
        'READY_FOR_IMPORT' => 1,
        'PROCESSING' => 2,
        'DONE' => 3
    ],
    'FILEPATH' => [],
    'FEATURE_CODE' => [],
    'PAGINATION' => 10,
    'CACHE_TIME_REDIS' => 3600, //SECOND,
];
