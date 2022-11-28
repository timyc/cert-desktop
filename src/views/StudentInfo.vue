<template >
  <div class = "background">
    <div class="student">
    <el-card>
    <!-- <Ccard class = "info-display"> -->
      <div class = "header">How it Works</div>
      <el-container>
        <el-aside width="100px"><img class="image-location" src="@/assets/student_info_pic1.jpg" alt=""/></el-aside>
        <el-main class="text">Login to your univeristy network in app</el-main>
      </el-container>
      <el-container>
        <el-main class="text">Click to generate a link/QR code</el-main>
        <el-aside width="100px"><img class="image-location" src="@/assets/qr.png" alt=""/></el-aside>
      </el-container>
      <el-container>
        <el-aside width="100px"><img class="image-location" src="@/assets/student_info_pic3.jpg" alt=""/></el-aside>
        <el-main class="text">Share the link with a participating business</el-main>
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

