<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Educational Institute Document Upload</title>
  <style>
    /* Global styles */
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    main {
      padding: 20px;
    }

    h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
    }

    .card {
      flex-basis: 48%;
      padding: 20px;
      margin: 10px;
      background-color: #f2f2f2;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="file"] {
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    .success-message {
      color: green;
      margin-top: 10px;
    }

    .error-message {
      color: red;
      margin-top: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    .pdf-preview {
      width: 100%;
      height: 100%;
    }

    /* Popup styles */
    .popup {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .popup-content {
      background-color: #f2f2f2;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close-btn {
      color: #888;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <h1>administration dashboard </h1>
  </header>

  <main>

    <h2>Uploaded Data</h2>
    <table id="uploadedData">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>File Number</th>
          <th>PDF Document</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dynamically populated with JavaScript -->
      </tbody>
    </table>
  </main>

  <script>


    // Function to handle individual upload form submission
    document.getElementById("individualUploadForm").addEventListener("submit", function (e) {
      e.preventDefault();

      var firstName = document.getElementById("individualFirstName").value;
      var middleName = document.getElementById("individualMiddleName").value;
      var lastName = document.getElementById("individualLastName").value;
      var fileNumber = document.getElementById("individualFileNumber").value;
      var fileInput = document.getElementById("individualFile");
      var file = fileInput.files[0];

      var reader = new FileReader();
      reader.onload = function (e) {
        var pdfData = e.target.result;

        // Create a new table row
        var newRow = document.createElement("tr");

        // Create table cells for each data
        var firstNameCell = document.createElement("td");
        firstNameCell.textContent = firstName;
        newRow.appendChild(firstNameCell);

        var middleNameCell = document.createElement("td");
        middleNameCell.textContent = middleName;
        newRow.appendChild(middleNameCell);

        var lastNameCell = document.createElement("td");
        lastNameCell.textContent = lastName;
        newRow.appendChild(lastNameCell);

        var fileNumberCell = document.createElement("td");
        fileNumberCell.textContent = fileNumber;
        newRow.appendChild(fileNumberCell);

        var fileCell = document.createElement("td");
        var fileLink = document.createElement("a");
        fileLink.href = pdfData;
        fileLink.target = "_blank";
        fileLink.textContent = "View PDF";
        fileCell.appendChild(fileLink);
        newRow.appendChild(fileCell);

        var editCell = document.createElement("td");
        var editLink = document.createElement("a");
        editLink.href = "#";
        editLink.textContent = "Edit";
        editCell.appendChild(editLink);
        newRow.appendChild(editCell);

        // Append the new row to the table
        var tableBody = document.querySelector("#uploadedData tbody");
        tableBody.appendChild(newRow);

        // Reset the form fields
        document.getElementById("individualFirstName").value = "";
        document.getElementById("individualMiddleName").value = "";
        document.getElementById("individualLastName").value = "";
        document.getElementById("individualFileNumber").value = "";
        document.getElementById("individualFile").value = "";

        // Show success message
        var individualUploadMessage = document.getElementById("individualUploadMessage");
        individualUploadMessage.textContent = "File uploaded successfully.";
        individualUploadMessage.style.display = "block";
      };

      reader.readAsDataURL(file);
    });
  </script>
</body>
</html>