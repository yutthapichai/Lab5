<?php
$classmaterial = new menulink();
$connect = $classmaterial->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$perpage = 15;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$start = intval(($page - 1) * $perpage);
$data = $classmaterial->mysqlselect($connect, NULL,'tbl_item',"active = 1 ORDER BY item_id ASC limit {$start},{$perpage}");
?>

<div class="w3-row">
    <div class="w3-col l2 m6 w3-center w3-section">
        <a onclick="document.getElementById('Newmaterial').style.display = 'block'"><button class="w3-button w3-round w3-dark-gray" style="height:70px;"><i class="fa fa-cubes w3-xxlarge w3-text-amber" aria-hidden="true"></i><br> New material</button> </a>    
    </div> 
    <div class="w3-col l10 m6 w3-center">
        <h1 class="w3-hide-small w3-hide-medium w3-left-align">Material management</h1>
        <h4 class="w3-hide-large w3-left-align">Material management</h4>
        <?php
        $total = $classmaterial->mysqlshowrow($connect,'tbl_item',NULL);
        $totalpage = ceil($total / $perpage);
        ?>
        <div class="w3-dropdown-hover w3-responsive w3-display-topright w3-hide-small" style="height:500px;z-index:1;position:fixed;margin-top: 60px">
            <button class="w3-button w3-dark-gray w3-opacity-min w3-hover-opacity-off w3-large">Select  <i class="fa fa-list-ol w3-xlarge w3-text-amber w3-hide-small"></i></button>
            <div class="w3-dropdown-content w3-bar-block w3-border">
                <?php
                for ($i = 1; $i <= $totalpage; $i++) {
                    if($page == $i){
                    ?>
                    <a href="indexview.php?p=material&page=<?php echo $i; ?>" class="w3-button w3-amber w3-left-align w3-border-bottom"><?php echo $i; ?></a>
                    <?php }else{ ?>
                    <a href="indexview.php?p=material&page=<?php echo $i; ?>" class="w3-button w3-dark-gray w3-left-align w3-border-bottom"><?php echo $i; ?></a>
                    <?php }} ?>
            </div>
        </div>
        <div class="w3-dropdown-click w3-hide-large w3-hide-medium"> <!-- click-->
            <div onclick="myFunction('bell')" class="w3-bar-item w3-button w3-dark-gray w3-opacity-min w3-hover-opacity-off" ><i class="fa fa-list-ol w3-large w3-text-amber w3-xlarge"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
            <div id="bell" class="w3-dropdown-content w3-bar-block w3-card-4 w3-text-white w3-dark-gray w3-responsive" style="height:300px;z-index:3;position:absolute;">

                    <?php
                    for ($i = 1; $i <= $totalpage; $i++) {
                        if($page == $i){
                        ?>               
                        <a href="indexview.php?p=material&page=<?php echo $i; ?>" class="w3-border-bottom w3-amber"><?php echo $i; ?></a>  
                    <?php }else{ ?>
                        <a href="indexview.php?p=material&page=<?php echo $i; ?>" class="w3-border-bottom"><?php echo $i; ?></a>                           
                    <?php    }}  ?>

            </div>
        </div>
        <hr>
    </div>
</div>

<?php
$num    = $classmaterial->mysqlshowrow($connect,'tbl_item',NULL);
$num2    = $classmaterial->mysqlshowrow($connect,'tbl_item',"mat_code = ''");
$num3    = $classmaterial->mysqlshowrow($connect,'tbl_item',"image = ''");
?>
<div class="w3-container w3-section w3-light-gray w3-round">
    <div class="w3-row w3-section">
        <div class="w3-col l1 s12" style="margin-right:20px"><button class="w3-button w3-blue w3-round w3-mobile"><i class="fa fa-search"></i> Search</button><br class="w3-hide-large"></div>
        <div class="w3-col l6 s12"><input class="w3-input w3-round w3-border w3-left" type="text" placeholder="Enter input your search"></div>
        <div class="w3-col l4 s12 w3-center" > <br class="w3-hide-large">
            <div class="w3-row">
                <div class="w3-col l4 s12 w3-right-align">Found : <br class="w3-hide-small"><span class="w3-text-red"><?php echo $num;?></span> records.</div>
                <div class="w3-col l4 s12 w3-right-align">Material : <br class="w3-hide-small"><span class="w3-text-red"><?php echo $num2;?></span> Null.</div>
                <div class="w3-col l4 s12 w3-right-align">Image : <br class="w3-hide-small"><span class="w3-text-red"><?php echo $num3;?></span> Null.</div>
            </div>
        </div>
    </div>
      
