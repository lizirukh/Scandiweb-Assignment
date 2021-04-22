$(document).ready(function () {
    renderTable();

    $('#massDelete').click(function () {
        let productIDArr = new Array();
        let DVDIDArr = new Array();
        let BookIDArr = new Array();
        let FurnitureIDArr = new Array();
        $("input:checkbox[type=checkbox]:checked").each(function () {
            // ch_list.push($(this).val());
            //let element = $(this).parent().text();
            let element = $(this).parent().parent();
            let productID = $(element).find('.productID').val();
            let DVDID = $(element).find('.DVDID').val();
            let BookID = $(element).find('.BookID').val();
            let FurnitureID = $(element).find('.FurnitureID').val();
            productIDArr.push(productID);
            if (DVDID != null)
                DVDIDArr.push(DVDID);
            if (BookID != null)
                BookIDArr.push(BookID);
            if (FurnitureID != null)
                FurnitureIDArr.push(FurnitureID);

        });

        if (productIDArr.length > 0) {
            const postData = {
                productIDArray: productIDArr,
                DVDIDArray: DVDIDArr,
                BookIDArray: BookIDArr,
                FurnitureIDArray: FurnitureIDArr
            };
            $.post('../Controller/productDeleteController.php', postData, function (response) {
                console.log(response);
                $('#productDeleteMessages').show("slow");

                setTimeout(() => {
                    $('#productDeleteMessages').hide("slow");
                }, 3000);

                renderTable();
            });
        }
    });

    function renderTable() {

        $.get('../Controller/productShowController.php', function (data) {
            //console.log(data);
            let template = `<table class="container">`;
            let counter = 0;
            let helper = ``;
            JSON.parse(data).forEach((item) => {
                // console.log(`productID = ${item.productID}`);
                if (counter == 0)
                    helper = `<tr>`;
                /*
                helper += `<td class="tableData"> ${item.productID} </td>`;
                helper += `<td class="tableData"> ${item.SKU} </td>`;
                helper += `<td class="tableData"> ${item.productName} </td>`;
                helper += `<td class="tableData"> ${item.price} </td>`;
                helper += `<td class="tableData"> ${item.info} </td>`;
                */

                helper += `<td>`;
                helper += `<div class="tableShell">`;
                helper += `<fieldset class="myField">`;

                helper += `<div class="tableInfo">`;
                helper += `<input type="checkbox">`;
                helper += `<input type="hidden"  class="productID" value="${item.productID}">`;
                helper += `<input type="hidden"  class="DVDID" value="${item.DVDID}">`;
                helper += `<input type="hidden"  class="BookID" value="${item.BookID}">`;
                helper += `<input type="hidden"  class="FurnitureID" value="${item.FurnitureID}">`;
                helper += `</div>`;

                helper += `<div class="tableData">`;
                helper += `<p> ${item.SKU} </p>`;
                helper += `<p> ${item.productName} </p>`;
                helper += `<p> ${item.price} </p>`;
                helper += `<p> ${item.info} </p>`;
                helper += `</div>`;
                helper += `</fieldset>`;
                helper += `</div>`;
                helper += `</td>`;

                counter++;
                if (counter == 4) {
                    helper += `<tr>`;
                    counter = 0;
                }
                template += helper;
                helper = ``;
            });
            template += `</table>`;
            $('#productShowForm').html(template);
        });
    }
});