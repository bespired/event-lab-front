<?php

trait Font {

	public function font($yaml) {

		$style[] = '@import url(https://fonts.bunny.net/css?family=roboto:400,500,700);';

		return join("\n", $style);
	}
}