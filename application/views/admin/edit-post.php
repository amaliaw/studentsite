<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="fas fa-edit"></div> Edit Post "<?php echo $dt['title'] ?>"
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/posts/edit/' . $dt['id_post']) ?>" enctype='multipart/form-data' method="post">
                            <div class="form-group">
                                <label for="name">Judul</label>
                                <input type="text" class="form-control" value="<?php echo $dt['title'] ?>" name="title" id="title" required="" placeholder="Masukkan Judul">
                                <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Gambar</label>
                                <input type="file" class="form-control" name="image" id="title" required="">
                            </div>
                            <div class="form-group">
                                <label for="nip">Kategori</label>
                                <select name="category" id="" required="" class="form-control">
                                    <option value="<?php echo $dt['category'] ?>"><?php echo $dt['category'] ?></option>
                                    <option value="Berita">Berita</option>
                                    <option value="Pengumuman">Pengumuman</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Deskripsi</label>
                                <textarea name="body" id="editor1" class="form-control" cols="30" rows="10"><?php echo $dt['body'] ?></textarea>
                                <?php echo form_error('body', '<small class="text-danger">', '</small>'); ?>
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
    </div>
</main>