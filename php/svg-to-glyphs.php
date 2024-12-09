<?php

$filename  = 'src/iconfont/primeicons.svg';
$glyphpath = 'src/iconfont/glyphs/';

$svgfont = file_get_contents($filename);

$glyphs = explode('<glyph', $svgfont);
unset($glyphs[0]);

 $temps = [];

$temps[]  = '<?xml version="1.0" standalone="no"?>';
$temps[]  = '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd" >';
$temps[]  = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 1024 1024">';
$temps[]  = '    <!--  unicode: %s tags: %s -->';
$temps[]  = '    <g transform="scale(1, -1) translate(0, -960)" >';
$temps[]  = '    <path fill="currentColor" d="%s" />';
$temps[]  = '    </g>';
$temps[]  = '</svg>';
$template = join("\n", $temps);

foreach ($glyphs as $glyph) {
    // unicode
    $re = '/unicode="([\S]+)"/mU';
    preg_match_all($re, $glyph, $unicodes, PREG_SET_ORDER, 0);

    $unicode = $unicodes ? $unicodes[0][1] : null;

    // name
    $re = '/glyph-name="([\S]+)"/mU';
    preg_match_all($re, $glyph, $names, PREG_SET_ORDER, 0);

    $name = $names ? $names[0][1] : null;

    // tags
    $re = '/data-tags="([\S\s]+)"/mU';
    preg_match_all($re, $glyph, $tags, PREG_SET_ORDER, 0);

    $tag = $tags ? $tags[0][1] : null;

    // path
    $re = '/d="([\S\s]+)"/mU';
    preg_match_all($re, $glyph, $paths, PREG_SET_ORDER, 0);

    $path = $paths ? $paths[0][1] : null;

    // echo "$unicode $name $tag $path\n";
    if ($name) {
        $svgfile = sprintf($template, $unicode, $tag, $path);
        $fixname = $glyphpath . $name . '-trans.svg';
        $outname = $glyphpath . $name . '.svg';
        file_put_contents($fixname, $svgfile);

        $fixnames[$fixname] = $outname;
    }
}

$todo    = count($fixnames);
$current = 0;
foreach ($fixnames as $fixname => $outname) {
    $cmd = 'npx svgo -i ' . $fixname . ' -o ' . $outname;
    shell_exec($cmd);

    unlink($fixname);
    $current++;
    echo "fixed ($current/$todo): $outname \n";
}
