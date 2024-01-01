<form id="postForm" name="postForm" class="form-horizontal" action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}" id="id">
    <input type="hidden" name="file_id" value="{{ $item->file_content }}" id="file_id">

    <div class="form-group">
        <textarea name="comment" placeholder="Enter your comment..." class="form-control" required>{{ old('comment') }}</textarea>
        @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="processed">Select Status:</label>
        <select name="processed" class="form-control" required>
            <option value="" disabled @if(!old('processed') || $item->processed == '') selected @endif>Select Status</option>
            <option value="published" @if(old('processed') == 'published' || $item->processed == 'published') selected @endif>Published</option>
            <option value="pending" @if(old('processed') == 'pending' || $item->processed == 'pending') selected @endif>Pending</option>
        </select>
        @error('processed')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="pdf_file">Upload PDF File:</label>
        <div class="custom-file">
            <input type="file" name="pdf_file" accept=".pdf" class="custom-file-input" required>
            @error('pdf_file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="form-group">
        <label for="url">Enter URL:</label>
        <input type="url" name="url" class="form-control" value="{{ old('url') }}" required>
        @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group text-center">
        <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
    </div>
    </form>
    