<?php
include 'db.php';

$words_per_page = 100;
$page_number = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting index and limit for the current page
$start_index = ($page_number - 1) * $words_per_page;
$limit = $words_per_page;

// Get the total number of words in the database
$count_sql = "SELECT COUNT(*) FROM dictionary";
$count_result = mysqli_query($conn, $count_sql);
$count_row = mysqli_fetch_row($count_result);
$total_words = $count_row[0];

// Calculate the total number of pages needed
$total_pages = ceil($total_words / $words_per_page);

// Retrieve the words for the current page
$sql = "SELECT Word, Meaning FROM dictionary LIMIT $start_index, $limit";
$result = mysqli_query($conn, $sql);

?>

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
      margin: auto;
      padding-top: 20px;
      padding-bottom: 20px;
    }
    form{
      text-align: center;
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
      margin: auto;
      margin-top: 20px;
      width: 900px;
    }
    #table2 td,th{
      border: 1px solid black;
      padding: 5px;
      text-align: center;
      font-weight: bold;
      font-size: 18px;
    }
    #pagination {
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }
    #pagination .active{
      background-color: blue;
      color: white;
    }
    #pagination a {
      display: block;
      padding: 5px 10px;
      margin: 0 5px;
      border: 1px solid black;
      text-align: center;
      text-decoration: none;
    }
        #pagination a:hover {
      background-color: black;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Qaamuus</h1>
  <div id="div1">
    <form action="search.php" method="get">
      <input type="text" name="search_word" placeholder="Search for a word...">
      <input type="submit" value="Search">
    </form>
    <table id="table2">
      <tr>
        <th>Word</th>
        <th>Meaning</th>
      </tr>
      <?php while ($row = mysqli_fetch_array($result)): ?>
        <tr>
          <td><?php echo $row[0]; ?></td>
          <td><?php echo $row[1]; ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
    <div id="pagination">
      <?php if ($page_number > 1): ?>
        <a href="?page=1">&laquo; First</a>
        <a href="?page=<?php echo $page_number - 1; ?>">&lt; Previous</a>
      <?php endif; ?>

      <?php for ($i = max(1, $page_number - 5); $i <= min($page_number + 5, $total_pages); $i++): ?>
        <?php if ($i == $page_number): ?>
          <span class="active"><?php echo $i; ?></span>
        <?php else: ?>
          <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ($page_number < $total_pages): ?>
        <a href="?page=<?php echo $page_number + 1; ?>">Next &gt;</a>
        <a href="?page=<?php echo $total_pages; ?>">Last &raquo;</a>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>

