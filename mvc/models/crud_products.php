<?php
include_once(__DIR__ . "../../conecction/bd_connect.php");
?>

<?php

class crud_products
{
    public $id_product;
    public $id_category;
    public $id_subcategory;
    public $name_product;
    public $colours_product;
    public $quantity_product;
    public $price_send_product;
    public $size_stock_product;
    public $price_product;
    public $status_product;
    public $contact_num_product;

    // Función para guardar registros.
    function save()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("INSERT INTO products(id_category, id_subcategory, name_product, colours_product, quantity_product, price_send_product,
             size_stock_product, price_product, status_product, contact_num_product)
             VALUES(:id_category, :id_subcategory, :name_prod,
             :colours_prod, :quantity_prod, :price_send_prod, :size_stock_prod, :price_prod, :status_prod, :contact_num_prod);");

        $consult->bindparam(":id_category", $this->id_category, PDO::PARAM_STR);
        $consult->bindparam(":id_subcategory", $this->id_subcategory, PDO::PARAM_STR);
        $consult->bindparam(":name_prod", $this->name_product, PDO::PARAM_STR);
        $consult->bindparam(":colours_prod", $this->colours_product, PDO::PARAM_STR);
        $consult->bindparam(":quantity_prod", $this->quantity_product, PDO::PARAM_STR);
        $consult->bindparam(":price_send_prod", $this->price_send_product, PDO::PARAM_STR);
        $consult->bindparam(":size_stock_prod", $this->size_stock_product, PDO::PARAM_STR);
        $consult->bindparam(":price_prod", $this->price_product, PDO::PARAM_STR);
        $consult->bindparam(":status_prod", $this->status_product, PDO::PARAM_STR);
        $consult->bindparam(":contact_num_prod", $this->contact_num_product, PDO::PARAM_STR);
        return $consult->execute();
    }

    // Función para editar registros.
    function edit()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("UPDATE products SET id_category=:id_category, 
        id_subcategory=:id_subcategory, name_product=:name_prod, colours_product=:colours_prod,
        quantity_product=:quantity_prod, price_send_product=:price_send_prod, size_stock_product=:size_stock_prod,
        price_product=:price_prod, status_product=:status_prod 
        WHERE id_product=:id_prod");
        $consult->bindparam(":id_prod", $this->id_product, PDO::PARAM_STR);
        $consult->bindparam(":id_category", $this->id_category, PDO::PARAM_STR);
        $consult->bindparam(":id_subcategory", $this->id_subcategory, PDO::PARAM_STR);
        $consult->bindparam(":name_prod", $this->name_product, PDO::PARAM_STR);
        $consult->bindparam(":colours_prod", $this->colours_product, PDO::PARAM_STR);
        $consult->bindparam(":quantity_prod", $this->quantity_product, PDO::PARAM_STR);
        $consult->bindparam(":price_send_prod", $this->price_send_product, PDO::PARAM_STR);
        $consult->bindparam(":size_stock_prod", $this->size_stock_product, PDO::PARAM_STR);
        $consult->bindparam(":price_prod", $this->price_product, PDO::PARAM_STR);
        $consult->bindparam(":status_prod", $this->status_product, PDO::PARAM_STR);
        return $consult->execute();
    }
    // Filtrado para determinar si el producto existe o no.
    function select_product()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM products WHERE name_product=:name_prod");
        $consult->bindparam(":name_prod", $this->name_product, PDO::PARAM_STR);
        $consult->execute();
        $prod_registered = $consult->fetch(PDO::FETCH_ASSOC);
        return $prod_registered;
    }
    // Filtrado para listar todos los productos registrados.
    function select_all_products()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.name_product,products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat FROM products INNER JOIN status ON products.status_product = status.id_status INNER JOIN category ON products.id_category = category.id_category INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory INNER JOIN gallery ON products.name_product = gallery.name_product GROUP BY products.name_product,products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img HAVING COUNT(*) >= 1");
        $consult->execute();
        $listProd = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listProd;
    }
    function select_filter_products()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("
        SELECT products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status, products.name_product,products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat 
        FROM products INNER JOIN status ON products.status_product = status.id_status 
        INNER JOIN category ON products.id_category = category.id_category 
        INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory 
        INNER JOIN gallery ON products.name_product = gallery.name_product 
        WHERE products.id_category = :category_id AND products.id_subcategory = :subcategory_id 
        GROUP BY products.name_product,products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status,products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img  HAVING COUNT(*) >= 1
            ");
        $consult->bindparam(":category_id", $this->id_category, PDO::PARAM_STR);
        $consult->bindparam(":subcategory_id", $this->id_subcategory, PDO::PARAM_STR);
        $consult->execute();
        $listProd = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listProd;
    }
    function select_filter_products_recommended()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("
        SELECT products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status, products.name_product,products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat 
        FROM products INNER JOIN status ON products.status_product = status.id_status 
        INNER JOIN category ON products.id_category = category.id_category 
        INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory 
        INNER JOIN gallery ON products.name_product = gallery.name_product 
        WHERE products.id_category = :category_id AND products.id_subcategory = :subcategory_id 
        GROUP BY products.name_product,products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status, products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img HAVING COUNT(*) >= 1 LIMIT 4
            ");
        $consult->bindparam(":category_id", $this->id_category, PDO::PARAM_STR);
        $consult->bindparam(":subcategory_id", $this->id_subcategory, PDO::PARAM_STR);
        $consult->execute();
        $listProd = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listProd;
    }
    function select_filter_products_category()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("
        SELECT products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status, products.name_product,products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat 
        FROM products INNER JOIN status ON products.status_product = status.id_status 
        INNER JOIN category ON products.id_category = category.id_category 
        INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory 
        INNER JOIN gallery ON products.name_product = gallery.name_product 
        WHERE products.id_category = :category_id 
        GROUP BY products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status, products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img HAVING COUNT(*) >= 1
            ");
        $consult->bindparam(":category_id", $this->id_category, PDO::PARAM_STR);
        $consult->execute();
        $listProd = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listProd;
    }

    function select_filter_to_productsedit()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("
        SELECT products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status, products.name_product,products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat 
        FROM products INNER JOIN status ON products.status_product = status.id_status 
        INNER JOIN category ON products.id_category = category.id_category 
        INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory 
        INNER JOIN gallery ON products.name_product = gallery.name_product 
        WHERE products.id_product = :product_id
        GROUP BY products.name_product,products.id_product, category.name_category, category.id_category, subcategory.name_subcategory, subcategory.id_subcategory,
        status.name_status, status.id_status, products.colours_product, 
        products.quantity_product, products.price_send_product, 
        products.size_stock_product, products.price_product,products.contact_num_product, 
        gallery.dir_name, gallery.link_name_img HAVING COUNT(*) >= 1
            ");
        $consult->bindparam(":product_id", $this->id_product, PDO::PARAM_STR);
        $consult->execute();
        $oneProd = $consult->fetch(PDO::FETCH_ASSOC);
        return $oneProd;
    }
    function search_product($txt_tosearch)
    {
        $connect = new bd_connect();
        $SQLQUERY = "select products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.name_product,products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat FROM products INNER JOIN status ON products.status_product = status.id_status INNER JOIN category ON products.id_category = category.id_category INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory INNER JOIN gallery ON products.name_product = gallery.name_product  
        WHERE products.name_product LIKE '%" . $txt_tosearch . "%'
        OR products.colours_product LIKE '%" . $txt_tosearch . "%'
        OR products.price_product LIKE '%" . $txt_tosearch . "%'
        OR category.name_category LIKE '%" . $txt_tosearch . "%'
        OR subcategory.name_subcategory LIKE '%" . $txt_tosearch . "%'
        OR status.name_status LIKE '%" . $txt_tosearch . "%'
        GROUP BY products.name_product,products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img HAVING COUNT(*) >= 1";
        $consult = $connect->prepare($SQLQUERY);
        $consult->execute();
        $list_produc = $consult->fetchall(PDO::FETCH_ASSOC);
        return $list_produc;
    }
    function delete_product()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare('DELETE FROM products WHERE id_product=:product_id;');
        $consult->bindparam(":product_id", $this->id_product, PDO::PARAM_STR);
        return $consult->execute();
    }
    function select_quantity_products()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.name_product,products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat FROM products INNER JOIN status ON products.status_product = status.id_status INNER JOIN category ON products.id_category = category.id_category INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory INNER JOIN gallery ON products.name_product = gallery.name_product GROUP BY products.name_product,products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img HAVING COUNT(*) >= 1");
        $consult->execute();
        $totalProducts = $consult->rowCount();
        return $totalProducts;
    }
    function select_category_quatity($category)
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.name_product,products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img ,COUNT(*) as num_repeat FROM products INNER JOIN status ON products.status_product = status.id_status INNER JOIN category ON products.id_category = category.id_category INNER JOIN subcategory ON subcategory.id_subcategory = products.id_subcategory INNER JOIN gallery ON products.name_product = gallery.name_product WHERE products.id_category = " . $category . " GROUP BY products.name_product,products.id_product ,category.name_category,category.id_category, subcategory.name_subcategory,subcategory.id_subcategory, status.name_status, status.id_status, products.colours_product,products.quantity_product,products.price_send_product,products.size_stock_product,products.price_product,products.contact_num_product,gallery.dir_name, gallery.link_name_img HAVING COUNT(*) >= 1");
        $consult->execute();
        $total_category_Products = $consult->rowCount();
        return $total_category_Products;
    }
}

?>