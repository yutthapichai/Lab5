<?php
$classcate = new menulink();
$connect = $classcate->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result = $classcate->mysqlselect($connect,NULL, "category","parentid = 0 & active = 1 order by catecode asc");
$i=1;
?>
 
<div class="w3-row">
    <div class="w3-col l2 m6 w3-center w3-section">
        <a onclick="document.getElementById('newcategory').style.display = 'block'"><button class="w3-button w3-round w3-dark-gray" style="height:70px;"><i class="fa fa-sitemap w3-xxlarge w3-text-deep-orange" aria-hidden="true"></i><br> New Code</button> </a>    
    </div> 
    <div class="w3-col l10 m6">
        <h1 class="w3-hide-small w3-hide-medium">Category management</h1>
        <h3 class="w3-hide-large">Category management</h3>
        <hr>
    </div>
</div>
<div class="w3-responsive">
    <div style="min-width:1000px" class=" w3-center">
        <div class="w3-row w3-border w3-dark-gray w3-padding-8" >
            <div class="w3-col l1 s1" style="width:5%;">#</div>
            <div class="w3-col l1 s1"><span class="w3-tag w3-round w3-center w3-red w3-hover-dark-gray">Category</span></div>
            <div class="w3-col l1 s1"><span class="w3-tag w3-round w3-center w3-green w3-hover-dark-gray">Group</span></div>
            <div class="w3-col l1 s1"><span class="w3-tag w3-round w3-center w3-pink w3-hover-dark-gray">Type</span></div>
            <div class="w3-col l1 s1"><span class="w3-tag w3-round w3-center w3-blue w3-hover-dark-gray">Size </span></div>
            <div class="w3-col l1 s1"><span class="w3-tag w3-round w3-center w3-deep-orange w3-hover-dark-gray">Brand</span></div>
            <div class="w3-col l1 s1"><span class="w3-tag w3-round w3-center w3-deep-purple w3-hover-dark-gray">Info</span></div>
            <div class="w3-col l3 s3 w3-large">Description</div>
            <div class="w3-col l2 s2 w3-center">Acttion</div>
        </div>
        <?php while($getdata = mysqli_fetch_object($result)){ ?>
        <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey">
            <div class="w3-col l1 s1" style="width:5%;"><?php echo $i;?></div>
            <div class="w3-col l1 s1" onclick="test('<?php echo $getdata->cateid;?>')" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-red w3-hover-dark-gray"><?php echo $getdata->catecode;?></span></div>
            <div class="w3-col l1 s1">&nbsp;</div>
            <div class="w3-col l1 s1">&nbsp;</div>
            <div class="w3-col l1 s1">&nbsp; </div>
            <div class="w3-col l1 s1">&nbsp;</div>
            <div class="w3-col l1 s1">&nbsp;</div>
            <div class="w3-col l3 s3">
                <div class="w3-dropdown-hover" style="background:none;"><span class="w3-large"><?php echo $getdata->catenameen;?></span>
                        <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom w3-left-align" style="width:250px;">                            
                            <div class="w3-container">
                                <h6>TH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata->catenameth ?></span></h6>
                                <h6>KH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata->catenamekh ?></span></h6>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="w3-col l2 s2">
                <a data-id="<?php echo $getdata->cateid;?>" id="add" title="add" onclick="document.getElementById('addcategory').style.display = 'block'"><i class="fa fa-plus w3-button w3-dark-gray w3-round w3-hover-blue w3-opacity-min w3-hover-opacity-off" aria-hidden="true"></i></a> 
                <a data-id="<?php echo $getdata->cateid;?>" title="edit" id="edit" onclick="document.getElementById('editcategory').style.display = 'block'"><i class="fa fa-pencil w3-button w3-dark-gray w3-round w3-hover-green w3-opacity-min w3-hover-opacity-off"></i></a> 
                <a href="../control/category-act.php?cate=delete&id=<?php echo $getdata->cateid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-dark-gray w3-round w3-hover-red w3-opacity-min w3-hover-opacity-off"></i></a>
            </div>       
        </div>

        <div id="<?php echo $getdata->cateid;?>" class="w3-hide">
        <?php 
              $cateid2 = $getdata->cateid;
              $result2 = $classcate->mysqlselect($connect,NULL, "category","parentid = '".$cateid2."' and active = 1"); 
              while($getdata2 = mysqli_fetch_object($result2)){
        ?>
            <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey" id="002<?php echo $getdata2->cateid;?>">
                <div class="w3-col l1 s1" style="width:5%;"><span onclick="document.getElementById('002<?php echo $getdata2->cateid;?>').style.display = 'none'" class=" w3-opacity-max" style="cursor:pointer">Hide</span></div>
                <div class="w3-col l1 s1">&nbsp;</div>
                <div class="w3-col l1 s1" onclick="test('<?php echo $getdata2->cateid;?>')" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-green w3-hover-dark-gray"><?php echo $getdata2->catecode;?></span></div>
                <div class="w3-col l1 s1">&nbsp;</div>
                <div class="w3-col l1 s1">&nbsp; </div>
                <div class="w3-col l1 s1">&nbsp;</div>
                <div class="w3-col l1 s1">&nbsp;</div>
                <div class="w3-col l3 s3 w3-large">
                    <div class="w3-dropdown-hover" style="background:none;"><span class="w3-large"><?php echo $getdata2->catenameen; ?></span>
                                <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom w3-left-align" style="width:250px;">                            
                                    <div class="w3-container">
                                        <h6>TH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata2->catenameth ?></span></h6>
                                        <h6>KH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata2->catenamekh ?></span></h6>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="w3-col l2 s2">
                    <a data-id="<?php echo $getdata2->cateid;?>" id="add" onclick="document.getElementById('addcategory').style.display = 'block'" title="add"><i class="fa fa-plus w3-button w3-dark-gray w3-round w3-hover-blue w3-opacity-min w3-hover-opacity-off" aria-hidden="true"></i></a> 
                    <a data-id="<?php echo $getdata2->cateid;?>" title="edit" id="edit" onclick="document.getElementById('editcategory').style.display = 'block'"><i class="fa fa-pencil w3-button w3-dark-gray w3-round w3-hover-green w3-opacity-min w3-hover-opacity-off"></i></a>
                    <a href="../control/category-act.php?cate=delete&id=<?php echo $getdata2->cateid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-dark-gray w3-round w3-hover-red w3-opacity-min w3-hover-opacity-off"></i></a>
                </div>     
            </div>
            <div id="<?php echo $getdata2->cateid;?>" class="w3-hide w3-show">
        <?php 
              $cateid3 = $getdata2->cateid;
              $result3 = $classcate->mysqlselect($connect,NULL, "category","parentid = '".$cateid3."' and active = 1"); 
              while($getdata3 = mysqli_fetch_object($result3)){
        ?>
                <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey" id="003<?php echo $getdata3->cateid;?>">
                    <div class="w3-col l1 s1" style="width:5%;"><span onclick="document.getElementById('003<?php echo $getdata3->cateid;?>').style.display = 'none'" class=" w3-opacity-max" style="cursor:pointer">Hide</span></div>
                    <div class="w3-col l1 s1">&nbsp;</div>
                    <div class="w3-col l1 s1">&nbsp;</div>
                    <div class="w3-col l1 s1"  onclick="test('<?php echo $getdata3->cateid;?>')" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-pink w3-hover-dark-gray"><?php echo $getdata3->catecode;?></span></div>
                    <div class="w3-col l1 s1">&nbsp;</div>
                    <div class="w3-col l1 s1">&nbsp;</div>
                    <div class="w3-col l1 s1">&nbsp;</div>
                    <div class="w3-col l3 s3 w3-large">
                        <div class="w3-dropdown-hover" style="background:none;"><span class="w3-large"><?php echo $getdata3->catenameen; ?></span>
                                        <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom w3-left-align" style="width:250px;">                            
                                            <div class="w3-container">
                                                <h6>TH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata3->catenameth ?></span></h6>
                                                <h6>KH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata3->catenamekh ?></span></h6>
                                            </div>
                                        </div>
                                    </div> 
                    </div> 
                    <div class="w3-col l2 s2">
                        <a data-id="<?php echo $getdata3->cateid;?>" id="add" title="add" onclick="document.getElementById('addcategory').style.display = 'block'"><i class="fa fa-plus w3-button w3-dark-gray w3-round w3-hover-blue w3-opacity-min w3-hover-opacity-off" aria-hidden="true"></i></a>
                        <a data-id="<?php echo $getdata3->cateid;?>" title="edit" id="edit" onclick="document.getElementById('editcategory').style.display = 'block'"><i class="fa fa-pencil w3-button w3-dark-gray w3-round w3-hover-green w3-opacity-min w3-hover-opacity-off"></i></a> 
                        <a href="../control/category-act.php?cate=delete&id=<?php echo $getdata3->cateid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-dark-gray w3-round w3-hover-red w3-opacity-min w3-hover-opacity-off"></i></a>
                    </div>      
                </div>
                <div id="<?php echo $getdata3->cateid;?>" class="w3-hide w3-show">
        <?php 
              $cateid4 = $getdata3->cateid;
              $result4 = $classcate->mysqlselect($connect,NULL, "category","parentid = '".$cateid4."' and active = 1"); 
              while($getdata4 = mysqli_fetch_object($result4)){
        ?>    
                    <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey" id="004<?php echo $getdata4->cateid;?>">
                        <div class="w3-col l1 s1" style="width:5%;"><span onclick="document.getElementById('004<?php echo $getdata4->cateid;?>').style.display = 'none'" class=" w3-opacity-max" style="cursor:pointer">Hide</span></div>
                        <div class="w3-col l1 s1">&nbsp;</div>
                        <div class="w3-col l1 s1">&nbsp;</div>
                        <div class="w3-col l1 s1">&nbsp;</div>
                        <div class="w3-col l1 s1" onclick="test('<?php echo $getdata4->cateid;?>')" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-blue w3-hover-dark-gray"><?php echo $getdata4->catecode;?></span></div>
                        <div class="w3-col l1 s1">&nbsp;</div>
                        <div class="w3-col l1 s1">&nbsp;</div>
                        <div class="w3-col l3 s3 w3-large">
                            <div class="w3-dropdown-hover" style="background:none;"><span class="w3-large"><?php echo $getdata4->catenameen; ?></span>
                                                <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom w3-left-align" style="width:250px;">                            
                                                    <div class="w3-container">
                                                        <h6>TH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata4->catenameth ?></span></h6>
                                                        <h6>KH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata4->catenamekh ?></span></h6>
                                                    </div>
                                                </div>
                                            </div>
                        </div> 
                        <div class="w3-col l2 s2">
                            <a data-id="<?php echo $getdata4->cateid;?>" id="add" title="add" onclick="document.getElementById('addcategory').style.display = 'block'"><i class="fa fa-plus w3-button w3-dark-gray w3-round w3-hover-blue w3-opacity-min w3-hover-opacity-off" aria-hidden="true"></i></a>
                            <a data-id="<?php echo $getdata4->cateid;?>" title="edit" id="edit" onclick="document.getElementById('editcategory').style.display = 'block'"><i class="fa fa-pencil w3-button w3-dark-gray w3-round w3-hover-green w3-opacity-min w3-hover-opacity-off"></i></a> 
                            <a href="../control/category-act.php?cate=delete&id=<?php echo $getdata4->cateid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-dark-gray w3-round w3-hover-red w3-opacity-min w3-hover-opacity-off"></i></a>
                        </div>     
                    </div> 
                    <div id="<?php echo $getdata4->cateid;?>" class="w3-hide w3-show"> 
        <?php 
              $cateid5 = $getdata4->cateid;
              $result5 = $classcate->mysqlselect($connect,NULL, "category","parentid = '".$cateid5."' and active = 1"); 
              while($getdata5 = mysqli_fetch_object($result5)){
        ?>  
                        <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey" id="005<?php echo $getdata5->cateid;?>">
                            <div class="w3-col l1 s1" style="width:5%;"><span onclick="document.getElementById('005<?php echo $getdata5->cateid;?>').style.display = 'none'" class=" w3-opacity-max" style="cursor:pointer">Hide</span></div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1" onclick="test('<?php echo $getdata5->cateid;?>')" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-deep-orange w3-hover-dark-gray"><?php echo $getdata5->catecode;?></span></div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l3 s3 w3-large">
                                <div class="w3-dropdown-hover" style="background:none;"><span class="w3-large"><?php echo $getdata5->catenameen; ?></span>
                                                        <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom w3-left-align" style="width:250px;">                            
                                                            <div class="w3-container">
                                                                <h6>TH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata5->catenameth ?></span></h6>
                                                                <h6>KH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata5->catenamekh ?></span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div> 
                            <div class="w3-col l2 s2">
                                <a data-id="<?php echo $getdata5->cateid;?>" id="add" title="add" onclick="document.getElementById('addcategory').style.display = 'block'"><i class="fa fa-plus w3-button w3-dark-gray w3-round w3-hover-blue w3-opacity-min w3-hover-opacity-off" aria-hidden="true"></i></a>
                                <a data-id="<?php echo $getdata5->cateid;?>" title="edit" id="edit" onclick="document.getElementById('editcategory').style.display = 'block'"><i class="fa fa-pencil w3-button w3-dark-gray w3-round w3-hover-green w3-opacity-min w3-hover-opacity-off"></i></a> 
                                <a href="../control/category-act.php?cate=delete&id=<?php echo $getdata5->cateid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-dark-gray w3-round w3-hover-red w3-opacity-min w3-hover-opacity-off"></i></a>
                            </div>     
                        </div>
                        <div id="<?php echo $getdata5->cateid;?>" class="w3-hide w3-show"> 
        <?php 
              $cateid6 = $getdata5->cateid;
              $result6 = $classcate->mysqlselect($connect,NULL, "category","parentid = '".$cateid6."' and active = 1"); 
              while($getdata6 = mysqli_fetch_object($result6)){
        ?>  
                        <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey" id="<?php echo $getdata6->cateid;?>">
                            <div class="w3-col l1 s1" style="width:5%;"><span onclick="document.getElementById('<?php echo $getdata6->cateid;?>').style.display = 'none'" class=" w3-opacity-max" style="cursor:pointer">Hide</span></div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1">&nbsp;</div>
                            <div class="w3-col l1 s1"><span class="w3-tag w3-round w3-center w3-deep-purple w3-hover-dark-gray"><?php echo $getdata6->catecode;?></span></div>
                            <div class="w3-col l3 s3 w3-large">
                                <div class="w3-dropdown-hover" style="background:none;"><span class="w3-large"><?php echo $getdata6->catenameen; ?></span>
                                                        <div class="w3-dropdown-content w3-card-4 w3-dark-gray w3-round w3-animate-zoom w3-left-align" style="width:250px;">                            
                                                            <div class="w3-container">
                                                                <h6>TH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata6->catenameth ?></span></h6>
                                                                <h6>KH : <span class="w3-tag w3-round w3-center w3-gray "><?php echo $getdata6->catenamekh ?></span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div> 
                            <div class="w3-col l2 s2">
                                <a data-id="<?php echo $getdata6->cateid;?>" title="edit" id="edit" onclick="document.getElementById('editcategory').style.display = 'block'"><i class="fa fa-pencil w3-button w3-dark-gray w3-round w3-hover-green w3-opacity-min w3-hover-opacity-off"></i></a> 
                                <a href="../control/category-act.php?cate=delete&id=<?php echo $getdata6->cateid;?>" title="delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-close w3-button w3-dark-gray w3-round w3-hover-red w3-opacity-min w3-hover-opacity-off"></i></a>
                            </div>     
                        </div>
                          <?php } ?>             
                    </div>
                          <?php } ?>             
                    </div>
              <?php } ?>
                </div>
             <?php } ?>
            </div>
            <?php } ?>
        </div>
            <?php $i++;} ?>
    </div><br><br><br><br>
