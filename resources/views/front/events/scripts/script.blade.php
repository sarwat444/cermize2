<script>
    $(document).ready(function () {
        $(document).ready(function () {
            const initialSlide = 0;

            // Initialize Slick slider
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: false,
                focusOnSelect: true,
                centerMode: true,
                nextArrow: '<div class="scrtabs-tab-scroll-arrow scrtabs-tab-scroll-arrow-right" style="display: block;"><span class="glyphicon glyphicon-chevron-right"></span></div>',
                prevArrow: '<div class="scrtabs-tab-scroll-arrow scrtabs-tab-scroll-arrow-left" style="display: block;"><span class="glyphicon glyphicon-chevron-left"></span></div>',
                initialSlide: initialSlide,
                responsive: [
                    {
                        breakpoint: 900,
                        settings: {
                            slidesToShow: 2,
                            initialSlide: 0,
                            centerMode: true
                        }
                    }
                ]
            });

            // Set active-btn class for the first month
            $('.slider-nav .box').eq(initialSlide).addClass('active-btn');

            // Handle the active-btn class change and AJAX request after slide change
            $('.slider-nav').on('afterChange', function (event, slick, currentSlide) {
                $('.slider-nav .box').removeClass('active-btn');
                const currentMonthElement = $('.slider-nav .box').eq(currentSlide);
                currentMonthElement.addClass('active-btn');

                // Extract the month from the current slide (full month name)
                const month = currentMonthElement.find('.day').text(); // Use full month name

                // Show the loader
                $('#loader').show();
                $('#Tab_Content').css('visibility', 'hidden');

                // Send AJAX request to fetch events for the selected month
                $.ajax({
                    url: '/events/' + month, // Full month name in the URL
                    method: 'GET',
                    success: function(response) {
                        $('#Tab_Content').html(response); // Update the content area
                    },
                    error: function() {
                        alert('Failed to fetch events for the selected month.');
                    },
                    complete: function() {
                        $('#loader').hide();
                        $('#Tab_Content').css('visibility', 'visible');
                    }
                });
            });

            // Trigger an AJAX request for the initial slide on page load
            const initialMonth = $('.slider-nav .box').eq(initialSlide).find('.day').text(); // Use full month name

            // Show the loader
            $('#loader').show();
            $('#Tab_Content').css('visibility', 'hidden');

            $.ajax({
                url: '/events/' + initialMonth, // Full month name in the URL
                method: 'GET',
                success: function(response) {
                    $('#Tab_Content').html(response);
                },
                error: function() {
                    alert('Failed to fetch events for the current month.');
                },
                complete: function() {
                    $('#loader').hide();
                    $('#Tab_Content').css('visibility', 'visible');
                }
            });
        });

    });

</script>
