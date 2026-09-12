<?php

function piggy_docroot()
{
    if (isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] !== '') {
        return $_SERVER['DOCUMENT_ROOT'];
    }
    return 'C:/UwAmp/www';
}

function piggy_hardcoded_state()
{
    return array(
        'owned' => array(
            'items.hairAndHat.24_hairAndHat',
            'items.facewear.2_facewear',
            'items.body.23_body',
            'items.infectedSkin.2_infectedSkin',
            'items.infectedSkin.5_infectedSkin',
            'items.infectedSkin.14_infectedSkin',
            'items.infectedWeapon.28_infectedWeapon',
            'items.body.26_body',
            'items.hairAndHat.31_hairAndHat',
            'items.hairAndHat.32_hairAndHat',
            'items.badge.87_badge',
            'items.badge.38_badge',
            'items.badge.23_badge',
            'items.body.14_body',
            'items.hairAndHat.30_hairAndHat',
            'items.eyes.9_eyes',
            'items.infectedSkin.28_infectedSkin',
            'items.infectedWeapon.27_infectedWeapon',
            'items.infectedSkin.24_infectedSkin',
            'items.badge.92_badge',
            'items.body.6_body',
            'items.hairAndHat.1_hairAndHat',
            'items.hairAndHat.2_hairAndHat',
            'items.eyes.2_eyes',
            'items.mouth.5_mouth',
            'items.infectedSkin.3_infectedSkin',
            'items.infectedWeapon.4_infectedWeapon',
            'items.body.1_body',
            'items.hairAndHat.3_hairAndHat',
            'items.hairAndHat.4_hairAndHat',
            'items.infectedSkin.4_infectedSkin',
            'items.infectedWeapon.5_infectedWeapon',
            'items.badge.65_badge'
        ),
        'currencies' => array(
            'currency.hard_currency' => 999943050,
            'currency.soft_currency' => 1000030000
        )
    );
}

function piggy_load_state()
{
    return piggy_hardcoded_state();
}

function piggy_save_state($st)
{
}

function piggy_hardcoded_group()
{
    return array(
        'id' => 1000000,
        'name' => 'PIGGY-CUSTOMGAME-WFXIXG',
        'tag' => '',
        'slogan' => '',
        'motd' => '',
        'enrollmentType' => 'open',
        'requirement' => 0,
        'maxSize' => 12,
        'members' => array(
            array(
                'gamerTag' => 71880669866436610,
                'role' => 'leader',
                'canKick' => true,
                'canPromote' => true,
                'canDemote' => true
            )
        ),
        'subGroups' => array(),
        'clientData' => '{"ChatID":"room_001","IsCustomGame":true,"ClientData":"{}","HideMatchCode":false}',
        'created' => 0,
        'freeSlots' => 11,
        'canDisband' => true
    );
}

function piggy_baseline_items()
{
    return array(
        'items.body.0_body',
        'items.body.40_body',
        'items.body.41_body',
        'items.bodyType.0_bodyType',
        'items.eyes.0_eyes',
        'items.eyes.13_eyes',
        'items.eyes.14_eyes',
        'items.mouth.0_mouth',
        'items.mouth.2_mouth',
        'items.mouth.3_mouth',
        'items.mouth.4_mouth',
        'items.back.0_back',
        'items.back.1_back',
        'items.back.2_back',
        'items.skinColor.13_skinColor',
        'items.skinColor.12_skinColor',
        'items.skinColor.15_skinColor',
        'items.hairColor.1_hairColor',
        'items.hairColor.2_hairColor',
        'items.hairAndHat.0_hairAndHat',
        'items.hairAndHat.19_hairAndHat',
        'items.hairAndHat.20_hairAndHat',
        'items.hairAndHat.21_hairAndHat',
        'items.infectedSkin.0_infectedSkin',
        'items.infectedSkin.11_infectedSkin',
        'items.infectedSkin.12_infectedSkin',
        'items.infectedWeapon.0_infectedWeapon',
        'items.infectedWeapon.7_infectedWeapon',
        'items.infectedWeapon.8_infectedWeapon',
        'items.infectedKillScene.0_infectedKillScene',
        'items.infectedKillScene.1_infectedKillScene',
        'items.badge.0_badge',
        'items.badge.1_badge',
        'items.badge.2_badge',
        'items.badge.3_badge',
        'items.badge.4_badge',
        'items.facewear.1_facewear',
        'items.eyewear.1_eyewear'
    );
}

