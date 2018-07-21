<div class="w3-row">
    <div class="w3-col l2 m6 w3-center w3-section">
        <a href="indexview.php?p=prform"><button class="w3-button w3-round w3-red" style="height:70px;"><i class="fa fa fa-edit w3-xxlarge" aria-hidden="true"></i><br> PR Form</button> </a>    
    </div> 
    <div class="w3-col l10 m6">
        <h1 class="w3-hide-small w3-hide-medium">Purchase Requisition(PR)</h1>
        <h3 class="w3-hide-large">Purchase Requisition(PR)</h3>
        <hr>
    </div>
</div>
<div class="w3-responsive">
    <table class="w3-table-all" style="min-width:1000px">
        <thead>
            <tr class="w3-dark-gray">
                <th>#</th>
                <th>No.</th>
                <th>PR No.</th>
                <th>Request date</th>
                <th>Job site</th>
                <th>Items</th>
                <th>Total amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tr>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>wait allow</td>
            <td>
                <a href="#" title="edit"><i class="fa fa-edit w3-button w3-green w3-round"></i></a>
                <a href="#" title="delete"><i class="fa fa-times w3-button w3-red w3-round"></i></a>
                <a onclick="document.getElementById('prview').style.display = 'block'" title="manage"><i class="fa fa-eye w3-button w3-blue w3-round"></i></a>
            </td>
        </tr>
        <tr>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>New</td>
            <td>
                <a href="#"  title="edit"><i class="fa fa-edit w3-button w3-green w3-round"></i></a>
                <a href="#"  title="delete"><i class="fa fa-times w3-button w3-red w3-round"></i></a>
                <a onclick="document.getElementById('prview').style.display = 'block'"  title="manage"><i class="fa fa-eye w3-button w3-blue w3-round"></i></a>
            </td>
        </tr>
        </tr>
        <tr>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>wait allow</td>
            <td>
                <a href="#"  title="edit"><i class="fa fa-edit w3-button w3-green w3-round"></i></a>
                <a href="#"  title="delete"><i class="fa fa-times w3-button w3-red w3-round"></i></a>
                <a onclick="document.getElementById('prview').style.display = 'block'" title="manage"><i class="fa fa-eye w3-button w3-blue w3-round"></i></a>
            </td>
        </tr>
    </table>
</div>
<!-- Modal -->
<div id="prview" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom" style="max-width:1000px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3>Purchase Requisition<hr></h3></div>
        <span onclick="document.getElementById('prview').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white"><i class="fa fa-close"></i></span>           
        <div class="w3-container" style="margin-top:-50px;">
            <div class="w3-row w3-section">
                <div class="w3-col l1 w3-center"><img src="../img/lo.jpg" alt="scdc" style="width:50px" class="w3-circle"></div>
                <div class="w3-col l8">
                    <h6>THE SEABOARD CAMBODIAN DEVELOPMENT CONSTRUCTION CO.,LTD.</h6>
                    <h6>Trapaeng Toul Village, Kombol Commune, Dangkor District, Phnom Penh.</h6>
                    <h6>Tel.(023) 366342 - 3, Fax:(023) 368171</h6>
                    <h6>Job: 106</h6>
                </div>
                <div class="w3-col l3">
                    <p>P/R No. J105-00003</p>
                    <p>PR Date : 15/02/2017</p>
                    <p>Delivery within : 15/02/2017</p>
                </div>
            </div>
            <h3 class="w3-center">PURCHASE REQUEST  ( PR )</h3>
            <div class="w3-row-padding w3-light-gray"><br>
                <div class="w3-half">
                    <div class="w3-row">
                        <div class="w3-col s12">                            
                            <label class="w3-tag w3-round w3-blue w3-center" style="margin-bottom:3px">Vendor :</label> 
                            <h6><b>Name :</b> xx zz</h6>
                        </div>
                        <div class="w3-col s12">
                            <h6><b>Address :</b> xx zz</h6>
                        </div>
                        <div class="w3-col s12">
                            <h6><b>Contact :</b> xx zz</h6>
                        </div>
                        <div class="w3-col s12">
                            <h6><b>Phone :</b> xx zz</h6>
                        </div>
                        <div class="w3-col s12">
                            <h6><b>Email :</b> xx zz</h6>
                        </div>
                    </div><br>
                </div>
                <div class="w3-half">
                    <div class="w3-row">
                        <div class="w3-col s12">
                            <label class="w3-tag w3-round w3-red w3-center" style="margin-bottom:3px">Location to :</label>
                            <h6><b>Store :</b> MAKRO</h6> 
                        </div>
                        <div class="w3-col s12">
                            <h6><b>Address  :</b> Office No.149-151-153       Street  1003 ,  Phnom penh Tamay. </h6> 
                        </div>
                        <div class="w3-col s12">
                            <h6><b>Contact :</b> ชื่อผู้รับของ</h6>
                        </div>
                        <div class="w3-col s12">
                            <h6><b>Phone :</b>  เบอร์โทรผู้รับของ</h6>
                        </div>
                    </div><br>
                </div>
            </div>
            <br>
            <div class="w3-responsive">
                <table class="w3-table-all">
                    <thead>
                        <tr class="w3-dark-gray">
                            <th>No.</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Q'ty</th>
                            <th>Unit price</th>
                            <th>Amount</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                    </tr>
                    <tr>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                    </tr>
                    </tr>
                    <tr>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                        <td>zz</td>
                    </tr>
                    <tr class="w3-border-0">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total</b></td>
                        <td><b>18</b></td>
                        <td></td>
                    </tr>
                </table>
            </div><br><br>
            <div class="w3-row">
                <div class="w3-half w3-center">
                    <h5>Request by : yut </h5>
                    <h5>Date : 2017-07-01 16:06:04</h5>
                </div>
                <div class="w3-half w3-center">
                    <h5>Approved by : Admin </h5>
                    <h5>Date : 2017-07-03 16:06:04</h5>
                </div>
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round"><i class="fa fa fa-edit fa-fw" aria-hidden="true"></i><span> Confirm</span></button>                 
            </div>
        </div>
    </div>
</div>