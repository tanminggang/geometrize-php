<?php

// Generated by Haxe 3.4.7
class geometrize__ArraySet_ArraySet_Impl_ {
	public function __construct(){}
	static function create($array = null) {
		if($array === null) {
			$this1 = (new _hx_array(array()));
			return $this1;
		}
		return geometrize__ArraySet_ArraySet_Impl_::toSet($array);
	}
	static function intersection($this1, $set) {
		$result = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $this1->length) {
				$element = $this1[$_g];
				$_g = $_g + 1;
				if(geometrize__ArraySet_ArraySet_Impl_::contains($set, $element)) {
					$result->push($element);
				}
				unset($element);
			}
		}
		$this2 = $result;
		return $this2;
	}
	static function union($this1, $set) {
		return geometrize__ArraySet_ArraySet_Impl_::toSet($this1->concat(geometrize__ArraySet_ArraySet_Impl_::toArray($set)));
	}
	static function unionArray($this1, $array) {
		return geometrize__ArraySet_ArraySet_Impl_::toSet($this1->concat($array));
	}
	static function difference($this1, $set) {
		$this2 = $this1->copy();
		$result = $this2;
		{
			$element = $set->iterator();
			while($element->hasNext()) {
				$element1 = $element->next();
				$result->remove($element1);
				unset($element1);
			}
		}
		$this3 = geometrize__ArraySet_ArraySet_Impl_::toArray($result);
		return $this3;
	}
	static function add($this1, $element) {
		if(!($element !== null)) {
			throw new HException("FAIL: element != null");
		}
		if(geometrize__ArraySet_ArraySet_Impl_::contains($this1, $element)) {
			return false;
		}
		$this1->push($element);
		return true;
	}
	static function contains($this1, $element) {
		{
			$_g = 0;
			while($_g < $this1->length) {
				$i = $this1[$_g];
				$_g = $_g + 1;
				if((is_object($_t = $i) && ($_t instanceof Enum) ? $_t == $element : _hx_equal($_t, $element))) {
					return true;
				}
				unset($i,$_t);
			}
		}
		return false;
	}
	static function copy($this1) {
		$this2 = $this1->copy();
		return $this2;
	}
	static function slice($this1, $position, $end = null) {
		$this2 = $this1->slice($position, $end);
		return $this2;
	}
	static function splice($this1, $position, $length) {
		$this2 = $this1->splice($position, $length);
		return $this2;
	}
	static function toArray($this1) {
		return $this1->copy();
	}
	static function toSet($array) {
		$this1 = (new _hx_array(array()));
		$set = $this1;
		{
			$_g = 0;
			while($_g < $array->length) {
				$v = $array[$_g];
				$_g = $_g + 1;
				geometrize__ArraySet_ArraySet_Impl_::add($set, $v);
				unset($v);
			}
		}
		return $set;
	}
	static function _new($array) {
		$this1 = $array;
		return $this1;
	}
	function __toString() { return 'geometrize._ArraySet.ArraySet_Impl_'; }
}