</div>

<div class="w3-responsive"><!-- w3-responsive -->
    <table class="w3-table-all" style="min-width:1000px">
        <thead>
            <tr class="w3-dark-gray">
                <th style="width:5%">Action</th>
                <th style="width:5%">#</th>
                <th style="width:15%">Material code</th>
                <th style="width:15%">Image</th>
                <th style="width:25%">Material name</th>
                <th style="width:10%">Unit</th>
                <th style="width:10%">Unit price</th>
                <th style="width:15%">Location</th>
               
            </tr>
        </thead>
        <?php while($getinfo = mysqli_fetch_object($data)){?>
        <tr>           
            <td>
                <a data-id="<?php echo $getinfo->item_id;?>" title="edit" id="edit" onclick="document.getElementById('editmaterial').style.display = 'block'"><i class="fa fa-pencil w3-button w3-green w3-round"></i></a>
            <!--    <a href="../control/material-act.php?what=delete&id=<?php echo $getinfo->item_id;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-red w3-round"></i></a> -->
            </td>
            <td><?php echo $getinfo->item_id; ?></td>
            <td><?php if($getinfo->mat_code == ""){ ?>
                <a data-id="<?php echo $getinfo->item_id;?>" id="add" class="w3-button w3-border w3-small" title="add" onclick="document.getElementById('addcode').style.display = 'block'">Add</a>
            <?php }else{ echo $getinfo->mat_code; } ?>
            </td>
            <td>
                    <?php if ($getinfo->image == "") { ?>
                        <a data-id="<?php echo $getinfo->item_id; ?>" id="addimage" class="w3-button w3-border w3-small" title="addimage" onclick="document.getElementById('addimg').style.display = 'block'">Add image</a>
                    <?php } else { ?>
                        <a data-id="<?php echo $getinfo->item_id; ?>" id="addimage2" class="w3-button w3-border w3-small" title="view" onclick="onClick(this)" name="../upload/<?php echo $getinfo->image; ?>"><?php echo $getinfo->image; ?></a>
                    <?php } ?>
                </td>
            <td>
                <div class="w3-dropdown-hover" style="background:none;"><span><?php echo $getinfo->item_name_en; ?></span><span class="w3-hide-large w3-hide-medium w3-pale-yellow"><br><?php echo $getinfo->item_name_th; ?><br></span><span class="w3-hide-large w3-hide-medium w3-text-dark-gray w3-pale-red"><?php echo $getinfo->item_name_kh; ?></span>
                        <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-animate-zoom w3-border w3-border-gray w3-hide-small" style="width:250px;">    
                            <?php if(($getinfo->image) == ""){?>
                            <div class="w3-display-container">
                                    <img src="../img/HG.jpg" style="width:100%;" alt="No loadding" class="w3-grayscale">
                            <div class="w3-display-middle w3-container w3-text-white"><h1 class="w3-opacity-min w3-center">No Image</h1></div>
                            </div>
                            <?php }else{ ?>
                             <div class = "w3-display-container">
                                    <img src = "../upload/<?php echo $getinfo->image;?>" style = "width:100%;" alt = "No loadding">                                   
                            </div>
                            <?php } ?>
                            <div class="w3-container w3-text-white">
                                <h6>TH : <?php echo $getinfo->item_name_th; ?></h6>
                                <h6>KH : <?php echo $getinfo->item_name_kh; ?></h6>
                            </div>
                        </div>
                    </div>
            </td>
            <td><?php echo $getinfo->unit; ?></td>
            <td><?php echo $getinfo->unitprice; ?></td>
            <td><?php echo $getinfo->location; ?></td>
        </tr>
        <?php }?>
    </table><br><br><br><br>
