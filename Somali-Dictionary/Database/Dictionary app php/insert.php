<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Eray ku dar</title>
    <style media="screen">
      form{
        margin-left: 500px;
      }
      label{
        font-weight: bold;
        font-size: 18px;
      }
      input[type=text]{
        width: 350px;
        padding: 10px;
        font-size: 16px;
      }
      input[type=submit]{
        font-size: 17px;
        font-weight: bold;
        margin-left: 120px;
        padding: 5px;
      }
      table{
        border: 1px solid black;
        border-collapse: collapse;
        width: 500px;
        margin-left: 450px;
        margin-top: 30px;
      }
      td,th{
        border: 1px solid black;
        text-align: center;
        padding: 3px;
      }
    </style>
  </head>
  <body>
    <form class="" action="insert.php" method="post">
      <h1>Eray ku dar</h1>
      <label for="">Eray</label><br>
      <input type="text" name="eray" value="" placeholder="Eray qor" required><br><br>
      <label for="">Macno</label><br>
      <input type="text" name="macno" value="" placeholder="Macnaha qor" required><br><br>
      <input type="submit" name="insert" value="Eray ku dar">
    </form>
    <table>
      <tr>
        <th>Eray</th>
        <th>Macno</th>
      </tr>
    <?php
        include 'db.php';
        if (isset($_POST['insert'])) {
          $word=$_POST['eray'];
          $meaning=$_POST['macno'];

          $sql="INSERT INTO dictionary(Word,Meaning) values('$word','$meaning')";
          $query=mysqli_query($conn,$sql);

        }
        $sql1="SELECT * from dictionary";
        $query1=mysqli_query($conn,$sql1);
        while ($info=mysqli_fetch_array($query1)) {
          ?>
          <tr>
            <td><?php echo $info['Word']; ?></td>
            <td><?php echo $info['Meaning']; ?></td>
          </tr>


          <?php
        }
     ?>
     </table>

  </body>
</html>
