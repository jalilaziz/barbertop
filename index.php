<!-- PHP INCLUDES -->

<?php

    include "connect.php";
    include "Includes/header.php";
    include "Includes/navbar.php";

    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

?>

<!-- BOOKING SECTION -->

<section class="book_section" id="booking">
    <div class="book_bg"></div>
    <!-- <div class="map_pattern"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                <form action="appointment.php" method="post" id="appointment_form"
                    class="form-horizontal appointment_form">
                    <div class="book_content" style="text-align:right;">
                    
                        <h3 style="color: white;">ابدأ رحلة مليئة بالأناقة والثقة!</h3>
                        <h4 style="color: white;">احجز موعدك معنا</h4>
                        <p style="color: #999;">
                        </p>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 padding-10">
                            <P style="color: white;text-align:right;">التاريخ</P>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 padding-10">
                            <P style="color: white;text-align:right;">الساعة</P>
                            <input type="time" class="form-control">
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->

                    <button id="app_submit" class="default_btn homebtn" type="submit">احجز موعدًا</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT SECTION -->

<section id="about" class="about_section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_content" style="text-align: center;">

                    <h2>Barber Top</h2 data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                    <div class="about-logo" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                        <img src="Design/images/about-logo.png" width=100% alt="logo">
                    </div>
                    <p style="color: #777" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                    مرحبًا بكم في صالون BARBERTOP، وجهتك المثالية لتجربة حلاقة فريدة ومميزة! نسعى لتقديم أفضل الخدمات لعملائنا الكرام، حيث نجمع بين الخبرة والابتكار لضمان حصولك على إطلالة رائعة وأنيقة.
                    <br>

في صالون BARBERTOP، نؤمن بأن الحلاقة هي فن وعناية. فريقنا من الحلاقين المحترفين يتمتعون بمهارات عالية ويستخدمون أحدث الأدوات والتقنيات ليقدموا لك خدمات متنوعة. <br>
نتطلع إلى استقبالك في صالون BARBERTOP، لنقدم لك أفضل تجربة حلاقة وعناية رجالية في المدينة. زيارتك ستكون بداية رحلة مليئة بالأناقة والثقة!
                    </p>
                    <!-- <a href="#" class="default_btn" style="opacity: 1;">More about us</a> -->
                </div>
            </div>
            <div class="col-md-6  d-none d-md-block">
                <div class="about_img" style="overflow:hidden">
                    <img class="about_img_1" src="Design/images/about-1.jpg" alt="about-1" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                    <img class="about_img_2" src="Design/images/about-2.jpg" alt="about-2" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                    <img class="about_img_3" src="Design/images/about-3.jpg" alt="about-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HOME SECTION -->

<section class="home-section height90vh" id="home-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <div class="home-section-content height90vh">
        <div id="home-section-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-caption d-md-block">
                <h3>ليست مجرد قصة شعر، إنها تجربة.</h3>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#home-section-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#home-section-carousel" data-slide-to="1"></li>
                <li data-target="#home-section-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner height90vh">
                <!-- FIRST SLIDE -->
                <div class="carousel-item height90vh active">
                    <img class="d-block w-100 slideimg1" src="Design/images/barbershop_image_1.jpg" alt="First slide">
                    
                </div>
                <!-- SECOND SLIDE -->
                <div class="carousel-item height90vh">
                    <img class="d-block w-100 slideimg1" src="Design/images/barbershop_image_2.jpg" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                        
                    </div>
                </div>
                <!-- THIRD SLIDE -->
                <div class="carousel-item height90vh">
                    <img class="d-block w-100 slideimg1" src="Design/images/barbershop_image_3.jpg" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        
                    </div>
                </div>
            </div>
            <!-- PREVIOUS & NEXT -->
            <a class="carousel-control-prev height90vh" href="#home-section-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next height90vh" href="#home-section-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->

