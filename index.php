<?php require 'header.php'; require 'db_key.php';?>
<style>   
    body {
        display:flex;
        height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background: #2c3e50;
        background: -webkit-linear-gradient(left, #2c3e50, #000000);
        background:    -moz-linear-gradient(left, #2c3e50, #000000);
        background:     -ms-linear-gradient(left, #2c3e50, #000000);
        background:      -o-linear-gradient(left, #2c3e50, #000000);
        background:         linear-gradient(to right, #2c3e50, #000000);
                            
    }
    .lgForm{
        margin:0,auto;
    }
    
</style>

<body>   
    
<div class = "container">
    <div class="row">
        <div class=col-lg-4>
            <img src="transparentTreble2.png" alt="Treble Logo"/> 
            <form method = 'POST' action = 'backend.php' >    
                <input class= 'form-control' type="text" name="username"><br>
                <input class= 'form-control' type="password" name="password" id="password" autocomplete="off">
                <br><button class = 'button-login' type="submit" name="login" value= 'login' class="submit">Login</button>
            </form>	  
        </div>
    </div>
</div>
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
