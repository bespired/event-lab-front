import { defineConfig } from 'vite'
import { resolve as resolver } from 'path'
import fs from 'fs';
import vue from '@vitejs/plugin-vue'
import Components from 'unplugin-vue-components/vite'
import { splitVendorChunkPlugin } from 'vite';
// import basicSsl from '@vitejs/plugin-basic-ssl'

let basepath = process.env.NODE_ENV !== 'production' ? '' : '/--/admin/'
console.log("Using basepath:", basepath);


// https://vite.dev/config/
export default defineConfig({
    plugins: [
        vue(),
        splitVendorChunkPlugin(),
        Components({}),
    ],
    base: basepath,
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