

const expresions_tohome = {
  name: /^[a-z0-9A-ZÀ-ÿ\s0-9()]{4,65}$/
}
const focus_expresions_tohome = {
  name: false,
}

var form_to_search_inp = document.querySelectorAll('#form_to_search input');
form_to_search_inp.forEach((input) => {
  input.addEventListener('keyup', correct_info_homepage);
  input.addEventListener('blur', correct_info_homepage);
});

function correct_info_homepage(e) {
  switch (e.target.name) {
    case "txt_search_field_home":
      if (expresions_tohome.name.test(e.target.value)) {
        focus_expresions_tohome["name"] = true;
      } else {
        focus_expresions_tohome["name"] = false;
      };
      break;
  }
}
var form_to_search = document.getElementById('form_to_search');
form_to_search.addEventListener('submit', function (event) {
  event.preventDefault();
  if (focus_expresions_tohome["name"]) {
    var txt_search_home = document.getElementById('txt_search_home').value;
    $.post("../controllers/ctl_filter_products.php", {
      value_tosearch_product: txt_search_home
    }, function (data) {
      $("#filter_section_items").html(data);
    })
    document.getElementById('section_items').scrollIntoView();
  } else {
    alert('Por favor, Ingrese texto válido.');
  }
});


