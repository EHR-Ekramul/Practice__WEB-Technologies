<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>

<body>
    <h1>Profile</h1>

    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>General Information:</legend>
                    
                    <table>
                        <tr>
                          <tr>
                            <th><br>First Name</th>   <td nowrap><br><?php echo ": ";echo $_POST['fname']; ?></td>
                            <td rowspan="7"><img src="Profile.jpeg" alt="Profile" width="200" height="200"></td>
                          </tr>
                          <tr>
                            <th><br>Last Name</th>    <td nowrap><br><?php echo ": ";echo $_POST['lname']; ?></td>
                          </tr>
                          <tr>
                            <th><br>Gender</th>   <td nowrap><br><?php echo ": ";echo $_POST['gender']; ?></td>
                          </tr>
                          <tr>
                            <th><br>Father's Name</th>    <td nowrap><br><?php echo ": ";echo $_POST['fathername']; ?></td>
                          </tr>
                          <tr>
                            <th><br>Mother's Name</th>    <td nowrap><br><?php echo ": ";echo $_POST['mothername']; ?></td>
                          </tr>
                          <tr>
                            <th><br>Blood Group</th>  <td nowrap><br><?php echo ": ";echo $_POST['blood_group']; ?></td>
                          </tr>
                          <tr>
                            <th><br>Religion</th> <td nowrap><br><?php echo ": ";echo $_POST['religion']; ?></td>
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
                                <th><br>Email</th>   <td nowrap><br><?php echo ": ";echo $_POST['email']; ?></td>
                              </tr>
                              <tr>
                                <th><br>Phone/Mobile</th>    <td nowrap><br><?php echo ": ";echo $_POST['mobile']; ?></td>
                              </tr>
                              <tr>
                                <th><br>Website</th>   <td nowrap><br>: <?php echo $_POST['website']; ?></a></td>
                              </tr>
                              <tr nowrap>
                                <th nowrap><br>Present Address</th> <td nowrap><br><?php echo ": ";echo $_POST['present_address'];echo ", ";echo $_POST['post_code'];echo ", ";echo $_POST['city'];echo ", ";echo $_POST['country']; ?></td>
                              </tr>
                            </tr>
                        </table>
                    </fieldset>
                </td>

                <td>
                    <fieldset>
                        <legend>Account Information:</legend>
                        
                        <table>
                            <tr>
                              <tr>
                                <th><br>Username</th>   <td nowrap><br><?php echo ": ";echo $_POST['username']; ?></td>
                              </tr>
                              <tr>
                                <th><br>Password</th>    <td nowrap><br><?php echo ": ";echo $_POST['password']; ?></td>
                              </tr>
                              <tr>
                                <th><br>Confirm Password</th> <td nowrap><br><?php echo ": ";echo $_POST['cpassword']; ?></td>
                              </tr>
                            </tr>
                        </table>
                    </fieldset>
                </td>

            </td>
        </tr>
    </table>

</body>
</html>