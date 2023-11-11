<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>PDF Viewer | Home</title>
	<style>
		/* CSS styles for the form and preview */
form {
    max-width: 500px;
    margin: 0 auto;
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="email"],
  input[type="file"] {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
  }

  input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: 20px solid #ccc;
    cursor: pointer;
    margin-left: 200px;
    margin-bottom: 10px;
  }
  select {
    width: 103%;
    padding: 5px;
    margin-bottom: 10px;
  }

  /* CSS styles for the preview section */
  .container {
    display: flex;
    justify-content: space-between;
  }

  #pdfPreview {
    align-self: start;
    width: 50%;
    height: 500px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
  }
  #dbpdfPreview {
    align-self: start;
    width: 50%;
    height: 500px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
  }

  /* Other styles from the previous code */
  body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }
  
  header {
    background-color: #333;
    color: #fff;
    padding: 20px;
  }
  
  nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  
  nav ul li {
    display: inline-block;
    margin-right: 10px;
  }
  
  nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 5px;
  }
  
  main {
    padding: 20px;
  }
  
  section {
    margin-bottom: 30px;
    padding: 40px;
    background-color: #f2f2f2;
  }
  
  section h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  section p {
    color: #777;
    line-height: 1.6;
    margin-bottom: 20px;
  }
  
  .services {
    display: flex;
    flex-wrap: wrap;
  }
  
  .services .service {
    flex-basis: 33%;
    padding: 10px;
  }
  
  footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
  }
  
  @keyframes fadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  
  @keyframes slideIn {
    0% {
      transform: translateY(50px);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }
  
  .animated {
    animation-duration: 1s;
    animation-fill-mode: both;
  }
  
  .fadeIn {
    animation-name: fadeIn;
  }
  
  .slideIn {
    animation-name: slideIn;
  }
	</style>
</head>
<body>
	<div class="full">
	<div class="container">
		<div class="pdf-container">
			<input type="file" id="pdfFile" accept=".pdf">
			<div id="pdfViewer"></div>
		</div>

		<div class="form-container">
			<form id="paymentForm">
				<input type="text" name="fileName" placeholder="File Name" required>
				<input type="text" name="userName" placeholder="Your Name" required>
				<input type="text" name="email" placeholder="Email" required>
				<input type="submit" value="Proceed to Payment">
			</form>
		</div>

		<div class="search-container">
			<input type="text" name="searchFileName" placeholder="Search File Name">
			<button id="searchButton">Search</button>
			<div class="search-result">
				<p><strong>Uploaded Document:</strong> <span id="uploadedFileName"></span></p>
				<p><strong>Search Result:</strong> <span id="searchResult"></span></p>
			</div>
		</div>
	</div>

	<script>
		document.getElementById('pdfFile').addEventListener('change', function(e) {
			var file = e.target.files[0];
			var reader = new FileReader();

			reader.onload = function(e) {
				var pdfViewer = document.getElementById('pdfViewer');
				pdfViewer.innerHTML = '<iframe src="' + e.target.result + '" width="100%" height="100%" style="border: none;"></iframe>';
			};

			reader.readAsDataURL(file);
		});

		document.getElementById('paymentForm').addEventListener('submit', function(e) {
			e.preventDefault();
			var fileName = document.getElementById('paymentForm').elements.fileName.value;
			var userName = document.getElementById('paymentForm').elements.userName.value;
			var email = document.getElementById('paymentForm').elements.email.value;

			console.log('Payment form submitted with file name: ' + fileName + ', user name: ' + userName + ', email: ' + email);
			window.location.href = "payment.html";
		});

		document.getElementById('searchButton').addEventListener('click', function(e) {
			e.preventDefault();
			var searchFileName = document.querySelector('.search-container input[name="searchFileName"]').value;
			var uploadedFileName = document.getElementById('paymentForm').elements.fileName.value;
			var searchResult = document.getElementById('searchResult');
			var uploadedFileNameElement = document.getElementById('uploadedFileName');

			if (searchFileName === uploadedFileName) {
				searchResult.textContent = 'Match found!';
			} else {
				searchResult.textContent = 'No match found!';
			}

			searchResult.style.display = 'block';
			uploadedFileNameElement.textContent = uploadedFileName;
		});
	</script>
	</div>
</body>
</html>