<?php 

	function randint(){
		return intval( 
			"0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) 
			. rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) 
			. rand(0,9) . rand(0,9) 
		);
	}