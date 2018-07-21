<?php
$classjobsite = new menulink();
$connect = $classjobsite->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result = $classjobsite->mysqlselect($connect,NULL, "jobsite",NULL);

?>
<div class="w3-row">
    <div class="w3-col l2 m6 w3-center w3-section">
        <a onclick="document.getElementById('newjobsite').style.display = 'block'"><button class="w3-button w3-round w3-dark-gray" style="height:70px;"><i class="fa fa-flag-o w3-xxlarge w3-text-pink" aria-hidden="true"></i><br> New Jobsite</button> </a>    
    </div> 
    <div class="w3-col l10 m6">
        <h1 class="w3-hide-small w3-hide-medium">Jobsite Management</h1>
        <h3 class="w3-hide-large">Jobsite Management</h3>
        <hr>
    </div>
</div>
<div class="w3-responsive">
    <table class="w3-table-all" style="min-width:1000px">
        <thead>
            <tr class="w3-dark-gray">
                <th style="width:5%">#</th>
                <th style="width:10%">Job code</th>
                <th style="width:15%">Job name</th>
                <th style="width:15%">Project manager </th>
                <th style="width:10%">Active </th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        <?php while ($getdata = mysqli_fetch_object($result)){?>
        <tr>
            <td><?php echo $getdata->jobid;?></td>
            <td><?php echo $getdata->jobcode;?></td>
            <td><?php echo $getdata->jobname;?></td>
            <td><?php echo $getdata->promanager;?></td>
            <td>
        <?php if(($getdata->active) == 1){ ?>
                <a href="../control/jobsite-act.php?jobsite=change&id=<?php echo $getdata->jobid;?>&ac=0"><i class="fa fa-toggle-on w3-xlarge w3-text-orange" aria-hidden="true"></i></a>      
        <?php }else{ ?>
                <a href="../control/jobsite-act.php?jobsite=change&id=<?php echo $getdata->jobid;?>&ac=1"><i class="fa fa-toggle-off w3-xlarge w3-text-gray" aria-hidden="true"></i></a> 
        <?php }?> 
            </td>
            <td>
                <a data-id="<?php echo $getdata->jobid?>" title="edit" id="edit" onclick="document.getElementById('editjobsite').style.display = 'block'"><i class="fa fa-pencil w3-button w3-green w3-round"></i></a>
                <a href="../control/jobsite-act.php?jobsite=delete&id=<?php echo $getdata->jobid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-red w3-round"></i></a>
            </td>
        </tr>
         <?php } ?>
    </table><br><br><br><br>
</div>
<br><br>
<!-- Modal newjobsite-->
<div id="newjobsite" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:400px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(New)</span> Jobsite<hr></h3></div>
        <span onclick="document.getElementById('newjobsite').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/jobsite-act.php?jobsite=insert">
            <div class="w3-row-padding w3-section">
                <div class="w3-col s5">
                    Jobsite code 
                </div>
                <div class="w3-col s7">
                    <input name="jobcode" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12">
                    <label>Jobsite name : </label>
                    <input name="jobname" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Project manager : </label>
                    <input name="promanager" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Save</span></button>                 
            </div>
        </form>
    </div>
</div>
<!-- Modal Editjobsite-->
<div id="editjobsite" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:400px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Edit)</span> Jobsite<hr></h3></div>
        <span onclick="document.getElementById('editjobsite').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/jobsite-act.php?jobsite=update">
            <div class="w3-row-padding w3-section">
                <div class="w3-col s5">
                    Jobsite code 
                </div>
                <div class="w3-col s7">
                    <input type="hidden" id="jobid" name="jobid">
                    <input id="jobcode" name="jobcode" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12">
                    <label>Jobsite name : </label>
                    <input id="jobname" name="jobname" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Project manager : </label>
                    <input id="promanager" name="promanager" class="w3-input w3-border w3-round" type="text" style="height:35px;">
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
		url     : "../control/jobsite-act.php?jobsite=edit",
		data    : {'jobsiteid' : id},
		type    : "post",
                cache   : false,
                datatype:'json',
		success : function(data){
                            $('#jobid').val(data.jjobid);
		            $('#jobcode').val(data.jjobcode);
                            $('#jobname').val(data.jjobname);
                            $('#promanager').val(data.jpromanager);
		}
	});  
    });
});
</script>