<?php

// Generated by Haxe 3.4.7
class geometrize_shape_Rectangle implements geometrize_shape_Shape {
	public $x1;
	public $y1;
	public $x2;
	public $y2;
	public $xBound;
	public $yBound;

	public function __construct($xBound, $yBound){
		$this->x1 = mt_rand(0, $xBound-1);
		$this->y1 = mt_rand(0, $yBound-1);
		$value = $this->x1;
		$value1 = $value+mt_rand(1, 32);
		$max = $xBound-1;
		if (!(0<=$max)){
			throw new HException("FAIL: min <= max");
		}
		$tmp = null;
		if ($value1<0){
			$tmp = 0;
		} else {
			if ($value1>$max){
				$tmp = $max;
			} else {
				$tmp = $value1;
			}
		}
		$this->x2 = $tmp;
		$value2 = $this->y1;
		$value3 = $value2+mt_rand(1, 32);
		$max1 = $yBound-1;
		if (!(0<=$max1)){
			throw new HException("FAIL: min <= max");
		}
		$tmp1 = null;
		if ($value3<0){
			$tmp1 = 0;
		} else {
			if ($value3>$max1){
				$tmp1 = $max1;
			} else {
				$tmp1 = $value3;
			}
		}
		$this->y2 = $tmp1;
		$this->xBound = $xBound;
		$this->yBound = $yBound;
	}

	public function rasterize(){
		$lines = [];
		{
			$_g1 = $this->y1;
			$_g = $this->y2;
			while ($_g1<$_g){
				$_g1 = $_g1+1;
				$y = $_g1-1;
				if ($this->x1!==$this->x2){
					$first = $this->x1;
					$second = $this->x2;
					$tmp = null;
					if ($first<$second){
						$tmp = $first;
					} else {
						$tmp = $second;
					}
					$first1 = $this->x1;
					$second1 = $this->x2;
					$tmp1 = null;
					if ($first1>$second1){
						$tmp1 = $first1;
					} else {
						$tmp1 = $second1;
					}
					$lines[] = new geometrize_rasterizer_Scanline($y, $tmp, $tmp1);
					unset($tmp1, $tmp, $second1, $second, $first1, $first);
				}
				unset($y);
			}
		}
		return $lines;
	}

	public function mutate(){
		$r = mt_rand(0, 1);
		switch ($r) {
			case 0:
				{
					$value = $this->x1;
					if (!true){
						throw new HException("FAIL: lower <= upper");
					}
					$value1 = $value+mt_rand(-16, +16);
					$max = $this->xBound-1;
					if (!(0<=$max)){
						throw new HException("FAIL: min <= max");
					}
					$tmp = null;
					if ($value1<0){
						$tmp = 0;
					} else {
						if ($value1>$max){
							$tmp = $max;
						} else {
							$tmp = $value1;
						}
					}
					$this->x1 = $tmp;
					$value2 = $this->y1;
					if (!true){
						throw new HException("FAIL: lower <= upper");
					}
					$value3 = $value2+mt_rand(-16, +16);
					$max1 = $this->yBound-1;
					if (!(0<=$max1)){
						throw new HException("FAIL: min <= max");
					}
					$tmp1 = null;
					if ($value3<0){
						$tmp1 = 0;
					} else {
						if ($value3>$max1){
							$tmp1 = $max1;
						} else {
							$tmp1 = $value3;
						}
					}
					$this->y1 = $tmp1;
				}
				break;
			case 1:
				{
					$value4 = $this->x2;
					if (!true){
						throw new HException("FAIL: lower <= upper");
					}
					$value5 = $value4+mt_rand(-16, +16);
					$max2 = $this->xBound-1;
					if (!(0<=$max2)){
						throw new HException("FAIL: min <= max");
					}
					$tmp2 = null;
					if ($value5<0){
						$tmp2 = 0;
					} else {
						if ($value5>$max2){
							$tmp2 = $max2;
						} else {
							$tmp2 = $value5;
						}
					}
					$this->x2 = $tmp2;
					$value6 = $this->y2;
					if (!true){
						throw new HException("FAIL: lower <= upper");
					}
					$value7 = $value6+mt_rand(-16, +16);
					$max3 = $this->yBound-1;
					if (!(0<=$max3)){
						throw new HException("FAIL: min <= max");
					}
					$tmp3 = null;
					if ($value7<0){
						$tmp3 = 0;
					} else {
						if ($value7>$max3){
							$tmp3 = $max3;
						} else {
							$tmp3 = $value7;
						}
					}
					$this->y2 = $tmp3;
				}
				break;
		}
	}

