<template>

  <div class = "background">
    <div class="student">
    <el-card>
    <!-- <Ccard class = "info-display"> -->
      <div class = "header">How it Works</div>
      <el-container>
        <el-aside width="100px"><img class="image-location" src="@/assets/qr.png"  alt=""/></el-aside>
        <el-main class="text">Click on the link provided by the student</el-main>
      </el-container>
      <el-container>
        <el-main class="text">Log in to your Certitude Business account</el-main>
        <el-aside width="100px"><img class="image-location" src="@/assets/student_info_pic1.jpg" alt=""/></el-aside>
      </el-container>
      <el-container>
        <el-aside width="100px"><img class="image-location" src="@/assets/student_info_pic3.jpg" alt=""/></el-aside>
        <el-main class="text">View the student's academic credentials</el-main>
      </el-container>
  </el-card>
  </div>
  <!-- <img class="man-standing" src="@/assets/lawyer_standin.png" alt=""> -->
  </div>


  <el-footer class="footer" height="300">
      <div>
      <span>educertified@gmail.com</span>
  <img class = "socials" src="@/assets/linkedin_logo.png" alt="">
  <img class = "socials" src="@/assets/instagram_logo.png" alt="">
</div>
  </el-footer>

    </template>
    
    <style>

    .text{
      font-family: 'Comfortaa' ;
      font-size: 15px;
    }
    .header{
      font-family: 'Secular One';
      margin-bottom:30px ;
      font-weight: bold;
      font-size: 25px;
      display: flex;
      justify-content: center;
      
  }
    @media (min-width: 1024px) {
    }
    </style>