<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'results' => [
        [
            'id' => 71880669866436610,
            "stats" => [
                ["k" => "MINITOON1000", "v" => "REDEEM_CODE_USED"],
                ["k" => "EARLY_ACCESS_POST_REWARD_PROCESS_DONE", "v" => "TRUE"],
                ["k" => "EARLY_ACCESS_REWARD_FINAL_2", "v" => "TRUE"],
                ["k" => "EARLY_ACCESS_FREE", "v" => "TRUE"],
                ["k" => "IQMTC3ZH3TBT", "v" => "REDEEM_CODE_USED"],
                ["k" => "VERSION", "v" => "STEAM;1.0.7"],
                ["k" => "KREEKCRAFTVP", "v" => "REDEEM_CODE_USED"],
                ["k" => "Player_EquippedSkin", "v" => json_encode(["BodyEquipped" => "items.body.39_body", "SkinColorEquipped" => "items.skinColor.13_skinColor", "FaceWearsEquipped" => "", "EyesEquipped" => "items.eyes.13_eyes", "MouthEquipped" => "items.mouth.2_mouth", "EyesWearsEquipped" => "", "BackEquipped" => "items.back.0_back", "HairColorEquipped" => "items.hairColor.1_hairColor", "HairEquipped" => "items.hairAndHat.19_hairAndHat", "GenderEquipped" => "items.bodyType.1_bodyType", "InfectedBodyEquipped" => "items.infectedSkin.11_infectedSkin", "InfectedWeaponEquipped" => "items.infectedWeapon.7_infectedWeapon", "InfectedAnimationEquipped" => "items.infectedKillScene.0_infectedKillScene", "BadgeEquipped" => "items.badge.3_badge"], JSON_UNESCAPED_SLASHES)],
                ["k" => "CREATE_ACCOUNT_DATE", "v" => "11/11/2021 11:33:39 AM"],
                ["k" => "Player_NickName", "v" => "Astral"],
                ["k" => "EARLY_ACCESS", "v" => "TRUE"],
                ["k" => "EARLY_ACCESS_REWARD_FINAL", "v" => "TRUE"]
            ]
        ]
    ]
];

echo json_encode($data);

// {"results":[{"id":1420340085704705,"stats":[{"k":"MINITOON1000","v":"REDEEM_CODE_USED"},{"k":"EARLY_ACCESS_POST_REWARD_PROCESS_DONE","v":"TRUE"},{"k":"EARLY_ACCESS_REWARD_FINAL_2","v":"TRUE"},{"k":"EARLY_ACCESS_FREE","v":"TRUE"},{"k":"IQMTC3ZH3TBT","v":"REDEEM_CODE_USED"},{"k":"VERSION","v":"STEAM;1.0.7"},{"k":"KREEKCRAFTVP","v":"REDEEM_CODE_USED"},{"k":"Player_EquippedSkin","v":"{\"BodyEquipped\":\"items.body.39_body\",\"SkinColorEquipped\":\"items.skinColor.13_skinColor\",\"FaceWearsEquipped\":\"\",\"EyesEquipped\":\"items.eyes.13_eyes\",\"MouthEquipped\":\"items.mouth.2_mouth\",\"EyesWearsEquipped\":\"\",\"BackEquipped\":\"items.back.0_back\",\"HairColorEquipped\":\"items.hairColor.1_hairColor\",\"HairEquipped\":\"items.hairAndHat.19_hairAndHat\",\"GenderEquipped\":\"items.bodyType.1_bodyType\",\"InfectedBodyEquipped\":\"items.infectedSkin.11_infectedSkin\",\"InfectedWeaponEquipped\":\"items.infectedWeapon.7_infectedWeapon\",\"InfectedAnimationEquipped\":\"items.infectedKillScene.0_infectedKillScene\",\"BadgeEquipped\":\"items.badge.3_badge\"}"},{"k":"CREATE_ACCOUNT_DATE","v":"11/11/2021 11:33:39 AM"},{"k":"Player_NickName","v":"Astral"},{"k":"EARLY_ACCESS","v":"TRUE"},{"k":"EARLY_ACCESS_REWARD_FINAL","v":"TRUE"}]}]}
