$(document).ready(function () {

    $("#typeSwitcher").change(function () {
        let selectedOption = $(this).children("option:selected").val();
        //alert("You have selected the country - " + selectedCountry);
        //console.log(`selected: ${selectedOption}`);
        let template = '';
        switch (selectedOption) {
            case "DVD":
                template += `<div class="row mt-3">
                               <div class="col-md-1 text-right">Size (MB)</div>
                                 <div class="col-md-2">
                                    <input class="form-control" id="MB">
                                  </div>
                                  <div id="MBMessages" class="col-md-2"></div>
                              </div>
                               <div class="row mt-1 ml-5">DVD size in MB</div>`;
                break;

            case "Furniture":
                template += `<div class="row mt-3">
                               <div class="col-md-1 text-right">Height (CM)</div>
                                 <div class="col-md-2">
                                    <input class="form-control" id="furHeight">
                                  </div>
                                  <div id="furHeightMessages" class="col-md-2"></div>
                              </div>
                              
                              <div class="row mt-3">
                               <div class="col-md-1 text-right">Width (CM)</div>
                                 <div class="col-md-2">
                                    <input class="form-control" id="furWidth">
                                  </div>
                                  <div id="furWidthMessages" class="col-md-2"></div>
                              </div>
                              
                              <div class="row mt-3">
                               <div class="col-md-1 text-right">Length (CM)</div>
                                 <div class="col-md-2">
                                    <input class="form-control" id="furLength">
                                  </div>
                                  <div id="furLengthMessages" class="col-md-2"></div>
                              </div>
                              
                              <div class="row mt-1 ml-5">Furniture HxWxL in CM </div>`;
                break;
            case "Book":
                template += `<div class="row mt-3">
                               <div class="col-md-1 text-right">Weight (KG)</div>
                                 <div class="col-md-2">
                                    <input class="form-control" id="KG">
                                  </div>
                                  <div id="KGMessages" class="col-md-2"></div>
                              </div>
                               <div class="row mt-1 ml-5">Book weight in kilograms</div>`;
                break;
            default:
                template = '';
                break;
        }//end of switch
        $('#subForm').html(template);
    });

    let valid = function (txt) {
        return txt !== null && txt.length > 0;
    }
    let isNumber = function (txt) {
        return !isNaN(txt) && !isNaN(parseFloat(txt));
    }
    let validateForm = function (SKU, productName, price, typeSwitcher, MB, furHeight, furWidth, furLength, KG) {
        let isSKU = valid(SKU);
        let isProductName = valid(productName);
        let isPrice = valid(price) && isNumber(price);
        let isTypeSwitcher = (typeSwitcher !== '-1');
        let isMB = (typeSwitcher === 'DVD') ? valid(MB) && isNumber(MB) : true;
        let isFurHeight = (typeSwitcher === 'Furniture') ? valid(furHeight) && isNumber(furHeight) : true;
        let isFurWidth = (typeSwitcher === 'Furniture') ? valid(furWidth) && isNumber(furWidth) : true;
        let isFurLength = (typeSwitcher === 'Furniture') ? valid(furLength) && isNumber(furLength) : true;
        let isKG = (typeSwitcher === 'Book') ? valid(KG) && isNumber(KG) : true;

        //update messages
        if (!isSKU)
            $('#SKUMessages').html(`<h6 class="error"> * Enter SKU </h6>`);
        else
            $('#SKUMessages').html(``);

        if (!isProductName)
            $('#productNameMessages').html(`<h6 class="error"> * Enter Name </h6>`);
        else
            $('#productNameMessages').html(``);

        if (!isPrice)
            $('#PriceMessages').html(`<h6 class="error"> * Enter Valid Price </h6>`);
        else
            $('#PriceMessages').html(``);

        if (!isTypeSwitcher)
            $('#SelectTypeMessages').html(`<h6 class="error"> * Select Type </h6>`);
        else
            $('#SelectTypeMessages').html(``);

        if (!isMB)
            $('#MBMessages').html(`<h6 class="error"> * Enter valid MB </h6>`);
        else
            $('#MBMessages').html(``);

        if (!isFurHeight)
            $('#furHeightMessages').html(`<h6 class="error"> * Enter Valid Furniture Height </h6>`);
        else
            $('#furHeightMessages').html(``);

        if (!isFurWidth)
            $('#furWidthMessages').html(`<h6 class="error"> * Enter Valid Furniture Width </h6>`);
        else
            $('#furWidthMessages').html(``);

        if (!isFurLength)
            $('#furLengthMessages').html(`<h6 class="error"> * Enter Valid Furniture Length </h6>`);
        else
            $('#furLengthMessages').html(``);

        if (!isKG)
            $('#KGMessages').html(`<h6 class="error"> * Enter Valid Kilograms </h6>`);
        else
            $('#KGMessages').html(``);

        return isSKU && isProductName && isPrice && isTypeSwitcher && isMB && isFurHeight && isFurWidth && isFurLength && isKG;
    }
    let cstTrim = function (txt) {
        // console.log(`txt = ${txt}`);
        return (txt === undefined) ? null : txt.trim();
    }
    $('#save').click(function () {
        //console.log("Save button has been clicked");
        const postData = {
            SKU: cstTrim($('#SKUtxt').val()),
            productName: cstTrim($('#productNametxt').val()),
            price: cstTrim($('#pricetxt').val()),
            typeSwitcher: $('#typeSwitcher :selected').val(),
            MB: cstTrim($('#MB').val()),
            furHeight: cstTrim($('#furHeight').val()),
            furWidth: cstTrim($('#furWidth').val()),
            furLength: cstTrim($('#furLength').val()),
            KG: cstTrim($('#KG').val())
        };

        if (validateForm(postData.SKU, postData.productName, postData.price, postData.typeSwitcher,
            postData.MB, postData.furHeight, postData.furWidth, postData.furLength, postData.KG)) {
            let url = '../Controller/Add'.concat(postData.typeSwitcher, 'Controller.php');
            $.post(url, postData, (response) => {
                console.log(`url = ${url}`);
                console.log(response);
                if (response === 'success') {
                    $('#productAddForm').trigger('reset');
                    $('#subForm').html('');
                }

            });
            /*
            $.post('../Controller/productAddController.php', postData, (response) => {
                console.log(response);
                if (response === 'success') {
                    $('#productAddForm').trigger('reset');
                    $('#subForm').html('');

                    //$('#productAddMessages').show("slow");

                    //setTimeout(() => {
                      //  $('#productAddMessages').hide("slow");
                    //}, 3000);
                }

            });
             */
        }

    });

});