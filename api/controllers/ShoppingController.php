<?php

use models\ShoppingModel;
use utils\Bdd;
use utils\Config;

class ShoppingController
{

    /**
     * @throws Exception
     */
    public function ShowList()
    {
        $configManager = new Config();
        $shoppingManager = new ShoppingModel(BDD::getInstance($configManager->getConfig()));
        $shops = $shoppingManager->getList();
        if (!$shops) {
            http_response_code(400);
            echo json_encode([
                "message" => "Aucun personnage trouvé.",
                "status" => 400
            ]);
            exit;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Liste des personnages.",
            "status" => 200,
            "shops" => $shops
        ]);
        exit;
    }
}