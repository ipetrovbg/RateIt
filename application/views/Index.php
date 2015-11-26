<script type ="text/javascript">
    $(document).ready(function () {

        $('.star_rating').on('click', function (e) {
            e.preventDefault();
            $('#res').show();

            /* My first entry in this project */

            /* PETER */

            var rateit = $(this).data('productid');
            var stars = $(this).data('stars');
            console.log(rateit);

            //alert(rateit);
            $.ajax({
                url: 'http://print-decor.eu/rateit/index.php/Rateit/', //your server side script
                data: {rateit: rateit, stars: stars}, //our data
                type: 'POST',
                success: function (data) {

                    $("#response").append('<li>' + data + '</li>');

                    setTimeout(function () {



                    }, 5000);
                },
                error: function (msg) {
                    $(this).append('<li style="color:red">' + msg + '</li>');
                }
            });
        });
        $('.close_res').click(function () {
            $('#response').html("");
            $("#res").hide();
        });
    });

</script>
<!--               ///////////////////////////////////////////////////////////////////////////////////
                   /////                                                                        //////
                   /////        For this template we must use loop to print the right data      //////
                   /////                        in the right place                              //////
                   /////                                                                        //////
                   /////            I split the entire index template page to 10 parts          //////
                   /////                                                                        //////
                   ///////////////////////////////////////////////////////////////////////////////////
--> 

<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider">

            <!--            <li>
                            <img src="<?php //echo base_url();    ?>assets/images/banner.jpg" class="img-responsive" alt=""/>
                            <div class="button">
                                <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>                    
                            </div>
            
            
                        </li>
                        <li>
                            <img src="<?php //echo base_url();    ?>assets/images/banner1.jpg" class="img-responsive" alt=""/>
                            <div class="button">
                                <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                            </div>
            
                        </li>-->


            <!--                        
                                    *******************************************
                            ****************    here we will use loop      ********************
                                    ************    start loop      ***********
                                                      
            
                                                        SLIDER
            
            
                                    *******************************************
            -->
            <?php
                foreach ($pubs_slider as $key => $value) {
                $image = $this->Pub_model->get_pub_image($value['title'], 'crop1200x497');
                
            ?>
            <li>
                
                <img src="<?php echo base_url(); ?>assets/pubs/<?php echo $image['img_path']; ?>" class="img-responsive" alt=""/>
                <div class="button">
                    <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                </div>
                <div class="my_banner_desc">
                    <div class="col-md-12">
                        <div class="my-list">
                            <span><span class="m_1"><?php echo $value['title']; ?></span></span>
                            <span>Published <span class="m_1"><?php echo $value['date_added']; ?></span></span>
                            <span>Rating </span>
                            <span data-productid="<?php echo $value['id']; ?>" data-stars="1" class="star star_rating"></span>
                            <span data-productid="<?php echo $value['id']; ?>" data-stars="2" class="star star_rating"></span>
                            <span data-productid="<?php echo $value['id']; ?>" data-stars="3" class="star star_rating"></span>
                            <span data-productid="<?php echo $value['id']; ?>" data-stars="4" class="star star_rating"></span>
                            <span data-productid="<?php echo $value['id']; ?>" data-stars="5" class="star star_rating"></span>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            }
            ?>

            <!--        
                                            *****************************************
                                        **************      end loop        ****************
                                            *****************************************
            
            -->
        </ul>

    </div>

