$( document ).ready(function() {
    var $cell = $('.image__cell');

    $cell.find('.image--basic').click(function() {
        var $thisCell = $(this).closest('.image__cell');

        if ($thisCell.hasClass('is-collapsed')) {
            $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed');
            $thisCell.removeClass('is-collapsed').addClass('is-expanded');
        } else {
            $thisCell.removeClass('is-expanded').addClass('is-collapsed');
        }
    });

    $("#select-option").change(function(){
        var attribute = $("#select-option").val();
        $.post(base_url + 'front/select_attribute', { attribute:attribute }, function(data){
            var obj = $.parseJSON(data);
            var price = obj.var_price;

            if(price){

            var float_price = parseFloat(price).toFixed(2);
                $(".attr-price").html('Php ' + float_price);
                $(".feat-image").attr("src", base_url + 'uploads/img/' + obj.var_image);
                $(".price").val(obj.prod_var_id);
            }
        });
    });

    $( ".select-thumb" ).on( "click", function() {
        var image = $(this).attr('rel');
         $(".feat-image").attr("src", base_url + 'uploads/img/' + image);
    });

    $('#group-ads').on('click', '.remove-photo', function(){
        var id = this.id;
        $(this).closest('.control-ads').remove();
        $.post(base_url + 'front/remove_ads', { id:id }, function(data){
            /*window.location.reload();*/
            console.log(data);
        }); 
    });

    $('.fancybox').fancybox();

    $("#check-account").click( function(){
        $( "#create-account" ).slideToggle( "slow" );
    }); 

    $("#diff-account").click( function(){
        $( "#shipping" ).slideToggle( "slow" );
    }); 

    console.log('%c Develop by Jerome Dela Cruz! ', 'background: red; color: #fff; font-size: 16px;');  
});