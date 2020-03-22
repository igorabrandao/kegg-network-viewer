<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-circle_info"></i>About <?php echo $template["title"]; ?><br>
                <strong><small><?php echo $template["headline"]; ?></small></strong><br>
                <small><?php echo $template["version"]; ?></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Home page</li>
        <li><a href="">About</a></li>
    </ul>
    <!-- END Blank Header -->

    <!-- Block -->
    <div class="block">
        <!-- Example Title -->
        <div class="block-title">
            <h2>What's new about this?</h2>
        </div>
        <!-- END Example Title -->

        <!-- Example Content -->
        <p style="font-size: 15px;"><?php echo $template["full_description"]; ?></p>
        <!-- END Example Content -->
    </div>
    <!-- END Block -->

    <!-- Block -->
    <div class="block">
        <!-- Example Title -->
        <div class="block-title">
            <h2>Contributors</h2>
        </div>
        <!-- END Example Title -->

        <!-- Example Content -->
        <p>
            <li style="font-size: 15px;" data-line-start="10" data-line-end="11">Igor Brandão ( 
                <a href="mailto:igorabrandao@gmail.com">igorabrandao@gmail.com</a> )
            </li>
        </p>
        <!-- END Example Content -->
    </div>
    <!-- END Block -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>