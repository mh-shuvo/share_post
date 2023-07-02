<?php
Handler::setPageTitle("Add New Post");
Handler::include('inc.header');
?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Publish your post</h2>
                <p>Please fill out this form to publish your post</p>
                <form action="<?php echo URLROOT;?>/posts/create" method="POST">
                    <div class="form-group mb-2">
                        <label for="title">Title: <sup>*</sup></label>
                        <input type="text" name="title" id="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid':'';?>" value="<?php echo $data['title'];?>">
                        <span class="invalid-feedback"><?php echo $data['title_err'];?></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="body">Body: <sup>*</sup></label>
                        <textarea name="body" id="body" class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid':'';?>" value="<?php echo $data['body'];?>"></textarea>
                        <span class="invalid-feedback"><?php echo $data['body_err'];?></span>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-grid">
                            <input type="submit" value="Post" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
Handler::include('inc.footer');
