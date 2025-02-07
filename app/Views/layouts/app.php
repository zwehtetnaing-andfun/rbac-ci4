<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CI 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container-fluid text-white">
        <div class="row">
            <div class="col-md-3 p-5">
                <ul class="list-style-none list-group m-0 p-0">
                    <li class="list-group-item mb-2"><a href="/posts" class="nav-link text-lg-center">Posts</a></li>
                    <li class="list-group-item mb-2"><a href="#" class="nav-link text-lg-center">Users</a></li>
                    <li class="list-group-item mb-2"><a href="#" class="nav-link text-lg-center">Roles</a></li>
                    <li class="list-group-item mb-2"><a href="/logout" class="nav-link text-lg-center">Logout</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <?= $this->renderSection('content') ?> <!-- Dynamic content section -->
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
