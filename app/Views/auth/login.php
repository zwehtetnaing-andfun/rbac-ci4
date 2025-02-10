<?= $this->extend('layouts/guest') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="d-flex justify-content-center align-items-center text-white mt-5 mb-3">
                <h1>Login</h1>
            </div>
            <div class="card px-3 pt-2 bg-white">
                <div class="card-body">
                    <form action="/login/authenticate" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-group mb-4">
                            <label for="email" class="mb-2">Email</label>
                            <input type="text" name="email" id="email" class="form-control rounded-0 ">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="mb-2">Password</label>
                            <input type="password" name="password" id="password" class="form-control rounded-0 ">
                        </div>
                        <div class="float-end">
                            <button type="reset" class="btn btn-secondary btn-sm me-2">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="text-muted">Don't have an account? <a href="/register">register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>