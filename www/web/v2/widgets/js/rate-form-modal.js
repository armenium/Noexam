$(document).ready(function(){
    "use strict";

    var RFM = {
        options: {
            device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
            ww: $(window).width(),
            wh: $(window).height(),
        },
        vars: {
            my_range_slider: null,
        },
        el: {
            js_rate_from_modal: $('#js_rate_from_modal'),
            js_best_results: $('#js_best_results'),
        },
        routs: {
            get_best_companies_url: '/companies-filter/get-best-companies/',
        },
        Init: function(){
            this.initEvents();
            this.initRangeSlider();
        },
        initEvents: function(){
            $(document)
                .on('click change keyup', '#js_rate_form_modal input', RFM.validateRateForm)
                .on('click', '#js_rate_form_modal input[data-type="term"]', RFM.updateRangeSlider)
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
                case "update_amount": // not used
                    RFM.updateRangeSlider($this);
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
            $(".js_range_slider2").ionRangeSlider({
                skin: "round",
                //values: marks,
                grid: true,
                //from: 4,
                prefix: "$",
                hide_min_max: true,
                step: 50000
            });

            RFM.vars.my_range_slider = $(".js_range_slider2").data("ionRangeSlider");
        },
        updateRangeSlider: function(){
            if(RFM.vars.my_range_slider != null){
                var values = ($(this).val() == 'rt')
                    ? ['100k','150k','200k','250k','300k']
                    : ['100k','150k','200k','250k','300k','400k','500k','600k','700k','800k','900k','1m'];
                RFM.vars.my_range_slider.update({'values': values});
            }
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

                        RFM.getBestCompanies(null);
                    }else{

                    }
                    $parent.removeClass('loading');
                }).fail(function(){
                    $parent.removeClass('loading');
                });
            }
            return false;
        },
        getBestCompanies: function(e){
            if(e){
                e.preventDefault();
            }
            var ids = [],
                data = [];

            RFM.el.js_best_results.parent().addClass('loading');

            $.ajax({
                type: 'post',
                url: RFM.routs.get_best_companies_url,
                data: data,
                format: 'json'
            }).done(function(responce){
                //console.log(responce);
                if(!responce.error){
                    RFM.el.js_best_results.html(responce.html);
                    RFM.initLazyLoad();
                }else{

                }
                RFM.el.js_best_results.parent().removeClass('loading');
            }).fail(function(){
                RFM.el.js_best_results.parent().removeClass('loading');
            });

            return false;
        },
        initLazyLoad: function(){
            if($('img.lazy').length){
                var lazyLoadInstance = new LazyLoad({
                    elements_selector: ".lazy",
                    //load_delay: 300,
                    threshold: 0
                });
            }
        },
    };

    RFM.Init();


});
