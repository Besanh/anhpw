<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/admin/sb-admin-2.min.js') }}"></script>

<!-- Moment JS 2.29.1 -->
<script src="{{ asset('js/admin/moment.min.js') }}"></script>

{{-- Custom JS --}}
<script src="{{ asset('js/custom.js') }}"></script>

<script src="{{ asset('js/axios.min.js') }}"></script>

{{-- @livewireScripts --}}
@stack('select2')
@stack('datatable')
@stack('scripts')
@stack('update-status')
@stack('update-status-css')
@stack('ckeditor')
@stack('datepicker')
@stack('datetimepicker')
@stack('select-product')
@stack('append-input')
@stack('ckfinder-input')
@stack('jquery-ui')
@stack('script-edit-table')
@stack('script-role')
@stack('script-chart')

<!-- Channel subscribe email -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('.dropdown-menu-center h6.dropdown-header');

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{!! env('PUSHER_APP_KEY') !!}", {
        cluster: 'ap1'
    });

    // Bind data event
    async function bindDatNotification() {
        await axios.get("{{ route('latest-notification') }}").then(function(response) {
            if (response.data.id != 'undefined') {
                $("a.event-notification").last().attr("href", response.data.id)
            }
        });
    }

    /**
     * Subscriber
     * Khi event xay ra thi lay lien data vua insert trong db notification
     **/
    var channel_subscribe_email = pusher.subscribe('channel-subscribe-email');
    channel_subscribe_email.bind('event-subscribe-email', function(data) {
        let newNotificationHtml = `
        <a class="dropdown-item d-flex align-items-center event-notification" href="">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-user-plus text-white"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-bold">` + data.message + `</span>
                        <div class="small text-gray-500">` + data.created_at + `</div>
                    </div>
                </a>
        `;
        notifications.after(newNotificationHtml);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        /**
         * Them badge de hien thong bao len, con ben topbar chi khi co unread thi moi hien
         * Neu khong add span badge thi khong the hien thong bao len
         **/
        $('.nav-item a#alertsDropdown').append(`<span
                    class="badge badge-danger badge-counter badge-counter-notification"></span>`);
        $('span.badge-counter-notification').text(notificationsCount + "+");
        notificationsWrapper.show();

        bindDatNotification();
    });

    // Bill notification
    var channel_bill = pusher.subscribe('channel-bill');
    channel_bill.bind('event-bill', function(data) {
        let newNotificationHtml = `
        <a class="dropdown-item d-flex align-items-center event-notification" href="">
                    <div class="mr-3">
                        <div class="icon-circle bg-danger">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                    </div>
                    <div>
                        <span class="font-weight-bold">` + data.message + `</span>
                        <div class="small text-gray-500">` + data.created_at + `</div>
                    </div>
                </a>
        `;
        notifications.after(newNotificationHtml);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        $('.nav-item a#alertsDropdown').append(`<span
                    class="badge badge-danger badge-counter badge-counter-notification"></span>`);
        $('span.badge-counter-notification').text(notificationsCount + "+");
        notificationsWrapper.show();

        bindDatNotification();
    });

    // Contact notification
    var channel_contact = pusher.subscribe('channel-client-contact');
    channel_contact.bind('event-client-contact', function(data) {
        let newNotificationHtml = `<a class="dropdown-item d-flex align-items-center event-notification" href="">
                    <div class="mr-3">
                        <div class="icon-circle bg-success text-white">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                    </div>
                    <div>
                        <span class="font-weight-bold">` + data.message + `</span>
                        <div class="small text-gray-500">` + data.created_at + `</div>
                    </div>
                </a>
        `;
        notifications.after(newNotificationHtml);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        $('.nav-item a#alertsDropdown').append(`<span
                    class="badge badge-danger badge-counter badge-counter-notification"></span>`);
        $('span.badge-counter-notification').text(notificationsCount + "+");
        notificationsWrapper.show();

        bindDatNotification();
    });


    /**
     * Mark as read notification
     */
    $("a.mark-as-read").on("click", function() {
        $.ajax({
            type: "GET",
            url: "{{ route('mark-notification') }}",
            data: {
                id: $(this).data("id")
            }
        }).done(function() {
            console.log("Mark notification success")
            $("a.mark-as-read").find("div").find("span").removeClass("font-weight-bold")
        });
    })

    /**
     * Mark all as read notification
     */
    $("span.mark-all-read").on("click", function() {
        $.ajax({
            type: "GET",
            url: "{{ route('mark-all-read-notification') }}",
            data: {
                id: $(this).data("id")
            }
        }).done(function() {
            console.log("Mark all read notification success")
            $("a.mark-as-read").find("div").find("span").removeClass("font-weight-bold")
        });
    })

</script>

<!-- Load final -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
