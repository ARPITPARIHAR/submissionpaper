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

    table.table th, table.table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    table.table th {
        background-color: #5b9d4f;
        color:white;
    }

    form {
    display: inline;
}

.log button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    cursor: pointer;
    float: right;
    margin-top: -140px !important; /* Adjust the margin-top value as needed */
}


</style>

<div style="overflow-x: auto;">
    <h1>Data Table</h1>

    @if($data !== null && count($data) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Journal Name</th>
                    <th>Title Name</th>
                    <th>File Name</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
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

                        <td>
                            @if($item->submitted == 1)
                                <input type="checkbox" checked='checked' style="width: 20px; height: 20px;" />
                            @elseif($item->submitted == 0)
                            @else
                                <input type="checkbox" style="width: 20px; height: 20px;" />
                            @endif
                        </td>
                        <td>
                       <a href="{{ asset('/download/' . $item->file_content) }}">Download</a>

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
        <p>No data available.</p>
    @endif
</div>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <div class="log">
    <button type="submit">Logout</button>
    </div>
</form>

<div class="modal fade" id="comment-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mx-auto">Publish Form</h4>
                <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="comment-modal-body">
               
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
        });
    }
</script>
<script>
function closeModal() {
    $('#ajaxModelexa').modal('hide');
}

</script>