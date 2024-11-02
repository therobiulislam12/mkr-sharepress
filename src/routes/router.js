import { createHashRouter } from "react-router-dom";
import Main from "../layouts/Main";
import FormSettings from "../components/FormSettings";
import Support from "../components/Support";

const router = createHashRouter([
  {
    path: "/",
    element: <Main />,
    children: [
      {
        path: "",
        element: <FormSettings />,
      },
      {
        path: 'support',
        element: <Support/>
      }
    ],
  },
]);

export default router;
