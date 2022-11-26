<template>
  <p class = "logo"><span class = "logo1">Cert</span><span class = "logo2">itude</span></p>
    <div class="student">
    <Ccard class = "info-display">
      <CCardHeader class = "header"><div>How it Works</div></CCardHeader>
      <CListGroup>
        <CCardGroupItem class="line"><p class="line-item"><span class="text1">Login to your univeristy network in app</span><span class="img1"><img class = "image-location" src="@/assets/student_info_pic1.gif" alt=""></span></p></CCardGroupItem>
        <CCardGroupItem class="line"><p class="line-item"><span class="img2"><img class="image-location" src="@/assets/student_info_pic2.png" alt=""></span><span class="text2">Click to generate a link/QR code</span></p></CCardGroupItem>
        <CCardGroupItem class="line"><p class="line-item"><span class="text1">Share the link with a participating business</span><span class="img1"><img class = "image-location" src="@/assets/business_woman.gif" alt=""></span></p></CCardGroupItem>
      </CListGroup>
      
    </Ccard>
    <!--<img class="man-standing" src="@/assets/lawyer_standin.png" alt=""> -->
  </div>
 
    <el-footer class="footer" height="300">
      <div>
      <p>educertified@gmail.com</p>
  <img class = "socials" src="@/assets/linkedin_logo.png" alt="">
  <img class = "socials" src="@/assets/instagram_logo.png" alt="">
</div>
  </el-footer>
  </template>
  
  <style>
  @media (min-width: 1024px) {

    .text1{
      width: 50%;
      padding: 2%;
      font-size: large;
      font-weight: bolder;
    }
    .text2{
      margin: 10%;
      font-size: large;
      font-weight: bolder;
      text-align: center;
    }
    .img1{
      margin: 5%;
    }
    .line{
      padding: 6%;
    }
    .line-item{
      text-align: center;
      padding: 5% 0;
    }
  }
  </style>

