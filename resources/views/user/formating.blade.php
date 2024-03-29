@extends('user.layouts.app')
@section('meta_title', '')
@include('user.includes.navbar')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
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
    font-size: 17px;
    margin-top: -650px !important; 
    padding: 10px 15px;
    border-radius: 10px;
}

    @media only screen and (max-width: 768px) {
            .drop-box {
                margin-left: 5px; /* Adjusted margin for smaller screens */
                margin-right: 5px; /* Adjusted margin for smaller screens */
                height: 500px; /* Adjusted height for smaller screens */
            }
        }
    /* .center-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none; /* Initially hide the message */
        

        /* .closing-button {
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 18px;
            color: white;
        } */ */
        .rounded-button {
    border-radius: 10px;
}


.label[for="journalName"] {
    font-weight: bold !important;
    color: #007BFF !important;
    font-size: 16px !important;
    margin-bottom: 8px !important;
    display: block !important;
}

        
    </style>
</head>



<div style="overflow-x: auto;">

    @if(Auth::check())
        <p style="margin-top: 80px; text-align:center; font-size:20px;">Welcome, {{ Auth::user()->name }}</p>
    @endif

</div>





<form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf

    <div class="drop-box" id="dropArea" ondrop="drop(event)" ondragover="allowDrop(event)">
        <label for="journalName" style=" color:white; font-size: 18px; margin-bottom: 8px; display: block;">Journal Name</label>

        <input type="text" name="journalName" id="journalName">

        <label for="title" style=" color:white; font-size: 18px; margin-bottom: 8px; display: block;">Title Name</label>
        <input type="text" name="title" id="title">
        <br>
        <i class="icon fas fa-cloud-upload-alt"></i>
        <p style="color: white;">Drag & Drop your file here<br>or click to browse</p>

        <label for="fileInput" class="custom-file-upload">Choose File</label>
        
        <input type="file" name="file" id="fileInput" onchange="updateFileName(this)" accept=".doc, .docx, .pdf">

        <div id="selectedFileName" style="color: white"></div>
        <div id="fileErrorMessage" style="color:white;"></div>

        <br>
        <br>
        <button type="submit" class="btn btn-primary" style="border-radius: 5px;">Submit</button>


    </div>


    
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
</form>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <div class="log">
        <button type="submit" class="btn btn-warning">
            <i class="fa fa-sign-out" aria-hidden="true" style="color: white;"></i> Logout
        </button>
    </div>
</form>


</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datepicker@0.6.5/dist/datepicker.min.js"></script>

<button id="showDataBtn" class="btn btn-dark" style="margin-top: 20px; display: block; margin-left: auto; margin-right: auto; border-radius: 15px 0px 1px 10px;">Your Uploaded Data</button>

<script>
    document.addEventListener("DOMContentLoaded", function () {
       document.getElementById("showDataBtn").addEventListener("click", function () {
             window.location.href = "{{ route('show-data') }}";
        });
    });
</script>

<script>
    function allowDrop(event) {
        event.preventDefault();
        document.getElementById('dropArea').style.borderColor = "#4CAF50";
    }

    function drop(event) {
        event.preventDefault();
        document.getElementById('dropArea').style.borderColor = "#ccc";

        var files = event.dataTransfer.files;
        handleFiles(files);
    }

    function handleFiles(files) {
        var output = [];
        for (var i = 0; i < files.length; i++) {
            output.push('<li>', files[i].name, '</li>');
            
        }
        document.getElementById('fileInput').files = files;
        document.getElementById('dropArea').innerHTML = '<ul>' + output.join('') + '</ul>';
    }
</script>
<script>
    function showCustomModal(title, message) {
        var modalHtml = `
            <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalLabel">${title}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ${message}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#customModal").remove();
        $("body").append(modalHtml);
        $("#customModal").modal('show');
        $("#customModal .close, #customModal [data-dismiss='modal']").click(function () {
            $("#customModal").modal('hide');
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        var fileInput = document.getElementById("fileInput");

        fileInput.addEventListener("change", function () {
            if (!isValidFile(fileInput)) {
                showCustomModal("Invalid File", "Please select a valid file (doc, docx, or pdf).");
                fileInput.value = "";  
            }
        });

        function isValidFile(input) {
            var allowedExtensions = ["doc", "docx", "pdf"];
            var fileName = input.value.toLowerCase();
            var fileExtension = fileName.split(".").pop();

            return allowedExtensions.includes(fileExtension);
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var closeModalButton = document.getElementById("closeModalButton");
        var customModal = document.getElementById("customModal");

        closeModalButton.addEventListener("click", function () {
            customModal.style.display = "none";
        });

        window.addEventListener("click", function (event) {
            if (event.target === customModal) {
                customModal.style.display = "none";
            }
        });

        var fileInput = document.getElementById("fileInput");

        fileInput.addEventListener("change", function () {
            if (!isValidFile(fileInput)) {
                customModal.style.display = "block";
                fileInput.value = "";  
            }
        });

        function isValidFile(input) {
            var allowedExtensions = ["doc", "docx", "pdf"];
            var fileName = input.value.toLowerCase();
            var fileExtension = fileName.split(".").pop();

            if (!allowedExtensions.includes(fileExtension)) {
                return false;
            }

            return true;
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var fileInput = document.getElementById("fileInput");
        var errorMessage = document.getElementById("fileErrorMessage");

        fileInput.addEventListener("change", function () {
            if (!isValidFile(fileInput)) {
                errorMessage.innerText = "Please select a valid file (doc, docx, or pdf).";
                fileInput.value = "";  
            } else {
                errorMessage.innerText = "";
            }
        });

        function isValidFile(input) {
            var allowedExtensions = ["doc", "docx", "pdf"];
            var fileName = input.value.toLowerCase();
            var fileExtension = fileName.split(".").pop();

            return allowedExtensions.includes(fileExtension);
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.hamburger-menu').click(function() {
        $(this).toggleClass('active');
        $('.menu-items').toggleClass('active');
      });
      
    });
  </script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

@if(session('centerSuccess'))
    <div class="modal fade" id="successModal" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                    <div class="callout" data-closable>
                        <span class="close-button" aria-label="Close alert" onclick="closeCallout()">
                            <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <p>{{ session('centerSuccess') }}</p>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script>
@endif

<script>
    $(document).ready(function () {
        $('#successModal').modal({
            backdrop: 'static',
            keyboard: false
        });
      function closeModal() {
            $('#successModal').modal('hide');
        }
        $('.close-button').on('click', closeModal);
    });
</script>


<style>
.callout {
    position: relative;
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 5px;
}

.modal-backdrop {
display: none !important;
}

.close-button {
    position: absolute;
    top: 0;
    right: 0;
    padding:0.5;
    cursor: pointer;
    font-size:24px;
}
@media (min-width: 768px) {
        .log {
            position: static;
            width: auto;
        }
    }
</style>

@include('user.includes.footer')

@section('style')
    
@endsection
@section('script')
    
@endsection

    