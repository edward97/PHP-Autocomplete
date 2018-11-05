<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JQuery Autocomplete .:</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha256-eSi1q2PG6J7g7ib17yAaWMcrr5GrtohYChqibrV7PBE=" crossorigin="anonymous" />

    <!-- jQuery UI-CSS 1.12 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />
</head>
<body>
    <div class="container">
        <h1>JQuery Autocomplete with Dynamic JSON Data from PHP, Ajax & MySQL - #3</h1>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="demo">Enter Country Name</label>
                <input type="text" class="form-control" name="demo" id="ui-demo" />
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha256-VsEqElsCHSGmnmHXGQzvoWjWwoznFSZc6hs7ARLRacQ=" crossorigin="anonymous"></script>

    <!-- jQuery UI-JS 1.12 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>

    <script>
        let d;

        $("#ui-demo").autocomplete({
            source: function(request, response) {
                // console.log(request, response);
                $.ajax({
                    url: 'ajax.php',
                    method: 'get',
                    data: { name: request.term },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        // response(data);
                        
                        d = $.map(data, function(name) {
                            return {
                                label: name,
                                value: name
                            }
                        });
                        // console.log(d);
                        response(d);
                    }
                });
            }
        });
    </script>

</body>
</html>

