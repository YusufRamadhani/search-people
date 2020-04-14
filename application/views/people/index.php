<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="<?= base_url('people'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Search name or email">
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $this->uri->segment(3); ?>
                        <?php foreach ($people as $ppl) : ?>
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $ppl['name']; ?></td>
                                <td><?= $ppl['email']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success">detail</a>
                                    <a href="" class="badge badge-warning">edit</a>
                                    <a href="" class="badge badge-danger">delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>