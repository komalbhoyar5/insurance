<?php

class SettingsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function isAuthorized($user) {
		return true;
	}
	
	public function company_details(){
		$this->layout = "backend_template";
			if($this->request->is('post')){
				$addr = $this->Setting->find('all', array('conditions'=>array('form_type'=>'company_address_details')));
				$postdata = $this->request->data['Setting'];

					$addr_details = array();
				if (is_array($addr) && !empty($addr)) {
					foreach ($addr as $add) {
						$addr_details[$add['Setting']['name']] = $add['Setting']['id'];
					}
					$postdata['Setting'] = array();
					if (isset($addr_details['company_name'])) {
						$postdata['Setting']['0'] = array('id' => $addr_details['company_name'], 'name'=>'company_name', 'form_type' => 'company_address_details', 'value'=> $postdata['company_name']);
					}else{
						$postdata['Setting']['0'] = array('name'=>'company_name', 'form_type' => 'company_address_details', 'value'=> $postdata['company_name']);
					}
					if (isset($addr_details['email'])) {
						$postdata['Setting']['1'] = array('id' => $addr_details['email'], 'name'=>'email', 'form_type' => 'company_address_details', 'value'=> $postdata['email']);
					}else{
						$postdata['Setting']['1'] = array('name'=>'email', 'form_type' => 'company_address_details', 'value'=> $postdata['email']);
					}
					if (isset($addr_details['phone_no'])) {
						$postdata['Setting']['2'] = array('id' => $addr_details['phone_no'], 'name'=>'phone_no', 'form_type' => 'company_address_details', 'value'=> $postdata['phone_no']);
					}else{
						$postdata['Setting']['2'] = array('name'=>'phone_no', 'form_type' => 'company_address_details', 'value'=> $postdata['phone_no']);
					}
					if (isset($addr_details['mobile_no'])) {
						$postdata['Setting']['3'] = array('id' => $addr_details['mobile_no'], 'name'=>'mobile_no', 'form_type' => 'company_address_details', 'value'=> $postdata['mobile_no']);
					}else{
						$postdata['Setting']['3'] = array('name'=>'mobile_no', 'form_type' => 'company_address_details', 'value'=> $postdata['mobile_no']);
					}
					if (isset($addr_details['address1'])) {
						$postdata['Setting']['4'] = array('id' => $addr_details['address1'], 'name'=>'address1', 'form_type' => 'company_address_details', 'value'=> $postdata['address1']);
					}else{
						$postdata['Setting']['4'] = array('name'=>'address1', 'form_type' => 'company_address_details', 'value'=> $postdata['address1']);
					}
					if (isset($addr_details['address2'])) {
						$postdata['Setting']['5'] = array('id' => $addr_details['address2'], 'name'=>'address2', 'form_type' => 'company_address_details', 'value'=> $postdata['address2']);
					}else{
						$postdata['Setting']['5'] = array('name'=>'address2', 'form_type' => 'company_address_details', 'value'=> $postdata['address2']);
					}
					if (isset($addr_details['fax'])) {
						$postdata['Setting']['6'] = array('id' => $addr_details['fax'], 'name'=>'fax', 'form_type' => 'company_address_details', 'value'=> $postdata['fax']);
					}else{
						$postdata['Setting']['6'] = array('name'=>'fax', 'form_type' => 'company_address_details', 'value'=> $postdata['fax']);
					}
					if (isset($addr_details['pincode'])) {
						$postdata['Setting']['7'] = array('id' => $addr_details['pincode'], 'name'=>'pincode', 'form_type' => 'company_address_details', 'value'=> $postdata['pincode']);
					}else{
						$postdata['Setting']['7'] = array('name'=>'pincode', 'form_type' => 'company_address_details', 'value'=> $postdata['pincode']);
					}
					if (isset($addr_details['city'])) {
						$postdata['Setting']['7'] = array('id' => $addr_details['city'], 'name'=>'city', 'form_type' => 'company_address_details', 'value'=> $postdata['city']);
					}else{
						$postdata['Setting']['7'] = array('name'=>'city', 'form_type' => 'company_address_details', 'value'=> $postdata['city']);
					}	
					
				}else{
					$postdata['Setting'] = array(
						'0' => array('name'=>'company_name', 'form_type' => 'company_address_details', 'value'=> $postdata['company_name']),
						'1' => array('name'=>'email', 'form_type' => 'company_address_details', 'value'=> $postdata['email']),
						'2' => array('name'=>'phone_no', 'form_type' => 'company_address_details', 'value'=> $postdata['phone_no']),
						'3' => array('name'=>'mobile_no', 'form_type' => 'company_address_details', 'value'=> $postdata['mobile_no']),
						'4' => array('name'=>'address1', 'form_type' => 'company_address_details', 'value'=> $postdata['address1']),
						'5' => array('name'=>'address2', 'form_type' => 'company_address_details', 'value'=> $postdata['address2']),
						'6' => array('name'=>'fax', 'form_type' => 'company_address_details', 'value'=> $postdata['fax']),
						'7' => array('name'=>'pincode', 'form_type' => 'company_address_details', 'value'=> $postdata['pincode']),
						'8' => array('name'=>'city', 'form_type' => 'company_address_details', 'value'=> $postdata['city'])
					);
				}
				if ($this->Setting->saveMany($postdata['Setting'])) {
					$this->Session->setFlash('Details updated successfully.', '', array(), 'success');
				}else{
					$this->Session->setFlash('Unable to update.', '', array(), 'fail');
				}
			}
			$addr = $this->Setting->find('all', array('conditions'=>array('form_type'=>'company_address_details')));
			$addr_details = array();
			foreach ($addr as $add) {
				$addr_details[$add['Setting']['name']] = $add['Setting']['value'];
			}
			$this->set('addr_details', $addr_details);
	}
}