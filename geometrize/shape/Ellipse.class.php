<?php

// Generated by Haxe 3.4.7
class geometrize_shape_Ellipse implements geometrize_shape_Shape{
	public function __construct($xBound, $yBound) {
		if(!php_Boot::$skip_constructor) {
		$this->x = mt_rand(0, $xBound-1);
		$this->y = mt_rand(0, $yBound-1);
		$this->rx = mt_rand(1, 32);
		$this->ry = mt_rand(1, 32);
		$this->xBound = $xBound;
		$this->yBound = $yBound;
	}}
	public $x;
	public $y;
	public $rx;
	public $ry;
	public $xBound;
	public $yBound;
	public function rasterize() {
		$lines = (new _hx_array(array()));
		$aspect = $this->rx / $this->ry;
		$w = $this->xBound;
		$h = $this->yBound;
		{
			$_g1 = 0;
			$_g = $this->ry;
			while($_g1 < $_g) {
				$_g1 = $_g1 + 1;
				$dy = $_g1 - 1;
				$y1 = $this->y - $dy;
				$y2 = $this->y + $dy;
				$tmp = null;
				$tmp1 = null;
				if($y1 >= 0) {
					$tmp1 = $y1 >= $h;
				} else {
					$tmp1 = true;
				}
				if($tmp1) {
					if($y2 >= 0) {
						$tmp = $y2 >= $h;
					} else {
						$tmp = true;
					}
				} else {
					$tmp = false;
				}
				if($tmp) {
					continue;
				}
				$s = intval(Math::sqrt($this->ry * $this->ry - $dy * $dy) * $aspect);
				$x1 = $this->x - $s;
				$x2 = $this->x + $s;
				if($x1 < 0) {
					$x1 = 0;
				}
				if($x2 >= $w) {
					$x2 = $w - 1;
				}
				$tmp2 = null;
				if($y1 >= 0) {
					$tmp2 = $y1 < $h;
				} else {
					$tmp2 = false;
				}
				if($tmp2) {
					$lines->push(new geometrize_rasterizer_Scanline($y1, $x1, $x2));
				}
				$tmp3 = null;
				$tmp4 = null;
				if($y2 >= 0) {
					$tmp4 = $y2 < $h;
				} else {
					$tmp4 = false;
				}
				if($tmp4) {
					$tmp3 = $dy > 0;
				} else {
					$tmp3 = false;
				}
				if($tmp3) {
					$lines->push(new geometrize_rasterizer_Scanline($y2, $x1, $x2));
				}
				unset($y2,$y1,$x2,$x1,$tmp4,$tmp3,$tmp2,$tmp1,$tmp,$s,$dy);
			}
		}
		return $lines;
	}
	public function mutate() {
		$r = mt_rand(0, 2);
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
			$max3 = $this->xBound - 1;
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
		}
	}
	public function rescale($scale) {
		$this->x = intval(round($this->x * $scale));
		$this->y = intval(round($this->y * $scale));
		$this->rx = intval(round($this->rx * $scale));
		$this->ry = intval(round($this->ry * $scale));
		$this->xBound = intval(round($this->xBound * $scale));
		$this->yBound = intval(round($this->yBound * $scale));
	}
	public function hclone() {
		$ellipse = new geometrize_shape_Ellipse($this->xBound, $this->yBound);
		$ellipse->x = $this->x;
		$ellipse->y = $this->y;
		$ellipse->rx = $this->rx;
		$ellipse->ry = $this->ry;
		if (isset($this->color)) {
			$ellipse->color = $this->color;
		}
		return $ellipse;
	}
	public function getType() {
		return 3;
	}
	public function getRawShapeData() {
		return (new _hx_array(array($this->x, $this->y, $this->rx, $this->ry)));
	}
	public function getSvgShapeData() {
		return "<ellipse cx=\"" . _hx_string_rec($this->x, "") . "\" cy=\"" . _hx_string_rec($this->y, "") . "\" rx=\"" . _hx_string_rec($this->rx, "") . "\" ry=\"" . _hx_string_rec($this->ry, "") . "\" " . _hx_string_or_null(geometrize_exporter_SvgExporter::$SVG_STYLE_HOOK) . " />";
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
	function __toString() { return 'geometrize.shape.Ellipse'; }
}
