<x-head />
<x-nav />
<x-sidebar />
<style>
    /* Custom gradient boxes */
    .small-box.gradient-1 {
        background: linear-gradient(135deg, #8acaf7, #8c1efb); /* purple-blue */
        color: #fff;
    }

    .small-box.gradient-2 {
        background: linear-gradient(135deg, #f0f71e, #ff00bb); /* orange-yellow */
        color: #fff;
    }

    .small-box .inner h3,
    .small-box .inner p {
        color: #fff; /* keep text white for contrast */
    }

    .small-box .icon {
        opacity: 0.6; /* softer icon look */
    }
</style>

<div class="content-wrapper mt-5">
   <div class="row justify-content-center">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box gradient-1">
            <div class="inner">
                <h3>Create View</h3>
                <p>User can create New Field</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box gradient-2">
            <div class="inner">
                <h3>List View</h3>
                <p>User can view created List</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

    <h1 class="text-center mt-4">Admin Dashboard</h1>
</div>

<x-foot />
