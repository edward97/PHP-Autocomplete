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
        <h1>Dynamically Add & Remove Table Rows Using jQuery - #4</h1>

        <div class="table-responsive">
            <table class="table table-hover" id="ui-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Country Name</th>
                        <th>Country Number</th>
                        <th>Country Phone Code</th>
                        <th>Country Code</th>
                    </tr>
                </thead>

                <tbody>
                    <tr id="row-1">
                        <td><a href="javascript:;" class="btn btn-danger delete-row" id="row-1">-</a></td>
                        <td>
                            <input type="text" data-type="countryname" name="countryname[]" class="form-control autocompletetxt" id="countryname-1">
                        </td>
                        <td>
                            <input type="text" data-type="countrynumber" name="countrynumber[]" class="form-control autocompletetxt" id="countrynumber-1">
                        </td>
                        <td>
                            <input type="text" data-type="countryphone" name="countryphone[]" class="form-control autocompletetxt" id="countryphone-1">
                        </td>
                        <td>
                            <input type="text" data-type="countrycode" name="countrycode[]" class="form-control autocompletetxt" id="countrycode-1">
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-success" id="addNew">
                Add New
            </button>
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
        var smartAuto = (function() {
            let addBtn, html, rowCount, tableBody;

            addBtn = $("#addNew");
            rowCount = $("#ui-table tbody tr").length+1;
            tableBody = $("#ui-table tbody");

            function formHtml() {
                html = '<tr id="row-'+rowCount+'">'
                +'<td><a href="javascript:;" class="btn btn-danger delete-row" id="row-'+rowCount+'">-</a></td>'
                +'<td><input type="text" data-type="countryname" name="countryname[]" class="form-control autocompletetxt" id="countryname-'+rowCount+'"></td>'
                +'<td><input type="text" data-type="countrynumber" name="countrynumber[]" class="form-control autocompletetxt" id="countrynumber-'+rowCount+'"></td>'
                +'<td><input type="text" data-type="countryphone" name="countryphone[]" class="form-control autocompletetxt" id="countryphone-'+rowCount+'"></td>'
                +'<td><input type="text" data-type="countrycode" name="countrycode[]" class="form-control autocompletetxt" id="countrycode-'+rowCount+'"></td>'
                +'</tr>';

                rowCount++;
                return html;
            }

            function getId(element) {
                let id, idAddr;
                id = element.attr("id");
                idAddr = id.split("-");

                return idAddr[idAddr.length-1];
            }

            function addNewRow() {
                tableBody.append(formHtml());
            }

            function deleteRow() {
                let currentEle, rowNo;

                currentEle = $(this);
                rowNo = getId(currentEle);
                $("#row-"+rowNo).remove();
            }

            function registerEvents() {
                addBtn.on("click", addNewRow);

                $(document).on("click", ".delete-row", deleteRow);
            }

            function init() {
                registerEvents();
            }
            return {
                init: init
            }
        })();

        $(document).ready(function() {
            smartAuto.init();
        });
    </script>
</body>
</html>
