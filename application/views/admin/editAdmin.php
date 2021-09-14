<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="fas fa-user-edit"></div> Edit Admin
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/edit/' . $dt['id_admin']) ?>" method="post">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" value="<?php echo $u->nama ?>" class="form-control" required="" name="nama" id="nama">
                                <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="<?php echo $dt['email'] ?>" class="form-control" required="" name="email" id="email">
                                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" required="" name="password" id="password">
                                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</main>