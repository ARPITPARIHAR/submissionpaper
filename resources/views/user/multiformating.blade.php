<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop Upload</title>
    <style>
        #drop-area {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        #file-input {
            display: none;
        }
    </style>
</head>
<body>

<div id="drop-area" onclick="openFileInput()">
    <p>Drag & Drop your zip file here or click to browse</p>
</div>

<input type="file" id="file-input" accept=".zip" onchange="handleFileUpload(event)" />

<script>
    function openFileInput() {
        document.getElementById('file-input').click();
    }

    function handleFileUpload(event) {
        const fileInput = event.target;
        const files = fileInput.files;

        if (files.length > 0) {
            const file = files[0];

            if (file.type === 'application/zip') {
                // Handle the zip file
                console.log('Zip file uploaded:', file.name);
            } else {
                alert('Please upload a valid zip file.');
            }
        }
    }

    const dropArea = document.getElementById('drop-area');

    dropArea.addEventListener('dragover', function (event) {
        event.preventDefault();
        dropArea.style.border = '2px dashed #3498db';
    });

    dropArea.addEventListener('dragleave', function () {
        dropArea.style.border = '2px dashed #ccc';
    });

    dropArea.addEventListener('drop', function (event) {
        event.preventDefault();
        dropArea.style.border = '2px dashed #ccc';

        const files = event.dataTransfer.files;

        if (files.length > 0) {
            const file = files[0];

            if (file.type === 'application/zip') {
                // Handle the zip file
                console.log('Zip file uploaded:', file.name);
            } else {
                alert('Please upload a valid zip file.');
            }
        }
    });
</script>

</body>
</html>
