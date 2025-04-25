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
    <section class="mb-5">
        <h2 class="mb-4">Product Management</h2>

        <div class="form-container">
            <h4>ADD Product</h4>
            <form  action="{{route('products.update',$product->id)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label  class="form-label">Name</label>
                    <input type="text" class="form-control" name="name"  value="{{$product->name}}" required>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label  class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" value="{{$product->price}}"  required>
                    @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label  class="form-label">Brand</label>
                    <select class="form-select" name="brand_id"  required>
                        <option value="{{$product->brand->id}}">{{$product->brand->name}} </option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}} </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slag" class="form-label">Slag</label>
                    <input type="text" class="form-control" name="slag" value="{{$product->slag}}">
                    @error('slag')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </section>
</div>
</body>
</html>
