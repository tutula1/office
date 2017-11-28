<!doctype html>
<html lang="en">
    <head>
        <script src="{{ url('public/plugins/pace/pace.min.js') }}"></script>
        <link href="{{ url('public/plugins/pace/themes/pace-theme-flash.css') }}" rel="stylesheet" />
        <meta charset="UTF-8">
        <title>Laravel 5 ACL</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{ url('public/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('public/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ url('public/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('public/css/side-menu.css') }}">
        <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                @if (Auth::guest())
                @include('partials.nav')
                @include('partials.flash')
                @yield('content')
                <footer class="">
                    <hr />
                    Copyright ©2017, Duong Quang Binh
                </footer>
                @else
                <div class="col-md-3 col-sm-3">
                    @include('partials.menu')
                </div>
                <div class="col-md-9 col-sm-9">
                    @include('partials.nav')
                    @include('partials.flash')
                    @if(Session::has('breadcrumbs')){!! Session::get('breadcrumbs')->render() !!}@endif
                    @yield('content')
                    <footer class="">
                        <hr />
                        Copyright ©2017, Duong Quang Binh
                    </footer>
                    {{ var_dump(Session::all()) }}
                </div>
                @endif
            </div>
        </div>
        <script src="{{ url('public/js/jquery.min.js') }}"></script>
        <script src="{{ url('public/js/jquery-migrate.min.js') }}"></script>
        <script src="{{ url('public/js/jquery.blockui.min.js') }}"></script>
        <script src="{{ url('public/js/jquery.lazy.min.js') }}"></script>
        <script src="{{ url('public/js/notify.js') }}"></script>
        <script src="{{ url('public/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('public/plugins/select2/js/select2.full.min.js') }}"></script>
        <div class="modal fade" tabindex="-1" role="dialog" id="changePassword">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{!!trans('lang.menu.change.password')!!}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" onsubmit="return false;">
                                    <div class="form-group">
                                        <label for="Password" class="col-sm-4 control-label">{!!trans('lang.menu.password')!!}</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="Password" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ConfirmPassword" class="col-sm-4 control-label">{!!trans('lang.menu.confirm.password')!!}</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="ConfirmPassword" placeholder="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{!!trans('lang.menu.close')!!}</button>
                        <button type="button" class="btn btn-primary btn-change-password">{!!trans('lang.menu.change.password')!!}</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script type="">
            $.blockUI.defaults = { 
                // message displayed when blocking (use null for no message) 
                message:  '{!! tagImage(url("public/img/Preloader_3.gif"),0) !!}<button type="button" class="close" onclick="$.unblockUI();" aria-label="Close"><span aria-hidden="true">&times;</span></button>', 

                title: null,        // title string; only used when theme == true 
                draggable: true,    // only used when theme == true (requires jquery-ui.js to be loaded) 

                theme: false, // set to true to use with jQuery UI themes 

                // styles for the message when blocking; if you wish to disable 
                // these and use an external stylesheet then do this in your code: 
                // $.blockUI.defaults.css = {}; 
                css: { 
                    padding:        0, 
                    margin:         0, 
                    width:          '30%', 
                    top:            '40%', 
                    left:           '35%', 
                    textAlign:      'center', 
                    color:          '#000', 
                    border:         '3px solid #aaa', 
                    backgroundColor:'#fff', 
                    cursor:         'wait',
                    zIndex:        9999 
                }, 

                // minimal style set used when themes are used 
                themedCSS: { 
                    width:  '30%', 
                    top:    '40%', 
                    left:   '35%' 
                }, 

                // styles for the overlay 
                overlayCSS:  { 
                    backgroundColor: '#000', 
                    opacity:         0.6, 
                    cursor:          'wait',
                    zIndex:             9998  
                }, 

                // style to replace wait cursor before unblocking to correct issue 
                // of lingering wait cursor 
                cursorReset: 'default', 

                // styles applied when using $.growlUI 
                growlCSS: { 
                    width:    '350px', 
                    top:      '10px', 
                    left:     '', 
                    right:    '10px', 
                    border:   'none', 
                    padding:  '5px', 
                    opacity:   0.6, 
                    cursor:    null, 
                    color:    '#fff', 
                    backgroundColor: '#000', 
                    '-webkit-border-radius': '10px', 
                    '-moz-border-radius':    '10px' 
                }, 

                // IE issues: 'about:blank' fails on HTTPS and javascript:false is s-l-o-w 
                // (hat tip to Jorge H. N. de Vasconcelos) 
                iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank', 

                // force usage of iframe in non-IE browsers (handy for blocking applets) 
                forceIframe: false, 

                // z-index for the blocking overlay 
                baseZ: 1000, 

                // set these to true to have the message automatically centered 
                centerX: true, // <-- only effects element blocking (page block controlled via css above) 
                centerY: true, 

                // allow body element to be stetched in ie6; this makes blocking look better 
                // on "short" pages.  disable if you wish to prevent changes to the body height 
                allowBodyStretch: true, 

                // enable if you want key and mouse events to be disabled for content that is blocked 
                bindEvents: true, 

                // be default blockUI will supress tab navigation from leaving blocking content 
                // (if bindEvents is true) 
                constrainTabKey: true, 

                // fadeIn time in millis; set to 0 to disable fadeIn on block 
                fadeIn:  200, 

                // fadeOut time in millis; set to 0 to disable fadeOut on unblock 
                fadeOut:  400, 

                // time in millis to wait before auto-unblocking; set to 0 to disable auto-unblock 
                timeout: 0, 

                // disable if you don't want to show the overlay 
                showOverlay: true, 

                // if true, focus will be placed in the first available input field when 
                // page blocking 
                focusInput: true, 

                // suppresses the use of overlay styles on FF/Linux (due to performance issues with opacity) 
                // no longer needed in 2012 
                // applyPlatformOpacityRules: true, 

                // callback method invoked when fadeIn has completed and blocking message is visible 
                onBlock: null, 

                // callback method invoked when unblocking has completed; the callback is 
                // passed the element that has been unblocked (which is the window object for page 
                // blocks) and the options that were passed to the unblock call: 
                //   onUnblock(element, options) 
                onUnblock: null, 

                // don't ask; if you really must know: http://groups.google.com/group/jquery-en/browse_thread/thread/36640a8730503595/2f6a79a77a78e493#2f6a79a77a78e493 
                quirksmodeOffsetHack: 4, 

                // class name of the message block 
                blockMsgClass: 'blockMsg', 

                // if it is already blocked, then ignore it (don't unblock and reblock) 
                ignoreIfBlocked: false 
            }; 
            $.blockUI();
            Pace.on('start', function(){
                $.blockUI();
            });
            Pace.on('done', function(){
                $.unblockUI();
            });
            function hsvToRgb(h, s, v) {
                var r;
                var g;
                var b;

                var i = Math.floor(h * 6);
                var f = h * 6 - i;
                var p = v * (1 - s);
                var q = v * (1 - f * s);
                var t = v * (1 - (1 - f) * s);

                switch (i % 6) {
                    case 0:
                        r = v;
                        g = t;
                        b = p;
                        break;
                    case 1:
                        r = q;
                        g = v;
                        b = p;
                        break;
                    case 2:
                        r = p;
                        g = v;
                        b = t;
                        break;
                    case 3:
                        r = p;
                        g = q;
                        b = v;
                        break;
                    case 4:
                        r = t;
                        g = p;
                        b = v;
                        break;
                    case 5:
                        r = v;
                        g = p;
                        b = q;
                        break;
                }

                return {
                    r: Math.floor(r * 255),
                    g: Math.floor(g * 255),
                    b: Math.floor(b * 255)
                };
            };

            function stringToColor(string) {
                var num = 0;
                for (var i = 0; i < string.length; i++) {
                    num += string.charCodeAt(i);
                }
                var hue = num % 360;
                var rgb = hsvToRgb(hue / 360, 0.3, 0.9);

                return '#' + rgb.r.toString(16) + rgb.g.toString(16) + rgb.b.toString(16);
            };
            $.notify.defaults({
                // whether to hide the notification on click
                clickToHide: true,
                // whether to auto-hide the notification
                autoHide: true,
                // if autoHide, hide after milliseconds
                autoHideDelay: 5000,
                // show the arrow pointing at the element
                arrowShow: true,
                // arrow size in pixels
                arrowSize: 5,
                // position defines the notification position though uses the defaults below
                position: 'bottom right',
                // default positions
                elementPosition: 'bottom left',
                globalPosition: 'top right',
                // default style
                style: 'bootstrap',
                // default class (string or [string])
                className: 'error',
                // show animation
                showAnimation: 'slideDown',
                // show animation duration
                showDuration: 400,
                // hide animation
                hideAnimation: 'slideUp',
                // hide animation duration
                hideDuration: 200,
                // padding between element and notification
                gap: 2
            });
            var notify = {
                success: function success(text) {
                    $.notify(text, "success");
                },
                info: function success(text) {
                    $.notify(text, "info");
                },
                warn: function success(text) {
                    $.notify(text, "warn");
                }
            }
            $( document ).ready(function() {
                $('.lazy').Lazy();
                $( ".avatar" ).each( function(){
                    var avatarName = $(this).data('avatar');
                    $(this).css('background-color', stringToColor(avatarName));
                });
                $(".frmDelete").submit(function() {
                    return confirm("{!! trans('lang.menu.confirm.delete') !!}")
                });
                var ajaxChangePassword = false;
                $(".btn-change-password").click(function() {
                    if(ajaxChangePassword == true) {
                        return;
                    }
                    ajaxChangePassword= true;
                    var password = $("#Password").val();
                    var confirmPassword = $("#ConfirmPassword").val();
                    var go = true;
                    if(password.length < 6) {
                        notify.warn('{!! trans("lang.menu.min.password", ["length" => 6]) !!}');
                        go = false;
                    }
                    if(confirmPassword.length < 6) {
                        notify.warn('{!! trans("lang.menu.min.confirm.password", ["length" => 6]) !!}');
                        go = false;
                    }
                    if(go){
                        if(password !== confirmPassword) {
                            notify.warn('{!! trans("lang.menu.confirm.password.is.incorrect") !!}');
                            go = false;
                        }
                        if(go){
                            $.blockUI();
                            $.ajax({
                                type: "POST",
                                url: "{{ url('users/changepassword') }}",
                                data: {
                                    password: password
                                },
                                success: function(data){
                                    $.unblockUI();
                                    ajaxChangePassword = false;
                                    notify.success('{!! trans("lang.menu.change.password.success") !!}'); 
                                },
                                error: function(data){
                                    $.unblockUI();
                                    ajaxChangePassword = false;
                                    notify.warn('{!! trans("lang.menu.change.password.fail") !!}'); 
                                },
                            });
                        }
                    }
                });
            });
        </script>

        @yield('footer')

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-110120848-1', 'auto');
            ga('send', 'pageview');


            $("button").click(function(event) {
                ga('send', 'event', {
                    eventCategory: 'Button click',
                    eventAction: $(this).html(),
                    eventLabel: '{{ Request::url() }}'
                });
            });
        </script>

    </body>
</html>
