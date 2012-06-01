<header>
<div class="left"><h1><span>Social HnS</span></h1></div>
<div class="right">
<div class="gradient"></div>
<div class="login">
<?php echo $html->jslink('Login','login')?>
<?php echo $html->jslink('Logout','logout')?>
</div>
</div>
</header>
<div id="content">
<section>
<h2>Follow your interests</h2>
<p>Instant updates from your friends, industry experts, favorite celebrities, and what's happening around the world.</p>
<?php echo $query?><br />
<?php echo var_dump($logged)?>
</section>
<aside>
<h3>New to Social HnS? <em>Join today!</em></h3>
<form action="home/auth/signup" method="post">
<div class="holding name">
<input type="text" autocomplete="off" name="user[name]" maxlength="20">
<span class="holder">Full name</span>
</div>
<div class="holding email">
<input type="text" autocomplete="off" name="user[email]">
<span class="holder">Email</span>
</div>
<div class="holding password">
<input type="password" name="user[user_password]">
<span class="holder">Password</span>
</div>
<input type="submit" value="Sign up">
</form>
</aside>
</div>
<footer>
</footer>