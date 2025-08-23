<x-head />
<x-nav />
<x-sidebar />

<div class="content-wrapper p-4">
    <h2 class="mb-4 text-center">Product List</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
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
                   
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                             
                                    <span class="badge bg-success">Active</span>
                             
                                    <span class="badge bg-danger">Inactive</span>
                           
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
              
                        <tr>
                            <td colspan="6">No Products Found</td>
                        </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

<x-foot />
