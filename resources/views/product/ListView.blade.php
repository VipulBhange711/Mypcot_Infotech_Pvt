<x-head />
<x-nav />
<x-sidebar />

<div class="content-wrapper p-4">
    <h2 class="mb-4 text-center">Product List</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
        <td>
        
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-xl">
                <i class="fas fa-edit"></i>   Edit
                </button>

                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-sm">
                      <i class="fas fa-trash"></i> Delete
                </button>

        </td>


                </tbody>
            </table>
        </div>
    </div>
</div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Small Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
   <!-- /.modal -->

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ViewList') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'product_name', name: 'product_name'},
            {data: 'product_description', name: 'product_description'},
            {data: 'category_name', name: 'category_name'},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


<x-foot />
