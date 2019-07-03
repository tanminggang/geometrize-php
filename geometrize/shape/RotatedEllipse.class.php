<?php

// Generated by Haxe 3.4.7
class geometrize_shape_RotatedEllipse implements geometrize_shape_Shape{
	public function __construct($xBound, $yBound) {
		if(!php_Boot::$skip_constructor) {
		$this->x = mt_rand(0,$xBound-1);
		$this->y = mt_rand(0,$yBound-1);
		$this->rx = mt_rand(1,32);
		$this->ry = mt_rand(1,32);
		$this->angle = mt_rand(0,359);
		$this->xBound = $xBound;
		$this->yBound = $yBound;
	}}
	public $x;
	public $y;
	public $rx;
	public $ry;
	public $angle;
	public $xBound;
	public $yBound;
	public function rasterize() {
		$pointCount = 20;
		$points = (new _hx_array(array()));
		$rads = $this->angle * (Math::$PI / 180.0);
		$c = Math::cos($rads);
		$s = Math::sin($rads);
		{
			$_g1 = 0;
			$_g = $pointCount;
			while($_g1 < $_g) {
				$_g1 = $_g1 + 1;
				$i = $_g1 - 1;
				$rot = 360.0 / $pointCount * $i * (Math::$PI / 180.0);
				$crx = $this->rx;
				$crx1 = $crx * Math::cos($rot);
				$cry = $this->ry;
				$cry1 = $cry * Math::sin($rot);
				$tx = intval($crx1 * $c - $cry1 * $s + $this->x);
				$ty = intval($crx1 * $s + $cry1 * $c + $this->y);
				$points->push(_hx_anonymous(array("x" => $tx, "y" => $ty)));
				unset($ty,$tx,$rot,$i,$cry1,$cry,$crx1,$crx);
			}
		}
		$tmp = geometrize_rasterizer_Rasterizer::scanlinesForPolygon($points);
		return geometrize_rasterizer_Scanline::trim($tmp, $this->xBound, $this->yBound);
	}
	public function mutate() {
		$r = mt_rand(0,3);
		switch($r) {
		case 0:{
			$value = $this->x;
			if(!true) {
				throw new HException("FAIL: lower <= upper");
			}
			$value1 = $value + mt_rand(-16,+16);
			$max = $this->xBound - 1;
			if(!(0 <= $max)) {
				throw new HException("FAIL: min <= max");
			}
			$tmp = null;
			if($value1 < 0) {
				$tmp = 0;
			} else {
				if($value1 > $max) {
					$tmp = $max;
				} else {
					$tmp = $value1;
				}
			}
			$this->x = $tmp;
			$value2 = $this->y;
			if(!true) {
				throw new HException("FAIL: lower <= upper");
			}
			$value3 = $value2 + mt_rand(-16,+16);
			$max1 = $this->yBound - 1;
			if(!(0 <= $max1)) {
				throw new HException("FAIL: min <= max");
			}
			$tmp1 = null;
			if($value3 < 0) {
				$tmp1 = 0;
			} else {
				if($value3 > $max1) {
					$tmp1 = $max1;
				} else {
					$tmp1 = $value3;
				}
			}
			$this->y = $tmp1;
		}break;
		case 1:{
			$value4 = $this->rx;
			if(!true) {
				throw new HException("FAIL: lower <= upper");
			}
			$value5 = $value4 + mt_rand(-16,+16);
			$max2 = $this->xBound - 1;
			if(!(1 <= $max2)) {
				throw new HException("FAIL: min <= max");
			}
			$tmp2 = null;
			if($value5 < 1) {
				$tmp2 = 1;
			} else {
				if($value5 > $max2) {
					$tmp2 = $max2;
				} else {
					$tmp2 = $value5;
				}
			}
			$this->rx = $tmp2;
		}break;
		case 2:{
			$value6 = $this->ry;
			if(!true) {
				throw new HException("FAIL: lower <= upper");
			}
			$value7 = $value6 + mt_rand(-16,+16);
			$max3 = $this->yBound - 1;
			if(!(1 <= $max3)) {
				throw new HException("FAIL: min <= max");
			}
			$tmp3 = null;
			if($value7 < 1) {
				$tmp3 = 1;
			} else {
				if($value7 > $max3) {
					$tmp3 = $max3;
				} else {
					$tmp3 = $value7;
				}
			}
			$this->ry = $tmp3;
		}break;
		case 3:{
			$value8 = $this->angle;
			if(!true) {
				throw new HException("FAIL: lower <= upper");
			}
			$value9 = $value8 + mt_rand(-4,+4);
			if(!true) {
				throw new HException("FAIL: min <= max");
			}
			$tmp4 = null;
			if($value9 < 0) {
				$tmp4 = 0;
			} else {
				if($value9 > 360) {
					$tmp4 = 360;
				} else {
					$tmp4 = $value9;
				}
			}
			$this->angle = $tmp4;
		}break;
		}
	}
	public function hclone() {
		$ellipse = new geometrize_shape_RotatedEllipse($this->xBound, $this->yBound);
		$ellipse->x = $this->x;
		$ellipse->y = $this->y;
		$ellipse->rx = $this->rx;
		$ellipse->ry = $this->ry;
		$ellipse->angle = $this->angle;
		if (isset($this->color)) {
			$ellipse->color = $this->color;
		}
		return $ellipse;
	}
	public function getType() {
		return 4;
	}
	public function getRawShapeData() {
		return (new _hx_array(array($this->x, $this->y, $this->rx, $this->ry, $this->angle)));
	}
	public function getSvgShapeData() {
		$s = "<g transform=\"translate(" . _hx_string_rec($this->x, "") . " " . _hx_string_rec($this->y, "") . ") rotate(" . _hx_string_rec($this->angle, "") . ") scale(" . _hx_string_rec($this->rx, "") . " " . _hx_string_rec($this->ry, "") . ")\">";
		$s = _hx_string_or_null($s) . _hx_string_or_null(("<ellipse cx=\"" . _hx_string_rec(0, "") . "\" cy=\"" . _hx_string_rec(0, "") . "\" rx=\"" . _hx_string_rec(1, "") . "\" ry=\"" . _hx_string_rec(1, "") . "\" " . _hx_string_or_null(geometrize_exporter_SvgExporter::$SVG_STYLE_HOOK) . " />"));
		$s = _hx_string_or_null($s) . "</g>";
		return $s;
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	function __toString() { return 'geometrize.shape.RotatedEllipse'; }
}
