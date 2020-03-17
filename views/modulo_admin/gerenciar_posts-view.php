<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            GERENCIAR POSTS
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo HOME_URI . '/modulo_admin/inserir_post' ?>" title="(+) Adicionar nova categoria">(+) Adicionar novo post</a></li>
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
                                        <th style="white-space: nowrap; text-align: center; width: 15%" title="FOTO">FOTO</th>
                                        <th style="white-space: nowrap; text-align: center; width: 15%" title="TÍTULO">TÍTULO</th>
                                        <th style="white-space: nowrap; text-align: center; width: 15%" title="SUBTÍTULO">SUBTÍTULO</th>
                                        <th style="white-space: nowrap; text-align: center; width: 15%" title="TIMESTAMP">TIMESTAMP</th>
                                        <th style="white-space: nowrap; text-align: center; width: 10%" title="CATEGORIA">CATEGORIA</th>
                                        <th style="white-space: nowrap; text-align: center; width: 5%" title="ATIVO">ATIVO</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="white-space: nowrap; text-align: center; width: 15%" title="AÇÕES">AÇÕES</th>
                                    <th style="white-space: nowrap; text-align: center; width: 15%" title="FOTO">FOTO</th>
                                    <th style="white-space: nowrap; text-align: center; width: 15%" title="TÍTULO">TÍTULO</th>
                                    <th style="white-space: nowrap; text-align: center; width: 15%" title="SUBTÍTULO">SUBTÍTULO</th>
                                    <th style="white-space: nowrap; text-align: center; width: 15%" title="TIMESTAMP">TIMESTAMP</th>
                                    <th style="white-space: nowrap; text-align: center; width: 10%" title="CATEGORIA">CATEGORIA</th>
                                    <th style="white-space: nowrap; text-align: center; width: 5%" title="ATIVO">ATIVO</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                    // Get the entire posts list
                                    $data_value = $modelo->get_posts_list();

                                    // Run through posts list
                                    foreach ( $data_value as $value )
                                    {
                                        // Check if the register exists
                                        if ( isset($value["ID_POST"]) && strcmp($value["ID_POST"], "") != 0 )
                                        {
                                            // Initialize auxiliar variables
                                            $is_active = "";

                                            // Init row
                                            echo "<tr>";

                                            // Edit url
                                            $edit_url = HOME_URI . '/modulo_admin/inserir_post?action=edit&postID=' . encrypt_decrypt('encrypt', $value["ID_POST"]);

                                            // View url
                                            $view_url = HOME_URI . '/home/visualizar_post?postID=' . encrypt_decrypt('encrypt', $value["ID_POST"]);

                                            // Action buttons
                                            echo "<td style='text-align: center;'>

                                                <button type='button' class='btn bg-info waves-effect' title='Visualizar [" . $value["TITULO"] . "]' onClick='location.href = \"$view_url\";'>
                                                    <i class='material-icons'>remove_red_eye</i>
                                                </button>
                                                <button type='button' class='btn bg-warning waves-effect' title='Editar [" . $value["TITULO"] . "]' onClick='location.href = \"$edit_url\";'>
                                                    <i class='material-icons'>create</i>
                                                </button>
                                                <button type='button' class='btn bg-danger waves-effect' title='Remover [" . $value["TITULO"] . "]' onClick='deletepost(" . $value["ID_POST"] . ");'>
                                                    <i class='material-icons'>clear</i>
                                                </button>

                                            </td>";

                                            // EMPLOYEE'S IMAGE
                                            if ( strcmp($value["FOTO"], "") != 0 )
                                            {
                                                echo "<td style='text-align: center;' title='" . $value["TITULO"] . "' >
                                                <img style='height: 75px;' alt='" . $value["TITULO"] . "' title='" . $value["TITULO"] . "' 
                                                src='" . HOME_URI . "/resources/posts/" . $value["ID_POST"] . "/" . file_basename($value["FOTO"]) . "." . file_ext($value["FOTO"]) . "' />
                                                </td>";
                                            }
                                            else
                                            {
                                                echo "<td style='text-align: center;' title='" . $value["TITULO"] . "' >
                                                <img style='height: 75px;' alt='" . $value["TITULO"] . "' title='" . $value["TITULO"] . "' 
                                                src='" . HOME_URI . "/assets/images/animation-bg.jpg' />
                                                </td>";
                                            }

                                            // Post title
                                            echo "<td style='text-align: center;' title='" . $value["TITULO"] . "'>" . $value["TITULO"] . "</td>";

                                            // Post subtitle
                                            echo "<td style='text-align: center;' title='" . $value["SUBTITULO"] . "'>" . $value["SUBTITULO"] . "</td>";

                                            // Post timestamp
                                            echo "<td style='text-align: center;' title='" . $value["TIMESTAMP"] . "'>" . $value["TIMESTAMP"] . "</td>";

                                            // Post category
                                            echo "<td style='text-align: center;' title='" . $value["CATEGORIA"] . "'>" . $value["CATEGORIA"] . "</td>";

                                            // Is active
                                            if ( strcmp($value["DATA_FECHA"], "") == 0 )
                                            {
                                                $is_active = "ATIVO";
                                            }
                                            else
                                            {
                                                $is_active = "INATIVO";
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
             * @param post_ID_ => category identification
            */
            function deletepost( post_ID_ )
            {
                if ( confirm("Realmente deseja excluir o post?") == true )
                {
                    // Callback to delete the element
                    sendRequest( '<?php echo HOME_URI;?>/modulo_admin/gerenciar_posts', 'action=delete&type=post&post_ID=' + post_ID_, 'POST', 
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