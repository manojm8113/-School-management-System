
<header class="heder">
<button a href="#"><a href="">Student Dashboard</button></a>
        <div class="logout">
            <a href="logout.php" class="btn btn-warning">Logout</a>
        </div>
    </header>
    <asider>
        <ul class="adside">
        <li><a href="studentprofile.php">My Profile</a></li>
            <li><a href="https://www.ox.ac.uk/sites/files/oxford/UGP%202018%20entry%20Courses.pdf">My courses</a></li>
            <li><a href="https://results.b-u.ac.in/2022/sde_rev_aug22/index.html">My result</a></li>
        </ul>
    </asider>
    <div class="adcontent">
    <h1 class="btn btn-info">Welcome...<?php  echo $_SESSION ['username']?></h1>
    <p>Heyy...<?php echo $_SESSION ['username']?> <br>If you want to udate your profile please update your profile........!</p>
</div>
