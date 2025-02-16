import { type RouteConfig, index, route } from "@react-router/dev/routes";

export default [
    index("routes/showHomePage.tsx"),
    route("login", "routes/showLoginUser.tsx"),
    route("addShop", "routes/addShoppings.tsx"),
    route("listShops", "routes/showShoppingList.tsx")
] satisfies RouteConfig[];



