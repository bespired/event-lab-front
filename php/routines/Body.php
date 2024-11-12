<?php

trait Body {

	public function body($yaml) {
		$bgv = $yaml['body']['bg'];
		$fgv = $yaml['body']['fg'];
		$ffv = $yaml['body']['font-family'];

		$fnt = isset($yaml['font'][$ffv]) ? $yaml['font'][$ffv] : $ffv;
		$bgv = isset($yaml['colors'][$bgv]) ? $yaml['colors'][$bgv] : $bgv;
		$fgv = isset($yaml['colors'][$fgv]) ? $yaml['colors'][$fgv] : $fgv;
		$bg = $this->hex($bgv);
		$fg = $this->hex($fgv);

		$style[] = 'body {';

		$style[] = "    font-family: $fnt;";
		$style[] = "    font-size: {$yaml['body']['font-size']};";
		$style[] = "    font-weight: {$yaml['body']['font-weight']};";
		$style[] = "    line-height: {$yaml['body']['line-height']};";
		$style[] = "    background-color: $bg;";
		$style[] = "    color: $fg;";
		$style[] = '    box-sizing: border-box;';
		$style[] = '    & div { box-sizing: border-box; }';
		$style[] = '}';

		return join("\n", $style);
	}

}
