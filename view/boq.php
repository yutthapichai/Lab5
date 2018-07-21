<div class="w3-row">
    <div class="w3-col l12 m12">
        <h1 class="w3-hide-small w3-hide-medium">Bill of Quantities (BOQ)</h1>
        <h3 class="w3-hide-large">Bill of Quantities (BOQ)</h3>
        <hr>
    </div>
</div>
<div class="w3-container w3-section w3-light-gray w3-round">
    <div class="w3-row w3-section">
        <div class="w3-col l10 s12">
            <input class="w3-input w3-round w3-border w3-left" type="text" placeholder="Enter your search , name shop">
        </div>
        <div class="w3-col l2 s12 w3-center"><br class="w3-hide-large">
            <button class="w3-button w3-blue w3-round w3-mobile"><i class="fa fa-search"></i> Search</button>
        </div>
        <div class="w3-col l12 s12 w3-section">
            <select class="w3-select w3-round w3-border" name="">
                <option value="" disabled selected>Search Shop by Category</option>
                <option value="1">Achitectual work</option>
                <option value="2">Civil & Contruction work</option>
                <option value="3">Machanical and Electrical System work (M&E)</option>
                <option value="4">Fuel/Oil/Gas</option>
                <option value="1">General & Consumable</option>
                <option value="2">Hard wear / Equipment / Tool</option>
                <option value="3">Machanical Engineering work</option>
                <option value="4">Office and Administration</option>
            </select>
        </div>
    </div>    
</div>
<div class="w3-responsive">
    <div class="w3-large w3-text-gray">Show all data</div>
    <table class="w3-table-all" style="min-width:1000px">
        <thead>
            <tr class="w3-dark-gray">
                <th>#</th>
                <th>Cost code</th>
                <th>Code name</th>
                <th>Shop & Supplier</th>
                <th>Unit</th>
                <th>Unit / price</th>
                <th>Image</th>
                <th>Q'ty</th>
                <th>Jobsite</th>
                <th>Receive date</th>
            </tr>
        </thead>
        <tr>
            <td>1</td>
            <td><a onclick="document.getElementById('showboq').style.display = 'block'" title="show" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-dark-gray w3-hover-dark-gray">TH25LK-l01</span></a></td>
            <td>Steel</td>
            <td>HOKO</td>
            <td>pcs</td>
            <td>10 $</td>
            <td>pic</td>
            <td>2</td>
            <td>j106</td>
            <td>02-04-2017</td>
        </tr>
        <tr>
            <td>2</td>
            <td><a onclick="document.getElementById('showboq').style.display = 'block'" title="show" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-dark-gray w3-hover-dark-gray">TH25LK-l02</span></a></td>
            <td>Oxygen Gas</td>
            <td>Big C</td>
            <td>pcs</td>
            <td>10 $</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
        </tr>
        <tr>
            <td>3</td>
            <td><a onclick="document.getElementById('showboq').style.display = 'block'" title="show" style="cursor:pointer"><span class="w3-tag w3-round w3-center w3-dark-gray w3-hover-dark-gray">TH25LK-l03</span></a></td>
            <td>Extralux For Polising Marble</td>
            <td>Lotus</td>
            <td>pcs</td>
            <td>50 $</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
            <td>zz</td>
        </tr>
    </table>
</div>
<!-- Modal -->
<div id="showboq" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-margin-bottom" style="max-width:1000px;margin-top:-50px;">  
        <div class="w3-panel w3-padding w3-center"><h3>Purchase Requisition<hr></h3></div>
        <span onclick="document.getElementById('showboq').style.display = 'none'" 
              class="w3-button w3-display-topright w3-hover-red w3-white"><i class="fa fa-close"></i></span>           
        <div class="w3-container w3-center" style="margin-top:-50px;">
            <div class="w3-row w3-border w3-dark-gray w3-padding-8" >
                <div class="w3-col l2 s12"><span class="w3-tag w3-round w3-center w3-red w3-hover-dark-gray">Category</span></div>
                <div class="w3-col l2 s12"><span class="w3-tag w3-round w3-center w3-green w3-hover-dark-gray">Group</span></div>
                <div class="w3-col l2 s12"><span class="w3-tag w3-round w3-center w3-pink w3-hover-dark-gray">Type</span></div>
                <div class="w3-col l2 s12"><span class="w3-tag w3-round w3-center w3-blue w3-hover-dark-gray">Size </span></div>
                <div class="w3-col l2 s12"><span class="w3-tag w3-round w3-center w3-deep-orange w3-hover-dark-gray">Brand</span></div>
                <div class="w3-col l2 s12"><span class="w3-tag w3-round w3-center w3-deep-purple w3-hover-dark-gray">Info</span></div>
            </div>
            <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey">
                <div class="w3-col l2 s12">C</div>
                <div class="w3-col l2 s12">G</div>
                <div class="w3-col l2 s12">T</div>
                <div class="w3-col l2 s12">S</div>
                <div class="w3-col l2 s12">B</div>
                <div class="w3-col l2 s12">I</div>
            </div>
            <div class="w3-row w3-border-bottom w3-padding-8 w3-light-grey">
                <div class="w3-col l2 s12">Category</div>
                <div class="w3-col l2 s12">Group</div>
                <div class="w3-col l2 s12">Type</div>
                <div class="w3-col l2 s12">12mm x 12m</div>
                <div class="w3-col l2 s12">Apple</div>
                <div class="w3-col l2 s12">Info</div>
            </div>
        </div><br><br>
    </div>
</div>