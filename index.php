<?php 
session_start();

include_once('controller/database.php');

include 'HF/header.php';

?>
<!-- Slider -->

    <div id="demo" class="carousel slide slider" data-ride="carousel" style="margin-top: 150px;">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active"></div>
            <div class="carousel-item"></div>
            <div class="carousel-item"></div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
	

    <!-- Banner -->

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(admin/imglaptop/1.1.jpg)">
                    </div>
                    <div class="banner_category">
                            <a href="laptop.php">MSI</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(admin/imglaptop/DELL/dell3.1.jpg)">
                    </div>
                    <div class="banner_category">
                            <a href="laptop.php">Dell</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(admin/imglaptop/Asus/asus1.1.jpg)">
                    </div>
                    <div class="banner_category">
                            <a href="laptop.php">Asus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".DELL">Dell</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".ASUS">Asus</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".MSI">MSI</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <!-- Product 1 -->
                        <?php 
                            $conn = dbConnect();
                            
                            $select = "SELECT laptop.*, brands.brand FROM laptop JOIN brands ON laptop.idbrands = brands.id";
                            
                            $rs2=$conn->query($select);
                            while($field2 = $rs2->fetch_assoc()){
                                $values[] = $field2;
              
                            }  
                            
                            
                            
                            foreach ($values as $value) {
                                $image = json_decode($value['img'], true);
                            
                           
                        ?>
                             
                        <div class="product-item <?=$value['brand']?>"> 
                            
                            <div class="product discount product_filter">
                                
                                <div class="product_image" style="padding: 5px;">
                                    <img src="admin/<?= $image['0']?>" width="150px;" height="250px">
                                </div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html"><?=$value['name']?></a></h6>
                                    <div class="product_price">$<?=$value['price']?>
                                    </div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">add to cart</a>
                            </div>
                        </div>
                        <?php 
                             }
                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="lib/images/deal_ofthe_week.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i>
                        </div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i>
                        </div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blogs -->


    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	

	<style>
		div.slider div.carousel-inner div.carousel-item {
			width: 100%;
			height: 650px;
			background: url(lib/images/slider_3.jpg) no-repeat;
			background-size: cover;
			background-position: center;
		}

		div.slider div.carousel-inner div.carousel-item:nth-child(2) {
			background-image: url(lib/images/slider_2.jpg);
		}

		div.slider div.carousel-inner div.carousel-item:nth-child(3) {
			background-image: url(lib/images/slider_1.jpg);
		}

		@media screen and (max-width: 1364px) {
			div.slider div.carousel-inner div.carousel-item {
				height: 400px;
			}
		}

		@media screen and (max-width: 1024px) {
			div.slider div.carousel-inner div.carousel-item {
				height: 300px;
			}
		}

		@media screen and (max-width: 768px) {
			div.slider div.carousel-inner div.carousel-item {
				height: 200px;
			}
		}

		@media screen and (max-width: 480px) {
			div.slider div.carousel-inner div.carousel-item {
				height: 150px;
			}
		}
	</style>

<?php 

include('HF/footer.php');

?>

