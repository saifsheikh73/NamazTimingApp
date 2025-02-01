function doSearch() {
    var searchText = document.getElementById('searchTerm').value;
    var targetTable = document.getElementById('getsearch');
    var targetTableColCount;
    

    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';

        //Get column count from header row
        if (rowIndex == 0) {
            targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
            continue; //do not execute further code for header row.
        }

        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            var cellText = '';

            if (navigator.appName == '')
                cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).innerText;
            else
                cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;

            rowData += cellText;
        }

        // Make search case insensitive.
        rowData = rowData.toLowerCase();
        searchText = searchText.toLowerCase();

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}

$(document).ready(function(){
  $("#filterButton").click(function(){
    $("#filterpanel").toggle();
  });
});

$(function () {
//$("#example1").DataTable();
$('#getsearch').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});








function doSearchtwo() {
    var searchText = document.getElementById('searchTerm2').value;
    var targetTable = document.getElementById('getsearch');
    var targetTableColCount;
    

    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';

        //Get column count from header row
        if (rowIndex == 0) {
            targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
            continue; //do not execute further code for header row.
        }

        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            var cellText = '';

            if (navigator.appName == '')
                cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).innerText;
            else
                cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;

            rowData += cellText;
        }

        // Make search case insensitive.
        rowData = rowData.toLowerCase();
        searchText = searchText.toLowerCase();

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}

$(document).ready(function(){
  $("#filterButton").click(function(){
    $("#filterpanel").toggle();
  });
});

$(function () {
//$("#example1").DataTable();
$('#getsearch').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});


function doSearchthree() {
    var searchText = document.getElementById('searchTerm3').value;
    var targetTable = document.getElementById('getsearch');
    var targetTableColCount;
    

    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';

        //Get column count from header row
        if (rowIndex == 0) {
            targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
            continue; //do not execute further code for header row.
        }

        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            var cellText = '';

            if (navigator.appName == '')
                cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).innerText;
            else
                cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;

            rowData += cellText;
        }

        // Make search case insensitive.
        rowData = rowData.toLowerCase();
        searchText = searchText.toLowerCase();

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}

$(document).ready(function(){
  $("#filterButton").click(function(){
    $("#filterpanel").toggle();
  });
});

$(function () {
//$("#example1").DataTable();
$('#getsearch').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});