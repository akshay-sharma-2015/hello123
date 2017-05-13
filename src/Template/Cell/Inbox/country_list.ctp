<ul id="countrysearch">
<?php foreach($country as $key => $name){ ?>
  <li>
	 <label for="check"><?php echo $name; ?></label>
	 <span class="checkCol">
	 <input type="radio" id="<?php echo $name; ?>" data-id="<?php echo $key; ?>" value="<?php echo $name; ?>" name="country">
	 <span></span> </span>
  </li>
<?php } ?>
</ul>