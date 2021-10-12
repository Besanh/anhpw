<!-- Js Implement Plugin -->
@stack('script-cate')
@stack('script-home')
@stack('script-comming-soon')
<script src="{{ asset('js/jquery.pjax.js') }}"></script>

<script>
    $(document).ready(function() {
        $(document).pjax('a', '#pjax-cate-container')
        if ($.support.pjax) {
            $(document).on('click', 'a[data-pjax]', function(event) {
                var container = $(this).closest('[data-pjax-container]')
                console.log('11' + container)
                var containerSelector = '#' + container.id
                $.pjax.click(event, {
                    container: containerSelector
                })
            })
            $.pjax.defaults.timeout = 1200
        }

        function applyFilters() {
            var url = urlForFilters()
            $.pjax({
                url: url,
                container: '#pjax-cate-container'
            })
        }
    });

</script>
