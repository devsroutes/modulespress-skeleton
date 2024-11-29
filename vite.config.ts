import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react'; // Ensure React plugin is installed
import modulesPress from '@modulespress/vite-plugin';
import { fileURLToPath } from 'url';

export default defineConfig(() => ({
  plugins: [
    react(),
    modulesPress({
      refreshExtensions: [
        ".blade.php"
      ]
    })
  ],
  resolve: {
    alias: [
      { find: '@static', replacement: fileURLToPath(new URL('./static', import.meta.url)) },
      { find: '@resources', replacement: fileURLToPath(new URL('./resources', import.meta.url)) },
    ],
  },
}));