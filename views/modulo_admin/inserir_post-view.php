<section class="content">
    <div class="container-fluid">

        <?php

            $action = "";

            // Check if the action was informed
            if ( isset($_GET['action']) && strcmp($_GET['action'], "edit") == 0 )
            {
                // Check if the category ID was informed
                if ( isset($_GET['postID']) && strcmp($_GET['postID'], "") != 0 )
                {
                    // Define the action
                    $action = $_GET['action'];

                    // Get the category ID
                    $post_id = encrypt_decrypt('decrypt', $_GET['postID']);

                    // Load category information
                    $post_info = $modelo->get_posts_info($post_id);
                    $post_info = $post_info[0];
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
            $modelo->insert_edit_post($action);
        ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php
                                if ( isset($action) && strcmp($action, "edit") == 0 )
                                {
                                    echo "EDITAR POST";

                                    if ( isset($post_info["TITULO"]) && strcmp($post_info["TITULO"], "") != 0 )
                                    {
                                        echo " [" . $post_info["TITULO"] . "]";
                                    }
                                }
                                else
                                {
                                    echo "CADASTRAR POST";
                                }
                            ?>
                        </h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="#" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Informações para identificação do post
                                                <small>Categoria do post, título e subtítulo</small>
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select name="ID_CATEGORIA" class="form-control show-tick" data-live-search="true" required>
                                                       <option value="">-- Selecione a categoria do post --</option>
                                                            <?php
                                                                // Categories list
                                                                $lista = $modelo_categoria->get_categories_list();

                                                                foreach ( $lista as $value )
                                                                {
                                                                    if ( $post_info["ID_CATEGORIA"] == $value["ID_CATEGORIA"] )
                                                                        echo "<option value='" . $value["ID_CATEGORIA"] . "' selected>" . $value["NOME"] . "</option>";
                                                                    else
                                                                        echo "<option value='" . $value["ID_CATEGORIA"] . "'>" . $value["NOME"] . "</option>";
                                                                }
                                                            ?>
                                                    </select>
                                                    <label class="form-label">Categoria do post</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="TITULO" value="<?php
                                                            if ( isset($post_info["TITULO"]) && strcmp($post_info["TITULO"], "") != 0 )
                                                            {
                                                                echo $post_info["TITULO"];
                                                            }
                                                        ?>"
                                                    required autofocus maxlength="100">
                                                    <label class="form-label">Título do post</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="SUBTITULO" value="<?php
                                                            if ( isset($post_info["SUBTITULO"]) && strcmp($post_info["SUBTITULO"], "") != 0 )
                                                            {
                                                                echo $post_info["SUBTITULO"];
                                                            }
                                                        ?>"
                                                    maxlength="100">
                                                    <label class="form-label">Subtítulo do post</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CKEditor -->
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Texto
                                                <small>Utilize o editor abaixo para escrever o texto da publicação. A forma como o conteúdo é formatado no editor será apresentado nas postagens.</small>
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <textarea id="ckeditor" name="TEXTO">
                                            <?php
                                                if ( isset($post_info["TEXTO"]) && strcmp($post_info["TEXTO"], "") != 0 )
                                                {
                                                    echo $post_info["TEXTO"];
                                                }
                                            ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Imagem do post
                                                <small>Utilize a opção abaixo para realizar a imagem da capa do post.</small>
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <input type="file" class="file-input" id="file_anexo[]" name="file_anexo[]">
                                        </div>
                                    </div>
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

                            <input type="hidden" name="ID_POST" value="<?php
                                if ( isset($post_info["ID_POST"]) && strcmp($post_info["ID_POST"], "") != 0 )
                                {
                                    echo $post_info["ID_POST"];
                                }
                            ?>" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>