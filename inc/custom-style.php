<?php

add_action('wp_head','custom_style');

function custom_style(){
    global $digi_data;?>
    <style>
        :root{
           --body-bg: <?= $digi_data['body-bg'];?>;
           --color-primary:<?= $digi_data['color2'];?>;
           --color-secondary:<?= $digi_data['color1'];?>;
           --light-primary:<?= $digi_data['color3'];?>;
           --color-heading:<?= $digi_data['color-heading'];?>;
           --color-body:<?= $digi_data['text-color'];?>;
           --color-light:<?= $digi_data['border-color'];?>;
           --color-black:<?= $digi_data['color-black'];?>;
        }
        .header-style-1{
            background-color: <?= $digi_data['header-bg'];?>;
        }
        .campaign-content{
            color:<?= $digi_data['header-banner-color'];?> ;
        }
        .campaign-content a{
            color:<?= $digi_data['header-banner-color-link'];?> ;
        }
        footer.axil-footer-area{
            background-color: <?= $digi_data['footer-bg'];?>;
        }
        footer.axil-footer-area h5{
            color: <?= $digi_data['footer-title-color'];?> !important ;
        }
        footer.axil-footer-area a,footer.axil-footer-area p,footer.axil-footer-area{
            color: <?= $digi_data['footer-color'];?> !important ;
        }
        footer.axil-footer-area a:after{
            background-color:<?= $digi_data['footer-hover-color'];?> !important ;
        }
        footer.axil-footer-area a:hover{
            color: <?= $digi_data['footer-hover-color'];?> !important ;
        }
        footer.axil-footer-area .social-share a:hover{
            color: #fff !important ;
        }
        .footer-top.separator-top::after{background-color:<?= $digi_data['footer-border-color'];?> !important ; }
        .copyright-default.separator-top::after{background-color:<?= $digi_data['copyright-border-color'];?>!important;}
        .copyright-left .quick-link li{color: <?= $digi_data['copyright-color'];?>;}
        .axil-breadcrumb-area{background-color: <?= $digi_data['breadcrumb-bg'];?> ;}
    </style>
    <?php
}