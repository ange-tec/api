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
      <div className="container">
        <div className="">
          <div className="bg-blue-500 mt-2 h-[100px]">
            <p className="font-bold font-mono text-center"> Ma liste - Mes courses !</p>
          </div>
        </div>
        <div className="border text-center">
            <Link to="/login" className="border"> Se Connecter </Link>
            <Link to="/add" className="border"> Ajouter une course </Link>
            <Link to="/list" className="border"> Voir la liste des courses </Link>
        </div>
      </div>
  )
}
