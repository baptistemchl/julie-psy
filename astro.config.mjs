import { defineConfig } from 'astro/config';
import react from '@astrojs/react';
import tailwind from '@astrojs/tailwind';
import sitemap from '@astrojs/sitemap';

export default defineConfig({
  output: 'static',
  site: 'https://www.julie-psy.fr',
  build: {
    trailingSlash: 'always',
  },
  integrations: [
    react(),
    tailwind(),
    sitemap(),
  ],
  vite: {
    server: {
      allowedHosts: ['julie-psy.loca.lt'],
    },
  },
});