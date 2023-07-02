<?php
Handler::setPageTitle("About ".SITENAME);
Handler::include("inc.header");?>
<h1><?php echo $data['title'];?></h1>
<p><?php echo $data['description'];?></p>
<p>Version:<span class="fw-bold"><?php echo APPVERSION;?></span></p>
        
<?php Handler::include("inc.footer");?>
