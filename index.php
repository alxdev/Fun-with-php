<?php

class FunWithPhp{
    
    /////Weird CRUD on this framework!!!!!!
    public function getFieldTypeById($id){
            
                $this->DB->select('field_type');
		$this->DB->from(FIELD_EDITOR_FIELDS);
		$this->DB->where('id', $id);
		$results = $this->DB->get()->result_array();
                return $results;
    }
	
    public function updateTextScore($value){
            
                $this->DB->update('weight');
		$this->DB->from(LANG_DS);
		$this->DB->where('value_1', $value);
		$results = $this->DB->get()->result_array();
                
                return $results;
    }
    
    
    /// Checks
    public function save_saved($saved_id, $data){
		if(!$saved_id){
			
			//Alex task
			$this->DB->select(implode(', ', $this->_fields));
			$this->DB->from(LISTINGS_SAVED_TABLE);
			$this->DB->where('id_listing', $data['id_listing']);
			$results = $this->DB->get()->result_array();
			
			if($results){
				$this->DB->delete(LISTINGS_SAVED_TABLE, $data);
				return 0;
			}else{
				$this->DB->insert(LISTINGS_SAVED_TABLE, $data);
				$saved_id = $this->DB->insert_id();
				return 1;
			}
		}else{
			$this->DB->where('id', $saved_id);
			$this->DB->update(LISTINGS_SAVED_TABLE, $data);
		}
		return $saved_id;
    }
    
    //Get the itmes of an array excluding the items of other array items.
    public function getInNotArrayItems(){
        
    $isCert = false;
        for($counter = 1;$counter<30;$counter++){
                                                            
            foreach($leedCertsArray as $leedVal){
                if(intval($leedVal) == $counter)
                        $isCert = true;
                }
                        
                foreach($energyStarArray as $energyVal){
                    if(intval($energyVal) == $counter)
                        $isCert = true;
                    }
                        
                    if($isCert == false)
                        $otherCertsArray[] = (string)$counter;
                            
                    $isCert = false;
                }
                
            $field_flags = array_merge($field_flags, $otherCertsArray);
            $current_settings['data']['other_cert'] = true;
    }
    
}