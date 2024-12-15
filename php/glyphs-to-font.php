<?php

// THIS IS ALL FONTELLO's DOING...
// AND PRIMEICONS BASIC ICONS
// https://github.com/fontello/
// https://primevue.org/icons/

$tpls   = [];
$tpls[] = '<?xml version="1.0" standalone="no"?>';
$tpls[] = '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd" >';
$tpls[] = '<svg xmlns="http://www.w3.org/2000/svg">';
$tpls[] = '<metadata>';
$tpls[] = '<json>';
$tpls[] = '<![CDATA[';
$tpls[] = '{';
$tpls[] = '	 "fontFamily": "eventlabicons",';
$tpls[] = '	 "majorVersion": 1,';
$tpls[] = '	 "minorVersion": 0,';
$tpls[] = '	 "copyright": "Bespired",';
$tpls[] = '	 "designer": "",';
$tpls[] = '	 "description": "Icon Library for eventlab UI Libraries",';
$tpls[] = '	 "license": "MIT",';
$tpls[] = '	 "licenseURL": "https://opensource.org/licenses/MIT",';
$tpls[] = '	 "version": "Version 1.0",';
$tpls[] = '	 "fontId": "eventlabicons",';
$tpls[] = '	 "psName": "eventlabicons",';
$tpls[] = '	 "subFamily": "Regular",';
$tpls[] = '	 "fullName": "eventlabicons"';
$tpls[] = '}';
$tpls[] = ']]>';
$tpls[] = '</json>';
$tpls[] = '</metadata>';
$tpls[] = '<defs>';
$tpls[] = '<font id="eventlabicons" horiz-adv-x="1024">';
$tpls[] = '<font-face units-per-em="1024" ascent="960" descent="-64" />';
$tpls[] = '<missing-glyph horiz-adv-x="1024" />';
$tpls[] = '<glyph unicode="&#x20;" horiz-adv-x="512" d="" />';
$tpls[] = '%s';
$tpls[] = '</font></defs></svg>';

$glyphtpl = '<glyph unicode="&#x%s;" glyph-name="%s" d="%s" />';
// <glyph unicode="&#xe900;" glyph-name="chevron-left" data-tags="chevron-left" d="M679.213-32.738c-0.086 0-0.19 0-0.292 0-17.22 0-32.796 7.035-44.013 18.388l-418.039 418.039c-11.33 11.344-18.339 27.010-18.339 44.311s7.007 32.967 18.339 44.313v0l418.033 418.033c11.167 10.427 26.211 16.828 42.747 16.828 34.631 0 62.705-28.074 62.705-62.705 0-16.538-6.402-31.58-16.864-42.785l0.034 0.037-373.722-373.722 373.722-373.722c11.33-11.344 18.339-27.010 18.339-44.311s-7.007-32.967-18.339-44.313v0c-11.222-11.36-26.798-18.394-44.019-18.394-0.102 0-0.205 0-0.307 0h0.016z" />

// .icon-archive:before { content: '\e802'; } /* '' */
$icondef  = ".icon-%s:before { content: '\%s'; }";
$cssicons = [];

// { name: 'add-box', label: 'add-box' }
$iconvue  = "  { name: '%s', label: '%s' }";
$vueicons = [];

$pattern = 'src/iconfont/glyphs/';
$svgs    = glob($pattern . '*.svg');

$base  = 59648;
$count = 0;

foreach ($svgs as $svgfile) {
    $glyphname = str_replace([$pattern, '.svg'], ['', ''], $svgfile);
    $fixedname = str_replace($glyphname, 'fixedfile', $svgfile);

    // sometimes the font is upside down...
    // I'm going to get `npx svgo` to fix that...

    // if mirror exists use mirror, else create one

    $filecontent = file_get_contents($svgfile);
    $cmd         = 'npx svgo -i ' . $svgfile . ' -o ' . $fixedname;
    shell_exec($cmd);

    $filecontent = file_get_contents($fixedname);

    // $filecontent = file_get_contents($svgfile);

    $re = '/d="([\s\S]*?)"/m';
    preg_match_all($re, $filecontent, $result, PREG_SET_ORDER, 0);

    if ($result) {
        $unicode = dechex($base + $count);
        $path    = $result[0][1];

        $glyphs[] = sprintf($glyphtpl, $unicode, $glyphname, $path);

        // .icon-archive:before { content: '\e802'; } /* '' */
        $cssicons[] = sprintf($icondef, $glyphname, $unicode);

        // { name: 'add-box', label: 'add-box' }
        $vueicons[] = sprintf($iconvue, $glyphname, $glyphname);

        echo "$glyphname added to font\n";

        $count++;
    }
}

