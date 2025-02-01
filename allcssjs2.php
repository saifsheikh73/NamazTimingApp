<!-- Contents of includes.php -->
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Theming - Semantic</title>

  <!--- Site CSS -->
  <link rel="stylesheet" type="text/css" href="css/newcss/components/reset.css">
  <!--- changing fonts <link rel="stylesheet" type="text/css" href="css/newcss/components/site.css">-->
  <link rel="stylesheet" type="text/css" href="css/newcss/components/grid.css">

  <!--- Component CSS -->
  <link rel="stylesheet" type="text/css" href="css/newcss/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="css/newcss/components/icon.css">
  <link rel="stylesheet" type="text/css" href="css/newcss/components/card.css">
  <link rel="stylesheet" type="text/css" href="css/newcss/components/image.css">
  <link rel="stylesheet" type="text/css" href="css/newcss/components/button.css">
  <link rel="stylesheet" type="text/css" href="css/newcss/components/segment.css">
  <link rel="stylesheet" type="text/css" href="css/newcss/components/divider.css">
  <link rel="stylesheet" type="text/css" href="css/newcss/components/transition.css">

  <!--- Example Libs -->
  <link rel="stylesheet" type="text/css" href="css/newcss/components/popup.css">
  <script src="css/newcss/assets/library/jquery.min.js"></script>
  <script src="css/newcss/assets/library/iframe-content.js"></script>
  <!--- display popup while hovering on search dropdown<script src="css/newcss/assets/show-examples.js"></script>-->
  <script type="text/javascript" src="css/newcss/components/popup.js"></script>

  <!--- Component JS -->
  <script type="text/javascript" src="css/newcss/components/transition.js"></script>
  <script type="text/javascript" src="css/newcss/components/dropdown.js"></script>

  <!--- Example CSS -->
  <style>
  body {
    padding: 1em;
  }
  .spaced > .button {
    margin-bottom: 1em;
  }
  </style>

  <!--- Example Javascript -->
  <script>
  $(document)
    .ready(function() {
      $('.ui.dropdown').dropdown();

      $('.ui.buttons .dropdown.button').dropdown({
        action: 'combo'
      });
    })
  ;
  </script>
</head>
<body>
</body>
</html>
