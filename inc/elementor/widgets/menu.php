<?php
namespace Elementor;
class Menu extends Widget_Base {

	public function get_name() {
        return 'menu-1';
    }

	public function get_title() {
        return ' منو';
    }

	public function get_icon() {
        return 'far fa-list-alt';
    }

	public function get_categories() {
        return ['digishop'];
    }

	protected function register_controls() {
        $this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( ' منو - 1' ),
			
			]
		);
       
        $this->end_controls_section();
    }

	protected function render() {
      $settings = $this->get_settings_for_display();?>
      <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <?php
                        if(!isset($digi_data['site-logo'])){
                        ?>
                        <a href="<?= bloginfo('url');?>" class="logo logo-dark">
                            <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                        </a>
                        <a href="<?= bloginfo('url');?>" class="logo logo-light">
                            <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                        </a>
                        <?php }else{?>
                            <a href="<?= bloginfo('url');?>" class="logo logo-dark">
                            <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                            </a>
                            <a href="<?= bloginfo('url');?>" class="logo logo-light">
                                <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="header-main-nav">
                       <?php get_template_part('template/header/main-menu');?>
                    </div>
                    <div class="header-action">
                    <?php get_template_part('template/header/action-list');?>
                       
                    </div>
                </div>
            </div>
      <?php
    }
}