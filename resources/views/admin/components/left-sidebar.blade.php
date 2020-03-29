<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Карточки продуктов </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin')}}">Список карточек</a></li>
                        <li><a href="{{route('admin.productCard.new')}}">Модерация карточек <span id="newCardsCount" class="label label-rounded label-success">0</span></a></li>
                        <li><a href="{{route('admin.productCard.complaint')}}">Жалобы <span id="complaintCardsCount" class="label label-rounded label-success">0</span></a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Пользователи</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="">Список пользователей</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
