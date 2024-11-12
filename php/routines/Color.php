<?php

trait Color {
	public function light($any, $factor = 1.2) {
		$str = str_replace(' ', '', $any);

		$type = str_starts_with($str, '#') ? 'hex' : '';
		$type = str_starts_with($str, 'rgb') ? 'rgb' : $type;

		switch ($type) {
		case 'rgb':
			$p = explode(',', $str);
			$R = min(255, floor($factor * intval(preg_replace('/[^0-9.]/', '', $p[0]))));
			$G = min(255, floor($factor * intval(preg_replace('/[^0-9.]/', '', $p[1]))));
			$B = min(255, floor($factor * intval(preg_replace('/[^0-9.]/', '', $p[2]))));
			if (count($p) === 4) {
				$A = (int) min(255, 255 * floatval(preg_replace('/[a-zA-Z\(\)]/', '', $p[3])));

				return sprintf('#%02s%02s%02s%02s', dechex($R), dechex($G), dechex($B), dechex($A));
			}

			return sprintf('#%02s%02s%02s', dechex($R), dechex($G), dechex($B));
		}

		return $any;
	}

	public function hex($any) {
		$str = str_replace(' ', '', $any);

		$type = str_starts_with($str, '#') ? 'hex' : '';
		$type = str_starts_with($str, 'rgb') ? 'rgb' : $type;

		switch ($type) {
		case 'rgb':
			$p = explode(',', $str);
			$R = intval(preg_replace('/[^0-9.]/', '', $p[0]));
			$G = intval(preg_replace('/[^0-9.]/', '', $p[1]));
			$B = intval(preg_replace('/[^0-9.]/', '', $p[2]));
			if (count($p) === 4) {
				$A = (int) min(255, 255 * floatval(preg_replace('/[a-zA-Z\(\)]/', '', $p[3])));

				return sprintf('#%02s%02s%02s%02s', dechex($R), dechex($G), dechex($B), dechex($A));
			}

			return sprintf('#%02s%02s%02s', dechex($R), dechex($G), dechex($B));
		}

		return $any;
	}

	public function adjustBrightness($hexCode, $adjustPercent) {
		$hexCode = ltrim($hexCode, '#');

		if (strlen($hexCode) == 3) {
			$hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
		}

		$hexCode = array_map('hexdec', str_split($hexCode, 2));

		foreach ($hexCode as  & $color) {
			$adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
			$adjustAmount = ceil($adjustableLimit * $adjustPercent);

			$color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
		}

		return '#' . implode($hexCode);
	}
}
