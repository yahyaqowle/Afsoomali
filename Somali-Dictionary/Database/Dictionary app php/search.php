<?php
include 'db.php';

// Check if the search form has been submitted
if (isset($_GET['search_word'])) {
    // Get the search keyword and sanitize it
    $search_word = mysqli_real_escape_string($conn, $_GET['search_word']);

    // Search for matching words in the dictionary table
    $sql = "SELECT Word, Meaning FROM dictionary WHERE Word LIKE '%$search_word%' OR Meaning LIKE '%$search_word%'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>
 
        <form action="search.php" method="get">
            <input type="text" name="search_word" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
 
        <?php if (isset($result) && mysqli_num_rows($result) > 0): ?>
            <table>
                <tr>
                    <th>Word</th>
                    <th>Meaning</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['Word']; ?></td>
                        <td><?php echo $row['Meaning']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No matching words found</p>
        <?php endif; ?>
    </div>
</body>
</html>

