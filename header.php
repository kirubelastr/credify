<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National document verification system</title>
    <link rel="stylesheet" href="style.css" Content-Type="application/javascript">
    <script src="jquery.min.js"></script>
    <style>
         .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #333;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
        }

        .logout-icon {
            font-size: 24px;
            color: #999;
            cursor: pointer;
            transition: color 0.3s;
        }

        .logout-icon:hover {
            color: #333;
        }
    </style>
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#pdfPreview").html('<embed src="'+reader.result+'" width="100%" height="100%" type="application/pdf">');
                }

                reader.readAsDataURL(file);
            }
        }
    $(document).ready(function(){
        $("#fileUploadForm").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: 'fetch.php',
                type: 'post',
                data: $(this).serialize(),
                success: function(response){
                    if(response != 0){
                        $("#dbPdfPreview").html('<embed src="'+response+'" width="100%" height="100%" type="application/pdf">');
                    }else{
                        alert('No document found');
                    }
                },
            });
        });
    });
        function logout() {
            window.location.href = "index.php";
        }
    </script>
</head>

<body>
<header class="header">
        <div class="header-title">NDVS</div>
        <div class="logout-icon" onclick="logout()">Logout</div>
</header>
    <section id="home" class="animated fadeIn">
        <h1>Welcome to the National document verification system</h1>
        <p>Validate your documents straight from the source.</p>
        <form id="fileUploadForm" method="post" enctype="multipart/form-data">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="middleName">Middle Name:</label>
            <input type="text" id="middleName" name="middleName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="inistname">Institute Name:</label>
            <input type="text" id="inistname" name="inistname" required>

            <label for="doctype">Document Type:</label>
            <select id="doctype" name="doctype" required>
                <option value="">-choose an option-</option>
                <option value="degree">degree</option>
                <option value="diploma">diploma</option>
                <option value="tempo">empo</option>
            </select>

            <label for="filenumber">File Number:</label>
            <input type="text" id="filenumber" name="filenumber" required>

            <label for="document">Upload Document:</label>
            <input type="file" id="document" name="documentuploded" accept=".pdf" required onchange="previewFile(this);">

            <input id="submit" type="submit" value="Submit">
        </form>
        <div class="container">
        <div id="pdfPreview">
            <h1>Uploaded Document</h1>
        </div>
        <div id="dbPdfPreview">
            <h1>The Original Document</h1>
        </div>
    </div>
    </section>
</body>

</html>