function piggy_owned_items()
{
    $st = piggy_load_state();
    $owned = isset($st['owned']) && is_array($st['owned']) ? $st['owned'] : array();
    return array_values(array_unique(array_merge(piggy_baseline_items(), $owned)));
}

function piggy_owned_currency_ids()
{
    return array('currency.soft_currency', 'currency.hard_currency');
}

function piggy_default_balance($id)
{
    if ($id === 'currency.soft_currency' || $id === 'currency.hard_currency') {
        return 1000000000;
    }
    return 0;
}

function piggy_balance($id)
{
    $st = piggy_load_state();
    if (isset($st['currencies'][$id])) {
        return (float)$st['currencies'][$id];
    }
    return (float)piggy_default_balance($id);
}

function piggy_item_in_shop($contentId)
{
    return in_array($contentId, piggy_owned_items(), true);
}

function piggy_pubnub_credentials()
{
    return array(
        'publish' => 'pub-c-5a1939bc-6561-400c-94f8-ae31f19916b7',
        'subscribe' => 'sub-c-3ae5cf75-8ff9-4317-93dd-a4c5bc5d29b2',
        'secret' => 'sec-c-NTUzYTcxZjAtZjg2OS00MjgyLThkMGUtZTQ4Y2E4ZjE3OGE2',
        'auth' => 'sec-c-NTUzYTcxZjAtZjg2OS00MjgyLThkMGUtZTQ4Y2E4ZjE3OGE2'
    );
}

function piggy_pubnub_grant($channels, $withAuth = true)
{
    $c = piggy_pubnub_credentials();
    $params = array(
        'channel' => implode(',', $channels),
        'm' => '0',
        'r' => '1',
        'timestamp' => (string)time(),
        'ttl' => '1440',
        'uuid' => 'piggy-server',
        'w' => '1'
    );
    if ($withAuth) {
        $params['auth'] = $c['auth'];
    }
    ksort($params);
    $pairs = array();
    foreach ($params as $k => $v) {
        $pairs[] = rawurlencode($k) . '=' . rawurlencode($v);
    }
    $qs = implode('&', $pairs);
    $msg = $c['subscribe'] . "\n" . $c['publish'] . "\n/v2/auth/grant/sub-key/" . $c['subscribe'] . "\n" . $qs;
    $sig = strtr(base64_encode(hash_hmac('sha256', $msg, $c['secret'], true)), '+/', '-_');
    $url = 'https://ps.pndsn.com/v2/auth/grant/sub-key/' . $c['subscribe'] . '?' . $qs . '&signature=' . $sig;
    $ctx = stream_context_create(array(
        'http' => array('method' => 'GET', 'ignore_errors' => true, 'timeout' => 4),
        'ssl' => array('verify_peer' => false, 'verify_peer_name' => false)
    ));
    return @file_get_contents($url, false, $ctx);
}

function piggy_pubnub_publish($channel, $message)
{
    $c = piggy_pubnub_credentials();
    piggy_pubnub_grant(array($channel), false);
    $payload = rawurlencode(json_encode($message, JSON_NUMERIC_CHECK));
    $url = 'https://ps.pndsn.com/publish/' . $c['publish'] . '/' . $c['subscribe'] . '/0/' . rawurlencode($channel) . '/0/' . $payload;
    $ctx = stream_context_create(array(
        'http' => array('method' => 'GET', 'ignore_errors' => true, 'timeout' => 5),
        'ssl' => array('verify_peer' => false, 'verify_peer_name' => false)
    ));
    return @file_get_contents($url, false, $ctx);
}