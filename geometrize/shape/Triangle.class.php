<?php

// Generated by Haxe 3.4.7
class geometrize_shape_Triangle implements geometrize_shape_Shape {
	public $x1;
	public $y1;
	public $x2;
	public $y2;
	public $x3;
	public $y3;
	public $xBound;
	public $yBound;

	public function __construct($xBound, $yBound){
		if (!php_Boot::$skip_constructor){
			$this->x1 = mt_rand(0, $xBound-1);
			$this->y1 = mt_rand(0, $yBound-1);
			$tmp = $this->x1;
			if (!true){
				throw new HException("FAIL: lower <= upper");
			}
			$this->x2 = $tmp+mt_rand(-16, +16);
			$tmp1 = $this->y1;
			if (!true){
				throw new HException("FAIL: lower <= upper");
			}
			$this->y2 = $tmp1+mt_rand(-16, +16);
			$tmp2 = $this->x1;
			if (!true){
				throw new HException("FAIL: lower <= upper");
			}
			$this->x3 = $tmp2+mt_rand(-16, +16);
			$tmp3 = $this->y1;
			if (!true){
				throw new HException("FAIL: lower <= upper");
			}
			$this->y3 = $tmp3+mt_rand(-16, +16);
			$this->xBound = $xBound;
			$this->yBound = $yBound;
		}
	}

	public function rasterize(){
		$tmp = geometrize_rasterizer_Rasterizer::scanlinesForPolygon((new _hx_array(array(_hx_anonymous(array("x" => $this->x1, "y" => $this->y1)), _hx_anonymous(array("x" => $this->x2, "y" => $this->y2)), _hx_anonymous(array("x" => $this->x3, "y" => $this->y3))))));
		return geometrize_rasterizer_Scanline::trim($tmp, $this->xBound, $this->yBound);
	}

	public function mutate(){
		$r = mt_rand(0, 2);
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
			case 2:
				{
					$value8 = $this->x3;
					if (!true){
						throw new HException("FAIL: lower <= upper");
					}
					$value9 = $value8+mt_rand(-16, +16);
					$max4 = $this->xBound-1;
					if (!(0<=$max4)){
						throw new HException("FAIL: min <= max");
					}
					$tmp4 = null;
					if ($value9<0){
						$tmp4 = 0;
					} else {
						if ($value9>$max4){
							$tmp4 = $max4;
						} else {
							$tmp4 = $value9;
						}
					}
					$this->x3 = $tmp4;
					$value10 = $this->y3;
					if (!true){
						throw new HException("FAIL: lower <= upper");
					}
					$value11 = $value10+mt_rand(-16, +16);
					$max5 = $this->yBound-1;
					if (!(0<=$max5)){
						throw new HException("FAIL: min <= max");
					}
					$tmp5 = null;
					if ($value11<0){
						$tmp5 = 0;
					} else {
						if ($value11>$max5){
							$tmp5 = $max5;
						} else {
							$tmp5 = $value11;
						}
					}
					$this->y3 = $tmp5;
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
		$this->x3 = intval(round($this->x3*$xScale));
		$this->y3 = intval(round($this->y3*$yScale));
	}

	public function hclone(){
		$triangle = new geometrize_shape_Triangle($this->xBound, $this->yBound);
		$triangle->x1 = $this->x1;
		$triangle->y1 = $this->y1;
		$triangle->x2 = $this->x2;
		$triangle->y2 = $this->y2;
		$triangle->x3 = $this->x3;
		$triangle->y3 = $this->y3;
		if (isset($this->color)){
			$triangle->color = $this->color;
		}
		return $triangle;
	}

	public function getType(){
		return 2;
	}

	public function getRawShapeData(){
		return (new _hx_array(array($this->x1, $this->y1, $this->x2, $this->y2, $this->x3, $this->y3)));
	}

	public function getSvgShapeData(){
		return "<polygon points=\"" . _hx_string_rec($this->x1, "") . "," . _hx_string_rec($this->y1, "") . " " . _hx_string_rec($this->x2, "") . "," . _hx_string_rec($this->y2, "") . " " . _hx_string_rec($this->x3, "") . "," . _hx_string_rec($this->y3, "") . "\" " . _hx_string_or_null(geometrize_exporter_SvgExporter::$SVG_STYLE_HOOK) . "/>";
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
		return 'geometrize.shape.Triangle';
	}
}
