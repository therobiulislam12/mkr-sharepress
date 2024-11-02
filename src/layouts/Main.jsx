import { Link, NavLink, Outlet } from "react-router-dom";
import Header from "../components/Header";

const Main = () => {
  return (
    <>
      <Header />
      <div className="ssp-main-area">
        <div className="sspp-menu-tab">
          {/* Menu Section */}
          <div className="sspp-menu-bar">
            <ul>
              <li>
                <NavLink to="/">Settings</NavLink>
              </li>
              <li>
                <NavLink to="support">Support</NavLink>
              </li>
            </ul>
          </div>
          {/* Route section */}
          <div className="sspp-outlet">
            <Outlet />
          </div>
        </div>
      </div>
    </>
  );
};

export default Main;
