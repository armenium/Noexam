$(document).ready(function(){
    "use strict";

    var RFM = {
        options: {
            device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
            ww: $(window).width(),
            wh: $(window).height(),
        },
        el: {
            js_rate_from_modal: $('#js_rate_from_modal'),
        },
        Init: function(){
            this.initEvents();
            this.initRangeSlider();
        },
        initEvents: function(){
            $(document)
                .on('click change keyup', '#js_rate_form_modal input', RFM.validateRateForm)
                .on('mouseup', '[data-trigger="js_action_mouseup"]', RFM.doAction)
                .on('blur', '[data-trigger="js_action_blur"]', RFM.doAction)
                .on('change', '[data-trigger="js_action_change"]', RFM.doAction)
                .on('click', '[data-trigger="js_action_click"]', RFM.doAction)
                .on('submit', '[data-trigger="js_action_submit"]', RFM.doAction);

        },
        doAction: function(e){
            var $this = $(this),
                action = $(this).data('action');

            switch(action){
                case "display_rate_modal":
                    RFM.actionOpenRateForm($this);
                    break;
                case "hide_rate_modal":
                    RFM.actionCloseRateForm($this);
                    break;
                case "rate_form_modal_submit":
                    RFM.submitRateForm($this);
                    break;
                default:
                    break;
            }

            e.preventDefault();
        },
        initRangeSlider: function(){
            $(".js-range-slider").ionRangeSlider({
                skin: "round",
                //values: marks,
                grid: true,
                //from: 4,
                prefix: "$",
                hide_min_max: true,
                step: 50000
            });
        },
        actionOpenRateForm: function(){
            RFM.el.js_rate_from_modal.fadeIn(400);
        },
        actionCloseRateForm: function(){
            RFM.el.js_rate_from_modal.fadeOut(400);
        },
        validateRateForm: function(){
            var form = $(this).parents('form');
            var error = 0;
            var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            $(form).find('input:required, select:required, [required]').each(function(){
                if(error) return false;
                var $this = $(this);

                //console.log($this.attr('type'), $this.val());
                switch($this.attr('type')){
                    case 'email':
                        if(!$.trim($this.val()).match(pattern)){
                            //console.log('email alert');
                            $this.parents('.el').find('.el_lbl').addClass('error');
                            error = true;
                        }else{
                            $this.parents('.el').find('.el_lbl').removeClass('error');
                        }
                        break;
                    case 'text':
                    case 'number':
                        if($this.val() == ''){
                            $this.parents('.el').find('.el_lbl').addClass('error');
                            error = true;
                        }else{
                            $this.parents('.el').find('.el_lbl').removeClass('error');
                        }
                        break;
                    case undefined:
                        //console.log($this.attr('type'), $this.val());
                        var j = $(this).find('input').length;
                        var e = 0;
                        $this.find('input').each(function(i, el){
                            if(!$(el).is(':checked')){
                                e++;
                            }
                        });
                        //console.log(j, e);
                        if(e == j){
                            error = true;
                            $this.parents('.el').find('.el_lbl').addClass('error');
                            console.log('error');
                        }else{
                            $this.parents('.el').find('.el_lbl').removeClass('error');
                        }
                        break;
                }
            });

            if(error == false){
                $(form).find('#submit_btn').prop('disabled', false);
                $(form).find('.el_lbl').removeClass('error');
            }else{
                $(form).find('#submit_btn').prop('disabled', true);
            }
        },
        submitRateForm: function($yiiform){
            var $parent = $yiiform.parents('.rate-form'),
                error = RFM.validateRateForm();
            console.log(error);

            if(!error){
                $parent.addClass('loading');
                $.ajax({
                    type: $yiiform.attr('method'),
                    url: $yiiform.attr('action'),
                    data: $yiiform.serializeArray()
                }).done(function(responce){
                    console.log(responce);
                    if(!responce.error){
                        $yiiform.find('.btn-quote').addClass('clicked');
                        RFM.actionCloseRateForm();


                    }else{

                    }
                    $parent.removeClass('loading');
                }).fail(function(){
                    $parent.removeClass('loading');
                });
            }
            return false;
        },
    };

    RFM.Init();


});
