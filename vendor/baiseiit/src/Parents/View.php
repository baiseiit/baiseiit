<?php 

namespace Views;

	class View {
		protected $data = [];
		protected $smarty;

		public function __construct() {
			$this->smarty = \SmartyConnection::init();
			$this->setConstants();
		}

		public function get($key) {
			return $this->smarty->getTemplateVars($key);
		}

		public function set($key, $value) {
			$this->smarty->assign($key, $value);
		}

		public function render($name) {
			$this->smarty->display("$name.tpl");
		}

		public function setConstants() {
			$this->smarty->assign('config', get_defined_constants());
		}
	}
 ?>