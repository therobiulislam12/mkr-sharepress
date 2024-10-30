import { createHashRouter } from "react-router-dom";
import Main from "../layouts/Main";
import FormSettings from "../components/FormSettings";

const router = createHashRouter([
  {
    path: "",
    element: <Main />,
    children: [
      {
        path: "/",
        element: <FormSettings />,
      },
    ],
  },
]);

export default router;
