<div id="student_login_form_wrapper">
    <form name="student_login_form" id="student_login_form" class="form" novalidate="novalidate">
        <div class="studentuser-login input-group">
            <div class="form-group my-3">
                <input type="number" name="student_id" id="student_id" placeholder="Reg. No. / Student ID" autocomplete="off" class="form-control student_id reqField otp_login_reqField h-auto placeholder-dark-75" />
                <p id="student_id_msg" class="input-status-msg"></p>
            </div>
            <div class="form-group my-3">
                <input type="number" name="mobile" id="mobile" placeholder="Mobile" autocomplete="off" class="form-control mobile reqField otp_login_reqField h-auto placeholder-dark-75" />
                <p id="mobile_msg" class="input-status-msg"></p>
            </div>
            <div class="form-group my-3">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control password reqField h-auto placeholder-dark-75" />
                <p id="password_msg" class="input-status-msg"></p>
            </div>
            <!-- <div class="user_actions_ext form-group my-3 hidden"></div> -->

            <div class="user_actions form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                <!-- <p class="my-0">Forgot Password ? <a href="javascript:void(0)" onclick="window.get_studentuser_login_with_otp();" class="text-hover-primary">Login with OTP</a></p> -->
                <p class="my-0">Forgot Password ? <a href="https://scholabook.com/login?login-with-otp" class="text-hover-primary">Login with OTP</a></p>
            </div>
        </div>

        <div id="login_submit_container" class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
            <div class="my-3 mr-2">
                <div class="form-check form-check-custom ">
                    <input type="checkbox" name="remember" id="remember_me" class="form-check-input" style="width:18px; height:18px; vertical-align: middle;" />
                    <label class="form-check-label text-muted" for="remember_me">Remember me</label>
                </div>
            </div>

            <div id="student_login_status"></div>

            <button type="button" id="sb_login_submit" class="btn btn-primary btn-sm fw-bold px-15 py-3 my-3">Sign In</button>
        </div>
    </form>
</div>