import {useEffect, useState} from "react";
import type {ShopI} from "~/shared/interfaces/Shop.interface";

export default function showShoppingList() {

    const [shops, setShop] = useState([]);

    useEffect(() => {
        if(shops.length <= 0){
            fetchShoppings().then(r => console.log(r));
        }
    }, [shops])

    const fetchShoppings = async() => {

        await fetch("http://127.0.0.1:5500/list", {
            method: "GET",
            mode: "cors"
        })
        .then(response => response.json())
        .then(datas => {
            if(datas.status !== 200){
                throw new Error("Le statut de la requête n'est pas valide.");
            }
            if(!datas.shops){
                throw new Error("Aucun personnage n'a été retourné.");
            }
        })
        .catch(err => console.error(err));
    }
    return (
        <section>
            {shops.length > 0 && shops.map((shop: ShopI) => (<article className="main-articles">
                <h2>{shop.title}</h2>
                <p>{shop.description}</p>
                <span>{shop.price}</span>
            </article>))}
        </section>
    )
}