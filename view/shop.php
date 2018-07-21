<?php
$classshop = new menulink();
$connect = $classshop->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result = $classshop->mysqlselect($connect,NULL, "shop","active = 1 order by shopid ASC");

?>
<div class="w3-row">
    <div class="w3-col l2 m6 w3-center w3-section">
        <a onclick="document.getElementById('newshop').style.display = 'block'"><button class="w3-button w3-round w3-dark-gray" style="height:70px;"><i class="fa fa-shopping-cart w3-xxlarge w3-text-lime" aria-hidden="true"></i><br> New Shop </button> </a>    
    </div> 
    <div class="w3-col l10 m6">
        <h1 class="w3-hide-small w3-hide-medium">Shop management</h1>
        <h3 class="w3-hide-large">Shop management</h3>
        <hr>
    </div>
</div>

<div class="w3-responsive">
    <table class="w3-table-all" style="min-width:1000px">
        <thead>
            <tr class="w3-dark-gray">
                <th style="width:3%">#</th>
                <th style="width:5%">Shopcode</th>
                <th style="width:10%">Shopname</th>
                <th style="width:15%">Address</th>
                <th style="width:10%">Contact</th>
                <th style="width:10%">Tel No.</th>
                <th style="width:10%">Term payment</th>
                <th style="width:10%">Email</th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        <?php while($getinfo = mysqli_fetch_object($result)){?>
        <tr>
            <td><?php echo $getinfo->shopid;?></td>
            <td><?php echo $getinfo->shopcode;?></td>
            <td>
                <div class="w3-dropdown-hover" style="background:none;"><?php echo $getinfo->shopnameen;?>
                        <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom" style="width:200px;">                            
                            <div class="w3-container">
                                <h6>Shop TH : <?php echo $getinfo->shopnameth;?></h6>
                                <h6>Shop KH : <?php echo $getinfo->shopnamekh;?></h6>
                            </div>
                        </div>
                    </div>
            </td>
            <td><?php echo $getinfo->shopaddress;?></td>
            <td><?php echo $getinfo->shopcontact;?></td>
            <td><?php echo $getinfo->shoptel;?></td>
            <td><?php echo $getinfo->payment;?></td>
            <td><?php echo $getinfo->shopemail;?></td>
            <td>
                <a data-id="<?php echo $getinfo->shopid;?>" title="edit" id="edit" onclick="document.getElementById('editshop').style.display = 'block'"><i class="fa fa-pencil w3-button w3-green w3-round"></i></a>
                <a href="../control/shop-act.php?shop=delete&id=<?php echo $getinfo->shopid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-red w3-round"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table><br><br><br><br>
</div>
<br><br>
<!-- Modal Newmshop-->
<div id="newshop" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:800px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(New)</span> Shop<hr></h3></div>
        <span onclick="document.getElementById('newshop').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/shop-act.php?shop=insert">
            <div class="w3-row-padding w3-section">
                <div class="w3-col l6 s12">
                    <div class="w3-col l4 s3">
                        <h6>Code shop :   </h6>
                    </div>
                    <div class="w3-col l2 s3">
                        <select class="w3-select w3-border w3-green" name="shopcode">
                            <option value="" disabled selected>-</option>
                            <?php $straz = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            for($az=0;$az < strlen($straz);$az++){
                            ?>  
                            <option value="<?php echo substr($straz,$az,1);?>"><?php echo substr($straz,$az,1);?></option>
                            <?php
                           }
                            ?>
                        </select>
                    </div>
                    <div class="w3-col l2 s3">
                        <select class="w3-select w3-border w3-pink" name="shopcode2">
                            <option value="" disabled selected>-</option>
                            <?php 
                            for($az=0;$az < strlen($straz);$az++){
                            ?>  
                            <option value="<?php echo substr($straz,$az,1);?>"><?php echo substr($straz,$az,1);?></option>
                            <?php
                           }
                            ?>
                        </select>
                    </div>
                    <div class="w3-col l2 s3">
                        <select class="w3-select w3-border w3-teal" name="shopcode3">
                            <option value="" disabled selected>-</option>
                            <?php 
                            for($az=0;$az < strlen($straz);$az++){
                            ?>  
                            <option value="<?php echo substr($straz,$az,1);?>"><?php echo substr($straz,$az,1);?></option>
                            <?php
                           }
                            ?>
                        </select>
                    </div>
                    <div class="w3-col l2 w3-hide-small">
                        &nbsp;
                    </div>
                </div>
                <div class="w3-col l6 s12">
                    <label>Shop name EN : </label>
                    <input name="shopen" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l6 s12">
                    <label>Shop name TH : </label>
                    <input name="shopth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l6 s12 ">
                    <label>Shop name KH : </label>
                    <input name="shopkh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Address : </label>
                    <textarea name="address" class="w3-input w3-border w3-round" style="resize:none" rows="3"></textarea>
                </div>
                <div class="w3-col l6 s12 ">
                    <label>Contact : </label>
                    <input name="contact" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>  
                <div class="w3-col l6 s12">
                    <label>Tel No. : </label>
                    <input name="tel" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l12 s12 w3-padding-16">
                    <div class="w3-row w3-light-gray w3-round-large w3-container">
                        <h4 class="w3-text-gray">Business</h4>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="a" name="a" value="Achitectual work" >
                                <label for="a">Achitectual work</label>
                            </p>
                        </div>
                        <div class="w3-col l4"> 
                            <p>
                                <input class="w3-check" type="checkbox" id="b" name="b" value="Civil & Contruction work" >
                                <label for="b">Civil & Contruction work</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="c" name="c" value="Machanical and Electrical System work (M&E)" >
                                <label for="c">Machanical and Electrical System work (M & E)</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="d" name="d" value="Fuel/Oil/Gas" >
                                <label for="d">Fuel / Oil / Gas</label>
                            </p>
                        </div>
                        <div class="w3-col l4"> 
                            <p>
                                <input class="w3-check" type="checkbox" id="e" name="e" value="General & Consumable" >
                                <label for="e">General & Consumable</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="f" name="f" value="Hard wear / Equipment / Tool" >
                                <label for="f">Hard wear / Equipment / Tool</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="g" name="g" value="Machanical Engineering work" >
                                <label for="g">Machanical Engineering work</label>
                            </p>
                        </div>
                        <div class="w3-col l4"> 
                            <p>
                                <input class="w3-check" type="checkbox" id="h" name="h" value="Office and Administration" >
                                <label for="h">Office and Administration</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="i" name="i" value="Return" >
                                <label for="i">Return</label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w3-col l12 s12 w3-padding-16">
                    <label>Term payment</label>
                    <select class="w3-select w3-round w3-border" name="payment">
                        <option value="" disabled selected>Select</option>
                        <option value="1">Cash</option>
                        <option value="2">Credit 7 day</option>
                        <option value="3">Credit 15 day</option>
                        <option value="4">Credit 30 day</option>
                    </select>
                </div>
                <div class="w3-col s12">
                    <label>Email : </label>
                    <input name="email" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>  
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Save</span></button>                 
            </div>
        </form>
    </div>
</div>
<!-- Modal EditShop-->
<div id="editshop" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:800px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Edit)</span> Shop</h3></div>
        <span onclick="document.getElementById('editshop').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/shop-act.php?shop=update">
            <div class="w3-row-padding w3-section">
                 <div class="w3-col l6 s12">
                    <div class="w3-col l4 s3">
                        <h6>Code shop :   </h6>
                    </div>
                    <div class="w3-col l2 s3">
                        <select class="w3-select w3-border w3-green" name="shopcode">
                            <option value="" disabled selected>-</option>
                            <?php $straz = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            for($az=0;$az < strlen($straz);$az++){
                            ?>  
                            <option value="<?php echo substr($straz,$az,1);?>"><?php echo substr($straz,$az,1);?></option>
                            <?php
                           }
                            ?>
                        </select>
                    </div>
                    <div class="w3-col l2 s3">
                        <select class="w3-select w3-border w3-pink" name="shopcode2">
                            <option value="" disabled selected>-</option>
                            <?php 
                            for($az=0;$az < strlen($straz);$az++){
                            ?>  
                            <option value="<?php echo substr($straz,$az,1);?>"><?php echo substr($straz,$az,1);?></option>
                            <?php
                           }
                            ?>
                        </select>
                    </div>
                    <div class="w3-col l2 s3">
                        <select class="w3-select w3-border w3-teal" name="shopcode3">
                            <option value="" disabled selected>-</option>
                            <?php 
                            for($az=0;$az < strlen($straz);$az++){
                            ?>  
                            <option value="<?php echo substr($straz,$az,1);?>"><?php echo substr($straz,$az,1);?></option>
                            <?php
                           }
                            ?>
                        </select>
                    </div>
                    <div class="w3-col l2 w3-hide-small">
                        &nbsp;
                    </div>
                </div>
                <div class="w3-col l6 s12">
                    <input type="hidden" id="shopid" name="shopid">
                    <label>Shop name EN : </label>
                    <input id="shopen" name="shopen" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l6 s12">
                    <label>Shop name TH : </label>
                    <input id="shopth" name="shopth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l6 s12 ">
                    <label>Shop name KH : </label>
                    <input id="shopkh" name="shopkh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col s12 w3-padding-16">
                    <label>Address : </label>
                    <textarea id="address" name="shopaddress" class="w3-input w3-border w3-round" style="resize:none" rows="3"></textarea>
                </div>
                <div class="w3-col l6 s12 ">
                    <label>Contact : </label>
                    <input id="contact" name="shopcontact" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>  
                <div class="w3-col l6 s12">
                    <label>Tel No. : </label>
                    <input id="tel" name="shoptel" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div>
                <div class="w3-col l12 s12 w3-padding-16">
                    <div class="w3-row w3-light-gray w3-round-large w3-container">
                        <h4 class="w3-text-gray">Business</h4>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="a" name="a" value="Achitectual work" >
                                <label for="a">Achitectual work</label>
                            </p>
                        </div>
                        <div class="w3-col l4"> 
                            <p>
                                <input class="w3-check" type="checkbox" id="b" name="b" value="Civil & Contruction work" >
                                <label for="b">Civil & Contruction work</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="c" name="c" value="Machanical and Electrical System work (M&E)" >
                                <label for="c">Machanical and Electrical System work (M & E)</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="d" name="d" value="Fuel/Oil/Gas" >
                                <label for="d">Fuel / Oil / Gas</label>
                            </p>
                        </div>
                        <div class="w3-col l4"> 
                            <p>
                                <input class="w3-check" type="checkbox" id="e" name="e" value="General & Consumable" >
                                <label for="e">General & Consumable</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="f" name="f" value="Hard wear / Equipment / Tool" >
                                <label for="f">Hard wear / Equipment / Tool</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="g" name="g" value="Machanical Engineering work" >
                                <label for="g">Machanical Engineering work</label>
                            </p>
                        </div>
                        <div class="w3-col l4"> 
                            <p>
                                <input class="w3-check" type="checkbox" id="h" name="h" value="Office and Administration" >
                                <label for="h">Office and Administration</label>
                            </p>
                        </div>
                        <div class="w3-col l4">
                            <p>
                                <input class="w3-check" type="checkbox" id="i" name="i" value="Return" >
                                <label for="i">Return</label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w3-col l12 s12 w3-padding-16">
                    <label>Term payment</label>
                    <select class="w3-select w3-round w3-border" name="payment">
                        <option value="" disabled selected>Select</option>
                        <option value="1">Cash</option>
                        <option value="2">Credit 7 day</option>
                        <option value="3">Credit 15 day</option>
                        <option value="4">Credit 30 day</option>
                    </select>
                </div>
                <div class="w3-col s12">
                    <label>Email : </label>
                    <input id="email" name="shopemail" class="w3-input w3-border w3-round" type="text" style="height:35px;">
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
		url     : "../control/shop-act.php?shop=edit",
		data    : {'shopid' : id},
		type    : "post",
                cache   : false,
                datatype:'json',
		success : function(data){
                            $('#shopid').val(data.jshopid);
		            $('#shopen').val(data.jshopen);
                            $('#shopth').val(data.jshopth);
                            $('#shopkh').val(data.jshopkh);
                            $('#address').val(data.jaddress);
                            $('#contact').val(data.jcontact);
                            $('#tel').val(data.jtel);
                            $('#email').val(data.jemail);
		}
	});  
    });
});
</script>