</div>
<br><br>
<!-- Modal Newmaterial-->
<?php
$resultopt2 = $classmaterial->mysqlselect($connect,NULL, "category","parentid = 0 & active = 1 order by catecode asc");
?>
<div id="Newmaterial" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:700px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(New)</span> material<hr></h3></div>
        <span onclick="document.getElementById('Newmaterial').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/material-act.php?what=insert">
            <div class="w3-row-padding w3-section">
                <div class="w3-col s12">                    
                    <div class="w3-row w3-section w3-center">
                        <div class="w3-col l3">
                            <h6>Material code   </h6>
                        </div>
                        <div class="w3-col l1">
                            <input type="hidden" name="mats" value="-">
                            <select class="w3-select w3-border w3-red" name="option11" id="option11">
                                <option value="" disabled selected>-</option>
                                <?php while ($getcate = mysqli_fetch_object($resultopt2)) { ?>
                                    <option value="<?php echo $getcate->cateid; ?>">(<?php echo $getcate->catecode . ") " . $getcate->catenameen; ?></option>
                                <?php } ?>                      
                            </select>
                        </div>
                        <div class="w3-col l1">
                            <select class="w3-select w3-border w3-green" name="option22" id="option22">
                                <option value="" disabled selected>-</option>
                            </select>
                        </div>
                        <div class="w3-col l1">
                            <select class="w3-select w3-border w3-pink" name="option33" id="option33">
                                <option value="" disabled selected>-</option>
                            </select>
                        </div>
                        <div class="w3-col l1">
                            <select class="w3-select w3-border w3-blue" name="option44" id="option44">
                                <option value="" disabled selected>-</option>
                            </select>
                        </div>
                        <div class="w3-col l1">
                            <select class="w3-select w3-border w3-deep-orange" name="option55" id="option55">
                                <option value="" disabled selected>-</option>
                            </select>                           
                        </div>
                        <div class="w3-col l1 w3-center">
                            <i class="fa fa-minus w3-margin-top w3-text-gray" aria-hidden="true"></i>
                        </div>
                        <div class="w3-col l1">
                            <select class="w3-select w3-border w3-deep-purple" name="option66" id="option66">
                                <option value="" disabled selected>-</option>
                            </select>                           
                        </div>  
                    </div>
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Material name EN : </label>
                    <input name="matnameen" class="w3-input w3-border w3-round" type="text" style="height:35px;" required>
                </div>
                <div class="w3-col s12">
                    <label>Material name TH : </label>
                    <input name="matnameth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Material name KH : </label>
                    <input name="matnamekh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l6 s12">
                    <label>Unit name</label>
                    <input name="matunit" class="w3-input w3-border w3-round" type="text" style="height:35px;">                            
                </div>
                <div class="w3-col l6 s12">
                    <label>Unit/price</label>
                    <input name="matunitprice" class="w3-input w3-border w3-round" type="text" style="height:35px;">                            
                </div> 
                <div class="w3-col s12 w3-padding-16">
                    <label>Location : </label>
                    <textarea name="matlocation" class="w3-input w3-border w3-round" style="resize:none"></textarea>
                </div>   
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Save</span></button>                 
            </div>
        </form>
    </div>
</div>
<!-- Modal editmaterial-->
<div id="editmaterial" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:600px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Edit)</span> material<hr></h3></div>
        <span onclick="document.getElementById('editmaterial').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/material-act.php?what=update">
            <div class="w3-row-padding w3-section">
                <div class="w3-col s12">
                    <label>Material code   </label>
                    <input type="hidden" id="matid" name="matid">
                    <input id="matcode" name="matcode" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Material name EN : </label>
                    <input id="matnameen" name="matnameen" class="w3-input w3-border w3-round w3-disabled" type="text" style="height:35px;" required>
                </div>
                <div class="w3-col s12">
                    <label>Material name TH : </label>
                    <input id="matnameth" name="matnameth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Material name KH : </label>
                    <input id="matnamekh" name="matnamekh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l6 s12">
                    <label>Unit name</label>
                    <select class="w3-select w3-border w3-round" name="matunit" style="height:37px;">
                        <option value="" disabled selected>Select Unit</option>
                    <?php
                        $resultunit    = $classmaterial->mysqlselect($connect,"unitnameen", "unit",Null);                        
                        while($getunit = mysqli_fetch_object($resultunit)){ ?>
                        <option value="<?php echo $getunit->unitnameen;?>"><?php echo $getunit->unitnameen;?></option>
                    <?php } ?>                      
                    </select>                         
                </div>
                <div class="w3-col l6 s12">
                    <label>Unit/price</label>
                    <input id="matunitprice" name="matunitprice" class="w3-input w3-border w3-round" type="text" style="height:37px;">                            
                </div> 
                <div class="w3-col s12 w3-padding-16">
                    <label>Location : </label>
                    <select class="w3-select w3-border w3-round" name="matunit" style="height:37px;">
                        <option value="" disabled selected>Select Location</option>
                        <option value="HO">HO</option>   
                        <option value="HO2">HO2</option>
                    </select>
                </div> 
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Update</span></button>                 
            </div>
        </form>
    </div>
