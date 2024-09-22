<div class="col-lg-4">
     <!-- Start Sidebar Area  -->
    <aside class="axil-sidebar-area">
        <?php 
        if(is_active_sidebar('sidebar')){
            dynamic_sidebar('sidebar');
        }
        ?>
    </aside>
        <!-- End Sidebar Area -->
</div>