<section class="services_section" id="services" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <div class="container">
        <div class="section_heading" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">

            <!-- <h2>Our Services</h2> -->
            <h2>خدماتنا</h2>
            <div class="heading-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                <div class="service_box">
                    <i class="bs bs-scissors-1"></i>
                    <h3>قص الشعر</h3>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="service_box">
                    <i class="bs bs-razor-2"></i>
                    <h3>تشذيب اللحية</h3>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="250">
                <div class="service_box">
                    <i class="bs bs-brush"></i>
                    <h3>حلاقة ناعمة</h3>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="service_box">
                    <i class="bs bs-hairbrush-1"></i>
                    <h3>ماسك للوجه</h3>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRICING SECTION  -->

<section class="pricing_section" id="pricing" style="text-align:right;" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">

    <!-- START GET CATEGORIES PRICES FROM DATABASE -->

    <?php

        $stmt = $con->prepare("Select * from service_categories");
        $stmt->execute();
        $categories = $stmt->fetchAll();

    ?>

    <!-- END -->

    <div class="container">
        <div class="section_heading">
            
            <div class="heading-line"></div>
        </div>
        <div class="row">
            <?php
                foreach($categories as $category)
                {
                    $stmt = $con->prepare("Select * from services where category_id = ?");
                    $stmt->execute(array($category['category_id']));
                    $totalServices =  $stmt->rowCount();
                    $services = $stmt->fetchAll();

                    if($totalServices > 0)
                    {
            ?>

            <div class="col-lg-4 col-md-6 sm-padding">
                <div class="price_wrap">
                    <h3 data-aos="fade-up" data-aos-duration="800" data-aos-delay="150"><?php echo $category['category_name'] ?></h3>
                    <ul class="price_list">
                        <?php
                            foreach($services as $service)
                            {
                        ?>
                        <li>
                            <h4 data-aos="fade-up" data-aos-duration="800" data-aos-delay="150"><?php echo $service['service_name'] ?></h4>
                            <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="150"><?php echo $service['service_description'] ?></p>
                            <span class="price" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150"><?php echo $service['service_price'] ?>DH</span>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <?php
                    }
                }
            ?>
        </div>
    </div>
</section>

<!-- TEAM SECTION -->

<section id="team" class="team_section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <div class="container">
        <div class="section_heading " data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
            <h2>فريقنا</h2>
            <div class="heading-line"></div>
        </div>
        <ul class="team_members row">
            <li class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                <div class="team_member">
                    <img src="Design/images/team-1.jpg" alt="Team Member">
                    <h5 class="price_list" style="font-family: 'Prata', sans-serif;text-align:center;padding:5px 0 5px">Karim</h5>
                </div>
            </li>
            <!-- <li class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                <div class="team_member">
                    <img src="Design/images/team-2.jpg" alt="Team Member">
                </div>
            </li> -->
            <li class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="team_member">
                    <img src="Design/images/team-3.jpg" alt="Team Member">
                    <h5 class="price_list" style="font-family: 'Prata', sans-serif;text-align:center;padding:5px 0 5px">Soufiane</h5>
                </div>
            </li>
            <li class="col-lg-3 col-md-6 padd_col_res" data-aos="fade-up" data-aos-duration="800" data-aos-delay="250">
                <div class="team_member">
                    <img src="Design/images/team-4.jpg" alt="Team Member">
                    <h5 class="price_list" style="font-family: 'Prata', sans-serif;text-align:center;padding:5px 0 5px">Adil</h5>
                </div>
            </li>
        </ul>
    </div>

</section>

<!-- GALLERY SECTION -->

<section class="gallery-section" id="gallery" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <div class="section_heading">

        <h2>صور</h2 data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
        <div class="heading-line"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="250">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-1.jpg');"> </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="350">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-2.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="450">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-3.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="550">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-4.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="250">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-5.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="350">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-6.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="450">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-7.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column" data-aos="fade-up" data-aos-duration="800" data-aos-delay="550">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-8.jpg');"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- REVIEWS SECTION -->

