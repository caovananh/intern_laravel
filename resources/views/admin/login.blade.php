<style>
h1 {
    font: 500 1.5em Arial, Helvetica, sans-serif; 
    display: block;
    margin-bottom: 20px;
    margin-top: 10px;
}

.login-panel {
    max-width: 360px;
    min-height: 100px;
    margin: 0 auto;
    padding: 30px;
    background: #f3f3f3;
    border: 1px solid #d3d3d3;
    border-radius: 5px;
    font: 500 .9em Arial, Helvetica, sans-serif;
}

.input-login {
    width: calc(100% - 40px);
    padding: 40px;
    margin: auto;
    padding: 0;
    margin-bottom: 20px;    
}

.input-login label {
    display: block;
    margin-bottom: 5px;;
}

.input-login input[type=text], input[type=password] {
    width: calc(100% - 16px);
    padding: 7px;
    border: 1px solid #e3e3e3;
    margin-bottom: 20px;
}

.input-login button {
    display: block;
    float: right;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
}

.login-panel span {
    font: 400 .9em Arial, Helvetica, sans-serif;
    color: #428bca;
}

.login-panel span a { font: inherit; color: inherit; }
</style>

<div class="content">

    <form method="POST"  class ="login-panel">
        <input type="hidden" name ="_token" value ="{{ csrf_token() }}">
        <div class="input-login">
            <h1>Đăng nhập</h1>
            <label for="uname">Tên đăng nhập</label>
            <input type="text" placeholder="Nhập email hoặc tài khoản.." name="username" required>

            <label for="psw">Mật khẩu</label>
            <input type="password" placeholder="Nhập mật khẩu ..." name="password" required>

            <button type="submit" name ="submit">Đăng nhập</button>
            
            <div>
            <input type="checkbox" name="check"> Duy trì đăng nhập
            </div> 
            <?php if(isset($msg)) { ?>
                <label > <?= $msg;?> </label>
            <?php } ?>
    
            <div class="clear"></div>
            <span><a href="http://localhost/blog/public/register.html">Đăng ký</a></span>
        </div>
    </form>

</div>