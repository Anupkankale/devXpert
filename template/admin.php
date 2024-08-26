<div class="wrap">
<h1> DevXpert Plugin </h1>
<?php settings_errors();  ?>

<form method="post" action="options.php"> 
<?php

settings_fields('devXpert_option_group');

do_settings_sections('devXpert_plugin' );

submit_button();
?>

</form> 
</div>