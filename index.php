<!DOCTYPE html>

<html>
    <head>
		<script type = "text/javascript" src = "js/js.js"> </script>
        <link rel = "stylesheet" href = "css/styles.css" type = "text/css">
        <title> Lollygag </title>
    </head>

    <body>
      <div id = "title">
        <p> Lollygag </p>
      </div>

      <div id = "section">
        <center>
        <div class = "sectionItem">
          <form action="index.html">
          <p class = "sectionHeader"> Player Compare </p>
          <div class="input-list style-1 clearfix">
            <input id = "player1" name = "player1" type="text" placeholder="Player 1">
            vs
            <input id = "player2" name = "player2" type="text" placeholder="Player 2">
          </div>
          <br>
          <input type="submit" value="Submit">
          </form>
        </div>
        </center>

        <center>
        <div class = "sectionItem">
          <form action="index.html">
          <p class = "sectionHeader"> Team Compare </p>
          <div class="input-list style-1 clearfix">
            <input id = "team1" name = "team1" type="text" placeholder="Team 1">
            vs
            <input id = "team2" name = "team2" type="text" placeholder="Team 2">
          </div>
          <br>
          <input type="submit" value="Submit">
          </form>
        </div>
        </center>
      </div>
      <?php
      // Connect to database server
      mysql_connect("mysql.fdb-srv1.ccoyq2utebl6.us-west-2.rds.amazonaws.com", "admin", "nicholas1") or die (mysql_error ());

      // Select database
      mysql_select_db("dbo") or die(mysql_error());

      // SQL query
      $strSQL = "SELECT * FROM Players";

      // Execute the query (the recordset $rs contains the result)
      $rs = mysql_query($strSQL);

      // Loop the recordset $rs
      // Each row will be made into an array ($row) using mysql_fetch_array
      while($row = mysql_fetch_array($rs)) {
        }

      // Close the database connection
      mysql_close();
      ?>
    </body>
</html>
