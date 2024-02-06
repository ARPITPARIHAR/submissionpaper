@extends('user.layouts.app')
@section('meta_title', '')
@include('user.includes.navbar')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
    <style>
       
        .drop-box {
     border: 2px dashed white;
     border-radius: 8px;
     padding: 20px;
     text-align: center;
     cursor: pointer;
     transition: border-color 0.3s;
     margin-top: 100px;
     display: flex;
     flex-direction: column;
     align-items: center;
     justify-content: center;
     height: 500px; 
     margin-left:350px; 
     margin-right:350px; 
     background-image: url('img/dragbox.jpg');
 }
 
 
         .drop-box:hover {
             border-color: black;
         }
 
         .icon {
             font-size: 36px;
             margin-bottom: 10px;
         }
         label {
         display: block;
         margin-top: 10px;
         font-weight: bold;
         color: #555;
     }
 
     input {
         width: 100%;
         padding: 10px;
         margin-top: 6px;
         margin-bottom: 12px;
         box-sizing: border-box;
         border: 1px solid #cb0f54;
         border-radius: 10px;
         transition: border-color 0.3s;
     }
 
     input:focus {
         border-color: #07154fef;
         outline: none;
     }
     #fileInput {
         display: none;
     }
 
     .custom-file-upload {
         display: inline-block;
         padding: 10px 15px;
         cursor: pointer;
         background-color: #192151;
         color: white;
         border: none;
         border-radius: 4px;
     }
 
     form {
     display: inline;
 }
 
 .log button {
     background-color: #2a1a66;
     color: #fff;
     border: none;
     cursor: pointer;
     float: right;
     font-size: 18px;
     margin-top: -500px !important; 
     padding: 10px 15px;
     border-radius: 10px;
 }
 
  

        @media only screen and (max-width: 768px) {
            .drop-box {
                margin-left: 5px;
                margin-right: 5px;
                height: 300px;
            }
        }
    </style>
</head>

<body>
    <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf

        <div class="drop-box" id="dropArea" ondrop="drop(event)" ondragover="allowDrop(event)">
            <label for="journalName" style="color: white; font-size: 18px; margin-bottom: 8px; display: block;">Journal Name</label>
            <input type="text" name="journalName" id="journalName">

            <label for="title" style="color: white; font-size: 18px; margin-bottom: 8px; display: block;">Title Name</label>
            <input type="text" name="title" id="title">
            <br>
            <i class="icon fas fa-cloud-upload-alt"></i>
            <div id="drop-area" onclick="openFileInput()">
                <p style="color:white;">Drag & Drop your zip file here or click to browse</p>
            </div>
            <label for="fileInput" class="custom-file-upload">Choose File</label>
            <input type="file" name="file" id="fileInput" onchange="updateFileName(this)" accept=".doc, .docx, .pdf">

        <div id="selectedFileName" style="color: white"></div>
        <div id="fileErrorMessage" style="color:white;"></div>

        <br>
        
            <button type="submit" class="btn btn-primary" style="border-radius: 5px;">Submit</button>
        </div>
    </form>
    <button id="showDataBtn" class="btn btn-dark" style="margin-top: 20px; display: block; margin-left: auto; margin-right: auto; border-radius: 15px 0px 1px 10px;">Your Uploaded Data</button>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
           document.getElementById("showDataBtn").addEventListener("click", function () {
                 window.location.href = "{{ route('show-data') }}";
            });
        });
    </script>
    @include('user.includes.footer')

    @section('style')
    @endsection

    @section('script')
    @endsection

    <script>
        function updateFileName(input) {
            
            var fileName = input.files[0].name;

          
            document.getElementById('selectedFileName').innerText = 'Selected File: ' + fileName;
        }

        function validateForm() {
            var journalName = document.getElementById('journalName').value.trim();
            var title = document.getElementById('title').value.trim();
            var fileInput = document.getElementById('fileInput');
            var allowedExtensions = ["doc", "docx", "pdf"];

            if (journalName === '' || title === '') {
                alert('Journal Name and Title cannot be blank!');
                return false; // Prevent form submission
            }

            if (!fileInput.files.length) {
                alert('Please choose a valid file.');
                return false;
            }
             var fileName = fileInput.value.toLowerCase();
            var fileExtension = fileName.split(".").pop();

            if (!allowedExtensions.includes(fileExtension)) {
                document.getElementById('fileErrorMessage').innerText = "Please select a valid file (doc, docx, or pdf).";
                return false; // Prevent form submission
            } else {
                document.getElementById('fileErrorMessage').innerText = "";
            }

            return true; 
        }
    </script>
</body>
</html>
