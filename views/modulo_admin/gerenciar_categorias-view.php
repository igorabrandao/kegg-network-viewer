<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            GERENCIAR CATEGORIAS
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo HOME_URI . '/modulo_admin/inserir_categoria' ?>" title="(+) Adicionar nova categoria">(+) Adicionar nova categoria</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <tr>
                                        <th style="white-space: nowrap; text-align: center; width: 15%" title="AÇÕES">AÇÕES</th>
                                        <th style="white-space: nowrap; text-align: center; width: 50%" title="CATEGORIA">CATEGORIA</th>
                                        <th style="white-space: nowrap; text-align: center; width: 10%" title="STATUS">STATUS</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="white-space: nowrap; text-align: center; width: 15%" title="AÇÕES">AÇÕES</th>
                                    <th style="white-space: nowrap; text-align: center; width: 50%" title="CATEGORIA">CATEGORIA</th>
                                    <th style="white-space: nowrap; text-align: center; width: 10%" title="STATUS">STATUS</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                    // Get the entire categorie list
                                    $data_value = $modelo->get_categories_list();

                                    // Run through categorie list
                                    foreach ( $data_value as $value )
                                    {
                                        // Check if the register exists
                                        if ( isset($value["ID_CATEGORIA"]) && strcmp($value["ID_CATEGORIA"], "") != 0 )
                                        {
                                            // Initialize auxiliar variables
                                            $is_active = "";

                                            // Init row
                                            echo "<tr>";

                                            $categorie_name = mb_strtoupper($value["NOME"], 'UTF-8');
                                            $edit_url = HOME_URI . '/modulo_admin/inserir_categoria?action=edit&categoryID=' . encrypt_decrypt('encrypt', $value["ID_CATEGORIA"]);

                                            // Action buttons
                                            echo "<td style='text-align: center;'>

                                                <button type='button' class='btn bg-warning waves-effect' title='Editar [" . $categorie_name . "]' onClick='location.href = \"$edit_url\";'>
                                                    <i class='material-icons'>create</i>
                                                </button>
                                                <button type='button' class='btn bg-danger waves-effect' title='Remover [" . $categorie_name . "]' onClick='deletecategory(" . $value["ID_CATEGORIA"] . ");'>
                                                    <i class='material-icons'>clear</i>
                                                </button>

                                            </td>";

                                            // Categorie name
                                            echo "<td style='text-align: center;' title='" . $categorie_name . "'>" . $categorie_name . "</td>";

                                            // Is active
                                            if ( strcmp($value["DATA_FECHA"], "") == 0 )
                                            {
                                                $is_active = "ATIVA";
                                            }
                                            else
                                            {
                                                $is_active = "INATIVA";
                                            }

                                            echo "<td style='text-align: center;' title='" . $is_active . "'>" . $is_active . "</td>";

                                            // End content row
                                            echo "</tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>

                        <input type="hidden" id="elem_DUMMY" value=""/>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            /** Function to delete the category
             * @param category_ID_ => category identification
            */
            function deletecategory( category_ID_ )
            {
                if ( confirm("Realmente deseja excluir a categoria?") == true )
                {
                    // Callback to delete the element
                    sendRequest( '<?php echo HOME_URI;?>/modulo_admin/gerenciar_categorias', 'action=delete&type=categorie&categorie_ID=' + category_ID_, 'POST', 
                        '///', document.getElementById('elem_DUMMY'), 'delete' );

                    // Realod the page withou parameters
                    window.location = window.location.href.split("?")[0];
                }
                else
                {
                    return false;
                }
            }

        </script>

    </div>
</section>