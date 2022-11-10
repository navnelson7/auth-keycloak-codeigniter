<?php 
namespace App\Controllers;  
use Ataccama\Adapters\Keycloak;
use Ataccama\Utils\KeycloakAPI;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\Authkeycloak;
use Ataccama\Auth\Auth;

class SigninController extends Controller
{

    public function index()
    {
        helper(['form']);
        echo view('signin');
    } 

    public function loginAuth(){
        $parameters = array(
            "host"=>"http://localhost:8080/",
            "realmId"=>"diaspora",
            "clientId"=>"diaspora-sv",
        );
        $keycloak = new Keycloak($parameters);
        $myauth = new Authkeycloak($keycloak);
        $loginUrl = $myauth->getLoginUrl();
        $myauth->authorize($_GET['code']);
        echo view('welcome_message');
    }
}