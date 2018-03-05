jQuery(document).ready(function ($) {

 /*   $('a[href^="#"]').click(function(){
        var target = $(this).attr('href');
        $('html, body').animate({scrollTop: $(target).offset().top}, 800);
        return false;
    });

    if (window.location.hash) {
        scroll(0, 0);
        // smooth scroll to the anchor id
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top + 'px'
        }, 1500, 'swing');
    }*/

    var plusBtn = $('.key-wrapper .key-block .plus-btn');
    var infoBlock = $(plusBtn).parent().parent().find('.key-info-block');

    $(plusBtn).on('click', function () {
        if(!$(this).hasClass('active')) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }

        $(infoBlock).stop().slideToggle();

    });



    $('#shop-items-block .items-list .item-element').each(function() {

       $(this).find('select#pa_gramms').wrap('<div class="custom-select"></div>');

    });



    function AddProductInfoToInput() {

        var products = [];
        $('#wpcf7-f1681-o1').find('#hidden-text-area').val('');

        $('#shop-items-block .items-list .item-element').each(function() {

            var ItemChecked = jQuery(this).find('input.checkbox-item:checked').closest(this);

            if(jQuery(ItemChecked)) {

                var nameValue = $(ItemChecked).find('.product_title').text();
                var priceValue = $(ItemChecked).find('.woocommerce-variation-price .woocommerce-Price-amount').text();
                var skuValue = $(ItemChecked).find('.sku_wrapper').text();
                var quantityValue = $(ItemChecked).find('#pa_gramms').val();

                var name = nameValue;
                var price = priceValue;
                var sku = skuValue;
                var quantity = quantityValue;

                var product = [];

                product['name'] = name;
                product['price'] = price;
                product['sku'] = sku;
                product['quantity'] = quantity;

                products['product_id'] = product;

                //console.log(product['name']+', '+product['price']+', '+product['sku']+', '+product['quantity']);

                $('#wpcf7-f1681-o1').find('#hidden-text-area').val(
                    $('#wpcf7-f1681-o1').find('#hidden-text-area').val() +"\n"+
                    "NAME : "+product['name']+', '
                    +"PRICE : "+product['price']+', '
                    +"SKU : "+product['sku']+', '
                    +"QUANTITY : "+product['quantity']
                );

            }

        });


    }

    $('#shop-submit').on('click', function () {
        AddProductInfoToInput();
    });


    /*CONTACT US INFO POPUP START*/

    var contactPopup = $('div#contact-info');

    var contactUsBtn = $('#menu-contact_us_menu li a').attr('id','contact_us_link');

    if($(window).width() > 991 ) {

        $(contactUsBtn).on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(contactPopup).stop().fadeToggle(200);
        });

    }

    $('a.contact_us_link_shop[href^="#"]').click(function(e){
        //Сохраняем значение атрибута href в переменной:
        e.preventDefault();
        e.stopPropagation();
        $(contactPopup).stop().fadeToggle(200);
        var target = $(this).attr('href');
        $('html, body').animate({scrollTop: $(target).offset().top}, 300);
        return false;
    });

    /*CONTACT US INFO POPUP END*/

    $('select#pa_gramms').each(function(){
        $(this).children().eq(1).text('');
    });


    $('#mobile-menu-btn').on('click', function () {
       $('#primary-navigation').stop().slideToggle(300);
    });

});