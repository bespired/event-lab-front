<?php

trait Buttons {

	public function buttons($yaml) {
		$style[] = '.click-button {';
		$style[] = '    display: inline-flex;';
		$style[] = '    padding: 3px 8px 4px 8px;';
		$style[] = '    color: #fdfbfd;';
		$style[] = '    border-radius: 4px;';
		$style[] = '    user-select: none;';

		$style[] = '    align-self: center;';
		$style[] = '    justify-content: center;';

		$style[] = '    transition: background-color 0.25s;';

		$style[] = '    &:hover {';
		$style[] = '        cursor: pointer;';
		$style[] = '    }';

		$style[] = '    &:active {';
		$style[] = '        filter: brightness(0.9);';
		$style[] = '    }';

		foreach ($yaml['styles'] as $stylename) {
			$hex = $this->hex($yaml['colors'][$stylename]);
			$light = $this->light($yaml['colors'][$stylename]);

			$style[] = "    &.$stylename {";
			if ($stylename === 'link') {
				$style[] = "        text-decoration: underline;";
				$style[] = "        color:rgb(52, 97, 155);";
				$hex = 'rgba(0,0,0,0)';
				$light = 'rgba(52, 97, 155, 0.1)';
			}
			$style[] = "        background-color: $hex;";
			$style[] = '        &:hover {';
			$style[] = "            background-color: $light;";
			$style[] = '       }';
			$style[] = '    }';

		}

		$style[] = '}';

		// &.link {
		//     background-color: rgba(0,0,0,0);
		//     color: #34619b;
		//     text-decoration: underline;
		//     &:hover {
		//         background-color: #3e74ba11;
		//         color: #3e74ba;
		//    }
		// }

		return join("\n", $style);
	}
}
