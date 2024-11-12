<?php

trait Input {

	public function input($yaml) {

		// $style[] = '.text-input {';
		// $style[] = '   .text-input-row {';
		// $style[] = '        position: relative;';
		// $style[] = '';
		// $style[] = '        input {';
		// $style[] = '            width: 100%;';
		// $style[] = '            height: 32px;';
		// $style[] = '            padding: 0 8px;';
		// $style[] = '        }';
		// $style[] = '        .svg-icon-eye {';
		// $style[] = '            position: absolute;';
		// $style[] = '            right: 6px;';
		// $style[] = '        }';
		// $style[] = '';
		// $style[] = '   }';
		// $style[] = '   &.w-2 .text-input-row input {';
		// $style[] = '        width: calc(100% - 20px);';
		// $style[] = '        height: 32px;';
		// $style[] = '    }';
		// $style[] = '}';

		// return join("\n", $style);
		return <<<EOF
			.text-input {
				& input[type="password"] {
					letter-spacing: 2px;
				}
			   .text-input-row {
					position: relative;

					input {
						height: 29px;
						padding: 0 8px;
						border-radius: 4px;
						border: 1px solid;
						width: calc(100% - 18px);
					}
					.svg-icon-eye {
						position: absolute;
						top: 3px;
						right: 6px;
						height: 24px;
						filter: hue-rotate(223deg) saturate(0.2);
						&:hover {
							cursor: pointer;
							filter: hue-rotate(223deg) saturate(0.5) brightness(1.5);
						}
					}
			   }
			}
		EOF;
	}
}