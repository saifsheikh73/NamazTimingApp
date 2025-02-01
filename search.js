function searchcity() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchTerm");
    filter = input.value.toUpperCase();
    table = document.getElementById("getsearch");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  function searchzipcode() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchTerm2");
    filter = input.value.toUpperCase();
    table = document.getElementById("getsearch");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  function searchmasjidname() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchTerm3");
    filter = input.value.toUpperCase();
    table = document.getElementById("getsearch");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }