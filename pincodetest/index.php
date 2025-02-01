<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Simple location locator by pincode</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <style>
  .ui-autocomplete-loading {
    background: white url("img/ui-anim_basic_16x16.gif") right center no-repeat;
  }
   .ui-autocomplete {
    max-height: 300px;
    overflow-y: auto;
    
    overflow-x: hidden;
  }
  
  * html .ui-autocomplete {
    height: 100px;
  }
  </style>
 
 
</head>
<body>
<h3>Find location by entering pincode</h3>
    <div class="ui-widget">
  <input type="text" id="country" name="country" placeholder="Enter pincode" width="40%"><br/>
  <span style="color:red;"> Enter at least 3 digit to show auto-complete.
</div>
<div> Taluka: <span id="taluka"></span><br/>
 Division Name: <span id="divison"></span><br/>
  Region Name: <span id="reg"></span><br/>
  Circle Name: <span id="cir"></span><br/>
   State Name: <span id="state"></span><br/>
</div>
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
   $( "#country" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "request.php",
          dataType: "json",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 3,  
      select: function( event, ui ) {
            
            var vl = ui.item.id;      
            var data = vl.split("-");
            console.log(data);
            $("#city").html(data[0]);
            $("#state").html(data[1]);
        //console.log(ui.item); 
      },
      open: function() {
                 
      },
      close: function() {
               
      }
    });
  });
  </script>
</body>
</html>