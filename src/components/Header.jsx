import { Link } from "react-router-dom";

const Header = () => {
  return (
    <section className="sssp-header">
      <div className="sspp-logo">
        <Link to="/">Social Share Press</Link>
      </div>
      <div className="sspp-menu-bar">
        <ul>
          <li>
            <Link to="/">Settings</Link>
          </li>
          <li>
            <Link to="support">Support</Link>
          </li>
        </ul>
      </div>
    </section>
  );
};

export default Header;
