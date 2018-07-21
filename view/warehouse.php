<?php
$classwh = new menulink();
$connect = $classwh->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result = $classwh->mysqlselect($connect,NULL, "warehouse",NULL);

?>
<div class="w3-row">
    <div class="w3-col l2 m6 w3-center w3-section">
        <a onclick="document.getElementById('newwarehouse').style.display = 'block'"><button class="w3-button w3-round w3-dark-gray" style="height:70px;"><i class="fa fa-university w3-xxlarge w3-text-cyan" aria-hidden="true"></i><br> New Warehouse </button> </a>    
    </div> 
    <div class="w3-col l10 m6">
        <h1 class="w3-hide-small w3-hide-medium">Warehouse management</h1>
        <h3 class="w3-hide-large">Warehouse management</h3>
        <hr>
    </div>
</div>
<div class="w3-responsive">
    <table class="w3-table-all" style="min-width:1000px">
        <thead>
            <tr class="w3-dark-gray">
                <th style="width:5%">#</th>
                <th style="width:10%">Warehouse</th>
                <th style="width:20%">Address</th>
                <th style="width:10%">Contact name</th>
                <th style="width:10%">Contact Tel.</th>
                <th style="width:10%">Active</th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        <?php while($getinfo = mysqli_fetch_object($result)){?>
        <tr>
            <td><?php echo $getinfo->id;?></td>
            <td><?php echo $getinfo->whname;?></td>
            <td><?php echo $getinfo->address;?></td>
            <td><?php echo $getinfo->contact;?></td>
            <td><?php echo $getinfo->tel;?></td>
            <td><?php if(($getinfo->active) == 1){ ?>
                <a href="../control/warehouse-act.php?warehouse=change&id=<?php echo $getinfo->id;?>&ac=0"><i class="fa fa-toggle-on w3-xlarge w3-text-orange" aria-hidden="true"></i></a>      
        <?php }else{ ?>
                <a href="../control/warehouse-act.php?warehouse=change&id=<?php echo $getinfo->id;?>&ac=1"><i class="fa fa-toggle-off w3-xlarge w3-text-gray" aria-hidden="true"></i></a> 
        <?php }?>        
            </td>
            <td>
                <a data-id="<?php echo $getinfo->id;?>" title="edit" id="edit" onclick="document.getElementById('editwarehouse').style.display = 'block'"><i class="fa fa-pencil w3-button w3-green w3-round"></i></a>
                <a href="../control/warehouse-act.php?warehouse=delete&id=<?php echo $getinfo->id;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-red w3-round"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table><br><br><br><br>
</div>
<br><br>
<!-- Modal Newwarehouse-->
<div id="newwarehouse" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:500px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(New)</span> Warehouse<hr></h3></div>
        <span onclick="document.getElementById('newwarehouse').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/warehouse-act.php?warehouse=insert">
            <div class="w3-row-padding w3-section">
                <div class="w3-col l12 s12 w3-padding-16">
                    <label>Warehous name: </label>
                    <input name="whname" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12">
                    <label>Address : </label>
                    <textarea name="whaddress" class="w3-input w3-border w3-round" style="resize:none" rows="3"></textarea>
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Contact : </label>
                    <input name="whcontact" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>  
                <div class="w3-col s12">
                    <label>Tel No. : </label>
                    <input name="whtel" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Save</span></button>                 
            </div>
        </form>
    </div>
</div>
<!-- Modal EditShop-->
<div id="editwarehouse" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:500px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Edit)</span> Warehouse</h3></div>
        <span onclick="document.getElementById('editwarehouse').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/warehouse-act.php?warehouse=update">
             <div class="w3-row-padding w3-section">
                <div class="w3-col l12 s12 w3-padding-16">
                    <label>Warehous name: </label>
                    <input type="hidden" id="whid" name="whid">
                    <input id="whname" name="whname" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12">
                    <label>Address : </label>
                    <textarea id="whaddress" name="whaddress" class="w3-input w3-border w3-round" style="resize:none" rows="3"></textarea>
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Contact : </label>
                    <input id="whcontact" name="whcontact" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>  
                <div class="w3-col s12">
                    <label>Tel No. : </label>
                    <input id="whtel" name="whtel" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Update</span></button>                 
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function(){ 
    $('body').delegate('#edit','click',function(){
        var id = $(this).data('id');
	$.ajax({
		url     : "../control/warehouse-act.php?warehouse=edit",
		data    : {'warehouseid' : id},
		type    : "post",
                cache   : false,
                datatype:'json',
		success : function(data){
                            $('#whid').val(data.jwhid);
		            $('#whname').val(data.jwhname);
                            $('#whaddress').val(data.jaddress);
                            $('#whcontact').val(data.jcontact);
                            $('#whtel').val(data.jtel);
		}
	});  
    });
});
</script>