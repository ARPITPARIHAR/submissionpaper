<form id="postForm" name="postForm" class="form-horizontal" action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <input type="hidden" name="id" value="{{$item->id}}" id="id">
    <input type="hidden" name="file_id" value="{{$item->file_content}}" id="file_id"> 

    <div class="form-group">
        <textarea name="comment" placeholder="Enter your comment..." class="form-control"></textarea>
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

<!-- Include SweetAlert library -->
<!-- Include SweetAlert library -->
<!-- Include SweetAlert library -->
<!-- Include SweetAlert library -->


<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('postForm').addEventListener('submit', function (event) {
        var comment = document.getElementsByName('comment')[0].value;
        var processed = document.getElementsByName('processed')[0].value;
        var pdfFile = document.getElementsByName('pdf_file')[0].value;
        var url = document.getElementsByName('url')[0].value;

        if (!processed || !pdfFile || !url) {
            // Use SweetAlert for a more attractive pop-up
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill required fields!',
            });

            event.preventDefault(); // Prevent form submission
        } else {
           
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Form submitted successfully!',
            });

        }
    });
</script>