</div>

<?php
$resultopt = $classmaterial->mysqlselect($connect,NULL, "category","parentid = 0 & active = 1 order by catecode asc");
?>
<!-- Modal addcode-->
<div id="addcode" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:600px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Add)</span> material<hr></h3></div>
        <span onclick="document.getElementById('addcode').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/material-act.php?what=add">
            <div class="w3-row w3-section">
                <div class="w3-col l1">
                    &nbsp;
                </div>
                <div class="w3-col l1">
                    <input type="hidden" id="matidadd" name="matids">
                    <input type="hidden" name="mats" value="-">
                    <select class="w3-select w3-border w3-red" name="option1" id="option1">
                        <option value="" disabled selected>-</option>
                    <?php while($getcate = mysqli_fetch_object($resultopt)){ ?>
                        <option value="<?php echo $getcate->cateid;?>">(<?php echo $getcate->catecode.") ".$getcate->catenameen;?></option>
                    <?php } ?>                      
                    </select>
                </div>
                <div class="w3-col l1">
                    <select class="w3-select w3-border w3-green" name="option2" id="option2">
                        <option value="" disabled selected>-</option>
                    </select>
                </div>
                <div class="w3-col l1">
                    <select class="w3-select w3-border w3-pink" name="option3" id="option3">
                        <option value="" disabled selected>-</option>
                    </select>
                </div>
                <div class="w3-col l1">
                    <select class="w3-select w3-border w3-blue" name="option4" id="option4">
                        <option value="" disabled selected>-</option>
                    </select>
                </div>
                <div class="w3-col l1">
                    <select class="w3-select w3-border w3-deep-orange" name="option5" id="option5">
                        <option value="" disabled selected>-</option>
                    </select>                           
                </div>
                <div class="w3-col l1 w3-center">
                    <i class="fa fa-minus w3-margin-top w3-text-gray" aria-hidden="true"></i>
                </div>
                <div class="w3-col l1">
                    <select class="w3-select w3-border w3-deep-purple" name="option6" id="option6">
                        <option value="" disabled selected>-</option>
                    </select>                           
                </div>  
                <div class="w3-col l4">
                    <br class="w3-hide-large w3-hide-medium">
                    <button class="w3-button w3-green w3-round w3-right" type="submit"><i class="fa fa fa-save w3-large" aria-hidden="true"></i><span> Update</span></button>                   
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal addimage-->
<div id="addimg" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:500px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Add image)</span> material<hr></h3></div>
        <span onclick="document.getElementById('addimg').style.display = 'none'" class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" enctype="multipart/form-data" method="post" style="margin-top:-50px;" action="../control/material-act.php?what=addimage">
            <div class="w3-row w3-section">
                <div class="w3-col l10">
                    <input type="hidden" id="addidimg" name="addidimg">
                    <input type="file" name="pic" accept="image/*">
                </div>
                <div class="w3-col l2">
                    <button class="w3-button w3-green w3-round w3-right" type="submit"><i class="fa fa fa-save w3-large" aria-hidden="true"></i><span> Upload</span></button>                   
                </div>
            </div>
        </form>
    </div>
</div>

  <!-- Modal showimage-->
  <div id="showimg" class="w3-modal w3-black" style="padding-top:0" >
      <div class="w3-top">
          <button class="w3-bar-item w3-button w3-hover-green w3-green w3-xlarge w3-opacity w3-hover-opacity-off" onclick="addimg(this)">Change image</button>
          <button onclick="document.getElementById('showimg').style.display = 'none'" class="w3-bar-item w3-button w3-hover-red w3-red w3-opacity w3-hover-opacity-off"><i class="fa fa-close w3-xxlarge"></i>Close</button>  
      </div>
      <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64" style="max-width:800px;">
          <img id="img01" class="w3-image">
      </div>
  </div>
