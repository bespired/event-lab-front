<?php

include_once 'Color.php';

trait Wrappers {

	public function wrappers($yaml) {
		$style[] = '.button-row {';
		$style[] = '    display: flex;';
		$style[] = '    flex-wrap: wrap;';
		$style[] = '    gap: 4px;';
		$style[] = '}';

		return join("\n", $style);
	}

}
