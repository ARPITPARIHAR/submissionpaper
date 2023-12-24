<form id="postForm" name="postForm" class="form-horizontal" action="{{ route('submit.form') }}" method="POST"  enctype="multipart/form-data" <form id="postForm" name="postForm" class="form-horizontal" action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data" novalidate style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.6) 100%);">
    <!-- Your form content goes here -->
</form>
>
    @csrf
    <input type="hidden" name="id" value="{{$item->id}}" id="id">
    <input type="hidden" name="file_id" value="{{$item->file_content}}" id="file_id"> 
    <div class="form-group">
        <textarea name="comment" placeholder="Enter your comment..." class="form-control" required></textarea>
    </div>
    <br>
    <div class="form-group">
        <label for="processed">Select Status:</label>
        <select name="processed" class="form-control" required>
            <option value="" disabled @if($item->processed == '') selected @endif>Select Status</option>
            <option value="published" @if($item->processed == 'published') selected @endif>Published</option>
            <option value="pending" @if($item->processed == 'pending') selected @endif>Pending</option>
        </select>
    </div>
    <BR>
    <div class="form-group">
        <label for="pdf_file">Upload PDF File:</label>
        <div class="custom-file">
            <input type="file" name="pdf_file" accept=".pdf" class="custom-file-input" required>
            {{-- <label class="custom-file-label" for="pdf_file">Choose file...</label> --}}
        </div>
    </div>

    <br>
    <div class="form-group">
        <label for="url">Enter URL:</label>
        <input type="url" name="url" class="form-control" required>
    </div>
    <br>
    <div class="form-group text-center">
        <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
    </div>
</form>