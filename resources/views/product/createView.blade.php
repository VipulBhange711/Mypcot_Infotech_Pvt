<x-head />
<x-nav />
<x-sidebar />
<style>
.toast-message {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 12px 20px;
    border-radius: 8px;
    color: #fff;
    font-weight: 500;
    z-index: 9999;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}
.toast-message.show {
    opacity: 1;
}
.toast-message.success {
    background: linear-gradient(135deg, #28a745, #218838); 
}
.toast-message.error {
    background: linear-gradient(135deg, #dc3545, #a71d2a);
}
</style>


<div class="content-wrapper p-4">
    <h2 class="mb-4 text-center">Add New Product</h2>

    <div class="card shadow-lg">
        @if (session('success'))
            <div id="toast" class="toast-message success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="toast" class="toast-message error">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{route('postProduct')}}" method="POST">
                @csrf

     
                <div class="form-group mb-3">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control"
                        placeholder="Enter product name" required>
                </div>

       
                <div class="form-group mb-3">
                    <label for="product_description">Product Description</label>
                    <textarea name="product_description" id="product_description" class="form-control" rows="3"
                        placeholder="Enter product description" required></textarea>
                </div>

     
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

                <div class="form-group mb-4">
                    <label for="status">Product Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Save Product</button>
                    <button type="reset" class="btn btn-secondary px-4">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-foot />

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let toast = document.getElementById("toast");
        if (toast) {
            toast.classList.add("show");
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        }
    });
</script>