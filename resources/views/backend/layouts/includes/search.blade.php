<div class="row">
    <div class="col-lg-12">
            <form class="input-group form" action="" method="GET">
               <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Search...">
               <span class="input-group-btn">
                 <input type="submit" class="btn btn-primary" value="Search">
               </span>
           </form>
    </div>
</div>