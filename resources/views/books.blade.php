<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Pagination with jQuery Ajax Request</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="container" style="max-width: 700px;">
    <div class="text-center" style="margin: 20px 0px 20px 0px;">
        <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/hHZjfUq.png"></a><br>
        <span class="text-secondary">Laravel Pagination with jQuery Ajax Request</span>
    </div>

    @if (count($books) > 0)
        <section class="books">
            @include('load_books_data')
        </section>
    @else
        No data found :(
    @endif
</div>

<script type="text/javascript">
    $(function () {
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');   // id load is the div from load-books-data blade - append loading gif untill loadbooks() function works
            var url = $(this).attr('href');
            window.history.pushState("", "", url); // the history.pushState() method adds an entry to the browser's session history stack. history.pushState(state, title [, url])
            loadBooks(url);
        });

        function loadBooks(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.books').html(data);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
    });
</script>
</body>
</html>