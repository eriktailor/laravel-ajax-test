<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white text-center p-5 col-md-8 col-lg-6 mx-auto">

    <!-- Content -->
    <h1 class="fw-bold mb-3">Laravel AJAX request</h1>
    <p class="opacity-50 mb-5">Click the "Load More" button to load more students with a smooth animation, and the button will hide if you reach the last page.</p>
    <ul class="list-group text-start" id="studentsContainer">
        @include('list')
    </ul>
    <button class="btn btn-lg btn-primary px-5 py-3 mt-5" id="loadMore">Load More</button>

    <!-- Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var page = 2;

            $('#loadMore').click(function() {
                var button = $(this);

                $.ajax({
                    type: 'get',
                    url: '/students',
                    data: { page: page },
                    dataType: 'html',
                    success: function(res) {
                        page++;

                        // hide the new items initially
                        var newItems = $(res.html).hide();
                        var hasMorePages = res.hasMorePages;

                        // slidedown the new items
                        $('#studentsContainer').append(newItems);
                        newItems.slideDown();
                        
                        // hide the load more button on last page
                        if (!hasMorePages) {
                            button.hide(); // Hide the "Load More" button if there are no more pages
                        }
                    }
                }); 
            });

       });    
    </script>

</body>
</html>