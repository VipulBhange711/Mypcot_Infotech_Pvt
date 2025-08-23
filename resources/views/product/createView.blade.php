<x-head />
<x-nav />
<x-sidebar />

<div class="content-wrapper p-4">
    <h2 class="mb-4 text-center">Add New Product</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="" method="POST">
                @csrf

                <!-- Product Name -->
                <div class="form-group mb-3">
                    <label for="product_name">Product Name</label>
                    <input type="text" 
                           name="product_name" 
                           id="product_name" 
                           class="form-control" 
                           placeholder="Enter product name" 
                           required>
                </div>

                <!-- Product Description -->
                <div class="form-group mb-3">
                    <label for="product_description">Product Description</label>
                    <textarea name="product_description" 
                              id="product_description" 
                              class="form-control" 
                              rows="3" 
                              placeholder="Enter product description"
                              required></textarea>
                </div>

                <!-- Category Name -->
                <div class="form-group mb-3">
                    <label for="category_name">Category</label>
                    <select name="category_name" id="category_name" class="form-control" required>
                        <option value="">-- Select Category --</option>
                        <option value="electronics">Electronics</option>
                        <option value="fashion">Fashion</option>
                        <option value="grocery">Grocery</option>
                        <option value="books">Books</option>
                    </select>
                </div>

                <!-- Product Status -->
                <div class="form-group mb-4">
                    <label for="status">Product Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Save Product</button>
                    <button type="reset" class="btn btn-secondary px-4">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-foot />
