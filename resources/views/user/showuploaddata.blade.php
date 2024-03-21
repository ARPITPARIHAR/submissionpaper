@extends('user.layouts.app')
@section('meta_title','game')

@include('user.includes.navbar')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="path/to/fontawesome-free-5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<style>
    table {
        margin: 70px 80px 20px 30px; 
    }

    table.table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        margin-top: 80px; 
    }

    table.table th, table.table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    table.table th {
    background-color: #9f0f50;
    color: white;
    text-align: center; 
    font-family: nunito;
    font-size:18px;
}

    .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

    .pdf-icon {
        font-size: 24px;
        color:red;
    }

.pagination > li > a,
.pagination > li > span {
    font-size: 14px;
    padding: 8px 12px;
}
.pagination .page-link {
        font-size: 16px; 
    }
    @media screen and (max-width: 768px) {
        table.table {
            width: 100%;
            margin: 20px auto;
        }

        .pagination {
            margin-top: 10px;
        }

        .pagination > li > a,
        .pagination > li > span {
            font-size: 12px;
            padding: 6px 8px;
        }

        .pagination .page-link {
            font-size: 14px; 
        }

        body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0; 
}
 }


 @media screen and (max-width: 768px) {
        table {
            width: 100%;
            margin: 20px auto;
        }

        .pagination {
            margin-top: 10px;
        }

        .pagination > li > a, .pagination > li > span {
            font-size: 12px;
            padding: 6px 8px;
        }

        .pagination .page-link {
            font-size: 14px; 
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; 
        }
    }
</style>


<br>
<br>
<div style="overflow-x: auto;">
@if(!is_null($formatData) && count($formatData) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Journal Name</th>
                <th>Title Name</th>
                <th>File Name</th>
                <th>Status</th>
                <th>Comment</th>
                <th>Stage</th>
                <th>Formated File</th>
                <th>Publish Url</th>
                <th>Submission At</th>
                <th>Action</th>
                </tr>
        </thead>
        <tbody>
            @foreach($formatData as $key => $item)
            @php
                $currentPage = $formatData->currentPage();
                $serialNumber = ($currentPage - 1) * $formatData->perPage() + $key + 1;
                $status = $item->status;
                $commentKey = $serialNumber - 1; 
                $processed = isset($commentData[$commentKey]) ? $commentData[$commentKey]->processed : '';
            @endphp
        
            <tr style="background-color: 
            @if($status === 'downloaded' && $processed === 'published')
                lightgreen
            @elseif($status === 'downloaded' || $processed === 'pending')
                yellow
            @else
                white
            @endif;">
                <td style="text-align: center;">{{ $serialNumber }}</td>
                <td>{{ $item->journal_name ?? '' }}</td>
                <td>{{ $item->title ?? '' }}</td>
<td>
    @if (!is_null($item->file_content))
        @php
            $fileExtension = pathinfo($item->file_content, PATHINFO_EXTENSION);
            $iconClass = '';
            $iconColor = '#007BFF'; 
            
            switch ($fileExtension) {
                case 'doc':
                case 'docx':
                    $iconClass = 'fa-file-word';
                    break;
                case 'pdf':
                    $iconClass = 'fa-file-pdf';
                    break;
               
                default:
                    $iconClass = 'fa-file'; 
                    break;
            }
        @endphp

        <i class="fas {{ $iconClass }} file-icon" style="font-size: 24px; color: {{ $iconColor }}"></i>
        {{ $item->file_content }}
    @else
        No file available
    @endif
</td>
                  <td> {{ $status === 'downloaded' ? 'Downloaded' : 'Not Downloaded' }} </td>
                  <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        {{ $commentData[$commentKey]->comment ?? '' }}
                    @endif
                </td>
                <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        @if ($processed === 'published')
                            Published
                        @elseif ($status === 'downloaded')
                            Downloaded
                        @else
                            Pending
                        @endif
                    @else
                        Pending
                    @endif
                </td>
                <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        @php
                            $pdfPath = url('public/assets/' . $commentData[$commentKey]->pdf);
                        @endphp
                
                        @if (file_exists(public_path('assets/' . $commentData[$commentKey]->pdf)))
                            <a href="{{ $pdfPath }}" target="_blank" download="{{ $commentData[$commentKey]->pdf }}">
                                <i class="fas fa-file-pdf pdf-icon"></i>
                                {{ $commentData[$commentKey]->pdf ?? '' }}
                            </a>
                        @else
                            File not found at path: {{ $pdfPath }}
                        @endif
                    @endif
                </td>
                 <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        <a href="{{ $commentData[$commentKey]->url ?? '' }}" target="_blank">{{ $commentData[$commentKey]->url ?? '' }}</a>
                    @endif
                </td>
                <td>{{ $item->created_at->format('d-m-y H:i:s') }}</td>

                <td class="text-center">
                    <form method="POST" action="{{ route('users.delete', $item->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger a-btn-slide-text btn-flat show-alert-delete-box btn-sm btn-delete" data-toggle="tooltip" title='Delete' onclick="showDeleteAlert()">
                            <i class="fa fa-trash" style="margin-right: 5px;"></i>
                            Delete
                          </button>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    </div>
    {{ $formatData->appends(Request::except('page'))->links('pagination::bootstrap-5') }}
     
    <div style="display: flex; justify-content: center; align-items: center; height: 20vh;">
        <a href="/formating" class="btn btn-warning" role="button">Back</a>
    </div>
    {{-- <div class="pagination">
        {{ $formatData->appends(Request::except('page'))->links() }}
    </div> --}}
    
    {{-- <div class="pagination pagination-lg">
        {{ $formatData->appends(Request::except('page'))->links() }}
    </div>
     --}}
    
@else
<div class="no-data" style="display: flex; align-items: center; justify-content: center; height: 50vh;">No data available.</div>
@endif
@include('user.includes.footer')
@section('style')
@endsection
@section('script')
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        
        swal({ 
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: "Yes, delete it!",
                    value: true,
                    visible: true,
                    className: "btn-danger", 
                    closeModal: false,
                }
            },
            closeOnClickOutside: false, 
            closeOnEsc: false, 
            dangerMode: true, 
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
