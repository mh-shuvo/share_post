<?php
Handler::setPageTitle();
Handler::include("inc.header");
?>
<div class="p-5 mt-2 mb-4 bg-body-secondary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><?php echo $data['title'];?></h1>
        <p class="col-md-8 fs-4"><?php echo $data['description'];?></p>
      </div>
</div>
<div class="mt-2 mb-4 container-fluid">
    <div class="row">
        <?php foreach ($data['posts'] as $post){ ?>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <div class="float-start">
                            <h4>
                                <a class="text-decoration-none text-dark" href="<?php echo URLROOT.'/posts/single/'.$post->id?>"><?php echo $post->title;?></a>
                            </h4>
                        </div>
                        <div class="float-end">
                            <small> <i class="fa fa-user"></i>  <?= $post->name; ?>  </small>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <small> <i class="fa fa-calendar"></i> <?= date('d-m-Y H-i-s A',strtotime($post->created_at)); ?>  </small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo strlen($post->body) <= 150 ? $post->body : substr($post->body,0,150).'.....';?>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

        
<?php Handler::include("inc.footer");?>