</div>
<br><br>
<!-- Modal newcategory-->
<div id="newcategory" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:400px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(New)</span> Category<hr></h3></div>
        <span onclick="document.getElementById('newcategory').style.display = 'none'" class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/category-act.php?cate=insert"> 
            <div class="w3-row-padding w3-section">
                <div class="w3-col s3"><h6>Code : </h6></div><div class="w3-col s6">&nbsp;</div>
                <div class="w3-col s3">
                    <input name="catecode" class="w3-input w3-border w3-round" type="text" style="height:35px;" maxlength="1">
                </div>
                <div class="w3-col s12 w3-margin-top">
                    <label>Name EN : </label>
                    <input name="catenameen" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
                <div class="w3-col s12 w3-margin-top">
                    <label>Name TH : </label>
                    <input name="catenameth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
                <div class="w3-col s12 w3-margin-top">
                    <label>Name KH : </label>
                    <input name="catenamekh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Save</span></button>                 
            </div>
        </form>
    </div>
</div>
<!-- Modal addcategory-->
<div id="addcategory" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:400px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Add)</span> Category<hr></h3></div>
        <span onclick="document.getElementById('addcategory').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/category-act.php?cate=add"> 
            <div class="w3-row-padding w3-section">
                <div class="w3-col s3"><h6>Code : </h6></div><div class="w3-col s6">&nbsp;</div>
                <div class="w3-col s3">
                    <input type="hidden" id="cateidadd" name="cateid">
                    <input name="catecode" class="w3-input w3-border w3-round" type="text" style="height:35px;" maxlength="2">
                </div>
                <div class="w3-col s12 w3-margin-top">
                    <label>Name EN : </label>
                    <input name="catenameen" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
                <div class="w3-col s12 w3-margin-top">
                    <label>Name TH : </label>
                    <input name="catenameth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
                <div class="w3-col s12 w3-margin-top">
                    <label>Name KH : </label>
                    <input name="catenamekh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Add</span></button>                 
            </div>
        </form>
    </div>
