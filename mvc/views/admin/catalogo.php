<?php
session_start();
$username = $_SESSION['username'];
if ($username) {
    include("header_web_admin/header.php");
    include("../../models/crud_category.php");
    include("../../models/crud_products.php");
    include("../../models/crud_gallery.php");
    // Objetos necesarios para conectar con BD
    $obj_category_crud = new crud_category();
    $obj_products_crud = new crud_products();
    $obj_gallery_crud = new crud_gallery();
?>

    <div style="display: flex;flex-flow: column;align-items: start;" class="content">
        <div class="filter_container">
            <div>
                <label for="">Categoría:</label>
                <select id="combox_category" name="select_category" class="combox_category">
                    <option value="0">--seleccionar--</option>
                    <!-- LLamo a mis categorías de mi BD -->
                    <?php
                    $content_list = $obj_category_crud->select_category();
                    foreach ($content_list as $items_category) {
                    ?>
                        <option value="<?= $items_category['id_category'] ?>"><?= $items_category["name_category"] ?></option>
                    <?php
                    }
                    ?>
                    <!-------------- LLamo a mis categorías de mi BD ------------>
                </select>
            </div>
            <div id="container_subcategory">
                <label for="">Subcategoría:</label>
                <select id="combox_subcategory" name="select_subcategory" class="combox_subcategory">
                    <option value="0">--seleccionar--</option>
                    <!-- LLamo a mis subcategorías de mi BD -->

                    <!--------------- LLamo a mis subcategorías de mi BD ------------->
                </select>
            </div>
        </div>
        <div class="container_table">

            <!-- Inicio table -->
            <form action="new_item.php" method="POST" enctype="multipart/form-data">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID:</th>
                            <th>Estado:</th>
                            <th>Catagoría:</th>
                            <th>Subcatagoría:</th>
                            <th>Nombre:</th>
                            <th>Precio:</th>
                            <th>Colores:</th>
                            <th>Cantidad:</th>
                            <th>Precio Env:</th>
                            <th>Tallas Dis:</th>
                            <th>Imagen:</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <tbody id="filter_container_table">

                        <!-- Filtrado de mi tabla según el ID que llega mediante POST desde JS: cat-->
                        <?php
                        $list_prodcuts = $obj_products_crud->select_all_products();
                        foreach ($list_prodcuts as $items_products) {
                        ?>
                            <tr class="table_items">
                                <td><?= $items_products['id_product'] ?></td>
                                <td><?= $items_products['name_status'] ?></td>
                                <td><?= $items_products['name_category'] ?></td>
                                <td><?= $items_products['name_subcategory'] ?></td>
                                <td><?= $items_products['name_product'] ?></td>
                                <td><?= $items_products['price_product'] ?></td>
                                <td><?= $items_products['colours_product'] ?></td>
                                <td><?= $items_products['quantity_product'] ?></td>
                                <td><?= $items_products['price_send_product'] ?></td>
                                <td><?= $items_products['size_stock_product'] ?></td>
                                <td><img src="../../gallery/<?= $items_products['dir_name'] ?>/<?= $items_products['link_name_img'] ?>" alt="" width="100px"></td>
                                <td class="td_container_butons">
                                    <button type="submit" value="<?= $items_products['id_product'] ?>" name="id_product_from_table" class="button_lis_edit"><i class="fas fa-edit"></i> Editar</button>
                                    <!-- <a class="button_lis_delete" href="#"><i class="far fa-trash-alt"></i> Eliminar</a> -->
                                    <button type="button" data-nameprod='<?= $items_products['name_product'] ?>' data-idprod='<?= $items_products['id_product'] ?>' data-dirname='<?= $items_products['dir_name'] ?>' data-toggle="modal" data-target="#exampleModal" value="" name="id_product_eliminar" class="button_lis_delete"><i class="far fa-trash-alt"></i> Borrar</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
                <!-- Fin table -->
            </form>
        </div>
    </div>
    <!-- Modal a presentar en mi lista -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Eliminar Registro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Este registro se eliminará para siempre.</p>
                </div>
                <div class="modal-footer">
                    <form action="../../controllers/ctl_products.php" method="POST">
                        <input type="hidden" name="action" value="Eliminar">
                        <button type="submit" name="id_prod_to_delete" class="btn btn-danger btn_delete">Sí, Eliminar</button>
                        <input type="hidden" name="txt_dirname_to_delete" class="txt_delete_dirname">
                        <button type="button" name class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ----FinModal -->
    <!-- Scripts -->
    <script src="../../../assets/js/animate_admin_page.js"></script>
    <!-- SCRIPT JAQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->


    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No se han encontrado registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(Filtrado de _MAX_ entradas totales)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrando _MENU_ entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se han encontrado registros coincidentes",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activar para ordenar la columna ascendente",
                        "sortDescending": ": activar para ordenar la columna descendente"
                    }
                }
            });
        });
    </script>
    <!-- Script para llenado de combox según el primero -->
    <script type="text/javascript">
        // LLenado y filtrado de catalogo combox category and subcategory
        $(document).ready(function() {
            $("#combox_category").change(function() {

                $("#combox_category option:selected").each(function() {
                    id_category = $(this).val();
                    $.post("../../controllers/ctl_subcategory.php", {
                        id_category: id_category
                    }, function(data) {
                        $("#combox_subcategory").html(data);
                    })
                });

            });


            // Filtrado de catalogo combox category and subcategory

            $("#combox_subcategory").change(function() {
                let combox_category = document.getElementById("combox_category");
                let id_categor = combox_category.options[combox_category.selectedIndex].value;
                $("#combox_subcategory option:selected").each(function() {
                    id_category_sub_post = id_categor;
                    id_subcategory = $(this).val();
                    $.post("../../controllers/ctl_filter_products.php", {
                        id_category_sub_post: id_category_sub_post,
                        id_subcategory_sub_post: id_subcategory
                    }, function(data) {
                        $("#filter_container_table").html(data);
                    })
                });
            });

            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var name_prod = button.data('nameprod');
                var id_prod = button.data('idprod');
                var dirname_prod = button.data('dirname');
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-body').text('¿Segúro que quieres eliminar "' + name_prod + '"?');
                modal.find('.btn_delete').val(id_prod);
                modal.find('.txt_delete_dirname').val(dirname_prod);
            })


        });
    </script>

<?php
} else {
    header('Location:login.php');
}

?>