<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Multiple Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .panel {
            border: 1px solid #ced4da; /* Add border */
            border-radius: 10px; /* Add border-radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
        }

        .panel-heading {
            background-color: #007bff; /* Blue background */
            color: #fff; /* White text */
            padding: 15px;
            border-top-left-radius: 10px; /* Add border radius */
            border-top-right-radius: 10px; /* Add border radius */
        }

        .panel-body {
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-success {
            background-color: #28a745; /* Green button */
            border: none;
        }

        .btn-success:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .alert {
            margin-top: 20px;
        }

        .alert-success {
            background-color: #d4edda; /* Light green background */
            border-color: #c3e6cb; /* Light green border */
            color: #155724; /* Dark green text */
        }

        .alert-success strong {
            font-weight: bold;
        }

        .text-danger {
            color: #dc3545; /* Red text */
        }

        img {
            max-width: 100px; /* Limit image width */
            margin-right: 10px; /* Add some spacing between images */
            margin-bottom: 10px; /* Add some spacing between images */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary mx-auto">
            <div class="panel-heading">
                <h2 class="text-center">Laravel 10 Multiple Image Upload</h2>
            </div>
            <div class="panel-body">
                @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @foreach(\Session::get('image') as $imgs)
                        <img src="images/{{ $imgs }}">
                    @endforeach
                @endif
                <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <input type="file" name="image[]" class="form-control @error('image.*') is-invalid @enderror" multiple>
     
                        @error('image.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
