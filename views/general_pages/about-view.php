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

    <div class="row">
        <!-- First Column -->
        <div class="col-md-8 col-lg-8">
            <!-- Block -->
            <div class="block">
                <!-- Example Title -->
                <div class="block-title">
                    <h2><strong>What's new about this?</strong></h2>
                </div>
                <!-- END Example Title -->

                <!-- Example Content -->
                <p style="font-size: 15px;"><?php echo $template["full_description"]; ?></p>
                <!-- END Example Content -->
            </div>
            <!-- END Block -->
        </div>
        <!-- END First Column -->

        <!-- Second Column -->
        <div class="col-md-4 col-lg-4">
            <!-- Info Block -->
            <div class="block">
                <!-- Info Title -->
                <div class="block-title">
                    <h2>About <strong><? echo $template["author"]; ?></strong> <small>&bull; <i class="fa fa-file-text text-primary"></i> 
                    <a href="<?php echo HOME_URI;?>/resources/attach/CV_Igor_Brandao.pdf" data-toggle="tooltip" title="Click here to download th CV" download>Download CV in PDF</a></small></h2>
                </div>
                <!-- END Info Title -->

                <!-- Info Content -->
                <table class="table table-borderless table-striped">
                    <tbody>
                        <tr>
                            <td style="width: 25%;"><strong>Bio</strong></td>
                            <td> Msc. student in Bioinformatics at Federal University of Rio Grande do Norte (UFRN) / Biome (2019) and develops 
                                research in the field of Systems Biology. Has specialization in Information Technology Applied to the Legal Area 
                                by UFRN/Court of Justice of Rio Grande do Norte (TJRN), bachelor degree in Information Technology at UFRN (2018), 
                                Analysis and Systems Development at Fatec Carapicuíba - Technology College (2012) and bachelor degree in 
                                Business Administration at Mackenzie Presbyterian University (2013).</td>
                        </tr>
                        <tr>
                            <td><strong>Affiliation</strong></td>
                            <td><a style="color: #173F5F;" href="https://www.ufrn.br/" target="_blank"><strong>Federal University of Rio Grande do Norte (UFRN)</strong></a></td>
                        </tr>
                        <tr>
                            <td><strong>Department</strong></td>
                            <td><a style="color: #173F5F;" href="https://bioinfo.imd.ufrn.br/" target="_blank"><strong>Bioinformatics Multidisciplinary Environment (BIOME)</strong></a></td>
                        </tr>
                        <tr>
                            <td><strong>Advisor</strong></td>
                            <td><a style="color: #173F5F;" href="https://dalmolingroup.imd.ufrn.br/" target="_blank"><strong>Rodrigo Juliani Siqueira Dalmolin</strong></a></td>
                        </tr>
                        
                        <tr>
                            <td><strong>Skills used in this project</strong></td>
                            <td>
                                <a class="label label-info" title="R">R</a>
                                <a class="label label-warning" title="HTML">HTML</a>
                                <a class="label label-success" title="CSS">CSS</a>
                                <a class="label label-danger" title="Javascript">Javascript</a>
                                <a class="label label-primary" title="Javascript">MySql</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Info Content -->
            </div>
            <!-- END Info Block -->
        </div>
        <!-- END Second Column -->
    </div>
    <!-- END Row -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>