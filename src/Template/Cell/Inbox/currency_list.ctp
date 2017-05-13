<ul id="currencysearch">
   <?php foreach($currency as $key => $name){  ?>
  <li>
	 <label for="check"><?php echo $key; ?></label>
	 <span class="checkCol">
	 <input type="radio" id="<?php echo $key; ?>" value="<?php echo $key; ?>" data-id="<?php echo $key; ?>" name="currency">
	 <span></span> </span>
  </li>
<?php } ?>
</ul>