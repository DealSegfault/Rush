<div class="nav-container">
<select id="sel_id" name="category"  onchange="valuesOfAll(this.value)">
<option value="Scarf">Scarves</option>
<option value="Pull">Pulls</option> 
<option value="Glasses">Glasses</option>               
</select>
</div>

<?php if($category=="Scarf"){ print ' selected'; }?>