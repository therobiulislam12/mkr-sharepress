import { Link } from "react-router-dom";

const Header = () => {
  return (
    <section className="sspp-header">
      <div className="sspp-logo">
        <Link to="/">Social Share Press</Link>
      </div>
      <div className="sspp-upgrade">
        <button>Upgrade Pro</button>
      </div>
    </section>
  );
};

export default Header;
