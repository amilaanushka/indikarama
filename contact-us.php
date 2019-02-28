<?php include_once './header.php'; ?>

<div class="page-content contact">

<div class="contact-wrapper">
    <div class="container">
    <div class="row justify-content-center">
        <!-- <h3>Contact Us</h3> -->
    </div>
        <div class="row justify-content-center">
            <div class="col-md-7">
            <form id="contact-form"  method="POST">
            <div class="form-row">
            <div class="form-group col-md-12">
                <label for="txtName">Name</label>
                <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md-12">
                <label for="txtEmail">Email</label>
                <input type="email" class="form-control" id="txtEmail" name ="txtEmail"  placeholder="Your Email" required>
                </div>
                <div class="form-group col-md-12">
                <label for="txtPhone">Contact No</label>
                <input type="text" class="form-control" id="txtPhone" name ="txtPhone" placeholder="Contact No" required>
                </div>
            </div>
            <div class="form-group">
                <label for="txtMessage">Message</label>
                <textarea class="form-control" id="txtMessage" name ="txtMessage" rows="3" placeholder="Message"></textarea>
            </div>
            <div class="col-md-12 text-center">
            <button id="btnSubmit" type="submit" class="btn btn-primary ">Submit</button>
            </div>
            
            </form>
            </div>

            <div class="col-md-5">
                <div class=" contact-info justify-content-center">
                    <div class="row d-flex align-items-center">
                    <div class="col-2 col-md-1">
                    <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                    <div class="col-10 col-md-11 pl-4">
                        523, Lorem Ipsum is <br>
                        simply dummy text 

                    </div>
                    </div>

                    <div class="row d-flex align-items-center">
                    <div class="col-2 col-md-1">
                    <i class="fas fa-phone fa-2x"></i>
                    </div>
                    <div class="col-10 col-md-11 pl-4">
                       0112 222 222 

                    </div>
                    </div>
                    <div class="row d-flex align-items-center">
                    <div class="col-2 col-md-1">
                    <i class="fas fa-envelope-open fa-2x"></i>
                    </div>
                    <div class="col-10 col-md-11 pl-4">
                        <a href="mailto:example@ex.lk">example@ex.lk</a>

                    </div>
                    </div>
                    <div class="row d-flex align-items-center mt-4">
                    <div class="col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4047271.2999762455!2d78.46169489521603!3d7.851731513542368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2593cf65a1e9d%3A0xe13da4b400e2d38c!2sSri+Lanka!5e0!3m2!1sen!2slk!4v1549605353644" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>

</div>


<?php include_once './footer.php'; ?>