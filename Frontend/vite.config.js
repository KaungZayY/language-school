import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

// https://vite.dev/config/
export default defineConfig({
  optimizeDeps: {
    exclude: ['js-big-decimal']
  },
  plugins: [
    vue(),
    vueDevTools(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
  server: {
    port: '3000',
    proxy: {
      '/api': {
        target: 'http://127.0.0.1:8000/api/v1',
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, ''),
      },
      '/sanctum': {
        target: 'http://localhost:8000/sanctum/csrf-cookie',
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/sanctum/, ''),
      }
    }
  },
})
