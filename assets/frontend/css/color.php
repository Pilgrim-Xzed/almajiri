<?php
header ("Content-Type:text/css");
$color = "#ea0117"; // Change your Color Here

function checkhexcolor($color) {
  return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
  $color = "#" . $_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
  $color = "#ea0117";
}

?>

<?php echo $color; ?>;
/*=========================
** Color Changer
=========================*/
input[type="button"],
input[type="button"][disabled]:hover,
input[type="button"][disabled]:focus,
input[type="reset"],
input[type="reset"][disabled]:hover,
input[type="reset"][disabled]:focus,
input[type="submit"],
input[type="submit"][disabled]:hover,
input[type="submit"][disabled]:focus, .social-link-list li:hover a i,
.pagination-list .pagination li:first-child a.
.pagination-list .pagination li:first-child span,
.pagination-list .pagination li:last-child a i,
.pagination-list .pagination li a:hover,
.header-section .menu-fixed .navbar-default .donate-button button,
.slider-item .slider-content-area .slider-content .slider-btn a:hover,
.who-content .button a:hover,
.who-list .who-content a,
.causes-list .causes-progress .progress-bar,
.causes-list .causes-progress .progress-bar span,
.donate-list:hover .donate-item a,
.details-content .details-desc .details-text .details-text-list ul li a span,
.details-content .details-desc .details-text .details-para .details-para-list button,
aside .widget-goal .progress .progress-bar,
.single-profile-content .profile-info-award .profile-info-award-item:hover,
.donate-form form .form-portlet .form-group .radio-select input:checked + label,
.whopage-content a:hover,
aside .widget-tag ul li a:hover,
aside .widget-register button:hover,
.contact-form2 form .form-group button:hover,
.contact-form2 form .form-group button.twitter:hover
{
background-color: <?php echo $color; ?>;
}
.donation-div .donation-plz form .donate-popup .donate-submit button,
.causes-list .causes-content .causes-text a,
.causes-list .causes-progress .progress-bar span,
.causes-list .causes-progress .progress-bar,
.section-heading .join-button a:hover,
aside .widget-donation .more-donation a:hover,
aside .widget-goal .progress .progress-bar
{
background-color: <?php echo $color; ?>;
}



h1 > a,
h2 > a,
h3 > a,
h4 > a,
h5 > a,
h6 > a,
input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="number"]:focus,
textarea:focus,
.section-heading h2 span,
.section-heading1 h2 span,
.header-wrapper .navbar-default .navbar-collapse.collapse .navbar-nav li.menu-active a,
.pagination-list .pagination li span,
.pagination-list .pagination li span:hover,
.header-section .header-top .header-top-section .header-top-right .social-link-list1 li:hover a i,
.header-section .header-bottom .navbar-default .navbar-collapse .navbar-nav li .submenu li a.menu-active,
.slider-item .slider-content-area .slider-content h1 span,
.who-content h2 span,
.counter-list .counter-thumb i,
.upcoming-list:hover .upcoming-content .upcoming-text h4 a,
.upcoming-list .upcoming-thumb .upcoming-overlay span,
.blog-list:hover .blog-content .blog-text h3 a,
.blog-list .blog-content .blog-text a,
.footer-list .footer-item .footer-newsletter form .form-field input[type=text],
.footer-list .footer-item .footer-newsletter form .form-field input[type=email],
.details-content .details-desc .details-text .details-text-list ul li.active a,
.details-content .details-comment h2 span,
.details-content .details-comment .details-comment-list .details-comment-item .details-comment-thumb a,
.details-content .details-comment .details-comment-list .details-comment-item .details-comment-thumb a i,
aside .widget-categories ul li:hover a,
.become-list .volunter-container .swiper-button-next i,
.become-list .volunter-container .swiper-button-prev i,
.breadcrumb-section .breadcrumb-content ul li:last-child,
.donation-div .donation-plz form .donate-popup .radio-select .radio-select-text label,
.causes-single-content .causes-single-desc .causes-single-text .causes-single-header ul li p,
aside .widget-twitter ul li i,
.error-section .error-content .error-content1 span,
.contact-form2 form .form-group1 a
{
color: <?php echo $color; ?>;
}

.section-heading1 a {
border-bottom: 2px solid <?php echo $color; ?>;
}

.pagination-list .pagination li a:hover,
.pagination-list .pagination li span:hover,
.slider-item .slider-content-area .slider-content .slider-btn a:hover,
.footer-list .footer-item .footer-newsletter form .form-field:hover input[type=text],
.footer-list .footer-item .footer-newsletter form .form-field:hover input[type=email],
.causes-list-content .causes-list-item .causes-list-desc a
{
border: 1px solid <?php echo $color; ?>;
}

.who-section {
border-top: 10px solid <?php echo $color; ?>;
}

.causes-list .causes-progress .progress-bar span:after{
border-top-color: <?php echo $color; ?>;
}

.blog-single-content .blog-single-desc blockquote {
border-left: 5px solid <?php echo $color; ?>;
}

.loading,
.carousel-control,
.header-section .header-bottom .navbar-default .donate-button button,
.footer-list .footer-item .footer-about a:hover,
.footer-list .footer-item .footer-newsletter form input[type=submit]:hover,
.footer-list .footer-item .footer-about ul li:hover i,
.contact-form form .form-group input[type=submit]:hover,
.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover,
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover,
.upcoming-list .upcoming-content .upcoming-text .upcomming-readmore a:hover,
.volunter-list .volunter-thumb .volunter-overlay ul li:hover a i
{
background-color: <?php echo $color; ?>;
}

.footer-section .footer-support p a:hover,
.footer-list .footer-item .footer-widget ul li:hover p,
.footer-list .footer-item .footer-widget ul li:hover a,
.footer-list .footer-item .footer-widget.footer-widget-list ul li:hover i,
.pagination>li>a, .pagination>li>span,
.pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover,
.client-list .client-container .swiper-button-prev i,
.client-list .client-container .swiper-button-next i
{
color: <?php echo $color; ?>;
}

.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover,
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover
{
border-color: <?php echo $color; ?>;
}