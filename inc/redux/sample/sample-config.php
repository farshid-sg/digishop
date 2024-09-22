<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "digi_data";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( "تنظیمات قالب " ),
        'page_title'           => __( "تنظیمات قالب " ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        'show_options_object' =>false,
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'far-support',
        'href'  => '#',
        'title' => __( 'پشتیبانی ' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
   /* $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );
*/
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] ='';
    } else {
        $args['intro_text'] ='';
    }

    // Add content after the form.
    $args['footer_text'] ='';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    /*$tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );*/


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'تنظیمات عمومی' ),
        'id'               => 'basic',
        'desc'             => __( 'تنظیمات عمومی سایت خود را در این بخش انجام دهید' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'لوگوی سایت' ),
        'id'               => 'main-logo',
        'subsection'       => true,
        'icon'             => 'el el-picasa',
        'customizer_width' => '450px',
        'desc'              =>__('بارگذاری لوگوی سایت'),
        'fields'           => array(
            array(
                'id'       => 'site-logo',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'بارگذاری لوگو' ),
                'subtitle' => __( 'سایز پیشنهادی : 157px(width) , 40px(height)' ),
                'desc'     =>__('لوگوی سایت خود را در این بخش بارگذاری نمایید'),
                'default'  => ['url'=>DIGI_TDU.'assets/images/logo/logo.png']
            ),
            array(
                'id'       => 'site-favicon',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'بارگذاری فاوآیکون' ),
                'desc'     =>__('فاوآیکون سایت خود را در این بخش بارگذاری نمایید'),
                'default'  => ['url'=>DIGI_TDU.'assets/images/favicon.png']
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'رنگ های سایت' ),
        'id'               => 'site-colors',
        'subsection'       => true,
        'icon'             => 'el el-picasa',
        'customizer_width' => '450px',
        'desc'              =>__(''),
        'fields'           => array(
	      	array(
                'id'       => 'body-bg',
                'type'     => 'color',
                'title'    => __( 'رنگ  پس زمینه' ),
                'desc' => __( 'رنگ پس زمینه سایت خود را انتخای نمایید' ),
                'default'  => "#eceded",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'color1',
                'type'     => 'color',
                'title'    => __( 'رنگ اصلی سایت' ),
                'desc' => __( 'رنگ اصلی سایت خود را انتخای نمایید' ),
                'default'  => "#ff497c",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'color2',
                'type'     => 'color',
                'title'    => __( 'رنگ دوم سایت' ),
                'desc' => __( 'رنگ دوم سایت خود را انتخای نمایید' ),
                'default'  => "#3577f0",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'color3',
                'type'     => 'color',
                'title'    => __( 'رنگ سوم سایت' ),
                'desc' => __( 'رنگ سوم سایت خود را انتخای نمایید' ),
                'default'  => "#8c71db",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'color-black',
                'type'     => 'color',
                'title'    => __( 'رنگ سیاه ' ),
                'desc' => __( 'رنگ هاور منو و رنگهای سیاه سایت  ' ),
                'default'  => "#000",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'color-heading',
                'type'     => 'color',
                'title'    => __( 'رنگ عنواین سایت' ),
                'desc' => __( 'رنگ عنواین اصلی سایت خود را انتخای نمایید' ),
                'default'  => "#292930",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'text-color',
                'type'     => 'color',
                'title'    => __( 'رنگ متون سایت' ),
                'desc' => __( 'رنگ متون سایت خود را انتخای نمایید' ),
                'default'  => "#777",
                'transparent'=>false,
                'validate'=>'color'
            ),
			array(
                'id'       => 'border-color',
                'type'     => 'color',
                'title'    => __( '  رنگ فوکس حاشیه ها' ),
                'desc' => __( 'رنگ حاشیه input ها و textarea ها' ),
                'default'  => "#CBD3D9",
                'transparent'=>false,
                'validate'=>'color'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'برد کرامب' ),
        'id'               => 'breadcrumb',
        'subsection'       => true,
        'icon'             => 'el el-picasa',
        'customizer_width' => '450px',
        'desc'              =>__('تنظیمات بردکرامب'),
        'fields'           => array(
            array(
                'id'       => 'shop',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'تصویر بردکرامب صفحه فروشگاه' ),
                'subtitle' => __( 'سایز پیشنهادی : 126px(width) , 120px(height)' ),
                'desc'     =>__('تصویر بردکرامب صفحه فروشگاه'),
                'default'  => ['url'=>DIGI_TDU.'assets/images/product/product-45.png']
            ),
            array(
                'id'       => 'archive',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'تصویر بردکرامب صفحهات جستجو و آرشیو' ),
                'subtitle' => __( 'سایز پیشنهادی : 126px(width) , 120px(height)' ),
                'desc'     =>__('تصویر بردکرامب صفحهات جستجو و آرشیو'),
                'default'  => ['url'=>DIGI_TDU.'assets/images/product/product-45.png']
            ),
            array(
                'id'       => 'payment',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'تصویر بردکرامب صفحهات سبد خرید و پرداخت'),
                'subtitle' => __( 'سایز پیشنهادی : 126px(width) , 120px(height)' ),
                'desc'     =>__('تصویر بردکرامب صفحهات سبد خرید و پرداخت'),
                'default'  => ['url'=>DIGI_TDU.'assets/images/product/product-45.png']
            ),
            array(
                'id'       => 'profile',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'تصویر بردکرامب صفحهات پروفایل'),
                'subtitle' => __( 'سایز پیشنهادی : 126px(width) , 120px(height)' ),
                'desc'     =>__('تصویر بردکرامب صفحهات پروفایل'),
                'default'  => ['url'=>DIGI_TDU.'assets/images/product/product-45.png']
            ),
            array(
                'id'       => 'other',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'تصویر بردکرامب در دیگر صفحهات ' ),
                'subtitle' => __( 'سایز پیشنهادی : 126px(width) , 120px(height)' ),
                'desc'     =>__('تصویر بردکرامب در دیگر صفحهات '),
                'default'  => ['url'=>DIGI_TDU.'assets/images/product/product-45.png']
            ),
            array(
                'id'       => 'breadcrumb-bg',
                'type'     => 'color',
                'title'    => __( 'رنگ  پس زمینه بردکرامب' ),
                'desc' => __( 'رنگ  پس زمینه بردکرامب' ),
                'default'  => "#f8f8f8",
                'transparent'=>false,
                'validate'=>'color',
            ),
        )
    ) );
    //header
    Redux::setSection( $opt_name, array(
        'title'            => __( 'تنظیمات هدر' ),
        'id'               => 'header',
        'desc'             => __( 'تنظیمات سربرگ سایت خود را در این بخش انجام دهید' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( ' سربرگ اصلی '),
        'id'               => 'main-header',
		'subsection'       => true,
        'icon'             => 'el el-chevron-left',
        'customizer_width' => '450px',
        'desc'              =>__('شخصی سازی و تغییر در هدر  سایت'),
        'fields'           => array(
            array(
                'id'       => 'header-bg',
                'type'     => 'color',
                'title'    => __( 'رنگ  پس زمینه سربرگ' ),
                'desc' => __( 'رنگ  پس زمینه سربرگ' ),
                'default'  => "#f9f3f0",
                'transparent'=>false,
                'validate'=>'color',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( ' هدر بالای سایت '),
        'id'               => 'header-setting',
		'subsection'       => true,
        'icon'             => 'el el-chevron-left',
        'customizer_width' => '450px',
        'desc'              =>__('شخصی سازی و تغییر در هدر بالای سایت'),
        'fields'           => array(
            array(
                'id'       => 'show-top-header',
                'type'     => 'switch',
                'title'    => __( 'نمایش هدر بالای سایت ' ),
                'subtitle'     =>__('از این بخش می توانید نمایش یا عدم نمایش هدر بالای سایت را تعیین نمایید'),
                'default'  => true
            ),
            array(
                'id'       => 'mobile-icon',
                'type'     => 'text',
                'title'    => __( ' آیکون موبایل' ),
                'subtitle' => __( 'آیکونی برای موبایل انتخاب نمایید <a href="#">انتخاب آیکون </a>' ),
                'default'  => "fas fa-mobile-android-alt",
                'required'=>['show-top-header','=',true]
            ),
            array(
                'id'       => 'mobile-text',
                'type'     => 'text',
                'title'    => __( 'شماره تماس' ),
                'subtitle' => __( 'شماره تماس خود را وارد نمایید' ),
                'default'  => "09914414207",
                'required'=>['show-top-header','=',true]
            ),
            array(
                'id'       => 'email-icon',
                'type'     => 'text',
                'title'    => __( ' آیکون ایمیل' ),
                'subtitle' => __( 'آیکونی برای ایمیل انتخاب نمایید <a href="#">انتخاب آیکون </a>' ),
                'default'  => "fas fa-envelope",
                'required'=>['show-top-header','=',true]
            ),
            array(
                'id'       => 'email-text',
                'type'     => 'text',
                'title'    => __( ' ایمیل' ),
                'subtitle' => __( ' ایمیل خود را وارد نمایید' ),
                'default'  => "farshidirani96@yahoo.com",
                'required'=>['show-top-header','=',true]
            ),
           
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( ' بنر بالای سایت '),
        'id'               => 'header-banner-setting',
		'subsection'       => true,
        'icon'             => 'el el-chevron-left',
        'customizer_width' => '450px',
        'desc'              =>__('شخصی سازی و تغییر در هدر بالای سایت'),
        'fields'           => array(
            array(
                'id'       => 'show-top-header-banner',
                'type'     => 'switch',
                'title'    => __( 'نمایش بنر بالای سایت ' ),
                'subtitle'     =>__('از این بخش می توانید نمایش یا عدم نمایش بنر بالای سایت را مشخص نمایید'),
                'default'  => true
            ),
            array(
                'id'       => 'header-banner-text',
                'type'     => 'textarea',
                'title'    => __( '  متن' ),
                'subtitle' => __( 'توضیحات خود را وارد نمایید' ),
                'default'  => 'درها را به روی دنیای فشن باز کنید <a href="#">کاوش کنید</a>',
                'required'=>['show-top-header-banner','=',true]
            ),
            array(
                'id'       => 'header-banner-color',
                'type'     => 'color',
                'title'    => __( 'رنگ  متن' ),
                'desc' => __( 'رنگ متن بنر بالای سایت' ),
                'default'  => "#1f233d",
                'transparent'=>false,
                'validate'=>'color',
                'required'=>['show-top-header-banner','=',true]
            ),
            array(
                'id'       => 'header-banner-color-link',
                'type'     => 'color',
                'title'    => __( 'رنگ  لینک' ),
                'desc' => __( 'رنگ لینک بنر بالای سایت' ),
                'default'  => "#b255cc",
                'transparent'=>false,
                'validate'=>'color',
                'required'=>['show-top-header-banner','=',true]
            ),
            array(
                'id'       => 'header-banner-bg',
                'type'     => 'media',
                'url'      =>true,
                'title'    => __( 'بارگذاری تصویر' ),
                'subtitle' => __( 'یک تصویر برای پس زمینه بنر بالای سایت انتخاب نمایید' ),
                'default'  => ['url'=>DIGI_TDU.'assets/images/others/campaign-bg.png'],
                'required'=>['show-top-header-banner','=',true]
            ),
        )
    ) );

  
    //footer
    Redux::setSection( $opt_name, array(
        'title'            => __( 'تنظیمات فوتر ' ),
        'id'               => 'footer',
        'desc'             => __( 'تنظیمات فوتر سایت خود را در این بخش انجام دهید' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-th-large'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'رنگبندی' ),
        'id'               => 'footer-settings',
        'subsection'       => true,
        'icon'             => 'el el-picasa',
        'customizer_width' => '450px',
        'desc'              =>__(""),
        'fields'           => array(
            array(
                'id'       => 'footer-bg',
                'type'     => 'color',
                'title'    => __( 'رنگ پس زمینه  ' ),
                'subtitle' => __( 'رنگ پس زمینه فوتر را انتخاب نمایید' ),
                'default'  => "#fff",
                'transparent'=>true,
                'validate'=>'color'
            ),
            array(
                'id'       => 'footer-title-color',
                'type'     => 'color',
                'title'    => __( 'رنگ عنواین ' ),
                'subtitle' => __( 'رنگ عنواین فوتر' ),
                'default'  => "#fff",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'footer-color',
                'type'     => 'color',
                'title'    => __( 'رنگ متون ' ),
                'subtitle' => __( 'رنگ متون فوتر' ),
                'default'  => "#fff",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'footer-hover-color',
                'type'     => 'color',
                'title'    => __( 'رنگ هاور متون ' ),
                'subtitle' => __( 'رنگ هاور متون فوتر' ),
                'default'  => "#fff",
                'transparent'=>false,
                'validate'=>'color'
            ),
            array(
                'id'       => 'footer-border-color',
                'type'     => 'color',
                'title'    => __( 'رنگ حاشیه ' ),
                'subtitle' => __( 'رنگ  حاشیه بالایی  فوتر  را انتخاب نمایید' ),
                'default'  => "#f6f7fb",
                'transparent'=>false,
                'validate'=>'color'
            ),
    ) ));
    Redux::setSection( $opt_name, array(
        'title'            => __( 'کپی رایت' ),
        'id'               => 'copyright',
        'subsection'       => true,
        'icon'             => 'el el-picasa',
        'customizer_width' => '450px',
        'desc'              =>__(""),
        'fields'           => array(
            array(
                'id'       => 'copyright-text',
                'type'     => 'text',
                'title'    => __( ' کپی رایت ' ),
                'subtitle' => __( 'متن کپی رایت فوتر را وارد نمایید' ),
                'default'  => "طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه",
            ),
            array(
                'id'       => 'copyright-color',
                'type'     => 'color',
                'title'    => __( 'رنگ متن کپی رایت  ' ),
                'subtitle' => __( 'رنگ متن  کپی رایت  را انتخاب نمایید' ),
                'default'  => "#fff",
                'transparent'=>false,
                'validate'=>'color'
            ), 
            array(
                'id'       => 'copyright-border-color',
                'type'     => 'color',
                'title'    => __( 'رنگ حاشیه ' ),
                'subtitle' => __( 'رنگ  حاشیه بالایی  کپی رایت  را انتخاب نمایید' ),
                'default'  => "#f6f7fb",
                'transparent'=>false,
                'validate'=>'color'
            ),
    ) ));

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'redux-framework-demo' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'redux-framework-demo' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'redux-framework-demo' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'redux-framework-demo' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'redux-framework-demo' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

