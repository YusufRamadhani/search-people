<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Edit data people</h5>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <label class="card-title">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="<?= $people['name']; ?>">
                        <label class="card-title">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="<?= $people['email']; ?>">
                        <label class="card-title">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="<?= $people['address']; ?>">
                        <button type="submit" class="btn btn-primary mt-3 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>