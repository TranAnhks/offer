<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\User\UserRegisterRequest;
use App\Http\Controllers\Api\V1\User\IssueTokenTrait;

class RegisterController extends Controller
{
    use IssueTokenTrait;
    
    private $client;
    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function register(Request $request)
    {
        $user = User::create([
    		'name' => request('name'),
    		'account' => request('account'),
            'password' => bcrypt(request('password')),
            'status' => request('status')
    	]);

        return $this->issueToken($request, 'password');

    }
}
