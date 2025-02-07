<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username','email','password','password-reset-token'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUserRoles($userId)
    {
        return $this->db->table('user_roles')
                        ->where('user_id', $userId)
                        ->join('roles', 'roles.id = user_roles.role_id')
                        ->get()
                        ->getResultArray();
    }

    public function hasPermission($userId, $permissionName)
    {

        $roleModel = new RoleModel();
      
        $userRoles = $this->getUserRoles($userId);
        
        foreach ($userRoles as $role) {
            $permissions = $roleModel->getRolePermissions($role['id']);
            
            foreach ($permissions as $permission) {
                if ($permission['name'] === $permissionName) {
                    return true;
                }
            }
        }
        return false;
    }

}
