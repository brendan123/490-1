<?php require 'header.php'; require 'db_key.php'; require 'backend.php'?>
<style>
    .gradient-custom {
        background: #2c3e50;
        background: -webkit-linear-gradient(left, #2c3e50, #000000);
        background:         linear-gradient(to bottom right, #2c3e50, #000000);
    }
</style>
    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-secondary text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">
                <img src="transparentTreble2.png" alt="Treble Logo"/> 
                <!--<h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>-->
                <form method="POST" action='backend.php'>
                    <div class="form-outline form-white mb-4">
                        <input type="text" id="typeEmailX" class="form-control form-control-lg" name="username"/>
                        <label  class="form-label" for="typeEmailX">Username</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                        <label class="form-label" for="typePasswordX" >Password</label>
                    </div>

                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login" value="login">Login</button>
                    </form> 

                </div>


            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
 
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
