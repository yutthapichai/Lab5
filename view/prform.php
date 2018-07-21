<div class="w3-row">
    <div class="w3-col l12 m12">
        <br>
        <a href="indexview.php?p=pr" class="w3-text-dark-gray w3-hover-text-blue" style="text-decoration: none;font-size:18px;"><b>Purchase Requisition(PR)</b></a>
        <a href="indexview.php?p=prform" style="text-decoration: none;font-size:18px;" class="w3-disabled">>> <b>PR Form</b></a>
        <hr>
    </div>
</div>
<br><br>
<div class="w3-content w3-card-4 w3-margin-bottom" style="max-width:1200px;margin-top:-50px;">  
    <div class="w3-panel w3-padding w3-center"><h3><span class="w3-text-red">(New)</span> Form Purchase Requisition <hr></h3></div>           
        <form class="w3-container" method="post" style="margin-top:-50px;">
            <div class="w3-row w3-section">
                <div class="w3-col l1 w3-center"><img src="../img/lo.jpg" alt="scdc" style="width:50px" class="w3-circle"></div>
                <div class="w3-col l8">
                    <h6>THE SEABOARD CAMBODIAN DEVELOPMENT CONSTRUCTION CO.,LTD.</h6>
                    <h6>Trapaeng Toul Village, Kombol Commune, Dangkor District, Phnom Penh.</h6>
                    <h6>Tel.(023) 366342 - 3, Fax:(023) 368171</h6>
                </div>
                <div class="w3-col l3">
                    <p>P/R No. J105-Auto</p>
                    <p>PR Date : 15/02/2017</p>
                    <p>Delivery within<input style="height:30px;width:110px;" id="date" class="w3-input w3-border w3-round w3-right" name="date" type="text" placeholder="Enter date" required></p>
                </div>
            </div>
            <div class="w3-row-padding">
                <div class="w3-half">
                    <div class="w3-row">
                        <div class="w3-col s12">                            
                            <div onclick="pr()" class="w3-tag w3-round w3-center w3-light-gray w3-hover-dark-gray" style="cursor:pointer;margin-bottom:3px"> Other</div><label class="w3-tag w3-round w3-blue w3-center w3-right" style="margin-bottom:3px">Vendor </label> 
                            <div id="prname">
                            <select class="w3-select w3-border w3-round" name="option" style="height:38px;">
                                <option value="" selected>Choose Name</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            </div>   
                            <div id="prother" style="display:none">
                                <input class="w3-input w3-border w3-round " type="text" style="height:38px;" placeholder="Enter Name">
                            </div>         
                        </div>
                        <div class="w3-col s12">
                            <label>Address  </label>
                            <textarea class="w3-input w3-border w3-round" rows="2" placeholder="Enter address" style="width:100%;" name="comment"></textarea>
                        </div>
                        <div class="w3-col s12">
                            <label>Contact </label>
                            <input class="w3-input w3-border w3-round" type="text" style="height:35px;">
                        </div>
                        <div class="w3-col s12">
                            <label>Phone </label>
                            <input class="w3-input w3-border w3-round" type="text" style="height:35px;">
                        </div>
                        <div class="w3-col s12">
                            <label>Email </label>
                            <input class="w3-input w3-border w3-round" type="text" style="height:35px;">
                        </div>
                    </div><br>
                </div>
                <div class="w3-half">
                    <div class="w3-row">
                        <div class="w3-col s12">
                            <label class="w3-tag w3-round w3-red w3-center w3-right" style="margin-bottom:3px">Delivery to </label>
                            <select class="w3-select w3-border w3-round" name="option" style="height:38px;">
                                <option value="" disabled selected>Choose Store</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                        </div>
                        <div class="w3-col s12">
                            <label>Address </label>
                            <textarea class="w3-input w3-border w3-round" rows="2" placeholder="Enter" style="width:100%;" name="comment"></textarea>
                        </div>
                        <div class="w3-col s12">
                            <label>Contact </label>
                            <input class="w3-input w3-border w3-round" type="text" style="height:35px;">
                        </div>
                        <div class="w3-col s12">
                            <label>Phone </label>
                            <input class="w3-input w3-border w3-round" type="text" style="height:35px;">
                        </div>
                    </div><br>
                </div>
            </div>
            <div class="w3-responsive">
                <table class="w3-table-all" style="min-width:1000px">
                    <thead>
                        <tr class="w3-dark-gray">
                            <th>No.</th>
                            <th style="width:8%">Code</th>
                            <th>Description</th>
                            <th style="width:8%">Unit price</th>
                            <th style="width:8%">Q'ty</th>
                            <th style="width:8%">Unit</th>                           
                            <th style="width:8%">Amount</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><button class="w3-round-xlarge" type="button"><i class="fa fa-plus w3-text-teal"></i></button></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><textarea class="w3-input w3-border w3-round" style="resize:none"></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="w3-round-xlarge" type="button"><i class="fa fa-plus w3-text-teal"></i></button></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><textarea class="w3-input w3-border w3-round" style="resize:none"></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="w3-round-xlarge" type="button"><i class="fa fa-plus w3-text-teal"></i></button></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><textarea class="w3-input w3-border w3-round" style="resize:none"></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="w3-round-xlarge" type="button"><i class="fa fa-plus w3-text-teal"></i></button></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><textarea class="w3-input w3-border w3-round" style="resize:none"></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="w3-round-xlarge" type="button"><i class="fa fa-plus w3-text-teal"></i></button></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><input class="w3-input w3-border w3-round" type="text" style="height:35px;"></td>
                        <td><textarea class="w3-input w3-border w3-round" style="resize:none"></textarea></td>
                    </tr>
                </table>
            </div><br><br>
            <div class="w3-row">
                <div class="w3-half w3-center">
                    <div class="w3-row">
                        <div class="w3-col l2">Note</div>
                        <div class="w3-col l10"><textarea class="w3-input w3-border w3-round" style="resize:none" rows="3"></textarea></div>
                    </div>
                </div>
                <div class="w3-half w3-center w3-large">
                        <div class="w3-col l2">Total</div>
                        <div class="w3-col l2">$</div>
                        <div class="w3-col l4">18</div>       
                </div>
            </div><br><br>
            <div class="w3-row">
                <div class="w3-half w3-center">
                    <h5>Request by : yut </h5>
                    <h5>Date : 2017-07-01 16:06:04</h5>
                </div>
                <div class="w3-half w3-center">
                    <h5>Approved by :  </h5>
                    <h5>Date :</h5>
                </div>
            </div>
            <div class="w3-section w3-right"><br>
                <button class="w3-button w3-green w3-round"><i class="fa fa fa-edit fa-fw" aria-hidden="true"></i><span> Create</span></button>                 
            </div>
        </form>
</div>
<script>
function pr() {
    var x = document.getElementById('prother');
    var y = document.getElementById('prname');
    if (x.style.display === 'none') {
        x.style.display = 'block';
        y.style.display = 'none';
    }else{
        x.style.display = 'none';
        y.style.display = 'block';
    }
}
</script>