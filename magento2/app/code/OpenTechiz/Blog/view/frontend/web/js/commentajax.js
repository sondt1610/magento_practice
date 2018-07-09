define([
    "jquery",
    "jquery/ui"
], function($) {
    "use strict";

    function main(config, element) {
        var $element = $(element);
        var AjaxCommentPostUrl = config.AjaxCommentPostUrl;

        var dataForm = $('#comment_ajax');
        dataForm.mage('validation', {});

        $(document).on('click', '.submit',function(){
            if(dataForm.valid()){
                event.preventDefault();
                var param = dataForm.serialize();
                //alert(param);
                $.ajax({
                    showLoader: true,
                    url: AjaxCommentPostUrl,
                    data: param,
                    type: 'POST'
                }).done(function(data){
                    console.log(data);
                    if(data.result== 'success'){
                        document.getElementById('comment_ajax').reset();
                        $('.note').html(data.message);
                        $('.note').css('color', 'green');
                        return false;
                    }
                    else {
                        $('.note').html(data.message);
                        $('.note').css('color', 'red');
                        return false;
                    }
                    return false;
                });
            }
        });
    };
    return main;
});