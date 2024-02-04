
<?php
if (count($errors) > 0) {
  foreach ($errors as $key => $err) {
    echo "<p class='text-danger p-2 text-center mb-2 border border-danger' onclick='this.remove()'>$err</p>";
  }
}
