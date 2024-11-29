import { createRoot } from '@wordpress/element';
import { Welcome } from './Components/Welcome';
import '@resources/styles/mp-menu.style.scss';

declare global {
    interface Window {
        mpReactMenu: {
            wpUsername: string;
            pluginVersion: string;
            restUrl: string;
            restNonce: string;
        }
    }
}

window.addEventListener("DOMContentLoaded", () => {
    const rootElement = document.getElementById('mp-react-menu-root');
    if (rootElement) {
        createRoot(rootElement).render(<App />);
    }
});

const App = () => {
    return (
        <Welcome 
            wpUsername={window.mpReactMenu.wpUsername} 
            pluginVersion={window.mpReactMenu.pluginVersion}
            restUrl={window.mpReactMenu.restUrl}
            restNonce={window.mpReactMenu.restNonce}
        />
    );
};