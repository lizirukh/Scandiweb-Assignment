<?php
require("../TOOLS/header_util.php");
?>
<script type="text/javascript" src="../Scripts/showProduct.js"></script>
</head>
<body>

<div class="productShowHeader">
    <div id="productDeleteMessages" class="alert alert-warning" role="alert" style="display: none">
        Product(s) has been deleted ...
    </div>
    <div class="row">
        <div class="col-md-9">
            <h3>Product List</h3>
        </div>
        <div class="col-md-1">
            <button id="redirectSave" type="button" class="btn btn-primary btn-block">Save</button>
        </div>
        <div class="col-md-2">
            <button id="massDelete" type="button" class="btn btn-danger btn-block">MASS DELETE</button>
        </div>
    </div>
    <hr>
</div>

<form id="productShowForm">


</form>

<?php
require("../TOOLS/footer_util.php");
?>
