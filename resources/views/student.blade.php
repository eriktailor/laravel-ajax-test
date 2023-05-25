<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-5 col-lg-6 mx-auto">

    <!-- Content -->
    <h1 class="fw-bold">Laravel AJAX request</h1>
    <p class="opacity-50 mb-5">Click the "Load More" button to load more students!</p>
    <ul class="list-group mb-4" id="studentsContainer">
        @include('list')
    </ul>
    <button class="btn btn-lg btn-primary px-4" id="loadMore">Load More</button>

    <!-- Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var page = 2;

            $('#loadMore').click(function() {
                $.ajax({
                    type: 'get',
                    url: '/students',
                    data: { page: page },
                    datatype: 'html',
                    success: function(res) {
                        page++;

                        // hide the new items initially
                        var newItems = $(res).hide();

                        // slidedown the new items
                        $('#studentsContainer').append(newItems);
                        newItems.slideDown();
                    }
                }); 
            });

       });    
    </script>

</body>
</html>