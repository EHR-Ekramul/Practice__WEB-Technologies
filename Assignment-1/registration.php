<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
</head>

<body>
  <h1>Registration</h1>

  <form action="registrationAction.php" method="POST" novalidate id="form1">
    <table>
      <tr>
        <td>
          <fieldset>
            <legend>General Information:</legend>

            <table width="80%" border="0" cellpadding="5">
              <tr>
              <tr width="80%">
                <th><br><label for="firstName">First Name</label></th>
                <td nowrap><br>:<input type="text" name="firstName" id="firstName"
                    value="<?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : "" ?>">
                  <br>
                  <label for="error"
                    style="color: red; font-size: small;"><?php echo isset($_SESSION['err1']) ? $_SESSION['err1'] : "" ?></label>
                </td>
              </tr>
              <tr>
                <th><br><label for="lastName">Lirst Name</label></th>
                <td nowrap><br>:<input type="text" name="lastName" id="lastName"
                    value="<?php echo isset($_SESSION['lastName']) ? $_SESSION['lastName'] : "" ?>">
                </td>
              </tr>
              <tr>
                <th><br>Gender</th>
                <td nowrap><br>:
                  <input type="radio" id="male" name="gender" value="Male" checked>
                  <label for="male">Male</label>
                  <input type="radio" id="female" name="gender" value="Female">
                  <label for="female">Female</label><br>
                </td>


              </tr>
              <tr>
                <th><br><label for="fatherName">Father's Name</label></th>
                <td nowrap><br>:<input type="text" name="fatherName" id="fatherName"
                    value="<?php echo isset($_SESSION['fatherName']) ? $_SESSION['fatherName'] : "" ?>">
                  <br>
                  <label for="error"
                    style="color: red; font-size: small;"><?php echo isset($_SESSION['err2']) ? $_SESSION['err2'] : "" ?></label>
                </td>
                <td><br><input type="file" id="profile" name="profile"></td>
              </tr>
              <tr>
                <th><br><label for="motherName">Mother's Name</label></th>
                <td nowrap><br>:<input type="text" name="motherName" id="motherName"
                    value="<?php echo isset($_SESSION['motherName']) ? $_SESSION['motherName'] : "" ?>">
                  <br>
                  <label for="error"
                    style="color: red; font-size: small;"><?php echo isset($_SESSION['err3']) ? $_SESSION['err3'] : "" ?></label>
                </td>
              </tr>
              <tr>
                <th>Blood Group</th>
                <td>:
                  <select name="bloodGroup">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Religion</th>

                <td>
                  :<select id="religion" name="religion">
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                  </select>
                </td>
              </tr>
      </tr>
    </table>
    </fieldset form="form1">

    <td>
      <fieldset>
        <legend>Contact Information:</legend>

        <table width="80%" border="0" cellpadding="15">
          <tr>
          <tr>
            <th><br><label for="email">Email</label></th>
            <td nowrap><br>:<input type="email" name="email" id="email"
                value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
              <label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['err4']) ? $_SESSION['err4'] : "" ?></label>
            </td>
          </tr>
          <tr>
            <th><br><label for="phone">Phone/Mobile</label></th>
            <td nowrap><br>:<input type="text" name="phone" id="phone"
                value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?>">
              <label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['err5']) ? $_SESSION['err5'] : "" ?></label>
            </td>
          </tr>
          <tr>
            <th><br><label for="website">Website</label></th>
            <td nowrap><br>:<input type="text" name="website" id="website"
                value="<?php echo isset($_SESSION['website']) ? $_SESSION['website'] : "" ?>"></td>
          </tr>
          <tr>
            <th nowrap>Address:</th>
            <td>
              <fieldset>
                <legend>Present Address</legend>
                <select name="country">
                  <option>Bangladesh</option>
                  <option>India</option>
                </select>
                <select name="city">
                  <option>Dhaka</option>
                  <option>Tangail</option>
                </select>
                <textarea name="street" rows="4" cols="20" placeholder="Street Address"
                  aria-valuetext="<?php echo isset($_SESSION['street']) ? $_SESSION['street'] : "" ?>"></textarea><br><label
                  for="error"
                  style="color: red; font-size: small;"><?php echo isset($_SESSION['err6']) ? $_SESSION['err6'] : "" ?></label>
                <input type="text" name="postCode" placeholder="Post Code"
                  value="<?php echo isset($_SESSION['postCode']) ? $_SESSION['postCode'] : "" ?>">
                <br><label for="error"
                  style="color: red; font-size: small;"><?php echo isset($_SESSION['err7']) ? $_SESSION['err7'] : "" ?></label>
              </fieldset>
            </td>
          </tr>

          </tr>
        </table>
      </fieldset form="form1">
    </td>

    <td>
      <fieldset>
        <legend>Account Information:</legend>

        <table width="80%" border="0" cellpadding="10">
          <tr>
          <tr>
            <th><br><label for="username">Username</label></th>
            <td nowrap><br>:<input type="text" name="username" id="username"
                value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>"><label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['err8']) ? $_SESSION['err8'] : "" ?></label>
            </td>
          </tr>
          <tr>
            <th><br><label for="password">Password</label></th>
            <td nowrap><br>:<input type="password" name="password" id="password"><label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['err9']) ? $_SESSION['err9'] : "" ?></label>
            </td>
          </tr>
          <tr>
            <th><br><label for="cPassword">Confirm Password</label></th>
            <td nowrap><br>:<input type="password" name="cPassword" id="cPassword"><label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['err10']) ? $_SESSION['err10'] : "" ?></label>
              <br>
              <label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['errPassMatch']) ? $_SESSION['errPassMatch'] : "" ?></label>
            </td>
          </tr>

          </tr>
        </table>
      </fieldset form="form1">
      <br>
      <input type="submit" value="Register">
      <input type="reset" value="Clear" form="form1">
      <input type="submit" name="login" id="login" formaction="login.php" value="Login">
    </td>
    </td>
    </tr>
    </table>
  </form>

</body>

</html>