<?php
namespace test_api\V1\Rpc\PostsImport;

use Zend\Mvc\Controller\AbstractActionController;
use test_api\Service\ApiRequestService;

class PostsImportController extends AbstractActionController
{
	private $objApiRequest;
	const URI_RESQUEST = 'posts';

	public function __construct(ApiRequestService $apiRequestService)
	{
		$this->objApiRequest = $apiRequestService;
		$this->objApiRequest->setMethod(ApiRequestService::METHOD_GET);
	}

    public function postsImportAction()
    {
    	$arrData = $this->callTestApiSource();
    	$arrResponse = array();
    	foreach ($arrData as $key => $arrPost) {
    		$this->objApiRequest->setParameters($arrPost);
    		$this->objApiRequest->setUri(self::URI_RESQUEST);
    		$arrResponse[] = $this->objApiRequest->request();
		   	//$this->callTestApi($arrPost, 'posts');
    	}
    	return array('status'=>true, 'arrResponse' => $arrResponse);
    }

    /**
     * Call test api to save data in specific route
     * @param  array|string $data data to save or select
     * @param  string $route route to save data
     * @return [type]        [description]
     */
    /*
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
	*/
    /**
     * Return data to import users
     */
    /*
    private function callTestApiSource()
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://test-api-source.local/posts",
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
    */
}
