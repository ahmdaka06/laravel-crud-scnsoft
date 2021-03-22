<form method="POST" action="{{ route('category.update', $category->id) }}" class="form-horizontal">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label class="col-md-12">Nama Kategori</label>
        <div class="col-md-12">
            <input type="text" name="category_name" class="form-control" placeholder="Nama Kategori" value="{{ $category->category_name }}">

        </div>
    </div>
    <center>   
        <button type="submit" class="btn btn-success" >
                Update
        </button>
        <button type="reset" class="btn btn-danger">
                Reset
        </button>
    </center>
</form>