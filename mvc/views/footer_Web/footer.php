<!-- Footer -->
<footer class="footer">
  <p>Todos los derechos reservados | &copy; Copyright</p>
  <p>Web Elaborada y diseñada por <a target="#" href="https://www.facebook.com/profile.php?id=100014662218721">Elvis Macas</a></p>
</footer>
<!-- Js-scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.link_header_button').click(function() {
      value_link = $(this).attr('data-value');
      console.log(value_link);
      if (value_link == 1) {
        document.getElementById('section_items').scrollIntoView();
      }
      if (value_link == 2) {
        document.getElementById('section_contact').scrollIntoView();
      }
      if (value_link == 3) {
        document.getElementById('section_contact').scrollIntoView();
      }
    });
  });
</script>
</body>

</html>