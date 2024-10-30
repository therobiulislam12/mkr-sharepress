import { Outlet } from "react-router-dom";
import Footer from "../components/Footer";
import Header from "../components/Header";

const Main = () => {
  return (
    <>
      <Header />
      <div className="ssp-main-area">
        <Outlet />
      </div>
      <Footer />
    </>
  );
};

export default Main;
