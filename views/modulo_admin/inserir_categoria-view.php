<section class="content">
    <div class="container-fluid">

        <?php

            $action = "";

            // Check if the action was informed
            if ( isset($_GET['action']) && strcmp($_GET['action'], "edit") == 0 )
            {
                // Check if the category ID was informed
                if ( isset($_GET['categoryID']) && strcmp($_GET['categoryID'], "") != 0 )
                {
                    // Define the action
                    $action = $_GET['action'];

                    // Get the category ID
                    $category_id = encrypt_decrypt('decrypt', $_GET['categoryID']);

                    // Load category information
                    $category_info = $modelo->get_category_info($category_id);
                    $category_info = $category_info[0];
                }
                else
                {
                    // Define the action
                    $action = "insert";
                }
            }
            else
            {
                // Define the action
                $action = "insert";
            }

            // Load insert/edit method
            $modelo->insert_edit_category($action);
        ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php
                                if ( isset($action) && strcmp($action, "edit") == 0 )
                                {
                                    echo "EDITAR CATEGORIA";
                                }
                                else
                                {
                                    echo "CADASTRAR CATEGORIA";
                                }
                            ?>
                        </h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="#">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="NOME" value="<?php
                                            if ( isset($category_info["NOME"]) && strcmp($category_info["NOME"], "") != 0 )
                                            {
                                                echo $category_info["NOME"];
                                            }
                                        ?>"
                                    required autofocus>
                                    <label class="form-label">Nome da categoria</label>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">
                                <?php
                                    if ( isset($action) && strcmp($action, "edit") == 0 )
                                    {
                                        echo "EDITAR!";
                                    }
                                    else
                                    {
                                        echo "CADASTRAR!";
                                    }
                                ?>
                            </button>

                            <input type="hidden" name="ID_CATEGORIA" value="<?php
                                if ( isset($category_info["ID_CATEGORIA"]) && strcmp($category_info["ID_CATEGORIA"], "") != 0 )
                                {
                                    echo $category_info["ID_CATEGORIA"];
                                }
                            ?>" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>