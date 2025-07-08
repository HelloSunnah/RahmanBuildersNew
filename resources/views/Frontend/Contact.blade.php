   @extends('Frontend.Master')

@section('content') <div class="mapouter">
        <div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas"
                src="https://maps.google.com/maps?q=Dynamic%20Layers&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                href="https://www.emojilib.com/"></a></div>
        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 350px;
                width: 100%;
            }

            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 350px;
                width: 100%;
            }
        </style>
    </div>
    <section class="contact-section bg-grey padding">
        <div class="dots"></div>
        <div class="container">
            <div class="contact-wrap d-flex align-items-center row">
                <div class="col-md-6 padding-15">
                    <div class="contact-info">
                        <h2>Get in touch with us & <br>send us message today!</h2>
                        <p>Redison is a different kind of architecture practice. Founded by LoganCee in 1991, we’re an
                            employee-owned firm pursuing a democratic design process that values everyone’s input.</p>
                        <h3>198 West 21th Street, Suite 721 <br>New York, NY 10010</h3>
                        <h4><span>Email:</span> Dynamiclayers.Net <br> <span>Phone:</span> +88 (0) 101 0000 000 <br>
                            <span>Fax:</span> +88 (0) 202 0000 001</h4>
                    </div>
                </div>
                <div class="col-md-6 padding-15">
                    <div class="contact-form">
                        <form action="http://html.dynamiclayers.net/at/indico/contact.php" method="post" id="ajax_form"
                            class="form-horizontal">
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control message"
                                        placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="submit" class="default-btn" type="submit">Send Message</button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

