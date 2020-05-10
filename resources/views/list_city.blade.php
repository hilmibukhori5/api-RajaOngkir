<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>

    <title>Halaman List Kota</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Halaman List Kota</h2>
            </div>
        </div>
        <form class="ps-checkout__form" action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <h3 class="mt-5 mb-5">Alamat Pengiriman</h3>

                    <div class="form-group form-group--inline">
                        <label for="provinsi">Nama Provinsi</label>
                        <select name="province_id" id="province_id" class="form-control">
                            <option value="">Nama Provinsi</option>
                            @foreach ($provinsi as $row)
                            <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <table class="table" id="pagination">
                        <thead>
                            <tr>
                                <th scope="col">ID Kota</th>
                                <th scope="col">ID Provinsi</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kota/Kabupaten</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Kode Pos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>



                </div>

            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>    <script>
        $(document).ready(function() {
            $('select[name="province_id"]').on('change', function() {
                let provinceid = $(this).val();
                if (provinceid) {
                    jQuery.ajax({
                        url: "/city/" + provinceid,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(index, values) {
                                var tr = "<tr>";
                                $.each(values, function(i, v) {
                                    tr = tr + "<td>" + v + "</td>";
                                });
                                tr = tr + "</tr>";
                                $("tbody").append(tr);
                            });
                        }
                    });
                }
            });
            $('#pagination').DataTable();
        });
    </script>
</body>

</html>