<?php Handler::include("inc.header");?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php echo session()->flash('register_success');?>
                <h2>Login</h2>
                <p>Please fill in your credentials to log in</p>
                <form action="<?php echo URLROOT;?>/users/login" method="POST">
                    <div class="form-group mb-2">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" id="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid':'';?>" value="<?php echo $data['email'];?>">
                        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" id="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid':'';?>" value="<?php echo $data['password'];?>">
                        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-grid">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                        <div class="col d-grid">
                            <a href="<?php echo URLROOT;?>/users/register" class="btn btn-light btn-block">No account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>       
<?php Handler::include("inc.footer");?>
