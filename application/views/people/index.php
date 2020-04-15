<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data people <strong>success</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
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
        <div class="ml-5">
            <a href="<?= base_url('people/add'); ?>" class="btn btn-primary">Add people</a>
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
                                    <a href="<?= base_url('people/detail/' . $ppl['id']); ?>" class="badge badge-success">detail</a>
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