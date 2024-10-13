<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 File Upload Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdThisnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <h3 class="card-header p-3"><i class="fa fa-star"></i> Laravel 11 File Upload Example - ItSolutionStuff.com
            </h3>
            <div class="card-body">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                <form action="/patients/store" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="inputFile">File:</label>
                        <input type="file" name="file" id="file"
                            class="form-control @error('file') is-invalid @enderror">

                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>