</div>
<!-- Modal editcategory-->
<div id="editcategory" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom w3-round" style="max-width:400px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(Edit)</span> Category<hr></h3></div>
        <span onclick="document.getElementById('editcategory').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white w3-round"><i class="fa fa-close"></i></span>           
        <form class="w3-container" method="post" style="margin-top:-50px;" action="../control/category-act.php?cate=update"> 
            <div class="w3-row-padding w3-section">
                <div class="w3-col s3"><h6>Code : </h6></div><div class="w3-col s6">&nbsp;</div>
                <div class="w3-col s3">
                    <input type="hidden" id="cateid" name="cateid">
                    <input id="catecode" name="catecode" class="w3-input w3-border w3-round" type="text" style="height:35px;" maxlength="2">
                </div>
                <div class="w3-col s12 w3-margin-top">
                    <label>Name EN : </label>
                    <input id="catenameen" name="catenameen" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
                <div class="w3-col s12 w3-margin-top">
                    <label>Name TH : </label>
                    <input id="catenameth" name="catenameth" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
                <div class="w3-col s12 w3-margin-top">
                    <label>Name KH : </label>
                    <input id="catenamekh" name="catenamekh" class="w3-input w3-border w3-round" type="text" style="height:35px;">
                </div> 
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa fa-save fa-fw" aria-hidden="true"></i><span> Update</span></button>                 
            </div>
        </form>
    </div>
</div>
<br><br><br>
<script>
function test(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

$(document).ready(function(){ 
    $('body').delegate('#edit','click',function(){
        var id = $(this).data('id');
	$.ajax({
		url     : "../control/category-act.php?cate=edit",
		data    : {'cateid' : id},
		type    : "post",
                cache   : false,
                datatype:'json',
		success : function(data){
                            $('#cateid').val(data.jcateid);
		            $('#catecode').val(data.jcatecode);
                            $('#catenameen').val(data.jcatenameen);
                            $('#catenameth').val(data.jcatenameth);
                            $('#catenamekh').val(data.jcatenamekh);
		}
	});  
    });
    
    
    $('body').delegate('#add','click',function(){
        $('#cateidadd').val($(this).data('id'));
    });
});

</script>