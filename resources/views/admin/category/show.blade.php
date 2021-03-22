<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th width="50%">ID</th>
            <td><?= $category->id ?></td>
        </tr>
        <tr>
            <th>NAMA KATEGORI</th>
            <td><?= $category->category_name ?></td>
        </tr>
        <tr>
            <th>TANGGAL DIBUAT</th>
            <td><?= $category->created_at ?></td>
        </tr>
    </table>
</div>