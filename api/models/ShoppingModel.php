<?php

namespace models;

use PDO;
use utils\Bdd;

class ShoppingModel
{

    private int $id;
    private string $title;
    private string $description;
    private int $price;
    private $bdd;

    public function __construct($bdd = null){
        if(!is_null($bdd)){
            $this->setBdd($bdd);
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return Bdd
     */
    public function getBdd():Bdd
    {
        return $this->bdd;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    public function setBdd($bdd) {
        $this->bdd = $bdd;
    }

    public function getList(){
        $req = $this->bdd->prepare("SELECT * FROM shopping ORDER BY title");
        $req->execute();
        $shop = $req->fetchAll(PDO::FETCH_OBJ);
        if(!$shop){
            return null;
        }
        $req->closeCursor();
        return $shop;
    }
    public function getById(int $id){
        $req = $this->bdd->prepare("SELECT * FROM shopping WHERE id=:id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $shop = $req->fetch(PDO::FETCH_OBJ);
        if(!$shop){
            return null;
        }
        return $shop;
    }

    public function deleteById(int $id){
        return $this->bdd->exec("DELETE FROM shopping WHERE id={$id}");
    }

}