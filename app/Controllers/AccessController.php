<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AccessController extends BaseController
{
    public function index()
    {
        return view('no_access');
    }
}
