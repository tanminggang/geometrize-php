<?php

// Generated by Haxe 3.4.7
interface geometrize_shape_Shape {
	function rasterize();

	function mutate();

	function rescale($xBound, $yBound);

	function hclone();

	function getType();

	function getRawShapeData();

	function getSvgShapeData();
}
