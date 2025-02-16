import type {Route} from "../../.react-router/types/app/+types/root";
import {Link} from "react-router";

export function meta({}: Route.MetaArgs) {
  return [
    { title: "Market Place App" },
    { name: "Take care of your shopping list", content: "Welcome to the market" },
  ];
}

export default function ShowHomePage() {
  return(
      <>
          <div className="container">
              <div className="bg-gray-500">
                  <p className="font-bold font-serif text-center"> Ma liste - Mes courses !</p>
              </div>
          </div>
          <div className="text-center">
              <Link to="/login" className="border rounded-lg bg-blue-500"> Se Connecter </Link>
              <Link to="/addShop" className="border rounded-lg"> Ajouter une course </Link>
              <Link to="/listShops" className="border rounded-lg "> Voir la liste des courses </Link>
          </div>
      </>

  )
}
