<div style="display: none;" class="footer_content">
    <h4>Todos los derechos reservados | Copyright &copy;</h4>
    <h4>Web elaborada y diseñada por <a href="#">Elvis Macas</a></h4>
</div>
</div>
</section>
<!-- Scripts -->
<script src="../../../assets/js/animate_admin_page.js"></script>
<!-- SCRIPT JAQUERY CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
    // LLenado de new_item combox
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
    });
</script>
</body>

</html>