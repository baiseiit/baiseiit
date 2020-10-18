<?php
	Class SmartyConnection {
		private static $smarty;

		public static function init() {
			if (!self::$smarty) {
				self::$smarty = new Smarty();

				self::$smarty->setTemplateDir(__APP_DIR__ . '/' . trim(VIEWS_PATH, '/'));
				self::$smarty->setCompileDir(__FRAMEWORK_DIR__ . '/CompiledViews');
			}

			return self::$smarty;
		}
	}
