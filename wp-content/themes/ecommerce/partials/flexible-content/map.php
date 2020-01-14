<?php
$map_iframe = get_field( 'map', 'option' );

$pattern1 = '/width="[0-9]*"/';
$pattern2 = '/height="[0-9]*"/';

$updatedMap = preg_replace( [ $pattern1, $pattern2 ], [
	'width="100%"',
	'height="100%"'
], $map_iframe );
?>
<div class="b-map">
    <div id="b-map" class="b-map_in"><?= $updatedMap ?></div>
</div>