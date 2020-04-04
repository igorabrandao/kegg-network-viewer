<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-heartbeat animation-pulse"></i>Help science initiatives spread out!<br>
                <strong><small>Your contribution will be greatly appreciated and help me continue to develop this awesome 
                    tool crafted with love</small></strong><br>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Home page</li>
        <li><a href="">Help</a></li>
    </ul>
    <!-- END Blank Header -->

    <div class="row">
        <!-- First Column -->
        <div class="col-md-12 col-lg-12">
            <!-- Block -->
            <div class="block">
                <!-- Example Title -->
                <div class="block-title"></div>
                <!-- END Example Title -->

                <!-- Example Content -->
                <p id="markdown-contents"></p>
                <!-- END Example Content -->
            </div>
            <!-- END Block -->
        </div>
        <!-- END First Column -->
    </div>
    <!-- END Row -->
</div>
<!-- END Page Content -->

<!-- Load and execute javascript code used only in this page -->
<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>

<script type="text/javascript">
    var directory = "<?php echo HOME_URI;?>";
    var filename  = "README.md";
    var path      = directory + "/" + filename;

    var md2html = function (path) {
        // Load contents and convert to HTML
        $("#markdown-contents").load(path, function(text, status){
            var sdconv     = new showdown.Converter();
            this.innerHTML = sdconv.makeHtml(text);
        });
    }
    md2html(path);
</script>