<?php 

namespace Hcode;
use \Rain\Tpl;


class PageAdmin extends Page {

	public function __construct($opts = array(), $tpl_dir = "/Udemy/PHP/ecommerce/views/admin/") {

		parent::__construct($opts, $tpl_dir);

	}
}


// use \Rain\Tpl;

// class PageAdmin {

// 	private $tpl;
// 	private $options = [];
// 	private $defaults = [
// 		"data"=>[]

// 	];

// 	public function __construct($opts = array(), $tpl_dir = "/Udemy/PHP/ecommerce/views/admin/"){

// 		$this->options = array_merge($this->defaults, $opts);

// 		$config = array(
// 			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . $tpl_dir,
// 			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/Udemy/PHP/ecommerce/views-cache/",
// 			"debug"         => false
// 		   );

// 		Tpl::configure( $config );

// 		$this->tpl = new Tpl();

// 		$this->setData($this->options["data"]);

// 		$this->tpl->draw( "header" );


// 	}

// 	private function setData($data = array()) {

// 		foreach ($data as $key => $value) {
// 			$this->tpl->assign($key, $value);
// 		}
// 	}

// 	public function setTpl($name, $data = array(), $returnHTML = false){

// 		$this->setData($data);

// 		return $this->tpl->draw($name, $returnHTML);

// 	}

// 	public function __destruct(){

// 		$this->tpl->draw("footer");

// 	}
// }

 ?>