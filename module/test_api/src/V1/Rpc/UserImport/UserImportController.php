<?php
namespace test_api\V1\Rpc\UserImport;

use Zend\Mvc\Controller\AbstractActionController;

class UserImportController extends AbstractActionController
{
    public function userImportAction()
    {
    	$arrData = $this->callTestApiSource();
    	foreach ($arrData as $key => $arrUser) {
    		//Normalized array address
	    	$arrAddress = $arrUser['address'];
	    	$arrAddress['id_usuario'] = $arrUser['id'];
	    	$arrAddress['lat'] = $arrAddress['geo']['lat'];
	    	$arrAddress['lng'] = $arrAddress['geo']['lng'];
	    	unset($arrAddress['geo']);
	    	unset($arrUser['address']);

	    	//Normalized array company
	    	$arrCompany = $arrUser['company'];
	    	unset($arrUser['company']);
	    	$arrCompany['id_usuario'] = $arrUser['id'];

	    	//Verify user already
	    	$userAlready = $this->callTestApi($arrUser['id'],'users','GET');
	    	$arrStatus = array();
	    	if (!isset($userAlready['id'])) {
		    	//call api to save data
		    	$this->callTestApi($arrUser, 'users');
		    	$this->callTestApi($arrAddress, 'address');
		    	$this->callTestApi($arrCompany, 'company');
	    	}
    	}
    	return array('status'=>true);
    }

    /**
     * Call test api to save data in specific route
     * @param  array|string $data data to save or select
     * @param  string $route route to save data
     * @return [type]        [description]
     */
    private function callTestApi($data, $route, $method = 'POST')
    {
    	$uri = "http://test-api.local/";
    	$uri .= !is_array($data) ? $route.'/'.$data : $route;

    	$curl = curl_init();
    	$arrOpt = array(
		  CURLOPT_URL => $uri,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => $method,
		);
		if (is_array($data)) {
			$arrOpt[CURLOPT_POSTFIELDS] = $data;
		}
		curl_setopt_array($curl, $arrOpt);

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response, true);
    }

    /**
     * Return data to import users
     */
    private function callTestApiSource()
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://test-api-source.local/users",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		curl_close($curl);

		return json_decode($response,true);
    }
}
