<html>
<head>
  <title>Registration</title>
</head>
    <body>
<form method="post" action="topic2.php" enctype="">
          <fieldset style="width: 400;">
            <legend><b>REGISTRATION</b></legend>
            <table>
              <tr>
                <td align="left">First Name</td>
                <td>
                  <span style="padding: 3px;">
                    :<input type="text" name="fname" value="">
                  </span>
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
              <tr>
                <td align="left">Last Name</td>
                <td>
                  <span style="padding: 3px;">
                    :<input type="text" name="lname" value="">
                  </span>
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
              <tr>
                <td align="left">Date Of Birth</td>
                <td>
  <div style="padding: 4px;">
    <select name="dd">
      <option value="">Day</option>
      <?php for ($i = 1; $i <= 31; $i++) : ?>
        <option value="<?= $i ?>"><?= $i ?></option>
      <?php endfor; ?>
    </select>
    <b>/</b>
    <select name="mm">
    <option value="">Month</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
      </select>
    <b>/</b>
    <select name="yyyy">
      <option value="">Year</option>
      <?php for ($i = date('Y') - 8; $i >= 1900; $i--) : ?>
        <option value="<?= $i ?>"><?= $i ?></option>
      <?php endfor; ?>
    </select>
    <i>(YYYY/MM/DD)</i>
  </div>
</td>

              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
              <tr>
                <td align="left">Gender</td>
                <td>
                  <input type="radio" name="gender" value="Male" /> Male
                  <input type="radio" name="gender" value="Female" /> Female
                  <input type="radio" name="gender" value="Other" /> Other
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
              <tr>
                <td align="left">Phone</td>
                <td>
                  <span style="padding: 3px;">
                    :<input type="text" name="phone" value="">
                  </span>
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
              <tr>
                <td align="left">Email</td>
                <td>
                  <span style="padding: 3px;">
                    :<input type="email" name="email" value="">
                  </span>
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
              
              <tr>
                <td align="left">Password</td>
                <td>
                  <span style="padding: 3px;">
                    :<input type="password" name="password" value="">
                  </span>
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
              <tr>
                <td align="left">Confirm Password</td>
                <td>
                  <span style="padding: 3px;">
                    :<input type="password" name="cpassword" value="">
                  </span>
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
             
              
              <tr>
                <td colspan="2">
                  <input type="submit" name="Submit" value="Submit" />
                  <input type="reset" name="reset" value="Reset" />
                </td>
              </tr>
            </table>
          </fieldset>
        </form>
</body>
      </html>