import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import Components from 'unplugin-vue-components/vite'
import basicSsl from '@vitejs/plugin-basic-ssl'


// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    basicSsl(),
    Components({}),
  ],
  server: {
    host: "eventlab.com",
    port: 5180,
    https: true,
    hmr: {
        host: "eventlab.com",
        port: 5180,
        protocol: "wss",
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler'
      }
    }
  }
})
