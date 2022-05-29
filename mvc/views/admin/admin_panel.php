<?php
session_start();
$username = $_SESSION['username'];
if ($username) {

    include("header_web_admin/header.php");
    include("../../models/crud_clients.php");
    include("../../models/crud_products.php");

    $obj_Crud_product = new crud_products();
    $obj_Crud_clients = new crud_clients();
?>


    <div style="margin-top: 150px;" class="content">
        <!-- Cards -->
        <div class="item_card">
            <div>
                <i class="far fa-eye"></i>
            </div>
            <div>
                <h1> Visitas Totales: </h1><br>
                <h3>
                    <?php
                    $visits = $obj_Crud_clients->select_count_visits();
                    echo '# ' . $visits;
                    ?>

                </h3>
            </div>
        </div>

        <div class="item_card">
            <div>
                <i class="fas fa-tags"></i>
            </div>
            <div>
                <h1>Productos Totales: </h1><br>
                <h3>
                    <?php
                    $totalPooducts = $obj_Crud_product->select_quantity_products();
                    echo '# ' . $totalPooducts;
                    ?>
                </h3>

            </div>
        </div>
        <div class="item_card">
            <div>
                <i class="fas fa-tag"></i>
            </div>
            <div>
                <h1>Pr. Totales Hombres: </h1><br>
                <h3>
                    <?php
                    $total_male_Pooducts = $obj_Crud_product->select_category_quatity(1);
                    echo '# ' . $total_male_Pooducts;
                    ?>
                </h3>
            </div>
        </div>

        <div class="item_card">
            <div>
                <i class="fas fa-tag"></i>
            </div>
            <div>
                <h1>Pr. Totales Mujeres: </h1><br>
                <h3>
                    <?php
                    $total_female_Pooducts = $obj_Crud_product->select_category_quatity(2);
                    echo '# ' . $total_female_Pooducts;
                    ?>
                </h3>
            </div>
        </div>
    </div>


<?php
    include("footer_web_admin/footer.php");
} else {
    header('Location:login.php');
}
?>