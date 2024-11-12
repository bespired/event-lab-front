<?php

trait Alert {

	public function alert($yaml) {

		$style[] = '.alert-bar { ';

		$style[] = '    display: inline-flex; ';
		$style[] = '    padding: 3px 10px 4px 10px; ';
		$style[] = '    border-radius: 4px; ';
		$style[] = '    user-select: none; ';
		$style[] = '    align-self: center; ';
		$style[] = '    justify-content: center; ';

		foreach ($yaml['styles'] as $stylename) {
			$hex = $this->hex($yaml['colors'][$stylename]);
			$light = $this->light($yaml['colors'][$stylename]);
			$bright = $this->adjustBrightness($hex, .92);

			$style[] = "    &.$stylename {";
			$style[] = "        background-color: $bright;";
			$style[] = "        color: $hex;";
			$style[] = "        border: 1px solid $hex;";
			$style[] = '    }';
		}

		$style[] = '} ';

		return join("\n", $style);
	}
}