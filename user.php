<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National document verification system</title>
    <link rel="stylesheet" href="style.css" Content-Type="application/javascript">
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
        <h1>በእኛ ቋት ወስጥ ያሉ የግልዎ ሰነዶች እና መረጃዎ ።  </h1>
        <p>your document and details in our database.</p>
       
    </section>
</body>

</html>
