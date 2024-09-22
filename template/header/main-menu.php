 <!-- Start Mainmanu Nav -->
 <?php  global $digi_data; ?>
 <nav class="mainmenu-nav">
     <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
     <div class="mobile-nav-brand">
         <a href="index-2.html" class="logo">
             <img src="<?php echo $digi_data['site-logo']['url'];?>" alt="Site Logo">
         </a>
     </div>
     <ul class="mainmenu">
        <?php 
          $header_menu_id=get_menu_id('main_menu');
          $get_header_menu_data=wp_get_nav_menu_items($header_menu_id);
          if(!empty($get_header_menu_data) && is_array($get_header_menu_data)):
          foreach($get_header_menu_data as $menu_item):
            if(!$menu_item->menu_item_parent):
                $child_menu_items=get_child_menu_items($get_header_menu_data,$menu_item->ID);
                $has_submenu=!empty($child_menu_items) && is_array($child_menu_items);
                if($has_submenu):?>
                <li class="menu-item-has-children">
                    <a href="<?php echo esc_html($menu_item->url);?>"><?php echo esc_html($menu_item->title);?></a>
                    <ul class="axil-submenu">
                        <?php foreach($child_menu_items as $submenu_item): ?>
                        <li><a href="<?php echo esc_html($submenu_item->title);?>"><?php echo esc_html($submenu_item->title);?></a></li>
                        <?php endforeach;?>
                    </ul>
               </li>
                <?php
                else:
                ?>
                  <li><a href="<?php echo esc_html($menu_item->url);?>"><?php echo esc_html($menu_item->title);?></a></li>
            <?php endif;?>
            <?php
            endif;
            endforeach;
            endif;
            ?>
     </ul>
 </nav>
 <!-- End Mainmanu Nav -->