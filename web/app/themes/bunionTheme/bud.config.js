import PalettePlugin from 'palette-webpack-plugin';
/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/docs/sage sage documentation}
 * @see {@link https://bud.js.org/guides/configure bud.js configuration guide}
 *
 * @param {import('@roots/bud').Bud} app
 */
export default async (app) => {
  /**
   * Application assets & entrypoints
   *
   * @see {@link https://bud.js.org/docs/bud.entry}
   * @see {@link https://bud.js.org/docs/bud.assets}
   */
  app
    .entry('app', ['@scripts/app', '@styles/app'])
    .entry('editor', ['@scripts/editor', '@styles/editor'])
    .assets(['images']);

  /**
   * Set public path
   *
   * @see {@link https://bud.js.org/docs/bud.setPublicPath}
   */
  app.setPublicPath('/app/themes/sage/public/');

  /**
   * Development server settings
   *
   * @see {@link https://bud.js.org/docs/bud.setUrl}
   * @see {@link https://bud.js.org/docs/bud.setProxyUrl}
   * @see {@link https://bud.js.org/docs/bud.watch}
   */
  app
    .setUrl('http://localhost:3000')
    .setProxyUrl('http://bunion-relief.test')
    .watch(['resources/views', 'app']);
  /**
   * Palette Stuff
   * [https://github.com/roots/palette-webpack-plugin]
   */
  app.use([
    {
      name: 'palette-webpack-plugin',
      make: () =>
        new PalettePlugin({
          output: 'palette.json',
          blacklist: ['transparent', 'inherit'],
          priority: 'sass',
          pretty: true,
          sass: {
            path: 'resources/styles/variables',
            files: ['_colors.scss'],
            variables: ['editor-colors'],
          },
        }),
    },
  ]);
  /**
   * Generate WordPress `theme.json`
   *
   * @note This overwrites `theme.json` on every build.
   *
   * @see {@link https://bud.js.org/extensions/sage/theme.json}
   * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json}
   */
  app.wpjson
    .set('settings.color.custom', true)
    .set('settings.color.customDuotone', true)
    .set('settings.color.customGradient', true)
    .set('settings.color.defaultDuotone', false)
    .set('settings.color.defaultGradients', false)
    .set('settings.color.defaultPalette', false)
    .set('settings.color.duotone', [])
    .set('settings.custom.spacing', {})
    .set('settings.custom.typography.font-size', {})
    .set('settings.custom.typography.line-height', {})
    .set('settings.spacing.padding', true)
    .set('settings.spacing.units', ['px', '%', 'em', 'rem', 'vw', 'vh'])
    .set('settings.typography.customFontSize', false)
    
    .enable();
};