</div>
<div class="content">

    <!--                **************************************************
                        **************************************************
                        ********** commented !important script ************
                        **************************************************
                        **************************************************
    --> 



    <div id="products">
        <div id="res">
            <h4><strong>Server response:</strong></h4>
            <ul id="response">

            </ul>
            <span class="close_res">Close</span>
        </div>
    </div>



    <div class="box_1">
        <h1 class="m_2">Editor Picks</h1>
        <div class="search">
            <form>
                <input type="text" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = '';
                        }">
                <input type="submit" value="">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="box_2">
        <!-- 
        
               *****************************  starting main content ****************************************** 
        
        -->

        <?php
        //////////////////////////////////////////////////////////////
        //                                                          //
        //////////////////   Here we will use loop with data from the BD            //
        //      with foreach loop inside this for loop              //
        //         this loop is exemple for use                     /////////////////
        //                                                          //
        //////////////////////////////////////////////////////////////




        $array = 10;        ///////     we must load only 10 pubs and hotels
        $count = 0;
        foreach ($pubs as $key => $value) {
            $count ++;

            if ($count == 1) {


                $height229 = $this->Pub_model->get_pub_image($value['title'], 'crop200');
                ?>
                <div class="fir col-md-5 grid_3">
                    <!--            ********************* starting column 1 *************************-->
                    <div class="row_1">
                        <div class="col-md-6 grid_4">


                            <a href="single.html">
                                <div class="grid_2">
                                    <img src="<?php echo base_url() . 'assets/pubs/' . $height229['img_path']; ?>" class="img-responsive" alt=""/>
                                    <div class="caption1">
                                        <ul class="list_3">
                                            <li><p><i class="icon4"> </i> 3,48</p></li>
                                        </ul>

                                        <p class="m_3"><?php echo $value['title']; ?></p>
                                    </div>
                                </div>
                            </a>
        <?php
    } elseif ($count == 2) {
        $pub2 = $this->Pub_model->get_pub_image($value['title'], 'crop200');
        ?>
                            <a href="single.html">
                                <div class="grid_2 col_1">
                                    <img src="<?php echo base_url() . 'assets/pubs/' . $pub2['img_path']; ?>" class="img-responsive" alt=""/>
                                    <div class="caption1">
                                        <ul class="list_3">
                                            <li><p><i class="icon4"> </i> 3,48</p></li>
                                        </ul>
                                        <p class="m_3"><?php echo $value['title']; ?></p>
                                    </div>
                                </div>
                            </a>


                        </div>
        <?php
    } elseif ($count == 3) {
        $pub3 = $this->Pub_model->get_pub_image($value['title'], 'crop200x250');
        ?>
                        <div class="col-md-6 grid_7">
                            <div class="col_2">
                                <ul class="list_4">
                                    <li><i class="view"></i><p>2,548</p></li>
                                    <li>Rating : &nbsp;&nbsp;
                                        <p>
                                            <img data-productid="<?php echo $value['id']; ?>" data-stars="1" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                            <img data-productid="<?php echo $value['id']; ?>" data-stars="2" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                            <img data-productid="<?php echo $value['id']; ?>" data-stars="3" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                            <img data-productid="<?php echo $value['id']; ?>" data-stars="4" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_empty_star.png" />
                                            <img data-productid="<?php echo $value['id']; ?>" data-stars="5" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_empty_star.png" />
                                        </p></li>
                                    <li>Date : &nbsp;<span class="m_4">Mar 15, 2015</span> </li>
                                    <div class="clearfix"> </div>
                                </ul>
                                <div class="m_5"><a href="single.html"><img src="<?php echo base_url() . 'assets/pubs/' . $pub3['img_path']; ?>" class="img-responsive" alt=""/></a></div>
                            </div>
                        </div>
        <?php
    } elseif ($count == 4) {
        $pub4 = $this->Pub_model->get_pub_image($value['title'], 'crop451x145');
        ?>
                        <div class="clearfix"> </div>

                    </div>
                    <div class="row_2">
                        <a href="single.html"><img src="<?php echo base_url() . 'assets/pubs/' . $pub4['img_path']; ?>" class="img-responsive" alt=""/></a>
                    </div>
                    <!--            ******************************* end of column 1 *********************************-->
                </div>
        <?php
    } elseif ($count == 5) {
        $pub5 = $this->Pub_model->get_pub_image($value['title'], 'crop200');
        ?>

                <div class="firs col-md-5 content_right">

                    <!--            *********************** start column 2 *****************************-->
                    <div class="row_3">
                        <div class="col-md-6 content_right-box"><a href="single.html">
                                <div class="grid_2">
                                    <img src="<?php echo base_url() . 'assets/pubs/' . $pub5['img_path']; ?>" class="img-responsive" alt=""/>
                                    <div class="caption1">
                                        <ul class="list_5">
                                            <li><p><i class="icon4"> </i> 3,48</p></li>
                                        </ul>
                                        <p class="m_3"><?php echo $value['title']; ?></p>
                                    </div>
                                </div>
                            </a></div>

        <?php
    } elseif ($count == 6) {
        $pub6 = $this->Pub_model->get_pub_image($value['title'], 'crop200');
        ?>
                        <div class="col-md-6 grid_5"><a href="single.html">
                                <div class="grid_2">
                                    <img src="<?php echo base_url() . 'assets/pubs/' . $pub6['img_path']; ?>" class="img-responsive" alt=""/>
                                    <div class="caption1">
                                        <ul class="list_5">
                                            <li><p><i class="icon4"> </i> 3,48</p></li>
                                        </ul>
                                        <p class="m_3"><?php echo $value['title']; ?></p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="clearfix"> </div>
                    </div>
        <?php
    } elseif ($count == 7) {
        $pub7 = $this->Pub_model->get_pub_image($value['title'], 'crop451x145');
        ?>

                    <div class="row_2">
                        <a href="single.html"><img src="<?php echo base_url() . 'assets/pubs/' . $pub7['img_path']; ?>" class="img-responsive" alt=""/></a>
                    </div>
                    <!--                    <div class="video">
                                            <iframe width="100%" height="" src="https://www.youtube.com/embed/s1QeoSedWmM" frameborder="0" allowfullscreen></iframe>
                                        </div>-->

        <?php
    } elseif ($count == 8) {
        $pub8 = $this->Pub_model->get_pub_image($value['title'], 'crop200');
        ?>

                    <div class="row_5">
                        <div class="back col-md-6">

                            <div class="col_2">
                                <ul class="list_4">
                                    <li><i class="icon1"> </i><p>2,548</p></li>
                                    <li><i class="icon2"> </i><p>215</p></li>
                                    <li><i class="icon3"> </i><p>546</p></li>
                                    <li>Rating : &nbsp;&nbsp;
                                <p>
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="1" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="2" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="3" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="4" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_empty_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="5" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_empty_star.png" />
                                </p></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>

                        </div>
                        <a href="#">
                            <div class="back col-md-6 m_6">

                                <img src="<?php echo base_url() . 'assets/pubs/' . $pub8['img_path']; ?>" class="img-responsive" alt=""/>

                            </div>
                        </a>
                    </div>

                    <!--            ****************************** end column 2 ********************************-->
                </div>

                <!-- end second colon -->
        <?php
    } elseif ($count == 9) {
        $pub9 = $this->Pub_model->get_pub_image($value['title'], 'crop200');
        ?>



                <div class="first col-md-2 grid_6">

                    <!--            *********************************** start column 3 ************************************-->
                    <div class="m_7"><a href="single.html"><img src="<?php echo base_url() . 'assets/pubs/' . $pub9['img_path']; ?>" class="img-responsive" alt=""/></a></div>
                    <div class="caption1">
                        <ul class="list_5">
                            <li><p><i class="icon4"> </i> 3,48</p></li>
                        </ul>
                        <p class="m_3"><?php echo $value['title']; ?></p>
                    </div>

        <?php
    } elseif ($count == $array) {
        $pub10 = $this->Pub_model->get_pub_image($value['title'], 'crop200x250');
        ?>
                    <div class="col_2 col_3">
                        <ul class="list_4">
                            <li><i class="view"></i><p>2,548</p></li>
                            <li>Rating : &nbsp;&nbsp;
                                <p>
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="1" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="2" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="3" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="4" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_empty_star.png" />
                                    <img data-productid="<?php echo $value['id']; ?>" data-stars="5" class="star_rating" src="<?php echo base_url(); ?>/assets/images/small_empty_star.png" />
                                </p></li>
                            <li>Date : &nbsp;<span class="m_4">Mar 15, 2015</span> </li>
                            <div class="clearfix"> </div>
                        </ul>
                        <div class="m_8"><a href="single.html"><img src="<?php echo base_url() . 'assets/pubs/' . $pub10['img_path']; ?>" class="img-responsive" alt=""/></a></div>
                    </div>

                    <!--            ***************************** end column 3 ***********************************-->

                </div>

                <div class="clearfix"> </div>
                <!--        ******************************************** end main content **********************************************-->

        <?php
    }
}
?>

    </div>
</div>