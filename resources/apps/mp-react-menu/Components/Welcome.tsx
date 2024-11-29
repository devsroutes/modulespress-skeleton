import React from 'react';
import { ServerTime } from './ServerTime';
import { DevNotice } from './DevNotice';

interface WelcomeProps {
    wpUsername: string;
    pluginVersion: string;
    restUrl: string;
    restNonce: string;
}

export const Welcome: React.FC<WelcomeProps> = ({ wpUsername, pluginVersion, restUrl, restNonce }) => {
  
    return (
        <div className="modulespress-container">
            <div className="hero-section">
                <div className="hero-content">
                    <div className="logo-container">
                        <img src={window.static('imgs/logo.png')} alt="ModulesPress Logo" className="plugin-logo" />
                    </div>
                    <h1>Welcome to ModulesPress, <span className="highlight">{wpUsername}</span>!</h1>
                    <p className="subtitle">Build powerful WordPress plugins with modern development practices</p>
                    <div className="hero-actions">
                        <a href="https://modulespress.devsroutes.co/docs" className="btn primary-btn" target="_blank" rel="noopener noreferrer">
                            <i className="fas fa-book-open"></i> View Docs
                        </a>
                        <a href="https://github.com/devsroutes/modulespress" className="btn secondary-btn" target="_blank" rel="noopener noreferrer">
                            <i className="fab fa-github"></i> GitHub
                        </a>
                    </div>
                    <ServerTime restUrl={restUrl} restNonce={restNonce} />
                </div>
            </div>

            <DevNotice />

            <div className="features-grid">
                <div className="feature-card">
                    <div className="icon-wrapper">
                        <i className="fas fa-cube"></i>
                    </div>
                    <h3>Modular Architecture</h3>
                    <p>Build scalable plugins with NestJS-inspired modular design</p>
                </div>
                <div className="feature-card">
                    <div className="icon-wrapper">
                        <i className="fas fa-bolt"></i>
                    </div>
                    <h3>Modern Stack</h3>
                    <p>TypeScript, React, and PHP 8+ attributes support</p>
                </div>
                <div className="feature-card">
                    <div className="icon-wrapper">
                        <i className="fas fa-code"></i>
                    </div>
                    <h3>Developer Experience</h3>
                    <p>Hot Module Replacement & Vite integration</p>
                </div>
                <div className="feature-card">
                    <div className="icon-wrapper">
                        <i className="fas fa-paint-brush"></i>
                    </div>
                    <h3>Blade Templates</h3>
                    <p>Elegant templating with Laravel's Blade engine</p>
                </div>
            </div>

            <footer className="mp-footer">
                <div className="footer-content">
                    <p>Powered by <a href="https://modulespress.devsroutes.co" target="_blank">ModulesPress</a></p>
                    <p className="version">Plugin Version {pluginVersion}</p>
                </div>
            </footer>
        </div>
    );
};
