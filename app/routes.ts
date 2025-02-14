import { type RouteConfig, index, route } from "@react-router/dev/routes";

export default [
    index("routes/showHomePage.tsx"),
    route("login", "routes/showLoginUser.tsx"),
    route("add", "routes/addShoppings.tsx"),
    route("list", "routes/showShoppingList.tsx")
] satisfies RouteConfig[];



