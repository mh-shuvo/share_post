<?php
Handler::setPageTitle($data->title);
Handler::include("inc.header");
?>
<div class="mt-5 mb-5"></div>
<div class="row">
    <div class="col-12">
        <h2><?php echo $data->title; ?></h2>
        <small> <i class="fa fa-user"></i>  <?= $data->name; ?>  </small>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <small> <i class="fa fa-calendar"></i> <?= date('d-m-Y H-i-s A',strtotime($data->created_at)); ?>  </small>
    </div>
    <div class="mb-5"></div>
    <div class="col-12">
        <?= $data->body; ?>
    </div>


</div>

<?php Handler::include("inc.footer");?>
