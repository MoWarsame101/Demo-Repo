<?php
include_once  "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
?>
<div class="container">
    <h2>Send SMS using API</h2>
  <form action="sendsms.php" method="POST">
    <label for="country" class="form-control">Country</label>
    <select id="country" name="country" class="form-control">
      <option value="australia" class="form-control">Australia</option>
      <option value="canada" class="form-control">Canada</option>
      <option value="usa" class="form-control">USA</option>
    </select>
    <label for="mobile" class="form-control">Mobile</label>
    <input type="number" id="fname" name="mobile" placeholder="Your mobile.." class="form-control">
    <label for="message">Message</label>
    <textarea id="message" class="form-control" name="message" placeholder="Write your message.." style="height:200px"></textarea>

    <input type="submit" class="btn btn-primary" class="form-control" name="submit" value="Submit">

  </form>
</div>
</div>
<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>