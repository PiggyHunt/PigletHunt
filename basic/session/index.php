<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'result' => 'ok',
    'gamer' => [
        'tag' => 2009122829188096,
        'alias' => 'string',
        'added' => 0,
        'trials' => [
            [
                'trial' => 'npe_ab_offer_cohort',
                'cohort' => '100x Pulls'
            ],
            [
                'trial' => 'LevelUpOffersCohort',
                'cohort' => 'Group 2B'
            ],
            [
                'trial' => 'Currency Gained Analytic - 100%',
                'cohort' => 'Enabled'
            ],
            [
                'trial' => 'revenue5050splitcohort',
                'cohort' => 'Group 2'
            ],
            [
                'trial' => 'Lapsed Player Retargeting Functionality',
                'cohort' => 'All'
            ],
            [
                'trial' => 'Log Errors to Analytics - Steam, Windows, WebGL',
                'cohort' => '_CTRLGRP_'
            ],
            [
                'trial' => 'Dec_2021_ads_0MasterLimit_AB_Test',
                'cohort' => 'Experimental'
            ],
            [
                'trial' => 'DUPLICATES_DETECTION_ENABLED',
                'cohort' => 'Group 1'
            ]
        ]
    ],
    'platform' => 'STEAM',
    'user' => [
      'name' => 'MiniToon',
      'email' => 'greedycellhelp@gmail.com',
      'gamerTag' => 71880669866436610,
      'username' => 'MiniToon',
      'lastName' => 'Kohl',
      'firstName' => 'Couture',
      'id' => 0,
      'cid' => 'string',
      'lang' => 'en',
      'heartbeat' => 0,
      'password' => ''
    ]
];

echo json_encode($data);