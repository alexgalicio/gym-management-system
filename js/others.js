// username admin
$(document).ready(function () {
  var usernameExists = false;

  $('#username').on('blur', function () {
    var username = $(this).val();
    var userId = $('#user_id').val();

    if (username != '') {
      $.ajax({
        url: '../check-username.php',
        type: 'POST',
        data: { username: username, user_id: userId },
        success: function (response) {
          if (response > 0) {
            $('#username-error').show();
            $('#username-success').hide();
            usernameExists = true;
          } else {
            $('#username-error').hide();
            $('#username-success').show();
            usernameExists = false;
          }
        }
      });
    } else {
      $('#username-error').hide();
      $('#username-success').hide();
    }
  });

  $('#memberForm').on('submit', function (e) {
    if (usernameExists) {
      e.preventDefault();
      alert('Please choose a different username');
      return false;
    }
  });
});

// search
function searchTable() {
  let input = document.getElementById('searchInput');
  let filter = input.value.toLowerCase();
  let table = document.querySelector('.table');
  let tr = table.getElementsByTagName('tr');

  for (let i = 1; i < tr.length; i++) {
    let found = false;
    let td = tr[i].getElementsByTagName('td');

    for (let j = 0; j < td.length; j++) {
      let cell = td[j];
      if (cell) {
        let text = cell.textContent || cell.innerText;
        if (text.toLowerCase().indexOf(filter) > -1) {
          found = true;
          break;
        }
      }
    }

    tr[i].style.display = found ? '' : 'none';
  }
}
document.addEventListener("DOMContentLoaded", searchTable);
