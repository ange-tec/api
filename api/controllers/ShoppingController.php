<?php

use models\ShoppingModel;
use utils\Bdd;
use utils\Config;

class ShoppingController
{

    /**
     * @throws Exception
     */
    public function listShops()
    {
        $config = new Config();
        $shoppingManager = new ShoppingModel(BDD::getInstance($config->getConfig()));
        $shops = $shoppingManager->getList();
        if (!$shops) {
            http_response_code(400);
            echo json_encode([
                "message" => "Aucune liste trouvée.",
                "status" => 400
            ]);
            exit;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Liste des courses.",
            "status" => 200,
            "shops" => $shops
        ]);
        exit;
    }

    /**
     * @throws Exception
     */
    public function Delete(...$params)
    {
        $id = $params["id"];

        $config = new Config();
        $shopManager = new ShoppingModel(BDD::getInstance($config->getConfig()));

        if (!$shopManager->deleteById($id)) {
            http_response_code(400);
            echo json_encode([
                "message" => "La suppression du personnage a échouée.",
                "status" => 400
            ]);
            exit;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Le personnage n°{$id} a été supprimé.",
            "status" => 200
        ]);
        exit;
    }
}