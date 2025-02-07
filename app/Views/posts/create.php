<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-md-8 card mx-auto my-5">
            <div class="card-header">
                <h5>Create post</h5>
            </div>
            <div class="card-body">
                <form action="/posts/store" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input type="input" name="title" class="form-control form-control-sm" >
                    </div>

                    <div class="form-group mb-2">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control form-control-sm" cols="45" rows="4"></textarea>
                    </div>

                    <div class="float-end">
                        <a href="/posts" class="btn btn-secondary">cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>