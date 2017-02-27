<?php

namespace mmelcor\imagehandler;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * Class ImageHandler
 * @package mmelcor\imagehandler
 */
class ImageHandler extends \yii\base\Component {
	public $hostUrl;
	public $siteFolder;
	public $defaultLang;

	/**
	 * Calls fileExists and returns an image path if true.
	 * @return string
	 */
	public function getImage($path) {
		$lang = Yii::$app->language;
		if(self::fileExists($path)) {
			return $this->hostUrl."/".$this->siteFolder."/".$lang.$path;
		} else {
			return $this->hostUrl."/".$this->siteFolder."/".$this->defaultLang.$path;
		}
	}

	/**
	 * Checks if the requested image exists and returns true or false.
	 * @return boolean
	 */
	public function fileExists($path) {
		$ch = curl_init($this->hostUrl.$this->siteFolder."/".$path);

		curl_setopt($ch, CURLOPT_NOBODY, true);

		$result = curl_exec($ch);

		$ret = false;

		if($result !== false) {
			$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			if($status == 200) {
				$ret = true;
			}
		}

		curl_close($ch);

		return $ret;
	}
}