	public function rescale($xBound, $yBound){
		$xScale = ($xBound-1) / ($this->xBound-1);
		$yScale = ($yBound-1) / ($this->yBound-1);
		$this->xBound = $xBound;
		$this->yBound = $yBound;
		$this->x1 = intval(round($this->x1*$xScale));
		$this->y1 = intval(round($this->y1*$yScale));
		$this->x2 = intval(round($this->x2*$xScale));
		$this->y2 = intval(round($this->y2*$yScale));
	}

	public function hclone(){
		$rectangle = new geometrize_shape_Rectangle($this->xBound, $this->yBound);
		$rectangle->x1 = $this->x1;
		$rectangle->y1 = $this->y1;
		$rectangle->x2 = $this->x2;
		$rectangle->y2 = $this->y2;
		if (isset($this->color)){
			$rectangle->color = $this->color;
		}
		return $rectangle;
	}

	public function getType(){
		return geometrize_shape_ShapeTypes::T_RECTANGLE;
	}

	public function getRawShapeData(){
		$first = $this->x1;
		$second = $this->x2;
		$tmp = null;
		if ($first<$second){
			$tmp = $first;
		} else {
			$tmp = $second;
		}
		$first1 = $this->y1;
		$second1 = $this->y2;
		$tmp1 = null;
		if ($first1<$second1){
			$tmp1 = $first1;
		} else {
			$tmp1 = $second1;
		}
		$first2 = $this->x1;
		$second2 = $this->x2;
		$tmp2 = null;
		if ($first2>$second2){
			$tmp2 = $first2;
		} else {
			$tmp2 = $second2;
		}
		$first3 = $this->y1;
		$second3 = $this->y2;
		$tmp3 = null;
		if ($first3>$second3){
			$tmp3 = $first3;
		} else {
			$tmp3 = $second3;
		}
		return (new _hx_array(array($tmp, $tmp1, $tmp2, $tmp3)));
	}

	public function getSvgShapeData(){
		$first = $this->x1;
		$second = $this->x2;
		$tmp = null;
		if ($first<$second){
			$tmp = $first;
		} else {
			$tmp = $second;
		}
		$first1 = $this->y1;
		$second1 = $this->y2;
		$tmp1 = null;
		if ($first1<$second1){
			$tmp1 = $first1;
		} else {
			$tmp1 = $second1;
		}
		$first2 = $this->x1;
		$second2 = $this->x2;
		$tmp2 = null;
		if ($first2>$second2){
			$tmp2 = $first2;
		} else {
			$tmp2 = $second2;
		}
		$first3 = $this->x1;
		$second3 = $this->x2;
		$tmp3 = null;
		if ($first3<$second3){
			$tmp3 = $first3;
		} else {
			$tmp3 = $second3;
		}
		$first4 = $this->y1;
		$second4 = $this->y2;
		$tmp4 = null;
		if ($first4>$second4){
			$tmp4 = $first4;
		} else {
			$tmp4 = $second4;
		}
		$first5 = $this->y1;
		$second5 = $this->y2;
		$tmp5 = null;
		if ($first5<$second5){
			$tmp5 = $first5;
		} else {
			$tmp5 = $second5;
		}
		return "<rect x=\"" . _hx_string_rec($tmp, "") . "\" y=\"" . _hx_string_rec($tmp1, "") . "\" width=\"" . _hx_string_rec(($tmp2-$tmp3), "") . "\" height=\"" . _hx_string_rec(($tmp4-$tmp5), "") . "\" " . _hx_string_or_null(geometrize_exporter_SvgExporter::$SVG_STYLE_HOOK) . " />";
	}

	public function __call($m, $a){
		if (isset($this->$m) && is_callable($this->$m)){
			return call_user_func_array($this->$m, $a);
		} else {
			if (isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m])){
				return call_user_func_array($this->__dynamics[$m], $a);
			} else {
				if ('toString'==$m){
					return $this->__toString();
				} else {
					throw new HException('Unable to call <' . $m . '>');
				}
			}
		}
	}

	function __toString(){
		return 'geometrize.shape.Rectangle';
	}
}
