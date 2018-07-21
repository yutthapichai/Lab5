<?php
$classunit = new menulink();
$connect   = $classunit->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result    = $classunit->mysqlselect($connect,NULL, "unit","active = 1 order by id ASC");

?>
<div class="w3-row">
    <div class="w3-col l2 m6 w3-center w3-section">
        <a onclick="document.getElementById('newunit').style.display = 'block'"><button class="w3-button w3-round w3-dark-gray" style="height:70px;"><i class="fa fa-pagelines w3-xxlarge w3-text-green" aria-hidden="true"></i><br> New Unit</button> </a>    
    </div> 
    <div class="w3-col l10 m6">
        <h1 class="w3-hide-small w3-hide-medium">Unit management</h1>
        <h3 class="w3-hide-large">Unit management</h3>
        <hr>
    </div>
</div>
<div class="w3-responsive">
    <table class="w3-table-all" style="min-width:1000px">
        <thead>
            <tr class="w3-dark-gray">
                <th style="width:5%">#</th>
                <th style="width:20%">Unit name</th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        <?php while ($getdata = mysqli_fetch_object($result)){?>
        <tr>
            <td><?php echo $getdata->id?></td>
            <td>
                <div class="w3-dropdown-hover" style="background:none;"><?php echo $getdata->unitnameen?>
                        <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom" style="width:250px;">                            
                            <div class="w3-container">
                                <h6>Unit TH : <?php echo $getdata->unitnameth?></h6>
                                <h6>Unit KH : <?php echo $getdata->unitnamekh?></h6>
                            </div>
                        </div>
                    </div>
            </td>
            <td>
                <a data-id="<?php echo $getdata->id?>" title="edit" id="edit" onclick="document.getElementById('editunit').style.display = 'block'"><i class="fa fa-pencil w3-button w3-green w3-round"></i></a>
                <a href="../control/unit-act.php?unit=delete&id=<?php echo $getdata->id;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-red w3-round"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table><br><br><br><br>
</div>
<br><br>
<!-- Modal NewmUnit-->
<div id="newunit" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:400px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(New)</span> Unit<hr></h3></div>
        <span onclick="document.getElementById('newunit').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/unit-act.php?unit=insert">
            <div class="w3-row-padding w3-section">
                <div class="w3-col s12 w3-padding-16">
                    <label>Unit name EN : </label>
                    <input name="uniten" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12">
                    <label>Unit name TH : </label>
                    <input name="unitth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Unit name KH : </label>
                    <input name="unitkh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Save</span></button>                 
            </div>
        </form>
    </div>
</div>
<!-- Modal EditUnit-->
<div id="editunit" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:400px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Edit)</span> Unit<hr></h3></div>
        <span onclick="document.getElementById('editunit').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/unit-act.php?unit=update">
            <div class="w3-row-padding w3-section">
                <div class="w3-col s12 w3-padding-16">
                    <label>Unit name EN : </label>
                    <input type="hidden" id="unitid" name="unitid">
                    <input id="uniten" name="uniten" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12">
                    <label>Unit name TH : </label>
                    <input id="unitth" name="unitth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Unit name KH : </label>
                    <input id="unitkh" name="unitkh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
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
		url     : "../control/unit-act.php?unit=edit",
		data    : {'unitid' : id},
		type    : "post",
                cache   : false,
                datatype:'json',
		success : function(data){
                            $('#unitid').val(data.junitid);
		            $('#uniten').val(data.juniten);
                            $('#unitth').val(data.junitth);
                            $('#unitkh').val(data.junitkh);
		}
	});  
    });
});
</script>