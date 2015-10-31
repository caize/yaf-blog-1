<?php

class TaxonomyModel extends Model{




	public function delById($id){
		return $this->where(array('id'=>$id))->del();	
	}


}


?>

