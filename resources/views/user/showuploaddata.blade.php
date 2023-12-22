@extends('user.layouts.app')
@section('meta_title','game')

@include('user.includes.navbar')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<style>
    table {
        margin: 70px 80px 20px 30px; /* top right bottom left */
    }

    /* Optional: Style the table for better readability */
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
        background-color: #f2f2f2;
    }
    .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination > li > a,
.pagination > li > span {
    font-size: 14px;
    padding: 8px 12px;
}
.pagination .page-link {
        font-size: 16px; /* Adjust the font size as needed */
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
            font-size: 14px; /* Adjust the font size as needed */
        }
    }
</style>

<h1>Data Table</h1>

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
                
              
            </tr>
        </thead>
        <tbody>
            @foreach($formatData as $key => $item)
            @php
                $currentPage = $formatData->currentPage();
                $serialNumber = ($currentPage - 1) * $formatData->perPage() + $key + 1;
                $status = $item->status;
                $commentKey = $serialNumber - 1; // Adjust the comment key based on the serial number
                $processed = isset($commentData[$commentKey]) ? $commentData[$commentKey]->processed : '';
            @endphp
        
            <tr style="background-color: 
            @if($status === 'downloaded' && $processed === 'published')
                lightblue
            @elseif($status === 'downloaded' || $processed === 'pending')
                yellow
            @else
                white
            @endif;">
        
                {{-- Debugging output --}}
                <td>{{ $serialNumber }}</td>
                <td>{{ $item->journal_name ?? '' }}</td>
                <td>{{ $item->title ?? '' }}</td>
                <td>{{ $item->file_content ?? '' }}</td>
                <td>
                    {{ $status === 'downloaded' ? 'Downloaded' : 'Not Downloaded' }}
                </td>
                <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        {{ $commentData[$commentKey]->comment ?? '' }}
                    @endif
                </td>
                <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        @if ($processed === 'published')
                            Published
                        @else
                            Pending
                        @endif
                    @else
                        Pending
                    @endif
                </td>
                <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        {{ $commentData[$commentKey]->pdf ?? '' }}
                    @endif
                </td>
                <td>
                    @if (!is_null($commentData) && count($commentData) > $commentKey)
                        {{ $commentData[$commentKey]->url ?? '' }}
                    @endif
                </td>
            </tr>
        @endforeach
        
        
        
        
        
        
        </tbody>
    </table>
    {{ $formatData->appends(Request::except('page'))->links('pagination::bootstrap-5') }}

    {{-- <div class="pagination">
        {{ $formatData->appends(Request::except('page'))->links() }}
    </div> --}}
    
    {{-- <div class="pagination pagination-lg">
        {{ $formatData->appends(Request::except('page'))->links() }}
    </div>
     --}}
    
@else
    <p>No data available.</p>
@endif

@include('user.includes.footer')

@section('style')

@endsection

@section('script')

@endsection
