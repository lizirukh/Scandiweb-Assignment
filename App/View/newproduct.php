<?php
require("../TOOLS/header_util.php");
?>
<script type="text/javascript" src="../Scripts/productAdd.js"></script>
</head>
<body>

<div class="productAddHeader">
    <div id="productAddMessages" class="alert alert-primary" role="alert" style="display: none">
        Product has been added.
    </div>
    <div class="row">
        <div class="col-md-10">
            <h3>Product Add</h3>
        </div>
        <div class="col-md-1">
            <button id="save" type="button" class="btn btn-success btn-block">Save</button>
        </div>
        <div class="col-md-1">
            <button id="cancel" type="button" class="btn btn-secondary btn-block">Cancel</button>
        </div>
    </div>

    <hr>
</div>

<form id="productAddForm">
    <div class="row">
        <div class="col-md-1 text-right">SKU</div>
        <div class="col-md-2">
            <input class="form-control" id="SKUtxt">
        </div>
        <div id="SKUMessages" class="col-md-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-md-1 text-right">Name</div>
        <div class="col-md-2">
            <input class="form-control" id="productNametxt">
        </div>
        <div id="productNameMessages" class="col-md-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-md-1 text-right">Price ($)</div>
        <div class="col-md-2">
            <input class="form-control" id="pricetxt">
        </div>
        <div id="PriceMessages" class="col-md-2"></div>
    </div>

    <div class="row mt-4">
        <div class="col-md-1 text-right">Type Switcher</div>
        <div class="col-md-2">
            <select id="typeSwitcher" >
                <option value="-1">Type Switcher</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>
            </select>
        </div>
        <div id="SelectTypeMessages" class="col-md-2"></div>
    </div>

    <div id="subForm">
    </div>

</form>

<?php
require("../TOOLS/footer_util.php");
?>




