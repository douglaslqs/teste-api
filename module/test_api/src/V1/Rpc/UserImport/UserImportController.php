<?php
namespace test_api\V1\Rpc\UserImport;

use Zend\Mvc\Controller\AbstractActionController;
use test_api\Service\ApiRequestService;

class UserImportController extends AbstractActionController
{
	private $objApiRequest;

	public function __construct(ApiRequestService $apiRequestService)
	{
		$this->objApiRequest = $apiRequestService;
	}

    public function userImportAction()
    {
    	$this->objApiRequest->setUri(ApiRequestService::URI_API_SOURCE.'users');
		$arrData = $this->objApiRequest->request();
		$arrResponse = array();
		$arrResponseError = array();
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
	    	try {
				$this->objApiRequest->setMethod(ApiRequestService::METHOD_POST);

		    	$this->objApiRequest->setUri(ApiRequestService::URI_API.'users');
		    	$this->objApiRequest->setParameters($arrUser);
		    	$arrResponse[] = $this->objApiRequest->request();

		    	$this->objApiRequest->setUri(ApiRequestService::URI_API.'address');
	    		$this->objApiRequest->setParameters($arrAddress);
				$arrResponse[] = $this->objApiRequest->request();

		    	$this->objApiRequest->setUri(ApiRequestService::URI_API.'company');
	    		$this->objApiRequest->setParameters($arrCompany);
		    	$arrResponse[] = $this->objApiRequest->request();
	    	} catch (Exception $e) {
	    		$arrResponseError[] = $e->getMessage();
	    	}
    	}
    	return array('status'=>true, 'responseError' => $arrResponseError, 'response' => $arrResponse);
    }
}