<!-- <section id="reviews" class="testimonial_section">
        <div class="container">
            <div id="reviews-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#reviews-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#reviews-carousel" data-slide-to="1"></li>
                    <li data-target="#reviews-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide" style="visibility: hidden;">
                        <div class="carousel-caption d-md-block">
                            <h3>ليست مجرد قصة شعر انها تجربة</h3>
                            <p>
                                Our barbershop is the territory created purely for males who appreciate
                                <br>
                                premium quality, time and flawless look.
                            </p>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide"  style="visibility: hidden;">
                        <div class="carousel-caption d-md-block">
                            <h3>ليست مجرد قصة شعر انها تجربة</h3>
                            <p>
                                Our barbershop is the territory created purely for males who appreciate
                                <br>
                                premium quality, time and flawless look.
                            </p>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide"  style="visibility: hidden;">
                        <div class="carousel-caption d-md-block">
                            <h3>ليست مجرد قصة شعر انها تجربة</h3>
                            <p>
                                Our barbershop is the territory created purely for males who appreciate
                                <br>
                                premium quality, time and flawless look.
                            </p>
                        </div>
                    </div>
                </div>
                
                <a class="carousel-control-prev" href="#reviews-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#reviews-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section> -->


<!-- CONTACT SECTION -->

<section class="contact-section" id="contact-us" style="text-align:right;" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-padding" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                <div class="contact-info">
                    <h2>
                        تواصل معنا و <br>
                        أرسل لنا رسالة اليوم!
                    </h2>

                    <h4 style="text-align:left;">
                        <span style="font-weight: bold">Email:</span>
                        barbertop@barbertop.com
                        <br>
                        <span style="font-weight: bold">Phone:</span>
                        +212 522525252
                    </h4>
                </div>
            </div>
            <div class="col-lg-6 sm-padding" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="contact-form">
                    <div id="contact_ajax_form" class="contactForm">
                        <div class="form-group colum-row row">
                            <div class="col-sm-6">
                                <input type="text" id="contact_name" name="name" class="form-control"
                                    placeholder="الاسم">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" id="contact_email" name="email" class="form-control"
                                    placeholder="البريد الالكتروني">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" id="contact_subject" name="subject" class="form-control"
                                    placeholder="الموضوع">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="contact_message" name="message" cols="30" rows="5"
                                    class="form-control message" placeholder="الرسالة"></textarea>
                            </div>
                        </div>
                        <div class="form-group row" style="text-align:left;">
                            <div class="col-md-12">
                                <button id="contact_send" class="default_btn">ارسال الرسالة</button>
                            </div>
                        </div>
                        <img src="Design/images/ajax_loader_gif.gif" id="contact_loader" style="display: none">
                        <div id="contact_status_message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WIDGET SECTION / FOOTER -->

<section class="widget_section" style="text-align:right" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="footer_widget">
                    <div class="footer_logo" >
                        <img src="Design/images/barbershop_logo.png" alt="Brand" >
                        <p>
                        </p>
                    </div>
                    <ul class="widget_social">
                        <li><a href="https://facebook.com" data-toggle="tooltip" title="Facebook"><i
                                    class="fab fa-facebook-f fa-2x"></i></a></li>
                        <!-- <li><a href="https://x.com" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-2x"></i></a>
                        </li> -->
                        <li><a href="https://instagram.com" data-toggle="tooltip" title="Instagram"><i
                                    class="fab fa-instagram fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="250">
                <div class="footer_widget">
                    <h3>العنوان</h3>
                    <p>
                        شارع محمد الخامس رقم 425 - طنجة
                    </p>
                    <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d202.31067649322193!2d-5.801782904982422!3d35.77609303244108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sma!4v1717418743214!5m2!1sen!2sma" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6">
                    <div class="footer_widget">
                        <h3>
                            Opening Hours
                        </h3>
                        <ul class="opening_time">
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                        </ul>
                    </div>
                </div> -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="footer_widget">
                    <h3 style="margin:0 0 20px">اشترك معنا</h3>
                    <div class="subscribe_form">
                        <form action="#" class="subscribe_form" novalidate="true">
                            <input type="email" name="EMAIL" id="subs-email" class="form_input"
                                placeholder="البريد الالكتروني ...">
                            <button type="submit" class="submit">اشترك</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER  -->

<?php include "Includes/footer.php"; ?>