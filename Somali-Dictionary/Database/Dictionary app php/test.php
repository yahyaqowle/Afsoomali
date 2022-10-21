<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Qaamuus</title>
    <style media="screen">
    body{
      background-color: rgb(46,194,253);
      margin: 0px;
      padding: 0px;
    }
      #table1{
        border: 1px solid black;
        border-collapse: collapse;
        width: 500px;
        margin-top: 30px;
        margin-left: 50px;
      }
      #table1 td,th{
        border: 1px solid black;
        text-align: center;
        padding: 3px;
        font-size: 18px;
      }
      h1{
        text-align: center;
        background-color: deeppink;
        font-size: 45px;
        color: white;
        padding: 5px;
      }
      #div1{
        background-color: #f4f4f4;
        width: 900px;
        margin-left: 200px;
        padding-top: 20px;
        padding-bottom: 20px;
      }
      form{
        margin-left: 500px;
      }
      input[type=text]{
        width: 300px;
        padding: 5px;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: bold;
      }
      input[type=submit]{
        font-size: 17px;
        font-weight: bold;
        margin-left: 100px;
        background-color: blue;
        border: 1px solid blue;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 5px;
      }
      #table2{
        border: 1px solid black;
        border-collapse: collapse;
        margin-left: 500px;
        margin-top: 20px;
        width: 300px;
      }
      #table2 td,th{
        border: 1px solid black;
        padding: 5px;
        text-align: center;
        font-weight: bold;
        font-size: 18px;
      }

    </style>
  </head>
  <body>
    <h1>Qaamuuska Afsoomaliga</h1>
    <div id="div1">
      <form class="" action="dictionary.php" method="post">
        <input type="text" name="eray" value="" placeholder="Raadi Eray"><br>
        <input type="submit" name="raadi" value="raadi">
      </form>

      <div id="div2">
      <form action="insert.php" method="get">
          <input type="submit" value="Insert a word" 
              name="Submit" id="frm1_submit" />
      </form>
      
      <!-- <div id="div2">
      <a href="http://www.google.com/">
         <button>Visit Google</button>
      </a> -->

      <form autocomplete="off">
      <div>
        <input type="text" id="input" placeholder="Raadi..." />
      </div>
      <ul class="list"></ul>
      </form>
       <!--Script-->
      <script src="script.js"></script>

      <table id="table2">
        <?php
           include 'db.php';
           if (isset($_POST['raadi'])) {
             $word=$_POST['eray'];

             $sql1="SELECT * from dictionary where Word='$word'";
             $query1=mysqli_query($conn,$sql1);
             while ($info=mysqli_fetch_array($query1)) {
               ?>
               <tr>
                 <td><?php echo $info['Word']; ?></td>
                 <td><?php echo $info['Meaning']; ?></td>
               </tr>

               <?php
               // code...
             }
           }

         ?>

      </table>

      <table id="table1">
        <tr>
          <th>Eray</th>
          <th>Macno</th>
        </tr>
        <?php
          include 'db.php';

          $sql="SELECT * from dictionary";
          $query=mysqli_query($conn,$sql);
          while ($info=mysqli_fetch_array($query)) {
            ?>
            <tr>
              <td><?php echo $info['Word']; ?></td>
              <td><?php echo $info['Meaning']; ?></td>
            </tr>


            <?php

          }


        ?>

      </table>

    </div>

        </div>

  </body>
</html>

