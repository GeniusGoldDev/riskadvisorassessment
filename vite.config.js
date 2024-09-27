import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { TabsUIComponentResolver } from 'vue3-tailwind-tabs'
import Components from 'unplugin-vue-components/vite'


export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        Components({
            resolvers: [
              TabsUIComponentResolver()
            ]
          }),
    ],
});
