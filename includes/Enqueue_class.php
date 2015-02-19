<?php
/**
 * Enqueue JavaScript and CSS Styles.
 * 
 * @version 1.0 2015/02/18
 * @author Zach Johnson <me@zachjohnson.name>
 */
 
class Enqueue {
	/** Start Config area */
	private path_js = '/full/path/to/js/folder/';
	private path_css = '/full/path/to/css/folder/';
	/** End Config area */
	
	private $scripts = array();
	private $styles = array();
	
	public function add($type, $source) {
		switch( $type ) {
			case 'script' :
			case 'js' :
				$this->scripts[] = $source;
				break;
			case 'style' :
			case 'css' :
				$this->styles[] = $source;
				break;
		}
	}
	
	public function load($type) {
		$output = '';
		
		switch( $type ) {
			case 'script' :
			case 'scripts' :
				$load = 'scripts';
				$format = '<script src="' . $this->path_js . '%s.js"></script>' . PHP_EOL;
				break;
			case 'style' :
			case 'styles' :
				$load = 'styles';
				$format = '<link rel="stylesheet" href="' . $this->path_css . '%s.css">' . PHP_EOL;
				break;
		}

		if( ! isset($this->$load) )
			return false;
		
		$uniqueEnqueue = array_unique($config->enqueued[$load]);
		
		foreach( $uniqueEnqueue as $enqueue ) {
			$output .= sprintf($format,$enqueue);
		}
		
		echo $output;
	}
}
