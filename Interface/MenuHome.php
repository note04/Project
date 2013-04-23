<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css" />

        <!--<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>-->
        <script type="text/javascript" src="../js/jquery.fixedMenu.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/fixedMenu_style2.css" />
        <script>
        $('document').ready(function(){
            $('.menu').fixedMenu();
        });
        </script>

        <script>
        $(function() {
        $("#createpoll")
      .button()
      .click(function( event ) {
        event.preventDefault();
        document.location.href='../Interface/MenuCreatePoll.php';
//        event.preventDefault();

      });
      $("#answerpoll")
      .button()
      .click(function( event ) {
        event.preventDefault();
//        event.preventDefault();
        document.location.href='../Interface/MenuAnswer.php';
        
      });

  });

  </script>
    </head>
<body>

<table border="0" width="760px">
  <tr>
    <td>
        <div class="menu">
        <ul>
            <li>
                <a href="../Interface/MenuHome.php">Home</a>
            </li>

            <li>
                <a href="../Interface/MenuCreatePoll.php">Create Poll</a>
            </li>

            <li>
                <a href="../Interface/MenuAnswer.php">Answer Poll</a>
            </li>
            
            <li>
                <a href="../Interface/About.php">About</a>
            </li>
            
            <li>
                <a href="../Interface/Contact.php">Contact</a>
            </li>

        </ul>
    </div>
    </td>
  </tr>
  <tr>
    <td align="center"><table>
  <tr>
    <td><br /></td>
    <td><br /></td>
    <td><br /></td>
  </tr>
  <tr>
    <td><br /></td>
    <td align="center"><img  src="../images/anigif.gif" width="240" height="288" alt="" /></td>
    <td><br /></td>
  </tr>
  <tr>
    <td><br /></td>
    <td align="center"><font face="Arial Rounded MT Bold" size="7">QUESTIONNAIRES</font></td>
    <td><br /></td>
  </tr>
  <tr>
    <td><br /></td>
    <td><br /></td>
    <td><br /></td>
  </tr>
  <tr>
    <td><br /></td>
    <td align="center">
                    <table>
                  <tr>
                    <td><a id="createpoll">Create Poll</a></td>
                    <td></td>
                    <td><a id="answerpoll">Answer Poll</a></td>
                  </tr>
                </table>
</td>
    <td><br /></td>
  </tr>
</table>
</td>
  </tr>
</table>

</body>
</html>
