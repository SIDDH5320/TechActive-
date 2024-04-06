<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> CSV to MySQL</title>
    <meta name="description" content="The tiny framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .container {
        max-width: 500px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <strong>Upload CSV File</strong>
            </div>
            <div class="card-body">
                <div class="mt-2">
                    <?php if (session()->has('message')){ ?>
                    <div class="alert <?=session()->getFlashdata('alert-class') ?>">
                        <?=session()->getFlashdata('message') ?>
                    </div>
                    <?php } ?>
                    <?php $validation = \Config\Services::validation(); ?>
                </div>
                <form action="<?php echo base_url('StudentController/importCsvToDb');?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <div class="mb-3">
                            <input type="file" name="file" class="form-control" id="file">
                        </div>
                    </div>
                    <div class="d-grid">
                        <input type="submit" name="submit" value="Upload" class="btn btn-dark" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Function to handle the AJAX request
        function importCsvToDb() {
            // Send AJAX request to import CSV to DB
            $.ajax({
                url: '/student/importCsvToDb', // Replace with your actual route
                method: 'POST',
                success: function(response) {
                    // Parse JSON response
                    var data = JSON.parse(response);
                    // Log count to console
                    console.log('Count:', data.count);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Call the function to import CSV to DB
        importCsvToDb();
    });
    </script> -->
</body>


</html>