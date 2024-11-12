<?php

trait Sidebar {

	public function sidebar($yaml) {

		$style[] = '.top-bar { ';
		$style[] = '    position: fixed; ';
		$style[] = '    display: block; ';
		$style[] = '    top: -100%; left: 0; right: 0; ';
		$style[] = '    min-height: 80px; ';
		$style[] = '    background-color: #fdfbfd; ';
		$style[] = '    color: #25292a; ';
		$style[] = '    box-shadow: 0 0 2px 2px rgba(0,0,0,0.2); ';
		$style[] = '    border-radius: 0 0 16px 16px; ';
		$style[] = '    transition: top 200ms; ';
		$style[] = '} ';
		$style[] = '.top-bar.visible { ';
		$style[] = '    top: 0; ';
		$style[] = '} ';

		return join("\n", $style);
	}
}
