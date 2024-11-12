<?php

include_once 'routines/Color.php';

include_once 'routines/Alert.php';
include_once 'routines/Body.php';
include_once 'routines/Buttons.php';
include_once 'routines/Font.php';
include_once 'routines/Input.php';
include_once 'routines/Sidebar.php';
include_once 'routines/Wrappers.php';

class Convert {
	use Color;

	use Alert;
	use Body;
	use Buttons;
	use Font;
	use Input;
	use Sidebar;
	use Wrappers;

	public function handle() {
		$srcfolder = realpath(__DIR__);
		$sassfolder = realpath(__DIR__ . '/../src/sass');
		if (!$sassfolder) {
			echo "Cannot find src/sass.\n";
			exit;
		}

		$file = file_get_contents($srcfolder . '/setup.yaml');
		$yaml = yaml_parse($file);

		file_put_contents($sassfolder . '/body.scss', $this->body($yaml));
		file_put_contents($sassfolder . '/button.scss', $this->buttons($yaml));
		file_put_contents($sassfolder . '/wrapper.scss', $this->wrappers($yaml));

		file_put_contents($sassfolder . '/alert.scss', $this->alert($yaml));
		file_put_contents($sassfolder . '/sidebar.scss', $this->sidebar($yaml));
		file_put_contents($sassfolder . '/input.scss', $this->input($yaml));
		file_put_contents($sassfolder . '/font.scss', $this->font($yaml));

	}

}
