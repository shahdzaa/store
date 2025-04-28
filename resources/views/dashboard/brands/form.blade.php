<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            margin-right: 250px;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="main-content">
            <h3>{{ isset($brand) ? 'Edit' : 'Create' }} Brand</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ isset($brand) ? route('brands.update', $brand->id) : route('brands.store') }}" enctype="multipart/form-data">
                @csrf

                @if(isset($brand))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', isset($brand) ? $brand->name : '') }}" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug"
                           value="{{ old('slug', isset($brand) ? $brand->slug : '') }}" >
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ isset($brand) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
</div>
</body>
</html>