<script>
$(document).ready(function(){ 
    $('body').delegate('#edit','click',function(){
        var id = $(this).data('id');
	$.ajax({
		url     : "../control/material-act.php?what=edit",
		data    : {'matid' : id},
		type    : "post",
                cache   : false,
                datatype:'json',
		success : function(data){
		            $('#matid').val(data.jitem_id);
                            $('#matcode').val(data.jmat_code);
                            $('#matnameen').val(data.jitem_name_en);
                            $('#matnameth').val(data.jitem_name_th);
                            $('#matnamekh').val(data.jitem_name_kh);
                            $('#matunitprice').val(data.junitprice);
                            $('#matunit').val(data.junit);
                            $('#matlocation').val(data.jlocation);
		}
	});  
    });
     $('body').delegate('#add','click',function(){
        $('#matidadd').val($(this).data('id'));
    });
    $('body').delegate('#addimage','click',function(){
        $('#addidimg').val($(this).data('id'));
    });
});

function onClick(element) {
  document.getElementById("img01").src = element.name;
  document.getElementById("showimg").style.display = "block";
  $('body').delegate('#addimage2','click',function(){
    $('#addidimg').val($(this).data('id'));
  });
}
function addimg(element) {
  document.getElementById("showimg").style.display = "none";
  document.getElementById("addimg").style.display = "block";
}


$(document).ready(function(e){                                                  //add material
	$('#option1').change(function(){ 
                        var id = $('#option1').val();
			$.ajax({
				url: "../control/material-act.php?what=a",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option2').html(data);
                                        $('#option3').html('<option value="" disabled selected>-</option>');
                                        $('#option4').html('<option value="" disabled selected>-</option>');
                                        $('#option5').html('<option value="" disabled selected>-</option>');
                                        $('#option6').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option2').change(function(){ 
                        var id = $('#option2').val();
			$.ajax({
				url: "../control/material-act.php?what=b",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option3').html(data);
                                        $('#option4').html('<option value="" disabled selected>-</option>');
                                        $('#option5').html('<option value="" disabled selected>-</option>');
                                        $('#option6').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option3').change(function(){ 
                        var id = $('#option3').val();
			$.ajax({
				url: "../control/material-act.php?what=c",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option4').html(data);
                                        $('#option5').html('<option value="" disabled selected>-</option>');
                                        $('#option6').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option4').change(function(){ 
                        var id = $('#option4').val();
			$.ajax({
				url: "../control/material-act.php?what=d",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option5').html(data);
                                        $('#option6').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option5').change(function(){ 
                        var id = $('#option5').val();
			$.ajax({
				url: "../control/material-act.php?what=e",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
                                        $('#option6').html(data);
				}
			});
	});
});

$(document).ready(function(e){                                               //new material
	$('#option11').change(function(){ 
                        var id = $('#option11').val();
			$.ajax({
				url: "../control/material-act.php?what=a",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option22').html(data);
                                        $('#option33').html('<option value="" disabled selected>-</option>');
                                        $('#option44').html('<option value="" disabled selected>-</option>');
                                        $('#option55').html('<option value="" disabled selected>-</option>');
                                        $('#option66').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option22').change(function(){ 
                        var id = $('#option22').val();
			$.ajax({
				url: "../control/material-act.php?what=b",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option33').html(data);
                                        $('#option44').html('<option value="" disabled selected>-</option>');
                                        $('#option55').html('<option value="" disabled selected>-</option>');
                                        $('#option66').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option33').change(function(){ 
                        var id = $('#option33').val();
			$.ajax({
				url: "../control/material-act.php?what=c",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option44').html(data);
                                        $('#option55').html('<option value="" disabled selected>-</option>');
                                        $('#option66').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option44').change(function(){ 
                        var id = $('#option44').val();
			$.ajax({
				url: "../control/material-act.php?what=d",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
					$('#option55').html(data);
                                        $('#option66').html('<option value="" disabled selected>-</option>');
				}
			});
	});
        $('#option55').change(function(){ 
                        var id = $('#option55').val();
			$.ajax({
				url: "../control/material-act.php?what=e",
				data: {'cateid' : id},
				type: "get",				
				success: function(data){
                                        $('#option66').html(data);
				}
			});
	});
});
</script>