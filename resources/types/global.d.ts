declare global {
    interface Window {
        static: (path: string) => string
    }
}

export {}