import React from 'react';

export const DevNotice: React.FC = () => {
    return (
        <div className="mp-dev-notice">
            <i className="fas fa-code"></i>
            <div className="notice-content">
                <p>You are currently viewing the React version of the menu.</p>
                <p className="notice-description">
                    Changes to React components will trigger HMR. Make sure your Vite server is running with <code>npm run dev</code>
                </p>
            </div>
        </div>
    );
};
