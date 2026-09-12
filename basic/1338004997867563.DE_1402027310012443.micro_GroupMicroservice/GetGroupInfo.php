<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

http_response_code(200);
header('Content-Type: application/json');

$body = json_decode(file_get_contents('php://input'), true);
if (!is_array($body)) {
    $body = array();
}
$groupId = isset($body['groupId']) ? $body['groupId'] : (isset($_GET['groupId']) ? $_GET['groupId'] : 0);

$equipped = array(
    'BodyEquipped' => 'items.body.0_body',
    'SkinColorEquipped' => 'items.skinColor.13_skinColor',
    'FaceWearsEquipped' => 'items.facewear.1_facewear',
    'EyesEquipped' => 'items.eyes.0_eyes',
    'MouthEquipped' => 'items.mouth.0_mouth',
    'EyesWearsEquipped' => 'items.eyewear.1_eyewear',
    'BackEquipped' => 'items.back.0_back',
    'HairColorEquipped' => 'items.hairColor.1_hairColor',
    'HairEquipped' => 'items.hairAndHat.0_hairAndHat',
    'GenderEquipped' => '',
    'InfectedBodyEquipped' => 'items.infectedSkin.0_infectedSkin',
    'InfectedWeaponEquipped' => 'items.infectedWeapon.0_infectedWeapon',
    'InfectedAnimationEquipped' => '',
    'BadgeEquipped' => 'items.badge.0_badge'
);

echo json_encode(array(
    'PlayersInfo' => array(
        array(
            'Id' => 71880669866436610,
            'NickName' => null,
            'EquippedSkin' => json_encode($equipped)
        )
    )
));
