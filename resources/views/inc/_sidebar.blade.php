<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('home') }}" aria-expanded="false">
                    <span class="nav-text">Dashboard</span>
                </a>
               
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">User</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./app-profile.html">User list</a></li>
                </ul>
            </li>


            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Category</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('category.index') }}">List Category</a></li>
                    <li><a href="{{ route('category.create') }}">Create Category</a></li>
                                    
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Sub Category</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('subcategory.index') }}">List Sub Category</a></li>
                    <li><a href="{{ route('subcategory.create') }}">Create Sub Category</a></li>
                                    
                </ul>
            </li>
      </ul>       
    </div>
</div>
