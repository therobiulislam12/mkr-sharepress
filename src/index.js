import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import App from './App';
import './index.scss';

domReady( () => {
    const root = createRoot(
        document.getElementById( 'ssp-dashboard' )
    );

    root.render( <App /> );
} );