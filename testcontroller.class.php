<?php 
	class testcontroller{
		function show(){
			$testmodel = M('test');
			$result = $testmodel->get();
			$testview = V('test');
			$testview->display($result);



			// $testmodel = new testmodel();
			// $result = $testmodel->get();
			// $testview = new testview();
			// $testview->display(result);
		}
	}


 ?>