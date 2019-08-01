<?php

namespace Cerdic\Geometrize;

use \Cerdic\Geometrize\Model;

class ImageRunner {

	/**
	 * @var \Cerdic\Geometrize\Model
	 */
	protected $model;


	/**
	 * ImageRunner constructor.
	 * @param \Cerdic\Geometrize\Bitmap $inputImage
	 * @param int $backgroundColor
	 *   32bits encoded color
	 * @throws \Exception
	 */
	public function __construct($inputImage, $backgroundColor){
		$this->model = new Model($inputImage, $backgroundColor);
	}

	/**
	 * @param array $options
	 * @return array
	 * @throws \Exception
	 */
	public function step($options){
		return $this->model->step($options['shapeTypes'], $options['alpha'], $options['candidateShapesPerStep'], $options['shapeMutationsPerStep']);
	}

	/**
	 * @return \Cerdic\Geometrize\Bitmap
	 * @throws \Exception
	 */
	public function getImageData(){
		if (!($this->model!==null)){
			throw new \Exception("FAIL: model != null");
		}
		return $this->model->getCurrent();
	}

	/**
	 * @return \Cerdic\Geometrize\Model
	 */
	public function getModel() {
		return $this->model;
	}

}
