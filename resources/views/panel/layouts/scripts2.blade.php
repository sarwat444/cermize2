 <!-- latest jquery-->
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/jquery.min.js')}}"></script>
 <!-- Bootstrap js-->
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
 <!-- feather icon js-->
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/icons/feather-icon/feather.min.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/icons/feather-icon/feather-icon.js')}}"></script>
 <!-- scrollbar js-->
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/scrollbar/simplebar.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/scrollbar/custom.js')}}"></script>
 <!-- Sidebar jquery-->
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/config.js')}}"></script>
 <!-- Plugins JS start-->
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/sidebar-menu.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/sidebar-pin.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/clock.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/slick/slick.min.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/slick/slick.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/header-slick.js')}}"></script>
 <!--
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/apex-chart.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/stock-prices.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/moment.min.js')}}"></script>
 -->
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/notify/bootstrap-notify.min.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/dashboard/default.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/notify/index.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/typeahead/handlebars.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/typeahead/typeahead.bundle.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/typeahead/typeahead.custom.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/typeahead-search/handlebars.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/typeahead-search/typeahead-custom.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/height-equal.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/animation/wow/wow.min.js')}}"></script>
 <!-- Plugins JS Ends-->
 <!-- Theme js-->
<script src="{{asset(config('constants.asset_path').'assets/panel/js/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/sweet-alert/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/sweet-alert/app.js')}}" type="text/javascript"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/custom.sweet.js')}}" type="text/javascript"></script>

<script>
    $(document).on('click', '.delete_item', function(event) {
        var delete_url = $(this).data('url');
        var that = this;
        event.preventDefault();
        var csrfToken = "{{ csrf_token() }}";
        swal({
            title: "{{__('delete_alert')}}",
            icon: 'warning',
            showCloseButton: true,
            buttons: {
                cancel: {
                    text: '{{__('close')}}',
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: '{{__('delete')}}',
                    value: true,
                    visible: true,
                    color: "#56ACE0",
                    className: "btn-danger",
                    closeModal: true
                }
            },
            allowOutsideClick: false
        })
        .then(function(result) {
            if (result) {
                $.ajax({
                    url    : delete_url,
                    method : 'delete',
                    type   : 'json',
                    data   : {
                        _token: csrfToken // Include CSRF token here
                    },
                    success: function(response) {
                        if (response.status) {
                            toastr.success(response.message);
                            datatable.ajax.reload();
                        } else {
                            customSweetAlert(
                                'error',
                                response.message,
                                response.errors_object
                            );

                        }
                    },
                    error: function(response) {
                        errorCustomSweet();
                    }
                });
            }
        });
    });
</script>

<script>
    jQuery.extend(jQuery.validator.messages, {
    required: "{{__('validator.required')}}",
    remote: "{{__('validator.remote')}}",
    email: "{{__('validator.email')}}",
    url: "{{__('validator.url')}}",
    date: "{{__('validator.date')}}",
    dateISO: "{{__('validator.dateISO')}}",
    number: "{{__('validator.number')}}",
    digits: "{{__('validator.digits')}}.",
    creditcard: "{{__('validator.creditcard')}}",
    equalTo: "{{__('validator.equalTo')}}",
    accept: "{{__('validator.accept')}}",
    maxlength: jQuery.validator.format("{{__('validator.maxlength')}} {0} "),
    minlength: jQuery.validator.format("{{__('validator.minlength')}} {0} "),
    rangelength: jQuery.validator.format("{{__('validator.rangelength')}} {0} {{__('and')}} {1}."),
    range: jQuery.validator.format("{{__('validator.range')}} {0} {{__('and')}} {1}."),
    max: jQuery.validator.format("{{__('validator.max')}} {0}."),
    min: jQuery.validator.format("{{__('validator.min')}} {0}.")
    });

    window.are_your_sure="{{__('are_your_sure')}}";
    window.confirm_text="{{__('confirm')}}";
    window.cancel_text="{{__('cancel')}}";
</script>

 @stack('panel_js')
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/script.js')}}"></script>
 <script src="{{asset(config('constants.asset_path').'assets/panel/js/theme-customizer/customizer.js')}}"></script>
 <script>new WOW().init();</script>
