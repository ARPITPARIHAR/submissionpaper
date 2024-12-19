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

    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 80px;">
        <!-- Center the welcome message -->
        <div style="flex: 1; text-align: center;">
            @if(Auth::check())
                <p style="font-size: 20px; margin: 0;">Welcome, {{ Auth::user()->name }}</p>
            @endif
        </div>

        <!-- Right-aligned logout button -->
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" style="
                background: linear-gradient(135deg, #ff7b54, #ffcc29);
                border: none;
                color: white;
                padding: 12px 28px;
                font-size: 18px;
                font-weight: bold;
                border-radius: 30px;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 10px;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease, box-shadow 0.2s ease;">
                <i class="fa fa-sign-out" aria-hidden="true" style="font-size: 20px;"></i> Logout
            </button>
        </form>
    </div>


    <div style="display: flex; justify-content: center; align-items: center; margin-top: 60px;">
        <form
            action="{{ route('upload.store') }}"
            method="post"
            enctype="multipart/form-data"
            onsubmit="return validateForm()"
            style="width: 90%; max-width: 500px; background: #f9f9f9; border: 1px solid #dcdcdc; border-radius: 15px; padding: 25px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);">

            @csrf

            <!-- Form Header -->
            <h2 style="text-align: center; color: #333; font-family: 'Arial', sans-serif; margin-bottom: 20px;">
                Upload  Documents
            </h2>

            <!-- Journal Name -->
            <label for="journalName" style="color: #333; font-size: 16px; font-weight: bold; display: block; margin-bottom: 10px;">
                Journal Name
            </label>
            <input
                type="text"
                name="journalName"
                id="journalName"
                placeholder="Enter Journal Name"
                style="width: 100%; padding: 12px; border: 1px solid #dcdcdc; border-radius: 8px; margin-bottom: 15px; font-size: 14px;">

            <!-- Title Name -->
            <label for="title" style="color: #333; font-size: 16px; font-weight: bold; display: block; margin-bottom: 10px;">
                Title Name
            </label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Enter Title Name"
                style="width: 100%; padding: 12px; border: 1px solid #dcdcdc; border-radius: 8px; margin-bottom: 15px; font-size: 14px;">

            <!-- File Upload -->
            <!-- File Upload -->
<div style="text-align: center; margin-top: 20px;">
    <label
        for="fileInput"
        style="display: inline-block; background: #007bff;width: 100% ;color: white; padding: 12px 30px; border-radius: 25px; cursor: pointer; font-weight: bold; font-size: 16px; transition: background 0.3s;">
        <i class="fas fa-upload" style="margin-right: 8px;"></i> Choose File
    </label>
    <input
        type="file"
        name="file"
        id="fileInput"
        onchange="updateFileName(this)"
        accept=".doc, .docx, .pdf"
        style="display: none;">
</div>

<div id="selectedFileName"
     style="text-align: center; color: #555; font-size: 14px; margin-top: 10px; font-style: italic;">
</div>
<div id="fileErrorMessage"
     style="text-align: center; color: red; font-size: 14px; margin-top: 10px;">
</div>

            <!-- Submit Button -->
            <div style="text-align: center; margin-top: 20px;">
                <button
                    type="submit"
                    style="padding: 12px 24px; background: #000000; border: none; border-radius: 8px; color: white; font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.3s;">
                    Submit
                </button>
            </div>

        </form>
    </div>

    <script>
        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : '';
            document.getElementById('selectedFileName').textContent = fileName
                ? `Selected File: ${fileName}`
                : '';
        }

        function validateForm() {
            const journalName = document.getElementById('journalName').value.trim();
            const title = document.getElementById('title').value.trim();
            const fileInput = document.getElementById('fileInput').files.length;

            if (!journalName || !title || !fileInput) {
                document.getElementById('fileErrorMessage').textContent =
                    'Please complete all fields and upload a file.';
                return false;
            }

            document.getElementById('fileErrorMessage').textContent = '';
            return true;
        }
    </script>











<script>



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
</form>
</script>



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

