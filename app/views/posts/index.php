<?php
Handler::setPageTitle("All Posts");
Handler::include("inc.header");?>
<div class="mt-5 mb-5"></div>
<div class="row">
    <div class="col-md-8 col-sm-10">
        <h2>All posts</h2>
    </div>
    <div class="col-md-4 col-sm-2">
        <?php if(auth()->id()):?>
        <a href="<?php echo URLROOT;?>/posts/create" class="btn btn-success float-end">Add Post</a>
        <?php endif;?>
    </div>
    <div class="mb-5"></div>

    <?php
        foreach ($data as $item):
    ?>

    <div class="card mb-2">
        <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="float-start">
                            <a class="text-decoration-none text-dark fw-bold-800" href="<?php echo URLROOT;?>/posts/single/<?= $item->id ?>">
                                <?php echo $item->title;?>
                                <small style="font-size: 15px; color: brown">(<?php echo $item->name;?>)</small>
                            </a>
                        </h3>
                        <div class="float-end">
                            <?php if(auth()->id() && auth()->id() == $item->user_id):?>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <p>
                            <?php echo strlen($item->body) <= 150 ? $item->body : substr($item->body,0,150).'.....';?>
                        </p>
                    </div>
                </div>
        </div>
    </div>

    <?php
        endforeach;
    ?>

</div>

<?php Handler::include("inc.footer");?>