// unlink($mirrorname);
// unlink($fixedname);

$template    = join("\n", $tpls);
$filecontent = sprintf($template, join("\n", $glyphs));

file_put_contents('src/iconfont/eventlab-iconfont.svg', $filecontent);

echo "\nconvert svg2ttf\n";
$cmd = 'npx svg2ttf src/iconfont/eventlab-iconfont.svg src/iconfont/eventlab-iconfont.ttf';
shell_exec($cmd);

echo "\nconvert ttf2woff\n";
$cmd = 'npx ttf2woff src/iconfont/eventlab-iconfont.ttf src/iconfont/eventlab-iconfont.woff';
shell_exec($cmd);

echo "\nconvert ttf2eot\n";
$cmd = 'npx ttf2eot src/iconfont/eventlab-iconfont.ttf src/iconfont/eventlab-iconfont.eot';
shell_exec($cmd);

$vuetpl   = [];
$vuetpl[] = 'const Icons = [';
$vuetpl[] = join(",\n", $vueicons);
$vuetpl[] = ']';
$vuetpl[] = 'export default Icons;';

file_put_contents('src/helpers/Icons.js', join("\n", $vuetpl));

$bust     = time();
$csstpl   = [];
$csstpl[] = '@font-face {';
$csstpl[] = "  font-family: 'iconfont';";
$csstpl[] = "  src: url('/fonts/eventlab-iconfont.eot?$bust');";
$csstpl[] = "  src: url('/fonts/eventlab-iconfont.eot?$bust#iefix') format('embedded-opentype'),";
$csstpl[] = "  /*   url('/fonts/eventlab-iconfont.woff2?$bust') format('woff2'), */";
$csstpl[] = "       url('/fonts/eventlab-iconfont.woff?$bust') format('woff'),";
$csstpl[] = "       url('/fonts/eventlab-iconfont.ttf?$bust') format('truetype'),";
$csstpl[] = "       url('/fonts/eventlab-iconfont.svg?$bust#iconfont') format('svg');";
$csstpl[] = '  font-weight: normal;';
$csstpl[] = '  font-style: normal;';
$csstpl[] = '}';
$csstpl[] = '';
$csstpl[] = '[class^="icon-"]:before, [class*=" icon-"]:before {';
$csstpl[] = '  font-family: "iconfont";';
$csstpl[] = '  font-style: normal;';
$csstpl[] = '  font-weight: normal;';
$csstpl[] = '  speak: never;';
$csstpl[] = '  transform: scaleX(1) scaleY(-1);';
$csstpl[] = '  display: inline-block;';
$csstpl[] = '  text-decoration: inherit;';
$csstpl[] = '';
$csstpl[] = '/*';
$csstpl[] = '  width: 1em;';
$csstpl[] = '  margin-left: .2em;';
$csstpl[] = '  margin-right: .2em;';
$csstpl[] = '  text-align: center;';
$csstpl[] = '*/';
$csstpl[] = '  min-height: 1em;';
$csstpl[] = '  color: inherit;';
$csstpl[] = '  height: initial;';
$csstpl[] = '';
$csstpl[] = '  /* For safety - reset parent styles, that can break glyph codes*/';
$csstpl[] = '  font-variant: normal;';
$csstpl[] = '  text-transform: none;';
$csstpl[] = '';
$csstpl[] = '  /* Font smoothing. That was taken from TWBS */';
$csstpl[] = '  -webkit-font-smoothing: antialiased;';
$csstpl[] = '  -moz-osx-font-smoothing: grayscale;';
$csstpl[] = '}';
$csstpl[] = '';
$csstpl[] = '';

echo "\ncreate css\n";
file_put_contents('src/iconfont/iconfont.css', join("\n", $csstpl) . join("\n", $cssicons) . "\n");

$cmd = 'cp src/iconfont/iconfont.css src/sass/iconfont.css';
shell_exec($cmd);

$cmd = 'cp src/iconfont/eventlab-iconfont.* public/fonts/.';
shell_exec($cmd);
echo "\ndone\n\n";
// -----
