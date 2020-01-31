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
	}

    public function postsImportAction()
    {
    	$this->objApiRequest->setUri(ApiRequestService::URI_API_SOURCE.self::URI_RESQUEST);
    	$arrData = $this->objApiRequest->request();
    	$arrResponse = array();
		$arrResponseError = array();
    	foreach ($arrData as $key => $arrPost) {
    		try {
	    		$this->objApiRequest->setUri(ApiRequestService::URI_API.self::URI_RESQUEST);
	    		$this->objApiRequest->setMethod(ApiRequestService::METHOD_POST);
	    		$this->objApiRequest->setParameters($arrPost);
	    		$arrResponse[] = $this->objApiRequest->request();
    		} catch (Exception $e) {
    			$arrResponseError[] = $e->getMessage();
    		}
    	}
    	return array('status'=>true, 'responseError' => $arrResponseError, 'arrResponse' => $arrResponse);
    }
}
