<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Permissions;
use App\Models\PermissionModel;
use CodeIgniter\HTTP\ResponseInterface;

class RoleController extends BaseController
{
    public function index()
    {
        $permissions = (new PermissionModel())->findAll();
        return view('roles/index',[
            "permissions" => $permissions
        ]);
    }
}
