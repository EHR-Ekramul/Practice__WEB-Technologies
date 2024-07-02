<?php session_start();

if (!isset($_SESSION['loggedIn']) or !isset($_COOKIE['user'])) {
  header("Location: login.php");
  exit();
}


// Fetching Database information to show in dashboard
$conn = new mysqli("localhost", "root", "", "my_app");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user_id = $_COOKIE['user'];
$user_firstName = "";
$user_lastName = "";
$user_gender = "";
$user_fatherName = "";
$user_motherName = "";
$user_bloodGroup = "";
$user_religion = "";
$user_email = "";
$user_phone = "";
$user_website = "";
$user_address = "";
$user_username = "";
$user_password = "";

$sql = "SELECT `firstName`, `lastName`, `gender`, `fatherName`, `motherName`, `bloodGroup`, `religion`, `email`, `phone`, `website`, `address`, `username`, `password` FROM `assignment1` WHERE `id`=$user_id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $user_firstName = $row["firstName"];
    $user_lastName = $row["lastName"];
    $user_gender = $row["gender"];
    $user_fatherName = $row["fatherName"];
    $user_motherName = $row["motherName"];
    $user_bloodGroup = $row["bloodGroup"];
    $user_religion = $row["religion"];
    $user_email = $row["email"];
    $user_phone = $row["phone"];
    $user_website = $row["website"];
    $user_address = $row["address"];
    $user_username = $row["username"];
    $user_password = $row["password"];
    break;
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
</head>

<body>
  <h1>Dashboard</h1>
  <h3>Hello, <?php echo $user_firstName . " " . $user_lastName; ?></h3>
  <p>username -- <?php echo $user_username; ?></p>
  <hr>

  <form>
    <table>
      <tr>
        <td>
          <fieldset>
            <legend>General Information:</legend>

            <table>
              <tr>
              <tr>
                <th><br>Name</th>
                <td nowrap><br><?php echo ": ";
                echo $user_firstName . " " . $user_lastName; ?></td>
                <td rowspan="7"><img src="Profile.jpg" alt="Profile" width="200" height="200"></td>
              </tr>
              <tr>
                <th><br>Gender</th>
                <td nowrap><br><?php echo ": ";
                echo $user_gender; ?></td>
              </tr>
              <tr>
                <th><br>Father's Name</th>
                <td nowrap><br><?php echo ": ";
                echo $user_fatherName; ?></td>
              </tr>
              <tr>
                <th><br>Mother's Name</th>
                <td nowrap><br><?php echo ": ";
                echo $user_motherName; ?></td>
              </tr>
              <tr>
                <th><br>Blood Group</th>
                <td nowrap><br><?php echo ": ";
                echo $user_bloodGroup; ?></td>
              </tr>
              <tr>
                <th><br>Religion</th>
                <td nowrap><br><?php echo ": ";
                echo $user_religion; ?></td>
              </tr>
      </tr>
    </table>
    </fieldset>

    <td>
      <fieldset>
        <legend>Contact Information:</legend>

        <table>
          <tr>
          <tr>
            <th><br>Email</th>
            <td nowrap><br><?php echo ": ";
            echo $user_email; ?></td>
          </tr>
          <tr>
            <th><br>Phone/Mobile</th>
            <td nowrap><br><?php echo ": ";
            echo $user_phone; ?></td>
          </tr>
          <tr>
            <th><br>Website</th>
            <td nowrap><br>: <?php echo $user_website; ?></a></td>
          </tr>
          <tr nowrap>
            <th nowrap><br>Present Address</th>
            <td nowrap>
              <br><?php echo ": ";
              echo $user_address; ?>
            </td>
          </tr>
          </tr>
        </table>
      </fieldset>
      <br><input type="submit" formaction="logout.php" value="Logout">
    </td>
    </td>
    </tr>
    </table>
  </form>

</body>

</html>