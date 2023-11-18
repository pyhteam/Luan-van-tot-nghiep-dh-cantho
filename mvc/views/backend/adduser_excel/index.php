<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if (isset($_SESSION['message'])) {
                    echo "<h4>" . $_SESSION['message'] . "</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Tạo tài khoản người dùng đăng nhập vào hệ thống</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="file" name="import_file" class="form-control" />
                            <a href="/resources/template-excel/TemplateImport-User.xlsx" class="btn btn-success mt-3">Tải file mẫu</a>
                            <button type="button" name="save_excel_data" onclick="importFileExcel()" class="btn btn-primary mt-3">Upload</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function importFileExcel() {

            var file = document.querySelector('input[type=file]').files[0];
            var formData = new FormData();
            formData.append("file", file);
            let url = "index.php?url=Adduser_excel/importExcel";

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Tạo tài khoản thành công',
                            text: 'Tạo tài khoản thành công',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "index.php?url=Adduser_excel/index";
                            }
                        })
                    } else {
                        if (response.errors.length > 0) {
                            let html = ``;
                            response.errors.forEach(element => {
                                html += `<li>${element}</li>`;
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Các tài khoản đã tồn tại',
                                html: html,
                            })
                        }
                    }
                },
                error: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'error',
                        title: 'Tạo tài khoản thất bại',
                        text: 'Tạo tài khoản thất bại',
                    })
                }
            });

        }
    </script>
</body>

</html>