<?php
	Class SmartyConnection {
		private static $smarty;

		public static function init() {
			if (!self::$smarty) {
				self::$smarty = new Smarty();

				self::$smarty->setTemplateDir('client/Views');
				self::$smarty->setCompileDir('framework/src/CompiledViews');
			}

			return self::$smarty;
		}
	}
 ?>
