<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
    public $shipping_cost=23.99;
    public $square_env="PRODUCTION";
    public $squareup=[
        "SANDBOX"=>["applicationId"=>"sandbox-sq0idb-szD2q4ElWWOppi4yriAthA","accessToken"=>"EAAAELlROj7Dddy5fZfOnvfx3YM0ydhETbW2btGbRvcno-GgpkUEhw7Sqwd5Jw5m","locationId"=>"LC7H6D9QNN3GG"],
        "PRODUCTION"=>["applicationId"=>"sq0idp-gkB4BM9i9r5qtNJDOblq-A","accessToken"=>"EAAAENWwW2r1Dh6o7lsUL4VjAnjFuoJDH3xQRD8u-zr2iS7KLyB8oKN1BiyrSVgp","locationId"=>"N9NM2P7XDQEWR"],
    ];
    public $admin_url="admin/";
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}
	public function uploadFile($file_name,$path="uploads/"){
        $file_url="";
        if(!empty($_FILES[$file_name])){
            $new_name=time()."_".basename($_FILES[$file_name]['name']);
            $image=$path.$new_name;
            if(move_uploaded_file($_FILES[$file_name]['tmp_name'],$image)){
                $file_url=$new_name;
            }

        }
        return $file_url;
    }

}
