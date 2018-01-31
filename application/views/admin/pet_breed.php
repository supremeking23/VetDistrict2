 
<!-- wala na to -->

 <select id="pet_type" name="pet_type" class="form-control">
                                 <option value="">Pet Type</option>
                                <?php foreach($pet_type as $type):?>
                                 
                                 <option value="<?php echo $type['pettype_id']?>"><?php echo $type['pet_type'];?></option>
                                 <?php ?>
                               <?php endforeach;?>
                               </select>