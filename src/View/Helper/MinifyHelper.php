<?php
namespace App\View\Helper;
use Cake\Core\Configure;

use Cake\View\Helper;
use Cake\View\View;

class MinifyHelper extends Helper {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');

/**
 * Creates a link element for javascript files.
 *
 * @param string|array $url String or array of javascript files to include
 * @param array $options Array of options, and html attributes
 * @return string
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::script
 */
	public function script($url, $options = array()) {
		if (Configure::read('MinifyAsset') === true) {
			return $this->Html->script($this->_path($url, 'js'), $options);
		} else {
			return $this->Html->script($url, $options);
		}
	}

/**
 * Creates a link element for CSS stylesheets.
 *
 * @param string|array $path The name of a CSS style sheet or an array containing names of CSS stylesheets.
 * @param string $rel Rel attribute. Defaults to "stylesheet". If equal to 'import' the stylesheet will be imported
 * @param array $options Array of options, and html attributes
 * @return string CSS <link /> or <style /> tag, depending on the type of link
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::css
 */
	public function css($path, $rel = null, $options = array()) {
		// if (Configure::read('MinifyAsset') === true) { 
			return $this->Html->css($this->_path($path, 'css'), $rel, $options);
		// } else {
			// return $this->Html->css($path, $rel, $options);
		// }
	}

/**
 * Build the path for minified files.
 *
 * @param string|array $assets Sring or array containing names of assests files
 * @param string $type js|css
 * @return string JS or CSS tag, depending on the type of link
 */
	private function _path($assets, $type) {
		if (!is_array($assets)) {
			$assets = array($assets);
		}

		if ($type === 'js') {
			$options = array('pathPrefix' => JS_URL, 'ext' => '.js');
		} else if ($type === 'css') {
			$options = array('pathPrefix' => CSS_URL, 'ext' => '.css');
		}

		$assetTimestamp = Configure::read('Asset.timestamp');
		Configure::write('Asset.timestamp', false);

		$files = array();
		foreach ($assets as $asset) {
			/* pr($asset);
			pr($options); */
			array_push($files, $options['pathPrefix'].$asset);
		}
		Configure::write('Asset.timestamp', $assetTimestamp);

		$path = '/min-' . $type . '?f=';
		$path = $path . join(',', $files);

		return $path;
	}

}

?>