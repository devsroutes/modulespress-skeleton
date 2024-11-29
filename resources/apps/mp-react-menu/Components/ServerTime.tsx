import { useCallback, useEffect, useState } from '@wordpress/element';
import '../styles/server-time.scss';

interface ServerTimeProps {
    restUrl: string;
    restNonce: string;
}

export const ServerTime: React.FC<ServerTimeProps> = ({ restUrl, restNonce }) => {
    const [serverTime, setServerTime] = useState<string | null>(null);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState<string | null>(null);

    const getServerTime = useCallback(async () => {
        try {
            setIsLoading(true);
            setError(null);
            const response = await fetch(`${restUrl}/modulespress`, {
                headers: {
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': restNonce
                },
            });
            if (response.ok) {
                const data = await response.json();
                setServerTime(data.serverTime);
            } else {
                setError('Failed to fetch server time');
            }
        } catch (error) {
            setError('Error connecting to server');
        } finally {
            setIsLoading(false);
        }
    }, [restUrl, restNonce]);

    useEffect(() => {
        getServerTime();
        const interval = setInterval(getServerTime, 60000);
        return () => clearInterval(interval);
    }, [getServerTime]);

    return (
        <div className="server-time-container">
            {isLoading ? (
                <div className="server-time-loading">
                    <div className="loading-spinner" />
                    <span>Fetching server time...</span>
                </div>
            ) : error ? (
                <div className="server-time-error">
                    <i className="fas fa-exclamation-circle" />
                    <span>{error}</span>
                </div>
            ) : serverTime && (
                <div className="server-time-display">
                    <i className="fas fa-clock" />
                    <span>Server Time:</span>
                    <span>{serverTime}</span>
                </div>
            )}
        </div>
    );
};
