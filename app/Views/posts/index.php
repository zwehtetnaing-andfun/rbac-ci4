<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-md-12 my-5 d-flex justify-content-between align-items-center">
            <div class="">
                <h2>Posts</h2>
            </div>
            <div class=""><a href="/posts/create" class="btn btn-primary">Create</a></div>
        </div>
        <?php foreach($posts as $post): ?>
            <div class="col-md-8 mx-auto card mb-2">
                <div class="card-header">
                    <h5><?= $post['title']; ?></h5>
                </div>
                <div class="card-body">
                    <p class="text-muted"><?= $post['content']; ?></p>
                </div>
                <div class="card-footer d-flex justify-content-end gap-2">
                    <a href="<?= "/posts/edit/{$post['id']}" ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="<?= "/posts/delete/{$post['id']}" ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?= $this->endSection() ?>