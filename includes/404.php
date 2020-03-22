<?php include ABSPATH . '/views/_includes/template_config.php';?>
<?php include ABSPATH . '/views/_includes/template_start.php'; ?>

<!-- Error Container -->
<div id="error-container">
    <div class="error-options">
        <h3><i class="fa fa-chevron-circle-left text-muted"></i> <a href="<?php echo HOME_URI; ?>">Go Back</a></h3>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text-center">
            <h1><i class="fa fa-exclamation-triangle text-info animation-pulse"></i> 400</h1>
            <h2 class="h3">Oops, the page you are looking seems to not exists...</h2>
        </div>
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <form action="page_ready_search_results.php" method="post">
                <input type="text" id="search-term" name="search-term" class="form-control input-lg" placeholder="Search in entire website...">
            </form>
        </div>
    </div>
</div>
<!-- END Error Container -->

<?php include ABSPATH . '/views/_includes/template_end.php'; ?>