<?php
header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country= filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
    <thead>
        <tr>
            <th>Country Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>
    </thead>
  <tbody>
  <?php foreach ($results as $row):?>
      <tr>
          <td><?= $row['name']; ?></td>
          <td><?= $row['continent']; ?></td>
          <hd><?= $row['independence_year']; ?></td>
          <td><?=  $row['head_of_state'];?></td>
      <tr>
  <?php endforeach;?>
  </tbody>
</table>

<--!ul>
<?php /*foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; */?>
</ul-->
