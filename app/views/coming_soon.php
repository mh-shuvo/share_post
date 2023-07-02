<?php
Handler::setPageTitle("Coming Soon");
Handler::include("inc.header");?>
<div class="p-5 mt-2 mb-4 bg-body-secondary rounded-3" id="coming_soon">
    <h2>We're working hard to improve our website, and we'll ready to launch after</h2>
    <div class="countdown d-flex justify-content-center" data-count="2023/12/3">
        <div>
            <h3>%d</h3>
            <h4>Days</h4>
        </div>
        <div>
            <h3>%h</h3>
            <h4>Hours</h4>
        </div>
        <div>
            <h3>%m</h3>
            <h4>Minutes</h4>
        </div>
        <div>
            <h3>%s</h3>
            <h4>Seconds</h4>
        </div>
    </div>
</div>

<?php Handler::include("inc.footer");?>
