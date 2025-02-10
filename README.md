# Role-Based Access Control (RBAC) in CodeIgniter 4 
_RBAC is used to control access to actions based on a user's roles and permissions. In CodeIgniter 4, we can implement RBAC by checking user roles and permissions in controllers or using filters. Below is a simple, effective guide on setting up RBAC in CodeIgniter 4._

## 1. Models:
****Role Model (RoleModel)****
The RoleModel handles the retrieval of permissions associated with a role.

```php
public function getRolePermissions($roleId)
{
    return $this->db->table('role_permissions')
                    ->where('role_id', $roleId)
                    ->join('permissions', 'permissions.id = role_permissions.permission_id')
                    ->get()
                    ->getResultArray();
}
```

- Purpose: Fetch permissions assigned to a specific role. 

****User Model (UserModel)****
The UserModel handles fetching user information and checking user permissions.

```php
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
                return true;  // User has the permission
            }
        }
    }
    return false;  // User doesn't have the permission
}
```

***Purpose:***
- ********getUserByEmail:********  Retrieve a user by email.
- ********getUserRoles:******** Fetch roles assigned to a user.
- ********hasPermission:******** Check if a user has a specific permission by checking the permissions associated with the user's roles.

____

## 2. Using RBAC in Controllers:
_You can check permissions in controllers before allowing a user to perform actions._

Controller Example:

```php
$userModel = new UserModel();

if (!$userModel->hasPermission(session()->get('user_id'), 'create')) {
    // User doesn't have permission to create
    return redirect()->to('/no-access');  // Redirect to no-access page
}

// Logic for creating post
```

- ****Purpose:****
In the controller, check if the user has a specific permission (e.g., create).
Redirect to an appropriate page if the user lacks the permission.

___


## 3. Using RBAC with Filters:
_Filters in CodeIgniter 4 allow you to check permissions before entering a controller method, providing a cleaner approach to handle access control._


Filter Example (CreateAccess Filter):

```php
public function before(RequestInterface $request, $arguments = null)
{
    $userModel = new UserModel();
    
    if (!$userModel->hasPermission(session()->get('user_id'), 'create')) {
        // User doesn't have permission to create
        return redirect()->to('/no-access');  // Redirect to no-access page
    }
}
```

- ****Purpose:****
Use filters to check if a user has the required permission (e.g., create) before accessing a route or controller method.

****Initializing Filters:****
In the `app/Config/Filters.php` file, initialize your filters:

```php
public array $filters = [
    'create_access' => CreateAccess::class,
    'edit_access'   => EditAccess::class,
    'delete_access' => DeleteAccess::class
];
```

- ****Purpose:**** Associate filters with specific routes to enforce access control based on permissions.
- 
_____

## 4. Defining Routes with Filters:
_In your `app/Config/Routes.php`, you can attach filters to specific routes to control access._

Routes with Filters Example:

```php
$routes->get('/posts', 'PostController::index');
$routes->get('/posts/create', 'PostController::create', ['filter' => 'create_access']);
$routes->post('/posts/store', 'PostController::store');
$routes->get('/posts/edit/(:num)', 'PostController::edit/$1', ['filter' => 'edit_access']);
$routes->get('/posts/delete/(:num)', 'PostController::delete/$1', ['filter' => 'delete_access']);
``` 

- ****Purpose:****
Attach filters like `create_access`, `edit_access`, and `delete_access` to specific routes.
The filter will check if the user has permission before allowing access to that route.

