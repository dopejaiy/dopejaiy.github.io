<?php
$sqlProduct = "SELECT * FROM products WHERE product_id='1' ";
$resultProduct = mysqli_query($conn, $sqlProduct);
$rowProduct = mysqli_fetch_assoc($resultProduct);
?>
<div class="banner-top">
    <div class="container">
        <h1>Customize Shirt</h1>
        <em></em>
        <h2><a href="?Page=Home">Home</a><label>/</label>Choose your choice</h2>
    </div>
</div>

<div class="single">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4 grid">		
                <div class="flexslider">
                    <div class="flex-viewport" style="overflow: hidden; position: relative;">
                        <ul class="slides">
                            <li data-thumb="img/blue/1-1.png" class="clone" aria-hidden="true">
                                <div class="thumb-image"> 
                                    <canvas id="c" height=400 width=300 ></canvas>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>	
            <div class="col-md-8 single-top-in">
                <div class="span_2_of_a1 simpleCart_shelfItem">
                    <h3>Choose your design</h3>
                    <div class="price_single">
                        <span class="reducedfrom item_price">$<?php echo $rowProduct['price']; ?></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="wish-list">
                        <?php echo $rowProduct['description']; ?>
                    </div>
                    <div class="wish-list">
                        <div class="product-configuration">

                            <div class="cable-config">
                                    <div class="left-conf">
                                        <span>Sleeves</span>
                                        <div class="cable-choose" id="sleeves">
                                            <button id="first" onclick="changeSleeves(1,'Full')" class="active"><i class="fas fa-check"></i> Full</button>
                                            <button onclick="changeSleeves(2,'Half')"><i class="fas fa-check"></i> Half</button>
                                        </div>
                                    </div>
                                    <div class="left-conf" id="collars">
                                        <span>Collars</span>
                                        <div class="cable-choose">
                                            <button onclick="changeCollar(1,'Traditional Button Down')" class="active"><i class="fas fa-check"></i> Traditional Button Down</button>
                                            <button onclick="changeCollar(2,'Parisian Cutaway')"><i class="fas fa-check"></i> Nehru collar </button>
                                            <button onclick="changeCollar(3,'Parisian Button Down')"><i class="fas fa-check"></i> spread collar</button>
                                        </div>
                                    </div>
                                    <!--
									<div class="left-conf">
                                        <span>Chest size</span>
                                        <div class="form-group">
                                            <select name="chestsize" id = "chest">
                                                <option value="small">Small</option>
                                                <option value="medium">Medium</option>
                                                <option value="Large">Large</option>
                                                <option value="XLarge">XLarge</option>
                                            </select> 
                                        </div>
                                    </div>
									-->
                                    <div class="left-conf">
                                        <span>Leave Additional Note</span>
                                        <div class="form-group">
                                            <input type="text" id="anote" class="form-control" size="50" />
                                        </div>
                                    </div>
                            </div>

                            <div class="product-color">
                                <span>Color</span>
                                <div class="color-choose">
                                    <div>
                                        <input data-image="blue" type="radio" id="blue" name="color" value="blue" checked="" class="defaultColor active" onclick="changeColor(0,'#1E4F9B',0, this)">
                                        <label for="blue"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="darkyelow" type="radio" id="darkyelow" name="color" value="darkyelow"  class="" onclick="changeColor(0,'#7B8510', -0.8463655013123583, this)">
                                        <label for="darkyelow"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="green" type="radio" id="green" name="color" value="green"  class="" onclick="changeColor(0,'#2AA23F', -0.48492151547803664, this)">
                                        <label for="green"><span></span></label>
                                    </div>
                                
                                    <div>
                                        <input data-image="orange" type="radio" id="orange" name="color" value="orange"  class="" onclick="changeColor(0,'#9A521C', 0.9330984261168411, this)">
                                        <label for="orange"><span></span></label>
                                    </div>
                                    
                                    <div>
                                        <input data-image="darkgreen" type="radio" id="darkgreen" name="color" value="darkgreen"  class="" onclick="changeColor(1,'#5E930E', 0.4853442297265049, this)">
                                        <label for="darkgreen"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="darkblue" type="radio" id="darkblue" name="color" value="darkblue"  class="" onclick="changeColor(1,'#0E5D93', -0.8463655013123583, this)">
                                        <label for="darkblue"><span></span></label>
                                    </div>
                                   
                                </div>
                            </div>

                            
                        </div>
                    </div>
                 
                    <a href="#" class="add-to item_add hvr-skew-backward"  onclick = "sendValueToPhp()">Proceed To Checkout</a>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


