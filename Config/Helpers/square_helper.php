<?php


require(APPPATH ."ThirdParty\Square\SquareClient.php");



use Square\SquareClient;
use Square\LocationsApi;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Environment;
	function get_customerId($id)
	{





$client = new SquareClient([
    'accessToken' => 'EAAAEAVAMgr3EpJYGf4mNL9zFcai0Tc8fOBCGwCyXRJRJ4v-tIARBM8amqygKCSU',
    'environment' => Environment::SANDBOX,
]);

try {
    $locationsApi = $client->getLocationsApi();
    $apiResponse = $locationsApi->listLocations();

    if ($apiResponse->isSuccess()) {
        $listLocationsResponse = $apiResponse->getResult();
        $locationsList = $listLocationsResponse->getLocations();
        foreach ($locationsList as $location) {
        print_r($location);
        }
    } else {
        print_r($apiResponse->getErrors());
    }
} catch (ApiException $e) {
    print_r("Recieved error while calling Square: " . $e->getMessage());
} 








		$body = \ThirdParty\squareapi\Models::CreateCustomerRequest();
		$body->setEmailAddress('$id');

		$api_response = $client->getCustomersApi()->createCustomer($body);

		if ($api_response->isSuccess()) {
		    $result = $api_response->getResult();
		    return $result;
		} else {
		    $errors = $api_response->getErrors();
		    return $errors;
		}
	}

?>