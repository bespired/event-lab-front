import { defineConfig } from 'vite'
import { resolve as resolver } from 'path'
import fs from 'fs';
import vue from '@vitejs/plugin-vue'
import Components from 'unplugin-vue-components/vite'
// import basicSsl from '@vitejs/plugin-basic-ssl'


// https://vite.dev/config/
export default defineConfig({
    plugins: [
        vue(),
        // basicSsl(),
        Components({}),
    ],
    resolve: {
        alias: {
            '@': resolver(__dirname, './src'),
        }
    },
    server: {
        host: "eventlab.com",
        port: 5180,
        https: {
            key:  fs.readFileSync(`${__dirname}/cert/eventlab.com.key`),
            cert: fs.readFileSync(`${__dirname}/cert/eventlab.com.crt`)
        },
        proxy: {},
        hmr: {
            host: 'eventlab.com'
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