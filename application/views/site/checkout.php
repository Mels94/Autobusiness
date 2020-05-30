<div class="page-heading wow fadeIn mb-0" data-wow-duration="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
                    <div class="row">
                        <div class="heading-content col-md-12">
                            <p><a href="/">Homepage</a> / <em> Checkout</em></p>
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Start Checkout Area -->
<section class="our-checkout-area bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="ckeckout-left-sidebar">
                    <form action="/site/checkout" method="post" id="formCheckout">
                        <div class="checkout-form">
                            <h2 class="section-title-3">Billing details</h2>
                            <div class="checkout-form-inner">
                                <div class="form-group single-checkout-box">
                                    <input type="text" class="form-control" name="name" placeholder="Name*">
                                </div>
                                <div class="form-group single-checkout-box">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone*">
                                </div>
                                <div class="form-group single-checkout-box">
                                    <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="payment-form">
                            <h2 class="section-title-3">payment details</h2>
                            <div class="payment-form-inner">
                                <div class="form-group single-checkout-box">
                                    <input type="text" class="form-control upper" name="name_card"
                                           placeholder="Name on Card*">
                                </div>
                                <div class="form-group single-checkout-box">
                                    <input type="text" class="form-control creditCardText" name="card_number" placeholder="Card Number*">
                                </div>
                            </div>
                        </div>
                        <div class="our-payment-sestem">
                            <h2 class="section-title-3">We Accept :</h2>
                            <ul class="payment-menu">
                                <li><a href="#"><img src="../../../assets/images/payment/1.jpg" alt="payment-img"></a>
                                </li>
                                <li><a href="#"><img src="../../../assets/images/payment/2.jpg" alt="payment-img"></a>
                                </li>
                                <li><a href="#"><img src="../../../assets/images/payment/3.jpg" alt="payment-img"></a>
                                </li>
                                <li><a href="#"><img src="../../../assets/images/payment/4.jpg" alt="payment-img"></a>
                                </li>
                                <li><a href="#"><img src="../../../assets/images/payment/5.jpg" alt="payment-img"></a>
                                </li>
                            </ul>
                            <div class="checkout-btn">
                                <input type="button" class="btn btn-primary buy-click-submit" name="submit"
                                       value="CONFIRM & BUY NOW">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

