<x-head />
<x-nav />
<x-sidebar />

<div class="content-wrapper p-4">
  <h2 class="mb-4 text-center">Product List</h2>
  <div class="card shadow-lg">
    <div class="card-body">
      <div class="container">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Product Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Status </th>
              <th width="100px">Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>

    </div>
  </div>

</div>
<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Delete</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p id="deleteMessage">Are you sure you want to delete?</p>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="deleteProduct()">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" id="edit_id" name="id">

          <div class="form-group">
            <label for="edit_product_name">Product Name</label>
            <input type="text" class="form-control" id="edit_product_name" name="product_name">
          </div>

          <div class="form-group">
            <label for="edit_product_description">Description</label>
            <textarea class="form-control" id="edit_product_description" name="product_description"></textarea>
          </div>

          <div class="form-group">
            <label for="edit_category_name">Category</label>
            <input type="text" class="form-control" id="edit_category_name" name="category_name">
          </div>

          <div class="form-group">
            <label for="edit_status">Status</label>
            <select class="form-control" id="edit_status" name="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </form>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
      </div>
    </div>
  </div>
</div>


<x-foot />
<script type="text/javascript">

  $(function () {
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('ViewList') }}",
      columns: [
        { data: 'id', name: 'id' },
        { data: 'product_name', name: 'product_name' },
        { data: 'product_description', name: 'product_description' },
        { data: 'category_name', name: 'category_name' },
        {
          data: 'status',
          name: 'status',
          render: function (data) {
            return data == 1
              ? '<span class="badge badge-success">Active</span>'
              : '<span class="badge badge-danger">Inactive</span>';
          }
        },
        {
          data: null,
          name: 'action',
          orderable: false,
          searchable: false,
          render: function (data, type, row) {

            let rowData = JSON.stringify(row).replace(/"/g, '&quot;');
            return `
        <button type="button" class="btn btn-sm btn-primary" 
            data-toggle="modal" data-target="#modal-xl" onclick='editItem(${rowData})'>
            <i class="fas fa-edit"></i> Edit
        </button>

        <button type="button" class="btn btn-sm btn-danger" 
            data-toggle="modal" data-target="#modal-sm" onclick='confirmDelete(${rowData})'>
            <i class="fas fa-trash"></i> Delete
        </button>
      `;
          }
        },
      ]
    });
  });

  function editItem(product) {

    $('#edit_id').val(product.id);
    $('#edit_product_name').val(product.product_name);
    $('#edit_product_description').val(product.product_description);
    $('#edit_category_name').val(product.category_name);
    $('#edit_status').val(product.status);
  }
  let deleteId = null;

  function confirmDelete(product) {
    deleteId = product.id;
    $('#deleteMessage').html(
      `Are you sure you want to delete <strong>${product.product_name}</strong>?`
    );
  }

  function saveChanges() {
    let data = {
      id: $('#edit_id').val(),
      product_name: $('#edit_product_name').val(),
      product_description: $('#edit_product_description').val(),
      category_name: $('#edit_category_name').val(),
      status: $('#edit_status').val(),
      _token: "{{ csrf_token() }}"
    };

    $.ajax({
      url: "{{ route('products.update') }}",
      type: "POST",
      data: data,
      success: function (response) {
        $('#modal-xl').modal('hide');
        $('.data-table').DataTable().ajax.reload();
        toastr.success(response.message, 'Updated');

      },
      error: function (xhr) {
        toastr.error("Update failed!", 'Error');
      }
    });

  }

  function deleteProduct() {
    $.ajax({
      url: "/products/" + deleteId,
      type: "DELETE",
      data: {
        _token: "{{ csrf_token() }}"
      },
      success: function (response) {
        $('#modal-sm').modal('hide');
        $('.data-table').DataTable().ajax.reload();
        $('#modal-xl').modal('hide');

        toastr.warning(response.message, 'Deleted');

      },
      error: function (xhr) {
        toastr.error("Delete failed!", 'Error');
      }
    });
  }
</script>