@extends('user.layouts.app')
@section('meta_title', 'game')

@include('user.includes.navbar')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<style>
    table {
        margin: 70px 80px 20px 30px; /* top right bottom left */
    }

    table.table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        margin-top: 80px; /* top/bottom margin 20px, left/right margins auto */
    }

    table.table th,
    table.table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    table.table th {
        background-color: #046142;
        color: white;
        text-align: center;
        font-family: Cursive;    }
        

    form {
        display: inline;
    }

    .log button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        cursor: pointer;
        float: right;
        margin-top: -200px !important; /* Adjust the margin-top value as needed */
    }

    .published-row {
        background-color: lightgreen;
    }

</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    /* Add a new class for the green background */
    .submission-accepted {
        background-color: #1a991a !important; /* Adjust the background color as needed */
    }
</style>

<div style="overflow-x: auto;">
    <h1>Data Table</h1>

   
@if($data !== null && count($data) > 0)
<table class="table table-hover">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Journal Name</th>
            <th>Title Name</th>
            <th>File Name</th>
            <th>Submission Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Add this script to your page -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        @foreach ($data as $item)
        @php
            $commentKey = $item->id; // Assuming $commentKey is derived from the item's ID
            $processed = isset($commentData[$commentKey]) ? $commentData[$commentKey]->processed : '';
            $rowStyle = ($processed === 'published') ? 'background-color: lightgreen;' : '';
        @endphp
        <tr style="{{ $rowStyle }}">
                <td style="text-align: center";>{{ $loop->iteration }}</td>
                <td>{{ $item->journal_name ?? '' }}</td>
                <td>{{ $item->title ?? '' }}</td>
                <td>
                    @if (!is_null($item->file_content))
                        @php
                            $fileExtension = pathinfo($item->file_content, PATHINFO_EXTENSION);
                            $iconClass = '';
                            $iconColor = '#007BFF'; // Blue color
                            switch ($fileExtension) {
                                case 'doc':
                                case 'docx':
                                    $iconClass = 'fa-file-word';
                                    break;
                                case 'pdf':
                                    $iconClass = 'fa-file-pdf';
                                    break;
                                // Add more cases for other file types if needed
                                default:
                                    $iconClass = 'fa-file'; // Default icon class
                                    break;
                            }
                        @endphp
                        <i class="fas {{ $iconClass }} file-icon" style="font-size: 24px; color: {{ $iconColor }}"></i>
                        {{ $item->file_content }}
                    @else
                        No file available
                    @endif
                </td>
                <td class="text-center">{{ $item->created_at->format('d-m-y') }}</td>

                <td class="text-center">
                    <a href="{{ asset('/download/' . $item->file_content) }}" style="background-color: #7d0408; color: #fff; border: none; padding: 4px 6px; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center;" title="Download">
                      <i class="fa fa-download" style="font-size:18px; margin-right: 5px;"></i>
                      Download
                    </a>
                  </td>
                <td>
                    <a href="#" onclick="openCommentModal({{$item->id}})" data-id="{{ $item->id }}" class="btn btn-primary btn-publish">Comment</a>
                </td>
              

            </tr>
        @endforeach
    </tbody>
</table>
{{ $data->appends(Request::except('page'))->links('pagination::bootstrap-5') }}
@else
<div class="no-data" style="display: flex; align-items: center; justify-content: center; height: 50vh;">No data available.</div>
@endif
</div>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <div class="log">
        <button type="submit">Logout</button>
    </div>
</form>

<div class="modal fade" id="comment-modal" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mx-auto">Publish Form</h4>
                <div class="callout" data-closable>
                    <span class="close-button" aria-label="Close alert" onclick="closeCallout()">
                        <span aria-hidden="true">&times;</span>
                    </span>
                </div>
            </div>
            <div class="modal-body" id="comment-modal-body">
                <!-- Your modal body content goes here -->
            </div>
        </div>
    </div>
</div>

@include('user.includes.footer')

<script>
    function openCommentModal(id) {
        $('#comment-modal-body').html(null);
        $.post("{{route('get-comment')}}", {
            _token: '{{ csrf_token() }}',
            id: id
        }, function(data) {
            $('#comment-modal').modal('show');
            $('#comment-modal-body').html(data);

            // Assuming there is a variable like $commentData available with the comment data
            var commentData = {!! json_encode($commentData ?? []) !!};

            // Get the comment button in the table row
            var commentButton = $('[data-id="' + id + '"]').find('.btn-publish');

            // Find the comment status in the commentData array
            var commentStatus = commentData[id] ? commentData[id].processed : '';

            // Set color based on comment status
            if (commentStatus === 'published') {
                commentButton.removeClass('btn-primary').addClass('btn-success');
            } else {
                commentButton.removeClass('btn-success').addClass('btn-primary');
            }
        });
    }

    function changeStatus(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post("{{route('update-status')}}", {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function(data) {
            location.reload();
        });
    }
</script>


<script>
    function closeModal() {
        $('#ajaxModelexa').modal('hide');
    }
</script>

<style>
    .callout {
        position: relative;
        padding: 1rem;
        margin-bottom: 1rem;
        /* border: 1px solid #bd1717; */
        border-radius: 5px;
    }

    /* Remove blur effect styles */
    .modal-backdrop {
        display: none !important;
    }

    .close-button {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0.5;
        cursor: pointer;
        font-size: 24px;
    }
</style>

<script>
    function closeModalAndCallout() {
        // Close the modal
        var modal = document.getElementById('comment-modal');
        modal.style.display = 'none';

        // Close the callout
        var callout = document.querySelector('.callout');
        callout.style.display = 'none';
    }
</script>

<script>
    function closeCallout() {
        // Close the modal
        $('#comment-modal').modal('hide');

        // Optionally, you can remove the modal backdrop
        // $('.modal-backdrop').remove();
    }
</script>

<script>
    $(document).ready(function () {
        $('#comment-modal').modal({
            backdrop: 'static',
            keyboard: false
        });

        // Function to close the modal
        function closeModal() {
            $('#comment-modal').modal('hide');
        }

        // Attach the closeModal function to the close button
        $('.close-button').on('click', closeModal);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script to update tick colors -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteRow(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            url: '/delete/format/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    // Update the UI or perform any additional actions
                    alert(response.message);
                    location.reload(); // Reload the page or update the UI as needed
                } else {
                    alert(response.message);
                }
            },
            error: function (error) {
                console.error(error);
                alert('An error occurred while deleting the record.');
            }
        });
    }
}

</script>
<style>
    /* Add your custom styles here */
    .btn-download {
      background-color: #007bff; /* Bootstrap's primary color */
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none; /* Remove default underline for links */
      display: inline-flex;
      align-items: center;
    }

    .download-icon {
      margin-right: 5px;
    }
  </style>