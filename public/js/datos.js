
// Barra de busqueda para la tabla.

function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("tbody");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        if (tr[i].getElementsByTagName("th")[0].innerHTML.toUpperCase().indexOf(filter) > -1) {
            found = true;
        } else {
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}


// Oculta o muestra la tabla o las graficas.

function toggle() {
    if(document.getElementById("tabla").hidden){
        document.getElementById("graficas").hidden = true;
        document.getElementById("tabla").hidden = false;
        document.getElementById("toggle").innerHTML = "Graficas";
    } else {
        document.getElementById("graficas").hidden = false;
        document.getElementById("tabla").hidden = true;
        document.getElementById("toggle").innerHTML = "Tabla";
    }
    
    
}


// Recoje la parte de HTML que quiro poner en el PDF y envia el formulario al PDFController con el trozo de HTML que he cojido para crear el PDF.

$(document).ready(function(){
    $('#create_pdf').click(function(){
        $('#hidden_html').val($('#graficas').html());
        $('#make_pdf').submit();
    });
});



//Esta funcion es para ordenar la tabla al hacer clic a la columna que querias ordenar pero se colapsa el navegador durante unos segundos y decici quitala.

/*
<th onclick="sortTable(0)" scope="col">Id</th>
<th onclick="sortTable(1)" scope="col">First</th>
<th onclick="sortTable(2)" scope="col">Last</th>
<th onclick="sortTable(3)" scope="col">Email</th>
<th onclick="sortTable(4)" scope="col">Gender</th>
<th onclick="sortTable(5)" scope="col">Address</th>
<th onclick="sortTable(6)" scope="col">Ip</th>
<th onclick="sortTable(7)" scope="col">Consumption</th>
<th onclick="sortTable(8)" scope="col">Energy cost</th>

function sortTable(n) {
    console.log("Now!");
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("tbody");
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 0; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            if (n == 0) {
                x = rows[i].getElementsByTagName("th")[n];
                y = rows[i + 1].getElementsByTagName("th")[n];
            } else {
                x = rows[i].getElementsByTagName("td")[n-1];
                y = rows[i + 1].getElementsByTagName("td")[n-1];
            }
            if (dir == "asc") {
                if (n == 0 || n == 7 || n == 8) {
                    if (parseFloat(x.innerHTML) > parseFloat(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                } else {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                
            } else if (dir == "desc") {
                if (n == 0 || n == 7 || n == 8) {
                    if (parseFloat(x.innerHTML) < parseFloat(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                } else {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
*/