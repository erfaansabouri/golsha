<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard.index') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/image/logo.png') }}" class="img-rounded elevation-2 bg-white" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->full_name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                محصولات
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th-list"></i>
                            <p>
                                دسته بندی ها
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.groups.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th-list"></i>
                            <p>
                                گروه ها
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                کاربران
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shopping-basket"></i>
                            <p>
                                سفارش ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach(array_keys(\App\Models\Invoice::STATUSES) as $invoiceStatus)
                                <li class="nav-item">
                                    <a href="{{ route('admin.invoices.index', ['status' => $invoiceStatus]) }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>{{ \App\Models\Invoice::STATUSES[$invoiceStatus] }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.coupons.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-tag"></i>
                            <p>
                                کوپون های تخفیف
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.comments.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-comment"></i>
                            <p>
                                نظر ها
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-podcast"></i>
                            <p>
                                وبلاگ
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.blog-posts.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>پست های وبلاگ</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.tickets.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-ticket"></i>
                            <p>
                                درخواست های پشتیبانی
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-gears"></i>
                            <p>
                                تنظیمات داینامیک
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach(array_keys(\App\Models\Setting::CATEGORIES) as $settingCategory)
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings.index', ['category' => $settingCategory]) }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>{{ \App\Models\Setting::translateCategories($settingCategory) }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
