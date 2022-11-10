<?php 
namespace App\Controllers;  
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

    public function loginAuth()
    {
        echo view('welcome_message');
    }
}